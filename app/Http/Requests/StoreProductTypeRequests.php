<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductTypeRequests extends FormRequest
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
            'name'=>'required|min:2|max:255|unique:producttype,name',
        ];
    }
    
    public function messages(){
        return [
            'required'=>':attribute need to be fill',
            'min'=>':attribute must be 2-255 char',
            'max'=>':attribute must be 2-255 char',
            'unique'=>':attribute have been existed yet'
        ];
    }
    
    public function attributes(){
        return [
            'name'=>'name of producttype',
        ];
    }
}
