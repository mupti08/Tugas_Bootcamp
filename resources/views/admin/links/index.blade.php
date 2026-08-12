@extends('layouts.app')

@section('title', 'Daftar Link - Admin Dashboard')

@section('content')
<style>
    .dashboard-panel {
        background: rgba(10, 25, 50, 0.52);
        backdrop-filter: blur(18px);
        -webkit-backdrop-filter: blur(18px);
        border: 1px solid rgba(255, 255, 255, 0.20);
        box-shadow: 0 18px 40px rgba(0, 0, 0, 0.22);
    }

    .dashboard-row {
        transition: all 0.25s ease;
    }

    .dashboard-row:hover {
        background: rgba(255, 255, 255, 0.07);
    }

    .dashboard-button {
        transition: all 0.2s ease;
    }

    .dashboard-button:hover {
        transform: translateY(-2px);
    }

    .dashboard-soft {
        background: rgba(255, 255, 255, 0.09);
        border: 1px solid rgba(255, 255, 255, 0.18);
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
    }
</style>

<div class="space-y-6 sm:space-y-8">

    <!-- HEADER SECTION -->
    <div class="dashboard-panel p-5 sm:p-6 rounded-2xl sm:rounded-3xl text-white">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 sm:gap-6">
            <div>
                <h1 class="text-xl sm:text-2xl font-extrabold tracking-tight flex items-center gap-2.5 sm:gap-3">
                    <span class="w-2.5 h-2.5 sm:w-3 sm:h-3 bg-blue-400 rounded-full inline-block shadow-[0_0_10px_rgba(96,165,250,0.9)]"></span>
                    Kelola Servis
                </h1>
                <p class="text-xs sm:text-sm text-white/65 mt-1 sm:mt-1.5">
                    Atur tautan layanan dan informasi FIXLAPBOT ID.
                </p>
            </div>

            <a href="{{ route('admin.links.create') }}"
               class="dashboard-button w-full sm:w-auto bg-white text-slate-900 font-extrabold py-2.5 sm:py-3 px-6 rounded-xl sm:rounded-2xl shadow-lg flex items-center justify-center gap-2">
                <i data-lucide="plus" class="w-5 h-5 stroke-[2.5]"></i>
                Tambah Servis Baru
            </a>
        </div>
    </div>

    <!-- DATA LIST CONTAINER -->
    <div class="dashboard-panel rounded-2xl sm:rounded-3xl overflow-hidden flex flex-col text-white">

        <!-- TABLE HEADER -->
        <div class="hidden lg:grid grid-cols-12 gap-4 bg-black/15 text-white/65 px-6 py-4 border-b border-white/15 text-xs font-bold uppercase tracking-wider">
            <div class="col-span-5">Judul & Keterangan </div>
            <div class="col-span-2">Status</div>
            <div class="col-span-3">Total Klik</div>
            <div class="col-span-2 text-right">Aksi</div>
        </div>

        <!-- TABLE BODY -->
        <div class="divide-y divide-white/10">

            @forelse($links as $link)

                <div class="dashboard-row flex flex-col lg:grid lg:grid-cols-12 gap-4 lg:gap-4 items-start lg:items-center p-4 sm:p-6 lg:p-6">

                    <!-- LINK -->
                    <div class="lg:col-span-5 flex items-center space-x-3 sm:space-x-4 w-full">

                        @if($link->image)

                            <img
                                src="{{ asset('storage/' . $link->image) }}"
                                alt="{{ $link->title }}"
                                class="flex-shrink-0 h-10 w-10 sm:h-12 sm:w-12 object-cover rounded-lg sm:rounded-xl border border-white/30 shadow-lg"
                            >

                        @else

                            <div class="flex-shrink-0 h-10 w-10 sm:h-12 sm:w-12 bg-blue-400/20 text-blue-100 font-extrabold border border-white/25 flex items-center justify-center rounded-lg sm:rounded-xl">
                                {{ strtoupper(substr($link->title, 0, 2)) }}
                            </div>

                        @endif

                        <div class="overflow-hidden">
                            <div class="text-sm sm:text-base font-extrabold text-white truncate">
                                {{ $link->title }}
                            </div>

                            <div class="text-xs font-medium text-white/45 truncate mt-0.5">
                                {{ $link->url }}
                            </div>
                        </div>
                    </div>

                    <!-- STATUS & KLIK -->
                    <div class="flex flex-row lg:contents w-full gap-4 mt-2 lg:mt-0">

                        <!-- STATUS -->
                        <div class="lg:col-span-2 flex flex-col lg:flex-row items-start lg:items-center flex-1">

                            <span class="text-[10px] font-bold text-white/35 uppercase tracking-wider mb-1 lg:hidden">
                                Status
                            </span>

                            @if($link->is_active)

                                <span class="px-3 py-1.5 inline-flex text-xs font-bold rounded-full bg-emerald-400/15 text-emerald-200 border border-emerald-300/30 items-center gap-1.5 whitespace-nowrap">
                                    <span class="w-1.5 h-1.5 bg-emerald-400 rounded-full shadow-[0_0_8px_rgba(52,211,153,0.9)]"></span>
                                    Selesai
                                </span>

                            @else

                                <span class="px-3 py-1.5 inline-flex text-xs font-bold rounded-full bg-rose-400/15 text-rose-200 border border-rose-300/30 items-center gap-1.5 whitespace-nowrap">
                                    <span class="w-1.5 h-1.5 bg-rose-400 rounded-full"></span>
                                    Proses
                                </span>

                            @endif

                        </div>

                        <!-- TOTAL KLIK -->
                        <div class="lg:col-span-3 flex flex-col lg:flex-row items-start lg:items-center flex-1">

                            <span class="text-[10px] font-bold text-white/35 uppercase tracking-wider mb-1 lg:hidden">
                                Statistik
                            </span>

                            <div class="dashboard-soft inline-flex items-center px-3 py-1.5 rounded-lg text-xs font-bold text-white/85 whitespace-nowrap">
                                <i data-lucide="mouse-pointer-click" class="w-3.5 h-3.5 mr-1.5 text-blue-300"></i>
                                {{ number_format($link->clicks) }} Klik
                            </div>

                        </div>

                    </div>

                    <!-- AKSI -->
                    <div class="lg:col-span-2 flex items-center justify-start lg:justify-end space-x-2 sm:space-x-3 w-full lg:w-auto mt-2 lg:mt-0 pt-4 lg:pt-0 border-t border-dashed border-white/15 lg:border-none">

                        <!-- EDIT -->
                        <a
                            href="{{ route('admin.links.edit', $link) }}"
                            class="dashboard-button flex-1 lg:flex-none text-center px-4 py-2 sm:py-1.5 bg-blue-400/15 text-blue-200 rounded-lg sm:rounded-xl border border-blue-300/30 hover:bg-blue-400/25 text-xs font-bold"
                        >
                            Edit
                        </a>

                        <!-- HAPUS -->
                        <form
                            action="{{ route('admin.links.destroy', $link) }}"
                            method="POST"
                            class="flex-1 lg:flex-none"
                            onsubmit="return confirm('Apakah Anda yakin ingin menghapus tautan ini?');"
                        >
                            @csrf
                            @method('DELETE')

                            <button
                                type="submit"
                                class="dashboard-button w-full text-center px-4 py-2 sm:py-1.5 bg-rose-400/15 text-rose-200 rounded-lg sm:rounded-xl border border-rose-300/30 hover:bg-rose-400/25 text-xs font-bold"
                            >
                                Hapus
                            </button>
                        </form>

                    </div>

                </div>

            @empty

                <!-- EMPTY STATE -->
                <div class="px-6 py-16 text-center">

                    <div class="flex flex-col items-center justify-center max-w-sm mx-auto p-6 dashboard-soft rounded-2xl">

                        <div class="bg-blue-400/15 p-3 rounded-2xl border border-blue-300/25 mb-3 text-blue-200">
                            <i data-lucide="inbox" class="w-6 h-6"></i>
                        </div>

                        <p class="text-base font-extrabold text-white">
                            Belum ada data link.
                        </p>

                        <p class="text-xs text-white/50 mt-1">
                            Silakan tambahkan tautan baru untuk mulai membagikan layanan FIXLAPBOT ID.
                        </p>

                    </div>

                </div>

            @endforelse

        </div>

        <!-- PAGINATION -->
        @if($links->hasPages())

            <div class="bg-black/10 border-t border-white/10 px-6 py-4">
                {{ $links->links('vendor.pagination.custom') }}
            </div>

        @endif

    </div>
</div>
@endsection
