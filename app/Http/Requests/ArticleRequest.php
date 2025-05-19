<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'designation' => 'required|string|max:255',
            'prix_ht' => 'required|numeric',
            'client_id' => 'required|exists:clients,id',
        ];
    }

    public function messages()
    {
        return [
            'designation.required' => 'Le nom de l\'article est obligatoire.',
            'prix_ht.required' => 'Le prix est obligatoire.',
            'client_id.required' => 'Le client est obligatoire.',
        ];
    }
}
