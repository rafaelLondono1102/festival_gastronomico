<?php

namespace App\Http\Requests\api\v1;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;


class RestaurantUpdateRequest extends FormRequest
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
            'user_id' => 'exists:users,id',
            "name" => "min:5|max:50",
            'description' => 'min:10',
            'city'        => 'min:5|max:30',
            'phone'       => 'alpha_dash|min:10|max:10',
            'category_id' => 'exists:categories,id',
            'delivery'    => [
                '',
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
