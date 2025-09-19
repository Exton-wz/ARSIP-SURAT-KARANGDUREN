@extends('layouts.app')

@section('content')
<h2>Arsip Surat >> Lihat</h2>
<p>
    Nomor: {{ $arsip->nomor_surat }} <br>
    Kategori: {{ $arsip->kategori->nama_kategori ?? '-' }} <br>
    Judul: {{ $arsip->judul }} <br>
    Waktu Unggah: {{ $arsip->waktu_pengarsipan }}
</p>

<iframe src="{{ asset('storage/' . $arsip->file_surat) }}" width="100%" height="600px"></iframe>

<div class="mt-3">
    <a href="{{ route('arsip.index') }}" class="btn btn-secondary">&lt;&lt; Kembali</a>
    <a href="{{ route('arsip.download',$arsip->id) }}" class="btn btn-warning">Unduh</a>
    <a href="{{ route('arsip.edit',$arsip->id) }}" class="btn btn-info">Edit/Ganti File</a>
</div>
@endsection