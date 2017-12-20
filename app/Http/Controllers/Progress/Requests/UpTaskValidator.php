<?php

namespace App\Http\Controllers\Progress\Requests;

use LucasRBAC\Validator\FormRequest;

/**
 * Class UpRoleValidator
 * Author Terry Lucas
 * @package App\Http\Controllers\Admin\Requests
 */
class UpTaskValidator extends FormRequest
{

    /**
     * @author Terry Lucas
     * @return array
     */
    public function getValidateRules()
    {
        return
            [
                'task_title'      => 'required',
                'task_priority'   => 'required',
                'task_start_date' => 'required',
                'task_end_date'   => 'required',
                'task_progress'   => 'required',
                'context'   => 'required',
            ];
    }


    /**
     * @author Terry Lucas
     * @return array
     */
    public function getValidateReturnMsg()
    {
        return
            [
                'task_title'      => '任务标题',
                'task_priority'   => '任务优先度',
                'task_progress'   => '任务进度',
                'task_start_date' => '任务开始时间',
                'task_end_date'   => '任务结束时间',
                'context'   => '任务内容',
            ];
    }

    /**
     * @author Terry Lucas
     * @return array
     */
    public function transform()
    {
        $task = [
            'task_title'      => $this->validateParams['task_title'],
            'task_priority'   => $this->validateParams['task_priority'],
            'task_progress'   => $this->validateParams['task_progress'],
            'task_start_date' => $this->validateParams['task_start_date'],
            'task_end_date'   => $this->validateParams['task_end_date'],
            'project_id'   => $this->validateParams['project_id'],
            'task_context'   => $this->validateParams['context'],
        ];

        return $task;
    }

}