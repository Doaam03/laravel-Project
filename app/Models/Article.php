<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Article extends Model
{
    use HasFactory;

    protected $fillable = ['designation', 'prix_ht', 'client_id'];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function factures()
    {
        return $this->belongsToMany(Facture::class, 'facture_articles')
                    ->withPivot('quantite', 'prix_ht')
                    ->withTimestamps();
    }
}


