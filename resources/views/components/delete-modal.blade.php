@props([
    'route', 
    'title' => 'Confirmation de suppression', 
    'message' => 'Es-tu sûr de vouloir supprimer cet élément ?',
    'buttonClass' => 'text-red-500 hover:text-red-700 dark:hover:text-red-400 transition flex items-center gap-1'
])

<div x-data="{ open: false, loading: false }" x-cloak>
    <!-- Bouton déclencheur -->
    <button 
        @click="open = true" 
        class="{{ $buttonClass }}"
        aria-label="Ouvrir la confirmation de suppression"
    >
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
        </svg>
        <span>Supprimer</span>
    </button>

    <!-- Modal -->
    <div 
        x-show="open"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/50 backdrop-blur-sm"
        role="dialog"
        aria-modal="true"
        :aria-hidden="!open"
    >
        <div 
            @click.outside="open = false"
            x-show="open"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="scale-95 opacity-0"
            x-transition:enter-end="scale-100 opacity-100"
            x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="scale-100 opacity-100"
            x-transition:leave-end="scale-95 opacity-0"
            class="w-full max-w-md bg-white dark:bg-gray-800 rounded-xl shadow-xl overflow-hidden"
        >
            <div class="p-6">
                <div class="flex items-start justify-between">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        {{ $title }}
                    </h3>
                    <button 
                        @click="open = false" 
                        class="text-gray-400 hover:text-gray-500 dark:hover:text-gray-300 transition"
                        aria-label="Fermer"
                    >
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <div class="mt-4 text-gray-600 dark:text-gray-300">
                    {{ $message }}
                </div>

                <form 
                    method="POST" 
                    action="{{ $route }}" 
                    @submit="loading = true"
                    class="mt-6 flex justify-end space-x-3"
                >
                    @csrf
                    @method('DELETE')

                    <button
                        type="button"
                        @click="open = false"
                        class="px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 text-gray-700 dark:text-gray-200 hover:bg-gray-50 dark:hover:bg-gray-700 transition"
                        :disabled="loading"
                    >
                        Annuler
                    </button>

                    <button
                        type="submit"
                        class="px-4 py-2 rounded-lg bg-red-600 hover:bg-red-700 text-white transition flex items-center justify-center min-w-[120px]"
                        :disabled="loading"
                        :class="{ 'opacity-75 cursor-not-allowed': loading }"
                    >
                        <template x-if="!loading">
                            <span>Confirmer</span>
                        </template>
                        <template x-if="loading">
                            <span class="flex items-center">
                                <svg class="animate-spin -ml-1 mr-2 h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                                Suppression...
                            </span>
                        </template>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>