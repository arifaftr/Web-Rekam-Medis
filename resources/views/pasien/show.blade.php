<x-master-layout title="Detail Pasien">
    <div class="mb-8 space-y-3">
        <div class="relative overflow-hidden rounded-2xl border border-sky-100 bg-gradient-to-r from-sky-50 via-white to-teal-50 p-6 shadow-sm">
            <div class="absolute -right-8 -top-10 h-32 w-32 rounded-full bg-sky-200/40 blur-3xl"></div>
            <div class="absolute -left-10 bottom-0 h-24 w-24 rounded-full bg-teal-200/40 blur-3xl"></div>
            <div class="relative flex flex-col gap-2 md:flex-row md:items-center md:justify-between">
                <div class="space-y-2">
                    <p class="text-xs uppercase tracking-[0.28em] text-sky-500">Detail Pasien</p>
                    <h1 class="text-3xl font-bold text-sky-900">{{ $pasien->nama }}</h1>
                    <p class="max-w-2xl text-slate-600">Informasi lengkap pasien dengan kontak dan identitas.</p>
                </div>
                <div class="flex flex-wrap items-center gap-3">
                    <span class="inline-flex items-center gap-2 rounded-full bg-white/80 px-4 py-2 text-sm font-semibold text-sky-700 shadow-sm ring-1 ring-sky-100">
                        <span class="h-2 w-2 rounded-full bg-teal-400"></span>
                        ID #{{ str_pad($pasien->id, 5, '0', STR_PAD_LEFT) }}
                    </span>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
        <div class="lg:col-span-2 space-y-6">
            <div class="overflow-hidden rounded-2xl border border-sky-100 bg-white shadow-xl shadow-sky-50/60">
                <div class="flex items-center justify-between border-b border-sky-100 px-6 py-4">
                    <div>
                        <h2 class="text-lg font-semibold text-sky-900">Informasi Pasien</h2>
                        <p class="text-sm text-slate-500">Data identitas dan kontak.</p>
                    </div>
                    <span class="rounded-full bg-sky-50 px-3 py-1 text-xs font-semibold text-sky-700">Profil</span>
                </div>

                <div class="grid grid-cols-1 gap-6 px-6 py-6 md:grid-cols-2">
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-wide text-slate-500">Nama Lengkap</p>
                        <p class="mt-1 text-lg font-semibold text-sky-900">{{ $pasien->nama }}</p>
                    </div>
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-wide text-slate-500">No. Identitas</p>
                        <p class="mt-1 text-lg font-semibold text-sky-900">{{ $pasien->nomor_identitas }}</p>
                    </div>
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-wide text-slate-500">No. Telepon</p>
                        <p class="mt-1 text-lg font-semibold text-sky-900">{{ $pasien->no_telepon }}</p>
                    </div>
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-wide text-slate-500">Email</p>
                        <p class="mt-1 text-lg font-semibold text-sky-900">{{ $pasien->email ?? '-' }}</p>
                    </div>
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-wide text-slate-500">Tanggal Lahir</p>
                        <p class="mt-1 text-lg font-semibold text-sky-900">{{ $pasien->tanggal_lahir ? \Carbon\Carbon::parse($pasien->tanggal_lahir)->format('d M Y') : '-' }}</p>
                    </div>
                    <div>
                        <p class="text-xs font-semibold uppercase tracking-wide text-slate-500">Jenis Kelamin</p>
                        <span class="mt-2 inline-flex items-center gap-2 rounded-full px-3 py-1 text-xs font-semibold {{ $pasien->jenis_kelamin == 'Laki-laki' ? 'bg-sky-50 text-sky-700 ring-1 ring-sky-100' : 'bg-teal-50 text-teal-700 ring-1 ring-teal-100' }}">
                            <span class="h-2 w-2 rounded-full {{ $pasien->jenis_kelamin == 'Laki-laki' ? 'bg-sky-500' : 'bg-teal-500' }}"></span>
                            {{ $pasien->jenis_kelamin ?? '-' }}
                        </span>
                    </div>
                </div>

                <div class="px-6 pb-6">
                    <p class="text-xs font-semibold uppercase tracking-wide text-slate-500">Alamat</p>
                    <p class="mt-2 whitespace-pre-line text-slate-700">{{ $pasien->alamat }}</p>
                </div>

                <div class="border-t border-sky-100 px-6 py-4 text-xs text-slate-500">
                    Dibuat: {{ $pasien->created_at->format('d M Y H:i') }} · Diperbarui: {{ $pasien->updated_at->format('d M Y H:i') }}
                </div>
            </div>
        </div>

        <div class="space-y-6 lg:col-span-1">
            <div class="overflow-hidden rounded-2xl border border-sky-100 bg-white shadow-xl shadow-sky-50/60">
                <div class="border-b border-sky-100 px-6 py-4">
                    <h3 class="text-lg font-semibold text-sky-900">Ringkasan</h3>
                </div>
                <div class="space-y-4 px-6 py-5">
                    <div>
                        <p class="text-sm text-slate-500">ID Pasien</p>
                        <p class="text-lg font-semibold text-sky-900">#{{ str_pad($pasien->id, 5, '0', STR_PAD_LEFT) }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-slate-500">Status</p>
                        <span class="inline-flex items-center gap-2 rounded-full bg-emerald-50 px-3 py-1 text-xs font-semibold text-emerald-700 ring-1 ring-emerald-100">Aktif</span>
                    </div>
                </div>
            </div>

            <div class="overflow-hidden rounded-2xl border border-sky-100 bg-white shadow-xl shadow-sky-50/60">
                <div class="border-b border-sky-100 px-6 py-4">
                    <h3 class="text-lg font-semibold text-sky-900">Aksi</h3>
                </div>
                <div class="space-y-3 px-6 py-5">
                    <a href="{{ route('pasien.edit', $pasien->id) }}" class="block w-full rounded-xl bg-gradient-to-r from-sky-500 to-teal-500 px-5 py-3 text-center text-sm font-semibold text-white shadow-md transition hover:shadow-lg">Edit Data</a>
                    <a href="{{ route('pasien.index') }}" class="block w-full rounded-xl border border-slate-200 bg-white px-5 py-3 text-center text-sm font-semibold text-slate-700 transition hover:border-sky-200 hover:text-sky-800">Kembali</a>
                    @can('delete_pasien')
                        <form action="{{ route('pasien.destroy', $pasien->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pasien ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="w-full rounded-xl bg-rose-500 px-5 py-3 text-sm font-semibold text-white shadow-md transition hover:bg-rose-600 hover:shadow-lg">Hapus Pasien</button>
                        </form>
                    @endcan
                </div>
            </div>
        </div>
    </div>
</x-master-layout>
