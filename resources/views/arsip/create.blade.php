@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Arsip Surat >> Unggah</h2>
    <p>Unggah surat yang telah terbit pada form ini untuk diarsipkan.<br>
       <b>Catatan:</b> Gunakan file berformat PDF</p>

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

    <form action="{{ route('arsip.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="nomor_surat">Nomor Surat</label>
            <input type="text" name="nomor_surat" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="kategori_id">Kategori Surat</label>
            <select name="kategori_id" id="kategori_id" class="form-control" required>
                <option value="">-- Pilih Kategori --</option>
                @foreach($kategori as $item)
                    <option value="{{ $item->id }}">{{ $item->nama_kategori }}</option>
                @endforeach
            </select>
        </div>


        <div class="mb-3">
            <label for="judul">Judul</label>
            <input type="text" name="judul" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="file_surat">File Surat (PDF)</label>
            <input type="file" name="file_surat" class="form-control" accept="application/pdf" required>
        </div>

        <a href="{{ route('arsip.index') }}" class="btn btn-secondary">Kembali</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
