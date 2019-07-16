<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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


                'status' => 'required',
                'track_code' => 'required|min:5'


        ];
    }

    public function messages()
    {
        return [

            'status.required' => "Por favor preencha o campo da order",
            'track_code.required' => "Preencha o codigo de envio",
            'track_code.min' => "o track code digitado é muito curto"

        ];
    }
}
