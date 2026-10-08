<footer class="border-t border-ink/5 mt-0 bg-ink/5">
    <div class="max-w-6xl mx-auto px-6 md:px-10 py-12 flex flex-col md:flex-row justify-between items-center gap-6">
        <p class="text-sm text-muted tracking-wide">© {{ date('Y') }} Thoriq Alfurqan M.L (oiq_s). {{ __('Dibuat dengan cinta & apresiasi alam.') }}</p>
        <div class="flex gap-8 text-sm tracking-wide">
            <a href="https://instagram.com/oiq_s" target="_blank" rel="noopener" class="text-muted hover:text-accent transition-colors">Instagram</a>
            <a href="https://wa.me/6281234567890" target="_blank" rel="noopener" class="text-muted hover:text-accent transition-colors">WhatsApp</a>
            <a href="{{ url('/contact') }}" class="text-muted hover:text-accent transition-colors">{{ __('Contact') }}</a>
        </div>
    </div>
</footer>