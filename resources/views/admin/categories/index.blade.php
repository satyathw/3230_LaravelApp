@extends('layouts.admin')

@section('page_title', 'Kelola Kategori')
@section('page_subtitle', 'Manajemen data kategori event')

@section('content')

<div class="bg-white p-6 rounded-3xl shadow">

    {{-- FORM TAMBAH --}}
    <form action="{{ route('admin.categories.store') }}" method="POST" class="mb-6">
        @csrf

        <div class="flex gap-4">
            <input type="text"
                   name="name"
                   placeholder="Masukkan nama kategori"
                   class="w-full border rounded-xl px-4 py-3">

            <button type="submit"
                    class="bg-indigo-600 text-white px-6 py-3 rounded-xl">
                Tambah
            </button>
        </div>
    </form>


    {{-- SEARCH --}}
<div class="mb-4 flex justify-between">

    <form action="{{ route('admin.categories.index') }}"
          method="GET"
          class="flex gap-2">

        <input type="text"
               name="search"
               placeholder="Cari kategori..."
               value="{{ request('search') }}"
               class="border px-4 py-2 rounded-xl">

        <button type="submit"
                class="bg-indigo-600 text-white px-4 py-2 rounded-xl">
            Search
        </button>

    </form>

</div>


    {{-- TABEL --}}
    <div class="overflow-x-auto">

        <table class="w-full">

            <thead class="bg-slate-100">
                <tr>
                    <th class="p-4">ID</th>
                    <th class="p-4">Nama</th>
                    <th class="p-4">Created At</th>
                    <th class="p-4">Updated At</th>
                    <th class="p-4">Aksi</th>
                </tr>
            </thead>

            <tbody>

                @forelse($categories as $category)

                <tr class="border-b">

                    <td class="p-4">{{ $category->id }}</td>

                    <td class="p-4">

                        {{-- FORM EDIT --}}
                        <form action="{{ route('admin.categories.update', $category->id) }}"
                              method="POST"
                              class="flex gap-2">

                            @csrf
                            @method('PUT')

                            <input type="text"
                                   name="name"
                                   value="{{ $category->name }}"
                                   class="border rounded-lg px-3 py-2 w-full">

                    </td>

                    <td class="p-4">
                        {{ $category->created_at }}
                    </td>

                    <td class="p-4">
                        {{ $category->updated_at }}
                    </td>

                    <td class="p-4">

                            <div class="flex gap-2">

                                <button type="submit"
                                        class="bg-yellow-500 text-white px-4 py-2 rounded-lg">
                                    Edit
                                </button>

                        </form>

                        {{-- DELETE --}}
                        <form action="{{ route('admin.categories.destroy', $category->id) }}"
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
                        Belum ada kategori
                    </td>
                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection