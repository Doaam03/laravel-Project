{{-- edit.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 dark:text-white">✏️ Modifier l'article</h2>
    </x-slot>

    @include('article.form', [
        'article' => $article,
        'clients' => $clients,
        'route' => route('articles.update', $article),
        'method' => 'PUT'
    ])
</x-app-layout>
