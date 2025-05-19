<x-app-layout>
    <div class="flex justify-center items-center min-h-screen p-6 bg-gray-100 dark:bg-gray-900">
        <div class="w-full max-w-3xl p-8 bg-white dark:bg-gray-800 rounded-lg shadow-md">
            <h2 class="text-3xl font-bold mb-8 text-center text-gray-800 dark:text-white">Créer une Facture</h2>

            @if (session('success'))
                <x-toast type="success" :message="session('success')" />
            @endif

            <form method="POST" action="{{ route('factures.store') }}" id="facture-form" class="space-y-6">
                @csrf

                {{-- Numéro de Facture --}}
                <div class="relative">
                    <label for="numero_facture" class="block text-gray-700 dark:text-gray-300 mb-1">Numéro de Facture</label>
                    <div class="relative">
                        <input type="text" name="numero_facture" id="numero_facture" value="{{ old('numero_facture') }}"
                            class="pl-10 pr-4 py-2 w-full rounded border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white focus:ring focus:ring-indigo-300">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
</svg>

                        </div>
                    </div>
                    @error('numero_facture')
                        <div class="text-red-500 mt-1">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Date de Facture --}}
                <div class="relative">
                    <label for="date_facture" class="block text-gray-700 dark:text-gray-300 mb-1">Date de la facture</label>
                    <div class="relative">
                        <input type="date" name="date_facture" value="{{ old('date_facture', now()->toDateString()) }}"
                            class="pl-10 pr-4 py-2 w-full rounded border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white focus:ring focus:ring-indigo-300" required>
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 2.994v2.25m10.5-2.25v2.25m-14.252 13.5V7.491a2.25 2.25 0 0 1 2.25-2.25h13.5a2.25 2.25 0 0 1 2.25 2.25v11.251m-18 0a2.25 2.25 0 0 0 2.25 2.25h13.5a2.25 2.25 0 0 0 2.25-2.25m-18 0v-7.5a2.25 2.25 0 0 1 2.25-2.25h13.5a2.25 2.25 0 0 1 2.25 2.25v7.5m-6.75-6h2.25m-9 2.25h4.5m.002-2.25h.005v.006H12v-.006Zm-.001 4.5h.006v.006h-.006v-.005Zm-2.25.001h.005v.006H9.75v-.006Zm-2.25 0h.005v.005h-.006v-.005Zm6.75-2.247h.005v.005h-.005v-.005Zm0 2.247h.006v.006h-.006v-.006Zm2.25-2.248h.006V15H16.5v-.005Z" />
</svg>

                        </div>
                    </div>
                    @error('date_facture')
                        <div class="text-red-500 mt-1">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Client --}}
                <div class="relative">
                    <label for="client_id" class="block text-gray-700 dark:text-gray-300 mb-1">Client</label>
                    <div class="relative">
                        <select id="client_id" name="client_id"
                            class="pl-10 pr-4 py-2 w-full rounded border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white focus:ring focus:ring-indigo-300">
                            <option value="">-- Sélectionner un client --</option>
                            @foreach($clients as $client)
                                <option value="{{ $client->id }}" {{ old('client_id') == $client->id ? 'selected' : '' }}>
                                    {{ $client->nom }}
                                </option>
                            @endforeach
                        </select>
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                       
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
</svg>


                        </div>
                    </div>
                    @error('client_id')
                        <div class="text-red-500 mt-1">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Articles --}}
                <div class="relative">
                    <label for="articles" class="block text-gray-700 dark:text-gray-300 mb-1">Articles</label>
                    <div class="relative">
                        <select id="articles" multiple
                            class="pl-10 pr-4 py-2 w-full rounded border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white focus:ring focus:ring-indigo-300">
                            <!-- Options ajoutées dynamiquement en JS -->
                        </select>
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                      


                        </div>
                    </div>
                    @error('articles')
                        <div class="text-red-500 mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div id="articles-quantites" class="space-y-4"></div>

                {{-- Mode de paiement --}}
                <div class="relative">
                    <label for="mode_paiement" class="block text-gray-700 dark:text-gray-300 mb-1">Mode de Paiement</label>
                    <div class="relative">
                        <select id="mode_paiement" name="mode_paiement"
                            class="pl-10 pr-4 py-2 w-full rounded border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white focus:ring focus:ring-indigo-300">
                            <option value="">-- Choisir un mode de paiement --</option>
                            <option value="Espèce" {{ old('mode_paiement') == 'Espèce' ? 'selected' : '' }}>Espèce</option>
                            <option value="Chèque" {{ old('mode_paiement') == 'Chèque' ? 'selected' : '' }}>Chèque</option>
                            <option value="Virement" {{ old('mode_paiement') == 'Virement' ? 'selected' : '' }}>Virement</option>
                            <option value="Effet" {{ old('mode_paiement') == 'Effet' ? 'selected' : '' }}>Effet</option>
                        </select>
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 0 0 2.25-2.25V6.75A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25v10.5A2.25 2.25 0 0 0 4.5 19.5Z" />
</svg>

                        </div>
                    </div>
                    @error('mode_paiement')
                        <div class="text-red-500 mt-1">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Boutons --}}
                <div class="flex flex-col md:flex-row justify-center items-center md:space-x-6 space-y-4 md:space-y-0 pt-6">
                    <button type="button" id="preview-btn"
                        class="flex items-center justify-center px-6 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
  <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
