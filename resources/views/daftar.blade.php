<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

/* Style the header */
header {
  background-color: white;
  padding: 10px;
  text-align: center;
  font-size: 35px;
}

/* Responsive layout - makes the menu and the content (inside the section) sit on top of each other instead of next to each other */
@media (max-width: 1025px) {
  section {
    -webkit-flex-direction: column;
    flex-direction: column;
  }
}

footer {
  background-color: white;
  text-align: center;
  color: black;
}

article {
  -webkit-flex: 3;
  -ms-flex: 3;
  flex: 3;
  background-color: white;
  font-family: poppins;
  font-size: 30px;
  padding: 30px;
}
</style>
<head>
    <title>Daftar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="/plugins/fontawesome-free-6.4.0-web//css/all.min.css"></link>
    <link rel="stylesheet" href="/dist/fontawesome-free-6.4.0-web/css/all.min.css"></link>
    <link rel="stylesheet" href="/fontawesome-free-6.4.0-web/css/all.min.css"></link>
    <link rel="stylesheet" href="C:/xampp/htdocs/Skripsi/public/dist/css/adminlte.min.css"></link>
  </head>
<body>
<header>
    <div class="row">
        <div class="col-lg-6">
            <img src="https://blogger.googleusercontent.com/img/a/AVvXsEjuiljKk7PbaN6E7G5-ujouFXya1BLUuqfRxUBzyjEyEkq10xTP1SSu4qxSCMbxyiRKpniF6rz6-NEs1efNbzlKq8to07r4E7lizxfvL3_uKZSmkIs2KrCv5xxlNHmOrktr2EL2DbXf1yONwJY7LneP8ff7NBa1M1Y-viqUJHlfuUkx6jtkjWwOCoLA9Js" width="1017" height="270"  style="margin-left: 115px;" alt="Tidak ada gambar">
        </div>
        <div class="col-lg-6">
            <a href=" {{ url()->previous() }} ">
                <i class="bi bi"></i>
            </a>
        </div>
    </div>
  </header>
  <main>
    <form action=" {{ route('daftar') }}" method="POST" enctype="multipart/form-data">
        @csrf
    <div class="row">
        <div class="col-lg-6">
            <label class="form-label" for="NamaPertamaPengguna">Nama Pertama Pengguna: </label><br/>
            <input class="form-control" type="text" id="NamaPertamaPengguna" name="NamaPertamaPengguna" placeholder="Masukkan Nama Pertama Anda" required>
        </div>
        <div class="col-lg-6">
            <label class="form-label" for="NamaTerakhirPengguna">Nama Terakhir Pengguna: </label><br/>
            <input class="form-control" type="text" id="NamaTerakhirPengguna" name="NamaTerakhirPengguna" placeholder="Masukkan Nama Terakhir Anda" required>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <label class="form-label" for="NomorIndukPengguna">Nomor Induk Pengguna: </label><br/>
            <input class="form-control" type="text" placeholder="Masukkan Nomor Induk Pengguna" id="NomorIndukPengguna" name="NomorIndukPengguna" pattern="[0-9]{10}" required>
        </div>
        <div class="col-lg-6">
            <label class="form-label" for="id_peran">Peran Pengguna: </label><br/>
            <select id="id_peran" name="id_peran" required>
            <option value="">Pilih Peran</option>
            @foreach ($peran as $role)
            <option value="{{ $role->id }}">{{ $role->nama_peran }}</option>
            @endforeach
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <label class="form-label" for="SurelPengguna">Surel (e-mail) Pengguna: </label><br/>
            <input class="form-control" placeholder="Masukkan Surel Anda!" type="email" id="SurelPengguna" name="SurelPengguna" required>
        </div>
        <div class="col-lg-6">
            <label class="form-label" for="NomorPonselPengguna">Nomor Ponsel Pengguna: </label><br/>
            <input class="form-control" placeholder="Masukkan Nomor Ponsel Anda!" type="text" id="NomorPonselPengguna" name="NomorPonselPengguna" pattern="[0-9]{12}" required>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <label class="form-label" for="KataSandiPengguna">Kata Sandi Pengguna: </label><br/>
            <input class="form-control" type="password" id="KataSandiPengguna" name="KataSandiPengguna" required>
        </div>
        <div class="col-lg-6">
            <label class="form-label" for="TanggalLahirPengguna">Tanggal Lahir Pengguna</label><br/>
            <input type="date" id="TanggalLahirPengguna" name="TanggalLahirPengguna" required>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <label class="form-label" for="TahunMasukPengguna">Tahun Masuk Pengguna: </label><br/>
            <input type="number" id="TahunMasukPengguna" name="TahunMasukPengguna" min="1000" max="999999" required></div>
        <div class="col-lg-6">
            <button type="submit" class="btn btn-warning" style="font-size: 30px; font-family: poppins;">Daftar</button>
        </div>
    </div>
    @csrf
</form>
  </main>
  <footer>
    EduSMA - Khusus untuk anak SMA/sederajat
    </footer>
</div>
</body>
</html>
