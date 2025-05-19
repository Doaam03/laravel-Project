<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GDF - Gestion de Facturation</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <x-darkmode-script />
    
    <style>
        /* Layout with smooth transitions */
        body {
            display: flex;
            min-height: 100vh;
            padding: 1rem;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #f5f7fa 0%, #e4e8ed 100%);
            background-attachment: fixed;
            transition: all 0.5s ease;
        }
        
        .welcome-container {
            max-width: 600px;
            width: 100%;
            margin: auto;
            position: relative; /* For dark mode button positioning */
        }
        
        /* Enhanced logo animation */
        .logo {
            width: 90px;
            height: 90px;
            margin: 0 auto 1.5rem;
            color: #3b82f6;
            animation: float 4s ease-in-out infinite, pulse 2s ease-in-out infinite alternate;
            filter: drop-shadow(0 4px 6px rgba(59, 130, 246, 0.2));
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0) rotate(-2deg); }
            50% { transform: translateY(-12px) rotate(2deg); }
        }
        
        @keyframes pulse {
            0% { opacity: 0.9; transform: scale(0.98); }
            100% { opacity: 1; transform: scale(1.02); }
        }
        
        /* Card with enhanced hover effect */
        .card {
            transition: all 0.4s cubic-bezier(0.25, 0.8, 0.25, 1);
            transform: translateY(0);
            position: relative;
            overflow: hidden;
        }
        
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 
                        0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
        
        .card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(to right, #3b82f6, #6366f1);
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.4s ease;
        }
        
        .card:hover::before {
            transform: scaleX(1);
        }
        
        /* Buttons with improved animations */
        .btn {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            transform: translateY(0);
            position: relative;
            overflow: hidden;
        }
        
        .btn-primary {
            background: linear-gradient(to right, #3b82f6, #6366f1);
            box-shadow: 0 4px 6px rgba(59, 130, 246, 0.2);
        }
        
        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 15px rgba(59, 130, 246, 0.3);
            animation: btnPulse 2s infinite;
        }
        
        .btn-secondary {
            background: white;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        }
        
        .btn-secondary:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
        }
        
        @keyframes btnPulse {
            0% { box-shadow: 0 0 0 0 rgba(59, 130, 246, 0.4); }
            70% { box-shadow: 0 0 0 12px rgba(59, 130, 246, 0); }
            100% { box-shadow: 0 0 0 0 rgba(59, 130, 246, 0); }
        }
        
        /* Feature items with better animation */
        .feature-item {
            transition: all 0.3s ease;
            border-radius: 0.5rem;
        }
        
        .feature-item:hover {
            transform: translateY(-5px) scale(1.05);
            background-color: rgba(59, 130, 246, 0.05);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }
        
        /* Improved dark mode button */
        .dark-mode-btn {
            position: absolute;
            top: 1rem;
            right: 1rem;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(255, 255, 255, 0.8);
            border-radius: 50%;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            z-index: 10;
        }
        
        .dark-mode-btn:hover {
            transform: rotate(15deg) scale(1.1);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
        }
        
        .dark-mode-btn:active {
            transform: rotate(15deg) scale(0.95);
        }
        
        /* Dark mode adjustments */
        .dark body {
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
        }
        
        .dark .card {
            background: #1e293b;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.3);
        }
        
        .dark .btn-secondary {
            background: #334155;
            color: #f8fafc;
        }
        
        .dark .dark-mode-btn {
            background: rgba(30, 41, 59, 0.8);
        }
        
        /* Entrance animations */
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        
        .animate-fade-in {
            animation: fadeIn 0.8s ease-out forwards;
        }
        
        .delay-100 { animation-delay: 0.1s; }
        .delay-200 { animation-delay: 0.2s; }
        .delay-300 { animation-delay: 0.3s; }
    </style>
</head>

<body class="dark:bg-gray-900 dark:text-white">
    <div class="welcome-container animate-fade-in">
        <!-- Dark mode button in top right corner -->
        <button onclick="toggleDark()" class="dark-mode-btn" aria-label="Toggle dark mode">
            <svg id="sun-icon" class="w-5 h-5 hidden dark:block text-yellow-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 3v2.25m6.364.386-1.591 1.591M21 12h-2.25m-.386 6.364-1.591-1.591M12 18.75V21m-4.773-4.227-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" />
            </svg>
            <svg id="moon-icon" class="w-5 h-5 dark:hidden text-indigo-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21.752 15.002A9.72 9.72 0 0 1 18 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 0 0 3 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 0 0 9.002-5.998Z" />
            </svg>
        </button>

        <!-- Logo with enhanced animation -->
        <svg class="logo" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 14l6-6m-5.5.5h.01m4.99 5h.01M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16l3.5-2 3.5 2 3.5-2 3.5 2z" />
        </svg>
        
        <!-- Title with fade-in animation -->
        <h1 class="text-4xl font-bold text-center mb-3 animate-fade-in delay-100">Bienvenue dans <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-500 to-indigo-600">GDF</span></h1>
        <p class="text-lg text-gray-600 dark:text-gray-300 text-center mb-8 animate-fade-in delay-200">Votre solution complète de gestion de facturation</p>
        
        <!-- Action card with enhanced hover -->
        <div class="card bg-white dark:bg-gray-800 rounded-xl shadow-lg p-8 mb-8 animate-fade-in delay-300">
            <h2 class="text-2xl font-bold text-center mb-6">Commencez maintenant</h2>
            <div class="space-y-4">
                <a href="{{ route('login') }}" class="btn btn-primary block w-full py-3 px-6 text-white font-medium rounded-lg text-center">
                    Connexion
                </a>
                <a href="{{ route('register') }}" class="btn btn-secondary block w-full py-3 px-6 text-gray-800 dark:text-white font-medium rounded-lg text-center">
                    Créer un compte
                </a>
            </div>
        </div>
        
        <!-- Features with staggered animations -->
        <div class="grid grid-cols-3 gap-4 mb-8">
            <div class="feature-item p-3 text-center animate-fade-in delay-400">
                <div class="p-3 bg-blue-50 dark:bg-blue-900/20 rounded-full inline-block mb-2">
                    <svg class="w-6 h-6 mx-auto text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 14l6-6m-5.5.5h.01m4.99 5h.01M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16l3.5-2 3.5 2 3.5-2 3.5 2z" />
                    </svg>
                </div>
                <span class="text-sm font-medium">Factures</span>
            </div>
            <div class="feature-item p-3 text-center animate-fade-in delay-500">
                <div class="p-3 bg-blue-50 dark:bg-blue-900/20 rounded-full inline-block mb-2">
                    <svg class="w-6 h-6 mx-auto text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </div>
                <span class="text-sm font-medium">Clients</span>
            </div>
            <div class="feature-item p-3 text-center animate-fade-in delay-600">
                <div class="p-3 bg-blue-50 dark:bg-blue-900/20 rounded-full inline-block mb-2">
                    <svg class="w-6 h-6 mx-auto text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                    </svg>
                </div>
                <span class="text-sm font-medium">Suivi</span>
            </div>
        </div>
    </div>
</body>
</html>