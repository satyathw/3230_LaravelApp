@extends('layouts.admin')

@section('page_title','Tambah Jabatan')
@section('page_subtitle','Tambah data jabatan')

@section('content')

<div class="bg-white p-6 rounded-3xl shadow">

<form action="{{ route('admin.jabatan.store') }}" method="POST">

@csrf

<label>Nama Jabatan</label>

<input type="text"
       name="name"
       class="border rounded-xl w-full p-3">

<br><br>

<button class="bg-indigo-600 text-white px-5 py-2 rounded-xl">

Simpan

</button>

<a href="{{ route('admin.jabatan.index') }}"
class="bg-gray-500 text-white px-5 py-2 rounded-xl">

Kembali

</a>

</form>

</div>

@endsection