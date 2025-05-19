<script>
    (function () {
        const root = document.documentElement;

        // 🌗 Vérifie si l'utilisateur a déjà un thème sauvegardé
        const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
        const savedTheme = localStorage.getItem('theme');
        const currentTheme = savedTheme || (prefersDark ? 'dark' : 'light');

        // 🎨 Applique immédiatement le thème (class Tailwind "dark")
        root.classList.toggle('dark', currentTheme === 'dark');

        // 🔄 Met à jour les icônes selon le thème actif
        updateIcons(currentTheme);

        // 💡 Fonction accessible globalement pour basculer le thème
        window.toggleDark = function () {
            const isDark = root.classList.contains('dark');
            const newTheme = isDark ? 'light' : 'dark';

            // Applique le thème et le sauvegarde
            root.classList.toggle('dark', !isDark);
            localStorage.setItem('theme', newTheme);
            updateIcons(newTheme);
        };

        // 🌓 Affiche la bonne icône (soleil / lune)
        function updateIcons(theme) {
            const sunIcon = document.getElementById('sun-icon');
            const moonIcon = document.getElementById('moon-icon');

            if (!sunIcon || !moonIcon) return;

            if (theme === 'dark') {
                sunIcon.classList.remove('hidden');
                moonIcon.classList.add('hidden');
            } else {
                sunIcon.classList.add('hidden');
                moonIcon.classList.remove('hidden');
            }
        }
    })();
</script>
