<?php

namespace App\Traits;

use App\Models\PageView;
use Carbon\Carbon;

trait ViewTrait
{
    public function storePageView($postId = null): void
    {
        $ipAddress = request()->ip();

        $existingRecord = PageView::where('ip_address', $ipAddress)
            ->where('post_id', $postId ? $postId : null)
            ->where('page_type', $postId ? 'post' : 'home')
            ->exists();

        if (!$existingRecord) {
            PageView::create([
                'post_id' => $postId,
                'ip_address' => $ipAddress,
                'page_type' => $postId ? 'post' : 'home',
            ]);
        }
    }

    public function getTodayPageViews()
    {
        $startOfDay = Carbon::today();
        $todayViews = PageView::where('created_at', '>=', $startOfDay)->get()->count();
        return $todayViews;
    }
}
