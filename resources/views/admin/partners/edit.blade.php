@extends('layouts.admin')

@section('page_title', 'Edit Partner')

@section('content')

<div class="bg-white p-8 rounded-3xl shadow max-w-2xl">

    <form action="{{ route('admin.partners.update', $partner->id) }}"
          method="POST" enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <div class="mb-4">
            <label>Nama Partner</label>

            <input type="text"
                   name="name"
                   value="{{ $partner->name }}"
                   class="w-full border rounded-xl px-4 py-3">
        </div>

        <div class="mb-4">

            <label>Upload Logo</label>

<input type="file"
       name="logo"
       class="w-full border rounded-xl px-4 py-3">
        </div>

        <button type="submit"
                class="bg-yellow-500 text-white px-6 py-3 rounded-xl">
            Update
        </button>

    </form>

</div>

@endsection