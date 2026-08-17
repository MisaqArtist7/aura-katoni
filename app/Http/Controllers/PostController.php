<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostStoreRequest;
use App\Http\Requests\PostUpdateRequest;
use App\Models\Post;
use App\Traits\Logger;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
class PostController extends Controller
{
    use Logger;
    private $model;
    public function __construct(Post $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        try {
            $posts = null;
            DB::transaction(function () use (&$posts) {
                $posts = $this->model->where('category', 'blog')->paginate(5);
                $this->logInfo('Sussecc To Get Posts List');
            });
        }catch (\Exception $e){
            $this->logError('Faild To Get Posts List', [
                'task' => 'Get Posts List',
                'data' => $e->getMessage(),
            ]);
        }
        return view ('Admin.posts', compact('posts'));
    }

    public function create()
    {
        return view ('Admin.create-post');
    }

    public function store(PostStoreRequest $request)
    {
        try {
            DB::transaction(function () use ($request) {
                $imagePath = null;
                if ($request->file('image') && $request->file('image')->isValid()) {
                    $imagePath = $request->file('image')->store('posts', 'public');
                }
                $this->model->create(array_merge($request->validated(), ['image' => $imagePath]));
            });
            $this->logInfo('Success To Add Post', ['task' => 'Add Post']);
            return redirect()->back()->with('success', 'پست با موفقیت افزوده شد');
        } catch (\Exception $e) {
            $this->logError('Failed To Add Post', ['task' => 'Add Post','error' => $e->getMessage()]);
            return redirect()->back()->with('error', 'در هنگام ذخیره سازی مشکلی رخ داده است');
        }
    }

    public function show($id)
    {
        try {
            $post = null;

            DB::transaction(function () use ($id, &$post) {
                $post = $this->model->find($id);
                $this->logInfo('Success To Get Post', ['task' => 'Get Post']);
            });
            return view('Admin.update-post', compact('post'));

        } catch (\Exception $e) {
            $this->logError('Failed To Get Post', [
                'task' => 'Get Post',
                'error' => $e->getMessage()
            ]);
            abort(404);
        }
    }



    public function update($id, PostUpdateRequest $request)
    {
        try {
            DB::transaction(function () use ($id, $request) {
                $post = $this->model->findOrFail($id);
                $imagePath = $post->image;
                if ($request->file('image') && $request->file('image')->isValid()) {
                    if ($post->image) {
                        Storage::disk('public')->delete($post->image);
                    }
                    $imagePath = $request->file('image')->store('posts', 'public');
                }
                $post->update(array_merge($request->except('image'), ['image' => $imagePath]));
            });

            $this->logInfo('Success To Update Post', ['task' => 'Update Post']);
            return redirect()->back()->with('success', 'پست با موفقیت به‌روزرسانی شد');
        } catch (\Exception $e) {
            $this->logError('Failed To Update Post', [
                'task' => 'Update Post',
                'error' => $e->getMessage()
            ]);
            return redirect()->back()->with('error', 'در هنگام به‌روزرسانی مشکلی رخ داده است');
        }
    }

    public function destroy($id)
    {
        try {
            DB::transaction(function () use ($id) {
                $post = $this->model->find($id);
                $post->delete();
                $this->logInfo('Success To Delete Post', ['task' => 'Delete Post']);
            });
            $this->logInfo('Success To Delete Post', ['task' => 'Delete Post']);
            return redirect()->back()->with('success', 'عملیات حذف با موفقیت انجام شد');
        } catch (\Exception $e) {
            $this->logError('Failed To Delete Post', ['task' => 'Get Post','error' => $e->getMessage()]);
            return redirect()->back()->with('error', 'عملیات حذف با خطا روبرو شد .');

        }
    }

}
