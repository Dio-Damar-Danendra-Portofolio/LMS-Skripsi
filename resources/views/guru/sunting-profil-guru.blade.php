@extends('layouts.templateguru')
@section('title', 'Sunting Profil Guru - EduSMA')
@section('content')
<table style="border: none;">
<tr>
<td>
<h1>Sunting Profil Guru</h1>
</td>
<td colspan = 20>
<img src="https://www.colorhexa.com/ffffff.png" length = "800" width = "2">
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
<img src="https://www.colorhexa.com/ffffff.png" length = "120" width = "3">
</td>
<td>
</td>
<td>
</td>
<td>
</td>
<td>
    <a href="{{ route('guru.profil-guru') }}" style="text-decoration: none;">
        <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEjbG5kZxZ2y4wxgE4JJFjEkcZcCNcBZC4PGFBJqkRFwQOih8Nknq-3e0ePl0tn8qR2tGkUpISpKm6LCktzqJcQYWQgSLPQQYe44mbtPMe_pJ6zlexrtItAPf0OoibbphhO7gdKxN2uNsJmDX4pS2SKFacCgwa-hO813iN4ij4D7tj_QFRWdASp1708yYdE/s512/left-arrow_44686.png" length="23%" width="23%">
    </a>
</td>
</tr>
</table>
<br>
<br>
    <form action="{{ route('guru.profil-guru') }}" method="post">
    <table style="border: none;">
        <tr>
            <td>
                <label style = "font-size = 50pt;" for="NamaPertamaPengguna">Nama Pertama Guru: </label><br/>
                <input type="text" id="NamaPertamaPengguna" name="NamaPertamaPengguna" placeholder="Masukkan Nama Pertama Anda" required>
	        </td>
            <td> 
            <div style = "translate: 61px 0px;">
                <label for="NamaTerakhirPengguna">Nama Terakhir Guru: </label><br/>
                <input type="text" id="NamaTerakhirPengguna" name="NamaTerakhirPengguna" placeholder="Masukkan Nama Terakhir Anda" required>
            </div>            
	        </td>
            <td>
                <label for="NomorIndukPengguna">Nomor Induk Guru: </label><br/>
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
                <label for="MataPelajaran">Mata Pelajaran : </label><br/>
                <input type="text" name="MataPelajaran" id="MataPelajaran" required>
            </div>
            </td>
            <td>
                <label for="MataPelajaran2">Mata Pelajaran 2: </label><br/>
                <input type="text" name="MataPelajaran2" id="MataPelajaran2">
            </td>
        </tr>
        <tr>
            <td>
                <label for="MataPelajaran3">Mata Pelajaran 3: </label><br/>
                <input type="text" id="MataPelajaran3" name="MataPelajaran3"/>
            </td>
            <td>
		        <div style = "translate: 61px 0px;">
                    <label for="MataPelajaran4">Mata Pelajaran 4: </label><br/>
                    <input type="text" id="MataPelajaran4" name="MataPelajaran4"/>
            	</div>
	        </td>
            <td>
                <label for="TahunMasuk">Tahun Masuk: </label><br/>
                <input type="year" id="TahunMasuk" name="TahunMasuk">
            </td>
        </tr>
        <tr>
            <td>
                <label for="FotoProfilPengguna">Foto Profil Pengguna: </label><br/>
                <input type="file" id="FotoProfilPengguna" name="FotoProfilPengguna" accept="jpg, jpeg, png">
            </td>
            <td>
		        <div style = "translate: 61px 0px;">
                    <label for="GambarProfilPengguna">Gambar Profil Pengguna: </label><br/>
                    <input type="file" id="GambarProfilPengguna" name="GambarProfilPengguna">
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
                <label for="NomorPonselPengguna">Nomor Ponsel Pengguna: </label><br>
                <input type="tel" name="NomorPonselPengguna" id="NomorPonselPengguna">
            </td>
            <td>
                <label for="TanggalLahirPengguna">Tanggal Lahir Pengguna: </label><br>
                <input type="date" name="TanggalLahirPengguna" id="TanggalLahirPengguna">
            </td>
            <td>
                <img src="https://www.colorhexa.com/ffffff.png" length=45 width=3>
            </td>
        </tr>
        <tr>
            <td>
                <button type = "submit" class="btn btn-success" style = "font-size: 34pt;">Simpan</button>
            </td>
            <td>
                <a href="{{ route('guru.profil-guru') }}">
                    <button type="button" class="btn btn-danger">Batalkan</button>
                </a>
            </td>
            <td>
	            <div style = "font-size: 20pt;">
	                <a href = "{{ route('guru.ganti-kata-sandi-guru') }}">
                        <button type="button" class = "btn btn-primary">Ganti Kata Sandi (<i>password</i>)</button>
                    </a>	
	            </div>    
            </td>
        </tr>
    </table>
    </form> 
</div>
@endsection