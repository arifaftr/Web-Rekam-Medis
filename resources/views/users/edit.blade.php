<x-master-layout>
    <div class="mb-8 space-y-4">
        <a href="{{ route('users.index') }}" class="inline-flex items-center gap-2 rounded-xl border border-slate-200 bg-white px-4 py-2 text-sm font-semibold text-slate-700 transition hover:border-sky-200 hover:text-sky-800">
            <span class="text-lg">←</span> Kembali ke Daftar User
        </a>
        
        <div class="relative overflow-hidden rounded-2xl border border-sky-100 bg-gradient-to-r from-sky-50 via-white to-teal-50 p-6 shadow-sm">
            <div class="absolute -right-10 -top-12 h-36 w-36 rounded-full bg-sky-200/40 blur-3xl"></div>
            <div class="absolute -left-12 bottom-0 h-28 w-28 rounded-full bg-teal-200/40 blur-3xl"></div>
            <div class="relative space-y-2">
                <p class="text-xs uppercase tracking-[0.28em] text-sky-500">Edit Akun</p>
                <h1 class="text-3xl font-bold text-sky-900">Perbarui Data User</h1>
                <p class="text-slate-600">Ubah informasi akun, email, atau password user.</p>
            </div>
        </div>
    </div>

    <div class="mx-auto max-w-2xl overflow-hidden rounded-2xl border border-sky-100 bg-white shadow-xl shadow-sky-50/60">
        <div class="border-b border-sky-100 bg-gradient-to-r from-sky-50/50 to-teal-50/50 px-6 py-4">
            <h2 class="text-lg font-semibold text-sky-900">Data User</h2>
        </div>

        <form action="{{ route('users.update', $user->id) }}" method="POST" class="space-y-6 p-6">
            @csrf
            @method('PATCH')

            <div class="space-y-2">
                <label for="name" class="block text-sm font-semibold text-sky-900">Nama Lengkap</label>
                <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" 
                    class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-700 shadow-inner transition focus:border-sky-400 focus:ring-2 focus:ring-sky-300 @error('name') border-rose-400 ring-rose-100 @enderror"
                    required>
                @error('name')
                    <p class="mt-1 text-sm text-rose-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="space-y-2">
                <label for="email" class="block text-sm font-semibold text-sky-900">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" 
                    class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-700 shadow-inner transition focus:border-sky-400 focus:ring-2 focus:ring-sky-300 @error('email') border-rose-400 ring-rose-100 @enderror"
                    required>
                @error('email')
                    <p class="mt-1 text-sm text-rose-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="space-y-2">
                <label for="password" class="block text-sm font-semibold text-sky-900">Password Baru</label>
                <input type="password" name="password" id="password" 
                    class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-700 shadow-inner transition focus:border-sky-400 focus:ring-2 focus:ring-sky-300 @error('password') border-rose-400 ring-rose-100 @enderror"
                    placeholder="Kosongkan jika tidak ingin mengubah">
                @error('password')
                    <p class="mt-1 text-sm text-rose-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="space-y-2">
                <label for="password_confirmation" class="block text-sm font-semibold text-sky-900">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" 
                    class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-700 shadow-inner transition focus:border-sky-400 focus:ring-2 focus:ring-sky-300"
                    placeholder="Ulangi password baru">
            </div>

            <div class="rounded-xl border border-sky-100 bg-sky-50/70 p-4">
                <h3 class="mb-2 font-semibold text-sky-900">Role Saat Ini</h3>
                <div class="flex flex-wrap gap-2">
                    @foreach($user->roles as $role)
                        <span class="inline-flex items-center rounded-full px-2.5 py-1 text-xs font-semibold @if($role->name === 'superadmin') bg-rose-50 text-rose-700 ring-1 ring-rose-100 @elseif($role->name === 'admin') bg-amber-50 text-amber-700 ring-1 ring-amber-100 @else bg-sky-50 text-sky-700 ring-1 ring-sky-100 @endif">
                            {{ ucfirst($role->name) }}
                        </span>
                    @endforeach
                </div>
                <p class="mt-3 text-sm text-sky-700">Untuk mengubah role, silakan hubungi administrator sistem.</p>
            </div>

            <div class="flex flex-col gap-3 border-t border-sky-100 pt-6 md:flex-row">
                <button type="submit" class="inline-flex items-center justify-center rounded-xl bg-gradient-to-r from-sky-500 to-teal-500 px-6 py-3 text-sm font-semibold text-white shadow-md transition hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-sky-300">
                    Simpan Perubahan
                </button>
                <a href="{{ route('users.index') }}" class="inline-flex items-center justify-center rounded-xl border border-slate-200 bg-white px-6 py-3 text-sm font-semibold text-slate-700 transition hover:border-sky-200 hover:text-sky-800">
                    Batal
                </a>
            </div>
        </form>
    </div>
</x-master-layout>
