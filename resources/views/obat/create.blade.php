<x-master-layout title="Tambah Obat">
    <div class="mb-8 space-y-3">
        <div class="relative overflow-hidden rounded-2xl border border-sky-100 bg-gradient-to-r from-sky-50 via-white to-teal-50 p-6 shadow-sm">
            <div class="absolute -right-8 -top-10 h-32 w-32 rounded-full bg-sky-200/40 blur-3xl"></div>
            <div class="absolute -left-10 bottom-0 h-24 w-24 rounded-full bg-teal-200/40 blur-3xl"></div>
            <div class="relative flex flex-col gap-2">
                <p class="text-xs uppercase tracking-[0.28em] text-sky-500">Data Baru</p>
                <h1 class="text-3xl font-bold text-sky-900">Tambah Obat Baru</h1>
                <p class="max-w-2xl text-slate-600">Isi formulir di bawah untuk menambahkan obat baru ke sistem.</p>
            </div>
        </div>
    </div>

    <div class="max-w-3xl">
        <div class="overflow-hidden rounded-2xl border border-sky-100 bg-white shadow-xl shadow-sky-50/60">
            <div class="flex items-center justify-between border-b border-sky-100 px-6 py-4">
                <div>
                    <h2 class="text-lg font-semibold text-sky-900">Data Obat</h2>
                    <p class="text-sm text-slate-500">Pastikan data harga dan stok terisi dengan benar.</p>
                </div>
                <span class="rounded-full bg-sky-50 px-3 py-1 text-xs font-semibold text-sky-700">Formulir</span>
            </div>

            <form action="{{ route('obat.store') }}" method="POST" class="p-6 space-y-6">
                @csrf

                <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                    <div>
                        <label for="nama" class="mb-2 block text-sm font-semibold text-sky-900">
                            Nama Obat <span class="text-rose-500">*</span>
                        </label>
                        <input
                            type="text"
                            name="nama"
                            id="nama"
                            value="{{ old('nama') }}"
                            placeholder="Masukkan nama obat"
                            class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-700 shadow-inner focus:border-sky-400 focus:ring-2 focus:ring-sky-300 @error('nama') border-rose-400 ring-rose-100 @enderror"
                            required>
                        @error('nama')
                            <p class="mt-1 text-sm text-rose-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="dosis" class="mb-2 block text-sm font-semibold text-sky-900">
                            Dosis <span class="text-rose-500">*</span>
                        </label>
                        <input
                            type="text"
                            name="dosis"
                            id="dosis"
                            value="{{ old('dosis') }}"
                            placeholder="Contoh: 500mg"
                            class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-700 shadow-inner focus:border-sky-400 focus:ring-2 focus:ring-sky-300 @error('dosis') border-rose-400 ring-rose-100 @enderror"
                            required>
                        @error('dosis')
                            <p class="mt-1 text-sm text-rose-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="kategori" class="mb-2 block text-sm font-semibold text-sky-900">
                            Kategori
                        </label>
                        <input
                            type="text"
                            name="kategori"
                            id="kategori"
                            value="{{ old('kategori') }}"
                            placeholder="Contoh: Antibiotik"
                            class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-700 shadow-inner focus:border-sky-400 focus:ring-2 focus:ring-sky-300 @error('kategori') border-rose-400 ring-rose-100 @enderror">
                        @error('kategori')
                            <p class="mt-1 text-sm text-rose-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="harga" class="mb-2 block text-sm font-semibold text-sky-900">
                            Harga (Rp) <span class="text-rose-500">*</span>
                        </label>
                        <input
                            type="number"
                            name="harga"
                            id="harga"
                            value="{{ old('harga') }}"
                            placeholder="0"
                            class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-700 shadow-inner focus:border-sky-400 focus:ring-2 focus:ring-sky-300 @error('harga') border-rose-400 ring-rose-100 @enderror"
                            required>
                        @error('harga')
                            <p class="mt-1 text-sm text-rose-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="stok" class="mb-2 block text-sm font-semibold text-sky-900">
                            Stok <span class="text-rose-500">*</span>
                        </label>
                        <input
                            type="number"
                            name="stok"
                            id="stok"
                            value="{{ old('stok') }}"
                            placeholder="0"
                            class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-700 shadow-inner focus:border-sky-400 focus:ring-2 focus:ring-sky-300 @error('stok') border-rose-400 ring-rose-100 @enderror"
                            required>
                        @error('stok')
                            <p class="mt-1 text-sm text-rose-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div>
                    <label for="keterangan" class="mb-2 block text-sm font-semibold text-sky-900">
                        Keterangan
                    </label>
                    <textarea
                        name="keterangan"
                        id="keterangan"
                        rows="4"
                        placeholder="Masukkan keterangan tambahan"
                        class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-700 shadow-inner focus:border-sky-400 focus:ring-2 focus:ring-sky-300">{{ old('keterangan') }}</textarea>
                </div>

                <div class="flex flex-col gap-3 pt-4 md:flex-row">
                    <button type="submit" class="flex-1 rounded-xl bg-gradient-to-r from-sky-500 to-teal-500 px-5 py-3 text-sm font-semibold text-white shadow-md transition hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-sky-300">
                        Simpan Obat
                    </button>
                    <a href="{{ route('obat.index') }}" class="flex-1 rounded-xl border border-slate-200 bg-white px-5 py-3 text-center text-sm font-semibold text-slate-700 transition hover:border-sky-200 hover:text-sky-800">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-master-layout>
