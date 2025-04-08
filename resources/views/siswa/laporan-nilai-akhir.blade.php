@extends('layouts.templatesiswa')
@section('title', 'Laporan Nilai Akhir pada mapel {NamaMataPelajaran}')
@section('content')
<div class="diodamar">
    <div class="grid-container">
        <div class="grid-column">
            <h1>{NamaMataPelajaran}</h1>
        </div>
        <div class="grid-column">
            <img src="https://www.colorhexa.com/ffffff.png" length=26 width=3>
        </div>
        <div class="grid-column">
            <a href="{{ route('siswa.nilai-akhir-siswa') }}">
                <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEjbG5kZxZ2y4wxgE4JJFjEkcZcCNcBZC4PGFBJqkRFwQOih8Nknq-3e0ePl0tn8qR2tGkUpISpKm6LCktzqJcQYWQgSLPQQYe44mbtPMe_pJ6zlexrtItAPf0OoibbphhO7gdKxN2uNsJmDX4pS2SKFacCgwa-hO813iN4ij4D7tj_QFRWdASp1708yYdE/s512/left-arrow_44686.png" length="30%" width="30%">
            </a>
        </div>
    </div>
</div>
<br>
<div class="diodamar">
    <div class="grid-column">
        <table style="border: none;">
            <tr>
                <td>
                    Nilai Tugas Mandiri: <br>
                    {NilaiTugasMandiri}
                </td>
                <td>
                    Nilai Ujian Tengah Semester (UTS): <br>
                    {NilaiUTS}
                </td>
                <td>
                    Nilai Ujian Akhir Semester (UAS): <br>
                    {NilaiUAS}
                </td>
            </tr>
            <tr>
                <td>
                    Nilai Kehadiran: <br>
                    {NilaiKehadiran}
                </td>
                <td>
                    Nilai Ulangan Harian : <br>
                    {NilaiUlanganHarian} 
                </td>
                <td>
                    Nilai Akhir: <br> {NilaiAkhir} ({NilaiAkhirDalamHuruf})
                </td>
            </tr>
        </table>
    </div>
</div>
@endsection