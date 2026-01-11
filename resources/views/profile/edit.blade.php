<x-master-layout>
    <div class="mb-8 space-y-4">
        <div class="relative overflow-hidden rounded-2xl border border-sky-100 bg-gradient-to-r from-sky-50 via-white to-teal-50 p-6 shadow-sm">
            <div class="absolute -right-10 -top-12 h-36 w-36 rounded-full bg-sky-200/40 blur-3xl"></div>
            <div class="absolute -left-12 bottom-0 h-28 w-28 rounded-full bg-teal-200/40 blur-3xl"></div>
            <div class="relative flex flex-col gap-3 md:flex-row md:items-center md:justify-between">
                <div class="space-y-2">
                    <p class="text-xs uppercase tracking-[0.28em] text-sky-500">Profil Pengguna</p>
                    <h1 class="text-3xl font-bold text-sky-900">Kelola Akun & Keamanan</h1>
                    <p class="text-slate-600">Perbarui identitas, email, dan password dengan tampilan modern.</p>
                </div>
                <a href="{{ route('dashboard') }}" class="inline-flex items-center gap-2 rounded-xl border border-slate-200 bg-white px-5 py-3 text-sm font-semibold text-slate-700 transition hover:border-sky-200 hover:text-sky-800">
                    <span class="text-lg">←</span> Kembali ke Dashboard
                </a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="mb-6 rounded-xl border border-emerald-100 bg-emerald-50 px-4 py-3 text-emerald-800 shadow-sm flex items-start gap-3">
            <svg class="h-5 w-5 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
            </svg>
            <div class="flex-1">{{ $message }}</div>
            <button onclick="this.parentElement.remove()" class="text-emerald-700 hover:text-emerald-900">✕</button>
        </div>
    @endif

    @if ($message = Session::get('error'))
        <div class="mb-6 rounded-xl border border-rose-100 bg-rose-50 px-4 py-3 text-rose-800 shadow-sm flex items-start gap-3">
            <svg class="h-5 w-5 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
            </svg>
            <div class="flex-1">{{ $message }}</div>
            <button onclick="this.parentElement.remove()" class="text-rose-700 hover:text-rose-900">✕</button>
        </div>
    @endif

    <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
        <div class="lg:col-span-1">
            <div class="overflow-hidden rounded-2xl border border-sky-100 bg-white shadow-xl shadow-sky-50/60">
                <div class="h-28 bg-gradient-to-r from-sky-500 to-teal-500"></div>
                <div class="px-6 pb-6">
                    <div class="relative -mt-12 mb-4">
                        <div class="mx-auto flex h-24 w-24 items-center justify-center rounded-full border-4 border-white bg-white shadow-lg">
                            <div class="flex h-20 w-20 items-center justify-center rounded-full bg-gradient-to-r from-sky-500 to-teal-500 text-3xl font-bold text-white">
                                {{ substr(auth()->user()->name, 0, 1) }}
                            </div>
                        </div>
                    </div>
                    <h3 class="text-xl font-bold text-sky-900">{{ auth()->user()->name }}</h3>
                    <p class="text-sm text-slate-600">{{ auth()->user()->email }}</p>

                    <div class="mt-4 space-y-3 rounded-xl border border-slate-100 bg-slate-50/60 p-4">
                        <div class="flex items-center text-sm text-slate-700">
                            <svg class="mr-2 h-4 w-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            Role:
                            <div class="ml-1 flex flex-wrap gap-2">
                                @foreach(auth()->user()->roles as $role)
                                    <span class="rounded-full bg-sky-50 px-2.5 py-1 text-xs font-semibold text-sky-700 ring-1 ring-sky-100">{{ ucfirst($role->name) }}</span>
                                @endforeach
                            </div>
                        </div>
                        <div class="flex items-center text-sm text-slate-700">
                            <svg class="mr-2 h-4 w-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            Bergabung: {{ auth()->user()->created_at->format('d M Y') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="space-y-6 lg:col-span-2">
            <div class="overflow-hidden rounded-2xl border border-sky-100 bg-white shadow-xl shadow-sky-50/60">
                <div class="border-b border-sky-100 px-6 py-4">
                    <h2 class="text-lg font-semibold text-sky-900">Informasi Profil</h2>
                    <p class="text-sm text-slate-500">Perbarui nama lengkap dan alamat email Anda.</p>
                </div>
                <div class="p-6">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="overflow-hidden rounded-2xl border border-sky-100 bg-white shadow-xl shadow-sky-50/60">
                <div class="border-b border-sky-100 px-6 py-4">
                    <h2 class="text-lg font-semibold text-sky-900">Ubah Password</h2>
                    <p class="text-sm text-slate-500">Gunakan password yang kuat dan unik.</p>
                </div>
                <div class="p-6">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="overflow-hidden rounded-2xl border border-rose-100 bg-white shadow-xl shadow-rose-50/60">
                <div class="border-b border-rose-100 px-6 py-4">
                    <h2 class="text-lg font-semibold text-rose-800">Hapus Akun</h2>
                    <p class="text-sm text-rose-600">Tindakan permanen, lanjutkan hanya jika Anda yakin.</p>
                </div>
                <div class="p-6">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-master-layout>
