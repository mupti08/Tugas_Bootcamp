@extends('layouts.app')

@section('title', 'Dashboard Analytics - FIXLAPBOT ID')

@section('content')
<style>
    .dashboard-glass {
        background: rgba(10, 25, 50, 0.52);
        backdrop-filter: blur(18px);
        -webkit-backdrop-filter: blur(18px);
        border: 1px solid rgba(255, 255, 255, 0.20);
        box-shadow: 0 18px 40px rgba(0, 0, 0, 0.20);
    }

    .dashboard-card {
        transition: all 0.25s ease;
    }

    .dashboard-card:hover {
        transform: translateY(-3px);
    }

    .dashboard-button {
        transition: all 0.2s ease;
    }

    .dashboard-button:hover {
        transform: translateY(-2px);
    }
</style>

<div class="max-w-7xl mx-auto">

    <!-- HEADER DASHBOARD -->
    <div class="mb-8 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
        <div>
            <h1 class="text-2xl sm:text-3xl font-extrabold text-white tracking-tight">
                Dashboard Analytics
            </h1>

            <p class="text-white/60 font-medium mt-1">
                Ringkasan performa layanan FIXLAPBOT ID.
            </p>
        </div>

        <a
            href="{{ route('admin.links.index') }}"
            class="dashboard-button hidden sm:flex bg-white text-slate-900 font-extrabold py-2.5 px-5 rounded-xl items-center gap-2 shadow-lg"
        >
            Kelola Tautan
            <i data-lucide="arrow-right" class="w-5 h-5 stroke-[3]"></i>
        </a>
    </div>

    <!-- SUMMARY CARDS -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">

        <!-- TOTAL TAUTAN -->
        <div class="dashboard-glass dashboard-card rounded-3xl p-6 relative overflow-hidden text-white">
            <i
                data-lucide="wrench"
                class="w-20 h-20 text-blue-300/20 absolute -bottom-4 -right-4 stroke-[2.5]"
            ></i>

            <h3 class="text-sm font-bold text-white/55 uppercase tracking-widest mb-2 relative z-10">
                Total Servis
            </h3>

            <div class="flex items-baseline gap-2 relative z-10">
                <span class="text-5xl font-extrabold text-white">
                    {{ $totalLinks }}
                </span>

                <span class="text-sm font-bold text-white/55">
                    ({{ $activeLinks }} Aktif)
                </span>
            </div>
        </div>

        <!-- TOTAL KLIK -->
        <div class="dashboard-glass dashboard-card rounded-3xl p-6 relative overflow-hidden text-white">
            <i
                data-lucide="mouse-pointer-click"
                class="w-20 h-20 text-emerald-300/20 absolute -bottom-4 -right-4 stroke-[2.5]"
            ></i>

            <h3 class="text-sm font-bold text-white/55 uppercase tracking-widest mb-2 relative z-10">
                Total Akses
            </h3>

            <span class="text-5xl font-extrabold text-white relative z-10">
                {{ $totalClicks }}
            </span>

            <p class="text-xs text-white/45 mt-2">
                Total klik seluruh layanan
            </p>
        </div>

        <!-- TOP LINK -->
        <div class="dashboard-glass dashboard-card rounded-3xl p-6 relative overflow-hidden text-white">
            <i
                data-lucide="trophy"
                class="w-20 h-20 text-amber-300/20 absolute -bottom-4 -right-4 stroke-[2.5]"
            ></i>

            <h3 class="text-sm font-bold text-white/55 uppercase tracking-widest mb-2 relative z-10">
                Servis Terpopuler
            </h3>

            @if($topLink)

                <p class="text-xl font-extrabold text-white relative z-10 truncate mb-2">
                    {{ $topLink->title }}
                </p>

                <p class="text-sm font-bold text-amber-100 bg-amber-400/15 inline-flex px-3 py-1.5 rounded-full border border-amber-300/30 relative z-10">
                    {{ $topLink->clicks }} Klik
                </p>

            @else

                <p class="text-xl font-extrabold text-white relative z-10">
                    Belum ada data
                </p>

            @endif
        </div>

    </div>

    <!-- CHARTS AREA -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-12">

        <!-- BAR CHART -->
        <div class="dashboard-glass rounded-3xl p-6 flex flex-col text-white">
            <h3 class="text-lg font-extrabold text-white border-b border-white/15 pb-3 mb-6">
                Perbandingan Klik (Top 5)
            </h3>

            <div class="relative w-full h-72">
                <canvas id="barChart"></canvas>
            </div>
        </div>

        <!-- DOUGHNUT CHART -->
        <div class="dashboard-glass rounded-3xl p-6 flex flex-col text-white">
            <h3 class="text-lg font-extrabold text-white border-b border-white/15 pb-3 mb-6">
                Distribusi Layanan
            </h3>

            <div class="relative w-full h-72 flex justify-center items-center">
                <canvas id="doughnutChart"></canvas>
            </div>
        </div>

    </div>
</div>

<!-- CHART.JS -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const chartLabels = @json($chartLabels);
    const chartData = @json($chartData);

    const bgColors = [
        'rgba(96, 165, 250, 0.75)',
        'rgba(52, 211, 153, 0.75)',
        'rgba(251, 191, 36, 0.75)',
        'rgba(244, 114, 182, 0.75)',
        'rgba(167, 139, 250, 0.75)'
    ];

    const borderColors = [
        'rgba(147, 197, 253, 1)',
        'rgba(110, 231, 183, 1)',
        'rgba(252, 211, 77, 1)',
        'rgba(249, 168, 212, 1)',
        'rgba(196, 181, 253, 1)'
    ];

    Chart.defaults.font.family = 'Poppins, sans-serif';
    Chart.defaults.font.weight = '600';
    Chart.defaults.color = 'rgba(255, 255, 255, 0.75)';

    // BAR CHART
    const ctxBar = document.getElementById('barChart').getContext('2d');

    new Chart(ctxBar, {
        type: 'bar',
        data: {
            labels: chartLabels,
            datasets: [{
                label: 'Jumlah Klik',
                data: chartData,
                backgroundColor: bgColors,
                borderColor: borderColors,
                borderWidth: 1.5,
                borderRadius: 10,
                maxBarThickness: 55
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        precision: 0,
                        color: 'rgba(255, 255, 255, 0.65)'
                    },
                    grid: {
                        color: 'rgba(255, 255, 255, 0.08)'
                    }
                },
                x: {
                    ticks: {
                        color: 'rgba(255, 255, 255, 0.65)'
                    },
                    grid: {
                        display: false
                    }
                }
            },
            plugins: {
                legend: {
                    display: false
                }
            }
        }
    });

    // DOUGHNUT CHART
    const ctxDoughnut = document.getElementById('doughnutChart').getContext('2d');

    new Chart(ctxDoughnut, {
        type: 'doughnut',
        data: {
            labels: chartLabels,
            datasets: [{
                data: chartData,
                backgroundColor: bgColors,
                borderColor: 'rgba(8, 19, 47, 0.85)',
                borderWidth: 3,
                hoverOffset: 10
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            cutout: '62%',
            plugins: {
                legend: {
                    position: 'right',
                    labels: {
                        color: 'rgba(255, 255, 255, 0.75)',
                        padding: 15,
                        usePointStyle: true,
                        pointStyle: 'circle'
                    }
                }
            }
        }
    });
</script>
@endsection
