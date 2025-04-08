@extends('layouts.templateadmin')
@section('title', 'Sunting Pembayaran {{ $dataPembayaran->NamaPembayaran }} - EduSMA')
@section('content')
<div class="diodamar">
    <table style="border: none;">
        <tr>
            <td>
                <h1>Sunting Pembayaran {{ $dataPembayaran->NamaPembayaran }}</h1>
            </td>
            <td colspan=10>
                <img src="https://www.colorhexa.com/ffffff.png"  length="10" width="1">
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
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>
                <a href="{{ route('admin.pengelola-pembayaran') }}">
                    <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEjbG5kZxZ2y4wxgE4JJFjEkcZcCNcBZC4PGFBJqkRFwQOih8Nknq-3e0ePl0tn8qR2tGkUpISpKm6LCktzqJcQYWQgSLPQQYe44mbtPMe_pJ6zlexrtItAPf0OoibbphhO7gdKxN2uNsJmDX4pS2SKFacCgwa-hO813iN4ij4D7tj_QFRWdASp1708yYdE/s512/left-arrow_44686.png" length="70" width="70">
                </a>
            </td>
        </tr>
    </table>
</div>
<div class="grid-container">
    <div class="grid-column">
        <form action=" {{ route('admin.pengelola-pembayaran') }}" method="post">
        @csrf
            <table style="border: none; font-size: 17pt;">
                <tr>
                    <td>
                        <label for="NamaPembayaran">Nama Pembayaran: </label><br>
                        <input type="text" name="NamaPembayaran" id="NamaPembayaran" required>
                    </td>
                    <td>
                        <label for="NominalPembayaran">Nominal Pembayaran: </label><br>
                        <input type="text" name="NominalPembayaran" id="NominalPembayaran" required>
                    </td>
                    <td>
                        <label for="JenisPembayaran">Jenis Pembayaran: </label><br>
                        <input type="text" name="JenisPembayaran" id="JenisPembayaran" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="StatusPembayaran">Status Pembayaran: </label><br>
                        <select name="StatusPembayaran" id="StatusPembayaran" required>
                            <option value="false">Belum Terbayar</option>
                            <option value="true">Terbayar</option>
                        </select>
                    </td>
                    <td>
                        <label for="TanggalPembayaran">Tanggal Pembayaran: </label><br>
                        <input type="date" name="TanggalPembayaran" id="TanggalPembayaran" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <button type="submit" class="btn btn-success" style="font-size: 20pt;">Simpan</button>
                    </td>
                    <td>
                        <a href="{{ route('admin.pengelola-pembayaran') }}">
                            <button type="button" class="btn btn-danger" style="font-size: 20pt;">Batalkan</button>
                        </a>
                    </td>
                </tr>
            </table>
        @csrf
        </form>
    </div>
</div>
@endsection