</svg>

                        Prévisualiser
                    </button>

                    <button type="submit"
                    class="flex items-center justify-center px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
</svg>

                        Sauvegarder
                    </button>
                </div>

            </form>

            {{-- Modal pour prévisualisation PDF --}}
            <div id="pdf-modal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
                <div class="bg-white dark:bg-gray-800 p-6 rounded-lg w-11/12 md:w-3/4 h-3/4 overflow-auto relative">
                    <button id="close-modal" class="absolute top-2 right-2 text-gray-700 dark:text-gray-300 text-xl">✖</button>
                    <iframe id="pdf-preview" class="w-full h-full" frameborder="0"></iframe>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('client_id').addEventListener('change', function() {
            const clientId = this.value;
            fetch(`/clients/${clientId}/articles`)
                .then(response => response.json())
                .then(articles => {
                    const articleSelect = document.getElementById('articles');
                    articleSelect.innerHTML = '';
                    articles.forEach(article => {
                        const option = document.createElement('option');
                        option.value = article.id;
                        option.textContent = article.designation + ' - ' + article.prix_ht + 'dh';
                        articleSelect.appendChild(option);
                    });
                });
        });

        document.getElementById('articles').addEventListener('change', function() {
            const selectedOptions = Array.from(this.selectedOptions);
            const container = document.getElementById('articles-quantites');
            container.innerHTML = '';

            selectedOptions.forEach(option => {
                const div = document.createElement('div');
                div.className = 'flex items-center space-x-4';
                div.innerHTML = `
                    <input type="hidden" name="articles[]" value="${option.value}">
                    <span class="text-gray-700 dark:text-gray-300">${option.text}</span>
                    <input type="number" name="quantites[]" min="1" value="1" class="w-24 rounded border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white" required>
                `;
                container.appendChild(div);
            });
        });

        document.getElementById('preview-btn').addEventListener('click', function() {
            const formData = new FormData(document.getElementById('facture-form'));
            fetch('{{ route('factures.preview') }}', {
                method: 'POST',
                body: formData
            })
            .then(response => response.blob())
            .then(blob => {
                const url = URL.createObjectURL(blob);
                document.getElementById('pdf-preview').src = url;
                document.getElementById('pdf-modal').classList.remove('hidden');
            });
        });

        document.getElementById('close-modal').addEventListener('click', function() {
            document.getElementById('pdf-modal').classList.add('hidden');
        });
    </script>
</x-app-layout>


    

