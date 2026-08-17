<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactUsRequest;
use App\Models\ContactUs;
use App\Traits\Logger;

class ContactUsController extends Controller
{
    use Logger;
    private $model;

    public function __construct(ContactUs $model)
    {
        $this->model = $model;
    }
    public function store(StoreContactUsRequest $request)
    {
        try {
            $this->model->create($request->validated());
            return redirect()->back()->with('success', 'با تشکر از شما در اسرع وقت با شما تماس خواهیم گرفت')->withFragment('contactus');
        }catch (\Exception $e){
            $this->logError('Faild to create contact request', [
                'task' => 'CreateContactUs',
                'message' => $e->getMessage(),
            ]);
            return redirect()->back()->with('error', 'در حین انجام عملیات خطایی رخ داده است لطفا مجددا تلاش فرمایید')->withFragment('contactus');
        }
    }
    public function index()
    {
        try {
            $datas = $this->model->orderBy('desc')->get();
            return view('Admin.contact-us', compact('datas'));
        }catch (\Exception $e){
            $this->logError('Faild to get contact request', [
                'task' => 'GetContactUs',
                'message' => $e->getMessage(),
            ]);
        }
    }
}
