<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    public function index(Request $request)
{
    $search = $request->search;

    $partners = Partner::when($search, function ($query) use ($search) {

        $query->where('name', 'LIKE', '%' . $search . '%');

    })->latest()->get();

    return view('admin.partners.index', compact('partners'));
}

public function create()
{
    return view('admin.partners.create');
}


public function edit(Partner $partner)
{
    return view('admin.partners.edit', compact('partner'));
}

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png'
        ]);

        $logoPath = null;

        if ($request->hasFile('logo')) {

            $logoPath = $request->file('logo')
                                ->store('partners', 'public');
        }

        Partner::create([
            'name' => $request->name,
            'logo' => $logoPath,
        ]);

        return redirect()
            ->route('admin.partners.index')
            ->with('success', 'Partner berhasil ditambahkan');
    }

   public function update(Request $request, Partner $partner)
{
    $request->validate([
        'name' => 'required',
        'logo' => 'nullable|image|mimes:jpg,jpeg,png'
    ]);

    $data = [
        'name' => $request->name,
    ];

    if ($request->hasFile('logo')) {

        $logoPath = $request->file('logo')
                            ->store('partners', 'public');

        $data['logo'] = $logoPath;
    }

    $partner->update($data);

    return redirect()
        ->route('admin.partners.index')
        ->with('success', 'Partner berhasil diupdate');
}

    public function destroy(Partner $partner)
    {
        $partner->delete();

        return redirect()->route('admin.partners.index')
            ->with('success', 'Partner berhasil dihapus');
    }
}