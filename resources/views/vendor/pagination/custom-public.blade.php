@if ($paginator->hasPages())
    <div class="w-full flex justify-between items-center mt-10 px-2 gap-4">

        <!-- Tombol Prev -->
        @if ($paginator->onFirstPage())
            <div class="p-3 bg-white/5 text-white/30 rounded-xl border border-white/10 cursor-not-allowed">
                <i data-lucide="arrow-left" class="w-5 h-5 stroke-[3]"></i>
            </div>
        @else
            <a href="{{ $paginator->previousPageUrl() }}"
               class="p-3 bg-white/10 text-white rounded-xl border border-white/20 hover:bg-white/20 transition-all">
                <i data-lucide="arrow-left" class="w-5 h-5 stroke-[3]"></i>
            </a>
        @endif

        <!-- Indikator Halaman -->
        <span class="font-bold text-white text-xs uppercase tracking-widest bg-white/10 px-4 py-2 rounded-lg border border-white/20 backdrop-blur-md">
            Hal {{ $paginator->currentPage() }}
        </span>

        <!-- Tombol Next -->
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}"
               class="p-3 bg-white/10 text-white rounded-xl border border-white/20 hover:bg-white/20 transition-all">
                <i data-lucide="arrow-right" class="w-5 h-5 stroke-[3]"></i>
            </a>
        @else
            <div class="p-3 bg-white/5 text-white/30 rounded-xl border border-white/10 cursor-not-allowed">
                <i data-lucide="arrow-right" class="w-5 h-5 stroke-[3]"></i>
            </div>
        @endif

    </div>
@endif