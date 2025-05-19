<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight">Modifier le Client</h2>
    </x-slot>

    @include('clients.form', ['route' => route('clients.update', $client), 'method' => 'PUT', 'client' => $client])
</x-app-layout>