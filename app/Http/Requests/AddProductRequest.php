<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddProductRequest extends FormRequest
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
            'img' => 'image',
            'price' => 'required|integer',
            'promotionprice' => 'required|integer'
        ];
    }
    public function messages(){
        return[
        'price.required' => 'Giá không được để trống!',
        'price.integer' => 'Giá phải là số từ 0-9!',
        'promotionprice.required' => 'Giá khuyến mãi không được để trống!',
        'promotionprice.integer' => 'Giá khuyễn mãi phải là số từ 0-9!'
    ];
    }
}
