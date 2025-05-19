{{-- create.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 dark:text-white"> Ajouter un article</h2>
    </x-slot>

    @include('article.form', [
        'article' => new App\Models\Article,
        'clients' => $clients,
        'route' => route('articles.store'),
        'method' => 'POST'
    ])
</x-app-layout>
