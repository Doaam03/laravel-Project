<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FactureRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'numero_facture' => ['required', 'unique:factures,numero_facture', 'regex:/^F-\d+$/'],
            'client_id' => 'required|exists:clients,id',
            'mode_paiement' => 'required|string',
            'articles' => 'required|array|min:1',
            'quantites' => 'required|array|min:1',
            'date_facture' => 'required|date',
        ];
    }

    public function messages()
    {
        return [
            'numero_facture.required' => 'Le numéro de facture est obligatoire.',
            'numero_facture.unique' => 'Ce numéro de facture existe déjà.',
            'numero_facture.regex' => 'Le numéro de facture doit commencer par "F-" suivi de chiffres (ex: F-123).',

            'client_id.required' => 'Le client est obligatoire.',
            'client_id.exists' => 'Le client sélectionné est invalide.',

            'mode_paiement.required' => 'Le mode de paiement est obligatoire.',
            'mode_paiement.string' => 'Le mode de paiement doit être une chaîne de caractères.',

            'articles.required' => 'Veuillez sélectionner au moins un article.',
            'articles.array' => 'Les articles doivent être un tableau.',

            'quantites.required' => 'Veuillez spécifier la quantité pour chaque article.',
            'quantites.array' => 'Les quantités doivent être un tableau.',

            'date_facture.required' => 'La date de la facture est obligatoire.',
            'date_facture.date' => 'La date de la facture doit être une date valide.',
        ];
    }
}
