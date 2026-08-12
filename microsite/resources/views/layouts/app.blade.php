<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Admin Dashboard - BioLink')</title>

    <!-- 1. Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- 2. Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>

    <!-- Google Font: Plus Jakarta Sans -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap');

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
    </style>
</head>

<body class="bg-[#F8FAFC] text-slate-800 antialiased selection:bg-blue-300 selection:text-blue-900 min-h-screen flex flex-col overflow-x-hidden">

    <!-- Responsive Modern Navbar -->
    <nav class="bg-gradient-to-r from-slate-900 via-blue-900 to-indigo-950 text-white shadow-xl sticky top-0 z-50 border-b border-blue-800/40 backdrop-blur-md">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="flex items-center justify-between h-16 sm:h-20">

                <!-- Logo & Brand -->
                <div class="flex items-center space-x-2 sm:space-x-3">

                    <div class="bg-gradient-to-tr from-blue-500 to-indigo-400 text-white p-2 sm:p-2.5 rounded-xl sm:rounded-2xl shadow-lg shadow-blue-500/30 border border-blue-400/30">

                        <i data-lucide="link" class="w-5 h-5 sm:w-6 sm:h-6"></i>

                    </div>

                    <div class="flex flex-col">

                        <span class="font-extrabold text-lg sm:text-xl tracking-tight bg-gradient-to-r from-white via-blue-100 to-blue-300 bg-clip-text text-transparent">
                            BioLink
                        </span>

                        <span class="hidden sm:block text-[10px] text-blue-300 font-semibold uppercase tracking-widest leading-none mt-0.5">
                            Dashboard Panel
                        </span>

                    </div>

                </div>


                <!-- Nav Links -->
                <div class="flex items-center space-x-2 sm:space-x-4">

                    <a href="{{ route('admin.links.index') }}"
                       class="text-blue-200 hover:text-white hover:bg-white/10 transition-all duration-200 p-2 sm:px-4 sm:py-2.5 rounded-lg sm:rounded-xl text-sm font-semibold flex items-center gap-2">

                        <i data-lucide="layout-dashboard" class="w-5 h-5 sm:w-4 sm:h-4"></i>

                        <span class="hidden md:inline">
                            Manage Links
                        </span>

                    </a>


                    <!-- Preview Button -->
                    <a href="/" target="_blank"
                       class="bg-blue-400 hover:bg-blue-300 text-slate-950 font-bold px-3 py-2 sm:px-5 sm:py-2.5 rounded-lg sm:rounded-xl text-xs sm:text-sm transition-all duration-200 flex items-center gap-1.5 sm:gap-2 shadow-lg shadow-blue-500/20 hover:shadow-blue-500/40 border border-blue-300">

                        <span class="hidden sm:inline">
                            Preview Public
                        </span>

                        <span class="sm:hidden">
                            Preview
                        </span>

                        <i data-lucide="external-link" class="w-4 h-4"></i>

                    </a>

                </div>

            </div>

        </div>

    </nav>


    <!-- Main Content Container -->
    <main class="max-w-7xl mx-auto py-6 sm:py-10 px-4 sm:px-6 lg:px-8 flex-grow w-full">


        <!-- ======================================== -->
        <!-- FLASH MESSAGE SUCCESS -->
        <!-- ======================================== -->

        @if(session('success'))

            <div class="mb-6 p-4 sm:p-5 bg-emerald-200 text-emerald-950 font-extrabold rounded-2xl border-2 border-slate-900 shadow-[4px_4px_0px_0px_#0f172a] flex items-center gap-3">

                <i data-lucide="check-circle-2"
                   class="w-6 h-6 text-emerald-800 shrink-0">
                </i>

                <span class="text-sm sm:text-base">
                    {{ session('success') }}
                </span>

            </div>

        @endif


        <!-- ======================================== -->
        <!-- FLASH MESSAGE ERROR -->
        <!-- ======================================== -->

        @if(session('error'))

            <div class="mb-6 p-4 sm:p-5 bg-rose-200 text-rose-950 font-extrabold rounded-2xl border-2 border-slate-900 shadow-[4px_4px_0px_0px_#0f172a] flex items-center gap-3">

                <i data-lucide="alert-circle"
                   class="w-6 h-6 text-rose-800 shrink-0">
                </i>

                <span class="text-sm sm:text-base">
                    {{ session('error') }}
                </span>

            </div>

        @endif


        <!-- ======================================== -->
        <!-- VALIDATION ERROR -->
        <!-- ======================================== -->

        @if($errors->any())

            <div class="mb-6 p-4 sm:p-5 bg-rose-200 text-rose-950 font-extrabold rounded-2xl border-2 border-slate-900 shadow-[4px_4px_0px_0px_#0f172a]">

                <div class="flex items-center gap-3 mb-2">

                    <i data-lucide="alert-triangle"
                       class="w-6 h-6 text-rose-800 shrink-0">
                    </i>

                    <span class="text-sm sm:text-base">
                        Terdapat kesalahan pada input:
                    </span>

                </div>

                <ul class="list-disc list-inside text-xs sm:text-sm font-semibold ml-9">

                    @foreach($errors->all() as $error)

                        <li>
                            {{ $error }}
                        </li>

                    @endforeach

                </ul>

            </div>

        @endif


        <!-- Content dari halaman -->
        @yield('content')

    </main>


    <!-- Footer -->
    <footer class="bg-white border-t border-slate-200 text-center py-6 px-4 text-xs font-medium text-slate-500 mt-auto">

        &copy; {{ date('Y') }} Mini Bootcamp Laravel 12 &bull; Bio Link Application

    </footer>


    <!-- 3. Inisialisasi Script Lucide -->
    <script>

        lucide.createIcons();

    </script>

</body>

</html>