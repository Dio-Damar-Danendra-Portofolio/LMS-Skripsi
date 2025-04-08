@extends('layouts.templateguru')
@section('title', 'Sesi Ujian {JenisUjian} - EduSMA')
@section('content')
<div class="diodamar">
    <div class="grid-column">
        <h1>Ujian {MataPelajaran} untuk kelas {PeruntukanKelas}</h1>
    </div>
    <div class="grid-column">
        <img src="https://www.colorhexa.com/ffffff.png" length=50 width=3>
    </div>
    <div class="grid-column">
        <a href="{{ route('guru.pengawasan-ujian') }}" style="text-decoration: none;">
            <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEjbG5kZxZ2y4wxgE4JJFjEkcZcCNcBZC4PGFBJqkRFwQOih8Nknq-3e0ePl0tn8qR2tGkUpISpKm6LCktzqJcQYWQgSLPQQYe44mbtPMe_pJ6zlexrtItAPf0OoibbphhO7gdKxN2uNsJmDX4pS2SKFacCgwa-hO813iN4ij4D7tj_QFRWdASp1708yYdE/s512/left-arrow_44686.png" length="50%" width="50%">
        </a>
    </div>
    <div class="grid-column">
        <h2>Nama Pengawas: {{ Auth::user()->NamaPertamaPengguna }} {{ Auth::user()->NamaTerakhirPengguna }}</h2>
    </div>
    <div class="grid-column">
        <img src="https://www.colorhexa.com/ffffff.png" length="20" width="2">
    </div>
    <div class="grid-column">
        <img src="https://www.colorhexa.com/ffffff.png" length="20" width="2">
    </div>
</div>
<br>
<div class="diodamar">
    <div class="grid-container">
        <div class="grid-column">
            <div style="translate: -30px 0px;">
                <table style="border:none;">
                    <tr>
                        <td>
                            <img src="uploads/Foto-Profil-Siswa/namaBerkas"><br>
                            ABCDEFGHIJKL MNOPQRSTUV<br>1234567890<br>XI IPS 1
                        </td>
                        <td>
                            <img src="uploads/Foto-Profil-Siswa/namaBerkas"><br>
                            ABCDEFGHIJKL MNOPQRSTUV<br>1234567890<br>XI IPS 1
                        </td>
                        <td>
                            <img src="uploads/Foto-Profil-Siswa/namaBerkas"><br>
                            ABCDEFGHIJKL MNOPQRSTUV<br>1234567890<br>XI IPS 1
                        </td>
                        <td>
                            <img src="uploads/Foto-Profil-Siswa/namaBerkas"><br>
                            ABCDEFGHIJKL MNOPQRSTUV<br>1234567890<br>XI IPS 1
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <img src="uploads/Foto-Profil-Siswa/namaBerkas"><br>
                            ABCDEFGHIJKL MNOPQRSTUV<br>1234567890<br>XI IPS 1
                        </td>
                        <td>
                            <img src="uploads/Foto-Profil-Siswa/namaBerkas"><br>
                            ABCDEFGHIJKL MNOPQRSTUV<br>1234567890<br>XI IPS 1
                        </td>
                        <td>
                            <img src="uploads/Foto-Profil-Siswa/namaBerkas"><br>
                            ABCDEFGHIJKL MNOPQRSTUV<br>1234567890<br>XI IPS 1
                        </td>
                        <td>
                            <img src="uploads/Foto-Profil-Siswa/namaBerkas"><br>
                            ABCDEFGHIJKL MNOPQRSTUV<br>1234567890<br>XI IPS 1
                        </td> 
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection