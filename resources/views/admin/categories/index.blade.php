@extends('layouts.admin')

@section('page_title', 'Kelola Kategori')
@section('page_subtitle', 'Manajemen data kategori event')

@section('content')

<div class="bg-white p-6 rounded-3xl shadow">

    {{-- BUTTON TAMBAH --}}
    <div class="mb-6">

        <a href="{{ route('admin.categories.create') }}"
           class="bg-indigo-600 text-white px-6 py-3 rounded-xl inline-block">

            Tambah Kategori

        </a>

    </div>

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

                    <td class="p-4">
                        {{ $category->id }}
                    </td>

                    <td class="p-4">
                        {{ $category->name }}
                    </td>

                    <td class="p-4">
                        {{ $category->created_at }}
                    </td>

                    <td class="p-4">
                        {{ $category->updated_at }}
                    </td>

                    <td class="p-4">

                        <div class="flex gap-2">

                            {{-- EDIT --}}
                            <a href="{{ route('admin.categories.edit', $category->id) }}"
                               class="bg-yellow-500 text-white px-4 py-2 rounded-lg">

                                Edit

                            </a>

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