@extends('layouts.templatesiswa')
@section('title', 'Daftar Pengguna - EduSMA')
@section('content')
<div class="diodamar">
    <table style="border: none;">
        <tr>
            <td>
                <h1>Obrolan Siswa - Daftar Pengguna</h1>
            </td>
            <td colspan=10>
                <img src="https://www.colorhexa.com/ffffff.png" length=10 width=1>
            </td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>
                <a href="{{ route('siswa.obrolan-siswa') }}">
                    <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEjbG5kZxZ2y4wxgE4JJFjEkcZcCNcBZC4PGFBJqkRFwQOih8Nknq-3e0ePl0tn8qR2tGkUpISpKm6LCktzqJcQYWQgSLPQQYe44mbtPMe_pJ6zlexrtItAPf0OoibbphhO7gdKxN2uNsJmDX4pS2SKFacCgwa-hO813iN4ij4D7tj_QFRWdASp1708yYdE/s512/left-arrow_44686.png" length = "25%" width = "25%">
                </a>
            </td>
        </tr>
    </table>
</div>
<br>
<div class = "list-forum-wrapper">
    <div class = "grid-column">
        <form action="{{ __('') }}" method="get">
            <input type="text" name="NamaPengguna">
            <button type="submit" class="btn btn-secondary">Cari!</button>
        </form>
    </div>
</div>
<div class="grid-container">
    <div class="grid-column">
        <a href="http://">
            <button type="button" class="btn btn-light">
                <img src="uploads/FotoProfilSiswa/Profil Siswa {waktu}-{NamaLengkap}')">
            </button>
        </a>
    </div>
    <div class="grid-column">
        <a href="http://">
            <button type="button" class="btn btn-light">
                <img src="uploads/FotoProfilGuru/Profil Guru {waktu}-{NamaLengkap}')">
            </button>
        </a>
    </div>
    <div class="grid-column">
        <a href="http://">
            <button type="button" class="btn btn-light">
                <img src="uploads/FotoProfilAdmin/Profil Admin {waktu}-{NamaLengkap}')">
            </button>
        </a>
    </div>
</div>
@endsection