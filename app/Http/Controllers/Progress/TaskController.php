<?php

namespace App\Http\Controllers\Progress;

use App\Http\Controllers\Progress\Traits\ProjectTrait;
use App\Http\Controllers\Progress\Traits\TaskTrait;
use App\Http\Controllers\Progress\Traits\UserTrait;
use Illuminate\Http\Request;

class TaskController extends ApiContr
{
    use TaskTrait, ProjectTrait, UserTrait;

    protected $validator;

    public function __construct()
    {
        $this->validator = app()->make(config('progressbase.class_name_map.task_valid_class'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //init validator class
        $inputs = $this->validator->setValidateParams($request->all())->valid();
        if (!empty($inputs->getValidatorResMsg())) {
            return ($request->ajax())
                ? $this->setStatusCode(400)->responseError($inputs->getValidatorResMsg())
                : back()->withErrors($inputs->getValidatorResMsg());
        }

        //insert db init
        $task = $this->validator->transform();
        $project_tasks = $this->getProjectTasks($task['project_id']);
        $task['task_creater'] = $this->getUserName();
        $task['task_tag'] = 'P'.$task['project_id'].'T'.(count($project_tasks) + 1);

        //唯一标识
        $attributes = [
            'task_title' => $task['task_title'],
        ];
        //add new role operate
        try {
            $this->uporcreateTask($attributes, $task);
        } catch (\Exception $e) {
            return ($request->ajax()) ? $this->setStatusCode(500)->responseError($e->getMessage()) : back()->withErrors(
                $e->getMessage()
            );
        }

        return ($request->ajax()) ? $this->setStatusCode(200)->responseSuccess('操作成功！') : redirect('pro/projects');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id = NULL, $project_id = NULL)
    {
        $task = $this->getTask($id);
        //
        if (isset($project_id)) {
            $task->project_id = base64_decode($project_id);
        }
        //获取项目列表
        $projects = $this->getProjects();

        // dump($task);die();

        return view('progress-app.uptask', compact('task', 'projects'));
    }

    /**
     * @author Terry Lucas
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function tasks()
    {
        $tasks = $this->getAllTasks();
        // dump($tasks);die();
        return view('progress-app.tasks', compact('tasks'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
