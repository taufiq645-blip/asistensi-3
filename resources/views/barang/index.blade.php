@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Warung</h1>
    <a href="{{ route('barang.create') }}" class="btn btn-primary mb-3">Tambah Barang</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <form method="GET" action="{{ url('barang') }}" class="row g-3 mb-3">
        <div class="col-md-3">
            <input type="text" name="search" class="form-control" placeholder="Cari nama, kode, lokasi" value="{{ request('search') }}">
        </div>
        <div class="col-md-2">
            <select name="lokasi" class="form-control">
                <option value="">-- Lokasi --</option>
                @foreach($lokasiList as $lokasi)
                    <option value="{{ $lokasi }}" {{ request('lokasi') == $lokasi ? 'selected' : '' }}>{{ $lokasi }}</option>
                @endforeach
            </select>
        </div>
        @if(isset($kategoriList))
        <div class="col-md-2">
            <select name="kategori" class="form-control">
                <option value="">-- Kategori --</option>
                @foreach($kategoriList as $kategori)
                    <option value="{{ $kategori }}" {{ request('kategori') == $kategori ? 'selected' : '' }}>{{ $kategori }}</option>
                @endforeach
            </select>
        </div>
        @endif
        <div class="col-md-2">
            <select name="stok_kosong" class="form-control">
                <option value="">-- Semua Stok --</option>
                <option value="1" {{ request('stok_kosong') == '1' ? 'selected' : '' }}>Stok Kosong</option>
            </select>
        </div>
        <div class="col-md-2">
            <select name="sort" class="form-control">
                <option value="id" {{ request('sort') == 'id' ? 'selected' : '' }}>Urutkan: ID</option>
                <option value="nama" {{ request('sort') == 'nama' ? 'selected' : '' }}>Nama</option>
                <option value="kode" {{ request('sort') == 'kode' ? 'selected' : '' }}>Kode</option>
                <option value="stok" {{ request('sort') == 'stok' ? 'selected' : '' }}>Stok</option>
            </select>
        </div>
        <div class="col-md-1">
            <select name="order" class="form-control">
                <option value="asc" {{ request('order') == 'asc' ? 'selected' : '' }}>Asc</option>
                <option value="desc" {{ request('order') == 'desc' ? 'selected' : '' }}>Desc</option>
            </select>
        </div>
        <div class="col-md-1">
            <button type="submit" class="btn btn-secondary w-100">Filter</button>
        </div>
    </form>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Kode</th>
                <th>Stok</th>
                <th>Lokasi</th>
                <th>Keterangan</th>
                <th>Kategori</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($barangs as $barang)
            <tr>
                <td>{{ $barang->id }}</td>
                <td>{{ $barang->nama }}</td>
                <td>{{ $barang->kode }}</td>
                <td>{{ $barang->stok }}</td>
                <td>{{ $barang->lokasi }}</td>
                <td>{{ $barang->keterangan }}</td>
                <td>{{ isset($barang->kategori) ? $barang->kategori : '-' }}</td>
                <td>
                    <a href="{{ route('barang.show', $barang) }}" class="btn btn-info btn-sm">Lihat</a>
                    <a href="{{ route('barang.edit', $barang) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('barang.destroy', $barang) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div>
        {{ $barangs->withQueryString()->links() }}
    </div>
</div>
@endsection
