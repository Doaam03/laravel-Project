<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\FactureController;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');






  


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('clients', ClientController::class);
    Route::resource('articles', ArticleController::class);
   
    Route::resource('factures', FactureController::class);

    // Routes personnalisées :
    Route::post('/factures/preview', [FactureController::class, 'preview'])->name('factures.preview');
    Route::get('/factures/{facture}/download', [FactureController::class, 'download'])->name('factures.download');
    
    // API pour récupérer les articles d'un client
    Route::get('/clients/{client}/articles', function ($clientId) {
        $client = App\Models\Client::with('articles')->findOrFail($clientId);
        return response()->json($client->articles);
    });

});


require __DIR__.'/auth.php';
