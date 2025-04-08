@extends('layouts.templateadmin')
@section('title', 'Jadwal Baru - EduSMA')
@section('content')
<div class="diodamar">
    <table style="border:none;">
        <tr>
            <td>
                <h1>Jadwal Baru</h1>
            </td>
            <td colspan=10>
                <img src="https://www.colorhexa.com/ffffff.png" length=10 width=1>
            </td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>
                <a href="{{ route('admin.pengelola-jadwal-kelas') }}">
                    <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEjbG5kZxZ2y4wxgE4JJFjEkcZcCNcBZC4PGFBJqkRFwQOih8Nknq-3e0ePl0tn8qR2tGkUpISpKm6LCktzqJcQYWQgSLPQQYe44mbtPMe_pJ6zlexrtItAPf0OoibbphhO7gdKxN2uNsJmDX4pS2SKFacCgwa-hO813iN4ij4D7tj_QFRWdASp1708yYdE/s512/left-arrow_44686.png" length="10%" width="10%">
                </a>
            </td>
        </tr>
    </table>
</div>
<br>
<form action="{{ route('admin.pengelola-jadwal-kelas') }}" method="post">
@csrf
<div class="diodamar">
    <div class="grid-container">
        <div class="grid-column">
            <label for="WaktuPertemuan">Waktu Pertemuan: </label><br>
            <input type="time" name="WaktuPertemuan" id="WaktuPertemuan" required>
        </div>
        <div class="grid-column">
            <label for="JenisPertemuan">Jenis Pertemuan: </label><br>
            <input type="text" name="JenisPertemuan" id="JenisPertemuan" required>
        </div>
        <div class="grid-column">
            <label for="RuangBelajar">Ruang Belajar: </label><br>
            <input type="text" name="RuangBelajar" id="RuangBelajar" required>
        </div>
        <div class="grid-column">
            <label for="PeruntukanKelas">Peruntukan Kelas: </label><br>
            <select name="PeruntukanKelas" id="PeruntukanKelas">
                <option value="X IPA">X IPA</option>
                <option value="X IPS">X IPS</option>
                <option value="X Bahasa">X Bahasa</option>
                <option value="XI IPA">XI IPA</option>
                <option value="XI IPS">XI IPS</option>
                <option value="XI Bahasa ">XI Bahasa</option>
                <option value="XII IPA">XII IPA</option>
                <option value="XII IPS">XII IPS</option>
                <option value="XII Bahasa ">XII Bahasa</option>
            </select>
        </div>
        <div class="grid-column">
            <label for="MataPelajaran">Mata Pelajaran: </label><br>
            <input type="text" name="MataPelajaran" id="MataPelajaran" required>
        </div>
        <div class="grid-column">
            <label for="NamaGuru">Nama Guru: </label><br>
            <input type="text" name="NamaGuru" id="NamaGuru" required>
        </div>
        <div class="grid-column">
            <label for="Semester">Semester: </label><br>
            <input type="text" name="Semester" id="Semester" required>
        </div>
    </div>
    <table style="border:none;">
        <tr>
            <td>
                <button type="submit" class="btn btn-success">Simpan</button>
            </td>
            <td colspan=8>
                <img src="https://www.colorhexa.com/ffffff.png" length=8 width=1>
            </td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>
                <a href="{{ route('admin.pengelola-jadwal-kelas') }}">
                    <button type="button" class="btn btn-danger">Batalkan!</button>
                </a>
            </td>
        </tr>
    </table>
</div>
@csrf
</form>
@endsection