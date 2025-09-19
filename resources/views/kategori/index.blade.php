@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Daftar Kategori Surat</h2>

    <a href="{{ route('kategori.create') }}" class="btn btn-success mb-3">+ Tambah Kategori</a>

    <form action="{{ route('kategori.index') }}" method="GET" class="mb-3">
        <input type="text" name="search" class="form-control" placeholder="Cari kategori..."
               value="{{ request('search') }}">
    </form>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Kategori</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($kategori as $key => $k)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $k->nama_kategori }}</td>
                    <td>{{ $k->deskripsi ?? '-' }}</td>
                    <td>
                        <a href="{{ route('kategori.edit', $k->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <!-- Tombol hapus buka modal -->
                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modalHapusKategori{{ $k->id }}">
                            Hapus
                        </button>
                    </td>
                </tr>

                <!-- Modal Konfirmasi Hapus -->
                <div class="modal fade" id="modalHapusKategori{{ $k->id }}" tabindex="-1" aria-labelledby="modalLabelKategori{{ $k->id }}" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="modalLabelKategori{{ $k->id }}">Konfirmasi Hapus</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        Apakah Anda yakin ingin menghapus kategori <strong>{{ $k->nama_kategori }}</strong>?
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <form action="{{ route('kategori.destroy', $k->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Hapus</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
            @empty
                <tr>
                    <td colspan="4" class="text-center">Belum ada data</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
