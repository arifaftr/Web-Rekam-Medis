<x-master-layout title="Tambah Dokter">
    <div class="mb-8 space-y-3">
        <div class="relative overflow-hidden rounded-2xl border border-sky-100 bg-gradient-to-r from-sky-50 via-white to-teal-50 p-6 shadow-sm">
            <div class="absolute -right-8 -top-10 h-32 w-32 rounded-full bg-sky-200/40 blur-3xl"></div>
            <div class="absolute -left-10 bottom-0 h-24 w-24 rounded-full bg-teal-200/40 blur-3xl"></div>
            <div class="relative flex flex-col gap-2">
                <p class="text-xs uppercase tracking-[0.28em] text-sky-500">Data Baru</p>
                <h1 class="text-3xl font-bold text-sky-900">Tambah Dokter Baru</h1>
                <p class="max-w-2xl text-slate-600">Isi formulir di bawah untuk menambahkan dokter baru ke sistem.</p>
            </div>
        </div>
    </div>

    <div class="max-w-3xl">
        <div class="overflow-hidden rounded-2xl border border-sky-100 bg-white shadow-xl shadow-sky-50/60">
            <div class="flex items-center justify-between border-b border-sky-100 px-6 py-4">
                <div>
                    <h2 class="text-lg font-semibold text-sky-900">Data Dokter</h2>
                    <p class="text-sm text-slate-500">Pastikan informasi terisi lengkap dan valid.</p>
                </div>
                <span class="rounded-full bg-sky-50 px-3 py-1 text-xs font-semibold text-sky-700">Formulir</span>
            </div>

            <form action="{{ route('dokter.store') }}" method="POST" class="p-6 space-y-6">
                @csrf

                <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                    <div>
                        <label for="nama" class="mb-2 block text-sm font-semibold text-sky-900">
                            Nama Lengkap <span class="text-rose-500">*</span>
                        </label>
                        <input
                            type="text"
                            name="nama"
                            id="nama"
                            value="{{ old('nama') }}"
                            placeholder="Masukkan nama lengkap"
                            class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-700 shadow-inner focus:border-sky-400 focus:ring-2 focus:ring-sky-300 @error('nama') border-rose-400 ring-rose-100 @enderror"
                            required>
                        @error('nama')
                            <p class="mt-1 text-sm text-rose-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="spesialisasi" class="mb-2 block text-sm font-semibold text-sky-900">
                            Spesialisasi <span class="text-rose-500">*</span>
                        </label>
                        <input
                            type="text"
                            name="spesialisasi"
                            id="spesialisasi"
                            value="{{ old('spesialisasi') }}"
                            placeholder="Contoh: Kardiologi"
                            class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-700 shadow-inner focus:border-sky-400 focus:ring-2 focus:ring-sky-300 @error('spesialisasi') border-rose-400 ring-rose-100 @enderror"
                            required>
                        @error('spesialisasi')
                            <p class="mt-1 text-sm text-rose-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="nomor_lisensi" class="mb-2 block text-sm font-semibold text-sky-900">
                            Nomor Lisensi <span class="text-rose-500">*</span>
                        </label>
                        <input
                            type="text"
                            name="nomor_lisensi"
                            id="nomor_lisensi"
                            value="{{ old('nomor_lisensi') }}"
                            placeholder="Masukkan nomor lisensi"
                            class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-700 shadow-inner focus:border-sky-400 focus:ring-2 focus:ring-sky-300 @error('nomor_lisensi') border-rose-400 ring-rose-100 @enderror"
                            required>
                        @error('nomor_lisensi')
                            <p class="mt-1 text-sm text-rose-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="no_telepon" class="mb-2 block text-sm font-semibold text-sky-900">
                            No. Telepon <span class="text-rose-500">*</span>
                        </label>
                        <input
                            type="tel"
                            name="no_telepon"
                            id="no_telepon"
                            value="{{ old('no_telepon') }}"
                            placeholder="Masukkan nomor telepon"
                            class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-700 shadow-inner focus:border-sky-400 focus:ring-2 focus:ring-sky-300 @error('no_telepon') border-rose-400 ring-rose-100 @enderror"
                            required>
                        @error('no_telepon')
                            <p class="mt-1 text-sm text-rose-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="email" class="mb-2 block text-sm font-semibold text-sky-900">
                            Email <span class="text-rose-500">*</span>
                        </label>
                        <input
                            type="email"
                            name="email"
                            id="email"
                            value="{{ old('email') }}"
                            placeholder="Masukkan email"
                            class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-700 shadow-inner focus:border-sky-400 focus:ring-2 focus:ring-sky-300 @error('email') border-rose-400 ring-rose-100 @enderror"
                            required>
                        @error('email')
                            <p class="mt-1 text-sm text-rose-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div>
                    <label for="alamat" class="mb-2 block text-sm font-semibold text-sky-900">
                        Alamat <span class="text-rose-500">*</span>
                    </label>
                    <textarea
                        name="alamat"
                        id="alamat"
                        rows="4"
                        placeholder="Masukkan alamat lengkap"
                        class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-700 shadow-inner focus:border-sky-400 focus:ring-2 focus:ring-sky-300 @error('alamat') border-rose-400 ring-rose-100 @enderror"
                        required>{{ old('alamat') }}</textarea>
                    @error('alamat')
                        <p class="mt-1 text-sm text-rose-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex flex-col gap-3 pt-4 md:flex-row">
                    <button type="submit" class="flex-1 rounded-xl bg-gradient-to-r from-sky-500 to-teal-500 px-5 py-3 text-sm font-semibold text-white shadow-md transition hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-sky-300">
                        Simpan Dokter
                    </button>
                    <a href="{{ route('dokter.index') }}" class="flex-1 rounded-xl border border-slate-200 bg-white px-5 py-3 text-center text-sm font-semibold text-slate-700 transition hover:border-sky-200 hover:text-sky-800">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-master-layout>
