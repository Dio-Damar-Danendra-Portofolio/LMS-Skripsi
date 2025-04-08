@extends('layouts.templateadmin')
@section('title', 'Pengelola Ujian - EduSMA')
@section('content')
<div class = "diodamar">
    <h1>Pengelola Jadwal Ujian</h1>
</div>
<br>
<div class = "diodamar">
    <form action="{{ route('admin.pengelola-ujian') }}" method="get" style="font-size: 20pt;">
    Semester:
    <select name="Semester">     
        <option value="Ganjil 2023/2024">Ganjil 2023/2024</option>
        <option value="Genap 2023/2024">Genap 2023/2024</option>
        <option value="Ganjil 2024/2025">Ganjil 2024/2025</option>
        <option value="Genap 2024/2025">Genap 2024/2025</option>
    </select>
    Kelas:
    <select name="Kelas">  
        <option value="Pilih Kelas">Pilih Kelas</option>  
        @if($ujian)
            <option>{{ $ujian->PeruntukanKelas }}</option>
        @endif
    </select>
    <button type="submit" class="btn btn-success">Cari!</button>
    </form>
    <div class="grid-container">
        <div class="grid-column">
            <table>
                <tr>
                    <td>Jenis Ujian</td>
                    <td>Waktu Ujian</td>
                    <td>Ruang Ujian</td>
                    <td>Mata Pelajaran</td>
                    <td>Soal Ujian</td>
                </tr>
                @if($dataUjian)
                <tr>
                    @foreach($ujian as $soal)
                    <td>{{ $soal->JenisUjian }}</td>
                    <td>{{ $soal->WaktuUjian }}</td>
                    <td>{{ $soal->RuangUjian }}</td>
                    <td>{{ $soal->MataPelajaran }}</td>
                    <td>
                        <a href="{{ route('admin.pengelola-ujian') }}">
                            <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEgL3EG67n2OL9XUwEAAy8Ind9-KhNzAUX80IvCsoHlhSPcCOtvL0MBJcguCFE1cyErX4TCTnwZ_ZtBkldHDTLCfmrL7d_lsSFBeGcf7Iz6WScPo4tOd80PwicIQrAHfFQk5mzrhjNxgvZqw6xVRAxZYTru5OWy7GmBXaFT03l9zxtSwFVSwQYmhA0-6kdE/s2000/download%20icon.png" length="10%" width="10%">
                        </a>
                        <a href="{{ route('admin.pengelola-ujian') }}">
                            <img src="https://blogger.googleusercontent.com/img/a/AVvXsEi4Ln-dqnWPwEkfQ-dmNCfziLO3HYVHvzV3CqO3KbeJXYNpRejjlLVmJ0mNhSzYcvwg4oLyn2H6luaCjVBu1sqPiPqttIbVKrDfuSHDX0_O2fwbZ-WnP4c6d5PUX5vI6uFqx-2KPPRLoRkdvWDXKlFCbp046US7GDhBA3P91KLKF6Fht1A7bfQP8Eqbcpk" length="10%" width="10%">
                        </a>
                        <a href="{{ route('admin.sunting-ujian') }}">
                            <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEh_CZMiAEPBD-63RyGe-CSvgoXAJ2pRICfJen4EuhTohyaZfwBMUZpmBDi_gHEEro8pjQSgNzTD4pIYcJvvihLuTUxQDcJFOO5M4CF_DNUUNXt-aer3IVlkKlE-x6Dxk1cgp6eu6D8A-lpO8xCiETJS0VtXFR6O5YnQ9jqGnVxZn8feIg9E8nz17lJNmpQ/s1280/gear-g7cf6af4f4_1280.png" length="15%" width="15%">
                        </a>
                    </td>
                    @endforeach
                </tr>
                @else
                    <tr>
                        <td colspan=5>
                            Belum ada Data
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                @endif
            </table>
        </div>
    </div>
    <br>
    <table style="border: none;">
        <tr>
            <td colspan=6>
                <img src="https://www.colorhexa.com/ffffff.png" length="6" width="1">
            </td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td colspan=10>
                <a href="{{ route('admin.tambah-ujian') }}" style="color: black; text-decoration: none; font-size: 22pt;">
                    <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEguLvaWMtyCsxBW0OCGOmTcBdWC5VrX3YGalaFDx2cDxO4OqwDYbSXKUAOIKAEe31IqZIFHemXxoXi_rR-eaWtHufwYcdk0IHN-sqry3uFAGtZbxiepSL0dJNWFQ8-mHkBjTOhpyO4An_vVp2cnznmbtN5qVZvur8QiZVIB4EzHXg82vzj9W5_AOUKh9AE/s512/plus-sign.png" length="40%" width="40%"><br>
                    Tambah Ujian
                </a>
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
        </tr>
    </table>
</div>