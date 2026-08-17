<?php

namespace App\Http\Controllers\Berand;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\StoreCategoryRequest;
use App\Models\Brand;
use App\Traits\Logger;
use Illuminate\Http\Request;

class BerandController extends Controller
{
    use Logger;

    public function __construct(public Brand $model)
    {
    }

    public function index()
    {
        $brands = $this->model->all();
        return view('Admin.brands', compact('brands'));
    }

    public function create()
    {
        return view('Admin.create-berand');
    }


    public function update(StoreBrandRequest $request, $id)
    {
        try {
            $brand = $this->model->findOrFail($id);

            $data = $request->validated();

            // اگر عکس جدید آپلود شد
            if ($request->hasFile('logo')) {

                // حذف عکس قبلی (اگر وجود دارد)
                if ($brand->logo && \Storage::disk('public')->exists($brand->logo)) {
                    \Storage::disk('public')->delete($brand->logo);
                }

                // ذخیره عکس جدید
                $data['logo'] = $request->file('logo')->store('brand', 'public');
            }

            // آپدیت داده‌ها
            $brand->update($data);

            return redirect()->back()->with('success', 'بروزرسانی با موفقیت انجام شد');

        } catch (\Exception $exception) {

            $this->logError('failed to update brand', [
                'message' => $exception->getMessage(),
                'file' => $exception->getFile(),
                'line' => $exception->getLine()
            ]);

            return redirect()->back()->with('error', 'در هنگام بروزرسانی مشکلی رخ داد');
        }
    }

    public function edit($id)
    {
        $brand = $this->model->findOrFail($id);
        return view('Admin.edit-brand', compact('brand'));
    }

    public function destroy($id)
    {
        try {
            $brand = $this->model->find($id);
            $brand->delete();
            return redirect()->back()->with('success', 'برند با موفقیت حذف شد');
        }catch (\Exception $exception){
            $this->logError('failed to delete category', [
                'message' => $exception->getMessage(),
                'file' => $exception->getFile(),
            ]);
            return redirect()->back()->with('error', 'در هنگام اجرای عملیات خطایی رخ داده است');
        }
    }

    public function store(StoreBrandRequest $request)
    {
//        dd($request->all());
        try {
            // دریافت داده‌های اعتبارسنجی شده
            $data = $request->validated();

            // بررسی وجود عکس و آپلود آن
            if ($request->hasFile('logo')) {
                $data['logo'] = $request->file('logo')->store('brand', 'public');
            }

            // ایجاد برند جدید در دیتابیس
            $this->model->create($data);

            // ریدایرکت با پیام موفقیت (می‌توانید به جای back به روت index هدایت کنید)
            return redirect()->back()->with('success', 'برند با موفقیت ایجاد شد');

        } catch (\Exception $exception) {

            // لاگ کردن خطا
            $this->logError('failed to create brand', [
                'message' => $exception->getMessage(),
                'file' => $exception->getFile(),
                'line' => $exception->getLine()
            ]);

            return redirect()->back()->with('error', 'در هنگام ثبت برند مشکلی رخ داد');
        }
    }
}
