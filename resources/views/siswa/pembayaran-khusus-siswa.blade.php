@extends('layouts.templatesiswa')
@section('title', 'Daftar Pembayaran khusus Siswa - EduSMA')
@section('content')
<div class = "diodamar">
    <table style="border: none;">
        <tr>
            <th>
                <h1>Pembayaran khusus Siswa</h1>
            </th>
            <th colspan = 20>
                <img src="https://www.colorhexa.com/ffffff.png" length = "35" width = "1" />
            </th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th>
            <?php 
                $JumlahPembayaran = "15";
                echo $JumlahPembayaran." hasil"; 
            ?>
            </th>
        </tr>
    </table>
</div>
<br>
<div class="grid-container">
    <div class="grid-column">
        <img src="https://www.colorhexa.com/ffffff.png" length="10" width="5">
    </div>
    <div class="grid-column">
        <ul style = "list-style-type: none;">
            <li>
                <a href="{{ route('pembayaran.rincian-pembayaran-siswa') }}"><button type="button" class="btn btn-light mb-5" style="font-size: 35pt; border: 1px solid black;"><?php echo $Pembayaran['JenisPembayaran'] ?? 'Belum ada data'; ?></button></a>
            </li>
            <li>
                <a href="{{ route('pembayaran.rincian-pembayaran-siswa') }}"><button type="button" class="btn btn-light mb-5" style="font-size: 35pt; border: 1px solid black;"><?php echo $Pembayaran['JenisPembayaran'] ??  'Belum ada data'; ?></button></a>
            </li>
            <li>
                <a href="{{ route('pembayaran.rincian-pembayaran-siswa') }}"><button type="button" class="btn btn-light mb-5" style="font-size: 35pt; border: 1px solid black;"><?php echo $Pembayaran['JenisPembayaran'] ??  'Belum ada data'; ?></button></a>
            </li>
        </ul>
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
        <form action="{{ __('pembayaran-khusus-siswa') }}" method="get">
            <div class="C--combobox type--1 mb-0 dropdown ml-2">
                <select name="JumlahPembayaran" id="JumlahPembayaran">
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