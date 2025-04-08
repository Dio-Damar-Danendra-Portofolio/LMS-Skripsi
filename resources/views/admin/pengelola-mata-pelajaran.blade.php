@extends('layouts.templateadmin')
@section('title', 'Pengelola Mata Pelajaran - EduSMA')
@section('content')
<div class="diodamar">
    <form action="{{ route('admin.pengelola-mata-pelajaran') }}" method="get" style="font-size: 20pt;">
        <table style="border:none;">
            <tr>
                <td>
                    <h1>Daftar Mata Pelajaran</h1>
                </td>
            </tr>
            <tr>
                <td>
                    Kelas: 
                @if($kelas)
                <select name="Kelas">
                <option value="Pilih Kelas">Pilih Kelas</option>
                @foreach($kelas as $kelasSekolah)
                <option>{{ $kelasSekolah->NamaKelas }}</option>
                @endforeach
                </select>
                @endif
                </td>
                <td>
                    <button type="submit" style="font-size: 20pt;" class = "btn btn-success">Cari!</button>
                </td>
            </form>
            </tr>
        </table>
</div>
<br>
<div class = "grid-container">
    <div class = "grid-column">
        <button type="button" class = "btn btn-dark"><a href="#Mapel-Kelompok-A" style = "color: white; font-size: 32pt; text-decoration: none;">Kelompok A</a></button><br>
        <button type="button" class = "btn btn-dark"><a href="#Mapel-Kelompok-B" style = "color: white; font-size: 32pt; text-decoration: none;">Kelompok B</a></button><br>
        <button type="button" class = "btn btn-dark"><a href="#Mapel-Kelompok-C" style = "color: white; font-size: 32pt; text-decoration: none;">Kelompok C</a></button><br>
    </div>
    <div class = "grid-column">
        @if($matapelajaran)
        <table style = "border: none;">
            <tr>
                @foreach($matapelajaran as $mapel)
                <td>
                    <button type="button" class = "btn btn-light">
                        <a href="{{ route('admin.lihat-mata-pelajaran') }}" style="color: black; text-decoration: none;">{{ $mapel->NamaMataPelajaran }}</a>
                    </button>
                    <a href="{{ route('admin.sunting-mata-pelajaran') }}" style="color: black; text-decoration: none;">
                        <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEh_CZMiAEPBD-63RyGe-CSvgoXAJ2pRICfJen4EuhTohyaZfwBMUZpmBDi_gHEEro8pjQSgNzTD4pIYcJvvihLuTUxQDcJFOO5M4CF_DNUUNXt-aer3IVlkKlE-x6Dxk1cgp6eu6D8A-lpO8xCiETJS0VtXFR6O5YnQ9jqGnVxZn8feIg9E8nz17lJNmpQ/s1280/gear-g7cf6af4f4_1280.png" length="10%" width="10%">
                    </a>
                </td>
                @endforeach
            </tr>
            @else
                <tr>
                    <td>
                        <div class="diodamar" style="font-size: 25pt; color: black;">
                            Belum ada Mata Pelajaran
                        </div>
                    </td>
                </tr>
            @endif
        </table>
        <br>
        <br>
    </div>
    <div class = "grid-column">
        <a href="{{ route('admin.tambah-mata-pelajaran') }}" style="color: black; text-decoration: none; font-size: 25pt; color: black;">
            <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEguLvaWMtyCsxBW0OCGOmTcBdWC5VrX3YGalaFDx2cDxO4OqwDYbSXKUAOIKAEe31IqZIFHemXxoXi_rR-eaWtHufwYcdk0IHN-sqry3uFAGtZbxiepSL0dJNWFQ8-mHkBjTOhpyO4An_vVp2cnznmbtN5qVZvur8QiZVIB4EzHXg82vzj9W5_AOUKh9AE/s512/plus-sign.png" length="25%" width="25%"><br>
            Mata Pelajaran baru
        </a>
    </div>
</div>
@endsection