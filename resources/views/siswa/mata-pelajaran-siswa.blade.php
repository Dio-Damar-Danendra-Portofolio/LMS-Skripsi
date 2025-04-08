@extends('layouts.templatesiswa')
@section('title', 'Daftar Mata Pelajaran - EduSMA')
@section('content')
<div class = "diodamar">
    <h1>Daftar Mata Pelajaran</h1>
    @include('siswa.mapel')
</div>
<br>
<div class = "grid-container">
    <div class = "grid-column"> 
            <button type="button" class = "btn btn-dark"><a href="#Mapel-Kelompok-A" style = "color: white; font-size: 32pt; text-decoration: none;">Kelompok A</a></button><br>
            <button type="button" class = "btn btn-dark"><a href="#Mapel-Kelompok-B" style = "color: white; font-size: 32pt; text-decoration: none;">Kelompok B</a></button><br>
            <button type="button" class = "btn btn-dark"><a href="#Mapel-Kelompok-C" style = "color: white; font-size: 32pt; text-decoration: none;">Kelompok C</a></button><br>
    </div>
    <div class = "grid-column">
        <img src="https://www.colorhexa.com/ffffff.png" length = "20%" height = "20%">
    </div>
    <div class = "grid-column">
            <button type="button" class = "btn btn-light" style = "border: 1px solid black;"><a href=" {{ route('mata_pelajaran.isi-materi-siswa') }}" style = "margin-bottom: 10px; color: black; font-size: 52pt; text-decoration: none;">Mata Pelajaran A</a></button><br>
            <button type="button" class = "btn btn-light" style = "border: 1px solid black;"><a href="{{ route('mata_pelajaran.isi-materi-siswa') }}" style = "margin-bottom: 10px; color: black; font-size: 52pt; text-decoration: none;">Mata Pelajaran B</a></button><br>
            <button type="button" class = "btn btn-light" style = "border: 1px solid black;"><a href="{{ route('mata_pelajaran.isi-materi-siswa') }}" style = "margin-bottom: 10px; color: black; font-size: 52pt; text-decoration: none;">Mata Pelajaran C</a></button><br>
    </div>
</div>
@endsection