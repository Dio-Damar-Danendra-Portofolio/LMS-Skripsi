@extends('layouts.templateguru')
@section('title', 'Ulangan Harian {NamaMataPelajaran} - EduSMA')
@section('content')
<div class="diodamar">
<table style = "border: none;">
    <tr> 
        <td><h1>Ulangan Harian</h1></td>
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
        <td>
            <a href="{{ route('mata_pelajaran.isi-materi-siswa') }}">            
                <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEjbG5kZxZ2y4wxgE4JJFjEkcZcCNcBZC4PGFBJqkRFwQOih8Nknq-3e0ePl0tn8qR2tGkUpISpKm6LCktzqJcQYWQgSLPQQYe44mbtPMe_pJ6zlexrtItAPf0OoibbphhO7gdKxN2uNsJmDX4pS2SKFacCgwa-hO813iN4ij4D7tj_QFRWdASp1708yYdE/s512/left-arrow_44686.png" length="30%" width="30%">
            </a>
        </td>
    </tr>
    </table>
    <table style="border: none;">
        <tr>
        <form action=" {{ route('mata_pelajaran.daftar-ulangan-harian-khusus-guru') }} " method="get">
            <td>
                <label for="Semester">Semester: </label>
                <select name="Semester">
                    <option value="Ganjil 2023/2024">Ganjil 2023/2024</option>
                    <option value="Genap 2023/2024">Genap 2023/2024</option>
                    <option value="Ganjil 2024/2025">Ganjil 2024/2025</option>
                    <option value="Genap 2024/2025">Genap 2024/2025</option>
                </select>
            </td>
            <td>
                <label for="PeruntukanKelas">Peruntukan Kelas: </label>
                <select name="PeruntukanKelas">
                    <option value="Kelas X">Kelas X</option>
                    <option value="Kelas XI">Kelas XI</option>
                    <option value="Kelas XII">Kelas XII</option>
                </select>
            </td>
            <td>
                <button type="submit" class="btn btn-success">Cari!</button>
            </td>
        </form>
        </tr>
        <tr>
            <a href="{{ route('mata_pelajaran.tambah-ulangan-harian') }}">
                <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEguLvaWMtyCsxBW0OCGOmTcBdWC5VrX3YGalaFDx2cDxO4OqwDYbSXKUAOIKAEe31IqZIFHemXxoXi_rR-eaWtHufwYcdk0IHN-sqry3uFAGtZbxiepSL0dJNWFQ8-mHkBjTOhpyO4An_vVp2cnznmbtN5qVZvur8QiZVIB4EzHXg82vzj9W5_AOUKh9AE/s512/plus-sign.png" length="50%" width="50%">
                Tambah Ulangan Harian
            </a>
        </tr>
    </table>
</div>
<br>
<div class="diodamar">
    <div class="grid-container">
        <div class="grid-column">
            <table>
                <tr>
                    <th>Judul Soal Ulangan Harian</th>
                    <th>Jenis Ulangan Harian</th>
                    <th>Materi Ulangan Harian</th>
                    <th>Waktu Ulangan Harian</th>
                    <th>Aksi (Tindakan)</th>
                </tr>
                @for($i = 0; $i < 3; $i++)
                <tr>
                    <td>Lorem ipsum</td>
                    <td>Ulangan Harian Daring</td>
                    <td>ABC, DEF, GHI</td>
                    <td>2019-08-12, 09:00:00</td>
                    <td>
                        <a href="{{ __('uploads/Ulangan-Harian/{JudulSoalUlanganHarian}') }}" style="text-decoration: none;">
                            <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEjyfYtyjNqTbGK8Mato5W-jhnmjTF0cbY2HXPW8h7zyDNNYYtXDakG4DwlyxN0c7ivmRzEC6EHhVY-BQ7p5jfRgKHE7OQw1wEicMEMnCnCmB1pc7UwIBv0-MGjdX5n8cfmo_NrTdWXsSfKSW_4dIb16Ki2DRFpPdPbvFXn31JLnegK4bzN8P7RMq6dtDLM/s4848/Eye%20Icon.png" length="50%" width="50%">
                        </a>
                        <a href="{{ route('mata_pelajaran.sunting-ulangan-harian') }}" style="text-decoration: none;">
                            <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEh_CZMiAEPBD-63RyGe-CSvgoXAJ2pRICfJen4EuhTohyaZfwBMUZpmBDi_gHEEro8pjQSgNzTD4pIYcJvvihLuTUxQDcJFOO5M4CF_DNUUNXt-aer3IVlkKlE-x6Dxk1cgp6eu6D8A-lpO8xCiETJS0VtXFR6O5YnQ9jqGnVxZn8feIg9E8nz17lJNmpQ/s1280/gear-g7cf6af4f4_1280.png" length="50%" width="50%">
                        </a>
                        <a href="javascript:void(0);" style="text-decoration: none;">
                            <button type="button" class="btn btn-success">
                                <img src="https://blogger.googleusercontent.com/img/a/AVvXsEjC1We6jwSuWM1h07jXCQm_e3EZEBfCmy_Fk3GkQRtA01TOO2TZAG5LVsD5PQzxDIcftzY-ihWoFdpiweKRQ71Da3Z7GZugIk4wL69D_rhc2CoaNd1S380P-LYSUi6taqvEeL5MnVz3cNs02JTX8DCVVHk4bhp2KsjaMQTOLCY3rFpE1DQsg6HicDYO_sw" length="50%" width="50%">
                            </button>
                        </a>
                    </td>
                </tr>
                @endfor
            </table>
        </div>
    </div>
</div>
@endsection