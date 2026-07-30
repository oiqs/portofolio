<!DOCTYPE html>
<html lang="id" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login — Thoriq Alfurqan M.L</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-paper text-ink min-h-screen flex items-center justify-center p-6 antialiased">
    <div class="w-full max-w-md bg-ink/5 border border-ink/10 rounded-3xl p-8 sm:p-10 shadow-2xl relative overflow-hidden backdrop-blur-xl">
        <div class="absolute -top-24 -right-24 w-48 h-48 bg-accent/20 rounded-full blur-3xl pointer-events-none"></div>

        <div class="text-center mb-8">
            <span class="inline-block w-3 h-3 rounded-full bg-accent animate-pulse mb-3"></span>
            <h1 class="font-display text-3xl font-bold">Admin Portal</h1>
            <p class="text-xs text-muted mt-2 uppercase tracking-widest">Login ke Panel Pengelola Portfolio</p>
        </div>

        @if ($errors->any())
            <div class="mb-6 px-4 py-3 rounded-xl bg-red-500/10 border border-red-500/20 text-red-400 text-sm">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('admin.login.submit') }}" class="space-y-6">
            @csrf
            <div>
                <label for="email" class="block text-xs font-semibold uppercase tracking-wider mb-2 text-muted">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" required autofocus
                       class="w-full px-4 py-3.5 rounded-xl border border-ink/10 bg-transparent focus:border-accent focus:ring-1 focus:ring-accent focus:outline-none transition-all placeholder:text-muted/40 text-sm"
                       placeholder="admin@thoriq.com">
            </div>

            <div>
                <label for="password" class="block text-xs font-semibold uppercase tracking-wider mb-2 text-muted">Password</label>
                <input type="password" name="password" id="password" required
                       class="w-full px-4 py-3.5 rounded-xl border border-ink/10 bg-transparent focus:border-accent focus:ring-1 focus:ring-accent focus:outline-none transition-all text-sm"
                       placeholder="••••••••">
            </div>

            <div class="flex items-center justify-between text-xs">
                <label class="flex items-center gap-2 text-muted cursor-pointer">
                    <input type="checkbox" name="remember" class="rounded border-ink/20 bg-transparent text-accent focus:ring-accent">
                    <span>Ingat Saya</span>
                </label>
            </div>

            <button type="submit" class="w-full py-4 rounded-xl bg-accent text-paper font-semibold hover:bg-accent-dark transition-all duration-300 shadow-lg shadow-accent/20 hover:-translate-y-0.5">
                Masuk ke Admin Panel
            </button>
        </form>

        <div class="mt-8 text-center border-t border-ink/10 pt-6">
            <a href="{{ url('/') }}" class="text-xs text-muted hover:text-accent transition-colors">&larr; Kembali ke Website Utama</a>
        </div>
    </div>
</body>
</html>
