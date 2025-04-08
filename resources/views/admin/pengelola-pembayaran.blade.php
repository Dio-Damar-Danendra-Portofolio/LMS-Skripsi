@extends('layouts.templateadmin')
@section('title', 'Pengelola Pembayaran - EduSMA')
@section('content')
<div class="diodamar">
    <table style="border: none;">
        <tr>
            <td>
                <h1>Daftar Pembayaran</h1>
            </td>
            <td colspan=20>
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
                {{ $jumlahPembayaran }} hasil
            </td>
        </tr>
    </table>
</div>
<div class="grid-container">
    <a href="{{ route('admin.tambah-pembayaran') }}" style="text-decoration: none; color: black; font-size: 23pt;">
        <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEguLvaWMtyCsxBW0OCGOmTcBdWC5VrX3YGalaFDx2cDxO4OqwDYbSXKUAOIKAEe31IqZIFHemXxoXi_rR-eaWtHufwYcdk0IHN-sqry3uFAGtZbxiepSL0dJNWFQ8-mHkBjTOhpyO4An_vVp2cnznmbtN5qVZvur8QiZVIB4EzHXg82vzj9W5_AOUKh9AE/s512/plus-sign.png" length="50%" width="50%">
        <p>Tambah Pembayaran</p>
    </a>
    <div class="grid-row" style="translate: -100px 0px;">
        <ul style = "list-style-type: none;">
        @if($dataPembayaran)
        @foreach($dataPembayaran as $pembayaran)
            <li>
                <a href="{{ route('pembayaran.lihat-pembayaran') }}">
                    <button type="button" class="btn btn-light mb-5" style="font-size: 35pt; border: 1px solid black;">{{ $pembayaran->NamaPembayaran }}</button>
                </a>
                <a href="{{ route('admin.sunting-pembayaran') }}">
                    <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEh_CZMiAEPBD-63RyGe-CSvgoXAJ2pRICfJen4EuhTohyaZfwBMUZpmBDi_gHEEro8pjQSgNzTD4pIYcJvvihLuTUxQDcJFOO5M4CF_DNUUNXt-aer3IVlkKlE-x6Dxk1cgp6eu6D8A-lpO8xCiETJS0VtXFR6O5YnQ9jqGnVxZn8feIg9E8nz17lJNmpQ/s1280/gear-g7cf6af4f4_1280.png" length="5%" width="5%">
                </a>    
            </li>
        @endforeach
        @else
            <li>
                Belum ada Pembayaran
            </li>
        </ul>
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
</div>
@endsection
