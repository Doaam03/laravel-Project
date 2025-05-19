<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-semibold text-gray-800 dark:text-white leading-tight">
            Détail du Client
        </h2>
    </x-slot>

    <div class="py-6 px-4 sm:px-6 lg:px-8">
        <!-- Section principale du client -->
        <div class="bg-white dark:bg-gray-800 shadow-xl rounded-xl p-8 space-y-6">
            <!-- Nom du client -->
            <div class="flex justify-between items-center">
                <h3 class="text-xl font-semibold text-gray-800 dark:text-white">Nom du Client</h3>
                <p class="text-lg font-medium text-gray-600 dark:text-gray-300">{{ $client->nom }}</p>
            </div>

            <!-- Type du client avec badge -->
            <div class="flex justify-between items-center">
                <h3 class="text-xl font-semibold text-gray-800 dark:text-white">Type de Client</h3>
                <span class="inline-block px-4 py-2 text-sm font-medium rounded-full 
                    {{ $client->type_client === 'particulier' ? 'bg-green-100 text-green-800' : 'bg-blue-100 text-blue-800' }}">
                    {{ ucfirst($client->type_client) }}
                </span>
            </div>

            <!-- Téléphone -->
            <div class="flex justify-between items-center">
                <h3 class="text-xl font-semibold text-gray-800 dark:text-white">Téléphone</h3>
                <p class="text-lg font-medium text-gray-600 dark:text-gray-300">{{ $client->telephone }}</p>
            </div>

            <!-- Email -->
            <div class="flex justify-between items-center">
                <h3 class="text-xl font-semibold text-gray-800 dark:text-white">Email</h3>
                <p class="text-lg font-medium text-gray-600 dark:text-gray-300">{{ $client->email }}</p>
            </div>

            <!-- ICE (pour Entreprises) -->
            @if($client->type_client === 'entreprise')
                <div class="flex justify-between items-center">
                    <h3 class="text-xl font-semibold text-gray-800 dark:text-white">ICE</h3>
                    <p class="text-lg font-medium text-gray-600 dark:text-gray-300">{{ $client->ICE }}</p>
                </div>
            @endif

            <!-- IF (pour Entreprises) -->
            @if($client->type_client === 'entreprise')
                <div class="flex justify-between items-center">
                    <h3 class="text-xl font-semibold text-gray-800 dark:text-white">IF</h3>
                    <p class="text-lg font-medium text-gray-600 dark:text-gray-300">{{ $client->IF }}</p>
                </div>
            @endif
        </div>

        <!-- Bouton de retour -->
        <div class="mt-6 text-right">
            <a href="{{ route('clients.index') }}" 
               class="px-6 py-3 bg-indigo-600 hover:bg-indigo-700 text-white rounded-xl shadow-md transform transition duration-300 hover:scale-105">
               Retour à la liste des clients
            </a>
        </div>
    </div>
</x-app-layout>
