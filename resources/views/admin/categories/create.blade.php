@extends('layouts.admin')

@section('content')

<div class="bg-white p-6 rounded-3xl shadow max-w-xl">

    <h1 class="text-2xl font-bold mb-6">
        Tambah Kategori
    </h1>

    <form action="{{ route('admin.categories.store') }}" method="POST">

        @csrf

        <div class="mb-4">

            <label class="block mb-2 font-semibold">
                Nama Kategori
            </label>

            <input type="text"
                   name="name"
                   class="w-full border rounded-xl px-4 py-3">

        </div>

        <button type="submit"
                class="bg-indigo-600 text-white px-6 py-3 rounded-xl">

            Simpan

        </button>

    </form>

</div>

@endsection