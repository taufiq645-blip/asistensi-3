@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Barang</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $barang->nama }}</h5>
            <h6 class="card-subtitle mb-2 text-muted">Kode: {{ $barang->kode }}</h6>
            <p class="card-text">Stok: {{ $barang->stok }}</p>
            <p class="card-text">Lokasi: {{ $barang->lokasi }}</p>
            <p class="card-text">Keterangan: {{ $barang->keterangan }}</p>
            <a href="{{ route('barang.edit', $barang) }}" class="btn btn-warning">Edit</a>
            <a href="{{ route('barang.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection
