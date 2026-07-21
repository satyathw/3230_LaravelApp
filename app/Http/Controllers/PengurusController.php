<?php

namespace App\Http\Controllers;

use App\Models\Pengurus;
use App\Models\Jabatan;
use Illuminate\Http\Request;

class PengurusController extends Controller
{
    public function index()
    {
        $penguruses = Pengurus::with('jabatan')->get();

        return view('admin.pengurus.index', compact('penguruses'));
    }

    public function create()
    {
        $jabatans = Jabatan::all();

        return view('admin.pengurus.create', compact('jabatans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'jabatan_id' => 'required',
            'name' => 'required',
            'description' => 'required',
            'salary' => 'required|numeric',
        ]);

        Pengurus::create([
            'jabatan_id' => $request->jabatan_id,
            'name' => $request->name,
            'description' => $request->description,
            'salary' => $request->salary,
            'created_by' => 'admin',
        ]);

        return redirect()->route('admin.pengurus.index')
                         ->with('success', 'Data berhasil ditambahkan.');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $pengurus = Pengurus::findOrFail($id);
        $jabatans = Jabatan::all();

        return view('admin.pengurus.edit', compact('pengurus', 'jabatans'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'jabatan_id' => 'required',
            'name' => 'required',
            'description' => 'required',
            'salary' => 'required|numeric',
        ]);

        $pengurus = Pengurus::findOrFail($id);

        $pengurus->update([
            'jabatan_id' => $request->jabatan_id,
            'name' => $request->name,
            'description' => $request->description,
            'salary' => $request->salary,
            'updated_by' => 'admin',
        ]);

        return redirect()->route('admin.pengurus.index')
                         ->with('success', 'Data berhasil diupdate.');
    }

    public function destroy(string $id)
    {
        Pengurus::destroy($id);

        return redirect()->route('admin.pengurus.index')
                         ->with('success', 'Data berhasil dihapus.');
    }
}