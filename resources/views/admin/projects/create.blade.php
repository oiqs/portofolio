@extends('admin.layouts.admin')

@section('title', 'Tambah Trip & Foto Traveling Baru')

@section('content')

<div class="max-w-4xl mx-auto">
    <div class="mb-8">
        <a href="{{ route('admin.projects.index') }}" class="text-xs font-semibold text-muted hover:text-accent transition-colors flex items-center gap-1 mb-2">
            &larr; Kembali ke daftar trip
        </a>
        <h2 class="font-display text-2xl md:text-3xl font-bold">Tambah Trip Baru</h2>
    </div>

    <form method="POST" action="{{ route('admin.projects.store') }}" enctype="multipart/form-data" class="bg-ink/[0.02] border border-ink/10 rounded-3xl p-6 sm:p-10 space-y-8 shadow-sm">
        @csrf

        {{-- BAGIAN 1: INFORMASI UTAMA --}}
        <div>
            <h3 class="font-display text-lg font-bold mb-4 flex items-center gap-2">
                <span class="w-2 h-2 rounded-full bg-accent"></span>
                <span>Informasi Utama Trip</span>
            </h3>

            <div class="space-y-6">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div>
                        <label for="title" class="block text-xs font-semibold uppercase tracking-wider mb-2 text-muted">Judul Trip *</label>
                        <input type="text" name="title" id="title" value="{{ old('title') }}" required
                               class="w-full px-4 py-3 rounded-xl border border-ink/10 bg-transparent focus:border-accent focus:ring-1 focus:ring-accent focus:outline-none transition-all text-sm placeholder:text-muted/40"
                               placeholder="Contoh: Jelajah Curug & Ketenangan Bogor">
                        @error('title') <p class="text-xs text-red-400 mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="slug" class="block text-xs font-semibold uppercase tracking-wider mb-2 text-muted">Slug URL (Opsional)</label>
                        <input type="text" name="slug" id="slug" value="{{ old('slug') }}"
                               class="w-full px-4 py-3 rounded-xl border border-ink/10 bg-transparent focus:border-accent focus:ring-1 focus:ring-accent focus:outline-none transition-all text-sm placeholder:text-muted/40"
                               placeholder="otomatis-dari-judul jika dikosongkan">
                        @error('slug') <p class="text-xs text-red-400 mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div>
                        <label for="year" class="block text-xs font-semibold uppercase tracking-wider mb-2 text-muted">Tahun Trip *</label>
                        <input type="text" name="year" id="year" value="{{ old('year', '2025') }}" required
                               class="w-full px-4 py-3 rounded-xl border border-ink/10 bg-transparent focus:border-accent focus:ring-1 focus:ring-accent focus:outline-none transition-all text-sm">
                        @error('year') <p class="text-xs text-red-400 mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="role" class="block text-xs font-semibold uppercase tracking-wider mb-2 text-muted">Kategori Trip *</label>
                        <input type="text" name="role" id="role" value="{{ old('role', 'Solo Trip & Nature') }}" required
                               class="w-full px-4 py-3 rounded-xl border border-ink/10 bg-transparent focus:border-accent focus:ring-1 focus:ring-accent focus:outline-none transition-all text-sm placeholder:text-muted/40"
                               placeholder="Contoh: Camping & Relax / Road Trip">
                        @error('role') <p class="text-xs text-red-400 mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div>
                    <label for="description" class="block text-xs font-semibold uppercase tracking-wider mb-2 text-muted">Deskripsi Singkat *</label>
                    <textarea name="description" id="description" rows="3" required
                              class="w-full px-4 py-3 rounded-xl border border-ink/10 bg-transparent focus:border-accent focus:ring-1 focus:ring-accent focus:outline-none transition-all text-sm placeholder:text-muted/40"
                              placeholder="Ringkasan trip untuk kartu galeri...">{{ old('description') }}</textarea>
                    @error('description') <p class="text-xs text-red-400 mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="stack" class="block text-xs font-semibold uppercase tracking-wider mb-2 text-muted">Elemen / Tags Trip (Pisahkan dengan koma) *</label>
                    <input type="text" name="stack" id="stack" value="{{ old('stack') }}" required
                           class="w-full px-4 py-3 rounded-xl border border-ink/10 bg-transparent focus:border-accent focus:ring-1 focus:ring-accent focus:outline-none transition-all text-sm placeholder:text-muted/40"
                           placeholder="Contoh: Curug, Trekking, Healing">
                    @error('stack') <p class="text-xs text-red-400 mt-1">{{ $message }}</p> @enderror
                </div>
            </div>
        </div>

        <hr class="border-ink/10" />

        {{-- BAGIAN 2: FOTO & GALERI TRAVELING --}}
        <div>
            <h3 class="font-display text-lg font-bold mb-4 flex items-center gap-2">
                <span class="w-2 h-2 rounded-full bg-accent"></span>
                <span>Foto & Galeri Perjalanan</span>
            </h3>

            <div class="space-y-6">
                {{-- Foto Sampul --}}
                <div>
                    <label for="cover_image" class="block text-xs font-semibold uppercase tracking-wider mb-2 text-muted">Foto Sampul Utama (Cover Image)</label>
                    <input type="file" name="cover_image" id="cover_image" accept="image/*"
                           class="w-full text-sm text-muted file:mr-4 file:py-2.5 file:px-5 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-accent/10 file:text-accent hover:file:bg-accent/20 cursor-pointer">
                    <p class="text-[11px] text-muted mt-1.5">Format yang didukung: JPG, PNG, WEBP, GIF (Maksimal 50MB per foto). Ditampilkan di kartu galeri dan header detail.</p>
                    @error('cover_image') <p class="text-xs text-red-400 mt-1">{{ $message }}</p> @enderror
                </div>

                {{-- Multiple Galeri Images --}}
                <div>
                    <label for="gallery_images" class="block text-xs font-semibold uppercase tracking-wider mb-2 text-muted">Foto-foto Galeri Perjalanan (Bisa Pilih Banyak Foto)</label>
                    <input type="file" name="gallery_images[]" id="gallery_images" accept="image/*" multiple
                           class="w-full text-sm text-muted file:mr-4 file:py-2.5 file:px-5 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-accent/10 file:text-accent hover:file:bg-accent/20 cursor-pointer">
                    <p class="text-[11px] text-muted mt-1.5">Anda bisa memilih banyak foto sekaligus (Multiple files) untuk dijadikan album galeri trip ini.</p>
                    @error('gallery_images') <p class="text-xs text-red-400 mt-1">{{ $message }}</p> @enderror
                </div>
            </div>
        </div>

        <hr class="border-ink/10" />

        {{-- BAGIAN 3: LATAR BELAKANG & PENGALAMAN --}}
        <div>
            <h3 class="font-display text-lg font-bold mb-4 flex items-center gap-2">
                <span class="w-2 h-2 rounded-full bg-accent"></span>
                <span>Detail Pengalaman & Catatan</span>
            </h3>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div>
                    <label for="problem" class="block text-xs font-semibold uppercase tracking-wider mb-2 text-muted">Latar Belakang Trip</label>
                    <textarea name="problem" id="problem" rows="4"
                              class="w-full px-4 py-3 rounded-xl border border-ink/10 bg-transparent focus:border-accent focus:ring-1 focus:ring-accent focus:outline-none transition-all text-sm placeholder:text-muted/40"
                              placeholder="Rutinitas padat yang membutuhkan tempat rileksasi...">{{ old('problem') }}</textarea>
                </div>

                <div>
                    <label for="solution" class="block text-xs font-semibold uppercase tracking-wider mb-2 text-muted">Pengalaman Trip</label>
                    <textarea name="solution" id="solution" rows="4"
                              class="w-full px-4 py-3 rounded-xl border border-ink/10 bg-transparent focus:border-accent focus:ring-1 focus:ring-accent focus:outline-none transition-all text-sm placeholder:text-muted/40"
                              placeholder="Melakukan trekking air terjun alami...">{{ old('solution') }}</textarea>
                </div>

                <div>
                    <label for="impact" class="block text-xs font-semibold uppercase tracking-wider mb-2 text-muted">Kesan & Catatan</label>
                    <textarea name="impact" id="impact" rows="4"
                              class="w-full px-4 py-3 rounded-xl border border-ink/10 bg-transparent focus:border-accent focus:ring-1 focus:ring-accent focus:outline-none transition-all text-sm placeholder:text-muted/40"
                              placeholder="Pikiran menjadi segar kembali...">{{ old('impact') }}</textarea>
                </div>
            </div>
        </div>

        <hr class="border-ink/10" />

        {{-- BAGIAN 4: LOKASI & PETA WISATA (GOOGLE MAPS) --}}
        <div>
            <h3 class="font-display text-lg font-bold mb-4 flex items-center gap-2">
                <span class="w-2 h-2 rounded-full bg-accent"></span>
                <span>Lokasi & Peta Wisata (Google Maps)</span>
            </h3>

            <div class="space-y-6">
                <div>
                    <label for="location_address" class="block text-xs font-semibold uppercase tracking-wider mb-2 text-muted">Alamat Lengkap Wisata / Destinasi</label>
                    <input type="text" name="location_address" id="location_address" value="{{ old('location_address') }}"
                           class="w-full px-4 py-3 rounded-xl border border-ink/10 bg-transparent focus:border-accent focus:ring-1 focus:ring-accent focus:outline-none transition-all text-sm placeholder:text-muted/40"
                           placeholder="Contoh: Curug 7 Cilember, Megamendung, Cisarua, Kabupaten Bogor, Jawa Barat 16750">
                    @error('location_address') <p class="text-xs text-red-400 mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="location_map_url" class="block text-xs font-semibold uppercase tracking-wider mb-2 text-muted">URL Google Maps (Link Share atau Embed Iframe)</label>
                    <input type="text" name="location_map_url" id="location_map_url" value="{{ old('location_map_url') }}"
                           class="w-full px-4 py-3 rounded-xl border border-ink/10 bg-transparent focus:border-accent focus:ring-1 focus:ring-accent focus:outline-none transition-all text-sm placeholder:text-muted/40"
                           placeholder="Paste link https://www.google.com/maps/... atau embed iframe Google Maps di sini">
                    <p class="text-[11px] text-muted mt-1.5">Tips: Anda bisa menyalin link Google Maps (Sematan peta / Bagikan lokasi) agar pengunjung bisa langsung melihat peta lokasi wisata di halaman detail.</p>
                    @error('location_map_url') <p class="text-xs text-red-400 mt-1">{{ $message }}</p> @enderror
                </div>
            </div>
        </div>

        <hr class="border-ink/10" />

        <div class="flex items-center justify-between">
            <label class="flex items-center gap-3 cursor-pointer">
                <input type="checkbox" name="is_featured" value="1" {{ old('is_featured', true) ? 'checked' : '' }}
                       class="rounded border-ink/20 bg-transparent text-accent focus:ring-accent w-4 h-4">
                <span class="text-sm font-semibold">Tampilkan di Beranda (Featured Trip)</span>
            </label>
        </div>

        <div class="pt-4 flex items-center gap-4">
            <button type="submit" class="px-8 py-3.5 rounded-full bg-accent text-paper font-semibold hover:bg-accent-dark transition-all shadow-lg shadow-accent/20">
                Simpan Trip & Foto Baru
            </button>
            <a href="{{ route('admin.projects.index') }}" class="px-6 py-3.5 rounded-full border border-ink/15 text-muted hover:text-ink transition-colors font-medium">
                Batal
            </a>
        </div>
    </form>
</div>

@endsection
