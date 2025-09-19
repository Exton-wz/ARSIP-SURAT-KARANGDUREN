@extends('layouts.app')

@section('content')
<div class="container">
    <h2>{{ isset($kategori) ? 'Edit Kategori Surat' : 'Tambah Kategori Surat' }}</h2>

    <form action="{{ isset($kategori) ? route('kategori.update', $kategori->id) : route('kategori.store') }}" method="POST">
        @csrf
        @if(isset($kategori))
            @method('PUT')
        @endif

        <div class="mb-3">
            <label for="nama_kategori" class="form-label">Nama Kategori</label>
            <input type="text" class="form-control" id="nama_kategori" name="nama_kategori"
                   value="{{ old('nama_kategori', $kategori->nama_kategori ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Keterangan / Deskripsi</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3">{{ old('deskripsi', $kategori->deskripsi ?? '') }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('kategori.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
