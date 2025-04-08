@extends('layouts.templateadmin')
@section('title', 'Pengelola Pengumuman - EduSMA')
@section('content')
<div class="diodamar">
    <table style="border: none;">
        <tr>
            <td>
                <h1>Daftar Pengumuman</h1>
            </td>
            <td colspan = 20>
                <img src="https://www.colorhexa.com/ffffff.png" length = "40" width = "4" />
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
            <td>
                {{ $jumlahPengumuman }} hasil 
            </td>
        </tr>
    </table>
</div>
<br>
<div class="grid-container">
    <a href="{{ route('admin.tambah-pengumuman') }}" style="text-decoration: none; color: black; font-size: 18pt;">
        <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEguLvaWMtyCsxBW0OCGOmTcBdWC5VrX3YGalaFDx2cDxO4OqwDYbSXKUAOIKAEe31IqZIFHemXxoXi_rR-eaWtHufwYcdk0IHN-sqry3uFAGtZbxiepSL0dJNWFQ8-mHkBjTOhpyO4An_vVp2cnznmbtN5qVZvur8QiZVIB4EzHXg82vzj9W5_AOUKh9AE/s512/plus-sign.png" length="30%" width="30%">
        <p>Tambah Pengumuman</p>
    </a>
    <div class="grid-row" style="translate: -100px 0px;">
        @if($dataPengumuman)
        <ul style = "list-style-type: none;">
        @foreach($dataPengumuman as $pengumuman)
            <li>
                <button type="button" class="btn btn-light mb-5" style="font-size: 35pt; border: 1px solid black;">
                    <a href="{{ route('admin.lihat-pengumuman') }}" style = "text-decoration: none; color: black;">
                        {{ $pengumuman->JudulPengumuman ?? 'Tiada' }}
                    </a>
                </button>
                <a href="{{ route('admin.sunting-pengumuman')}}">
                    <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEh_CZMiAEPBD-63RyGe-CSvgoXAJ2pRICfJen4EuhTohyaZfwBMUZpmBDi_gHEEro8pjQSgNzTD4pIYcJvvihLuTUxQDcJFOO5M4CF_DNUUNXt-aer3IVlkKlE-x6Dxk1cgp6eu6D8A-lpO8xCiETJS0VtXFR6O5YnQ9jqGnVxZn8feIg9E8nz17lJNmpQ/s1280/gear-g7cf6af4f4_1280.png" length="10%" width="10%">
                </a>
            </li>
        @endforeach
        </ul>
        @else
        <div class="diodamar" style="font-size: 20pt;">
            <p>Belum ada Pengumuman</p>
        </div>
        <div class="diodamar">
            <img src="https://www.colorhexa.com/ffffff.png" length="100" width="3">
        </div>
        @endif
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
</div>
@endsection