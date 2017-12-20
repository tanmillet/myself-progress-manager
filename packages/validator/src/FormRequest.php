<?php

namespace LucasRBAC\Validator;

use Illuminate\Support\Facades\Validator;

/**
 * Class FormRequest
 * Author Terry Lucas
 * @package LucasRBAC\Validator
 *
 */
abstract class FormRequest
{
    /**
     * @var array
     */
    public $validateMessages = [];
    /**
     * @var array
     */
    public $validateRules = [];
    /**
     * @var array
     */
    public $validateParams = [];

    /**
     * @var array
     */
    public $validateReturnMsg = [];

    /**
     * @var array
     */
    public $validatorResMsg = [];

    /**
     * @author: promise tan
     * @return array
     */
    public function getValidatorResMsg()
    {
        return $this->validatorResMsg;
    }

    /**
     * @author: promise tan
     * @param array $validatorResMsg
     * @return FormRequest
     */
    public function setValidatorResMsg($validatorResMsg)
    {
        $this->validatorResMsg = $validatorResMsg;

        return $this;
    }

    /**
     * @return array
     */
    public function valid()
    {
        $validator = Validator::make($this->getValidateParams(), $this->getValidateRules(), $this->getValidateMessages(), $this->getValidateReturnMsg());
        $validator->setAttributeNames($this->getValidateReturnMsg());

        if ($validator->fails()) {
            $validatorRes = $validator->messages()->all();
            $this->setValidatorResMsg($validatorRes);
        }

        return $this;
    }

    /**
     * @return array
     */
    public function getValidateMessages()
    {
        //系统提供的原生校验规则错误提示
        return [
            "accepted" => ":attribute 必须接受。",
            "active_url" => ":attribute 不是一个有效的网址。",
            "after" => ":attribute 必须是一个在 :date 之后的日期。",
            "alpha" => ":attribute 只能由字母组成。",
            "alpha_dash" => ":attribute 只能由字母、数字和斜杠组成。",
            "alpha_num" => ":attribute 只能由字母和数字组成。",
            "array" => ":attribute 必须是一个数组。",
            "before" => ":attribute 必须是一个在 :date 之前的日期。",
            "between" =>  ":attribute 字数必须介于 :min - :max 之间。",
            "boolean" => ":attribute 必须为布尔值。",
            "confirmed" => ":attribute 两次输入不一致。",
            "date" => ":attribute 不是一个有效的日期。",
            "date_format" => ":attribute 的格式必须为 :format。",
            "different" => ":attribute 和 :other 必须不同。",
            "digits" => ":attribute 必须是 :digits 位的数字。",
            "digits_between" => ":attribute 必须是介于 :min 和 :max 位的数字。",
            "email" => ":attribute 不是一个合法的邮箱。",
            "exists" => ":attribute 不存在。",
            "filled" => ":attribute 不能为空。",
            "image" => ":attribute 必须是图片。",
            "in" => "已选的属性 :attribute 非法。",
            "integer" => ":attribute 必须是整数。",
            "ip" => ":attribute 必须是有效的 IP 地址。",
            "max" => ":attribute 不能大于 :max。",
            "mimes" => ":attribute 必须是一个 :values 类型的文件。",
            "min" =>  ":attribute 必须大于等于 :min。",
            "not_in" => "已选的属性 :attribute 非法。",
            "numeric" => ":attribute 必须是一个数字。",
            "regex" => ":attribute 格式不正确。",
            "required" => ":attribute 不能为空。",
            "required_if" => "当 :other 为 :value 时 :attribute 不能为空。",
            "required_with" => "当 :values 存在时 :attribute 不能为空。",
            "required_with_all" => "当 :values 存在时 :attribute 不能为空。",
            "required_without" => "当 :values 不存在时 :attribute 不能为空。",
            "required_without_all" => "当 :values 都不存在时 :attribute 不能为空。",
            "same" => ":attribute 和 :other 必须相同。",
            "size" => [
                "numeric" => ":attribute 大小必须为 :size。",
                "file" => ":attribute 大小必须为 :size kb。",
                "string" => ":attribute 必须是 :size 个字符。",
                "array" => ":attribute 必须为 :size 个单元。"
            ],
            "timezone" => ":attribute 必须是一个合法的时区值。",
            "unique" => ":attribute 已经存在。",
            "url" => ":attribute 格式不正确。",
            //自定义规则校验错误提示
            "phone" => ":attribute 格式不正确。",
            "idnumber" => ":attribute 格式不正确。",
            "mobile_phone" => ":attribute 格式不正确。",
            "same_phone" => ":attribute 需要与之前填写的手机号不一致。",
            "identify_code"=>":attribute 无效",
            "qqemail"=>":attribute 格式不正确"
        ];
    }

    /**
     * @return array
     */
    public function getValidateParams()
    {
        return $this->validateParams;
    }

    /**
     * @author: promise tan
     * @param array $validateMessages
     * @return FormRequest
     */
    public function setValidateMessages($validateMessages)
    {
        $this->validateMessages = $validateMessages;

        return $this;
    }

    /**
     * @author: promise tan
     * @param array $validateRules
     * @return FormRequest
     */
    public function setValidateRules($validateRules)
    {
        $this->validateRules = $validateRules;

        return $this;
    }

    /**
     * @author: promise tan
     * @param array $validateParams
     * @return FormRequest
     */
    public function setValidateParams($validateParams)
    {
        $this->validateParams = $validateParams;

        return $this;
    }

    /**
     * @author: promise tan
     * @param array $validateReturnMsg
     * @return FormRequest
     */
    public function setValidateReturnMsg($validateReturnMsg)
    {
        $this->validateReturnMsg = $validateReturnMsg;

        return $this;
    }

    /**
     * @return array
     */
    public function getValidateRules()
    {
        return [];
    }

    /**
     * @return array
     */
    public function getValidateReturnMsg()
    {
        return [];
    }
}