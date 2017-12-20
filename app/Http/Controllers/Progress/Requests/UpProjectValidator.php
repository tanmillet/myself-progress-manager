<?php

namespace App\Http\Controllers\Progress\Requests;

use LucasRBAC\Validator\FormRequest;

/**
 * Class UpRoleValidator
 * Author Terry Lucas
 * @package App\Http\Controllers\Admin\Requests
 */
class UpProjectValidator extends FormRequest
{

    /**
     * @author Terry Lucas
     * @return array
     */
    public function getValidateRules()
    {
        return
            [
                'name' => 'required',
                'tag'         => 'required',
                'type'         => 'required',
                'status'         => 'required',
                'digest'         => 'required',
                'context'         => 'required',
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
                'name' => '项目名称',
                'tag'         => '项目标识',
                'type'         => '项目类型',
                'status'         => '项目状态',
                'digest'         => '项目摘要',
                'context'         => '项目信息',
            ];
    }

}