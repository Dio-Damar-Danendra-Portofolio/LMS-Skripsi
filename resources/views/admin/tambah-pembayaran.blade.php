@extends('layouts.templateadmin')
@section('title', 'Pembayaran Baru - EduSMA')
@section('content')
<div class="diodamar">
    <table style="border: none;">
        <tr>
            <td>
                <h1>Pembayaran Baru</h1>
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
                <img src="https://www.colorhexa.com/ffffff.png" length="100" width="100">
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
                    <td>
                        <label for="SisaPembayaran">Sisa Pembayaran: </label>
                        <input type="text" name="SisaPembayaran" id="SisaPembayaran" required>
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