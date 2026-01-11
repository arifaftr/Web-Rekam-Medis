<section>
    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="space-y-6">
        @csrf
        @method('patch')

        <div class="space-y-2">
            <label for="name" class="block text-sm font-semibold text-sky-900">Nama Lengkap</label>
            <input 
                id="name" 
                name="name" 
                type="text" 
                value="{{ old('name', $user->name) }}"
                class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-700 shadow-inner focus:border-sky-400 focus:ring-2 focus:ring-sky-300 @error('name') border-rose-400 ring-rose-100 @enderror" 
                required 
                autofocus 
                autocomplete="name"
                placeholder="Masukkan nama lengkap"
            />
            @error('name')
                <p class="mt-1 text-sm text-rose-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="space-y-2">
            <label for="email" class="block text-sm font-semibold text-sky-900">Alamat Email</label>
            <input 
                id="email" 
                name="email" 
                type="email" 
                value="{{ old('email', $user->email) }}"
                class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-700 shadow-inner focus:border-sky-400 focus:ring-2 focus:ring-sky-300 @error('email') border-rose-400 ring-rose-100 @enderror" 
                required 
                autocomplete="username"
                placeholder="nama@contoh.com"
            />
            @error('email')
                <p class="mt-1 text-sm text-rose-600">{{ $message }}</p>
            @enderror

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="mt-3 rounded-xl border border-amber-100 bg-amber-50 px-4 py-3 text-sm text-amber-800">
                    <p>Email Anda belum diverifikasi.
                        <button form="send-verification" class="font-semibold text-amber-900 underline decoration-amber-400 hover:text-amber-700">
                            Kirim ulang email verifikasi
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-semibold text-emerald-700">Link verifikasi baru telah dikirim.</p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex flex-col gap-3 pt-2 md:flex-row md:items-center">
            <button type="submit" class="inline-flex items-center justify-center rounded-xl bg-gradient-to-r from-sky-500 to-teal-500 px-5 py-3 text-sm font-semibold text-white shadow-md transition hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-sky-300">
                Simpan Perubahan
            </button>

            @if (session('status') === 'profile-updated')
                <div 
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 3000)"
                    class="inline-flex items-center gap-2 text-sm font-semibold text-emerald-700"
                >
                    <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    Tersimpan!
                </div>
            @endif
        </div>
    </form>
</section>
