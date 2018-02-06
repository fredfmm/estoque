<?php

namespace estoque\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
             'email' => 'required|max:100',
             'password' => 'required|max:255'
         ];
     }


     public function messages(){
         return [
             'required' => 'T2he :attribute field can not be empty.'
         ];

         //apicar aregra apenas no campo nome
         //'nome,required' => 'The :attribute field can not be empty'
     }
}
