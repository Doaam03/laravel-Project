<form action="{{ $route }}" method="POST" class="max-w-2xl w-full mx-auto mt-10 bg-white dark:bg-gray-800 p-6 rounded-xl shadow-md">
    @csrf
    @if ($method === 'PUT') @method('PUT') @endif

    <!-- Désignation -->
    <div class="mb-4">
        <label for="designation" class="block text-sm font-medium text-gray-700 dark:text-white">Désignation</label>
        <div class="relative">
            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                <!-- Icône : Pencil -->
                <svg class="w-6 h-6 text-gray-500 dark:text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M15.232 5.232l3.536 3.536M9 11l3.536-3.536M5 19h4l10-10a2.828 2.828 0 00-4-4L5 15v4z"/>
                </svg>
            </div>
            <input type="text" name="designation" id="designation"
                   value="{{ old('designation', $article->designation ?? '') }}"
                   class="pl-14 pr-4 py-3 w-full rounded-xl border dark:bg-gray-800 dark:border-gray-600 dark:text-white focus:ring focus:ring-indigo-500">
        </div>
        @error('designation')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <!-- Prix HT -->
    <div class="mb-4">
        <label for="prix_ht" class="block text-sm font-medium text-gray-700 dark:text-white">Prix HT</label>
        <div class="relative">
            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                <!-- Icône : Currency Dollar -->
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m3.75 9v7.5m2.25-6.466a9.016 9.016 0 0 0-3.461-.203c-.536.072-.974.478-1.021 1.017a4.559 4.559 0 0 0-.018.402c0 .464.336.844.775.994l2.95 1.012c.44.15.775.53.775.994 0 .136-.006.27-.018.402-.047.539-.485.945-1.021 1.017a9.077 9.077 0 0 1-3.461-.203M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
</svg>

            </div>
            <input type="number" step="0.01" name="prix_ht" id="prix_ht"
                   value="{{ old('prix_ht', $article->prix_ht ?? '') }}"
                   class="pl-14 pr-4 py-3 w-full rounded-xl border dark:bg-gray-800 dark:border-gray-600 dark:text-white focus:ring focus:ring-indigo-500">
        </div>
        @error('prix_ht')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <!-- Client -->
    <div class="mb-6">
        <label for="client_id" class="block text-sm font-medium text-gray-700 dark:text-white">Client</label>
        <div class="relative">
            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                <!-- Icône : User -->
                <svg class="w-6 h-6 text-gray-500 dark:text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M5.121 17.804A9.953 9.953 0 0112 15c2.21 0 4.253.722 5.879 1.804M15 11a3 3 0 10-6 0 3 3 0 006 0z"/>
                </svg>
            </div>
            <select name="client_id" id="client_id"
                    class="pl-14 pr-4 py-3 w-full rounded-xl border dark:bg-gray-800 dark:border-gray-600 dark:text-white focus:ring focus:ring-indigo-500">
                <option value="">Sélectionner un client</option>
                @foreach ($clients as $client)
                    <option value="{{ $client->id }}" {{ old('client_id', $article->client_id ?? '') == $client->id ? 'selected' : '' }}>
                        {{ $client->nom }}
                    </option>
                @endforeach
            </select>
        </div>
        @error('client_id')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
    </div>

    <!-- Bouton -->
    <div class="flex justify-end">
        <button type="submit"
                class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white py-2 px-6 rounded-xl transition">
            <!-- Icône Check -->
            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                 viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M5 13l4 4L19 7"/>
            </svg>
            Enregistrer
        </button>
    </div>
</form>
