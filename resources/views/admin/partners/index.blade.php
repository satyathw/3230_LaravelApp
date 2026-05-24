@extends('layouts.admin')

@section('page_title', 'Kelola Partner')
@section('page_subtitle', 'Daftar partner aplikasi')

@section('content')

<div class="mb-4 text-right">
    <a href="{{ route('admin.partners.create') }}"
       class="bg-indigo-600 text-white px-5 py-3 rounded-xl">
        + Tambah Partner
    </a>
</div>

<div class="bg-white rounded-3xl shadow overflow-hidden">


    <div class="mb-4 flex justify-between">

    <form action="{{ route('admin.partners.index') }}"
          method="GET"
          class="flex gap-2">

        <input type="text"
               name="search"
               placeholder="Cari partner..."
               value="{{ request('search') }}"
               class="border px-4 py-2 rounded-xl">

        <button type="submit"
                class="bg-indigo-600 text-white px-4 py-2 rounded-xl">
            Search
        </button>

    </form>

</div>

    <table class="w-full">

        <thead class="bg-slate-100">
            <tr>
                <th class="p-4">ID</th>
                <th class="p-4">Logo</th>
                <th class="p-4">Nama</th>
                <th class="p-4">Created At</th>
                <th class="p-4">Updated At</th>
                <th class="p-4">Aksi</th>
            </tr>
        </thead>

        <tbody>

            @forelse($partners as $partner)

            <tr class="border-b">

                <td class="p-4">{{ $partner->id }}</td>

                <td class="p-4">

    @if($partner->logo)

        <img src="{{ asset('storage/' . $partner->logo) }}"
             class="w-16 h-16 object-contain rounded-lg">

    @else

        -

    @endif

</td>

                <td class="p-4">
                    {{ $partner->name }}
                </td>

                <td class="p-4">
                    {{ $partner->created_at }}
                </td>

                <td class="p-4">
                    {{ $partner->updated_at }}
                </td>

                <td class="p-4">

                    <div class="flex gap-2">

                        <a href="{{ route('admin.partners.edit', $partner->id) }}"
                           class="bg-yellow-500 text-white px-4 py-2 rounded-lg">
                            Edit
                        </a>

                        <form action="{{ route('admin.partners.destroy', $partner->id) }}"
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
                <td colspan="6" class="text-center p-6">
                    Belum ada partner
                </td>
            </tr>

            @endforelse

        </tbody>

    </table>

</div>

@endsection