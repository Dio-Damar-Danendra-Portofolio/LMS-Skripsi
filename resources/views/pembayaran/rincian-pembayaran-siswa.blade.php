@extends('layouts.templatesiswa')
@section('title', '{NamaPembayaran} berjenis {JenisPembayaran} - EduSMA')
@section('content')
<div class="grid-container">
    <div class="grid-column">
        <h3>Rincian (Detil) Pembayaran {JenisPembayaran}</h3>
    </div>
    <div class="grid-column">
        <img src="https://www.colorhexa.com/ffffff.png" length="1" width="2">
    </div>
    <div class="grid-column">
        <a href="{{ route('siswa.pembayaran-khusus-siswa') }}">
            <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEjbG5kZxZ2y4wxgE4JJFjEkcZcCNcBZC4PGFBJqkRFwQOih8Nknq-3e0ePl0tn8qR2tGkUpISpKm6LCktzqJcQYWQgSLPQQYe44mbtPMe_pJ6zlexrtItAPf0OoibbphhO7gdKxN2uNsJmDX4pS2SKFacCgwa-hO813iN4ij4D7tj_QFRWdASp1708yYdE/s512/left-arrow_44686.png" length="22%" width="22%">
        </a>
    </div>
</div>
<br>
<div class="diodamar">
    <div class="grid-container">
        <div class="grid-column">
            <table style="font-size: 20pt;">
                <tr>
                    <td>
                        Nama: NamaPembayaran
                    </td>
                </tr>
                <tr>
                    <td>
                        Nominal Pembayaran: NominalPembayaran
                    </td>
                </tr>
                <tr>
                    <td>
                        Jenis: JenisPembayaran
                    </td>
                </tr>
                <tr>
                    <td>
                        Status Pembayaran: StatusPembayaran
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
@endsection