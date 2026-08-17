<?php

namespace App\Providers;

use App\Interfaces\ProductRepositoryInterface;
use App\Repositories\ProductRepository;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {
            $cart = session()->get('cart', []);

            $totalQuantity = collect($cart)->sum('quantity');

            $originalTotalPrice = collect($cart)->reduce(function ($carry, $item) {
                return $carry + ($item['price'] * $item['quantity']);
            }, 0);

            $finalTotalPrice = collect($cart)->reduce(function ($carry, $item) {
                $unitPrice = isset($item['discount']) && $item['discount'] < $item['price']
                    ? $item['discount']
                    : $item['price'];
                return $carry + ($unitPrice * $item['quantity']);
            }, 0);

            $view->with('cart', $cart)
                ->with('cartTotalQuantity', $totalQuantity)
                ->with('cartTotalPrice', $finalTotalPrice) // قیمت نهایی
                ->with('cartOriginalPrice', $originalTotalPrice); // قیمت اصلی
        });
    }
}
