<x-master-layout>
    <div class="mb-8 space-y-4">
        <div class="relative overflow-hidden rounded-2xl border border-sky-100 bg-gradient-to-r from-sky-50 via-white to-teal-50 p-6 shadow-sm">
            <div class="absolute -right-10 -top-12 h-36 w-36 rounded-full bg-sky-200/40 blur-3xl"></div>
            <div class="absolute -left-12 bottom-0 h-28 w-28 rounded-full bg-teal-200/40 blur-3xl"></div>
            <div class="relative flex flex-col gap-3 md:flex-row md:items-center md:justify-between">
                <div class="space-y-2">
                    <p class="text-xs uppercase tracking-[0.28em] text-sky-500">User Management</p>
                    <h1 class="text-3xl font-bold text-sky-900">Kelola User Sistem</h1>
                    <p class="text-slate-600">Manajemen akun pengguna dan role akses sistem.</p>
                </div>
                <a href="{{ route('users.create') }}" class="inline-flex items-center gap-2 rounded-xl bg-gradient-to-r from-sky-500 to-teal-500 px-5 py-3 text-sm font-semibold text-white shadow-md transition hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-sky-300">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Tambah User Baru
                </a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="mb-6 flex items-start gap-3 rounded-xl border border-emerald-100 bg-emerald-50 px-4 py-3 text-emerald-800 shadow-sm">
            <svg class="mt-0.5 h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
            </svg>
            <div class="flex-1">{{ $message }}</div>
            <button onclick="this.parentElement.remove()" class="text-emerald-700 hover:text-emerald-900">✕</button>
        </div>
    @endif

    @if ($message = Session::get('error'))
        <div class="mb-6 flex items-start gap-3 rounded-xl border border-rose-100 bg-rose-50 px-4 py-3 text-rose-800 shadow-sm">
            <svg class="mt-0.5 h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
            </svg>
            <div class="flex-1">{{ $message }}</div>
            <button onclick="this.parentElement.remove()" class="text-rose-700 hover:text-rose-900">✕</button>
        </div>
    @endif

    <div class="overflow-hidden rounded-2xl border border-sky-100 bg-white shadow-xl shadow-sky-50/60">
        <div class="border-b border-sky-100 bg-gradient-to-r from-sky-50/50 to-teal-50/50 px-6 py-4">
            <h2 class="text-lg font-semibold text-sky-900">Daftar User <span class="text-sm font-normal text-slate-600">({{ $users->total() }} total)</span></h2>
        </div>

        @if($users->count() > 0)
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="border-b border-sky-100 bg-sky-50/70">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-sky-900">ID</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-sky-900">Nama</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-sky-900">Email</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-sky-900">Role</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-sky-900">Terdaftar</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-sky-900">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @foreach($users as $user)
                            <tr class="transition hover:bg-sky-50/30">
                                <td class="whitespace-nowrap px-6 py-4 text-sm font-semibold text-sky-800">
                                    #{{ $user->id }}
                                </td>
                                <td class="whitespace-nowrap px-6 py-4 text-sm text-slate-800">
                                    <div class="flex items-center gap-3">
                                        <div class="flex h-10 w-10 items-center justify-center rounded-full bg-gradient-to-r from-sky-500 to-teal-500 text-sm font-bold text-white shadow-md">
                                            {{ substr($user->name, 0, 1) }}
                                        </div>
                                        <span class="font-medium">{{ $user->name }}</span>
                                    </div>
                                </td>
                                <td class="whitespace-nowrap px-6 py-4 text-sm text-slate-600">
                                    {{ $user->email }}
                                </td>
                                <td class="whitespace-nowrap px-6 py-4 text-sm">
                                    <div class="flex flex-wrap gap-1">
                                        @foreach($user->roles as $role)
                                            <span class="inline-flex items-center rounded-full px-2.5 py-1 text-xs font-semibold @if($role->name === 'superadmin') bg-rose-50 text-rose-700 ring-1 ring-rose-100 @elseif($role->name === 'admin') bg-amber-50 text-amber-700 ring-1 ring-amber-100 @else bg-sky-50 text-sky-700 ring-1 ring-sky-100 @endif">
                                                {{ ucfirst($role->name) }}
                                            </span>
                                        @endforeach
                                    </div>
                                </td>
                                <td class="whitespace-nowrap px-6 py-4 text-sm text-slate-600">
                                    {{ $user->created_at->format('d/m/Y H:i') }}
                                </td>
                                <td class="whitespace-nowrap px-6 py-4 text-sm">
                                    <div class="flex items-center gap-3">
                                        <a href="{{ route('users.edit', $user->id) }}" class="font-medium text-sky-600 transition hover:text-sky-800">Edit</a>
                                        @if(auth()->user()->id !== $user->id)
                                            <button onclick="deleteUser({{ $user->id }})" class="font-medium text-rose-600 transition hover:text-rose-800">Hapus</button>
                                        @else
                                            <span class="text-slate-400">Hapus</span>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="border-t border-sky-100 bg-slate-50/50 px-6 py-4">
                {{ $users->links() }}
            </div>
        @else
            <div class="px-6 py-12 text-center">
                <svg class="mx-auto mb-4 h-16 w-16 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.856-1.487M15 10a3 3 0 11-6 0 3 3 0 016 0zM6 20h12v-2a9 9 0 00-18 0v2z"></path>
                </svg>
                <p class="mb-4 text-slate-600">Belum ada user terdaftar</p>
                <a href="{{ route('users.create') }}" class="font-medium text-sky-600 hover:text-sky-800">Tambah user pertama →</a>
            </div>
        @endif
    </div>
</x-master-layout>

<script>
function deleteUser(userId) {
    if (confirm('Apakah Anda yakin ingin menghapus user ini?')) {
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = `/users/${userId}`;
        form.innerHTML = `
            @csrf
            @method('DELETE')
        `;
        document.body.appendChild(form);
        form.submit();
    }
}
</script>
