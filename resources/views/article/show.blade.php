<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-white">
            📝 Détails de l'Article
        </h2>
    </x-slot>

    <div class="max-w-xl mx-auto mt-10 bg-white dark:bg-gray-800 p-6 rounded-xl shadow-md">
        <div class="mb-4">
            <h3 class="text-lg font-medium text-gray-700 dark:text-white">Désignation</h3>
            <p class="text-gray-800 dark:text-gray-300">{{ $article->designation }}</p>
        </div>

        <div class="mb-4">
            <h3 class="text-lg font-medium text-gray-700 dark:text-white">Prix HT</h3>
            <p class="text-gray-800 dark:text-gray-300">{{ number_format($article->prix_ht, 2) }} DH</p>
        </div>

        <div class="mb-4">
            <h3 class="text-lg font-medium text-gray-700 dark:text-white">Client</h3>
            <p class="text-gray-800 dark:text-gray-300">{{ $article->client->nom }}</p>
        </div>

        <div class="flex justify-end mt-6">
            <a href="{{ route('articles.index') }}" class="bg-gray-600 hover:bg-gray-700 text-white py-2 px-4 rounded-lg">Retour à la liste</a>
        </div>
    </div>
</x-app-layout>
