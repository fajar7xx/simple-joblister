<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'email' => 'required|email',
            'subject' => 'required',
            'messages' => 'required|min:50'
        ];
    }

    public function messages()
    {
        return [
            'required' => 'kolom :attribute wajib di isi',
            'min' => 'minimal karakter :min'
        ];
    }
}
