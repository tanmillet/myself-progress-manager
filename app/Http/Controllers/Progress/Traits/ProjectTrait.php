<?php
namespace App\Http\Controllers\Progress\Traits;

use App\Project;
use Illuminate\Database\Eloquent\Collection;

/**
 * Created by PhpStorm.
 * Author Terry Lucas
 * Date 17.12.11
 * Time 10:39
 */
trait ProjectTrait
{
    /**
     * @author Terry Lucas
     * @param string $task_id
     * @return Task
     */
    public function getProject($project_id): Project
    {
        if (is_null($project_id)) {
            return new Project();
        }

        $project = Project::where('id', base64_decode($project_id))->first();
        if (is_null($project)) {
            $project = new Project();
        }

        return $project;
    }

    /**
     * @author Terry Lucas
     * @param array $attributes
     * @param array $task
     * @return bool
     * @throws \Exception
     */
    public function uporcreateProject(array $attributes, array $project): bool
    {
        try {
            $res = Project::updateOrCreate($attributes, $project);
        } catch (\Exception $exception) {
            throw  $exception;
        }

        return (is_null($res) || !isset($res)) ? FALSE : TRUE;
    }

    /**
     * @author Terry Lucas
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getProjects($project_id = NULL)
    {
        return (isset($project_id)) ? $this->getProject() : Project::all();
    }

    /**
     * @author Terry Lucas
     * @param $project_id
     * @return Collection
     */
    public function getProjectTasks($project_id): Collection
    {
        return Project::find($project_id)->tasks;
    }
}