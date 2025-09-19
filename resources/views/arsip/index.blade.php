@extends('layouts.app')

@section('content')
<h2>Arsip Surat</h2>
<p>Berikut ini adalah surat-surat yang telah terbit dan diarsipkan.<br>
Klik "Lihat" pada kolom aksi untuk menampilkan surat.</p>

<form method="GET" class="d-flex mb-3">
    <input type="text" name="search" class="form-control me-2" placeholder="Cari surat..." value="{{ $search }}">
    <button type="submit" class="btn btn-primary">Cari</button>
</form>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nomor Surat</th>
            <th>Kategori</th>
            <th>Judul</th>
            <th>Waktu Pengarsipan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse($arsipSurats as $arsip)
        <tr>
            <td>{{ $arsip->nomor_surat }}</td>
            <td>{{ optional($arsip->kategori)->nama_kategori ?? '-' }}</td>
            <td>{{ $arsip->judul }}</td>
            <td>{{ $arsip->waktu_pengarsipan }}</td>
            <td>
                <form action="{{ route('arsip.destroy',$arsip->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus surat ini?')">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm">Hapus</button>
                </form>
                <a href="{{ route('arsip.download',$arsip->id) }}" class="btn btn-warning btn-sm">Unduh</a>
                <a href="{{ route('arsip.lihat',$arsip->id) }}" class="btn btn-info btn-sm">Lihat >></a>
            </td>
        </tr>
        @empty
        <tr><td colspan="5" class="text-center">Belum ada arsip surat</td></tr>
        @endforelse
    </tbody>
</table>

<a href="{{ route('arsip.create') }}" class="btn btn-success">Arsipkan Surat..</a>
@endsection
