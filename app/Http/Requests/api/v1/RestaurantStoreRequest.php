<?php

namespace App\Http\Requests\api\v1;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;



class RestaurantStoreRequest extends FormRequest
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
            'name' => "required|unique:restaurants,name|min:5|max:50",
            'description' => 'required|string|min:10',
            'city'        => 'required|string|min:5|max:30',
            'phone'       => 'required|min:10|max:10',
            'category_id' => 'required|exists:categories,id',
            'delivery'    => [
                'required',
                Rule::in(['y', 'n']),
            ],
        ];
    }

    public function failedValidation(Validator $validator)
 {
    throw new HttpResponseException(response()->json($validator->errors(),
    422));
 }

}
