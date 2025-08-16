{{-- filepath: resources/views/kategori_items/create.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Tambah Kategori Item</h3>
    <form method="POST" action="{{ route('kategori-items.store') }}">
        @csrf
        <div class="form-group mb-2">
            <label>Kode</label>
            <input type="text" name="kode" class="form-control" required>
        </div>
        <div class="form-group mb-2">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" required>
        </div>
        <button class="btn btn-primary">Simpan</button>
        <a href="{{ route('kategori-items.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection