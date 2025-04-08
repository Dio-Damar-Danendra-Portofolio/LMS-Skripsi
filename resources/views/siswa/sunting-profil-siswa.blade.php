@extends('layouts.templatesiswa')
@section('title', 'Sunting Profil Siswa - EduSMA')
@section('content')
<table>
<form action="{{ route('siswa.profil-siswa') }}" method="post">
<tr>
<td>
<h1>Sunting Profil Siswa</h1>
</td>
<td colspan = 10>
<img src="https://www.colorhexa.com/ffffff.png" length = "800" width = "2">
</td>
<td>
</td>
<td>
</td>
<td>
</td>
<td>
<button type = "submit" class="btn btn-success" style = "font-size: 34pt;">Simpan</button>
</td>
<td colspan = 10>
<img src="https://www.colorhexa.com/ffffff.png" length = "120" width = "3">
</td>
<td>
</td>
<td>
</td>
<td>
</td>
<td>
<a href="{{ route('siswa.profil-siswa') }}">
    <button type = "button" class="btn btn-danger" style = "font-size: 34pt;">Batalkan</button>
</a>
</td>
</tr>
</table>
<br>
<br>
    <table>
        <tr>
            <td>
                <label style = "font-size = 50pt;" for="NamaPertamaPengguna">Nama Pertama Pengguna: </label><br/>
                <input type="text" id="NamaPertamaPengguna" name="NamaPertamaPengguna" placeholder="Masukkan Nama Pertama Anda" required>
	    </td>
            <td> 
            <div style = "translate: 61px 0px;">
                <label for="NamaTerakhirPengguna">Nama Terakhir Pengguna: </label><br/>
                <input type="text" id="NamaTerakhirPengguna" name="NamaTerakhirPengguna" placeholder="Masukkan Nama Terakhir Anda" required>
            </div>            
	    </td>
            <td>
                <label for="NomorIndukPengguna">NIS: </label><br/>
                <input type="text" id="NomorIndukPengguna" name="NomorIndukPengguna" pattern="[0-9]{10}" placeholder="Masukkan Nomor Induk Anda">
            </td>
        </tr>
        <tr>
            <td>
            <label for="JenjangSiswa">Jenjang Siswa: </label><br/>
            <select id="JenjangSiswa" name="JenjangSiswa">
                <option value="SMA">SMA</option>
                <option value="SMU">SMU</option>
                <option value="MA">MA</option>
            </select>
            </td>
            <td>
            <div style = "translate: 61px 0px;">
            <label for="PeranPengguna">Peran: </label><br/>                
	            <select name="PeranPengguna" id="PeranPengguna">
                    <option value="Siswa">Siswa</option>
                    <option value="Guru">Guru</option>
                    <option value="Admin">Admin</option>
                </select>
            </div>
            </td>
            <td>
            <label for="JurusanSiswa">Jurusan: </label><br/>
            <select name="JurusanSiswa" id="JurusanSiswa">
                <option value="Ilmu Pengetahuan Alam (IPA)">Ilmu Pengetahuan Alam (IPA)</option>
                <option value="Ilmu Pengetahuan Sosial (IPS)">Ilmu Pengetahuan Sosial (IPS)</option>
                <option value="Bahasa">Bahasa</option>
            </select>
            </td>
        </tr>
        <tr>
            <td>
                <label for="NomorPonselPengguna">Nomor Ponsel Siswa: </label><br/>
                <input type="tel" id="NomorPonselPengguna" name="NomorPonselPengguna" placeholder="Masukkan Nomor Ponsel Pengguna" pattern="[0-9]{12}" required/>
            </td>
            <td>
		    <div style = "translate: 61px 0px;">
                <label for="SurelPengguna">Surel (E-mail): </label><br/>
                <input type="text" id="SurelPengguna" name="SurelPengguna" placeholder="Masukkan Surel Anda!" type="email" required/>
            	</div>
	        </td>
            <td>
                <label for="TahunMasukPengguna">Tahun Masuk: </label><br/>
                <input type="text" id="TahunMasukPengguna" name="TahunMasukPengguna" placeholder="Masukkan Tahun Masuk Anda!">
            </td>
        </tr>
        <tr>
            <td>
                <label for="KelasSiswa">Kelas: </label><br/>
                <input type="text" id="KelasSiswa" name="KelasSiswa">
            </td>
            <td>
		        <div style = "translate: 61px 0px;">
                    <label for="FotoProfilPengguna">Foto Profil Pengguna : </label><br/>
                    <input type="file" id="FotoProfilPengguna" name="FotoProfilPengguna" accept="jpg, jpeg, png">
            	</div>
	        </td>
	        <td>
	            <div style = "font-size: 20pt;">
                    <label for="TanggalLahirPengguna">Tanggal Lahir Pengguna: </label><br>
                    <input type="date" name="TanggalLahirPengguna" id="TanggalLahirPengguna">    
	            </div>    
            </td>
        </tr>
        <tr>
            <td colspan=2>
                <div style="font-size: 25pt;">
                    <a href = "{{ route('siswa.ganti-kata-sandi-siswa') }}"><button class = "btn btn-primary">Ganti Kata Sandi (<i>password</i>)</button></a>	
                </div>
            </td>
            <td></td>
            <td></td>
        </tr>
    </table>
</form> 
</div>
@endsection