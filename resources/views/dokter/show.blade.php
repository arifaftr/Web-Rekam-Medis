<x-master-layout title="Detail Dokter">
    <div class="mb-8 space-y-4">
        <div class="relative overflow-hidden rounded-2xl border border-sky-100 bg-gradient-to-r from-sky-50 via-white to-teal-50 p-6 shadow-sm">
            <div class="absolute -right-10 -top-12 h-36 w-36 rounded-full bg-sky-200/40 blur-3xl"></div>
            <div class="absolute -left-12 bottom-0 h-28 w-28 rounded-full bg-teal-200/40 blur-3xl"></div>
            <div class="relative flex flex-col gap-3 md:flex-row md:items-center md:justify-between">
                <div class="space-y-2">
                    <p class="text-xs uppercase tracking-[0.28em] text-sky-500">Detail Dokter</p>
                    <h1 class="text-3xl font-bold text-sky-900">{{ $dokter->nama }}</h1>
                    <p class="text-slate-600">Informasi lengkap dokter dan data lisensi.</p>
                </div>
                <div class="flex flex-wrap items-center gap-3">
                    <a href="{{ route('dokter.edit', $dokter->id) }}" class="inline-flex items-center gap-2 rounded-xl bg-gradient-to-r from-sky-500 to-teal-500 px-5 py-3 text-sm font-semibold text-white shadow-md transition hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-sky-300">Edit</a>
                    <a href="{{ route('dokter.index') }}" class="inline-flex items-center gap-2 rounded-xl border border-slate-200 bg-white px-5 py-3 text-sm font-semibold text-slate-700 transition hover:border-sky-200 hover:text-sky-800">Kembali</a>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
        <div class="space-y-6 lg:col-span-2">
            <div class="overflow-hidden rounded-2xl border border-sky-100 bg-white shadow-xl shadow-sky-50/60">
                <div class="border-b border-sky-100 px-6 py-4">
                    <h2 class="text-lg font-semibold text-sky-900">Informasi Dokter</h2>
                    <p class="text-sm text-slate-500">Data utama dokter yang tersimpan di sistem.</p>
                </div>

                <div class="p-6 space-y-6">
                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                        <div>
                            <p class="text-xs font-semibold uppercase tracking-[0.1em] text-slate-500">Nama Lengkap</p>
                            <p class="mt-2 text-lg font-semibold text-sky-900">{{ $dokter->nama }}</p>
                        </div>
                        <div>
                            <p class="text-xs font-semibold uppercase tracking-[0.1em] text-slate-500">Spesialisasi</p>
                            <p class="mt-2 inline-flex items-center gap-2 rounded-full bg-teal-50 px-3 py-1 text-teal-700 ring-1 ring-teal-100">
                                <span class="h-2 w-2 rounded-full bg-teal-400"></span>
                                {{ $dokter->spesialisasi }}
                            </p>
                        </div>
                        <div>
                            <p class="text-xs font-semibold uppercase tracking-[0.1em] text-slate-500">Nomor Lisensi</p>
                            <p class="mt-2 inline-flex items-center gap-2 rounded-lg bg-sky-50 px-3 py-1 font-mono text-sm text-sky-800 ring-1 ring-sky-100">{{ $dokter->nomor_lisensi }}</p>
                        </div>
                        <div>
                            <p class="text-xs font-semibold uppercase tracking-[0.1em] text-slate-500">No. Telepon</p>
                            <p class="mt-2 text-lg font-semibold text-slate-800">{{ $dokter->no_telepon }}</p>
                        </div>
                        <div>
                            <p class="text-xs font-semibold uppercase tracking-[0.1em] text-slate-500">Email</p>
                            <p class="mt-2 text-lg font-semibold text-slate-800">{{ $dokter->email }}</p>
                        </div>
                    </div>

                    <div>
                        <p class="text-xs font-semibold uppercase tracking-[0.1em] text-slate-500">Alamat</p>
                        <p class="mt-2 whitespace-pre-wrap text-base text-slate-800">{{ $dokter->alamat }}</p>
                    </div>

                    <div class="border-t border-slate-100 pt-4 text-xs text-slate-500">
                        Dibuat: {{ $dokter->created_at->format('d M Y H:i') }} · Diperbarui: {{ $dokter->updated_at->format('d M Y H:i') }}
                    </div>
                </div>
            </div>
        </div>

        <div class="space-y-6 lg:col-span-1">
            <div class="overflow-hidden rounded-2xl border border-sky-100 bg-white shadow-md shadow-sky-50/60">
                <div class="border-b border-sky-100 px-6 py-4">
                    <h3 class="text-lg font-semibold text-sky-900">Informasi Sistem</h3>
                </div>
                <div class="p-6 space-y-3">
                    <div class="flex items-center justify-between">
                        <p class="text-sm text-slate-600">ID Dokter</p>
                        <span class="rounded-lg bg-sky-50 px-3 py-1 font-mono text-sm font-semibold text-sky-800 ring-1 ring-sky-100">#{{ $dokter->id }}</span>
                    </div>
                </div>
            </div>

            <div class="overflow-hidden rounded-2xl border border-rose-100 bg-white shadow-md shadow-rose-50/60">
                <div class="border-b border-rose-100 bg-rose-50 px-6 py-4">
                    <h3 class="text-lg font-semibold text-rose-900">Bahaya</h3>
                </div>
                <div class="p-6 space-y-4">
                    <p class="text-sm text-slate-600">Menghapus data dokter tidak dapat dibatalkan.</p>
                    <form action="{{ route('dokter.destroy', $dokter->id) }}" method="POST" onsubmit="return confirm('Yakin hapus dokter ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="w-full rounded-xl bg-rose-600 px-5 py-3 text-sm font-semibold text-white shadow-md transition hover:bg-rose-700 focus:outline-none focus:ring-2 focus:ring-rose-200">
                            Hapus Dokter
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-master-layout>
