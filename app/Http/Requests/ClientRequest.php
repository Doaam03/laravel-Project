<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
{
    /**
     * Détermine si l'utilisateur est autorisé à effectuer cette demande.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Règles de validation pour la demande.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'nom' => 'required|string|max:255',
            'type_client' => 'required|in:particulier,entreprise',
            'telephone' => 'required|string|max:15',
            'email' => 'required|email|max:255',
            'ICE' => 'required|nullable|digits:15|regex:/^[0-9]+$/',  // Validation de l'ICE
            'IF' => 'required|nullable|digits:8|regex:/^[0-9]+$/',    // Validation de l'IF
        ];

        // Si le client est particulier, on force les valeurs d'ICE et IF à 0
        if ($this->input('type_client') === 'particulier') {
            $rules['ICE'] = 'nullable|size:15';
            $rules['IF'] = 'nullable|size:8';
        }

        return $rules;
    }

    /**
     * Messages de validation personnalisés.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'nom.required' => 'Le nom est obligatoire.',
            'telephone.required' => 'Le numéro de téléphone est obligatoire.',
            'email.required' => 'L\'email est obligatoire.',
            'ICE.size' => 'Le code ICE doit comporter 15 chiffres.',
            'IF.size' => 'Le code IF doit comporter 8 chiffres.',
            'ICE.required' => 'Le ICE  obligatoire.',
            'IF.required' => 'Le  IF  obligatoire.',
            
        ];
    }
}

