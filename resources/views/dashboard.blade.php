<x-app-layout>
    <div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 dark:from-gray-900 dark:to-gray-800">
        <!-- Main Content -->
        <main class="p-6 lg:p-8 max-w-7xl mx-auto">
            <!-- Header avec indicateurs clés -->
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-8 gap-4">
                <div class="flex items-center gap-4">
                    <div class="p-3 bg-blue-100 dark:bg-blue-900/30 rounded-xl text-blue-600 dark:text-blue-300 transition-all duration-300 hover:rotate-6 hover:scale-105">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-3xl font-bold text-gray-800 dark:text-white">Tableau de Bord Facturation</h1>
                        <p class="text-gray-500 dark:text-gray-400">Gestion complète des clients, articles et factures</p>
                    </div>
                </div>
                
                <!-- Statistiques globales -->
                <div class="flex gap-4 flex-wrap">
                    <div class="bg-white dark:bg-gray-800/90 px-4 py-2 rounded-lg shadow-xs border border-gray-100 dark:border-gray-700 transition-all duration-300 hover:shadow-md hover:-translate-y-1">
                        <p class="text-sm text-gray-500 dark:text-gray-400">Clients</p>
                        <p class="font-bold text-blue-600 dark:text-blue-400">{{ App\Models\Client::count() }}</p>
                    </div>
                    <div class="bg-white dark:bg-gray-800/90 px-4 py-2 rounded-lg shadow-xs border border-gray-100 dark:border-gray-700 transition-all duration-300 hover:shadow-md hover:-translate-y-1">
                        <p class="text-sm text-gray-500 dark:text-gray-400">Factures ce mois</p>
                        <p class="font-bold text-green-600 dark:text-green-400">{{ App\Models\Facture::whereMonth('date_facture', now()->month)->count() }}</p>
                    </div>
                    <div class="bg-white dark:bg-gray-800/90 px-4 py-2 rounded-lg shadow-xs border border-gray-100 dark:border-gray-700 transition-all duration-300 hover:shadow-md hover:-translate-y-1">
                        <p class="text-sm text-gray-500 dark:text-gray-400">CA Total</p>
                        <p class="font-bold text-purple-600 dark:text-purple-400">{{ number_format(App\Models\Facture::with('articles')->get()->sum('total_ttc'), 2) }} MAD</p>
                    </div>
                    <div class="bg-white dark:bg-gray-800/90 px-4 py-2 rounded-lg shadow-xs border border-gray-100 dark:border-gray-700 transition-all duration-300 hover:shadow-md hover:-translate-y-1">
                        <p class="text-sm text-gray-500 dark:text-gray-400">Articles</p>
                        <p class="font-bold text-yellow-600 dark:text-yellow-400">{{ App\Models\Article::count() }}</p>
                    </div>
                </div>
            </div>

            <!-- Widgets Principaux -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                <!-- Widget Clients -->
                <div class="bg-white dark:bg-gray-800/90 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700 overflow-hidden transition-all duration-300 hover:shadow-lg hover:-translate-y-2">
                    <div class="p-6">
                        <div class="flex items-center gap-4 mb-4">
                            <div class="p-3 bg-blue-100 dark:bg-blue-900/20 rounded-lg text-blue-600 dark:text-blue-300 transition-all duration-300 hover:rotate-12">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                            </div>
                            <div>
                                <h2 class="text-xl font-semibold text-gray-800 dark:text-white">Clients</h2>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Gestion de votre portefeuille clients</p>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-3">
                            <a href="{{ route('clients.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium py-2 px-3 rounded-lg flex items-center justify-center gap-2 transition-all duration-300 hover:shadow-md">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                </svg>
                                Nouveau
                            </a>
                            <a href="{{ route('clients.index') }}" class="bg-gray-100 hover:bg-gray-200 dark:bg-gray-700 dark:hover:bg-gray-600 text-gray-800 dark:text-white text-sm font-medium py-2 px-3 rounded-lg flex items-center justify-center gap-2 transition-all duration-300 hover:shadow-md">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                </svg>
                                Liste
                            </a>
                        </div>
                    </div>
                    <div class="bg-gray-50 dark:bg-gray-700/30 px-6 py-3 border-t border-gray-100 dark:border-gray-700">
                        @php $lastClient = App\Models\Client::latest()->first(); @endphp
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-500 dark:text-gray-400">Dernier ajout</span>
                            <span class="font-medium text-gray-700 dark:text-gray-300">{{ $lastClient ? $lastClient->nom : 'Aucun client' }}</span>
                        </div>
                    </div>
                </div>

                <!-- Widget Articles -->
                <div class="bg-white dark:bg-gray-800/90 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700 overflow-hidden transition-all duration-300 hover:shadow-lg hover:-translate-y-2">
                    <div class="p-6">
                        <div class="flex items-center gap-4 mb-4">
                            <div class="p-3 bg-green-100 dark:bg-green-900/20 rounded-lg text-green-600 dark:text-green-300 transition-all duration-300 hover:rotate-12">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                                </svg>
                            </div>
                            <div>
                                <h2 class="text-xl font-semibold text-gray-800 dark:text-white">Articles</h2>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Produits et services personnalisés</p>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-3">
                            <a href="{{ route('articles.create') }}" class="bg-green-600 hover:bg-green-700 text-white text-sm font-medium py-2 px-3 rounded-lg flex items-center justify-center gap-2 transition-all duration-300 hover:shadow-md">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                </svg>
                                Nouveau
                            </a>
                            <a href="{{ route('articles.index') }}" class="bg-gray-100 hover:bg-gray-200 dark:bg-gray-700 dark:hover:bg-gray-600 text-gray-800 dark:text-white text-sm font-medium py-2 px-3 rounded-lg flex items-center justify-center gap-2 transition-all duration-300 hover:shadow-md">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                </svg>
                                Liste
                            </a>
                        </div>
                    </div>
                    <div class="bg-gray-50 dark:bg-gray-700/30 px-6 py-3 border-t border-gray-100 dark:border-gray-700">
                        @php $lastArticle = App\Models\Article::latest()->first(); @endphp
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-500 dark:text-gray-400">Dernier ajout</span>
                            <span class="font-medium text-gray-700 dark:text-gray-300">{{ $lastArticle ? $lastArticle->designation . ' (' . number_format($lastArticle->prix_ht, 2) . ' MAD)' : 'Aucun article' }}</span>
                        </div>
                    </div>
                </div>

                <!-- Widget Factures -->
                <div class="bg-white dark:bg-gray-800/90 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700 overflow-hidden transition-all duration-300 hover:shadow-lg hover:-translate-y-2">
                    <div class="p-6">
                        <div class="flex items-center gap-4 mb-4">
                            <div class="p-3 bg-purple-100 dark:bg-purple-900/20 rounded-lg text-purple-600 dark:text-purple-300 transition-all duration-300 hover:rotate-12">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 14l6-6m-5.5.5h.01m4.99 5h.01M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16l3.5-2 3.5 2 3.5-2 3.5 2z" />
                                </svg>
                            </div>
                            <div>
                                <h2 class="text-xl font-semibold text-gray-800 dark:text-white">Factures</h2>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Génération et suivi des factures</p>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-3">
                            <a href="{{ route('factures.create') }}" class="bg-purple-600 hover:bg-purple-700 text-white text-sm font-medium py-2 px-3 rounded-lg flex items-center justify-center gap-2 transition-all duration-300 hover:shadow-md">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                </svg>
                                Nouvelle
                            </a>
                            <a href="{{ route('factures.index') }}" class="bg-gray-100 hover:bg-gray-200 dark:bg-gray-700 dark:hover:bg-gray-600 text-gray-800 dark:text-white text-sm font-medium py-2 px-3 rounded-lg flex items-center justify-center gap-2 transition-all duration-300 hover:shadow-md">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                </svg>
                                Liste
                            </a>
                        </div>
                    </div>
                    <div class="bg-gray-50 dark:bg-gray-700/30 px-6 py-3 border-t border-gray-100 dark:border-gray-700">
                        @php $lastFacture = App\Models\Facture::with('client')->latest()->first(); @endphp
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-500 dark:text-gray-400">Dernière facture</span>
                            <span class="font-medium text-gray-700 dark:text-gray-300">
                                @if($lastFacture)
                                    {{ $lastFacture->numero_facture }} - {{ $lastFacture->client->nom }} ({{ number_format($lastFacture->total_ttc, 2) }} MAD)
                                @else
                                    Aucune facture
                                @endif
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Section Dernières Factures -->
            <div class="bg-white dark:bg-gray-800/90 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700 overflow-hidden mb-8 transition-all duration-300 hover:shadow-lg">
                <div class="p-6 border-b border-gray-100 dark:border-gray-700 flex justify-between items-center">
                    <h2 class="text-xl font-semibold text-gray-800 dark:text-white">Dernières Factures</h2>
                    <span class="text-sm text-blue-600 dark:text-blue-400">{{ App\Models\Facture::count() }} factures au total</span>
                </div>
                <div class="divide-y divide-gray-100 dark:divide-gray-700">
                    @php $latestInvoices = App\Models\Facture::with('client')->latest()->take(3)->get(); @endphp
                    
                    @forelse($latestInvoices as $invoice)
                    <div class="p-4 hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors duration-300 group">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-4">
                                <div class="p-2 bg-blue-100 dark:bg-blue-900/20 rounded-lg text-blue-600 dark:text-blue-300 transition-all duration-300 group-hover:scale-110">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 14l6-6m-5.5.5h.01m4.99 5h.01M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16l3.5-2 3.5 2 3.5-2 3.5 2z" />
                                    </svg>
                                </div>
                                <div>
                                    <h3 class="font-medium text-gray-800 dark:text-white">{{ $invoice->numero_facture }} - {{ $invoice->client->nom }}</h3>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">{{ $invoice->date_facture}} - {{ ucfirst($invoice->mode_paiement) }}</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <p class="font-semibold text-gray-800 dark:text-white">{{ number_format($invoice->total_ttc, 2) }} MAD</p>
                                <p class="text-sm {{ $invoice->mode_paiement === 'virement' ? 'text-green-600 dark:text-green-400' : 'text-blue-600 dark:text-blue-400' }}">
                                    {{ ucfirst($invoice->mode_paiement) }}
                                </p>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="p-4 text-center text-gray-500 dark:text-gray-400">
                        Aucune facture disponible
                    </div>
                    @endforelse
                    
                    <!-- Lien vers toutes les factures -->
                    <div class="p-4 text-center bg-gray-50 dark:bg-gray-700/30">
                        <a href="{{ route('factures.index') }}" class="text-sm font-medium text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300 flex items-center justify-center gap-1 transition-all duration-300 hover:gap-2">
                            Voir toutes les factures
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Section Actions Rapides et Statistiques -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Création Rapide -->
                <div class="bg-white dark:bg-gray-800/90 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700 p-6 transition-all duration-300 hover:shadow-md">
                    <h2 class="text-lg font-semibold text-gray-800 dark:text-white mb-4">Création Rapide</h2>
                    <div class="space-y-3">
                        <a href="{{ route('clients.create') }}" class="flex items-center gap-3 p-3 rounded-lg border border-gray-200 dark:border-gray-600 hover:bg-gray-50 dark:hover:bg-gray-700 transition-all duration-300 hover:translate-x-2">
                            <div class="p-2 bg-blue-100 dark:bg-blue-900/20 rounded-lg text-blue-600 dark:text-blue-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                                </svg>
                            </div>
                            <span class="font-medium text-gray-700 dark:text-gray-300">Nouveau Client</span>
                        </a>
                        <a href="{{ route('articles.create') }}" class="flex items-center gap-3 p-3 rounded-lg border border-gray-200 dark:border-gray-600 hover:bg-gray-50 dark:hover:bg-gray-700 transition-all duration-300 hover:translate-x-2">
                            <div class="p-2 bg-green-100 dark:bg-green-900/20 rounded-lg text-green-600 dark:text-green-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                </svg>
                            </div>
                            <span class="font-medium text-gray-700 dark:text-gray-300">Nouvel Article</span>
                        </a>
                        <a href="{{ route('factures.create') }}" class="flex items-center gap-3 p-3 rounded-lg border border-gray-200 dark:border-gray-600 hover:bg-gray-50 dark:hover:bg-gray-700 transition-all duration-300 hover:translate-x-2">
                            <div class="p-2 bg-purple-100 dark:bg-purple-900/20 rounded-lg text-purple-600 dark:text-purple-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 14l6-6m-5.5.5h.01m4.99 5h.01M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16l3.5-2 3.5 2 3.5-2 3.5 2z" />
                                </svg>
                            </div>
                            <span class="font-medium text-gray-700 dark:text-gray-300">Nouvelle Facture</span>
                        </a>
                    </div>
                </div>

                <!-- Statistiques -->
                <div class="bg-white dark:bg-gray-800/90 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700 p-6 transition-all duration-300 hover:shadow-md">
                    <h2 class="text-lg font-semibold text-gray-800 dark:text-white mb-4">Statistiques</h2>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="bg-blue-50 dark:bg-blue-900/10 p-4 rounded-lg transition-all duration-300 hover:scale-[1.02]">
                            <p class="text-sm text-blue-600 dark:text-blue-400">Clients Entreprises</p>
                            <p class="text-2xl font-bold text-blue-800 dark:text-blue-200">{{ App\Models\Client::where('type_client', 'entreprise')->count() }}</p>
                        </div>
                        <div class="bg-green-50 dark:bg-green-900/10 p-4 rounded-lg transition-all duration-300 hover:scale-[1.02]">
                            <p class="text-sm text-green-600 dark:text-green-400">Articles Moyens</p>
                            <p class="text-2xl font-bold text-green-800 dark:text-green-200">
                                @php
                                    $avgArticles = App\Models\Article::count();
                                    $avgClients = App\Models\Client::count();
                                    echo $avgClients > 0 ? number_format($avgArticles / $avgClients, 1) : '0';
                                @endphp
                            </p>
                        </div>
                        <div class="bg-purple-50 dark:bg-purple-900/10 p-4 rounded-lg transition-all duration-300 hover:scale-[1.02]">
                            <p class="text-sm text-purple-600 dark:text-purple-400">Factures</p>
                            <p class="text-2xl font-bold text-purple-800 dark:text-purple-200">{{ App\Models\Facture::count() }}</p>
                        </div>
                        <div class="bg-yellow-50 dark:bg-yellow-900/10 p-4 rounded-lg transition-all duration-300 hover:scale-[1.02]">
                            <p class="text-sm text-yellow-600 dark:text-yellow-400">CA Mensuel</p>
                            <p class="text-2xl font-bold text-yellow-800 dark:text-yellow-200">
                                @php
                                    $monthlyRevenue = App\Models\Facture::whereMonth('date_facture', now()->month)
                                        ->with('articles')
                                        ->get()
                                        ->sum('total_ttc');
                                    echo number_format($monthlyRevenue, 2) . ' MAD';
                                @endphp
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <style>
        /* Animation pour les cartes */
        .hover-rotate:hover {
            transform: rotate(2deg);
        }
        
        /* Transition douce pour les ombres */
        .shadow-transition {
            transition: box-shadow 0.3s ease-in-out;
        }
        
        /* Effet de profondeur */
        .depth-effect {
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }
        .depth-effect:hover {
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }
    </style>
</x-app-layout>