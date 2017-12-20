<?php

namespace App\Http\Controllers\Progress;

use App\Http\Controllers\Progress\Requests\UpProjectValidator;
use App\Http\Controllers\Progress\Traits\ProjectTrait;
use App\Http\Controllers\Progress\Traits\TaskTrait;
use App\Project;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Null_;

class ProjectController extends ApiContr
{
    use ProjectTrait, TaskTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $projects = Project::all();

        return view('progress-app.projects', compact('projects'));
    }

    /**
     * @author Terry Lucas
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function projectDetail($id, $task_progress = 0)
    {
        //定义
        $task_progress = (empty($task_progress)) ? 0 :base64_decode($task_progress);
        $tasks = $this->getTasks($id, $task_progress);

        $project = $this->getProject($id);

        return view('progress-app.project-detail', compact('tasks', 'project','task_progress'));
    }

    /**
     * @author Terry Lucas
     * @param $project_id
     * @param $task_progress
     */
    public function ajax_tasks($project_id , $task_progress)
    {

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
        $validator = new UpProjectValidator();
        $inputs = $validator->setValidateParams($request->all())->valid();
        if (!empty($inputs->getValidatorResMsg())) {
            return ($request->ajax())
                ? $this->setStatusCode(400)->responseError($inputs->getValidatorResMsg())
                : back()->withErrors($inputs->getValidatorResMsg());
        }
        //insert db init
        $project = [
            'project_name'      => $validator->validateParams['name'],
            'project_tag'       => $validator->validateParams['tag'],
            'project_type'      => $validator->validateParams['type'],
            'project_status'    => $validator->validateParams['status'],
            'project_digest'    => $validator->validateParams['digest'],
            'project_context'   => $validator->validateParams['context'],
            'project_milestone' => $validator->validateParams['milestone'],
            'project_creater' => 'lucas',
        ];

        //唯一标识
        $attributes = [
            'project_tag' => $validator->validateParams['tag'],
        ];

        //add new role operate
        try {
            $res = Project::updateOrCreate($attributes, $project);
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
    public function show($id = NULL)
    {
        //
        // $project = (is_null($id)) ? new Role() : Role::where('id', base64_decode($id))->first();
        $project = "";

        return view('progress-app.uproject', compact('project'));
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
        if (!isset($id)) {
            return $this->setStatusCode(400)->responseError("参数不能为空！");
        }

        $role = Project::find(base64_decode($id));
        if (is_null($role)) {
            return $this->setStatusCode(400)->responseError("操作项目不存在！");
        }

        $res = Project::destroy(base64_decode($id));

        return ($res) ? $this->setStatusCode(400)->responseError("操作项目删除成功！") :
            $this->setStatusCode(400)->responseError("操作项目删除失败！");
    }
}
