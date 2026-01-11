<section>
    <form method="post" action="{{ route('password.update') }}" class="space-y-6">
        @csrf
        @method('put')

        <div class="space-y-2">
            <label for="update_password_current_password" class="block text-sm font-semibold text-sky-900">Password Saat Ini</label>
            <input 
                id="update_password_current_password" 
                name="current_password" 
                type="password" 
                class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-700 shadow-inner focus:border-sky-400 focus:ring-2 focus:ring-sky-300 @error('current_password', 'updatePassword') border-rose-400 ring-rose-100 @enderror" 
                autocomplete="current-password"
                placeholder="Masukkan password saat ini"
            />
            @error('current_password', 'updatePassword')
                <p class="mt-1 text-sm text-rose-600">{{ $message }}</p>
            @enderror
        </div>

        <div class="space-y-2">
            <label for="update_password_password" class="block text-sm font-semibold text-sky-900">Password Baru</label>
            <input 
                id="update_password_password" 
                name="password" 
                type="password" 
                class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-700 shadow-inner focus:border-sky-400 focus:ring-2 focus:ring-sky-300 @error('password', 'updatePassword') border-rose-400 ring-rose-100 @enderror" 
                autocomplete="new-password"
                placeholder="Minimal 8 karakter"
            />
            @error('password', 'updatePassword')
                <p class="mt-1 text-sm text-rose-600">{{ $message }}</p>
            @enderror
            <p class="text-xs text-slate-500">Gunakan kombinasi huruf besar, huruf kecil, angka, dan simbol.</p>
        </div>

        <div class="space-y-2">
            <label for="update_password_password_confirmation" class="block text-sm font-semibold text-sky-900">Konfirmasi Password Baru</label>
            <input 
                id="update_password_password_confirmation" 
                name="password_confirmation" 
                type="password" 
                class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-700 shadow-inner focus:border-sky-400 focus:ring-2 focus:ring-sky-300" 
                autocomplete="new-password"
                placeholder="Ulangi password baru"
            />
        </div>

        <div class="rounded-xl border border-sky-100 bg-sky-50/70 p-4">
            <div class="flex items-start gap-2">
                <svg class="mt-0.5 h-5 w-5 text-sky-600" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                </svg>
                <div class="text-sm text-sky-800">
                    <p class="font-semibold mb-1">Tips keamanan password:</p>
                    <ul class="list-inside list-disc space-y-1">
                        <li>Gabungkan huruf besar, huruf kecil, angka, dan simbol.</li>
                        <li>Hindari informasi pribadi yang mudah ditebak.</li>
                        <li>Ganti password secara berkala.</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="flex flex-col gap-3 pt-2 md:flex-row md:items-center">
            <button type="submit" class="inline-flex items-center justify-center rounded-xl bg-gradient-to-r from-sky-500 to-teal-500 px-5 py-3 text-sm font-semibold text-white shadow-md transition hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-sky-300">
                Update Password
            </button>
            <button type="reset" class="inline-flex items-center justify-center rounded-xl border border-slate-200 bg-white px-5 py-3 text-sm font-semibold text-slate-700 transition hover:border-sky-200 hover:text-sky-800">
                Batal
            </button>

            @if (session('status') === 'password-updated')
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
                    Password berhasil diupdate!
                </div>
            @endif
        </div>
    </form>
</section>
