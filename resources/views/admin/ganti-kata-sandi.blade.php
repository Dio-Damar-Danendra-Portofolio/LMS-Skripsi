@extends('layouts.templateadmin')
@section('title', 'Laman Ganti Kata Sandi untuk Admin- EduSMA')
@section('content')
<div class="diodamar">
    <table style="border: none">
        <tr>
            <th>
                <h1>Ganti Kata Sandi</h1>
            </th>
            <th>
                <img src="https://www.colorhexa.com/ffffff.png" length="80" width="2">
            </th>
            <th>
                <a href="{{ route('admin.sunting-profil-admin') }}">
                    <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEjbG5kZxZ2y4wxgE4JJFjEkcZcCNcBZC4PGFBJqkRFwQOih8Nknq-3e0ePl0tn8qR2tGkUpISpKm6LCktzqJcQYWQgSLPQQYe44mbtPMe_pJ6zlexrtItAPf0OoibbphhO7gdKxN2uNsJmDX4pS2SKFacCgwa-hO813iN4ij4D7tj_QFRWdASp1708yYdE/s512/left-arrow_44686.png" length="20%" width="20%">
                </a>
            </th>
        </tr>
    </table>
    <table style="border: none">
        <form action="{{ route('admin.profil-admin') }}" method="post">
            @csrf
            <tr>
                <td>
                    <label for="SurelPengguna">Surel Pengguna: </label><br>
                    <input type="email" name="SurelPengguna" id="SurelPengguna" required>
                </td>
                <td>
                    <label for="KataSandiPengguna">Kata Sandi Lama: </label><br>
                    <input type="password" name="KataSandiLama" id="KataSandiPengguna" required>
                </td>
                <td>
                    <button type="submit" class="btn btn-success">Simpan!</button>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="KataSandiPengguna">Kata Sandi Baru: </label><br>
                    <input type="password" name="KataSandiBaru" id="KataSandiPengguna" required>
                </td>
                <td>
                    <label for="KataSandiPengguna">Konfirmasi Kata Sandi Baru: </label><br>
                    <input type="password" name="KataSandiPengguna" id="KataSandiPengguna" required>
                </td>
                <td>
                    <a href="{{ route('admin.sunting-profil-admin') }}" style="text-decoration: none;">
                        <button type="button" class="btn btn-danger">Batalkan</button>
                    </a>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="NamaPertamaPengguna">Nama Pertama Pengguna:</label><br>
                    <input type="text" name="NamaPertamaPengguna" id="NamaPertamaPengguna">
                </td>
                <td>
                    <label for="NamaTerakhirPengguna">Nama Terakhir Pengguna:</label><br>
                    <input type="text" name="NamaTerakhirPengguna" id="NamaTerakhirPengguna">
                </td>
                <td>
                    <img src="https://www.colorhexa.com/ffffff.png" length="30" width="2">
                </td>
            </tr>
            @csrf
        </form>
    </table>
</div>
@endsection