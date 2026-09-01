@extends('admin.layouts.admin')

@section('title', 'Detail Pesan Masuk')

@section('content')

<div class="max-w-4xl mx-auto space-y-6">
    <div class="flex items-center justify-between">
        <div>
            <a href="{{ route('admin.messages.index') }}" class="text-xs font-semibold text-muted hover:text-accent transition-colors">&larr; Kembali ke Inbox</a>
            <h2 class="font-display text-3xl font-bold mt-1">Detail Pesan Masuk</h2>
        </div>

        <form action="{{ route('admin.messages.destroy', $message) }}" method="POST" onsubmit="return confirm('Hapus pesan ini?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="px-4 py-2 rounded-xl border border-red-500/20 text-xs text-red-400 hover:bg-red-500/10 transition-colors">
                Hapus Pesan
            </button>
        </form>
    </div>

    @if (session('success'))
        <div class="p-5 rounded-2xl bg-accent/10 border border-accent/20 text-accent font-medium text-sm flex items-center gap-3">
            <svg class="w-5 h-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
            </svg>
            <span>{{ session('success') }}</span>
        </div>
    @endif

    {{-- KARTU PESAN MASUK --}}
    <div class="bg-ink/[0.02] border border-ink/10 rounded-3xl p-6 sm:p-8 space-y-6 shadow-sm">
        <div class="flex flex-wrap items-center justify-between border-b border-ink/10 pb-6 gap-4">
            <div>
                <div class="flex items-center gap-2">
                    <p class="text-xs text-muted uppercase tracking-wider">Pengirim</p>
                    @if ($message->is_replied)
                        <span class="px-2.5 py-0.5 rounded-full text-[10px] font-bold bg-green-500/10 border border-green-500/30 text-green-500 uppercase tracking-wider">Sudah Dibalas</span>
                    @else
                        <span class="px-2.5 py-0.5 rounded-full text-[10px] font-bold bg-amber-500/10 border border-amber-500/30 text-amber-500 uppercase tracking-wider">Belum Dibalas</span>
                    @endif
                </div>
                <h3 class="font-display text-2xl font-bold text-ink mt-1">{{ $message->name }}</h3>
                <a href="mailto:{{ $message->email }}" class="text-sm text-accent hover:underline font-medium">{{ $message->email }}</a>
            </div>
            <div class="text-right">
                <p class="text-xs text-muted uppercase tracking-wider">Diterima Pada</p>
                <p class="text-sm text-ink font-medium mt-1">{{ $message->created_at->format('d M Y, H:i') }} WIB</p>
                <p class="text-xs text-muted">{{ $message->created_at->diffForHumans() }}</p>
            </div>
        </div>

        <div>
            <p class="text-xs font-semibold text-muted uppercase tracking-wider mb-3">Isi Pesan Pengunjung:</p>
            <div class="p-6 rounded-2xl bg-ink/5 border border-ink/5 text-ink leading-relaxed whitespace-pre-line text-base font-body">
                {{ $message->message }}
            </div>
        </div>

        {{-- RIWAYAT BALASAN YANG SUDAH DIKIRIM (JIKA ADA) --}}
        @if ($message->is_replied && !empty($message->reply_message))
            <div class="border-t border-ink/10 pt-6">
                <div class="flex items-center justify-between mb-3">
                    <p class="text-xs font-bold text-accent uppercase tracking-wider flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6" />
                        </svg>
                        Balasan Terakhir Anda
                    </p>
                    <span class="text-xs text-muted">Dikirim: {{ optional($message->replied_at)->format('d M Y, H:i') ?? '-' }}</span>
                </div>
                <div class="p-6 rounded-2xl bg-accent/5 border border-accent/20 text-ink leading-relaxed whitespace-pre-line text-sm italic">
                    {{ $message->reply_message }}
                </div>
            </div>
        @endif
    </div>

    {{-- FORM BALAS PESAN & QUICK ACTIONS --}}
    <div class="bg-ink/[0.02] border border-ink/10 rounded-3xl p-6 sm:p-8 space-y-6 shadow-sm">
        <div>
            <h3 class="font-display text-xl font-bold flex items-center gap-2">
                <span class="w-2.5 h-2.5 rounded-full bg-accent"></span>
                <span>Form Balas Pesan</span>
            </h3>
            <p class="text-xs text-muted mt-1">Tuliskan pesan balasan Anda di bawah ini untuk dikirimkan langsung ke email pengirim ({{ $message->email }}).</p>
        </div>

        <form action="{{ route('admin.messages.reply', $message) }}" method="POST" class="space-y-5">
            @csrf

            <div>
                <label for="reply_subject" class="block text-xs font-semibold uppercase tracking-wider mb-2 text-muted">Subjek Balasan *</label>
                <input type="text" name="reply_subject" id="reply_subject" 
                       value="{{ old('reply_subject', 'Re: Balasan Pesan dari Thoriq Alfurqan (oiq_s)') }}" required
                       class="w-full px-4 py-3 rounded-xl border border-ink/10 bg-transparent focus:border-accent focus:ring-1 focus:ring-accent focus:outline-none transition-all text-sm font-medium">
                @error('reply_subject') <p class="text-xs text-red-400 mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="reply_message" class="block text-xs font-semibold uppercase tracking-wider mb-2 text-muted">Isi Pesan Balasan *</label>
                <textarea name="reply_message" id="reply_message" rows="6" required
                          class="w-full px-4 py-3 rounded-xl border border-ink/10 bg-transparent focus:border-accent focus:ring-1 focus:ring-accent focus:outline-none transition-all text-sm leading-relaxed placeholder:text-muted/40"
                          placeholder="Halo {{ $message->name }}, terima kasih telah mengirimkan pesan...">{{ old('reply_message', $message->reply_message) }}</textarea>
                @error('reply_message') <p class="text-xs text-red-400 mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="flex flex-wrap items-center justify-between gap-4 pt-2">
                <button type="submit" class="px-8 py-3.5 rounded-full bg-accent text-paper font-semibold hover:bg-accent-dark transition-all shadow-lg shadow-accent/20 text-sm flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                    </svg>
                    Kirim & Simpan Balasan
                </button>

                @php
                    $gmailSubject = urlencode('Re: Balasan Pesan dari Thoriq Alfurqan');
                    $gmailBody = urlencode("Halo {$message->name},\n\n\n\n---\nPesan Asli dari Anda:\n{$message->message}");
                    $gmailUrl = "https://mail.google.com/mail/?view=cm&fs=1&to={$message->email}&su={$gmailSubject}&body={$gmailBody}";
                @endphp

                <div class="flex items-center gap-3 text-xs">
                    <span class="text-muted">Atau balas via:</span>
                    <a href="{{ $gmailUrl }}" target="_blank" rel="noopener noreferrer" 
                       class="px-4 py-2 rounded-xl border border-ink/15 text-ink font-medium hover:border-accent hover:text-accent transition-colors flex items-center gap-1.5">
                        <svg class="w-4 h-4 text-red-500" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M24 5.457v13.909c0 .904-.732 1.636-1.636 1.636h-3.819V11.73L12 16.64l-6.545-4.91v9.272H1.636A1.636 1.636 0 0 1 0 19.366V5.457c0-2.023 2.309-3.178 3.927-1.964L12 9.545l8.073-6.052c1.618-1.214 3.927-.059 3.927 1.964z"/>
                        </svg>
                        Buka Gmail Web
                    </a>
                    <a href="mailto:{{ $message->email }}?subject={{ $gmailSubject }}&body={{ $gmailBody }}" 
                       class="px-4 py-2 rounded-xl border border-ink/15 text-muted font-medium hover:text-ink transition-colors">
                        App Email Default
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
