<x-app-layout>
<x-slot name="header">
        <!-- En-tête avec animation -->
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
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-2 text-gray-700 dark:text-white transition-transform duration-300 hover:scale-110" fill="none"
                 viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M13.5 21v-7.5a.75.75 0 0 1 .75-.75h3a.75.75 0 0 1 .75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349M3.75 21V9.349m0 0a3.001 3.001 0 0 0 3.75-.615A2.993 2.993 0 0 0 9.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 0 0 2.25 1.016c.896 0 1.7-.393 2.25-1.015a3.001 3.001 0 0 0 3.75.614m-16.5 0a3.004 3.004 0 0 1-.621-4.72l1.189-1.19A1.5 1.5 0 0 1 5.378 3h13.243a1.5 1.5 0 0 1 1.06.44l1.19 1.189a3 3 0 0 1-.621 4.72M6.75 18h3.75a.75.75 0 0 0 .75-.75V13.5a.75.75 0 0 0-.75-.75H6.75a.75.75 0 0 0-.75.75v3.75c0 .414.336.75.75.75Z"/>
            </svg>
            Liste des Articles
                </h2>
    </x-slot>
   
   

    <div class="py-6 px-4 sm:px-6 lg:px-8">
        <!-- Container avec animation d'entrée -->
        <div class="bg-white dark:bg-gray-900 shadow-xl sm:rounded-lg p-6 transition-all duration-500 ease-in-out"
             x-data="{ loaded: false }"
             x-init="setTimeout(() => loaded = true, 100)"
             :class="{ 'opacity-0 translate-y-5': !loaded, 'opacity-100 translate-y-0': loaded }">

            <!-- 📅 Filtre par Année avec animation -->
            <div class="mb-8 flex flex-col lg:flex-row gap-4 items-center justify-between"
                 x-data="{ stagger: 0 }"
                 x-init="stagger = 100">
                 
                <!-- Filtre Année -->
                <div class="w-full lg:w-2/3"
                     x-data="{ show: false }"
                     x-init="setTimeout(() => show = true, stagger)">
                    <form method="GET" action="{{ route('articles.index') }}" 
                          class="flex gap-4"
                          x-show="show"
                          x-transition:enter="transition ease-out duration-300"
                          x-transition:enter-start="opacity-0 translate-x-10"
                          x-transition:enter-end="opacity-100 translate-x-0">
                        <select name="annee"
                                class="rounded-xl border border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-white px-5 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition duration-300 shadow-sm hover:shadow-md w-full"
                                onchange="this.form.submit()">
                            <option value="">Toutes les années</option>
                            @foreach ($annees as $a)
                                <option value="{{ $a }}" {{ request('annee') == $a ? 'selected' : '' }}>
                                    {{ $a }}
                                </option>
                            @endforeach
                        </select>
                    </form>
                </div>

                <!-- Bouton Ajout avec animation -->
                <div x-data="{ show: false }"
                     x-init="setTimeout(() => show = true, stagger + 100)"
                     x-show="show"
                     x-transition:enter="transition ease-out duration-300"
                     x-transition:enter-start="opacity-0 translate-x-10"
                     x-transition:enter-end="opacity-100 translate-x-0">
                    <a href="{{ route('articles.create') }}"
                       class="inline-flex items-center px-5 py-3 bg-gradient-to-r from-blue-600 to-blue-500 hover:from-blue-700 hover:to-blue-600 text-white rounded-xl transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                             stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M12 4.5v15m7.5-7.5h-15"/>
                        </svg>
                        Ajouter un article
                    </a>
                </div>
            </div>

            <!-- 📋 Tableau avec animation des lignes -->
            <div class="overflow-x-auto">
                <table class="w-full table-auto text-left border-collapse">
                    <thead class="bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-200">
                        <tr>
                            <th class="p-4 font-semibold">Désignation</th>
                            <th class="p-4 font-semibold">Prix</th>
                            <th class="p-4 font-semibold">Client</th>
                            <th class="p-4 font-semibold">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-800 dark:text-gray-100 divide-y dark:divide-gray-700">
                        @forelse ($articles as $index => $article)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors duration-200"
                                x-data="{ show: false }"
                                x-init="setTimeout(() => show = true, 400 + {{ $index }} * 50)"
                                x-show="show"
                                x-transition:enter="transition ease-out duration-300"
                                x-transition:enter-start="opacity-0 translate-x-5"
                                x-transition:enter-end="opacity-100 translate-x-0">
                                <td class="p-4 font-medium">{{ $article->designation }}</td>
                                <td class="p-4">{{ number_format($article->prix_ht, 2, ',', ' ') }} DH</td>
                                <td class="p-4">
                                    @if ($article->client)
                                        <span class="inline-block px-3 py-1 text-xs font-semibold rounded-full 
                                            {{ $article->client->type_client === 'particulier' 
                                                ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200' 
                                                : 'bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200' }}">
                                            {{ $article->client->nom }}
                                        </span>
                                    @else
                                        <span class="text-gray-500 dark:text-gray-400 italic">Aucun client</span>
                                    @endif
                                </td>
                                <td class="p-4 flex gap-3">
                                    <!-- Afficher -->
                                    <a href="{{ route('articles.show', $article) }}"
                                       class="text-green-500 hover:text-green-600 transition-all duration-300 transform hover:scale-110 flex items-center gap-1"
                                       title="Afficher">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>Voir Plus
                                    </a>

                                    <!-- Modifier -->
                                    <a href="{{ route('articles.edit', $article) }}"
                                       class="text-blue-500 hover:text-blue-600 transition-all duration-300 transform hover:scale-110 flex items-center gap-1"
                                       title="Modifier">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536M9 13l6-6 3 3-6 6H9v-3z" />
                                        </svg>
                                        Modifier
                                    </a>

                                    <!-- Supprimer -->
                                    <x-delete-modal 
                                        :route="route('articles.destroy', $article)"
                                        buttonClass="text-red-500 hover:text-red-600 transition-all duration-300 transform hover:scale-110 flex items-center gap-1"
                                        deleteButtonLabel=""
                                        deleteButtonIcon="true"
                                    />
                                </td>
                            </tr>
                        @empty
                            <tr x-data="{ show: false }"
                                x-init="setTimeout(() => show = true, 400)"
                                x-show="show"
                                x-transition:enter="transition ease-out duration-300"
                                x-transition:enter-start="opacity-0 translate-x-5"
                                x-transition:enter-end="opacity-100 translate-x-0">
                                <td colspan="4" class="p-4 text-center text-gray-500 dark:text-gray-400 italic">
                                    Aucun article trouvé.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- 📄 Pagination avec animation -->
            <div class="mt-6"
                 x-data="{ show: false }"
                 x-init="setTimeout(() => show = true, 500)"
                 x-show="show"
                 x-transition:enter="transition ease-out duration-500"
                 x-transition:enter-start="opacity-0 translate-y-5"
                 x-transition:enter-end="opacity-100 translate-y-0">
                {{ $articles->appends(request()->query())->links() }}
            </div>
        </div>
    </div>

    <!-- Animation de fond subtile -->
    <div class="fixed inset-0 -z-10 overflow-hidden opacity-10 dark:opacity-5">
        <div class="absolute inset-0 bg-gradient-to-br from-indigo-100 to-blue-100 dark:from-indigo-900 dark:to-blue-900 animate-pulse duration-30"></div>
    </div>
</x-app-layout>