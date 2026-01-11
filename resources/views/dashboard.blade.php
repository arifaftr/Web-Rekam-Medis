<x-master-layout>
    <div class="mb-8 space-y-4">
        <div class="relative overflow-hidden rounded-2xl border border-sky-100 bg-gradient-to-r from-sky-50 via-white to-teal-50 p-6 shadow-sm">
            <div class="absolute -right-10 -top-10 h-36 w-36 rounded-full bg-sky-200/40 blur-3xl"></div>
            <div class="absolute -left-12 bottom-0 h-28 w-28 rounded-full bg-teal-200/40 blur-3xl"></div>
            <div class="relative flex flex-col gap-3 md:flex-row md:items-center md:justify-between">
                <div class="space-y-2">
                    <p class="text-xs uppercase tracking-[0.28em] text-sky-500">Dashboard</p>
                    <h1 class="text-3xl font-bold text-sky-900">Selamat datang di Sistem Rekam Medis</h1>
                    <p class="text-slate-600">Pantau ringkasan data pasien, dokter, obat, dan rekam medis.</p>
                </div>
                <div class="flex flex-wrap items-center gap-3">
                    <span class="rounded-full bg-white/80 px-4 py-2 text-sm font-semibold text-sky-700 shadow-sm ring-1 ring-sky-100">Terakhir masuk: {{ now()->format('d M Y') }}</span>
                    <!-- <a href="{{ route('rekam-medis.create') }}" class="inline-flex items-center gap-2 rounded-xl bg-gradient-to-r from-sky-500 to-teal-500 px-5 py-3 text-sm font-semibold text-white shadow-md transition hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-sky-300">
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                        Tambah Rekam Medis
                    </a> -->
                </div>
            </div>
        </div>
    </div>

    @if(auth()->user() && auth()->user()->hasRole('superadmin'))
        <div class="mb-8 overflow-hidden rounded-2xl border border-sky-100 bg-gradient-to-r from-sky-600 to-teal-600 text-white shadow-xl shadow-sky-100/60">
            <div class="flex flex-col gap-3 px-6 py-6 md:flex-row md:items-center md:justify-between">
                <div>
                    <p class="text-xs uppercase tracking-[0.24em] text-white/80">Superadmin</p>
                    <h2 class="text-2xl font-bold">Kelola User Sistem</h2>
                    <p class="text-white/80">Tambahkan atau kelola akun user untuk aplikasi Rekam Medis.</p>
                </div>
                <div class="flex flex-wrap gap-3">
                    <a href="{{ route('users.create') }}" class="rounded-xl bg-white px-5 py-3 text-sm font-semibold text-sky-700 shadow-md transition hover:-translate-y-0.5 hover:shadow-lg">+ Tambah User Baru</a>
                    <a href="{{ route('users.index') }}" class="rounded-xl border border-white/40 px-5 py-3 text-sm font-semibold text-white shadow-md transition hover:-translate-y-0.5 hover:bg-white/10">Lihat Semua User →</a>
                </div>
            </div>
        </div>
    @endif

    @if(auth()->user() && !auth()->user()->hasRole('superadmin'))
    <div class="mb-8 grid grid-cols-1 gap-6 md:grid-cols-2 xl:grid-cols-4">
        <div class="rounded-2xl border border-sky-100 bg-white p-6 shadow-xl shadow-sky-50/60">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-semibold text-slate-500">Total Pasien</p>
                    <p class="mt-2 text-3xl font-bold text-sky-900">{{ $countPasien }}</p>
                </div>
                <div class="rounded-xl bg-sky-50 p-3 text-sky-600 ring-1 ring-sky-100">
                    <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 8.646 4 4 0 010-8.646M9 9H3v10a1 1 0 001 1h16a1 1 0 001-1V9h-6"></path>
                    </svg>
                </div>
            </div>
            <a href="{{ route('pasien.index') }}" class="mt-4 inline-flex items-center gap-1 text-sm font-semibold text-sky-700 hover:text-sky-900">Lihat selengkapnya →</a>
        </div>

        <div class="rounded-2xl border border-sky-100 bg-white p-6 shadow-xl shadow-sky-50/60">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-semibold text-slate-500">Total Dokter</p>
                    <p class="mt-2 text-3xl font-bold text-sky-900">{{ $countDokter }}</p>
                </div>
                <div class="rounded-xl bg-teal-50 p-3 text-teal-600 ring-1 ring-teal-100">
                    <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
            </div>
            <a href="{{ route('dokter.index') }}" class="mt-4 inline-flex items-center gap-1 text-sm font-semibold text-teal-700 hover:text-teal-900">Lihat selengkapnya →</a>
        </div>

        <div class="rounded-2xl border border-sky-100 bg-white p-6 shadow-xl shadow-sky-50/60">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-semibold text-slate-500">Total Obat</p>
                    <p class="mt-2 text-3xl font-bold text-sky-900">{{ $countObat }}</p>
                </div>
                <div class="rounded-xl bg-sky-50 p-3 text-sky-600 ring-1 ring-sky-100">
                    <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
            </div>
            <a href="{{ route('obat.index') }}" class="mt-4 inline-flex items-center gap-1 text-sm font-semibold text-sky-700 hover:text-sky-900">Lihat selengkapnya →</a>
        </div>

        <div class="rounded-2xl border border-sky-100 bg-white p-6 shadow-xl shadow-sky-50/60">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-semibold text-slate-500">Total Rekam Medis</p>
                    <p class="mt-2 text-3xl font-bold text-sky-900">{{ $countRekam }}</p>
                </div>
                <div class="rounded-xl bg-teal-50 p-3 text-teal-600 ring-1 ring-teal-100">
                    <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                </div>
            </div>
            <a href="{{ route('rekam-medis.index') }}" class="mt-4 inline-flex items-center gap-1 text-sm font-semibold text-teal-700 hover:text-teal-900">Lihat selengkapnya →</a>
        </div>
    </div>
    @endif

    @if(auth()->user() && !auth()->user()->hasRole('superadmin'))
    <div class="rounded-2xl border border-sky-100 bg-white shadow-xl shadow-sky-50/60">
        <div class="flex flex-col gap-2 border-b border-sky-100 px-6 py-4 md:flex-row md:items-center md:justify-between">
            <div>
                <h2 class="text-lg font-semibold text-sky-900">Kunjungan Terakhir</h2>
                <p class="text-sm text-slate-500">5 rekam medis terakhir</p>
            </div>
            @if($recent->count())
                <span class="rounded-lg bg-sky-50 px-3 py-1 text-xs font-semibold text-sky-700">Terbaru</span>
            @endif
        </div>

        @if($recent->count() > 0)
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead class="bg-sky-50/80 text-sky-800">
                        <tr>
                            <th class="px-6 py-3 text-xs font-semibold uppercase tracking-[0.08em]">Kode</th>
                            <th class="px-6 py-3 text-xs font-semibold uppercase tracking-[0.08em]">Pasien</th>
                            <th class="px-6 py-3 text-xs font-semibold uppercase tracking-[0.08em]">Dokter</th>
                            <th class="px-6 py-3 text-xs font-semibold uppercase tracking-[0.08em]">Tanggal</th>
                            <th class="px-6 py-3 text-xs font-semibold uppercase tracking-[0.08em]">Diagnosa</th>
                            <th class="px-6 py-3 text-xs font-semibold uppercase tracking-[0.08em]">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @foreach($recent as $item)
                            <tr class="transition hover:bg-sky-50/60">
                                <td class="px-6 py-4 text-sm font-semibold text-sky-900">
                                    <span class="inline-flex items-center gap-2 rounded-full bg-sky-50 px-3 py-1 text-sky-700 ring-1 ring-sky-100">
                                        <span class="h-2 w-2 rounded-full bg-teal-400"></span>
                                        {{ $item->kode }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-sm text-slate-700">
                                    <div class="font-semibold text-slate-900">{{ $item->pasien->nama ?? '-' }}</div>
                                    <p class="text-xs text-slate-500">ID: {{ $item->pasien_id }}</p>
                                </td>
                                <td class="px-6 py-4 text-sm text-slate-700">
                                    <div class="font-semibold text-slate-900">{{ $item->dokter->nama ?? '-' }}</div>
                                    <p class="text-xs text-slate-500">{{ $item->dokter->spesialisasi ?? 'Dokter' }}</p>
                                </td>
                                <td class="px-6 py-4 text-sm text-slate-700">
                                    <div class="font-semibold text-slate-900">{{ optional($item->tanggal_kunjungan)->format('d M Y') ?? '-' }}</div>
                                    <p class="text-xs text-slate-500">{{ optional($item->tanggal_kunjungan)->format('H:i') ?? 'Waktu tidak tersedia' }}</p>
                                </td>
                                <td class="px-6 py-4 text-sm text-slate-700">
                                    <p class="line-clamp-2 text-slate-700">{{ $item->diagnosa }}</p>
                                </td>
                                <td class="px-6 py-4 text-sm">
                                    <a href="{{ route('rekam-medis.show', $item->id) }}" class="inline-flex items-center gap-1 rounded-lg bg-sky-50 px-3 py-2 font-semibold text-sky-700 ring-1 ring-sky-100 transition hover:bg-sky-100">
                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                        </svg>
                                        Lihat
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="flex flex-col items-center gap-3 px-6 py-12 text-center">
                <div class="flex h-16 w-16 items-center justify-center rounded-2xl bg-gradient-to-br from-sky-100 to-teal-100 text-sky-600 shadow-inner">
                    <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                </div>
                <p class="text-lg font-semibold text-sky-900">Belum ada data rekam medis</p>
                <p class="max-w-md text-sm text-slate-600">Mulai tambahkan rekam medis untuk memonitor riwayat kunjungan dan diagnosa pasien secara terstruktur.</p>
            </div>
        @endif
    </div>
    @endif
</x-master-layout>
