<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription - GDF</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <x-darkmode-script />
    
    <style>
        .animate-pop-in {
            animation: popIn 0.6s cubic-bezier(0.2, 0.8, 0.4, 1.2) forwards;
            opacity: 0;
        }
        @keyframes popIn {
            0% { opacity: 0; transform: scale(0.8); }
            70% { opacity: 1; transform: scale(1.05); }
            100% { opacity: 1; transform: scale(1); }
        }
        .animate-float {
            animation: float 6s ease-in-out infinite;
        }
        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }
        .input-hover {
            transition: all 0.3s ease;
        }
        .input-hover:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        .btn-pulse:hover {
            animation: pulse 1.5s infinite;
        }
        @keyframes pulse {
            0% { box-shadow: 0 0 0 0 rgba(59, 130, 246, 0.4); }
            70% { box-shadow: 0 0 0 10px rgba(59, 130, 246, 0); }
            100% { box-shadow: 0 0 0 0 rgba(59, 130, 246, 0); }
        }
    </style>
</head>
<body class="flex items-center justify-center min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 dark:from-gray-900 dark:to-gray-800 text-gray-800 dark:text-white transition-colors duration-300">
    <div class="w-full max-w-md px-8 py-10 bg-white/95 dark:bg-gray-800/95 backdrop-blur-sm rounded-2xl shadow-2xl border border-gray-200/50 dark:border-gray-700/50 mx-4 animate-pop-in">
        <!-- Logo animé -->
        <div class="flex justify-center mb-6">
            <svg class="w-20 h-20 text-blue-500 animate-float" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 14l6-6m-5.5.5h.01m4.99 5h.01M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16l3.5-2 3.5 2 3.5-2 3.5 2z" />
            </svg>
        </div>

        <h2 class="text-3xl font-bold mb-8 text-center text-gray-800 dark:text-white animate-pop-in" style="animation-delay: 0.1s">Créer un compte</h2>
        
        <form method="POST" action="{{ route('register') }}" class="space-y-5">
            @csrf
            
            <!-- Champ Nom -->
            <div class="space-y-2 animate-pop-in" style="animation-delay: 0.2s">
                <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nom complet</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus
                       class="w-full px-4 py-3 input-hover border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white"
                       placeholder="Votre nom">
                @error('name')
                    <p class="text-sm text-red-600 dark:text-red-400 mt-1 animate-shake">{{ $message }}</p>
                @enderror
            </div>
            
            <!-- Champ Email -->
            <div class="space-y-2 animate-pop-in" style="animation-delay: 0.3s">
                <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Adresse email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required
                       class="w-full px-4 py-3 input-hover border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white"
                       placeholder="votre@email.com">
                @error('email')
                    <p class="text-sm text-red-600 dark:text-red-400 mt-1 animate-shake">{{ $message }}</p>
                @enderror
            </div>
            
            <!-- Champ Mot de passe -->
            <div class="space-y-2 animate-pop-in" style="animation-delay: 0.4s">
                <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Mot de passe</label>
                <input id="password" type="password" name="password" required
                       class="w-full px-4 py-3 input-hover border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white"
                       placeholder="••••••••">
                @error('password')
                    <p class="text-sm text-red-600 dark:text-red-400 mt-1 animate-shake">{{ $message }}</p>
                @enderror
            </div>
            
            <!-- Confirmation Mot de passe -->
            <div class="space-y-2 animate-pop-in" style="animation-delay: 0.5s">
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Confirmer le mot de passe</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required
                       class="w-full px-4 py-3 input-hover border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white"
                       placeholder="••••••••">
            </div>
            
            <!-- Bouton d'inscription -->
            <div class="pt-4 animate-pop-in" style="animation-delay: 0.6s">
                <button type="submit" 
                        class="w-full px-6 py-3 bg-gradient-to-r from-blue-600 to-blue-500 text-white font-medium rounded-lg shadow-lg hover:from-blue-700 hover:to-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all duration-300 transform hover:-translate-y-1 hover:shadow-xl active:translate-y-0 btn-pulse">
                    S'inscrire
                </button>
            </div>
            
            <!-- Lien vers connexion -->
            <div class="text-center pt-4 animate-pop-in" style="animation-delay: 0.7s">
                <p class="text-sm text-gray-600 dark:text-gray-400">
                    Déjà inscrit ? 
                    <a href="{{ route('login') }}" class="font-medium text-blue-600 hover:text-blue-500 dark:text-blue-400 dark:hover:text-blue-300 transition-colors">
                        Se connecter
                    </a>
                </p>
            </div>
        </form>
    </div>
</body>
</html>