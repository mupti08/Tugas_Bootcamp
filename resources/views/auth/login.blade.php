<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - FIXLAPBOT ID</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
        }

        html {
            min-height: 100%;
        }

        body {
            margin: 0;
            min-height: 100vh;
            font-family: 'Poppins', sans-serif;
            color: #ffffff;
            background:
                linear-gradient(rgba(8, 19, 47, 0.48), rgba(8, 19, 47, 0.62)),
                url('{{ asset('images/back-1.jpeg') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        .glass {
            background: rgba(255, 255, 255, 0.14);
            backdrop-filter: blur(18px);
            -webkit-backdrop-filter: blur(18px);
            border: 1px solid rgba(255, 255, 255, 0.36);
            box-shadow:
                0 20px 50px rgba(0, 0, 0, 0.28),
                inset 0 1px 0 rgba(255, 255, 255, 0.14);
        }

        .logo-glass {
            background: rgba(255, 255, 255, 0.9);
            box-shadow:
                0 10px 30px rgba(0, 0, 0, 0.25),
                0 0 0 3px rgba(255, 255, 255, 0.22);
        }

        .input-glass {
            background: rgba(255, 255, 255, 0.10);
            border: 1px solid rgba(255, 255, 255, 0.30);
            color: #ffffff;
        }

        .input-glass::placeholder {
            color: rgba(255, 255, 255, 0.55);
        }

        .input-glass:focus {
            background: rgba(255, 255, 255, 0.16);
            border-color: rgba(255, 255, 255, 0.75);
            outline: none;
            box-shadow: 0 0 0 4px rgba(147, 197, 253, 0.16);
        }

        .login-button {
            background: rgba(255, 255, 255, 0.92);
            color: #16233f;
            transition: all 0.2s ease;
        }

        .login-button:hover {
            background: #ffffff;
            transform: translateY(-2px);
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.20);
        }

        .login-button:active {
            transform: translateY(0);
        }

        .error-box {
            background: rgba(244, 63, 94, 0.18);
            border: 1px solid rgba(255, 255, 255, 0.25);
        }

        @media (max-width: 640px) {
            body {
                background-attachment: scroll;
            }
        }
    </style>
</head>

<body class="min-h-screen flex items-center justify-center px-4 py-8 sm:px-6">

    <!-- LOGIN -->
    <main class="w-full max-w-md">
        <div class="text-center mb-6">
            <div class="logo-glass w-20 h-20 rounded-full mx-auto mb-4 flex items-center justify-center text-slate-800">
                <i data-lucide="bot" class="w-9 h-9 stroke-[2.2]"></i>
            </div>

            <h1 class="text-2xl sm:text-3xl font-extrabold tracking-tight text-white">
                FIXLAPBOT ID
            </h1>

            <p class="text-sm text-white/75 font-medium mt-2">
                Manajemen Servis Laptop Berbasis Robot AI
            </p>
        </div>

        <div class="glass rounded-3xl p-6 sm:p-8">
            <div class="text-center mb-7">
                <h2 class="text-xl font-bold text-white">
                    Login Admin
                </h2>

                <p class="text-xs sm:text-sm text-white/65 mt-1">
                    Masuk untuk mengelola data servis laptop
                </p>
            </div>

            <form action="{{ route('login.post') }}" method="POST" class="space-y-5">
                @csrf

                <!-- ERROR -->
                @if($errors->any())
                    <div class="error-box rounded-xl p-4 flex items-start gap-3">
                        <i data-lucide="alert-triangle" class="w-5 h-5 text-rose-200 shrink-0 mt-0.5"></i>
                        <p class="text-sm font-medium text-white">
                            {{ $errors->first() }}
                        </p>
                    </div>
                @endif

                <!-- EMAIL -->
                <div class="space-y-2">
                    <label for="email" class="block text-sm font-semibold text-white">
                        Alamat Email
                    </label>

                    <div class="relative">
                        <i data-lucide="mail" class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-white/55"></i>

                        <input
                            type="email"
                            id="email"
                            name="email"
                            value="{{ old('email') }}"
                            required
                            autofocus
                            placeholder="Masukkan email admin"
                            class="input-glass w-full rounded-xl pl-12 pr-4 py-3.5 font-medium transition-all">
                    </div>
                </div>

                <!-- PASSWORD -->
                <div class="space-y-2">
                    <label for="password" class="block text-sm font-semibold text-white">
                        Kata Sandi
                    </label>

                    <div class="relative">
                        <i data-lucide="lock" class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-white/55"></i>

                        <input
                            type="password"
                            id="password"
                            name="password"
                            required
                            placeholder="Masukkan kata sandi"
                            class="input-glass w-full rounded-xl pl-12 pr-4 py-3.5 font-medium transition-all">
                    </div>
                </div>

                <!-- BUTTON -->
                <div class="pt-2">
                    <button
                        type="submit"
                        class="login-button w-full font-extrabold py-3.5 rounded-xl flex items-center justify-center gap-2">

                        <span>Masuk Dashboard</span>
                        <i data-lucide="arrow-right" class="w-5 h-5 stroke-[2.5]"></i>
                    </button>
                </div>
            </form>
        </div>

        <p class="text-center text-[11px] sm:text-xs text-white/55 mt-5">
            FIXLAPBOT ID &bull; Smart Laptop Service Management
        </p>
    </main>

    <!-- SCRIPT -->
    <script>
        lucide.createIcons();
    </script>
</body>
</html>
