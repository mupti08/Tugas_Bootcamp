<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Bio-Link | Web, Mobile & IoT Developer</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>

    <style>
        * {
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            margin: 0;
            min-height: 100vh;
            font-family: 'Poppins', sans-serif;
            color: #ffffff;
            background:
                linear-gradient(rgba(8, 19, 47, 0.30), rgba(8, 19, 47, 0.42)),
                url('{{ asset('images/back-1.jpeg') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        .glass {
            background: rgba(255, 255, 255, 0.13);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.45);
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.18), inset 0 1px 0 rgba(255, 255, 255, 0.15);
        }

        .glass-modal {
            background: rgba(19, 33, 59, 0.78);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.30);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.28);
        }

        .soft-shadow {
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.22);
        }

        .profile-ring {
            box-shadow: 0 0 0 3px rgba(255, 255, 255, 0.45), 0 8px 24px rgba(0, 0, 0, 0.25);
        }

        .link-card {
            transition: transform 0.25s ease, background 0.25s ease, box-shadow 0.25s ease;
        }

        .link-card:hover {
            transform: translateY(-3px);
            background: rgba(255, 255, 255, 0.25);
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.18), inset 0 1px 0 rgba(255, 255, 255, 0.20);
        }

        .link-card:active {
            transform: translateY(0);
        }

        .social-btn {
            background: rgba(255, 255, 255, 0.86);
            color: #13203c;
            transition: all 0.2s ease;
        }

        .social-btn:hover {
            transform: translateY(-3px);
            background: rgba(255, 255, 255, 0.98);
            box-shadow: 0 8px 18px rgba(0, 0, 0, 0.18);
        }

        .nav-link {
            color: rgba(255, 255, 255, 0.88);
            transition: all 0.2s ease;
        }

        .nav-link:hover {
            color: #ffffff;
        }

        @media (max-width: 640px) {
            body {
                background-attachment: scroll;
                background-position: center;
            }
        }
    </style>
</head>

