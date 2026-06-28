@extends('layouts.admin')
@section('title', 'Laporan Transaksi - Admin')
@section('page_title', 'Laporan Transaksi')
@section('page_subtitle', 'Pantau arus kas dan penjualan tiket Anda.')

@section('content')

<div class="grid md:grid-cols-3 gap-6 mb-8">

```
<div class="bg-gradient-to-r from-indigo-700 to-purple-600 text-white rounded-3xl p-6 shadow-xl">
    <p class="text-sm opacity-80">Total Transaksi</p>
    <h2 class="text-3xl font-black mt-2">{{ $transactions->count() }}</h2>
</div>

<div class="bg-gradient-to-r from-purple-600 to-pink-500 text-white rounded-3xl p-6 shadow-xl">
    <p class="text-sm opacity-80">Status Pending</p>
    <h2 class="text-3xl font-black mt-2">
        {{ $transactions->where('status','Pending')->count() }}
    </h2>
</div>

<div class="bg-gradient-to-r from-indigo-500 to-violet-500 text-white rounded-3xl p-6 shadow-xl">
    <p class="text-sm opacity-80">Total Pendapatan</p>
    <h2 class="text-2xl font-black mt-2">
        Rp {{ number_format($transactions->sum('total_price'),0,',','.') }}
    </h2>
</div>
```

</div>


        <div class="bg-white rounded-[2rem] border border-indigo-100 shadow-2xl overflow-hidden">
            <div class="px-8 py-6 bg-slate-50/50 border-b flex flex-wrap gap-4 items-center">
                <div class="flex-1 min-w-[300px] flex gap-2">
                    <input type="text" placeholder="Cari Order ID, Nama, atau Email..."
                        class="flex-1 px-5 py-3 rounded-xl border-slate-200 border bg-white focus:ring-2 focus:ring-indigo-500 outline-none transition uppercase text-sm font-medium tracking-wide">
                </div>
                
<form method="GET" action="{{ route('admin.transactions.index') }}" class="flex gap-2">

    <select
        name="status"
        onchange="this.form.submit()"
        class="px-5 py-3 rounded-xl border-slate-200 border bg-white outline-none text-sm font-bold">

        <option value="">Semua Status</option>

        <option value="Success" {{ request('status') == 'Success' ? 'selected' : '' }}>
            Success
        </option>

        <option value="Pending" {{ request('status') == 'Pending' ? 'selected' : '' }}>
            Pending
        </option>

        <option value="Expired" {{ request('status') == 'Expired' ? 'selected' : '' }}>
            Expired
        </option>

    </select>

    <select
        class="px-5 py-3 rounded-xl border-slate-200 border bg-white outline-none text-sm font-bold">
        <option>Bulan Ini</option>
        <option>Bulan Lalu</option>
        <option>Tahun 2024</option>
    </select>

</form>

            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead class="bg-gradient-to-r from-indigo-700 via-purple-600 to-indigo-500 text-white uppercase text-[10px] font-black tracking-widest">
                        <tr>
                            <th class="px-8 py-4">Order ID</th>
                            <th class="px-8 py-4">Detail Pembeli</th>
                            <th class="px-8 py-4">Event</th>
                            <th class="px-8 py-4">Tgl Transaksi</th>
                            <th class="px-8 py-4">Status</th>
                            <th class="px-8 py-4 text-right">Total Tagihan</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-indigo-100">

@foreach($transactions as $transaction)

<tr class="hover:bg-indigo-50 transition-all duration-300">

```
<td class="px-8 py-6">
    <span class="font-mono font-bold text-indigo-700 bg-indigo-100 px-3 py-2 rounded-xl text-sm shadow-sm">
        {{ $transaction->order_id }}
    </span>
</td>

<td class="px-8 py-6">
    <p class="font-bold text-slate-800">
        {{ $transaction->customer_name }}
    </p>

    <p class="text-xs text-slate-500">
        {{ $transaction->customer_email }}
    </p>
</td>

<td class="px-8 py-6">
    <p class="font-semibold text-slate-700">
        {{ $transaction->event->title ?? '-' }}
    </p>
</td>

<td class="px-8 py-6 text-sm text-slate-500">
    {{ $transaction->created_at->format('d M Y H:i') }}
</td>

<td class="px-8 py-6">

    @if($transaction->status == 'Success')
        <span class="px-4 py-2 bg-green-100 text-green-700 rounded-full text-xs font-bold">
            Success
        </span>

    @elseif($transaction->status == 'Pending')
        <span class="px-4 py-2 bg-yellow-100 text-yellow-700 rounded-full text-xs font-bold">
            Pending
        </span>

    @else
        <span class="px-4 py-2 bg-slate-100 text-slate-600 rounded-full text-xs font-bold">
            {{ $transaction->status }}
        </span>
    @endif

</td>

<td class="px-8 py-6 text-right">
    <span class="text-lg font-black text-indigo-700">
        Rp {{ number_format($transaction->total_price,0,',','.') }}
    </span>
</td>
```

</tr>

@endforeach

</tbody>

                </table>
            </div>

            <div class="px-8 py-6 bg-slate-50/50 border-t flex justify-between items-center">
                <p class="text-sm text-slate-500 font-medium">Menampilkan 3 dari 124 transaksi</p>
                <div class="flex gap-2">
                    <button
                        class="px-4 py-2 border rounded-xl hover:bg-white transition text-sm font-bold opacity-50 cursor-not-allowed">Previous</button>
                    <button class="px-4 py-2 bg-indigo-600 text-white rounded-xl shadow-md text-sm font-bold">1</button>
                    <button class="px-4 py-2 border rounded-xl hover:bg-white transition text-sm font-bold">2</button>
                    <button
                        class="px-4 py-2 border rounded-xl hover:bg-white transition text-sm font-bold">Next</button>
                </div>
            </div>
        </div>
@endsection