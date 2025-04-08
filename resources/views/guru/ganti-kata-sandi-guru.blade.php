@extends('layouts.templateguru')
@section('title', 'Laman Ganti Kata Sandi khusus Guru - EduSMA')
@section('content')
<table style="border: none;">
    <tr>
        <td>
            <h1>Ganti kata sandi (Khusus Guru)</h1>
        </td>
        <td colspan=3>
            <img src="https://www.colorhexa.com/ffffff.png" length="3" width="1">
        </td>
        <td></td>
        <td></td>
        <td></td>
        <td>
            <img src="https://www.colorhexa.com/ffffff.png" length="40" width="20">
        </td>
    </tr>
</table>
<form action="{{ route('guru.profil-guru') }}" method="post">
@csrf
    <table>
        <tr>
            <td>
                <label style = "font-size = 50pt;" for="SurelPengguna">Surel (<i>E-mail</i>) Pengguna: </label><br/>
                <input type="text" id="SurelPengguna" name="SurelPengguna" placeholder="Masukkan Surel Anda!" required>
	        </td>
            <td> 
                <label for="KataSandiPengguna">Kata Sandi Lama: </label><br/>
                <input type="text" id="KataSandiPengguna" name="KataSandiPengguna" placeholder="Masukkan Kata Sandi Lama Anda!" required>
	        </td>
            <td>
                <button type="submit" class = "btn btn-success" style="font-family: poppins;">Simpan</button>
            </td>
        </tr>
        <tr>
            <td>
                <label for="KataSandiPengguna">Kata Sandi Baru:  </label><br/>
                <input type="text" name="KataSandiBaru" id="KataSandiBaru" required>
            </td>
            <td>
                <label for="KataSandiPengguna">Konfirmasi Kata Sandi Baru:  </label><br/>
                <input type="text" name="KataSandiBaru" id="KonfirmasiKataSandi">
            </td>
            <td>
                <button type="button" class="btn btn-danger"><a href="{{ route('siswa.profil-siswa') }}">Batalkan</a></button>
            </td>
        </tr>
        <tr>
            <td>
                <label for="NamaPertamaPengguna">Nama Pertama Pengguna: </label><br/>
                <input type="text" id="NamaPertamaPengguna" name="NamaPertamaPengguna" placeholder="Masukkan Nama Pertama Anda!" required/>
            </td>
            <td>
		    <div style = "translate: 61px 0px;">
                <label for="NamaTerakhirPengguna">Nama Terakhir Pengguna: </label><br/>
                <input type="text" id="NamaTerakhirPengguna" name="NamaTerakhirPengguna" placeholder="Masukkan Nama Terakhir Anda!" required/>
            	</div>
	        </td>
            <td>
                <img src="https://www.colorhexa.com/ffffff.png" length="8" width="1">
            </td>
        </tr>
    </table>
    </form> 
</div>
@endsection