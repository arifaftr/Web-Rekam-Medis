<x-master-layout title="Edit Rekam Medis">
    <div class="mb-8 space-y-3">
        <div class="relative overflow-hidden rounded-2xl border border-sky-100 bg-gradient-to-r from-sky-50 via-white to-teal-50 p-6 shadow-sm">
            <div class="absolute -right-8 -top-10 h-32 w-32 rounded-full bg-sky-200/40 blur-3xl"></div>
            <div class="absolute -left-10 bottom-0 h-24 w-24 rounded-full bg-teal-200/40 blur-3xl"></div>
            <div class="relative flex flex-col gap-2">
                <p class="text-xs uppercase tracking-[0.28em] text-sky-500">Pembaruan Data</p>
                <h1 class="text-3xl font-bold text-sky-900">Edit Rekam Medis</h1>
                <p class="max-w-2xl text-slate-600">Perbarui informasi penting kunjungan pasien dengan tampilan yang bersih dan mudah dipindai.</p>
            </div>
        </div>
    </div>

    <div class="max-w-4xl">
        <div class="overflow-hidden rounded-2xl border border-sky-100 bg-white shadow-xl shadow-sky-50/60">
            <div class="flex items-center justify-between border-b border-sky-100 px-6 py-4">
                <div>
                    <h2 class="text-lg font-semibold text-sky-900">Data Rekam Medis</h2>
                    <p class="text-sm text-slate-500">Pastikan data terisi dengan benar sebelum disimpan.</p>
                </div>
                <span class="rounded-full bg-amber-50 px-3 py-1 text-xs font-semibold text-amber-700">Sedang diedit</span>
            </div>

            <form action="{{ route('rekam-medis.update', $rekamMedis->id) }}" method="POST" class="p-6 space-y-6">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                    <div>
                        <label for="pasien_id" class="mb-2 block text-sm font-semibold text-sky-900">
                            Pasien <span class="text-rose-500">*</span>
                        </label>
                        <select
                            name="pasien_id"
                            id="pasien_id"
                            class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-700 shadow-inner focus:border-sky-400 focus:ring-2 focus:ring-sky-300 @error('pasien_id') border-rose-400 ring-rose-100 @enderror"
                            required>
                            @foreach($pasiens as $pasien)
                                <option value="{{ $pasien->id }}" @selected(old('pasien_id', $rekamMedis->pasien_id) == $pasien->id)>{{ $pasien->nama }}</option>
                            @endforeach
                        </select>
                        @error('pasien_id')
                            <p class="mt-1 text-sm text-rose-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="dokter_id" class="mb-2 block text-sm font-semibold text-sky-900">
                            Dokter <span class="text-rose-500">*</span>
                        </label>
                        <select
                            name="dokter_id"
                            id="dokter_id"
                            class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-700 shadow-inner focus:border-sky-400 focus:ring-2 focus:ring-sky-300 @error('dokter_id') border-rose-400 ring-rose-100 @enderror"
                            required>
                            @foreach($dokters as $dokter)
                                <option value="{{ $dokter->id }}" @selected(old('dokter_id', $rekamMedis->dokter_id) == $dokter->id)>{{ $dokter->nama }} ({{ $dokter->spesialisasi }})</option>
                            @endforeach
                        </select>
                        @error('dokter_id')
                            <p class="mt-1 text-sm text-rose-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="tanggal_kunjungan" class="mb-2 block text-sm font-semibold text-sky-900">
                            Tanggal Kunjungan <span class="text-rose-500">*</span>
                        </label>
                        <input
                            type="date"
                            name="tanggal_kunjungan"
                            id="tanggal_kunjungan"
                            value="{{ old('tanggal_kunjungan', \Carbon\Carbon::parse($rekamMedis->tanggal_kunjungan)->format('Y-m-d')) }}"
                            class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-700 shadow-inner focus:border-sky-400 focus:ring-2 focus:ring-sky-300 @error('tanggal_kunjungan') border-rose-400 ring-rose-100 @enderror"
                            required>
                        @error('tanggal_kunjungan')
                            <p class="mt-1 text-sm text-rose-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="biaya" class="mb-2 block text-sm font-semibold text-sky-900">
                            Biaya (Rp)
                        </label>
                        <input
                            type="number"
                            name="biaya"
                            id="biaya"
                            value="{{ old('biaya', $rekamMedis->biaya) }}"
                            placeholder="0"
                            min="0"
                            class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-700 shadow-inner focus:border-sky-400 focus:ring-2 focus:ring-sky-300 @error('biaya') border-rose-400 ring-rose-100 @enderror">
                        @error('biaya')
                            <p class="mt-1 text-sm text-rose-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                    <div class="md:col-span-2">
                        <label for="keluhan" class="mb-2 block text-sm font-semibold text-sky-900">
                            Keluhan <span class="text-rose-500">*</span>
                        </label>
                        <textarea
                            name="keluhan"
                            id="keluhan"
                            rows="3"
                            placeholder="Masukkan keluhan pasien"
                            class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-700 shadow-inner focus:border-sky-400 focus:ring-2 focus:ring-sky-300 @error('keluhan') border-rose-400 ring-rose-100 @enderror"
                            required>{{ old('keluhan', $rekamMedis->keluhan) }}</textarea>
                        @error('keluhan')
                            <p class="mt-1 text-sm text-rose-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="md:col-span-2">
                        <label for="diagnosa" class="mb-2 block text-sm font-semibold text-sky-900">
                            Diagnosa <span class="text-rose-500">*</span>
                        </label>
                        <textarea
                            name="diagnosa"
                            id="diagnosa"
                            rows="3"
                            placeholder="Masukkan diagnosa"
                            class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-700 shadow-inner focus:border-sky-400 focus:ring-2 focus:ring-sky-300 @error('diagnosa') border-rose-400 ring-rose-100 @enderror"
                            required>{{ old('diagnosa', $rekamMedis->diagnosa) }}</textarea>
                        @error('diagnosa')
                            <p class="mt-1 text-sm text-rose-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div>
                    <div class="flex items-center justify-between">
                        <label for="obat_ids" class="mb-2 block text-sm font-semibold text-sky-900">
                            Resep (Pilih Obat)
                        </label>
                        <span class="text-xs font-medium uppercase tracking-wide text-slate-500">Opsional</span>
                    </div>
                    <select
                        name="obat_ids[]"
                        id="obat_ids"
                        multiple
                        class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-700 shadow-inner focus:border-sky-400 focus:ring-2 focus:ring-sky-300">
                        @php
                            $selectedObats = old('obat_ids', $selected ?? []);
                        @endphp
                        @foreach($obats as $obat)
                            <option value="{{ $obat->id }}" @selected(in_array($obat->id, $selectedObats))>
                                {{ $obat->nama }} @if($obat->dosis)({{ $obat->dosis }})@endif
                            </option>
                        @endforeach
                    </select>
                    <p class="mt-2 text-sm text-slate-500">Tahan Ctrl/Cmd untuk memilih beberapa obat sekaligus.</p>
                </div>

                <div class="flex flex-col gap-3 pt-4 md:flex-row">
                    <button type="submit" class="flex-1 rounded-xl bg-gradient-to-r from-sky-500 to-teal-500 px-5 py-3 text-sm font-semibold text-white shadow-md transition hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-sky-300">
                        Update Rekam Medis
                    </button>
                    <a href="{{ route('rekam-medis.index') }}" class="flex-1 rounded-xl border border-slate-200 bg-white px-5 py-3 text-center text-sm font-semibold text-slate-700 transition hover:border-sky-200 hover:text-sky-800">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-master-layout>
