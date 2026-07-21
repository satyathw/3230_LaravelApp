@extends('layouts.admin')

@section('page_title','Kelola Pengurus')
@section('page_subtitle','Manajemen data pengurus')

@section('content')

<div class="bg-white p-6 rounded-3xl shadow">

    <div class="mb-6">
        <a href="{{ route('admin.pengurus.create') }}"
           class="bg-indigo-600 text-white px-6 py-3 rounded-xl">

            Tambah Pengurus

        </a>
    </div>

    <div class="overflow-x-auto">

        <table class="w-full">

            <thead class="bg-slate-100">

                <tr>
                    <th class="p-4">ID</th>
                    <th class="p-4">Jabatan</th>
                    <th class="p-4">Nama</th>
                    <th class="p-4">Deskripsi</th>
                    <th class="p-4">Gaji</th>
                    <th class="p-4">Aksi</th>
                </tr>

            </thead>

            <tbody>

            @forelse($penguruses as $pengurus)

                <tr class="border-b">

                    <td class="p-4">{{ $pengurus->id }}</td>

                    <td class="p-4">{{ $pengurus->jabatan->name }}</td>

                    <td class="p-4">{{ $pengurus->name }}</td>

                    <td class="p-4">{{ $pengurus->description }}</td>

                    <td class="p-4">Rp {{ number_format($pengurus->salary,0,',','.') }}</td>

                    <td class="p-4">

                        <div class="flex gap-2">

                            <a href="{{ route('admin.pengurus.edit',$pengurus->id) }}"
                               class="bg-yellow-500 text-white px-4 py-2 rounded-lg">

                                Edit

                            </a>

                            <form action="{{ route('admin.pengurus.destroy',$pengurus->id) }}"
                                  method="POST">

                                @csrf
                                @method('DELETE')

                                <button class="bg-red-500 text-white px-4 py-2 rounded-lg">

                                    Hapus

                                </button>

                            </form>

                        </div>

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="6" class="text-center p-6">

                        Belum ada data pengurus

                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection