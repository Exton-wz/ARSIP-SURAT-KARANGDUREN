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
                        <form action="{{ route('kategori.destroy', $k->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">Belum ada data</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
