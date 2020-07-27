<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GeneralContentRequest extends FormRequest
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
            'spotlight_text'   => 'required',
            'form_description' => 'required',
            'game_name'        => 'required',
            'phrase'           => 'required'
        ];
    }

    /**
     * @return array|string[]
     */
    public function messages()
    {
        return [
            'spotlight_text.required'   => 'O campo Texto de Destaque é obrigatório',
            'game_name.required'        => 'O campo Nome do Jogo é obrigatório',
            'phrase.required'           => 'O campo Frase é obrigatório',
            'form_description.required' => 'O campo Descrição do Formulário é obrigatório',
        ];
    }
}
