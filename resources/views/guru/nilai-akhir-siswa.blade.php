@extends('layouts.templateguru')
@section('title', 'Nilai Akhir pada Mata Pelajaran {NamaMataPelajaran} - EduSMA')
@section('content')
<div class="diodamar">
    <div class="grid-container">
        <div class="grid-column">
            <h1>{NamaMataPelajaran}</h1>
        </div>
        <div class="grid-column">
            <img src="https://www.colorhexa.com/ffffff.png" length=30 width=2>
        </div>
        <div class="grid-column">
            <a href="{{ route('guru.input-nilai-akhir') }}" style="text-decoration: none;">
                <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEjbG5kZxZ2y4wxgE4JJFjEkcZcCNcBZC4PGFBJqkRFwQOih8Nknq-3e0ePl0tn8qR2tGkUpISpKm6LCktzqJcQYWQgSLPQQYe44mbtPMe_pJ6zlexrtItAPf0OoibbphhO7gdKxN2uNsJmDX4pS2SKFacCgwa-hO813iN4ij4D7tj_QFRWdASp1708yYdE/s512/left-arrow_44686.png" length="19%" width="19%">
            </a>
        </div>
    </div>
</div>
<br>
<div class="diodamar">
    <table style="border: none;">
        <form action="{{ route('guru.nilai-akhir-siswa') }}" method="get">
            <tr>
                <td>
                    <label for="Semester">Semester: </label>
                    <select name="Semester" id="Semester">
                        <option value="Semester Ganjil">Semester Ganjil</option>
                        <option value="Semester Genap">Semester Genap</option>
                    </select>
                </td>
                <td>
                    <button type="submit" class="btn btn-success">Cari!</button>
                </td>
            </tr>
        </form>
    </table>
</div>
<br>
<div class="diodamar">
    <div class="grid-container">
        <div class="grid-row">
            <table>
                <tr>
                    <th>Nomor Induk Siswa</th>
                    <th>Nama Siswa</th>
                </tr>
                @for($i = 0; $i < 3; $i++)
                <tr>
                    
                    <td>
                        <a href="{{ route('guru.penilaian-siswa') }}" style="text-decoration: none;">
                            {NomorIndukPengguna}
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('guru.penilaian-siswa') }}">
                            {NamaPertamaPengguna} {NamaTerakhirPengguna}
                        </a>
                    </td>
                </tr>
                @endfor
            </table>
        </div>
    </div>
</div>
@endsection