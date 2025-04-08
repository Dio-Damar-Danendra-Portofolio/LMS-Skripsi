@extends('layouts.templateadmin')
@section('title', '{{ $dataPembayaran->NamaPembayaran }} - EduSMA')
@section('content')
<div class="diodamar">
    <table style="border: none;">
        <tr>
            <th>
                <h1>Rincian (Detil) {{ $dataPembayaran->NamaPembayaran ?? 'Nama Belum Tersedia' }}</h1>
            </th>
            <th colspan=5>
                <img src="https://www.colorhexa.com/ffffff.png" length="5" width="1">
            </th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th>
                <a href=" {{ route('admin.pengelola-pembayaran') }}">
                <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEjbG5kZxZ2y4wxgE4JJFjEkcZcCNcBZC4PGFBJqkRFwQOih8Nknq-3e0ePl0tn8qR2tGkUpISpKm6LCktzqJcQYWQgSLPQQYe44mbtPMe_pJ6zlexrtItAPf0OoibbphhO7gdKxN2uNsJmDX4pS2SKFacCgwa-hO813iN4ij4D7tj_QFRWdASp1708yYdE/s512/left-arrow_44686.png" length="50%" width="50%">
                </a>
            </th>
        </tr>
    </table>
</div>
<div class="grid-container">
    <div class="grid-column">
    <table style="font-size: 20pt;">
        <tr>
            <td>
                Nama Pembayaran: {{ $dataPembayaran->NamaPembayaran ?? 'Nama Tidak Tersedia' }}
            </td>
        </tr>
        <tr>
            <td>
                Nominal Pembayaran: {{ $dataPembayaran->NominalPembayaran ?? 'Tidak ada Nominal'}}
            </td>
        </tr>
        <tr>
            <td>
                Jenis Pembayaran: {{ $dataPembayaran->JenisPembayaran ?? 'Belum ada Jenis' }}
            </td>
        </tr>
        <tr>
            <td>
                Status Pembayaran: {{ $dataPembayaran->StatusPembayaran ?? 'Status Pembayaran belum ada' }} 
            </td>
        </tr>
        <tr>
            <td>
                Sisa Pembayaran: {{ $dataPembayaran->SisaPembayaran ?? 'Belum ada Sisa Pembayaran' }}
            </td>
        </tr>
    </table>
    </div>
</div>
@endsection