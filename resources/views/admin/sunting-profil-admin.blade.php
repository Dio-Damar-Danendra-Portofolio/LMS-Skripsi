@extends('layouts.templateadmin')
@section('title', 'Sunting Profil Admin - EduSMA')
@section('content')
<div class="diodamar">
<table style="border: none;">
<tr>
<td>
<h1>Sunting Profil Admin</h1>
</td>
<td colspan = 10>
<img src="https://www.colorhexa.com/ffffff.png" length = 800 width = 2>
</td>
<td>
</td>
<td>
</td>
<td>
</td>
</td>
<td>
</td>
<td colspan = 10>
<img src="https://www.colorhexa.com/ffffff.png" length = 120 width = 3>
</td>
<td>
</td>
<td>
</td>
<td>
</td>
</tr>
</table>
<form action="{{ route('admin.profil-admin') }}" method="post">
@csrf
<br>
<br>
    <table style="border: none;">
        <tr>
            <td>
                <label style = "font-size = 50pt;" for="NamaPertamaPengguna">Nama Pertama Admin: </label><br/>
                <input type="text" id="NamaPertamaPengguna" name="NamaPertamaPengguna" placeholder="Masukkan Nama Pertama Anda" required>
	        </td>
            <td> 
            <div style = "translate: 61px 0px;">
                <label for="NamaTerakhirPengguna">Nama Terakhir Admin: </label><br/>
                <input type="text" id="NamaTerakhirPengguna" name="NamaTerakhirPengguna" placeholder="Masukkan Nama Terakhir Anda" required>
            </div>            
	        </td>
            <td>
                <label for="NomorIndukPengguna">Nomor Induk Admin: </label><br/>
                <input type="text" id="NomorIndukPengguna" name="NomorIndukPengguna" pattern="[0-9]{10}" placeholder="Masukkan Nomor Induk Anda">
            </td>
        </tr>
        <tr>
            <td>
                <label for="TahunMasukPengguna">Tahun Masuk Pengguna: </label><br/>
                <input name="TahunMasukPengguna" id="TahunMasukPengguna" type="year">                
            </td>
            <td>
            <div style = "translate: 61px 0px;">
                <label for="DivisiAdmin">Divisi Admin: </label><br/>
                <input type="text" name="DivisiAdmin" id="DivisiAdmin" required>
            </div>
            </td>
            <td>
                <label for="SurelPengguna">Surel Pengguna: </label><br/>
                <input type="email" name="SurelPengguna" id="SurelPengguna">
            </td>
        </tr>
        <tr>
            <td>
                <label for="NomorPonselPengguna">Nomor Ponsel Pengguna: </label><br/>
                <input type="tel" id="NomorPonselPengguna" name="NomorPonselPengguna"/>
            </td>
            <td>
		        <div style = "translate: 61px 0px;">
                    <label for="FotoProfilPengguna">Foto Profil Pengguna: </label><br/>
                    <input type="file" id="FotoProfilPengguna" name="FotoProfilPengguna" accept="jpg, jpeg, png">
            	</div>
	        </td>
            <td>
                <label for="PeranPengguna">Peran: </label><br/>                
	                <select name="PeranPengguna" id="PeranPengguna">
                        <option value="Siswa">Siswa</option>
                        <option value="Guru">Guru</option>
                        <option value="Admin">Admin</option>
                    </select>
            </td>
        </tr>
        <tr>
            <td>
                    <label for="TanggalLahirPengguna">Tanggal Lahir Pengguna: </label><br>
                    <input type="date" name="TanggalLahirPengguna" id="TanggalLahirPengguna">
            </td>
            <td>
                <button type = "submit" class="btn btn-success">Simpan</button>
            </td>
            <td>
                <a href="{{ route('admin.profil-admin') }}">
                    <button type="button" class="btn btn-danger">Batalkan</button>
                </a>
            </td>
        </tr>
        <tr>
            <td>
                <img src="" length="50">    
            </td>
            <td>
	            <a href = "{{ route('admin.ganti-kata-sandi') }}">
                    <button type="button" class = "btn btn-primary">Ganti Kata Sandi (<i>password</i>)</button>
                </a>	
            </td>
            <td>
            </td>
        </tr>
    </table>
    @csrf
    </form> 
</div>
@endsection