<!DOCTYPE html>
<html lang="id" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Portfolio')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script>
        // On page load or when changing themes, inline script avoids FOUC
        if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }

        if (localStorage.colorTheme) {
            document.documentElement.setAttribute('data-color', localStorage.colorTheme);
        }
    </script>
</head>
<body class="bg-paper text-ink transition-colors duration-500 relative">
    <x-navbar />

    <main>
        @yield('content')
    </main>

    <x-footer />

    {{-- FLOATING COLOR PICKER IN BOTTOM LEFT --}}
    <x-color-picker />
    
    <script>
        function toggleTheme() {
            if (document.documentElement.classList.contains('dark')) {
                document.documentElement.classList.remove('dark');
                localStorage.theme = 'light';
            } else {
                document.documentElement.classList.add('dark');
                localStorage.theme = 'dark';
            }
        }

        function setColorTheme(color) {
            document.documentElement.setAttribute('data-color', color);
            localStorage.colorTheme = color;
            window.dispatchEvent(new CustomEvent('color-theme-changed', { detail: color }));
        }
    </script>
</body>
</html>