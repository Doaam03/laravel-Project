@props([
    'type' => 'success',
    'message' => '',
])

@php
    $types = [
        'success' => ['bg' => 'bg-green-500', 'icon' => 'M5 13l4 4L19 7'],
        'error' => ['bg' => 'bg-red-500', 'icon' => 'M6 18L18 6M6 6l12 12'],
        'info' => ['bg' => 'bg-blue-500', 'icon' => 'M13 16h-1v-4h-1m1-4h.01'],
        'warning' => ['bg' => 'bg-yellow-500', 'icon' => 'M12 9v2m0 4h.01M12 5a7 7 0 100 14 7 7 0 000-14z'],
    ];
    $bgColor = $types[$type]['bg'] ?? 'bg-gray-700';
    $iconPath = $types[$type]['icon'] ?? '';
@endphp

<div 
    x-data="{ show: true }" 
    x-init="setTimeout(() => show = false, 5000)" 
    x-show="show"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 translate-y-4 scale-95"
    x-transition:enter-end="opacity-100 translate-y-0 scale-100"
    x-transition:leave="transition ease-in duration-300"
    x-transition:leave-start="opacity-100 translate-y-0 scale-100"
    x-transition:leave-end="opacity-0 translate-y-4 scale-95"
    @keydown.escape.window="show = false"
    class="fixed bottom-6 left-1/2 transform -translate-x-1/2 {{ $bgColor }} text-white px-6 py-4 rounded-xl shadow-xl flex items-center justify-between gap-4 z-50 w-fit max-w-sm sm:max-w-md"
    role="alert"
    aria-live="assertive"
    aria-atomic="true"
>
    <div class="flex items-center gap-3">
       
        <span class="text-sm font-medium">{{ $message }}</span>
    </div>

    <!-- Bouton de fermeture -->
    <button @click="show = false" class="focus:outline-none hover:scale-110 transform transition">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
    </button>
</div>
