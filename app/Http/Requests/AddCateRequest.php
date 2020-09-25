<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddCateRequest extends FormRequest
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
            'tendanhmuc' => 'unique:vp_categories,cate_name'
        ];
    }
    public function messages(){
        return[
        'tendanhmuc.unique' => 'Tên danh mục đã có sẵn!'
    ];
    }

    
}
