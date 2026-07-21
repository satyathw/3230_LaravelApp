@extends('layouts.admin')

@section('page_title','Tambah Pengurus')
@section('page_subtitle','Tambah data pengurus')

@section('content')

<div class="bg-white p-6 rounded-3xl shadow">

<form action="{{ route('admin.pengurus.store') }}" method="POST">

@csrf

<label>Jabatan</label>

<select name="jabatan_id" class="w-full border rounded-xl p-3 mb-4">

@foreach($jabatans as $jabatan)

<option value="{{ $jabatan->id }}">

{{ $jabatan->name }}

</option>

@endforeach

</select>

<label>Nama Pengurus</label>

<input type="text"
name="name"
class="w-full border rounded-xl p-3 mb-4">

<label>Deskripsi</label>

<input type="text"
name="description"
class="w-full border rounded-xl p-3 mb-4">

<label>Gaji</label>

<input type="number"
name="salary"
class="w-full border rounded-xl p-3 mb-4">

<button class="bg-indigo-600 text-white px-6 py-3 rounded-xl">

Simpan

</button>

<a href="{{ route('admin.pengurus.index') }}"
class="bg-gray-500 text-white px-6 py-3 rounded-xl">

Kembali

</a>

</form>

</div>

@endsection