<body class="min-h-screen antialiased pb-12">

    <!-- PROFILE -->
    <main id="profile" class="max-w-2xl mx-auto px-4 pt-10 sm:pt-14 flex flex-col items-center">
        <div class="relative mb-5">
            <div class="w-24 h-24 sm:w-28 sm:h-28 rounded-full overflow-hidden bg-slate-200 profile-ring border-2 border-white/80">
                <img src="{{ asset('images/fixlapbot.jpeg') }}" alt="FIXLAPBOT ID" class="w-full h-full object-cover">
            </div>
        </div>

        <h1 class="text-2xl sm:text-3xl font-black text-center tracking-tight text-white mb-2">
            FIXLAPBOT ID
        </h1>

        <p class="text-center text-sm sm:text-base font-semibold text-white/95 leading-relaxed max-w-xl">
            Manajemen Servis Laptop Berbasis Robot AI
            <br>
            <span class="text-blue-200 font-black">Servis </span> (Laptop)
            <span class="text-white/60">•</span>
            <span class="text-sky-200 font-black">Berbasis</span> (Robot Ai)
            <span class="text-white/60">•</span>
        </p>

        <!-- SOCIAL -->
        <div class="flex items-center gap-3 mt-6 mb-8">

            <a href="#" onclick="openModal(); return false;" class="social-btn w-11 h-11 rounded-full flex items-center justify-center">
                <i data-lucide="mail" class="w-5 h-5"></i>
            </a>
        </div>

        <!-- LINKS -->
        <div id="links" class="w-full space-y-4">
            <button onclick="openModal()" type="button" class="w-full text-left">
                <div class="glass link-card rounded-2xl sm:rounded-3xl px-5 py-5 sm:px-6 flex flex-col items-center justify-center text-center">
                    <span class="text-lg sm:text-xl font-black text-white">Contact details</span>
                    <span class="text-xs sm:text-sm font-semibold text-white/75 flex items-center gap-1.5 mt-1">
                        <i data-lucide="user" class="w-3.5 h-3.5"></i>
                        Hubungi Admin
                    </span>
                </div>
            </button>

            @foreach ($links as $link)
                <a href="{{ route('public.redirect', $link->id) }}" target="_blank" rel="noopener noreferrer" class="w-full block">
                    <div class="glass link-card rounded-2xl sm:rounded-3xl px-4 py-4 sm:px-5 min-h-[76px] flex items-center">
                        @if ($link->image)
                            <img src="{{ asset('storage/' . $link->image) }}" alt="{{ $link->title }}" class="w-11 h-11 sm:w-12 sm:h-12 object-cover rounded-xl border border-white/60 absolute left-5 bg-white/10">
                        @else
                            <div class="w-11 h-11 sm:w-12 sm:h-12 rounded-xl bg-white/85 text-slate-800 flex items-center justify-center absolute left-5">
                                <i data-lucide="link" class="w-5 h-5"></i>
                            </div>
                        @endif

                        <span class="w-full text-center font-black text-white text-sm sm:text-base px-14 truncate">
                            {{ $link->title }}
                        </span>

                        <i data-lucide="chevron-right" class="w-5 h-5 text-white/70 absolute right-5"></i>
                    </div>
                </a>
            @endforeach
        </div>

        <div class="mt-7">
            {{ $links->links('vendor.pagination.custom-public') }}
        </div>
    </main>

    <!-- MODAL -->
    <div id="contact-modal" class="fixed inset-0 z-50 hidden opacity-0 transition-opacity duration-300">
        <div class="absolute inset-0 bg-black/45 backdrop-blur-md" onclick="closeModal()"></div>

        <div id="modal-content" class="absolute bottom-0 left-0 right-0 glass-modal rounded-t-[2rem] sm:rounded-[2rem] p-6 sm:p-8 max-w-md mx-auto h-auto max-h-[85vh] overflow-y-auto pb-8 translate-y-full transition-transform duration-300">
            <div class="w-12 h-1.5 bg-white/30 rounded-full mx-auto mb-6 shrink-0"></div>

            <div class="text-center mb-6">
                <h2 class="text-xs font-extrabold text-blue-200 uppercase tracking-[0.2em]">Contact Details</h2>
                <h3 class="text-2xl font-black text-white mt-2">Laptop Service</h3>
                <p class="text-xs font-semibold text-white/60 mt-1">Web, Mobile, & IoT Developer</p>
            </div>

            <div class="glass rounded-2xl p-5 mb-5 space-y-4">
                <div class="flex items-center gap-3 border-b border-white/15 pb-4">
                    <div class="p-2 bg-white/15 border border-white/20 rounded-lg">
                        <i data-lucide="mail" class="w-4 h-4 text-white"></i>
                    </div>
                    <p class="font-bold text-sm text-white truncate">dev.tech@gmail.com</p>
                </div>

                <div class="flex items-center gap-3 border-b border-white/15 pb-4">
                    <div class="p-2 bg-white/15 border border-white/20 rounded-lg">
                        <i data-lucide="phone" class="w-4 h-4 text-white"></i>
                    </div>
                    <p class="font-bold text-sm text-white truncate">+62 812-3456-7890</p>
                </div>

                <div class="flex items-start gap-3">
                    <div class="p-2 bg-white/15 border border-white/20 rounded-lg mt-1">
                        <i data-lucide="clock" class="w-4 h-4 text-white"></i>
                    </div>
                    <div>
                        <p class="font-bold text-sm text-white">Senin - Jumat: 09:00 - 17:00</p>
                        <p class="font-semibold text-xs text-white/55 mt-0.5">Weekend: By Appointment</p>
                    </div>
                </div>
            </div>

            <div class="bg-white/10 border border-white/20 p-4 rounded-xl flex gap-3 mb-6">
                <i data-lucide="info" class="w-5 h-5 shrink-0 mt-0.5 text-blue-200"></i>
                <p class="text-[11px] font-semibold text-white/75 leading-relaxed">
                    Browser Anda mungkin tidak mendukung download VCF otomatis. Silakan salin nomor secara manual.
                </p>
            </div>

            <div class="mt-auto flex gap-3">
                <button type="button" class="flex-1 bg-white text-slate-900 font-black py-4 rounded-xl hover:bg-blue-50 transition-colors">
                    Save contact
                </button>

                <button onclick="closeModal()" type="button" class="w-14 h-14 shrink-0 bg-rose-300 text-slate-900 rounded-xl flex items-center justify-center hover:bg-rose-200 transition-all">
                    <i data-lucide="x" class="w-6 h-6 stroke-[3]"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- SCRIPT -->
    <script>
        lucide.createIcons();

        const modal = document.getElementById('contact-modal');
        const modalContent = document.getElementById('modal-content');

        function openModal() {
            modal.classList.remove('hidden');

            requestAnimationFrame(() => {
                modal.classList.remove('opacity-0');
                modalContent.classList.remove('translate-y-full');
            });

            document.body.style.overflow = 'hidden';
        }

        function closeModal() {
            modal.classList.add('opacity-0');
            modalContent.classList.add('translate-y-full');

            setTimeout(() => {
                modal.classList.add('hidden');
                document.body.style.overflow = 'auto';
            }, 300);
        }
    </script>
</body>
</html>
