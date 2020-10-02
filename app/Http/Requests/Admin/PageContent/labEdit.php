<?php

namespace App\Http\Requests\Admin\PageContent;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class labEdit extends FormRequest
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
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'produce'=>'required|String',
            'pro_url'=> 'dimensions:min_width=100,min_height=200',
            'enviroment'=>'required|String',
            'env_url'=>'dimensions:min_width=100,min_height=200',
            'architect'=>'required|String',
            'arc_url'=>'dimensions:min_width=100,min_height=200',
            'direction'=>'required|String',
            'dir_url'=>'dimensions:min_width=100,min_height=200',

            'name'=>'required|String',
            'title'=>'required|String',
            'footer'=>'required|String',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw (new HttpResponseException(json_fail('参数错误!',$validator->errors()->all(),100)));
    }


}
