<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    public function index()
    {
        $jabatans = Jabatan::all();

        return view('admin.jabatan.index', compact('jabatans'));
    }

    public function create()
    {
        return view('admin.jabatan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        Jabatan::create([
            'name' => $request->name,
            'created_by' => 'admin'
        ]);

        return redirect()->route('admin.jabatan.index');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $jabatan = Jabatan::findOrFail($id);

        return view('admin.jabatan.edit', compact('jabatan'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $jabatan = Jabatan::findOrFail($id);

        $jabatan->update([
            'name' => $request->name,
            'updated_by' => 'admin'
        ]);

        return redirect()->route('admin.jabatan.index');
    }

    public function destroy(string $id)
    {
        Jabatan::destroy($id);

        return redirect()->route('admin.jabatan.index')
                         ->with('success', 'Data berhasil dihapus.');
    }
}