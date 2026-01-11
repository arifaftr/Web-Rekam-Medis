<section class="space-y-4">
    <div class="rounded-2xl border border-rose-100 bg-gradient-to-r from-rose-50 via-white to-amber-50 p-5 shadow-sm">
        <div class="flex flex-col gap-3 md:flex-row md:items-center md:justify-between">
            <div class="space-y-1">
                <h2 class="text-lg font-semibold text-rose-800">Hapus Akun</h2>
                <p class="text-sm text-rose-700">Tindakan ini bersifat permanen. Pastikan Anda sudah mencadangkan data penting.</p>
            </div>
            <button
                type="button"
                x-data=""
                x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
                class="inline-flex items-center justify-center rounded-xl bg-gradient-to-r from-rose-500 to-orange-500 px-5 py-3 text-sm font-semibold text-white shadow-md transition hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-rose-200"
            >
                Hapus Akun
            </button>
        </div>
    </div>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="space-y-4 p-6">
            @csrf
            @method('delete')

            <div class="space-y-2">
                <h2 class="text-lg font-semibold text-rose-800">Yakin ingin menghapus akun?</h2>
                <p class="text-sm text-slate-600">Semua data akan terhapus permanen. Masukkan password untuk mengonfirmasi.</p>
            </div>

            <div class="space-y-2">
                <label for="password" class="text-sm font-semibold text-slate-800">Password</label>
                <input
                    id="password"
                    name="password"
                    type="password"
                    class="w-full rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm text-slate-700 shadow-inner focus:border-rose-400 focus:ring-2 focus:ring-rose-200"
                    placeholder="Masukkan password"
                />
                <x-input-error :messages="$errors->userDeletion->get('password')" class="text-sm" />
            </div>

            <div class="flex flex-col gap-3 pt-2 md:flex-row md:justify-end">
                <button type="button" x-on:click="$dispatch('close')" class="inline-flex items-center justify-center rounded-xl border border-slate-200 bg-white px-5 py-3 text-sm font-semibold text-slate-700 transition hover:border-slate-300 hover:text-slate-900">
                    Batal
                </button>
                <button class="inline-flex items-center justify-center rounded-xl bg-gradient-to-r from-rose-600 to-orange-500 px-5 py-3 text-sm font-semibold text-white shadow-md transition hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-rose-200">
                    Hapus Permanen
                </button>
            </div>
        </form>
    </x-modal>
</section>
