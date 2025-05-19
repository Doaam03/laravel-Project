<section class="space-y-6">
    <header>
        <div class="flex items-center gap-3 mb-4">
            <div class="p-2 bg-green-100 dark:bg-green-900/30 rounded-lg text-green-600 dark:text-green-300">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                </svg>
            </div>
            <h2 class="text-xl font-medium text-gray-800 dark:text-gray-100">
                {{ __('Mettre à jour le mot de passe') }}
            </h2>
        </div>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-300">
            {{ __('Assurez-vous que votre compte utilise un mot de passe long et aléatoire pour rester sécurisé.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-5">
        @csrf
        @method('put')

        <div class="space-y-2">
            <x-input-label for="current_password" :value="__('Mot de passe actuel')" class="text-gray-700 dark:text-gray-300 font-medium" />
            <x-text-input 
                id="current_password" 
                name="current_password" 
                type="password" 
                class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 placeholder-gray-400 dark:placeholder-gray-500 focus:ring-2 focus:ring-green-500 focus:border-green-500 focus:outline-none transition" 
                autocomplete="current-password"
                placeholder="••••••••"
            />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-1 text-sm text-red-600 dark:text-red-400" />
        </div>

        <div class="space-y-2">
            <x-input-label for="password" :value="__('Nouveau mot de passe')" class="text-gray-700 dark:text-gray-300 font-medium" />
            <x-text-input 
                id="password" 
                name="password" 
                type="password" 
                class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 placeholder-gray-400 dark:placeholder-gray-500 focus:ring-2 focus:ring-green-500 focus:border-green-500 focus:outline-none transition" 
                autocomplete="new-password"
                placeholder="••••••••"
            />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-1 text-sm text-red-600 dark:text-red-400" />
        </div>

        <div class="space-y-2">
            <x-input-label for="password_confirmation" :value="__('Confirmez le mot de passe')" class="text-gray-700 dark:text-gray-300 font-medium" />
            <x-text-input 
                id="password_confirmation" 
                name="password_confirmation" 
                type="password" 
                class="w-full px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 placeholder-gray-400 dark:placeholder-gray-500 focus:ring-2 focus:ring-green-500 focus:border-green-500 focus:outline-none transition" 
                autocomplete="new-password"
                placeholder="••••••••"
            />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-1 text-sm text-red-600 dark:text-red-400" />
        </div>

        <div class="flex items-center gap-4 pt-3">
            <button type="submit" class="px-4 py-2 bg-green-600 hover:bg-green-700 dark:bg-green-700 dark:hover:bg-green-600 text-white font-medium rounded-lg shadow-sm transition transform hover:scale-[1.02] focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800">
                {{ __('Enregistrer les modifications') }}
            </button>

            @if (session('status') === 'password-updated')
                <p x-data="{ show: true }" 
                   x-show="show" 
                   x-transition 
                   x-init="setTimeout(() => show = false, 2000)"
                   class="text-sm text-green-600 dark:text-green-400 font-medium">
                    {{ __('Mot de passe mis à jour avec succès !') }}
                </p>
            @endif
        </div>
    </form>
</section>