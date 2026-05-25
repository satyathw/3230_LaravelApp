@extends('layouts.admin')

@section('content')

<div class="bg-white p-6 rounded-3xl shadow max-w-xl">

    <h1 class="text-2xl font-bold mb-6">
        Edit Kategori
    </h1>

    <form action="{{ route('admin.categories.update', $category->id) }}"
          method="POST">

        @csrf
        @method('PUT')

        <div class="mb-4">

            <label class="block mb-2 font-semibold">
                Nama Kategori
            </label>

            <input type="text"
                   name="name"
                   value="{{ $category->name }}"
                   class="w-full border rounded-xl px-4 py-3">

        </div>

        <button type="submit"
                class="bg-yellow-500 text-white px-6 py-3 rounded-xl">

            Update

        </button>

    </form>

</div>

@endsection