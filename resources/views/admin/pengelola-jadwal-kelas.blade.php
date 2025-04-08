@extends('layouts.templateadmin')
@section('title', 'Pengelola Jadwal Kelas - EduSMA')
@section('content')
<div class="diodamar">
    <h1>Pengelola Jadwal Kelas</h1>
</div>
<br>
<div class="diodamar">
    <table style="border: none;">
    <form action="{{ route('admin.pengelola-jadwal-kelas') }}" method="get">
    <tr>
        <td>
        <label for="Semester">Semester: </label> 
        <select name="Semester" id="Semester">
            <option value="Pilih Semester">Pilih Semester</option>
            <option>{{ Auth::user()->Semester ?? 'Tiada' }}</option>
        </select>
        </td>
        <td>
        <label for="PeruntukanKelas">Kelas: </label>
        <select name="Kelas" id="PeruntukanKelas">
            <option value="Pilih Kelas">Pilih Kelas</option>
            @if($kelas)
            @foreach($kelas as $namaKelas)
            <option value="{{ $namaKelas->NamaKelas }}">{{ $namaKelas->NamaKelas }}</option>
            @endforeach
            @endif
        </select>
        </td>
        <td>
            <button type="submit" class="btn btn-success">Cari!</button>
        </td>
    </form>
    </tr>
    </table>
</div>
<div class="diodamar">
    <div class="grid-container">
        <div class="grid-column">
            <table style="border: 1px solid black; border-collapse: collapse;">
                <tr style="border: 1px solid black; border-collapse: collapse;">
                    <th style = "border: 1px solid black; border-collapse: collapse;">Waktu Pertemuan</th>
                    <th style = "border: 1px solid black; border-collapse: collapse;">Mata Pelajaran</th>
                    <th style = "border: 1px solid black; border-collapse: collapse;">Jenis Pertemuan</th>
                    <th style = "border: 1px solid black; border-collapse: collapse;">Ruang Belajar</th>
                </tr>
                <tr>
                    @if($jadwal)
                    @foreach($jadwal as $jadwalKelas)
                        <td style = "border: 1px solid black; border-collapse: collapse;">{{ $jadwalKelas->WaktuPertemuan }}</td>
                        <td style = "border: 1px solid black; border-collapse: collapse;">{{ $jadwalKelas->MataPelajaran }}</td>
                        <td style = "border: 1px solid black; border-collapse: collapse;">{{ $jadwalKelas->JenisPertemuan }}</td>
                        <td style = "border: 1px solid black; border-collapse: collapse;">{{ $jadwalKelas->RuangBelajar }}</td>
                        <td style = "border: 1px solid black; border-collapse: collapse;">
                            <a href="{{ route('admin.sunting-jadwal-kelas') }}">
                                <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEh_CZMiAEPBD-63RyGe-CSvgoXAJ2pRICfJen4EuhTohyaZfwBMUZpmBDi_gHEEro8pjQSgNzTD4pIYcJvvihLuTUxQDcJFOO5M4CF_DNUUNXt-aer3IVlkKlE-x6Dxk1cgp6eu6D8A-lpO8xCiETJS0VtXFR6O5YnQ9jqGnVxZn8feIg9E8nz17lJNmpQ/s1280/gear-g7cf6af4f4_1280.png" length="15%" width="15%">
                                <img src="https://blogger.googleusercontent.com/img/a/AVvXsEjC1We6jwSuWM1h07jXCQm_e3EZEBfCmy_Fk3GkQRtA01TOO2TZAG5LVsD5PQzxDIcftzY-ihWoFdpiweKRQ71Da3Z7GZugIk4wL69D_rhc2CoaNd1S380P-LYSUi6taqvEeL5MnVz3cNs02JTX8DCVVHk4bhp2KsjaMQTOLCY3rFpE1DQsg6HicDYO_sw" length="15%" width="15%">
                            </a>
                        </td>
                    @endforeach
                    @else
                    <td colspan = 3 style = "border: 1px solid black; border-collapse: collapse;">
                        Belum ada jadwal kelas
                    </td>
                    <td style = "border: 1px solid black; border-collapse: collapse;"></td>
                    <td style = "border: 1px solid black; border-collapse: collapse;"></td>
                    <td style = "border: 1px solid black; border-collapse: collapse;"></td>
                    @endif
                </tr>
            </table>
            <br>
            <br>
            <a href="{{ route('admin.tambah-jadwal-kelas') }}" style="text-decoration: none; color: black;">
                <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEguLvaWMtyCsxBW0OCGOmTcBdWC5VrX3YGalaFDx2cDxO4OqwDYbSXKUAOIKAEe31IqZIFHemXxoXi_rR-eaWtHufwYcdk0IHN-sqry3uFAGtZbxiepSL0dJNWFQ8-mHkBjTOhpyO4An_vVp2cnznmbtN5qVZvur8QiZVIB4EzHXg82vzj9W5_AOUKh9AE/s512/plus-sign.png" length="30%" width="30%">
                <div class="diodamar" style="font-size: 30pt;">
                Tambah Jadwal Kelas
                </div>
            </a>
        </div>
    </div>
</div>
@endsection