<x-guest-layout>
    <div class="mb-6 space-y-2 text-center">
        <h3 class="text-2xl font-bold text-slate-800">Lupa Password?</h3>
        <p class="text-sm text-slate-600">Masukkan email Anda dan kami akan mengirimkan link reset password</p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}" class="space-y-5">
        @csrf

        <div class="space-y-2">
            <x-input-label for="email" :value="__('Email')" class="text-slate-700 text-sm font-medium" />
            <div class="relative">
                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4 text-slate-400">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
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
                    placeholder="nama@email.com"
                />
            </div>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex flex-col gap-3 pt-2">
            <button
                type="submit"
                class="flex w-full items-center justify-center gap-2 rounded-lg bg-gradient-to-r from-sky-500 to-teal-500 px-5 py-3.5 text-sm font-semibold text-white shadow-lg transition hover:from-sky-600 hover:to-teal-600 hover:shadow-xl focus:outline-none focus:ring-2 focus:ring-sky-400 focus:ring-offset-2"
            >
                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
                Kirim Link Reset Password
            </button>
            
            <a href="{{ route('login') }}" class="text-center text-sm font-medium text-slate-600 transition hover:text-slate-800">
                ← Kembali ke halaman login
            </a>
        </div>
    </form>
</x-guest-layout>
