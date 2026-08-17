<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReviewRequest;
use App\Models\Review;
use App\Traits\Logger;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    use Logger;
    public function __construct(public Review $model)
    {
    }
    public function index()
    {
        $datas = $this->model->orderBy('created_at', 'desc')->paginate(10);
        return view('Admin.reviews', compact('datas'));
    }

    public function store(StoreReviewRequest $request)
    {
        try {
            if(auth()->user()){
                $user_id = auth()->user()->id;
            }else{
                $user_id = null;
            }
            $data = $request->validated();
            $this->model->create([
                'product_id' => $data['product_id'],
                'comment' => $data['comment'],
                'rating' => $data['rating'],
                'user_id' => $user_id,
            ]);
            return redirect()->back()->with('success', 'ذخیره سازی با موفقیت انجام شد.');
        }catch (\Exception $exception){
            $this->logError('failed to create review', [
                'message' => $exception->getMessage(),
                'trace' => $exception->getTrace(),
                'line' => $exception->getLine()

            ]);
            return redirect()->back()->with('error', 'در هنگام ذخیره سازی مشکلی رخ داده است');
        }
    }


    public function approve($id)
    {
        try {
            $record = $this->model->findOrFail($id);
            $record->update(['approved' => 1]);
            return redirect()->back()->with('success', 'نظر با موفقیت ثبت شد');
        }catch (\Exception $e){
            $this->logError('failed to approve', [
                'message' => $e->getMessage(),
                'trace' => $e->getTrace(),
                'line' => $e->getLine()
            ]);
            return redirect()->back()->with('error', 'مشکلی در سیستم رخ داده است');

        }
    }

    public function destroy($id)
    {
        try {
            $record = $this->model->findOrfail($id);
            $record->delete();
            return redirect()->back()->with('success', 'با موفقیت حذف شد');
        }catch (\Exception $e){
            $this->logError('failed to delete', [
                'message' => $e->getMessage(),
                'trace' => $e->getTrace(),
                'line' => $e->getLine()
            ]);
            return redirect()->back()->with('error', 'مشکلی در سیستم رخ داده است ');
        }
    }
}
