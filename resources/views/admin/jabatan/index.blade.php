@extends('layouts.admin')

@section('page_title', 'Kelola Jabatan')
@section('page_subtitle', 'Manajemen data jabatan')

@section('content')

<div class="bg-white p-6 rounded-3xl shadow">

    <div class="mb-6">
        <a href="{{ route('admin.jabatan.create') }}"
           class="bg-indigo-600 text-white px-6 py-3 rounded-xl">

            Tambah Jabatan

        </a>
    </div>

    <div class="overflow-x-auto">

        <table class="w-full">

            <thead class="bg-slate-100">

                <tr>
                    <th class="p-4">ID</th>
                    <th class="p-4">Nama Jabatan</th>
                    <th class="p-4">Created At</th>
                    <th class="p-4">Updated At</th>
                    <th class="p-4">Aksi</th>
                </tr>

            </thead>

            <tbody>

                @forelse($jabatans as $jabatan)

                <tr class="border-b">

                    <td class="p-4">{{ $jabatan->id }}</td>

                    <td class="p-4">{{ $jabatan->name }}</td>

                    <td class="p-4">{{ $jabatan->created_at }}</td>

                    <td class="p-4">{{ $jabatan->updated_at }}</td>

                    <td class="p-4">

                        <div class="flex gap-2">

                            <a href="{{ route('admin.jabatan.edit', $jabatan->id) }}"
                               class="bg-yellow-500 text-white px-4 py-2 rounded-lg">

                                Edit

                            </a>

                            <form action="{{ route('admin.jabatan.destroy', $jabatan->id) }}"
                                  method="POST">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        onclick="return confirm('Yakin hapus?')"
                                        class="bg-red-500 text-white px-4 py-2 rounded-lg">

                                    Hapus

                                </button>

                            </form>

                        </div>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="5" class="text-center p-6">

                        Belum ada data jabatan

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection