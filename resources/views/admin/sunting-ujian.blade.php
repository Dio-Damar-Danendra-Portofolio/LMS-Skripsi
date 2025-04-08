@extends('layouts.templateadmin')
@section('title', 'Ujian {JenisUjian} pada {WaktuUjian} - EduSMA')
@section('content')
<div class="diodamar">
    <form action="{{ route('admin.pengelola-ujian') }}" method="post">
    @csrf
            <table style="border: none;">
            <tr>
                <td>
                    <h1>Ujian </h1>
                </td>
                <td>
                    <img src="https://www.colorhexa.com/ffffff.png" length="3" width="1">
                </td>
                <td>
                    <a href="{{ route('admin.pengelola-ujian') }}">
                        <img style="translate: 220px 0px;" src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEjbG5kZxZ2y4wxgE4JJFjEkcZcCNcBZC4PGFBJqkRFwQOih8Nknq-3e0ePl0tn8qR2tGkUpISpKm6LCktzqJcQYWQgSLPQQYe44mbtPMe_pJ6zlexrtItAPf0OoibbphhO7gdKxN2uNsJmDX4pS2SKFacCgwa-hO813iN4ij4D7tj_QFRWdASp1708yYdE/s512/left-arrow_44686.png" length="20%" width="20%">
                    </a>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="JenisUjian">Jenis Ujian: </label><br>
                    <input type="text" name="JenisUjian" id="JenisUjian" required>
                </td>
                <td>
                    <label for="JudulSoalUjian">Judul Soal Ujian: </label><br>
                    <input type="text" name="JudulSoalUjian" id="JudulSoalUjian" required>
                </td>
                <td>
                    <label for="RuangUjian">Ruang Ujian: </label><br>
                    <input type="text" name="RuangUjian" id="RuangUjian" required>   
                </td>
            </tr>
        </table>
        <table style="border: none;">
            <tr>
                <td>
                    <label for="SoalUjian">Soal Ujian: </label><br>
                    <input type="file" name="SoalUjian" id="SoalUjian">
                </td>
                <td>
                    <label for="NamaGuruMataPelajaran">Nama Guru Mata Pelajaran: </label><br>
                    <input type="text" name="NamaGuruMataPelajaran" id="NamaGuruMataPelajaran" required>
                </td>
                <td>
                    <label for="WaktuUjian">Waktu Ujian: </label><br>
                    <input type="time" name="WaktuUjian" id="WaktuUjian" required>
                </td>
            </tr>
        </table>
        <table style="border: none;">
            <tr>
                <td>
                    <label for="MataPelajaran">Mata Pelajaran: </label><br>
                    <input type="text" name="MataPelajaran" id="MataPelajaran" required>
                </td>
                <td>
                    <label for="PeruntukanKelas">Peruntukan Kelas: </label><br>
                    <input type="text" name="PeruntukanKelas" id="PeruntukanKelas" required>
                </td>
                <td>
                    <label for="Semester">Semester: </label><br>
                    <select name="Semester" id="Semester" required>
                    <option value="Pilih Semester">Pilih Semester</option>
                    <option value="Ganjil 2023/2024">Ganjil 2023/2024</option>
                    <option value="Genap 2023/2024">Genap 2023/2024</option>
                    <option value="Ganjil 2024/2025">Ganjil 2024/2025</option>
                    <option value="Genap 2024/2025">Genap 2024/2025</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan=2>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </td>
                <td></td>
                <td>
                    <a href="{{ route('admin.pengelola-ujian') }}">
                        <button type="button" class="btn btn-danger">Batalkan</button>
                    </a>
                </td>
            </tr>
        </table>
    </div>
    @csrf
    </form>
</div>
@endsection