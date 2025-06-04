@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Dashboard Taufiq</h1>
    <p>Selamat datang di aplikasi warung</p>
    <a href="{{ route('barang.index') }}" class="btn btn-primary">Menu Inventaris Warung</a>
</div>
@endsection
