<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OfferRequest extends FormRequest
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
    protected $provider = 'offers';

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules():array
    {
        return [
            'name_ar'=>['required','string','max:100','unique:offers'],
            'name_en'=>['required','string','max:100','unique:offers'],
           // 'name'=>'required|string|max:100|unique:'. $this -> provider,
            //'price'=>'required|double',
            'price'=>['required','double'],
           // 'detail'=>'required|string|max:200'
            'detail_ar'=>['required','string','max:200'],
            'detail_en'=>['required','string','max:200'],
            'photo'=>['required','string','max:255']
        ];
       
    }

    public function messages():array
    {
        return [
            'name_ar.required'=>__('messages.name Importint'),
             'name_ar.unique'=>__('messages.nameUnique'),
            'price.double'=>__('messages.price Number'),
            'price.required'=>__('messages.price Importint'),
            'detail_ar.required'=>__('messages.detail Importint'),
            'photo.required'=>__('messages.photo Importint'),

        ];
    }
}
