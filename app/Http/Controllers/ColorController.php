<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreColorRequest;
use App\Models\Color;
use App\Traits\Logger;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    use Logger;
    public function __construct(public Color $model){}

    public function create()
    {
        $colors = $this->model->all();
        return view('Admin.colors-create', compact('colors'));
    }

    public function store(StoreColorRequest $request)
    {
        try {
            $this->model->create($request->validated());
            return redirect()->back()->with('success', 'رنگ با موفقیت ذخیره شد ');
        }catch (\Exception $e){
            $this->logError('failed to save color', [
                'message' => $e->getMessage(),
                'trace' => $e->getTrace()
            ]);
            return redirect()->back()->with('error','در حین ذخیره رنگ مشکلی پیش آمده است'.$e->getMessage());
        }
    }



}
