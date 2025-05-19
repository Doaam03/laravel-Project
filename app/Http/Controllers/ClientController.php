<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientRequest;
use App\Models\Client;
use Illuminate\Http\Request;
use App\Models\Article;

class ClientController extends Controller
{
    public function getArticles(Client $client)
    {
        $articles = $client->articles; // La relation doit exister dans le modèle Client
        return response()->json($articles);
    }
    

    public function index(Request $request)
{
    $search = $request->input('search');
    $typeClient = $request->input('type_client'); // Récupérer le type client filtré

    // Appliquer le filtre par type client seulement si un type est sélectionné
    $clients = Client::when($search, function ($query, $search) {
            return $query->where('nom', 'like', "%$search%")
                         ->orWhere('type_client', 'like', "%$search%")
                         ->orWhere('telephone', 'like', "%$search%");
        })
        ->when($typeClient, function ($query, $typeClient) {
            return $query->where('type_client', $typeClient);
        })
        ->paginate(4);

    return view('clients.index', compact('clients', 'search', 'typeClient'));
}


    public function create()
    {
        return view('clients.create');
    }

    public function store(ClientRequest $request)
    {
        if ($request->type_client === 'particulier') {
            $clientExist = Client::where('nom', $request->nom)
                                 ->where('telephone', $request->telephone)
                                 ->exists();
        } else {
            $clientExist = Client::where('ICE', $request->ICE)
                                 ->where('IF', $request->IF)
                                 ->exists();
        }

        if ($clientExist) {
            return redirect()->back()->withErrors(['client_exists' => 'Ce client existe déjà.'])->withInput();
        }

        if ($request->type_client === 'particulier') {
            $request->merge([
                'ICE' => str_pad('0', 15, '0'),
                'IF' => str_pad('0', 8, '0')
            ]);
        }

        Client::create($request->all());

        return redirect()->route('clients.index')->with('status', 'Client ajouté avec succès!');
    }

    public function edit(Client $client)
    {
        return view('clients.edit', compact('client'));
    }

    public function update(ClientRequest $request, Client $client)
    {
        if ($request->type_client === 'particulier') {
            $clientExist = Client::where('nom', $request->nom)
                                 ->where('telephone', $request->telephone)
                                 ->where('id', '!=', $client->id)
                                 ->exists();
        } else {
            $clientExist = Client::where('ICE', $request->ICE)
                                 ->where('IF', $request->IF)
                                 ->where('id', '!=', $client->id)
                                 ->exists();
        }

        if ($clientExist) {
            return redirect()->back()->withErrors(['client_exists' => 'Ce client existe déjà.'])->withInput();
        }

        if ($request->type_client === 'particulier') {
            $request->merge([
                'ICE' => str_pad('0', 15, '0'),
                'IF' => str_pad('0', 8, '0')
            ]);
        }

        $client->update($request->all());

        return redirect()->route('clients.index')->with('status', 'Client mis à jour avec succès!');
    }

    public function show(Client $client)
    {
        return view('clients.show', compact('client'));
    }

    public function destroy(Client $client)
    {
        $client->delete();
        return redirect()->route('clients.index')->with('success', 'Client supprimé avec succès.');
    }
}
