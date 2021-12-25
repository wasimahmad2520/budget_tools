<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use App\Models\Account;
class CreateAccountRequest extends FormRequest
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
        return Account::$rules;
    }


   /**
     * Custom message for validation
     *
     * @return array
     */
    // public function messages()
    // {
    //     return [
    //         "title.required" => "Please write a title",
    //         "title.min" => "The title has to have at least :min characters.",
    //         "title.max" => "The title has to have no more than :max characters.",
    //         "body_content.required" => "Please write some content",
    //         "body_content.min" => "The content has to have at least :min characters",
    //     ];
    // }

}
