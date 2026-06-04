@extends('layouts.admin')

@section('page_title', 'Tambah Partner')

@section('content')

<div class="bg-white p-8 rounded-3xl shadow max-w-2xl">

    <form action="{{ route('admin.partners.store') }}"
      method="POST"
    
        @csrf

        <div class="mb-4">
            <label>Nama Partner</label>

            <input type="text"
                   name="name"
                   class="w-full border rounded-xl px-4 py-3">
        </div>

        <div>
            <label class="block text-sm font-bold text-slate-700 mb-2 uppercase tracking-wide">
                Logo URL
            </label>

            <input type="text"
                   name="logo"
                   value="{{ old('logo') }}"
                   class="w-full px-5 py-4 bg-slate-50 border-2 border-slate-100 rounded-2xl
                          focus:ring-4 focus:ring-indigo-500/10 focus:border-indigo-600
                          outline-none transition font-medium"
                   placeholder="https://example.com/logo.png">

            @error('logo')
                <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit"
                class="bg-indigo-600 text-white px-6 py-3 rounded-xl">
            Simpan
        </button>

    </form>

</div>

@endsection