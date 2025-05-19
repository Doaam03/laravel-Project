<?php

namespace App\Http\Controllers;

use App\Models\Facture;
use App\Models\Client;
use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Requests\FactureRequest;
use Barryvdh\DomPDF\Facade\Pdf;

class FactureController extends Controller
{
    public function index()
    {
        $factures = Facture::with('client')->latest()->paginate(10);
        return view('factures.index', compact('factures'));
    }

    public function create()
    {
        $clients = Client::all();
        return view('factures.create', compact('clients'));
    }

    public function store(FactureRequest $request)
    {
        $facture = Facture::create([
            'numero_facture' => $request->numero_facture,
            'date_facture' => $request->date_facture,
            'client_id' => $request->client_id,
            'mode_paiement' => $request->mode_paiement,
        ]);

        foreach ($request->articles as $index => $articleId) {
            $facture->articles()->attach($articleId, [
                'quantite' => $request->quantites[$index],
                'prix_ht' => Article::find($articleId)->prix_ht,
            ]);
        }

        return redirect()->route('factures.index')->with('success', 'Facture créée avec succès.');
    }

    public function show(Facture $facture)
    {
        $facture->load('client', 'articles');
        return view('factures.show', compact('facture'));
    }

    public function download(Facture $facture)
    {
        $facture->load('client', 'articles');
        $pdf = Pdf::loadView('factures.pdf', compact('facture'));

        return $pdf->download('Facture_' . $facture->numero_facture . '.pdf');
    }

    public function preview(Request $request)
    {
        $client = Client::findOrFail($request->client_id);
        $articles = [];
    
        foreach ($request->articles as $index => $articleId) {
            $article = Article::findOrFail($articleId);
            $quantite = $request->quantites[$index];
            $articles[] = (object) [
                'designation' => $article->designation,  // Correctement nommée 'designation'
                'prix_ht' => $article->prix_ht,
                'quantite' => $quantite,
            ];
        }
    
        $total_ht = collect($articles)->sum(fn($a) => $a->prix_ht * $a->quantite);
        $tva = $total_ht * 0.20;
        $total_ttc = $total_ht + $tva;


    
        $data = [
            'numero_facture' => $request->numero_facture ,
            'date_facture' => $request->date_facture ?? now()->format('Y-m-d'),
            'client' => $client,
            'mode_paiement' => $request->mode_paiement,
            'articles' => $articles,
            'total_ht' => $total_ht,
            'tva' => $tva,
            'total_ttc' => $total_ttc,
        ];
    
        $pdf = Pdf::loadView('factures.pdf', $data);
    
        return response($pdf->output(), 200)
            ->header('Content-Type', 'application/pdf');
    }
    

}
