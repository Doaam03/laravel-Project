<x-guest-layout>
    <div class="max-w-md w-full mx-auto p-6 bg-white/95 dark:bg-gray-800/95 backdrop-blur-sm rounded-2xl shadow-2xl border border-gray-200/50 dark:border-gray-700/50 animate-fade-in-up">
        <!-- Logo animé -->
        <div class="flex justify-center mb-6 animate-bounce-slow">
            <svg class="w-16 h-16 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 14l6-6m-5.5.5h.01m4.99 5h.01M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16l3.5-2 3.5 2 3.5-2 3.5 2z" />
            </svg>
        </div>

        <h2 class="text-3xl font-bold mb-6 text-center text-gray-800 dark:text-white animate-fade-in-up" style="animation-delay: 0.1s">Connexion à GDF</h2>
        
        <form method="POST" action="{{ route('login') }}" class="space-y-6">
            @csrf
            
            <!-- Champ Email -->
            <div class="space-y-2 animate-fade-in-up" style="animation-delay: 0.2s">
                <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Adresse Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                    class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white transition-all duration-300 hover:shadow-md hover:border-blue-400"
                    placeholder="votre@email.com">
                @error('email')
                    <p class="text-sm text-red-600 dark:text-red-400 mt-1 animate-shake">{{ $message }}</p>
                @enderror
            </div>
            
            <!-- Champ Mot de passe -->
            <div class="space-y-2 animate-fade-in-up" style="animation-delay: 0.3s">
                <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Mot de passe</label>
                <input id="password" type="password" name="password" required
                    class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white transition-all duration-300 hover:shadow-md hover:border-blue-400"
                    placeholder="••••••••">
                @error('password')
                    <p class="text-sm text-red-600 dark:text-red-400 mt-1 animate-shake">{{ $message }}</p>
                @enderror
            </div>
            
            <!-- Bouton de connexion -->
            <button type="submit" 
                    class="w-full px-6 py-3 bg-gradient-to-r from-blue-600 to-blue-500 text-white font-medium rounded-lg shadow-lg hover:from-blue-700 hover:to-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all duration-300 transform hover:-translate-y-1 hover:shadow-xl active:translate-y-0 animate-fade-in-up" style="animation-delay: 0.4s">
                Se connecter
            </button>
            
            <!-- Liens -->
            <div class="flex flex-col sm:flex-row justify-between items-center pt-4 text-sm animate-fade-in-up" style="animation-delay: 0.5s">
                <a href="{{ route('register') }}" class="text-blue-600 dark:text-blue-400 hover:underline mb-2 sm:mb-0 transition-colors duration-300 hover:text-blue-700 dark:hover:text-blue-300">
                    Créer un compte
                </a>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-blue-600 dark:text-blue-400 hover:underline transition-colors duration-300 hover:text-blue-700 dark:hover:text-blue-300">
                        Mot de passe oublié ?
                    </a>
                @endif
            </div>
        </form>
    </div>

    <style>
        .animate-fade-in-up {
            animation: fadeInUp 0.6s ease-out forwards;
            opacity: 0;
            transform: translateY(10px);
        }
        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .animate-bounce-slow {
            animation: bounceSlow 3s ease-in-out infinite;
        }
        @keyframes bounceSlow {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }
        .animate-shake {
            animation: shake 0.5s cubic-bezier(.36,.07,.19,.97) both;
        }
        @keyframes shake {
            10%, 90% { transform: translateX(-1px); }
            20%, 80% { transform: translateX(2px); }
            30%, 50%, 70% { transform: translateX(-3px); }
            40%, 60% { transform: translateX(3px); }
        }
    </style>
</x-guest-layout>