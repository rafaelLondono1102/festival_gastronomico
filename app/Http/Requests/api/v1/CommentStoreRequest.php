<?php

namespace App\Http\Requests\api\v1;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;


class CommentStoreRequest extends FormRequest
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
            "comment" => "required|min:3",
            "score" => "required|numeric|min:1|max:5",
            "user_id" => "required|exists:users,id",
            "restaurant_id" => "required|exists:restaurants,id"
        ];
    }

    public function failedValidation(Validator $validator)
 {
    throw new HttpResponseException(response()->json($validator->errors(),
    422));
 }

}
