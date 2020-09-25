<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCartRequest extends FormRequest
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
            'customerName' => 'required',
            'customerAddress' => 'required',
            'customerPhone' => 'required'
        ];
    }

    public function messages(){
        return[
            'customerName.required' => 'Vui lòng điền tên của bạn!',
            'customerAddress.required' =>'Vui lòng điền địa chỉ!',
            'customerAddress.required' =>'Vui lòng điền số điện thoại!'
        ];
    }
}
