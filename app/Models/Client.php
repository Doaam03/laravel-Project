<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
 
class Client extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'type_client', 'telephone', 'email', 'ICE', 'IF'];

    public function articles()
    {
        return $this->hasMany(Article::class);
        
    }

    public function factures()
    {
        return $this->hasMany(Facture::class);
    }
}


