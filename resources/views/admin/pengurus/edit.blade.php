@extends('layouts.admin')

@section('page_title','Edit Pengurus')
@section('page_subtitle','Edit data pengurus')

@section('content')

<div class="bg-white p-6 rounded-3xl shadow">

<form action="{{ route('admin.pengurus.update',$pengurus->id) }}" method="POST">

@csrf
@method('PUT')

<label>Jabatan</label>

<select name="jabatan_id" class="w-full border rounded-xl p-3 mb-4">

@foreach($jabatans as $jabatan)

<option value="{{ $jabatan->id }}"
{{ $pengurus->jabatan_id==$jabatan->id ? 'selected' : '' }}>

{{ $jabatan->name }}

</option>

@endforeach

</select>

<label>Nama Pengurus</label>

<input type="text"
name="name"
value="{{ $pengurus->name }}"
class="w-full border rounded-xl p-3 mb-4">

<label>Deskripsi</label>

<input type="text"
name="description"
value="{{ $pengurus->description }}"
class="w-full border rounded-xl p-3 mb-4">

<label>Gaji</label>

<input type="number"
name="salary"
value="{{ $pengurus->salary }}"
class="w-full border rounded-xl p-3 mb-4">

<button class="bg-yellow-500 text-white px-6 py-3 rounded-xl">

Update

</button>

<a href="{{ route('admin.pengurus.index') }}"
class="bg-gray-500 text-white px-6 py-3 rounded-xl">

Kembali

</a>

</form>

</div>

@endsection