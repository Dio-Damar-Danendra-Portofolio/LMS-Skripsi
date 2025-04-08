@extends('layouts.templateguru')
@section('title', 'Absensi Mapel {NamaMataPelajaran} - EduSMA')
@section('content')
<div class="diodamar">
    <div class="grid-container">
        <div class="grid-column">
            <h1>Absensi Mapel {NamaMataPelajaran} </h1>
        </div>
        <div class="grid-column">
            <img src="https://www.colorhexa.com/ffffff.png" length=120 width=2>
        </div>
        <div class="grid-column">
            <a href="{{ route('mata_pelajaran.isi-materi-guru') }}">
                <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEjbG5kZxZ2y4wxgE4JJFjEkcZcCNcBZC4PGFBJqkRFwQOih8Nknq-3e0ePl0tn8qR2tGkUpISpKm6LCktzqJcQYWQgSLPQQYe44mbtPMe_pJ6zlexrtItAPf0OoibbphhO7gdKxN2uNsJmDX4pS2SKFacCgwa-hO813iN4ij4D7tj_QFRWdASp1708yYdE/s512/left-arrow_44686.png" length="28%" width="28%">
            </a>
        </div>
        <form action="{{ route('guru.absensi') }}" method="post">
        <div class="grid-column">
            <label for="Semester">Semester: </label>
            <select name="Semester" id="Semester">
                <option value="Semester Ganjil">Semester Ganjil</option>
                <option value="Semester Genap">Semester Genap</option>
            </select>
        </div>
        <div class="grid-column">
            <label for="SesiMateri">Materi: </label>
            <select name="SesiMateri" id="SesiMateri">
                <option value="Materi A">Materi A</option>
                <option value="Materi B">Materi B</option>
                <option value="Materi C">Materi C</option>
            </select>
        </div>
    </div>
</div>
<br>
<br>
<div class="diodamar">
        <div class="grid-container">
            <div class="grid-column"> 
                <table>
                    <tr>
                        <th>Nomor Induk Siswa</th>
                        <th>Nama Lengkap Siswa</th>
                        <th>Status Kehadiran</th>
                        <th>Waktu Check-in</th>
                        <th>Alasan Ketidakhadiran</th>
                        <th>Status Keterlambatan</th>
                        <th>Alasan Keterlambatan</th>
                    </tr>
                    <tr>
                        <td>{NomorIndukPengguna}</td>
                        <td>{NamaPertamaPengguna} {NamaTerakhirPengguna}</td>
                        <td>
                            <input type="text" name="StatusKehadiran" id="StatusKehadiran" required>
                        </td>
                        <td>
                            <input type="time" name="WaktuCheckIn" id="WaktuCheckIn" required>
                        </td>
                        <td>
                            <input type="text" name="PenyebabKetidakHadiran" id="PenyebabKetidakHadiran">
                        </td>
                        <td>
                            <input type="checkbox" name="StatusKeterlambatan" id="StatusKeterlambatan">
                        </td>
                        <td>
                            <input type="text" name="PenyebabKeterlambatan" id="PenyebabKeterlambatan">
                        </td>
                    </tr>
                </table>
            </div>
            <div class="grid-column">
                <table style="border: none;">
                    <tr>
                        <td>
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </td>
                        <td>
                            <a href="{{ route('mata_pelajaran.isi-materi-guru') }}">
                                <button type="button" class="btn btn-danger">Batalkan</button>
                            </a>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </form>
</div>
@endsection