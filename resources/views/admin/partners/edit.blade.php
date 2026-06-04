@extends('layouts.admin')

@section('page_title', 'Edit Partner')

@section('content')

<div class="bg-white p-8 rounded-3xl shadow max-w-2xl">

    <form action="{{ route('admin.partners.update', $partner->id) }}"
      method="POST">

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

    <label class="block mb-2 font-semibold">
        Logo URL
    </label>

    <input type="text"
           name="logo"
           value="{{ $partner->logo }}"
           placeholder="https://..."
           class="w-full border rounded-xl px-4 py-3">

</div>

        <button type="submit"
                class="bg-yellow-500 text-white px-6 py-3 rounded-xl">
            Update
        </button>

    </form>

</div>

@endsection