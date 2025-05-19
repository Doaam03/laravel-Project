<nav x-data="{ open: false }" class="bg-white/80 dark:bg-gray-800/90 backdrop-blur-md border-b border-gray-200/70 dark:border-gray-700/50 shadow-sm sticky top-0 z-50 transition-all duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <!-- Logo et liens -->
            <div class="flex items-center">
                <!-- Logo cliquable -->
                <a href="{{ route('dashboard') }}" class="flex items-center mr-8">
                    <x-application-logo class="h-9" />
                </a>

                <!-- Liens principaux -->
                <div class="hidden md:flex space-x-1">
                @php $isDashboard = request()->routeIs('dashboard'); @endphp
                <x-nav-link :href="route('dashboard')" :active="$isDashboard" class="px-4 py-2 rounded-lg hover:bg-gray-100/50 dark:hover:bg-gray-700/50 transition-all">
    <span class="relative">
        {{ __('Tableau de bord') }}
        <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-blue-500 group-hover:w-full transition-all duration-300"
              :class="{ 'w-full': {{ $isDashboard ? 'true' : 'false' }} }"></span>
    </span>
</x-nav-link>
                    
                    <!-- Autres liens avec le même style -->
                    <x-nav-link :href="route('clients.index')" :active="request()->routeIs('clients.*')" class="px-4 py-2 rounded-lg hover:bg-gray-100/50 dark:hover:bg-gray-700/50 transition-all">
                        {{ __('Clients') }}
                    </x-nav-link>
                    
                    <x-nav-link :href="route('articles.index')" :active="request()->routeIs('articles.*')" class="px-4 py-2 rounded-lg hover:bg-gray-100/50 dark:hover:bg-gray-700/50 transition-all">
                        {{ __('Articles') }}
                    </x-nav-link>
                    
                    <x-nav-link :href="route('factures.index')" :active="request()->routeIs('factures.*')" class="px-4 py-2 rounded-lg hover:bg-gray-100/50 dark:hover:bg-gray-700/50 transition-all">
                        {{ __('Factures') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Menu utilisateur -->
            <div class="flex items-center">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 text-sm font-medium rounded-md transition-all duration-300 hover:bg-gray-100/50 dark:hover:bg-gray-700/50 group">
                            <span class="text-gray-700 dark:text-gray-200 group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors">
                                {{ Auth::user()->name }}
                            </span>
                            <svg class="ml-1 h-4 w-4 text-gray-500 dark:text-gray-400 group-hover:text-blue-500 transition-transform transform group-hover:rotate-180" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')" class="group flex items-center px-4 py-2 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
                            <svg class="w-5 h-5 mr-2 text-gray-400 group-hover:text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            {{ __('Profile') }}
                        </x-dropdown-link>
                        
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();" class="group flex items-center px-4 py-2 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
                                <svg class="w-5 h-5 mr-2 text-gray-400 group-hover:text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                </svg>
                                {{ __('Déconnexion') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Menu mobile -->
            <div class="md:hidden flex items-center">
                <button @click="open = !open" class="p-2 rounded-md text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-200 hover:bg-gray-100/50 dark:hover:bg-gray-700/50 focus:outline-none transition-all">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': !open}" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': !open, 'inline-flex': open}" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Menu mobile -->
    <div x-show="open" x-transition.opacity class="md:hidden origin-top">
        <div class="pt-2 pb-3 space-y-1 px-4">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="block px-3 py-2 rounded-md text-base font-medium transition-colors">
                {{ __('Tableau de bord') }}
            </x-responsive-nav-link>
            <!-- Autres liens mobiles -->
        </div>
        
        <!-- Section utilisateur mobile -->
        <div class="pt-4 pb-3 border-t border-gray-200 dark:border-gray-700 px-4">
            <div class="flex items-center">
                <div class="ml-3">
                    <div class="text-base font-medium text-gray-800 dark:text-white">{{ Auth::user()->name }}</div>
                    <div class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ Auth::user()->email }}</div>
                </div>
            </div>
            
            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')" class="block px-3 py-2 rounded-md text-base font-medium transition-colors">
                    {{ __('Profile') }}
                </x-responsive-nav-link>
                
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();" class="block px-3 py-2 rounded-md text-base font-medium transition-colors">
                        {{ __('Déconnexion') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>