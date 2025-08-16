@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Daftar Kategori Items</h3>

    {{-- Filter Form --}}
    <form method="GET" action="{{ route('kategori-items.index') }}" class="mb-3">
        <div class="row">
            <div class="col-md-4">
                <input type="text" name="kode" class="form-control" placeholder="Kode Kategori" value="{{ request('kode') }}">
            </div>
            <div class="col-md-4">
                <input type="text" name="nama" class="form-control" placeholder="Nama Kategori" value="{{ request('nama') }}">
            </div>
            <div class="col-md-4">
                <button class="btn btn-primary">Filter</button>
                <a href="{{ route('kategori-items.create') }}" class="btn btn-success">Tambah Kategori</a>
            </div>
        </div>
    </form>

    {{-- Tabel Data --}}
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Kode</th>
                <th>Nama</th>
                <th width="200px">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($kategori as $item)
            <tr>
                <td>{{ $item->kode }}</td>
                <td>{{ $item->nama }}</td>
                <td>
                    <a href="{{ route('kategori-items.show', $item->id) }}" class="btn btn-info btn-sm">View</a>
                    <a href="{{ route('kategori-items.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('kategori-items.destroy', $item->id) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="3" class="text-center">Belum ada kategori</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    {{-- Pagination jika ada --}}
    @if(method_exists($kategori, 'links'))
        <div class="d-flex justify-content-center">
            {{ $kategori->links() }}
        </div>
    @endif
</div>
@endsection