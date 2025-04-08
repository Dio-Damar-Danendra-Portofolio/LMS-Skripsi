<!DOCTYPE html>
<html lang="id-ID">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang di EduSMA!</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        .btn-masuk {
            background-color: #B7F665;
            color: #000;
            font-weight: bold;
            padding: 10px 30px;
            border: 2px solid black;
        }

        .btn-daftar {
            background-color: #FFD84B;
            color: #000;
            font-weight: bold;
            padding: 10px 30px;
            border: 2px solid black;
        }

        .btn-masuk:hover,
        .btn-daftar:hover {
            opacity: 0.9;
        }

        .logo-text span {
            color: #3A73E6;
        }

        .left-section {
            background-color: #fff;
            padding: 2rem;
        }

        .image-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        @media (max-width: 768px) {
            .left-section {
                text-align: center;
            }
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row min-vh-100">
            <!-- Kiri -->
            <div class="col-md-4 d-flex flex-column justify-content-center align-items-center left-section">
                <img src="https://blogger.googleusercontent.com/img/a/AVvXsEgMYnxQkNg8jyuoaG92-p7hdTRwmlOhfTJ0m9FxXkJ9OOuZndFdWwMvmfzUJyWdTIwlobU0EXNEqfBuj2oGhlUrGB_vfMdizubAIw8eaA_S6n6PlpXeEtgM9QULveudGhtcN7hjFB_eCcRT8EqqG10GJp_OV6tAfkdmCaTp02OO0jAlzk45o8ArqZZISzg"
                     class="mb-3 img-fluid" width="300" alt="Logo EduSMA">
                <p class="text-center mt-2 px-3">
                    EduSMA, Sistem Manajemen Pembelajaran untuk Anda yang saat ini sedang menduduki bangku/kerja di sekolah SMA sederajat
                </p>
                <div class="d-grid gap-3 mt-4 w-75">
                    <a href="{{ __('masuk') }}" class="btn btn-masuk btn-lg">Masuk</a>
                    <a href="{{ __('daftar') }}" class="btn btn-daftar btn-lg">Daftar</a>
                </div>
            </div>

            <!-- Kanan -->
            <div class="col-md-8 image-container p-0">
                <img src="https://1.bp.blogspot.com/-4IJnHwInxa0/U-A1VldC0UI/AAAAAAAADyI/Nzy3JWhmRk4/s1600/DSC02523.JPG"
                     alt="Gambar tidak tersedia" class="img-fluid w-100 h-100">
            </div>
        </div>
    </div>
</body>
</html>
