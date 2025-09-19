@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Arsip Surat >> Edit / Ganti File</h2>

    {{-- Pesan Error --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('arsip.update', $arsip->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nomor_surat">Nomor Surat</label>
            <input type="text" name="nomor_surat" class="form-control" 
                   value="{{ old('nomor_surat', $arsip->nomor_surat) }}" required>
        </div>

        <div class="mb-3">
            <label for="kategori_id">Kategori Surat</label>
            <select name="kategori_id" id="kategori_id" class="form-control" required>
                @foreach($kategori as $item)
                    <option value="{{ $item->id }}" {{ $arsip->kategori_id == $item->id ? 'selected' : '' }}>
                        {{ $item->nama_kategori }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="judul">Judul</label>
            <input type="text" name="judul" class="form-control" 
                   value="{{ old('judul', $arsip->judul) }}" required>
        </div>

        <div class="mb-3">
            <label for="file_surat">File Surat (PDF)</label> <br>
            @if($arsip->file_surat)
                <p>File lama: <a href="{{ asset('storage/'.$arsip->file_surat) }}" target="_blank">Lihat PDF</a></p>
            @endif
            <input type="file" name="file_surat" class="form-control" accept="application/pdf">
            <small class="text-muted">Kosongkan jika tidak ingin ganti file</small>
        </div>

        <a href="{{ route('arsip.index') }}" class="btn btn-secondary">Kembali</a>
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
</div>
@endsection
