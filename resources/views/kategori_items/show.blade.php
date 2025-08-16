{{-- filepath: resources/views/kategori_items/show.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Detail Kategori Item</h3>
    <div class="mb-3">
        <strong>Kode:</strong> {{ $kategori->kode }} <br>
        <strong>Nama:</strong> {{ $kategori->nama }}
    </div>
    <h5>Daftar Master Items dengan kategori ini:</h5>
    <ul>
        @forelse($kategori->masterItems as $item)
            <li>{{ $item->nama }} ({{ $item->kode }})</li>
        @empty
            <li>Tidak ada item.</li>
        @endforelse
    </ul>
    <a href="{{ route('kategori-items.index') }}" class