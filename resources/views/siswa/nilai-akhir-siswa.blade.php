@extends('layouts.templatesiswa')
@section('title', 'Nilai Akhir khusus Siswa - EduSMA')
@section('content')
<div class = "diodamar">
    <h1 style = "font-size: 33pt;">Laporan Nilai Akhir</h1>
    @include('siswa.pencarian-nilai-akhir')
</div>
<br>
<br>
@include('siswa.nilai-mapel')
@endsection