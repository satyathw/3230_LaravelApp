<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use App\Models\Transaction;

class EventController extends Controller
{
    function index(){
    
    }

    public function store(Request $request)
{
    // Validasi data yang dikirim pengguna
    $data = $request->validate([
        'category_id' => 'required|exists:categories,id',
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'date' => 'required|date',
        'location' => 'required|string|max:255',
        'price' => 'required|numeric|min:0',
        'stock' => 'required|numeric|min:1',
        'poster' => 'nullable|image|max:2048'
    ]);
    

    // Simpan file gambar ke storage
    if ($request->hasFile('poster')) {
        $data['poster_path'] = $request->file('poster')
                                      ->store('posters', 'public');
    }

    // Simpan data event ke database
    Event::create($data);

    return redirect()
        ->route('admin.events.index')
        ->with('success', 'Data Event berhasil ditambahkan.');
}
public function show(\App\Models\Event $event)
{
   // Mengambil daftar kategori untuk keperluan menu footer
    $categories = \App\Models\Category::all();
    
    // Me-render view dengan membawa data kategori dan data spesifik acara tersebut
    return view('event-detail', compact('categories', 'event'));
}


    function checkout(){
        return view('checkout');
    }

    function ticket(Transaction $transaction)
{
    return view('ticket', compact('transaction'));
}
}
