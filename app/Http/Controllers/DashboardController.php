<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\PageView;
Use App\Traits\ViewTrait;
use App\Models\Comment;
use Illuminate\Support\Facades\DB;
use App\Traits\Logger;
class DashboardController extends Controller
{
    use ViewTrait, Logger;

    public function index(){
        $postsCount = Post::where('category', 'blog')->count();
        $wesiteViews = PageView::all()->count();
        $todayViews = $this->getTodayPageViews();
        $seentComment = Comment::select('id')->where('seen', 0)->get()->count();
        $workSamples = Post::where('category','worksample')->count();
        $latestPostTime = $this->getTimeSinceLastPost('blog');
        $latestWorkSample = $this->getTimeSinceLastPost('worksample');
        return view('Admin.index', compact(
            'postsCount', 'wesiteViews',
            'todayViews','workSamples', 'latestPostTime' ,
            'latestWorkSample' , 'seentComment'
        ));
    }



    public function getTimeSinceLastPost(string $category)
    {
        $lastPost = Post::latest()->where('category', $category)->first();
        if ($lastPost) {
            $createdAt = Carbon::parse($lastPost->created_at);
            $now = Carbon::now();
            return $createdAt->diffForHumans($now);
        }
    }


}
