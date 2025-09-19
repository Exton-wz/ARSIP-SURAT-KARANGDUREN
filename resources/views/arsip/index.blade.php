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
                <!-- Tombol hapus buka modal -->
                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modalHapus{{ $arsip->id }}">
                    Hapus
                </button>
                <a href="{{ route('arsip.download',$arsip->id) }}" class="btn btn-warning btn-sm">Unduh</a>
                <a href="{{ route('arsip.lihat',$arsip->id) }}" class="btn btn-info btn-sm">Lihat >></a>
            </td>
        </tr>

        <!-- Modal Konfirmasi Hapus -->
        <div class="modal fade" id="modalHapus{{ $arsip->id }}" tabindex="-1" aria-labelledby="modalLabel{{ $arsip->id }}" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered"> <!-- Tambahkan modal-dialog-centered -->
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="modalLabel{{ $arsip->id }}">Konfirmasi Hapus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                Apakah Anda yakin ingin menghapus surat <strong>{{ $arsip->judul }}</strong>?
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <form action="{{ route('arsip.destroy',$arsip->id) }}" method="POST" class="d-inline">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger">Hapus</button>
                </form>
              </div>
            </div>
          </div>
        </div>
        @empty
        <tr><td colspan="5" class="text-center">Belum ada arsip surat</td></tr>
        @endforelse
    </tbody>
</table>

<a href="{{ route('arsip.create') }}" class="btn btn-success">Arsipkan Surat..</a>
@endsection
