{{-- filepath: resources/views/kategori_items/edit.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Edit Kategori Item</h3>
    <form method="POST" action="{{ route('kategori-items.update', $kategori->id) }}">
        @csrf
        @method('PUT')
        <div class="form-group mb-2">
            <label>Kode</label>
            <input type="text" name="kode" class="form-control" value="{{ $kategori->kode }}" required>
        </div>
        <div class="form-group mb-2">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" value="{{ $kategori->nama }}" required>
        </div>
        <button class="btn btn-primary">Update</button>
        <a href="{{ route('kategori-items.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection