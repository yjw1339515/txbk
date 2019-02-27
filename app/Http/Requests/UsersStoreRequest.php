<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * 存放验证规则
     *
     * @return array
     */
    public function rules()
    {
        return [
                'uname' => 'required|regex:/^[a-zA-Z]{1}[\w]{7,15}$/',
                'upwd' => 'required|regex:/^[\w]{8,16}$/',
                'reupwd' => 'required|same:upwd',
                'sex' => 'required',
                'email' => 'required|email',
                'tel' => 'required|regex:/^1{1}[3-9]{1}[\d]{9}$/',
            ];
    }
    // 自定义错误信息
    public function messages()
    {
        return [
                'uname.required'=>'姓名必填',
                'uname.regex'=>'姓名格式不正确',
                'upwd.required'=>'密码必填',
                'upwd.regex'=>'密码格式不正确',
                'reupwd.required'=>'确认密码必填',
                'reupwd.same'=>'两次密码不一致',
                'sex.required'=>'性别必填',
                'email.required'=>'邮箱必填',
                'email.email'=>'邮箱格式不正确',
                'tel.required'=>'电话必填',
                'tel.regex'=>'电话格式不正确',
            ];
    }
}
