@extends('layouts.templateguru')
@section('title', 'Materi Baru - EduSMA')
@section('content')
<div class="diodamar">
    <table style="border: none; font-size: 10pt;">
        <tr>
            <td>
                <h1>Mapel {NamaMataPelajaran} - Materi Baru</h1>
            </td>
            <td colspan= 2>
                <img src="https://www.colorhexa.com/ffffff.png" length = "2" width = "1">
            </td>
            <td></td>
            <td>
                <a href="{{ route('mata_pelajaran.isi-materi-guru') }}">
                    <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEjbG5kZxZ2y4wxgE4JJFjEkcZcCNcBZC4PGFBJqkRFwQOih8Nknq-3e0ePl0tn8qR2tGkUpISpKm6LCktzqJcQYWQgSLPQQYe44mbtPMe_pJ6zlexrtItAPf0OoibbphhO7gdKxN2uNsJmDX4pS2SKFacCgwa-hO813iN4ij4D7tj_QFRWdASp1708yYdE/s512/left-arrow_44686.png" length="55%" width="55%">
                </a>
            </td>
        </tr>
    </table>
</div>
<br>
<div class="diodamar">
    <div class="grid-column">
        <form action="{{ route('mata_pelajaran.isi-materi-guru') }}" method="post">
            <table style="border: none;">
                <tr>
                    <td>
                        <label for="JudulMateri">Judul Materi: </label><br>
                        <input type="text" name="JudulMateri" id="JudulMateri" required>
                    </td>
                    <td>
                        <label for="KIdanKDMateri">KI dan KD Materi: </label><br>
                        <input type="text" name="KIdanKDMateri" id="KIdanKDMateri" required>
                    </td>

                    <td>
                        <label for="TautanZOOM">Tautan ZOOM: </label><br>
                        <input type="text" name="TautanZOOM" id="TautanZOOM">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="KataKunci">Kata Kunci: </label><br>
                        <input type="text" name="KataKunci" id="KataKunci" required>
                    </td>
                    <td>
                        <label for="BerkasMateri">Berkas Materi: </label><br>
                        <input type="text" name="BerkasMateri" id="BerkasMateri" required>
                    </td>
                    <td>
                        <label for="WaktuPertemuan">Waktu Pertemuan: </label><br>
                        <input type="time" name="WaktuPertemuan" id="WaktuPertemuan" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="PeruntukanKelas">Peruntukan Kelas: </label><br>
                        <input type="text" name="PeruntukanKelas" id="PeruntukanKelas" required>
                    </td>
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
        </form>
    </div>
</div>
@endsection