<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Traits\Logger;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WorkSampleController extends Controller
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
            $workSamples = null;
            DB::transaction(function () use (&$workSamples){
                $workSamples = $this->model->where('category', 'worksample')->paginate(5);
                $this->logInfo('Succes To Get Work Samples', ['task'=>'Get Services']);
            });
            return view('Admin.work-samples', compact('workSamples'));
        }catch (\Exception $e){
            $this->logError('Failed To Get Work Samples',[
                'task'=>'Get Services',
                'exception'=>$e->getMessage()
            ]);
        }
    }
}
