@extends('layouts.app')

@section('title', 'Edit Servis - FIXLAPBOT ID')

@section('content')
<style>
    .service-glass {
        background: rgba(10, 25, 50, 0.52);
        backdrop-filter: blur(18px);
        -webkit-backdrop-filter: blur(18px);
        border: 1px solid rgba(255, 255, 255, 0.20);
        box-shadow: 0 18px 40px rgba(0, 0, 0, 0.22);
    }

    .service-soft {
        background: rgba(255, 255, 255, 0.08);
        border: 1px solid rgba(255, 255, 255, 0.18);
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
    }

    .service-input {
        background: rgba(255, 255, 255, 0.08);
        border: 1px solid rgba(255, 255, 255, 0.22);
        color: #ffffff;
        transition: all 0.2s ease;
    }

    .service-input:focus {
        outline: none;
        border-color: rgba(147, 197, 253, 0.75);
        background: rgba(255, 255, 255, 0.12);
        box-shadow: 0 0 0 4px rgba(96, 165, 250, 0.12);
    }

    .service-input::placeholder {
        color: rgba(255, 255, 255, 0.40);
    }

    .service-button {
        transition: all 0.2s ease;
    }

    .service-button:hover {
        transform: translateY(-2px);
    }
</style>

<div class="max-w-3xl mx-auto space-y-6 sm:space-y-8">

    <!-- HEADER SECTION -->
    <div class="service-glass p-5 sm:p-6 rounded-2xl sm:rounded-3xl text-white">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <div>
                <h1 class="text-xl sm:text-2xl font-extrabold flex items-center gap-2.5">
                    <a
                        href="{{ route('admin.links.index') }}"
                        class="service-soft text-white p-1.5 rounded-lg transition-all hover:bg-white/15"
                    >
                        <i data-lucide="arrow-left" class="w-5 h-5 stroke-[2.5]"></i>
                    </a>
                    Edit Servis
                </h1>

                <p class="text-xs sm:text-sm text-white/60 mt-2">
                    Perbarui data servis laptop pada sistem FIXLAPBOT ID.
                </p>
            </div>
        </div>
    </div>

    <!-- FORM UTAMA -->
    <div class="service-glass rounded-2xl sm:rounded-3xl p-6 sm:p-8 text-white">

        <form action="{{ route('admin.links.update', $link->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- FIELD JUDUL -->
            <div class="space-y-2">
                <label for="title" class="block text-sm font-bold text-white">
                    Nama Laptop & Jenis Kerusakan
                    <span class="text-rose-300">*</span>
                </label>

                <input
                    type="text"
                    id="title"
                    name="title"
                    value="{{ old('title', $link->title) }}"
                    required
                    class="service-input w-full px-4 py-3 rounded-xl font-medium"
                >

                @error('title')
                    <p class="text-xs font-bold text-rose-300 flex items-center gap-1 mt-1">
                        <i data-lucide="circle-alert" class="w-3.5 h-3.5"></i>
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <!-- FIELD URL -->
            <div class="space-y-2">
                <label for="url" class="block text-sm font-bold text-white">
                    URL Tujuan
                    <span class="text-rose-300">*</span>
                </label>

                <input
                    type="url"
                    id="url"
                    name="url"
                    value="{{ old('url', $link->url) }}"
                    required
                    class="service-input w-full px-4 py-3 rounded-xl font-medium"
                >

                @error('url')
                    <p class="text-xs font-bold text-rose-300 flex items-center gap-1 mt-1">
                        <i data-lucide="circle-alert" class="w-3.5 h-3.5"></i>
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <!-- FIELD GAMBAR -->
            <div class="space-y-3">
                <label class="block text-sm font-bold text-white">
                    Ikon / Logo
                    <span class="text-white/40 font-medium">(Opsional)</span>
                </label>

                <!-- GAMBAR SAAT INI -->
                <div class="service-soft p-4 rounded-xl">
                    <p class="text-[10px] font-bold text-white/45 uppercase tracking-wider mb-2">
                        Gambar Saat Ini
                    </p>

                    @if($link->image)
                        <img
                            src="{{ asset('storage/' . $link->image) }}"
                            class="h-16 w-16 object-cover rounded-xl border border-white/30 shadow-lg"
                            alt="Gambar Saat Ini"
                        >
                    @else
                        <span class="inline-block px-3 py-1.5 bg-white/10 border border-white/20 rounded-lg text-xs font-bold text-white/50">
                            Belum Ada Gambar
                        </span>
                    @endif
                </div>

                <!-- DROPZONE -->
                <div id="preview-wrapper" class="relative overflow-hidden rounded-2xl service-soft transition-colors duration-200">

                    <div id="preview-empty" class="flex flex-col items-center justify-center gap-3 py-8 px-6 cursor-pointer hover:bg-white/5 text-center">
                        <div class="w-12 h-12 rounded-2xl bg-blue-400/15 border border-blue-300/30 flex items-center justify-center text-blue-200">
                            <i data-lucide="image-plus" class="w-6 h-6 stroke-[2.5]"></i>
                        </div>

                        <div>
                            <p class="text-sm font-extrabold text-white">
                                Ganti Gambar Baru?
                            </p>

                            <p class="text-[11px] font-semibold text-white/45 mt-1">
                                Biarkan kosong jika tidak ingin mengubahnya.
                            </p>
                        </div>
                    </div>

                    <div id="preview-filled" class="hidden">
                        <img
                            id="preview-img"
                            src=""
                            class="w-full max-h-72 object-contain bg-black/20"
                            alt="Pratinjau Gambar Baru"
                        >

                        <div class="flex justify-between items-center p-4 bg-black/20 border-t border-white/10">
                            <p id="preview-file-name" class="text-sm font-extrabold text-white truncate">
                                nama-file.png
                            </p>

                            <button
                                type="button"
                                id="preview-remove"
                                class="service-button text-xs text-rose-200 bg-rose-400/15 font-extrabold px-3 py-1.5 rounded-lg border border-rose-300/30 hover:bg-rose-400/25"
                            >
                                Batal Ganti
                            </button>
                        </div>
                    </div>
                </div>

                <input type="file" id="image" name="image" accept="image/*" class="hidden">

                @error('image')
                    <p class="text-xs font-bold text-rose-300 flex items-center gap-1 mt-1">
                        <i data-lucide="circle-alert" class="w-3.5 h-3.5"></i>
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <!-- TOGGLE STATUS -->
            <div class="pt-2">
                <label for="is_active" class="cursor-pointer select-none">
                    <div class="flex items-center justify-between gap-4 service-soft rounded-2xl px-4 sm:px-5 py-3.5 transition-all hover:bg-white/10">

                        <div class="flex items-center gap-3">
                            <span class="bg-blue-400/15 text-blue-200 p-2 rounded-xl border border-blue-300/20">
                                <i data-lucide="eye" class="w-5 h-5 stroke-[2.5]"></i>
                            </span>

                            <div class="flex flex-col">
                                <span class="text-sm font-extrabold text-white">
                                    Tampilkan Servic Ini ke Publik
                                </span>

                                <span id="is_active_hint" class="text-[11px] font-semibold text-white/45 mt-0.5">
                                    Tautan akan terlihat di halaman publik
                                </span>
                            </div>
                        </div>

                        <input
                            type="checkbox"
                            id="is_active"
                            name="is_active"
                            class="sr-only peer"
                            {{ old('is_active', $link->is_active) ? 'checked' : '' }}
                        >

                        <span class="relative w-12 h-7 bg-white/15 peer-checked:bg-emerald-400/60 rounded-full border border-white/30 transition-colors duration-300 shrink-0 after:content-[''] after:absolute after:top-0.5 after:left-0.5 after:w-5 after:h-5 after:bg-white after:rounded-full after:transition-transform peer-checked:after:translate-x-5"></span>
                    </div>
                </label>
            </div>

            <!-- ACTION BUTTONS -->
            <div class="pt-6 flex justify-end gap-3 border-t border-dashed border-white/15">

                <a
                    href="{{ route('admin.links.index') }}"
                    class="service-button bg-white/10 hover:bg-white/15 text-white font-extrabold py-3 px-6 rounded-xl border border-white/20"
                >
                    Batal
                </a>

                <button
                    type="submit"
                    class="service-button bg-emerald-400 hover:bg-emerald-300 text-slate-950 font-extrabold py-3 px-8 rounded-xl flex items-center gap-2 shadow-lg shadow-emerald-500/15"
                >
                    <i data-lucide="check-circle-2" class="w-5 h-5 stroke-[2.5]"></i>
                    Simpan Perubahan
                </button>

            </div>
        </form>
    </div>
</div>

<script src="{{ asset('js/image-preview.js') }}"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const toggle = document.getElementById('is_active');
        const hint = document.getElementById('is_active_hint');

        if (toggle && hint) {
            const updateHint = () => {
                hint.textContent = toggle.checked
                    ? 'Tautan akan terlihat di halaman publik'
                    : 'Tautan disembunyikan dari halaman publik';
            };

            toggle.addEventListener('change', updateHint);
            updateHint();
        }
    });
</script>
@endsection
