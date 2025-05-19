<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Facture extends Model
{
    use HasFactory;

    protected $fillable = ['numero_facture', 'date_facture', 'client_id', 'mode_paiement'];
    protected $appends = ['total_ht', 'tva', 'total_ttc'];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function articles()
    {
        return $this->belongsToMany(Article::class, 'facture_articles')
                    ->withPivot('quantite', 'prix_ht')
                    ->withTimestamps();
    }
    // In Facture Model

public function getTotalHtAttribute()
{
    return $this->articles->sum(function ($article) {
        return $article->pivot->quantite * $article->pivot->prix_ht;
    });
}

public function getTvaAttribute()
{
    return $this->total_ht * 0.20; // Assuming 20% TVA
}

public function getTotalTtcAttribute()
{
    return $this->total_ht + $this->tva;
}


}
