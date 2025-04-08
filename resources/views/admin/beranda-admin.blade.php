@extends('layouts.templateadmin')
@section('title','Beranda khusus Admin - EduSMA')
@section('content')
<div class="grid-container">
    <div class="grid-column">
        <a href="{{ route('admin.tambah-pembayaran') }}" style="color: black;">
            <button type="button" class="btn btn-clear" style="border: 1px solid black;">
                Tambahkan Pembayaran
            </button>
        </a>
    </div>
    <div class="grid-column">
        <a href="{{ route('admin.tambah-pengumuman') }}" style="color: black;">
            <button type="button" class="btn btn-clear" style="border: 1px solid black;">
                Tambahkan Pengumuman
            </button>
        </a>
    </div>
    <div class="grid-column">
        <a href="{{ route('admin.tambah-ujian') }}" style="color: black;">
            <button type="button" class="btn-btn clear" style="border: 1px solid black;">Tambahkan Ujian</button>
        </a>
    </div>
    <div class="grid-column">
        <a href="{{ route('admin.tambah-jadwal-kelas') }}" style="color: black;">
            <button type="button" class="btn-btn clear" style="border: 1px solid black;">Tambahkan Jadwal Kelas</button>
        </a>
    </div>
    <div class="grid-column">
        <a href="{{ route('admin.pengelola-ujian') }}" style="color: black;">
            <button type="button" class="btn-btn clear" style="border: 1px solid black;"> Kelola Ujian</button>
        </a>
    </div>
    <div class="grid-column">
        <a href="{{ route('admin.tambah-mata-pelajaran') }}" style="color: black;">
            <button type="button" class="btn-btn clear" style="border: 1px solid black;"> Tambah Mata Pelajaran</button>
        </a>
    </div>
    <div class="grid-column">
        <a href="{{ route('admin.pengelola-jadwal-kelas') }}">
            <button type="button" class="btn-btn clear" style="border: 1px solid black;"> Pengelola Jadwal Kelas</button>
        </a>
    </div>
    <div class="grid-column">
        <a href="{{ route('admin.pengelola-kelas') }}">
            <button type="button" class="btn-btn clear" style="border: 1px solid black;">
                Kelola Kelas
            </button>
        </a>
    </div>
</div>
@endsection