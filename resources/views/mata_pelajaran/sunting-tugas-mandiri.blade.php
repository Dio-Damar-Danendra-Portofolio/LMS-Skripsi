@extends('layouts.templateguru')
@section('title', 'Sunting {JudulSoalTugasMandiri} - EduSMA')
@section('content')
<div class="diodamar">
    <table style="border: none;">
        <tr>
            <td>
                <h1>Mapel {NamaMataPelajaran} - Tugas Mandiri yang berjudul {JudulSoalTugasMandiri}</h1>
            </td>
            <td colspan=5>
                <img src="https://www.colorhexa.com/ffffff.png" length = "5" width = "1">
            </td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>
                <a href="{{ route('mata_pelajaran.daftar-tugas-mandiri-khusus-guru') }}">
                    <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEjbG5kZxZ2y4wxgE4JJFjEkcZcCNcBZC4PGFBJqkRFwQOih8Nknq-3e0ePl0tn8qR2tGkUpISpKm6LCktzqJcQYWQgSLPQQYe44mbtPMe_pJ6zlexrtItAPf0OoibbphhO7gdKxN2uNsJmDX4pS2SKFacCgwa-hO813iN4ij4D7tj_QFRWdASp1708yYdE/s512/left-arrow_44686.png" length="55%" width="55%">
                </a>
            </td>
        </tr>
    </table>
</div>
<br>
<div class="diodamar">
    <div class="grid-column">
        <form action="{{ route('mata_pelajaran.daftar-tugas-mandiri-khusus-guru') }}" method="post">
            <table style="border: none;">
                <tr>
                    <td>
                        <label for="JudulSoalTugasMandiri">Judul Soal Tugas Mandiri: </label><br>
                        <input type="text" name="JudulSoalTugasMandiri" id="JudulSoalTugasMandiri" required>
                    </td>
                    <td>
                        <label for="TenggatWaktuTugasMandiri">Tenggat Waktu Tugas Mandiri: </label><br>
                        <input type="time" name="TenggatWaktuTugasMandiri" id="TenggatWaktuTugasMandiri" required>
                    </td>
                    <td>
                        <label for="BerkasTugasMandiri">Berkas Tugas Mandiri: </label><br>
                        <input type="file" name="BerkasTugasMandiri" id="BerkasTugasMandiri" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="MateriSoal">Materi yang terkandung dalam Soal: </label><br>
                        <input type="text" name="MateriSoal" id="MateriSoal" required>
                    </td>
                    <td>
                        <label for="PeruntukanKelas">Peruntukan Kelas: </label><br>
                        <select name="PeruntukanKelas" id="PeruntukanKelas" required>
                            <option value="Kelas X">Kelas X</option>
                            <option value="Kelas XI">Kelas XI</option>
                            <option value="Kelas XII">Kelas XII</option>
                        </select>
                    </td>
                    <td colspan=5>
                        <img src="https://www.colorhexa.com/ffffff.png" length="75" width="75">
                    </td>
                </tr>
                <tr>
                    <td>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </td>
                    <td>
                        <a href="{{ route('mata_pelajaran.daftar-tugas-mandiri-khusus-guru') }}">
                            <button type="button" class="btn btn-danger">Batalkan</button>
                        </a>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>
@endsection