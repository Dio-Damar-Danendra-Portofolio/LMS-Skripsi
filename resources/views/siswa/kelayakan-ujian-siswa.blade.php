@extends('layouts.templatesiswa')
@section('title', 'Kelayakan Ujian Siswa - EduSMA')
@section('content')
<div class="diodamar">
    <div class="grid-container">
        <div class="grid-column">
            <div style="translate: -20px 0px;">
                <h2>Ujian {JenisUjian} Mata Pelajaran {MataPelajaran}</h2>
            </div>
        </div>
        <div class="grid-column">
            <img src="https://www.colorhexa.com/ffffff.png" length="200" width="3">
        </div>
        <div class="grid-column">
            <div style="translate: 10px 0px;">
                <a href="{{ route('siswa.ujian-siswa') }}">
                    <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEjbG5kZxZ2y4wxgE4JJFjEkcZcCNcBZC4PGFBJqkRFwQOih8Nknq-3e0ePl0tn8qR2tGkUpISpKm6LCktzqJcQYWQgSLPQQYe44mbtPMe_pJ6zlexrtItAPf0OoibbphhO7gdKxN2uNsJmDX4pS2SKFacCgwa-hO813iN4ij4D7tj_QFRWdASp1708yYdE/s512/left-arrow_44686.png" length="16%" width="16%">
                </a>
            </div>
        </div>
    </div>
</div>
<br>
<div class="diodamar">
    <div class="grid-container">
        <table>
            <tr>
                <td>Guru: {NamaGuruMataPelajaran}</td>
                <td rowspan=4>
                    <img src="uploads/Foto-Profil-Siswa/">
                </td>
            </tr>
            <tr>
                <td>Ruang Ujian: {RuangUjian}</td>
                <td></td>
            </tr>
            <tr>
                <td>Waktu Ujian: {WaktuUjian}</td>
                <td></td>
            </tr>
            <tr>
                <td>Jenis Ujian: {JenisUjian}</td>
                <td></td>
            </tr>
            <tr>
                <td>
                    <img src="https://www.colorhexa.com/ffffff.png" length="99" width="10">
                </td>
                <td>
                    {KelayakanUjianSiswa} = Pesan Kelayakan Ujian Siswa
                </td>
            </tr>
        </table>            
    </div>
</div>
@endsection