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
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" 
                 class="w-6 h-6 mr-2 text-gray-700 dark:text-white transition-transform duration-300 hover:scale-110">
                <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
            </svg>
            Liste des clients
                </h2>
    </x-slot>
  

    <div class="py-6 px-4 sm:px-6 lg:px-8">
        <!-- Container avec animation d'entrée -->
        <div class="bg-white dark:bg-gray-900 overflow-hidden shadow-xl sm:rounded-lg p-6 transition-all duration-500 ease-in-out"
             x-data="{ loaded: false }"
             x-init="setTimeout(() => loaded = true, 100)"
             :class="{ 'opacity-0 translate-y-5': !loaded, 'opacity-100 translate-y-0': loaded }">

            <!-- 🔍 Section Recherche/Filtre avec animation en cascade -->
            <div class="mb-8 space-y-4 sm:space-y-0 sm:flex sm:space-x-4"
                 x-data="{ stagger: 0 }"
                 x-init="stagger = 100">
                 
                <!-- Recherche -->
                <div class="w-full sm:w-1/2"
                     x-data="{ show: false }"
                     x-init="setTimeout(() => show = true, stagger)">
                    <form method="GET" action="{{ route('clients.index') }}" 
                          x-data="{ loading: false }" 
                          @submit="loading = true"
                          class="flex gap-3"
                          x-show="show"
                          x-transition:enter="transition ease-out duration-300"
                          x-transition:enter-start="opacity-0 translate-x-10"
                          x-transition:enter-end="opacity-100 translate-x-0">
                        <div class="relative flex-grow">
                            <input type="text" name="search" value="{{ request('search') }}"
                                   class="w-full rounded-xl border border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-white px-5 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition duration-300 shadow-sm hover:shadow-md"
                                   placeholder="🔍 Rechercher un client...">
                        </div>
                        <button type="submit" 
                                class="px-5 py-3 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg transition-all duration-300 hover:shadow-lg flex items-center justify-center min-w-[120px]"
                                :class="{ 'pointer-events-none': loading }">
                            <span x-show="!loading" class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                                Rechercher
                            </span>
                            <span x-show="loading" class="flex items-center">
                                <svg class="animate-spin h-5 w-5 mr-1 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                                Chargement...
                            </span>
                        </button>
                    </form>
                </div>

                <!-- Filtre -->
                <div class="w-full sm:w-1/3"
                     x-data="{ show: false }"
                     x-init="setTimeout(() => show = true, stagger + 100)">
                    <form method="GET" action="{{ route('clients.index') }}" 
                          x-data="{ loading: false }" 
                          @submit="loading = true"
                          class="flex gap-3"
                          x-show="show"
                          x-transition:enter="transition ease-out duration-300"
                          x-transition:enter-start="opacity-0 translate-x-10"
                          x-transition:enter-end="opacity-100 translate-x-0">
                        <select name="type_client" 
                                class="w-full rounded-xl border border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-white px-5 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition duration-300 shadow-sm hover:shadow-md appearance-none">
                            <option value="">Tous les types</option>
                            <option value="particulier" {{ request('type_client') === 'particulier' ? 'selected' : '' }}>Particulier</option>
                            <option value="entreprise" {{ request('type_client') === 'entreprise' ? 'selected' : '' }}>Entreprise</option>
                        </select>
                        <button type="submit" 
                                class="px-5 py-3 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg transition-all duration-300 hover:shadow-lg flex items-center justify-center min-w-[100px]"
                                :class="{ 'pointer-events-none': loading }">
                            <span x-show="!loading">Filtrer</span>
                            <span x-show="loading" class="flex items-center">
                                <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                            </span>
                        </button>
                    </form>
                </div>
            </div>

            <!-- ➕ Bouton Ajout avec animation -->
            <div class="flex justify-end mb-6"
                 x-data="{ show: false }"
                 x-init="setTimeout(() => show = true, 300)"
                 x-show="show"
                 x-transition:enter="transition ease-out duration-500"
                 x-transition:enter-start="opacity-0 translate-y-5"
                 x-transition:enter-end="opacity-100 translate-y-0">
                <a href="{{ route('clients.create') }}" 
                   class="inline-flex items-center px-5 py-3 bg-gradient-to-r from-blue-600 to-blue-500 hover:from-blue-700 hover:to-blue-600 text-white rounded-xl transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    Ajouter un client
                </a>
            </div>

            <!-- 📋 Tableau avec animation des lignes -->
            <div class="overflow-x-auto">
                <table class="w-full table-auto text-left border-collapse">
                    <thead class="bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-200">
                        <tr>
                            <th class="p-4 font-semibold">ID</th>
                            <th class="p-4 font-semibold">Nom</th>
                            <th class="p-4 font-semibold">Type</th>
                            <th class="p-4 font-semibold">Téléphone</th>
                            <th class="p-4 font-semibold">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-800 dark:text-gray-100 divide-y dark:divide-gray-700">
                        @forelse ($clients as $index => $client)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-800 transition-colors duration-200"
                                x-data="{ show: false }"
                                x-init="setTimeout(() => show = true, 400 + {{ $index }} * 50)"
                                x-show="show"
                                x-transition:enter="transition ease-out duration-300"
                                x-transition:enter-start="opacity-0 translate-x-5"
                                x-transition:enter-end="opacity-100 translate-x-0">
                                <td class="p-4 font-medium">{{ $client->id }}</td>
                                <td class="p-4">{{ $client->nom }}</td>
                                <td class="p-4">
                                    <span class="inline-block px-3 py-1 text-xs font-semibold rounded-full 
                                        {{ $client->type_client === 'particulier' ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200' : 'bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200' }} transition-all duration-200 hover:scale-105">
                                        {{ ucfirst($client->type_client) }}
                                    </span>
                                </td>
                                <td class="p-4">{{ $client->telephone }}</td>
                                <td class="p-4 flex gap-3">
                                    <!-- Afficher -->
                                    <a href="{{ route('clients.show', $client) }}" 
                                       class="text-green-500 hover:text-green-600 transition-all duration-300 transform hover:scale-110 flex items-center gap-1"
                                       title="Afficher">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                        Voir
                                    </a>

                                    <!-- Modifier -->
                                    <a href="{{ route('clients.edit', $client) }}" 
                                       class="text-blue-500 hover:text-blue-600 transition-all duration-300 transform hover:scale-110 flex items-center gap-1"
                                       title="Modifier">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536M9 13l6-6 3 3-6 6H9v-3z" />
                                        </svg>
                                        Modifier
                                    </a>

                                    <!-- Supprimer -->
                                    <x-delete-modal 
                                        :route="route('clients.destroy', $client)"
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
                                <td colspan="5" class="p-4 text-center text-gray-500 dark:text-gray-400 italic">
                                    Aucun client trouvé.
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
                {{ $clients->appends(['search' => request('search'), 'type_client' => request('type_client')])->links() }}
            </div>
        </div>
    </div>

    <!-- Animation de fond subtile -->
    <div class="fixed inset-0 -z-10 overflow-hidden opacity-10 dark:opacity-5">
        <div class="absolute inset-0 bg-gradient-to-br from-indigo-100 to-blue-100 dark:from-indigo-900 dark:to-blue-900 animate-pulse duration-30"></div>
    </div>
</x-app-layout>