@extends('layouts.app')

@section('title', 'About')

@section('content')
    <h2 class="mb-4">About</h2>

    <div class="card shadow-sm p-4" style="max-width: 600px;">
        <div class="d-flex align-items-center">
            <img src="{{ asset('images/Yosanda.png') }}" 
                 alt="Foto Profil" 
                 class="me-4"
                 style="width: 120px; height: 160px; object-fit: contain; border-radius: 8px; border:1px solid #ddd;">
            
            <div>
                <p class="mb-1">Aplikasi ini dibuat oleh:</p>
                <p class="mb-1"><b>Nama:</b> Yosanda Nurfriyandika </p>
                <p class="mb-1"><b>Prodi:</b> D3-Manajemen Informatika PSDKU Kediri</p>
                <p class="mb-1"><b>NIM:</b> 2331730096</p>
                <p class="mb-0"><b>Tanggal:</b> 17 September 2025</p>
            </div>
        </div>
    </div>

    <!-- <div class="text-end mt-3 text-danger">
        <small>Build v1.0</small>
    </div> -->
@endsection
