<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Traits\Logger;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
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
            $services = null;
            DB::transaction(function () use (&$services){
                $services = $this->model->where('category', 'service')->paginate(5);
                $this->logInfo('Succes To Get Services', ['task'=>'Get Services']);
            });
            return view('Admin.services', compact('services'));
        }catch (\Exception $e){
            $this->logError('Failed To Get Services',[
                'task'=>'Get Services',
                'exception'=>$e->getMessage()
            ]);
        }
    }
}
