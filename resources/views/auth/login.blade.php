<x-guest-layout>
    <div class="mb-6 space-y-2 text-center">
        <h3 class="text-2xl font-bold text-slate-800">Selamat datang kembali</h3>
        <p class="text-sm text-slate-600">Masukkan kredensial Anda untuk melanjutkan</p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-5">
        @csrf

        <div class="space-y-2">
            <x-input-label for="email" :value="__('Email')" class="text-slate-700 text-sm font-medium" />
            <div class="relative">
                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4 text-slate-400">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z" />
                    </svg>
                </div>
                <x-text-input
                    id="email"
                    class="block w-full rounded-lg border border-slate-300 bg-white pl-11 pr-4 py-3 text-sm text-slate-800 transition focus:border-sky-500 focus:ring-2 focus:ring-sky-200 @error('email') border-rose-400 ring-rose-200 @enderror"
                    type="email"
                    name="email"
                    :value="old('email')"
                    required
                    autofocus
                    autocomplete="username"
                    placeholder="nama@email.com"
                />
            </div>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="space-y-2">
            <x-input-label for="password" :value="__('Password')" class="text-slate-700 text-sm font-medium" />
            <div class="relative">
                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4 text-slate-400">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                    </svg>
                </div>
                <x-text-input
                    id="password"
                    class="block w-full rounded-lg border border-slate-300 bg-white pl-11 pr-4 py-3 text-sm text-slate-800 transition focus:border-sky-500 focus:ring-2 focus:ring-sky-200 @error('password') border-rose-400 ring-rose-200 @enderror"
                    type="password"
                    name="password"
                    required
                    autocomplete="current-password"
                    placeholder="••••••••"
                />
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex items-center justify-between pt-1">
            <label for="remember_me" class="inline-flex items-center cursor-pointer select-none">
                <input
                    id="remember_me"
                    type="checkbox"
                    class="rounded border-slate-300 text-sky-500 shadow-sm focus:ring-sky-300 cursor-pointer"
                    name="remember"
                >
                <span class="ml-2 text-sm text-slate-600">Ingat saya</span>
            </label>

            @if (Route::has('password.request'))
                <a class="text-sm font-medium text-sky-600 transition hover:text-sky-700 hover:underline" href="{{ route('password.request') }}">
                    Lupa password?
                </a>
            @endif
        </div>

        <div class="pt-2">
            <button
                type="submit"
                class="flex w-full items-center justify-center gap-2 rounded-lg bg-gradient-to-r from-sky-500 to-teal-500 px-5 py-3.5 text-sm font-semibold text-white shadow-lg transition hover:from-sky-600 hover:to-teal-600 hover:shadow-xl focus:outline-none focus:ring-2 focus:ring-sky-400 focus:ring-offset-2"
            >
                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M12 5l7 7-7 7" />
                </svg>
                Masuk ke Sistem
            </button>
        </div>
    </form>
</x-guest-layout>
