<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class TeamRequest extends FormRequest
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
            'name' => 'required',
            'image' => 'required',
            'position' => 'required',
        ];
    }

    protected function failedValidation(Validator $validator) { 
        throw new HttpResponseException(
            response()->json([
                'code' => config('constants.HTTP.CODE.UNPROCESS'),
                'status_code' => config('constants.STATUS.CODE.FAILED'),
                'message' => __('messages.api.error.form_input'),
                'data' => $validator->messages()->all()
            ], 200)
        ); 
    }
}
