<form method="POST" action="{{ $route }}" class="bg-white dark:bg-gray-800 shadow rounded-lg p-6 max-w-3xl mx-auto">
    @csrf
    @if ($method === 'PUT') @method('PUT') @endif

    {{-- Nom --}}
    <div class="mb-6">
        <label for="nom" class="block text-gray-700 dark:text-gray-300 font-medium">Nom</label>
        <div class="relative">
            <input type="text" name="nom" id="nom"
                class="pl-10 w-full rounded-lg border border-gray-300 dark:border-gray-600 p-3 focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-900 dark:text-white @error('nom') border-red-500 dark:border-red-600 @enderror"
                value="{{ old('nom', $client->nom ?? '') }}" required>
            <div class="absolute left-3 top-3.5 text-gray-400 dark:text-gray-500">
                {{-- Icône Utilisateur --}}
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A8.968 8.968 0 0112 15c2.003 0 3.847.659 5.294 1.764M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
            </div>
        </div>
        @error('nom') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
    </div>

    {{-- Type de client --}}
    <div class="mb-6">
        <label for="type_client" class="block text-gray-700 dark:text-gray-300 font-medium">Type de Client</label>
        <div class="relative">
            <select name="type_client" id="type_client"
                class="pl-10 w-full rounded-lg border border-gray-300 dark:border-gray-600 p-3 focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-900 dark:text-white">
                <option value="particulier" {{ old('type_client', $client->type_client ?? '') === 'particulier' ? 'selected' : '' }}>Particulier</option>
                <option value="entreprise" {{ old('type_client', $client->type_client ?? '') === 'entreprise' ? 'selected' : '' }}>Entreprise</option>
            </select>
            <div class="absolute left-3 top-3.5 text-gray-400 dark:text-gray-500">
                {{-- Icône Groupe Utilisateurs --}}
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a4 4 0 00-3-3.87M9 20H4v-2a4 4 0 013-3.87M12 12a4 4 0 100-8 4 4 0 000 8zm6 8v-2a4 4 0 00-3-3.87m-6 0A4 4 0 003 18v2" />
                </svg>
            </div>
        </div>
        @error('type_client') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
    </div>

    {{-- Téléphone --}}
    <div class="mb-6">
        <label for="telephone" class="block text-gray-700 dark:text-gray-300 font-medium">Téléphone</label>
        <div class="relative">
            <input type="text" name="telephone" id="telephone"
                class="pl-10 w-full rounded-lg border border-gray-300 dark:border-gray-600 p-3 focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-900 dark:text-white @error('telephone') border-red-500 dark:border-red-600 @enderror"
                value="{{ old('telephone', $client->telephone ?? '') }}">
            <div class="absolute left-3 top-3.5 text-gray-400 dark:text-gray-500">
                {{-- Icône Téléphone --}}
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
                </svg>
            </div>
        </div>
        @error('telephone') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
    </div>

    {{-- Email --}}
    <div class="mb-6">
        <label for="email" class="block text-gray-700 dark:text-gray-300 font-medium">Email</label>
        <div class="relative">
            <input type="email" name="email" id="email"
                class="pl-10 w-full rounded-lg border border-gray-300 dark:border-gray-600 p-3 focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-900 dark:text-white @error('email') border-red-500 dark:border-red-600 @enderror"
                value="{{ old('email', $client->email ?? '') }}">
            <div class="absolute left-3 top-3.5 text-gray-400 dark:text-gray-500">
                {{-- Icône Email --}}
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                </svg>
            </div>
        </div>
        @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
    </div>

    {{-- ICE --}}
    <div class="mb-6">
        <label for="ICE" class="block text-gray-700 dark:text-gray-300 font-medium">ICE</label>
        <div class="relative">
            <input type="text" name="ICE" id="ICE" readonly
                class="pl-10 w-full rounded-lg border border-gray-300 dark:border-gray-600 p-3 focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-900 dark:text-white @error('ICE') border-red-500 dark:border-red-600 @enderror"
                value="{{ old('ICE', $client->ICE ?? '000000000000000') }}">
            <div class="absolute left-3 top-3.5 text-gray-400 dark:text-gray-500">
                {{-- Icône Identification --}}
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2a2 2 0 012-2h2a2 2 0 012 2v2m0 4H9a2 2 0 01-2-2V5a2 2 0 012-2h6a2 2 0 012 2v14a2 2 0 01-2 2z" />
                </svg>
            </div>
        </div>
        @error('ICE') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
    </div>

    {{-- IF --}}
    <div class="mb-6">
        <label for="IF" class="block text-gray-700 dark:text-gray-300 font-medium">IF</label>
        <div class="relative">
            <input type="text" name="IF" id="IF" readonly
                class="pl-10 w-full rounded-lg border border-gray-300 dark:border-gray-600 p-3 focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-900 dark:text-white @error('IF') border-red-500 dark:border-red-600 @enderror"
                value="{{ old('IF', $client->IF ?? '00000000') }}">
            <div class="absolute left-3 top-3.5 text-gray-400 dark:text-gray-500">
                {{-- Icône Document --}}
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16h8M8 12h8m-6 8h6a2 2 0 002-2V7a2 2 0 00-.59-1.41l-3-3A2 2 0 0014 2H8a2 2 0 00-2 2v16a2 2 0 002 2z" />
                </svg>
            </div>
        </div>
        @error('IF') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
    </div>

    <div class="flex justify-end space-x-4">
    <button type="submit"
        class="w-full bg-blue-600 text-white rounded-lg py-3 hover:bg-blue-700 transition duration-300 transform hover:scale-105">
        {{ $method === 'POST' ? 'Ajouter' : 'Mettre à jour' }}
    </button>

    {{-- Script --}}
    @include('scripts.changestype-script') 
    </div>
</form>
