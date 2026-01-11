<x-master-layout title="Detail Rekam Medis">
    <div class="mb-8 space-y-3">
        <div class="relative overflow-hidden rounded-2xl border border-sky-100 bg-gradient-to-r from-sky-50 via-white to-teal-50 p-6 shadow-sm">
            <div class="absolute -right-8 -top-10 h-32 w-32 rounded-full bg-sky-200/40 blur-3xl"></div>
            <div class="absolute -left-10 bottom-0 h-24 w-24 rounded-full bg-teal-200/40 blur-3xl"></div>
            <div class="relative flex flex-col gap-2 md:flex-row md:items-center md:justify-between">
                <div class="space-y-2">
                    <p class="text-xs uppercase tracking-[0.28em] text-sky-500">Detail</p>
                    <h1 class="text-3xl font-bold text-sky-900">Detail Rekam Medis</h1>
                    <p class="max-w-2xl text-slate-600">Informasi lengkap kunjungan pasien dengan tampilan yang terstruktur dan mudah dibaca.</p>
                </div>
                @if(!empty($rekamMedis->kode))
                    <span class="inline-flex items-center gap-2 rounded-full bg-white/80 px-4 py-2 text-sm font-semibold text-sky-700 shadow-sm ring-1 ring-sky-100">
                        <span class="h-2 w-2 rounded-full bg-teal-400"></span>
                        {{ $rekamMedis->kode }}
                    </span>
                @endif
            </div>
        </div>
    </div>

    <div class="max-w-4xl space-y-6">
        <div class="overflow-hidden rounded-2xl border border-sky-100 bg-white shadow-xl shadow-sky-50/60">
            <div class="flex flex-wrap items-center justify-between gap-3 border-b border-sky-100 px-6 py-4">
                <div>
                    <h2 class="text-lg font-semibold text-sky-900">Data Rekam Medis</h2>
                    <p class="text-sm text-slate-500">Tercatat pada {{ optional($rekamMedis->tanggal_kunjungan)->format('d M Y') ?? '-' }}</p>
                </div>
                <span class="rounded-full bg-sky-50 px-3 py-1 text-xs font-semibold text-sky-700">Riwayat</span>
            </div>

            <div class="grid grid-cols-1 gap-6 px-6 py-6 md:grid-cols-2">
                <div class="rounded-xl border border-sky-50 bg-sky-50/40 px-4 py-3">
                    <p class="text-xs font-semibold uppercase tracking-wide text-slate-500">Pasien</p>
                    <p class="text-lg font-semibold text-sky-900">{{ $rekamMedis->pasien->nama }}</p>
                    <p class="text-xs text-slate-500">ID: {{ $rekamMedis->pasien_id }}</p>
                </div>

                <div class="rounded-xl border border-teal-50 bg-teal-50/40 px-4 py-3">
                    <p class="text-xs font-semibold uppercase tracking-wide text-slate-500">Dokter</p>
                    <p class="text-lg font-semibold text-sky-900">{{ $rekamMedis->dokter->nama }}</p>
                    <p class="text-xs text-slate-500">{{ $rekamMedis->dokter->spesialisasi }}</p>
                </div>

                <div class="md:col-span-2 rounded-xl border border-slate-100 bg-white px-4 py-3 shadow-sm">
                    <p class="text-xs font-semibold uppercase tracking-wide text-slate-500">Keluhan</p>
                    <p class="mt-2 whitespace-pre-line text-slate-700">{{ $rekamMedis->keluhan }}</p>
                </div>

                <div class="md:col-span-2 rounded-xl border border-slate-100 bg-white px-4 py-3 shadow-sm">
                    <p class="text-xs font-semibold uppercase tracking-wide text-slate-500">Diagnosa</p>
                    <p class="mt-2 whitespace-pre-line text-slate-700">{{ $rekamMedis->diagnosa }}</p>
                </div>

                <div class="rounded-xl border border-slate-100 bg-white px-4 py-3 shadow-sm">
                    <p class="text-xs font-semibold uppercase tracking-wide text-slate-500">Resep Obat</p>
                    <p class="mt-2 text-slate-700">
                        @if($rekamMedis->obats && $rekamMedis->obats->count())
                            {{ $rekamMedis->obats->pluck('nama')->join(', ') }}
                        @else
                            {{ $rekamMedis->resep ?? '-' }}
                        @endif
                    </p>
                </div>

                <div class="rounded-xl border border-slate-100 bg-white px-4 py-3 shadow-sm">
                    <p class="text-xs font-semibold uppercase tracking-wide text-slate-500">Biaya</p>
                    <p class="mt-2 text-2xl font-bold text-sky-900">Rp {{ number_format($rekamMedis->biaya, 0, ',', '.') }}</p>
                </div>
            </div>
        </div>

        <div class="flex flex-col gap-3 md:flex-row">
            <a href="{{ route('rekam-medis.index') }}" class="flex-1 rounded-xl border border-slate-200 bg-white px-5 py-3 text-center text-sm font-semibold text-slate-700 transition hover:border-sky-200 hover:text-sky-800">Kembali</a>
            <a href="{{ route('rekam-medis.edit', $rekamMedis->id) }}" class="flex-1 rounded-xl bg-gradient-to-r from-sky-500 to-teal-500 px-5 py-3 text-center text-sm font-semibold text-white shadow-md transition hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-sky-300">Edit</a>
            <form method="POST" action="{{ route('rekam-medis.destroy', $rekamMedis->id) }}" class="flex-1" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="w-full rounded-xl bg-rose-500 px-5 py-3 text-sm font-semibold text-white shadow-md transition hover:bg-rose-600 hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-rose-200">Hapus</button>
            </form>
        </div>
    </div>
</x-master-layout>
