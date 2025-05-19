<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight">Ajouter un Client</h2>
    </x-slot>

    @include('clients.form', ['route' => route('clients.store'), 'method' => 'POST', 'client' => null])
</x-app-layout>
