<x-master-layout title="Detail Obat">
    <div class="mb-8 space-y-4">
        <div class="relative overflow-hidden rounded-2xl border border-sky-100 bg-gradient-to-r from-sky-50 via-white to-teal-50 p-6 shadow-sm">
            <div class="absolute -right-10 -top-12 h-36 w-36 rounded-full bg-sky-200/40 blur-3xl"></div>
            <div class="absolute -left-12 bottom-0 h-28 w-28 rounded-full bg-teal-200/40 blur-3xl"></div>
            <div class="relative flex flex-col gap-3 md:flex-row md:items-center md:justify-between">
                <div class="space-y-2">
                    <p class="text-xs uppercase tracking-[0.28em] text-sky-500">Detail Obat</p>
                    <h1 class="text-3xl font-bold text-sky-900">{{ $obat->nama }}</h1>
                    <p class="text-slate-600">Informasi lengkap obat, harga, dan stok.</p>
                </div>
                <div class="flex flex-wrap items-center gap-3">
                    <a href="{{ route('obat.edit', $obat->id) }}" class="inline-flex items-center gap-2 rounded-xl bg-gradient-to-r from-sky-500 to-teal-500 px-5 py-3 text-sm font-semibold text-white shadow-md transition hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-sky-300">Edit</a>
                    <a href="{{ route('obat.index') }}" class="inline-flex items-center gap-2 rounded-xl border border-slate-200 bg-white px-5 py-3 text-sm font-semibold text-slate-700 transition hover:border-sky-200 hover:text-sky-800">Kembali</a>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
        <div class="space-y-6 lg:col-span-2">
            <div class="overflow-hidden rounded-2xl border border-sky-100 bg-white shadow-xl shadow-sky-50/60">
                <div class="border-b border-sky-100 px-6 py-4">
                    <h2 class="text-lg font-semibold text-sky-900">Informasi Obat</h2>
                    <p class="text-sm text-slate-500">Data utama obat yang tersimpan di sistem.</p>
                </div>

                <div class="p-6 space-y-6">
                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                        <div>
                            <p class="text-xs font-semibold uppercase tracking-[0.1em] text-slate-500">Nama Obat</p>
                            <p class="mt-2 text-lg font-semibold text-sky-900">{{ $obat->nama }}</p>
                        </div>
                        <div>
                            <p class="text-xs font-semibold uppercase tracking-[0.1em] text-slate-500">Dosis</p>
                            <p class="mt-2 text-lg font-semibold text-slate-800">{{ $obat->dosis }}</p>
                        </div>
                        <div>
                            <p class="text-xs font-semibold uppercase tracking-[0.1em] text-slate-500">Kategori</p>
                            <p class="mt-2 inline-flex items-center gap-2 rounded-full bg-teal-50 px-3 py-1 text-xs font-semibold text-teal-700 ring-1 ring-teal-100">{{ $obat->kategori ?? '-' }}</p>
                        </div>
                        <div>
                            <p class="text-xs font-semibold uppercase tracking-[0.1em] text-slate-500">Harga</p>
                            <p class="mt-2 text-lg font-semibold text-slate-800">Rp {{ number_format($obat->harga, 0, ',', '.') }}</p>
                        </div>
                        <div>
                            <p class="text-xs font-semibold uppercase tracking-[0.1em] text-slate-500">Stok</p>
                            @php
                                $stokClass = $obat->stok > 10 ? 'bg-emerald-50 text-emerald-700 ring-emerald-100' : ($obat->stok > 0 ? 'bg-amber-50 text-amber-700 ring-amber-100' : 'bg-rose-50 text-rose-700 ring-rose-100');
                                $dotClass = $obat->stok > 10 ? 'bg-emerald-500' : ($obat->stok > 0 ? 'bg-amber-500' : 'bg-rose-500');
                            @endphp
                            <p class="mt-2 inline-flex items-center gap-2 rounded-full px-3 py-1 text-xs font-semibold ring-1 {{ $stokClass }}">
                                <span class="h-2 w-2 rounded-full {{ $dotClass }}"></span>
                                {{ $obat->stok }}
                            </p>
                        </div>
                    </div>

                    @if($obat->keterangan)
                        <div>
                            <p class="text-xs font-semibold uppercase tracking-[0.1em] text-slate-500">Keterangan</p>
                            <p class="mt-2 whitespace-pre-wrap text-base text-slate-800">{{ $obat->keterangan }}</p>
                        </div>
                    @endif

                    <div class="border-t border-slate-100 pt-4 text-xs text-slate-500">
                        Dibuat: {{ $obat->created_at->format('d M Y H:i') }} · Diperbarui: {{ $obat->updated_at->format('d M Y H:i') }}
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
                        <p class="text-sm text-slate-600">ID Obat</p>
                        <span class="rounded-lg bg-sky-50 px-3 py-1 font-mono text-sm font-semibold text-sky-800 ring-1 ring-sky-100">#{{ $obat->id }}</span>
                    </div>
                </div>
            </div>

            <div class="overflow-hidden rounded-2xl border border-rose-100 bg-white shadow-md shadow-rose-50/60">
                <div class="border-b border-rose-100 bg-rose-50 px-6 py-4">
                    <h3 class="text-lg font-semibold text-rose-900">Bahaya</h3>
                </div>
                <div class="p-6 space-y-4">
                    <p class="text-sm text-slate-600">Menghapus data obat tidak dapat dibatalkan.</p>
                    <form action="{{ route('obat.destroy', $obat->id) }}" method="POST" onsubmit="return confirm('Yakin hapus obat ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="w-full rounded-xl bg-rose-600 px-5 py-3 text-sm font-semibold text-white shadow-md transition hover:bg-rose-700 focus:outline-none focus:ring-2 focus:ring-rose-200">
                            Hapus Obat
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-master-layout>
