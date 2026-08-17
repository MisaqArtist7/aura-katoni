<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactRequest;
use App\Models\Category;
use App\Models\ContactModel;
use App\Traits\Logger;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    use Logger;

    public function __construct(public ContactModel $model)
    {
    }

    public function index()
    {
        $categories = Category::all();
        return view('contact-us', compact('categories'));
    }

    public function store(StoreContactRequest $request)
    {
        try {
            $this->model->create($request->validated());
            return redirect()->back()->with('success', 'پیام شما با موفقیت دریافت شد در اسرع وقت با شما تماس میگیریم با تشکر');
        }catch (\Exception $e){
            $this->logError('Failed to create contact form', [
                'message' => $e->getMessage(),
                'line' => $e->getLine()
            ]);
            return redirect()->back()->with('error', 'در هنگام دریافت پیام مشکلی رخ داده است ');
        }

    }
}
