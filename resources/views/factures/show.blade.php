<x-app-layout>
    <div class="p-6 bg-white dark:bg-gray-800 rounded shadow">
        <h2 class="text-2xl font-bold mb-6 text-gray-800 dark:text-white">
            Détail de la Facture : {{ $facture->numero_facture }}
        </h2>

        <div class="space-y-4 text-gray-700 dark:text-gray-300">
            <p><strong>Date :</strong> {{ \Carbon\Carbon::parse($facture->date_facture)->format('d/m/Y') }}</p>
            <p><strong>Client :</strong> {{ $facture->client->nom }}</p>
            <p><strong>Mode de Paiement :</strong> {{ ucfirst($facture->mode_paiement) }}</p>

            <h3 class="text-xl font-semibold mt-6">Articles</h3>
            <div class="overflow-x-auto">
                <table class="w-full table-auto text-sm text-left mt-2">
                    <thead class="text-gray-700 dark:text-gray-300 bg-gray-100 dark:bg-gray-700">
                        <tr>
                            <th class="px-4 py-2">Désignation</th>
                            <th class="px-4 py-2">Prix HT</th>
                            <th class="px-4 py-2">Quantité</th>
                            <th class="px-4 py-2">Total HT</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                        @foreach($facture->articles as $article)
                            <tr>
                                <td class="px-4 py-2">{{ $article->designation }}</td>
                                <td class="px-4 py-2">{{ number_format($article->prix_ht, 2) }} dh</td>
                                <td class="px-4 py-2">{{ $article->pivot->quantite }}</td>
                                <td class="px-4 py-2">{{ number_format($article->prix_ht * $article->pivot->quantite, 2) }} dh</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-6 space-y-1">
                <p><strong>Total HT :</strong> {{ number_format($facture->total_ht, 2) }} dh</p>
                <p><strong>TVA (20%) :</strong> {{ number_format($facture->tva, 2) }} dh</p>
                <p><strong>Total TTC :</strong> {{ number_format($facture->total_ttc, 2) }} dh</p>
            </div>

            <div class="flex flex-wrap gap-4 mt-6">
                <a href="{{ route('factures.download', $facture) }}" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                    Télécharger la Facture
                </a>
                <a href="{{ route('factures.index') }}" class="px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-700">
                    Retour à la liste
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
