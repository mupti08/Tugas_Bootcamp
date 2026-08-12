@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex flex-wrap items-center justify-center sm:justify-between w-full gap-3 mt-2 mb-2">

        <!-- MOBILE INFO -->
        <div class="w-full sm:hidden text-center mb-2">
            <p class="text-xs font-medium text-white/60">
                Menampilkan
                <span class="text-blue-200 font-bold">{{ $paginator->firstItem() }}</span>
                -
                <span class="text-blue-200 font-bold">{{ $paginator->lastItem() }}</span>
                dari
                <span class="text-white font-bold">{{ $paginator->total() }}</span>
            </p>
        </div>

        <!-- PREVIOUS -->
        @if ($paginator->onFirstPage())
            <span class="px-4 py-2.5 bg-white/5 text-white/30 rounded-xl border border-white/15 cursor-not-allowed text-xs sm:text-sm font-bold flex items-center gap-1.5">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M15 19l-7-7 7-7"></path>
                </svg>
                Prev
            </span>
        @else
            <a
                href="{{ $paginator->previousPageUrl() }}"
                rel="prev"
                class="px-4 py-2.5 bg-white/10 hover:bg-white/20 text-white rounded-xl border border-white/20 text-xs sm:text-sm font-bold flex items-center gap-1.5 transition-all"
            >
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M15 19l-7-7 7-7"></path>
                </svg>
                Prev
            </a>
        @endif

        <!-- PAGE NUMBERS -->
        <div class="hidden sm:flex items-center gap-2">
            @foreach ($elements as $element)

                @if (is_string($element))
                    <span class="px-3 py-2 bg-white/5 text-white/40 rounded-xl border border-white/10 text-sm font-bold">
                        {{ $element }}
                    </span>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)

                        @if ($page == $paginator->currentPage())
                            <span class="px-3.5 py-2 bg-blue-400 text-slate-950 rounded-xl border border-blue-200/60 shadow-lg shadow-blue-500/20 text-sm font-extrabold">
                                {{ $page }}
                            </span>
                        @else
                            <a
                                href="{{ $url }}"
                                class="px-3.5 py-2 bg-white/10 hover:bg-white/20 text-white rounded-xl border border-white/20 text-sm font-bold transition-all"
                            >
                                {{ $page }}
                            </a>
                        @endif

                    @endforeach
                @endif

            @endforeach
        </div>

        <!-- NEXT -->
        @if ($paginator->hasMorePages())
            <a
                href="{{ $paginator->nextPageUrl() }}"
                rel="next"
                class="px-4 py-2.5 bg-white/10 hover:bg-white/20 text-white rounded-xl border border-white/20 text-xs sm:text-sm font-bold flex items-center gap-1.5 transition-all"
            >
                Next

                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 5l7 7-7 7"></path>
                </svg>
            </a>
        @else
            <span class="px-4 py-2.5 bg-white/5 text-white/30 rounded-xl border border-white/15 cursor-not-allowed text-xs sm:text-sm font-bold flex items-center gap-1.5">
                Next

                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 5l7 7-7 7"></path>
                </svg>
            </span>
        @endif

    </nav>
@endif
