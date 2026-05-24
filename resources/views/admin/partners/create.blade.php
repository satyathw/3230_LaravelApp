@extends('layouts.admin')

@section('page_title', 'Tambah Partner')

@section('content')

<div class="bg-white p-8 rounded-3xl shadow max-w-2xl">

    <form action="{{ route('admin.partners.store') }}"
      method="POST"
      enctype="multipart/form-data">

        @csrf

        <div class="mb-4">
            <label>Nama Partner</label>

            <input type="text"
                   name="name"
                   class="w-full border rounded-xl px-4 py-3">
        </div>

        <div class="mb-4">
            <label>Logo URL</label>

            <input type="file"
            name="logo"
            class="w-full border rounded-xl px-4 py-3">
        </div>

        <button type="submit"
                class="bg-indigo-600 text-white px-6 py-3 rounded-xl">
            Simpan
        </button>

    </form>

</div>

@endsection