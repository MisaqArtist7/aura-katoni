<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Comment;
use App\Traits\Logger;

class CommentController extends Controller
{
    use Logger;
    private $model;

    public function __construct(Comment $model)
    {
        $this->model = $model;
    }

    public function store(StoreCommentRequest $request)
    {
        try {
            DB::transaction(function () use ($request) {
               $this->model->create($request->validated());
            });
            $this->logInfo('Success store comment', ['task'=>'store comment']);
            return redirect()->back()->with(['success'=>'ممنون از شما برای ثبت نظر . نظر بعد از تایید مدیر یه نمایش در می آید '])->withFragment('comments-section');
        }catch (\Exception $e){
            $this->logError('Failed store comment', ['task'=>'store comment', 'exception'=>$e->getMessage()]);
            return redirect()->back()->with(['error'=>'در حین ذخیره سازی مشکلی رخ داده است لطفا بعدا تلاش کنید'])->withFragment('comments-section');
        }

    }

    public function showComments()
    {
        $this->updateCommentStatus();
        try {
            $comments = $this->model->orderBy('created_at', 'desc')->paginate(5);
            return view('Admin.Comments', compact('comments'));
        }catch (\Exception $e){
            $this->logError('Failed to show comments', [
                'task' => [
                    'Failed to show comments',
                    'Failed to update the seen to 1',
                    'message' => $e->getMessage()
                ]
            ]);
        }
    }

    public function updateCommentStatus()
    {
        $dontSeenComments  = $this->model->where('seen', 0)->get();

        if ($dontSeenComments->isNotEmpty()) {
            DB::transaction(function () use ($dontSeenComments) {
                foreach ($dontSeenComments as $comment) {
                    $comment->seen = 1;
                    $comment->save();
                }
            });
        }
    }

    public function updateCommentsAnswer(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|exists:comments,id',
            'answer' => 'required|max:255'
        ], [
            'id.required' => 'آیدی کامنت الزامی است!',
            'id.exists' => 'کامنت موردنظر یافت نشد!',
            'answer.required' => 'متن پاسخ نمی‌تواند خالی باشد!',
            'answer.max' => 'متن پاسخ نباید بیشتر از ۲۵۵ کاراکتر باشد!',
        ]);
        try {
            DB::transaction(function () use ($validated) {
                $this->model->where('id', $validated['id'])->update(['answer' => $validated['answer'], 'approve'=>1]);
            });
            return back()->with('success', 'پاسخ کامنت با موفقیت به‌روزرسانی شد!');
        } catch (\Exception $e) {
            $this->logError('Failed to update comments answer', [
                'task' => 'updateCommentsAnswer',
                'message' => $e->getMessage()
            ]);

            return back()->with('error', 'خطایی رخ داد، لطفاً دوباره تلاش کنید!');
        }


    }

    public function approveComment($id){
        try {
            $comment = $this->model->find($id);
            DB::transaction(function () use ($comment) {
                $comment->approve = 1;
                $comment->save();
            });
            return redirect()->back()->with('success', 'عملیات با موفقیت انجام شد');
        }catch (\Exception $e){
            $this->logError('Failed to approve comment', [
                'task' => 'approveComment',
                'message' => $e->getMessage()
            ]);
            return redirect()->back()->with('error', 'خطایی رخ داده است مجددا تلاش کنید ');
        }
    }

    public function deleteComment($id)
    {
        try {
            DB::transaction(function () use ($id) {
               $comment = $this->model->find($id);
               if($comment){
                   $comment->delete();
               }
            });
            return back()->with('success', 'کامنت با موفقیت حذف شد!');
        }catch (\Exception $e){
            $this->logError('Failed to delete comment', [
                'task' => 'deleteComment',
                'message' => $e->getMessage()
            ]);
        }
    }



}
