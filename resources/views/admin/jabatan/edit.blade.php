@extends('layouts.admin')

@section('page_title','Edit Jabatan')
@section('page_subtitle','Edit data jabatan')

@section('content')

<div class="bg-white p-6 rounded-3xl shadow">

<form action="{{ route('admin.jabatan.update',$jabatan->id) }}" method="POST">

@csrf
@method('PUT')

<label>Nama Jabatan</label>

<input type="text"
       name="name"
       value="{{ $jabatan->name }}"
       class="border rounded-xl w-full p-3">

<br><br>

<button class="bg-yellow-500 text-white px-5 py-2 rounded-xl">

Update

</button>

<a href="{{ route('admin.jabatan.index') }}"
class="bg-gray-500 text-white px-5 py-2 rounded-xl">

Kembali

</a>

</form>

</div>

@endsection