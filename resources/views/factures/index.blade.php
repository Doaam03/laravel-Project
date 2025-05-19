<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row sm:items-center justify-between mb-8 gap-4"
             x-data="{ stagger: 0 }"
             x-init="stagger = 100">
             
            <h2 class="text-2xl font-semibold text-gray-800 dark:text-white flex items-center"
                x-data="{ show: false }"
                x-init="setTimeout(() => show = true, stagger)"
                x-show="show"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 translate-x-10"
                x-transition:enter-end="opacity-100 translate-x-0">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" 
                     class="w-6 h-6 mr-2 text-gray-700 dark:text-white transition-transform duration-300 hover:scale-110" 
                     stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                </svg>
                Liste des Factures
            </h2>
        </div>
    </x-slot>

    <div class="py-6 px-4 sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-900 rounded-lg shadow-xl transition-all duration-500 ease-in-out p-6"
             x-data="{ loaded: false }"
             x-init="setTimeout(() => loaded = true, 100)"
             :class="{ 'opacity-0 translate-y-5': !loaded, 'opacity-100 translate-y-0': loaded }">

            @if (session('success'))
                <x-toast type="success" :message="session('success')" />
            @endif

            <!-- Bouton Ajout -->
            <div class="flex justify-end mb-6"
                 x-data="{ show: false }"
                 x-init="setTimeout(() => show = true, 200)"
                 x-show="show"
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 translate-x-10"
                 x-transition:enter-end="opacity-100 translate-x-0">
                <a href="{{ route('factures.create') }}" 
                   class="inline-flex items-center px-5 py-3 bg-gradient-to-r from-blue-600 to-blue-500 hover:from-blue-700 hover:to-blue-600 text-white rounded-xl transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                    Ajouter une facture
                </a>
            </div>

            <!-- Tableau -->
            <div class="overflow-x-auto">
                <table class="w-full table-auto text-left border-collapse">
                    <thead class="bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-200">
                        <tr>
                            <th class="p-4 font-semibold">N° Facture</th>
                            <th class="p-4 font-semibold">Client</th>
                            <th class="p-4 font-semibold">Date</th>
                            <th class="p-4 font-semibold">Mode de Paiement</th>
                            <th class="p-4 font-semibold text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-800 dark:text-gray-100 divide-y dark:divide-gray-700">
                        @forelse ($factures as $index => $facture)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors duration-200"
                                x-data="{ show: false }"
                                x-init="setTimeout(() => show = true, 400 + {{ $index }} * 50)"
                                x-show="show"
                                x-transition:enter="transition ease-out duration-300"
                                x-transition:enter-start="opacity-0 translate-x-5"
                                x-transition:enter-end="opacity-100 translate-x-0">
                                <td class="p-4 font-medium">{{ $facture->numero_facture }}</td>
                                <td class="p-4">{{ $facture->client->nom }}</td>
                                <td class="p-4">{{ $facture->date_facture }}</td>
                                <td class="p-4">
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium
                                        @if($facture->mode_paiement === 'Espèces') bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200
                                        @elseif($facture->mode_paiement === 'Carte') bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200
                                        @else bg-purple-100 text-purple-800 dark:bg-purple-900 dark:text-purple-200 @endif">
                                        {{ $facture->mode_paiement }}
                                    </span>
                                </td>
                                <td class="p-4 flex justify-center gap-4">
                                    <a href="{{ route('factures.show', $facture) }}"
                                       class="text-green-500 hover:text-green-600 transition-all duration-300 transform hover:scale-110 flex items-center gap-1"
                                       title="Voir détails">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                        Voir
                                    </a>

                                    <a href="{{ route('factures.download', $facture) }}"
                                       class="text-blue-500 hover:text-blue-600 transition-all duration-300 transform hover:scale-110 flex items-center gap-1"
                                       title="Télécharger PDF">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" 
                                             stroke-width="1.5" stroke="currentColor" class="h-5 w-5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
                                        </svg>
                                        PDF
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr x-data="{ show: false }"
                                x-init="setTimeout(() => show = true, 400)"
                                x-show="show"
                                x-transition:enter="transition ease-out duration-300"
                                x-transition:enter-start="opacity-0 translate-x-5"
                                x-transition:enter-end="opacity-100 translate-x-0">
                                <td colspan="5" class="p-4 text-center text-gray-500 dark:text-gray-400 italic">
                                    Aucune facture trouvée.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-6"
                 x-data="{ show: false }"
                 x-init="setTimeout(() => show = true, 500)"
                 x-show="show"
                 x-transition:enter="transition ease-out duration-500"
                 x-transition:enter-start="opacity-0 translate-y-5"
                 x-transition:enter-end="opacity-100 translate-y-0">
                {{ $factures->links() }}
            </div>
        </div>
    </div>

    <div class="fixed inset-0 -z-10 overflow-hidden opacity-10 dark:opacity-5">
        <div class="absolute inset-0 bg-gradient-to-br from-indigo-100 to-blue-100 dark:from-indigo-900 dark:to-blue-900 animate-pulse duration-30"></div>
    </div>
</x-app-layout>