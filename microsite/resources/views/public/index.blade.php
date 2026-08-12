<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Bio-Link | Web, Mobile & IoT Developer</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>

    <style>
        .bg-grid-pattern {
            background-color: #bfdbfe;
            background-image:
                linear-gradient(to right, rgba(15, 23, 42, 0.05) 1px, transparent 1px),
                linear-gradient(to bottom, rgba(15, 23, 42, 0.05) 1px, transparent 1px);
            background-size: 30px 30px;
        }
    </style>
</head>

<body class="bg-grid-pattern min-h-screen font-sans antialiased text-slate-900 pb-20">

    <main class="max-w-md mx-auto pt-12 px-4 flex flex-col items-center relative">

        <!-- BAGIAN PROFIL -->
        <div class="relative mb-6">
            <div
                class="w-24 h-24 rounded-full border-4 border-slate-900 overflow-hidden shadow-[4px_4px_0px_0px_#0f172a] bg-blue-100">
                <img src="https://ui-avatars.com/api/?name=Dev+Tech&background=1e3a8a&color=fff&size=200" alt="Profile"
                    class="w-full h-full object-cover">
            </div>
        </div>

        <h1 class="text-xl font-black mb-2 text-center tracking-tight">@dev.tech</h1>

        <p class="text-center text-sm font-extrabold px-6 mb-6">
            Jasa Pembuatan Product Digital & Hardware <br>
            <span class="text-blue-700 font-black">Web</span> (Laravel) •
            <span class="text-sky-700 font-black">Mobile</span> (Flutter) •
            <span class="text-indigo-700 font-black">IoT</span> (ESP32)
        </p>

        <div class="flex items-center gap-4 mb-8">
            <a href="#"
                class="p-2 bg-white rounded-full border-2 border-slate-900 shadow-[2px_2px_0px_0px_#0f172a] hover:-translate-y-1 transition-transform"><i
                    data-lucide="github" class="w-5 h-5"></i></a>
            <a href="#"
                class="p-2 bg-white rounded-full border-2 border-slate-900 shadow-[2px_2px_0px_0px_#0f172a] hover:-translate-y-1 transition-transform"><i
                    data-lucide="linkedin" class="w-5 h-5"></i></a>
            <a href="#"
                class="p-2 bg-white rounded-full border-2 border-slate-900 shadow-[2px_2px_0px_0px_#0f172a] hover:-translate-y-1 transition-transform"><i
                    data-lucide="mail" class="w-5 h-5"></i></a>
        </div>

        <div class="w-full space-y-4">

            <button onclick="openModal()" class="w-full relative group">
                <div class="absolute inset-0 bg-slate-900 rounded-3xl translate-y-1.5 translate-x-1.5"></div>
                <div
                    class="relative w-full bg-blue-50 border-2 border-slate-900 rounded-3xl p-4 flex flex-col items-center justify-center transition-transform group-active:translate-y-1.5 group-active:translate-x-1.5">
                    <span class="font-black text-slate-900 text-lg">Contact details</span>
                    <span class="text-xs font-bold text-slate-600 flex items-center gap-1 mt-1">
                        <i data-lucide="user" class="w-3 h-3"></i> Hubungi Developer
                    </span>
                </div>
            </button>

            @foreach ($links as $link)
                <a href="" target="_blank" rel="noopener noreferrer"
                    class="w-full block relative group">

                    <div class="absolute inset-0 bg-slate-900 rounded-3xl translate-y-1.5 translate-x-1.5"></div>
                    <div
                        class="relative w-full bg-white border-2 border-slate-900 rounded-3xl p-4 flex items-center transition-transform group-active:translate-y-1.5 group-active:translate-x-1.5">

                        @if ($link->image)
                            <img src="{{ asset('storage/' . $link->image) }}"
                                class="w-10 h-10 object-cover rounded-xl border-2 border-slate-900 absolute left-4 bg-slate-100">
                        @else
                            <div
                                class="w-10 h-10 bg-blue-200 border-2 border-slate-900 rounded-xl flex items-center justify-center absolute left-4 shadow-[2px_2px_0px_0px_#0f172a]">
                                <i data-lucide="link" class="w-5 h-5 text-slate-900 stroke-[3]"></i>
                            </div>
                        @endif

                        <span
                            class="w-full text-center font-black text-slate-900 text-base px-12 truncate">{{ $link->title }}</span>
                        <i data-lucide="chevron-right" class="w-5 h-5 text-slate-400 absolute right-4"></i>
                    </div>
                </a>
            @endforeach
        </div>
        {{ $links->links('vendor.pagination.custom-public') }}

    </main>

    {{-- Modal --}}
    <div id="contact-modal" class="fixed inset-0 z-50 hidden opacity-0 transition-opacity duration-300">

        <div class="absolute inset-0 bg-slate-900/40 backdrop-blur-sm" onclick="closeModal()"></div>

        <div id="modal-content"
            class="absolute bottom-0 left-0 right-0 bg-white border-t-4 border-slate-900 rounded-t-[2rem] p-6 max-w-md mx-auto h-auto max-h-[85vh] overflow-y-auto pb-10 flex flex-col shadow-[0px_-8px_0px_0px_rgba(0,0,0,0.1)] translate-y-full transition-transform duration-300">

            <div class="w-12 h-1.5 bg-slate-300 rounded-full mx-auto mb-6 shrink-0"></div>

            <div class="text-center mb-6">
                <h2 class="text-sm font-extrabold text-blue-600 uppercase tracking-widest">Contact Details</h2>
                <h3 class="text-2xl font-black text-slate-900 mt-2">Dev Tech Solutions</h3>
                <p class="text-xs font-bold text-slate-500 mt-1">Web, Mobile, & IoT Developer</p>
            </div>

            <div
                class="bg-blue-50 border-2 border-slate-900 rounded-2xl p-5 mb-6 space-y-4 shadow-[4px_4px_0px_0px_#0f172a]">
                <div class="flex items-center gap-3 border-b-2 border-dashed border-blue-200 pb-4">
                    <div class="p-2 bg-blue-200 border-2 border-slate-900 rounded-lg"><i data-lucide="mail"
                            class="w-4 h-4 text-slate-900"></i></div>
                    <p class="font-extrabold text-sm truncate">dev.tech@gmail.com</p>
                </div>
                <div class="flex items-center gap-3 border-b-2 border-dashed border-blue-200 pb-4">
                    <div class="p-2 bg-emerald-200 border-2 border-slate-900 rounded-lg"><i data-lucide="phone"
                            class="w-4 h-4 text-slate-900"></i></div>
                    <p class="font-extrabold text-sm truncate">+62 812-3456-7890</p>
                </div>
                <div class="flex items-start gap-3">
                    <div class="p-2 bg-amber-200 border-2 border-slate-900 rounded-lg mt-1"><i data-lucide="clock"
                            class="w-4 h-4 text-slate-900"></i></div>
                    <div>
                        <p class="font-extrabold text-sm">Senin - Jumat: 09:00 - 17:00</p>
                        <p class="font-extrabold text-xs text-slate-500 mt-0.5">Weekend: By Appointment</p>
                    </div>
                </div>
            </div>

            <div
                class="bg-amber-100 border-2 border-slate-900 p-4 rounded-xl flex gap-3 mb-6 shadow-[2px_2px_0px_0px_#0f172a]">
                <i data-lucide="info" class="w-5 h-5 shrink-0 mt-0.5 text-slate-900"></i>
                <p class="text-[11px] font-bold text-slate-700 leading-relaxed">
                    Browser Anda mungkin tidak mendukung download VCF otomatis. Silakan salin nomor secara manual.
                </p>
            </div>

            <div class="mt-auto flex gap-3">
                <button
                    class="flex-1 bg-slate-900 text-white font-black py-4 rounded-xl hover:bg-slate-800 transition-colors border-2 border-slate-900">
                    Save contact
                </button>
                <button onclick="closeModal()"
                    class="w-14 h-14 shrink-0 bg-rose-200 border-2 border-slate-900 rounded-xl flex items-center justify-center shadow-[3px_3px_0px_0px_#0f172a] hover:translate-x-1 hover:translate-y-1 hover:shadow-none transition-all">
                    <i data-lucide="x" class="w-6 h-6 stroke-[3] text-slate-900"></i>
                </button>
            </div>
        </div>
    </div>

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