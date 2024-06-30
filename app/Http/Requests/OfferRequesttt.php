<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OfferRequesttt extends FormRequest
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
            'name'=>['required','string','max:100','unique:offers.name'],
            // 'name'=>'required|string|max:100|unique:'. $this -> provider,
             //'price'=>'required|double',
             'price'=>['required','double'],
            // 'detail'=>'required|string|max:200'
             'detail'=>['required','string','max:200']
        ];
    }
    
}
