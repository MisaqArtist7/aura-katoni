<?php

namespace App\Console\Commands;

use App\Models\Order;
use Illuminate\Console\Command;

class CleanupPendingOrders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'orders:cancel-pending';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cancel pending orders older than 45 minutes';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $cutoff = now()->subMinutes(35);
        $orders = Order::where('status', 'pending')->where('created_at', '<', $cutoff)->get();
        $count = count($orders);
        foreach ($orders as $order) {
            $order->status = 'canceled';
            $order->save();
        }

        $this->info("Updated {$count} pending orders to canceled.");
    }
}
