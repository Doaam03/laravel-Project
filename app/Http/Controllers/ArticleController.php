<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Models\Client;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $query = Article::with('client');
    
        if ($request->filled('annee')) {
            $query->whereYear('created_at', $request->annee);
        }
    
        $articles = $query->latest()->paginate(5);
    
        $annees = Article::selectRaw('YEAR(created_at) as annee')
            ->distinct()
            ->orderByDesc('annee')
            ->pluck('annee');
    
        return view('article.index', compact('articles', 'annees'));
    }
    

    public function create()
    {
        $clients = Client::all();
        return view('article.create', compact('clients'));
    }

    public function store(ArticleRequest $request)
    {
        Article::create($request->validated());
        return redirect()->route('articles.index')->with('success', 'Article ajouté avec succès.');
    }

    public function show(Article $article)
    {
        return view('article.show', compact('article'));
    }

    public function edit(Article $article)
    {
        $clients = Client::all();
        return view('article.edit', compact('article', 'clients'));
    }

    public function update(ArticleRequest $request, Article $article)
    {
        $article->update($request->validated());
        return redirect()->route('articles.index')->with('success', 'Article mis à jour.');
    }

    public function destroy(Article $article)
    {
        $article->delete();
        return back()->with('success', 'Article supprimé.');
    }
}

