@extends('layouts.templateadmin')
@section('title', 'Kelas {NamaKelas} - EduSMA')
@section('content')
<div class="diodamar">
    <div class="grid-container">
        <div class="grid-column">
            <h1>Kelas {{ $dataKelas->NamaKelas }}</h1>
        </div>
        <div class="grid-column">
            <img src="https://www.colorhexa.com/ffffff.png" length="200" width="10">
        </div>
        <div class="grid-column">
            <a href="{{ route('admin.pengelola-kelas') }}">
                <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEjbG5kZxZ2y4wxgE4JJFjEkcZcCNcBZC4PGFBJqkRFwQOih8Nknq-3e0ePl0tn8qR2tGkUpISpKm6LCktzqJcQYWQgSLPQQYe44mbtPMe_pJ6zlexrtItAPf0OoibbphhO7gdKxN2uNsJmDX4pS2SKFacCgwa-hO813iN4ij4D7tj_QFRWdASp1708yYdE/s512/left-arrow_44686.png" length="64" width="64">
            </a>
        </div>
        <div class="grid-column">
            <table>
                <tr>
                    <td>
                        <img src="uploads/Foto-Profil-Guru/namaBerkas"><br>
                        Supiyo R Utomo <br>
                        123456789
                    </td>
                    <td>
                        <img src="uploads/Foto-Profil-Siswa/namaBerkas"><br>
                        Shaanoum Faitheema <br>
                        2019233232
                    </td>
                    <td>
                        <img src="uploads/Foto-Profil-Siswa/namaBerkas"><br>
                        Annasya Kirana Sabinisa<br>
                        2032032093
                    </td>
                    <td>
                        <img src="uploads/Foto-Profil-Siswa/namaBerkas"><br>
                        Kiano Tiger Wong<br>
                        2013848348 
                    </td>
                </tr>
                <tr>
                    <td>
                        <img src="uploads/Foto-Profil-Siswa/namaBerkas"><br>
                        James Alvarendra Tan<br>2320232012
                    </td>
                    <td>
                        <img src="uploads/Foto-Profil-Siswa/namaBerkas"><br>
                        Kayyisa Nurin Ailani<br>2301858831
                    </td>
                    <td>
                        <img src="uploads/Foto-Profil-Siswa/namaBerkas"><br>
                        Nadhira Annasya Suwendy<br>2020122345
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
<div class="diodamar">
<div class="grid-column">
<div class="d-flex align-items-center mr-4">
        <span>Tampilkan: </span> 
        <form action="{{ route('admin.lihat-kelas') }}" method="get">
            <div class="C--combobox type--1 mb-0 dropdown ml-2">
                <select name="JumlahPembayaran" id="JumlahPembayaran">
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="15">15</option>
                    <option value="20">20</option>
                </select>
            </div>
        </form>
        </div>
        <div class="ml-3">
            <nav class="responsive-button" aria-label="pagination">
                <ul class="pagination">
                    <li class="page-item">
                        <button type="button" class="page-link" aria-label="Pertama">
                            <span aria-hidden="true"><<</span>
                            <span class="sr-only">Pertama</span>
                        </button>
                    </li>
                    <li class="page-item">
                        <button type="button" class="page-link" aria-label="Sebelumnya">
                        <span aria-hidden="true"><</span>
                        <span class="sr-only">Sebelumnya</span>
                    </button>
                    </li>
                    <li class="page-item">
                    <button type="button" class="page-link" aria-label="Berikutnya">
                        <span aria-hidden="true"> > </span> 
                        <span class="sr-only">Berikutnya</span>
                    </button>
                    </li>
                    <li class="page-item">
                    <button type="button" class="page-link" aria-label="Terakhir">
                        <span aria-hidden="true">>> </span>
                        <span class="sr-only">Terakhir</span>
                    </button>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>
</div>
@endsection