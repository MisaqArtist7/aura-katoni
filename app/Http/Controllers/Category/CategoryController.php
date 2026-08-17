<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Traits\Logger;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
class CategoryController extends Controller
{
    use Logger;
    public function __construct(public Category $model)
    {
    }

    public function create()
    {
        $categories = $this->model->all();
        return view('Admin.create-category' , compact('categories'));
    }

    public function index()
    {
        $categories = $this->model
            ->whereNull('parent_id')
            ->with('children')
            ->get();

        $level = 0; // مقدار اولیه

        return view('Admin.show-categories', compact('categories', 'level'));
    }


    public function store(StoreCategoryRequest $request)
    {
        try {
            $data = $request->validated();

            if ($request->hasFile('image')) {
                $data['image'] = $request->file('image')->store('categories', 'public');
            }

            $this->model->create($data);

            return redirect()->back()->with('success', 'ذخیره سازی یا موفقیت انجام شد');

        } catch (\Exception $exception) {
           $this->logError('failed to create category', [
               'message' => $exception->getMessage(),
               'file' => $exception->getFile(),
               'line' => $exception->getLine()
           ]);

            return redirect()->back()->with('error', 'در هنگام ذخیره سازی مشکلی رخ '.$exception->getMessage());
        }
    }
    public function edit($id)
    {
        $category = $this->model->find($id);
        return view('Admin.edit-category', compact('category'));
    }

    public function update(StoreCategoryRequest $request, $id)
    {
        $category = $this->model->find($id);
        try {
            $data = $request->validated();

            if ($request->hasFile('image')) {

                if ($category->image) {
                    Storage::disk('public')->delete($category->image);
                }

                $data['image'] = $request->file('image')->store('categories', 'public');
            }

            $category->update($data);

            return redirect()->back()->with('success', 'دسته‌بندی با موفقیت به‌روزرسانی شد');

        } catch (\Exception $exception) {
            $this->logError('failed to update category', [
                'message' => $exception->getMessage(),
                'file' => $exception->getFile(),
                'line' => $exception->getLine(),
                'category_id' => $category->id
            ]);

            return redirect()->back()->with('error', 'در هنگام به‌روزرسانی مشکلی رخ داد'.$exception->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $this->model->find($id)->delete();
            return redirect()->back()->with('success', 'دسته بندی با موفقیت حذق شد ');
        }catch (\Exception $exception){
            $this->logError('failed to delete category', [
                'message' => $exception->getMessage(),
                'file' => $exception->getFile(),
            ]);
            return redirect()->back()->with('error', 'خطلا رخ داده است  '.$exception->getMessage());
        }

    }
}
