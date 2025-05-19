<form method="POST" action="{{ $action }}" x-data="{ loading: false }" @submit.prevent="loading = true; $el.submit();">
    @csrf
    @if($method === 'DELETE') @method('DELETE') @endif
    @if($method === 'PUT') @method('PUT') @endif
    <button type="submit"
        :disabled="loading"
        class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 transition flex items-center justify-center gap-2">
        <template x-if="!loading">
            <span>{{ $confirmText ?? 'Confirmer' }}</span>
        </template>
        <template x-if="loading">
            <span class="flex items-center">
                <svg class="animate-spin h-5 w-5 mr-2 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                     viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10"
                            stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor"
                          d="M4 12a8 8 0 018-8v4l3-3-3-3v4a8 8 0 00-8 8z"></path>
                </svg>
                Chargement...
            </span>
        </template>
    </button>
</form>
