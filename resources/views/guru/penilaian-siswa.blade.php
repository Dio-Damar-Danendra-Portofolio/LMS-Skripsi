@extends('layouts.templateguru')
@section('title', 'Nilai Siswa - EduSMA')
@section('content')
<div class="diodamar">
    <table style="border: none;">
        <tr>
            <th>
                <h1>Nilai Akhir untuk {NamaPertamaPengguna} {NamaTerakhirPengguna}</h1>
            </th>
            <th>
                <img src="https://www.colorhexa.com/ffffff.png" length="200" width="10">
            </th>
            <th>
                <a href="{{ route('guru.input-nilai-akhir') }}">
                    <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEjbG5kZxZ2y4wxgE4JJFjEkcZcCNcBZC4PGFBJqkRFwQOih8Nknq-3e0ePl0tn8qR2tGkUpISpKm6LCktzqJcQYWQgSLPQQYe44mbtPMe_pJ6zlexrtItAPf0OoibbphhO7gdKxN2uNsJmDX4pS2SKFacCgwa-hO813iN4ij4D7tj_QFRWdASp1708yYdE/s512/left-arrow_44686.png" length="50%" width="50%">
                </a>
            </th>
        </tr>
    </table>
</div>
<br>
<div class="diodamar">
    <div class="grid-container">
        <div class="grid-column">
            <table style="border: none;">
                <form action="{{ route('guru.nilai-akhir-siswa') }}" method="post">
                    <tr>
                        <td>
                            <label for="NilaiTugasMandiri">Nilai Tugas Mandiri: </label><br>
                            <input type="text" name="NilaiTugasMandiri" id="NilaiTugasMandiri" pattern="[0-9]*" required>
                        </td>
                        <td>
                            <label for="NilaiUTS">Nilai UTS (Ujian Tengah Semester): </label><br>
                            <input type="text" name="NilaiUTS" id="NilaiUTS" pattern="[0-9]*" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="NilaiUAS">Nilai UAS (Ujian Akhir Semester): </label><br>
                            <input type="text" name="NilaiUAS" id="NilaiUAS" pattern="[0-9]*" required>
                        </td>
                        <td>
                            <label for="NilaiKehadiran">Nilai Kehadiran: </label><br>
                            <input type="text" name="NilaiKehadiran" id="NilaiKehadiran" pattern="[0-9]*" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="NilaiUlanganHarian">Nilai Ulangan Harian: </label><br>
                            <input type="text" name="NilaiUlanganHarian" id="NilaiUlanganHarian" pattern="[0-9]*" required>
                        </td>
                        <td>
                            Nilai Akhir: {Dihitung dengan rumus di controller}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <button type="submit" class="btn btn-success">Simpan!</button>
                        </td>
                        <td>
                            <a href="{{ route('guru.nilai-akhir-siswa') }}">
                                <button type="button" class="btn btn-danger">Batalkan</button>
                            </a>
                        </td>
                    </tr>
                </form>
            </table>
        </div>
    </div>
</div>
@endsection