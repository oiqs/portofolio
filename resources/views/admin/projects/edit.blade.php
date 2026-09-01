@extends('admin.layouts.admin')

@section('title', 'Edit Trip & Galeri Foto')

@section('content')

<div class="max-w-4xl mx-auto">
    <div class="mb-8">
        <a href="{{ route('admin.projects.index') }}" class="text-xs font-semibold text-muted hover:text-accent transition-colors flex items-center gap-1 mb-2">
            &larr; Kembali ke daftar trip
        </a>
        <h2 class="font-display text-2xl md:text-3xl font-bold">Edit Trip</h2>
    </div>

    <form method="POST" action="{{ route('admin.projects.update', $project) }}" enctype="multipart/form-data" class="bg-ink/[0.02] border border-ink/10 rounded-3xl p-6 sm:p-10 space-y-8 shadow-sm">
        @csrf
        @method('PUT')

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
                        <input type="text" name="title" id="title" value="{{ old('title', $project->title) }}" required
                               class="w-full px-4 py-3 rounded-xl border border-ink/10 bg-transparent focus:border-accent focus:ring-1 focus:ring-accent focus:outline-none transition-all text-sm">
                        @error('title') <p class="text-xs text-red-400 mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="slug" class="block text-xs font-semibold uppercase tracking-wider mb-2 text-muted">Slug URL</label>
                        <input type="text" name="slug" id="slug" value="{{ old('slug', $project->slug) }}"
                               class="w-full px-4 py-3 rounded-xl border border-ink/10 bg-transparent focus:border-accent focus:ring-1 focus:ring-accent focus:outline-none transition-all text-sm">
                        @error('slug') <p class="text-xs text-red-400 mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div>
                        <label for="year" class="block text-xs font-semibold uppercase tracking-wider mb-2 text-muted">Tahun Trip *</label>
                        <input type="text" name="year" id="year" value="{{ old('year', $project->year) }}" required
                               class="w-full px-4 py-3 rounded-xl border border-ink/10 bg-transparent focus:border-accent focus:ring-1 focus:ring-accent focus:outline-none transition-all text-sm">
                        @error('year') <p class="text-xs text-red-400 mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label for="role" class="block text-xs font-semibold uppercase tracking-wider mb-2 text-muted">Kategori Trip *</label>
                        <input type="text" name="role" id="role" value="{{ old('role', $project->role) }}" required
                               class="w-full px-4 py-3 rounded-xl border border-ink/10 bg-transparent focus:border-accent focus:ring-1 focus:ring-accent focus:outline-none transition-all text-sm">
                        @error('role') <p class="text-xs text-red-400 mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div>
                    <label for="description" class="block text-xs font-semibold uppercase tracking-wider mb-2 text-muted">Deskripsi Singkat *</label>
                    <textarea name="description" id="description" rows="3" required
                              class="w-full px-4 py-3 rounded-xl border border-ink/10 bg-transparent focus:border-accent focus:ring-1 focus:ring-accent focus:outline-none transition-all text-sm">{{ old('description', $project->description) }}</textarea>
                    @error('description') <p class="text-xs text-red-400 mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="stack" class="block text-xs font-semibold uppercase tracking-wider mb-2 text-muted">Elemen / Tags Trip (Pisahkan dengan koma) *</label>
                    <input type="text" name="stack" id="stack" value="{{ old('stack', is_array($project->stack) ? implode(', ', $project->stack) : $project->stack) }}" required
                           class="w-full px-4 py-3 rounded-xl border border-ink/10 bg-transparent focus:border-accent focus:ring-1 focus:ring-accent focus:outline-none transition-all text-sm">
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
                {{-- Foto Sampul Saat Ini & Ganti Foto --}}
                <div>
                    <label class="block text-xs font-semibold uppercase tracking-wider mb-2 text-muted">Foto Sampul Utama Saat Ini</label>
                    @if ($project->cover_image)
                        <div class="mb-3 w-48 h-32 rounded-2xl overflow-hidden border border-ink/10 bg-ink/10 relative">
                            <img src="{{ asset('storage/' . $project->cover_image) }}" alt="{{ $project->title }}" class="w-full h-full object-cover">
                        </div>
                    @else
                        <p class="text-xs text-muted italic mb-3">Belum ada foto sampul yang diunggah.</p>
                    @endif

                    <label for="cover_image" class="block text-xs font-semibold uppercase tracking-wider mb-2 text-muted">Ganti Foto Sampul Utama (Maksimal 50MB)</label>
                    <input type="file" name="cover_image" id="cover_image" accept="image/*"
                           class="w-full text-sm text-muted file:mr-4 file:py-2.5 file:px-5 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-accent/10 file:text-accent hover:file:bg-accent/20 cursor-pointer">
                    @error('cover_image') <p class="text-xs text-red-400 mt-1">{{ $message }}</p> @enderror
                </div>

                {{-- Galeri Foto Saat Ini & Tambah Foto --}}
                <div>
                    <label class="block text-xs font-semibold uppercase tracking-wider mb-2 text-muted">Galeri Foto Traveling Saat Ini</label>
                    @if (is_array($project->gallery_images) && count($project->gallery_images) > 0)
                        <p class="text-[11px] text-muted mb-3">Centang foto yang ingin Anda hapus dari galeri:</p>
                        <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 mb-4">
                            @foreach ($project->gallery_images as $img)
                                <div class="relative group rounded-2xl overflow-hidden border border-ink/10 bg-ink/10 aspect-video">
                                    <img src="{{ asset('storage/' . $img) }}" class="w-full h-full object-cover">
                                    <label class="absolute top-2 right-2 px-2 py-1 bg-red-600/90 text-white text-[10px] font-bold rounded-lg cursor-pointer hover:bg-red-700 transition-colors flex items-center gap-1.5 shadow-md">
                                        <input type="checkbox" name="remove_gallery_images[]" value="{{ $img }}" class="rounded text-red-600 focus:ring-red-500 w-3 h-3">
                                        <span>Hapus</span>
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-xs text-muted italic mb-3">Belum ada foto galeri untuk trip ini.</p>
                    @endif

                    <label for="gallery_images" class="block text-xs font-semibold uppercase tracking-wider mb-2 text-muted">Tambah Foto-foto Galeri Baru (Pilih Banyak)</label>
                    <input type="file" name="gallery_images[]" id="gallery_images" accept="image/*" multiple
                           class="w-full text-sm text-muted file:mr-4 file:py-2.5 file:px-5 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-accent/10 file:text-accent hover:file:bg-accent/20 cursor-pointer">
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
                              class="w-full px-4 py-3 rounded-xl border border-ink/10 bg-transparent focus:border-accent focus:ring-1 focus:ring-accent focus:outline-none transition-all text-sm">{{ old('problem', $project->problem) }}</textarea>
                </div>

                <div>
                    <label for="solution" class="block text-xs font-semibold uppercase tracking-wider mb-2 text-muted">Pengalaman Trip</label>
                    <textarea name="solution" id="solution" rows="4"
                              class="w-full px-4 py-3 rounded-xl border border-ink/10 bg-transparent focus:border-accent focus:ring-1 focus:ring-accent focus:outline-none transition-all text-sm">{{ old('solution', $project->solution) }}</textarea>
                </div>

                <div>
                    <label for="impact" class="block text-xs font-semibold uppercase tracking-wider mb-2 text-muted">Kesan & Catatan</label>
                    <textarea name="impact" id="impact" rows="4"
                              class="w-full px-4 py-3 rounded-xl border border-ink/10 bg-transparent focus:border-accent focus:ring-1 focus:ring-accent focus:outline-none transition-all text-sm">{{ old('impact', $project->impact) }}</textarea>
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
                    <input type="text" name="location_address" id="location_address" value="{{ old('location_address', $project->location_address) }}"
                           class="w-full px-4 py-3 rounded-xl border border-ink/10 bg-transparent focus:border-accent focus:ring-1 focus:ring-accent focus:outline-none transition-all text-sm placeholder:text-muted/40"
                           placeholder="Contoh: Curug 7 Cilember, Megamendung, Cisarua, Kabupaten Bogor, Jawa Barat 16750">
                    @error('location_address') <p class="text-xs text-red-400 mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="location_map_url" class="block text-xs font-semibold uppercase tracking-wider mb-2 text-muted">URL Google Maps (Link Share atau Embed Iframe)</label>
                    <input type="text" name="location_map_url" id="location_map_url" value="{{ old('location_map_url', $project->location_map_url) }}"
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
                <input type="checkbox" name="is_featured" value="1" {{ old('is_featured', $project->is_featured) ? 'checked' : '' }}
                       class="rounded border-ink/20 bg-transparent text-accent focus:ring-accent w-4 h-4">
                <span class="text-sm font-semibold">Tampilkan di Beranda (Featured Trip)</span>
            </label>
        </div>

        <div class="pt-4 flex items-center gap-4">
            <button type="submit" class="px-8 py-3.5 rounded-full bg-accent text-paper font-semibold hover:bg-accent-dark transition-all shadow-lg shadow-accent/20">
                Update Trip & Foto
            </button>
            <a href="{{ route('admin.projects.index') }}" class="px-6 py-3.5 rounded-full border border-ink/15 text-muted hover:text-ink transition-colors font-medium">
                Batal
            </a>
        </div>
    </form>
</div>

@endsection
