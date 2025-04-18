<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Masuk - EduSMA</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap & Fonts -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #fff;
        }

        .btn-daftar {
            background-color: #FFD84B;
            font-weight: bold;
            padding: 10px 30px;
            border: 2px solid black;
            color: black;
        }

        .btn-masuk {
            background-color: #B7F665;
            font-weight: bold;
            padding: 10px 30px;
            border: 2px solid black;
            font-size: 20px;
        }

        .btn-masuk:hover,
        .btn-daftar:hover {
            opacity: 0.9;
        }

        .logo {
            max-width: 180px;
        }

        .form-control {
            font-size: 18px;
        }

        .left-box {
            border-right: 1px solid #ccc;
        }

        footer {
            margin-top: 30px;
            background-color: #dae2f2;
            padding: 15px;
            text-align: center;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="container py-5">
    <div class="row">
        <!-- Kiri -->
        <div class="col-md-6 text-center left-box">
            <a href="{{ url('/') }}">
                <img class="logo mb-3" width="790" height="100" src="https://blogger.googleusercontent.com/img/a/AVvXsEgMYnxQkNg8jyuoaG92-p7hdTRwmlOhfTJ0m9FxXkJ9OOuZndFdWwMvmfzUJyWdTIwlobU0EXNEqfBuj2oGhlUrGB_vfMdizubAIw8eaA_S6n6PlpXeEtgM9QULveudGhtcN7hjFB_eCcRT8EqqG10GJp_OV6tAfkdmCaTp02OO0jAlzk45o8ArqZZISzg" alt="Logo EduSMA">
            </a>
            <h5 class="mt-3">Selamat Datang!</h5>
            <p class="text-large">Belum mempunyai akun? Klik/ketuk tombol Daftar</p>
            <a href="{{ route('daftar') }}" class="btn btn-daftar">Daftar</a>
        </div>

        <!-- Kanan -->
        <div class="col-md-6">
            <form method="POST" action="aksi-masuk" class="px-4" enctype="multipart/form-data">
                @csrf
                <div class="mb-3 mt-4">
                    <label for="SurelPengguna" class="form-label">Surel (E-mail) Pengguna:</label>
                    <input type="email" id="SurelPengguna" name="SurelPengguna" class="form-control" placeholder="Masukkan Surel Anda" required>
                </div>

                <div class="mb-4">
                    <label for="KataSandiPengguna" class="form-label">Kata Sandi (Password) pengguna:</label>
                    <input type="password" id="KataSandiPengguna" name="KataSandiPengguna" class="form-control" placeholder="Masukkan Kata Sandi Anda" required>
                </div>
                <button type="submit" class="btn btn-masuk">Masuk</button>
                @csrf
            </form>
        </div>
    </div>
</div>
<footer>
    EduSMA - Khusus anak SMA sederajat
</footer>

</body>
</html>
