<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Admin Dashboard - FIXLAPBOT ID')</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            color: #ffffff;
            background:
                linear-gradient(rgba(8, 19, 47, 0.55), rgba(8, 19, 47, 0.65)),
                url('{{ asset('images/back-1.jpeg') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        .navbar-glass {
            background: rgba(8, 19, 47, 0.72);
            backdrop-filter: blur(18px);
            -webkit-backdrop-filter: blur(18px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.18);
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.20);
        }

        .nav-button {
            transition: all 0.2s ease;
        }

        .nav-button:hover {
            background: rgba(255, 255, 255, 0.10);
            transform: translateY(-1px);
        }

        .preview-button {
            transition: all 0.2s ease;
        }

        .preview-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 24px rgba(96, 165, 250, 0.25);
        }

        .logout-button {
            transition: all 0.2s ease;
        }

        .logout-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 24px rgba(244, 63, 94, 0.20);
        }

        .alert-glass {
            backdrop-filter: blur(14px);
            -webkit-backdrop-filter: blur(14px);
        }

        .footer-glass {
            background: rgba(8, 19, 47, 0.60);
            backdrop-filter: blur(14px);
            -webkit-backdrop-filter: blur(14px);
            border-top: 1px solid rgba(255, 255, 255, 0.15);
        }

        @media (max-width: 640px) {
            body {
                background-attachment: scroll;
            }
        }
    </style>
</head>

<body class="min-h-screen flex flex-col overflow-x-hidden antialiased selection:bg-blue-300 selection:text-blue-900">

    <!-- NAVBAR -->
    <nav class="navbar-glass sticky top-0 z-50 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16 sm:h-20">

                <!-- Logo & Brand -->
                <div class="flex items-center space-x-2 sm:space-x-3">
                    <div class="bg-gradient-to-tr from-blue-500 to-indigo-400 text-white p-2 sm:p-2.5 rounded-xl sm:rounded-2xl shadow-lg shadow-blue-500/30 border border-blue-300/30">
                        <i data-lucide="bot" class="w-5 h-5 sm:w-6 sm:h-6"></i>
                    </div>

                    <div class="flex flex-col">
                        <span class="font-extrabold text-lg sm:text-xl tracking-tight bg-gradient-to-r from-white via-blue-100 to-blue-300 bg-clip-text text-transparent">
                            FIXLAPBOT ID
                        </span>

                        <span class="hidden sm:block text-[10px] text-blue-200 font-semibold uppercase tracking-widest leading-none mt-0.5">
                            Smart Laptop Service
                        </span>
                    </div>
                </div>

                <!-- Nav Links -->
                <div class="flex items-center space-x-2 sm:space-x-4">

                    <!-- Dashboard -->
                    <a
                        href="{{ route('admin.dashboard') }}"
                        class="nav-button text-blue-100 hover:text-white p-2 sm:px-4 sm:py-2.5 rounded-lg sm:rounded-xl text-sm font-semibold flex items-center gap-2"
                    >
                        <i data-lucide="bar-chart-3" class="w-5 h-5 sm:w-4 sm:h-4"></i>
                        <span class="hidden md:inline">Dashboard</span>
                    </a>

                    <!-- Manage Links -->
                    <a
                        href="{{ route('admin.links.index') }}"
                        class="nav-button text-blue-100 hover:text-white p-2 sm:px-4 sm:py-2.5 rounded-lg sm:rounded-xl text-sm font-semibold flex items-center gap-2"
                    >
                        <i data-lucide="layout-dashboard" class="w-5 h-5 sm:w-4 sm:h-4"></i>
                        <span class="hidden md:inline">
                            Manage Service
                        </span>
                    </a>

                    <!-- Preview Button -->
                    <a
                        href="/"
                        target="_blank"
                        class="preview-button bg-blue-400 hover:bg-blue-300 text-slate-950 font-bold px-3 py-2 sm:px-5 sm:py-2.5 rounded-lg sm:rounded-xl text-xs sm:text-sm flex items-center gap-1.5 sm:gap-2 border border-blue-200/60"
                    >
                        <span class="hidden sm:inline">
                            Preview Public
                        </span>

                        <span class="sm:hidden">
                            Preview
                        </span>

                        <i data-lucide="external-link" class="w-4 h-4"></i>
                    </a>

                    <!-- Form Aksi Logout -->
                    <form action="{{ route('logout') }}" method="POST" class="m-0">
                        @csrf

                        <button
                            type="submit"
                            class="logout-button bg-rose-300 hover:bg-rose-200 text-slate-900 font-bold text-xs sm:text-sm px-3 py-2 sm:px-5 sm:py-2.5 rounded-lg sm:rounded-xl border border-rose-100/60 flex items-center gap-1.5 sm:gap-2"
                        >
                            <i data-lucide="log-out" class="w-4 h-4"></i>
                            <span class="hidden sm:inline">
                                Keluar
                            </span>
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </nav>

    <!-- MAIN CONTENT -->
    <main class="max-w-7xl mx-auto py-6 sm:py-10 px-4 sm:px-6 lg:px-8 flex-grow w-full">

        <!-- FLASH MESSAGE SUCCESS -->
        @if(session('success'))
            <div class="alert-glass mb-6 p-4 sm:p-5 bg-emerald-400/15 text-emerald-100 font-extrabold rounded-2xl border border-emerald-300/30 flex items-center gap-3">
                <i data-lucide="check-circle-2" class="w-6 h-6 text-emerald-300 shrink-0"></i>

                <span class="text-sm sm:text-base">
                    {{ session('success') }}
                </span>
            </div>
        @endif

        <!-- FLASH MESSAGE ERROR -->
        @if(session('error'))
            <div class="alert-glass mb-6 p-4 sm:p-5 bg-rose-400/15 text-rose-100 font-extrabold rounded-2xl border border-rose-300/30 flex items-center gap-3">
                <i data-lucide="alert-circle" class="w-6 h-6 text-rose-300 shrink-0"></i>

                <span class="text-sm sm:text-base">
                    {{ session('error') }}
                </span>
            </div>
        @endif

        <!-- VALIDATION ERROR -->
        @if($errors->any())
            <div class="alert-glass mb-6 p-4 sm:p-5 bg-rose-400/15 text-rose-100 font-extrabold rounded-2xl border border-rose-300/30">

                <div class="flex items-center gap-3 mb-2">
                    <i data-lucide="alert-triangle" class="w-6 h-6 text-rose-300 shrink-0"></i>

                    <span class="text-sm sm:text-base">
                        Terdapat kesalahan pada input:
                    </span>
                </div>

                <ul class="list-disc list-inside text-xs sm:text-sm font-semibold ml-9 text-rose-100">
                    @foreach($errors->all() as $error)
                        <li>
                            {{ $error }}
                        </li>
                    @endforeach
                </ul>

            </div>
        @endif

        <!-- CONTENT -->
        @yield('content')

    </main>

    <!-- FOOTER -->
    <footer class="footer-glass text-center py-6 px-4 text-xs font-medium text-white/55 mt-auto">
        &copy; {{ date('Y') }} FIXLAPBOT ID &bull; Smart Laptop Service Management
    </footer>

    <!-- SCRIPT -->
    <script>
        lucide.createIcons();
    </script>

</body>

</html>
