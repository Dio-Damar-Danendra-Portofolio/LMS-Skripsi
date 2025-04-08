@extends('layouts.templatesiswa')
@section('title','Pengumuman khusus Siswa - EduSMA')
@section('content')
<div class="diodamar">
    <table style="border: none; margin-bottom: 20px;">
        <tr>
            <th>
                <h1>Daftar Pengumuman khusus Siswa</h1>
            </th>
            <th colspan = 10>
                <img src="https://www.colorhexa.com/ffffff.png" length = "19" width = "4" />
            </th>
            <th></th>
            <th></th>
            <th></th>
            <th>
                <!-- COUNT(IDPengumuman) FROM Pengumuman -->
                <?php 
                $JumlahPengumuman = 100;
                echo $JumlahPengumuman." hasil"; 
                ?>
            </th>
        </tr>
    </table>
</div>
<br>
<div class="grid-container">
    <div class="grid-column">
        <img src="https://www.colorhexa.com/ffffff.png" length ="10" width = "5" />
    </div>
    <div class="grid-column">
        <!-- Menampilkan Data Pengumuman -->
        <?php #foreach(){ ?>
        <ul style = "list-style-type: none;">
            <li><button type="button" class="btn btn-light mb-5" style="font-size: 35pt; border: 1px solid black;"><a href="{{ route('siswa.isi-pengumuman') }}" style = "text-decoration: none; color: black;"><?php echo $DataPengumuman['JudulPengumuman'] ?? 'Tiada' ?></a></button></li>
            <li><button type="button" class="btn btn-light mb-5" style="font-size: 35pt; border: 1px solid black;"><a href="{{ route('siswa.isi-pengumuman') }}" style = "text-decoration: none; color: black;"><?php echo $DataPengumuman['JudulPengumuman'] ?? 'Tiada' ?></a></button></li>
            <li><button type="button" class="btn btn-light mb-5" style="font-size: 35pt; border: 1px solid black;"><a href="{{ route('siswa.isi-pengumuman') }}" style = "text-decoration: none; color: black;"><?php echo $DataPengumuman['JudulPengumuman'] ?? 'Tiada' ?></a></button></li>
            <li><button type="button" class="btn btn-light mb-5" style="font-size: 35pt; border: 1px solid black;"><a href="{{ route('siswa.isi-pengumuman') }}" style = "text-decoration: none; color: black;"><?php echo $DataPengumuman['JudulPengumuman'] ?? 'Tiada' ?></a></button></li>
            <li><button type="button" class="btn btn-light mb-5" style="font-size: 35pt; border: 1px solid black;"><a href="{{ route('siswa.isi-pengumuman') }}" style = "text-decoration: none; color: black;"><?php echo $DataPengumuman['JudulPengumuman'] ?? 'Tiada' ?></a></button></li>
        </ul>
        <?php #} ?>
    </div>
</div>
<div class="grid-column">
    <img src="https://www.colorhexa.com/ffffff.png" length ="2" width = "1" />
</div>
<div class="grid-column">
    <img src="https://www.colorhexa.com/ffffff.png" length ="2" width = "1" />
</div>
<div class="grid-column">
    <div class="d-flex align-items-center mr-4">
        <span>Tampilkan: </span> 
        <form action="{{ route('siswa.pengumuman-khusus-siswa') }}" method="get">
            <div class="C--combobox type--1 mb-0 dropdown ml-2">
                <select name="JumlahPengumuman" id="JumlahPengumuman">
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="15">15</option>
                    <option value="20">20</option>
                </select>
            </div>
        </form>
    </div>
    <div class="ml-3">
        <nav class="responsive-button" aria-label="pagination">
                <ul class="pagination">
                    <li class="page-item">
                        <button type="button" class="page-link" aria-label="Pertama">
                            <span aria-hidden="true"><<</span>
                            <span class="sr-only">Pertama</span>
                        </button>
                    </li>
                    <li class="page-item">
                        <button type="button" class="page-link" aria-label="Sebelumnya">
                        <span aria-hidden="true"><</span>
                        <span class="sr-only">Sebelumnya</span>
                    </button>
                    </li>
                    <li class="page-item">
                    <button type="button" class="page-link" aria-label="Berikutnya">
                        <span aria-hidden="true"> > </span> 
                        <span class="sr-only">Berikutnya</span>
                    </button>
                    </li>
                    <li class="page-item">
                    <button type="button" class="page-link" aria-label="Terakhir">
                        <span aria-hidden="true">>> </span>
                        <span class="sr-only">Terakhir</span>
                    </button>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
@endsection