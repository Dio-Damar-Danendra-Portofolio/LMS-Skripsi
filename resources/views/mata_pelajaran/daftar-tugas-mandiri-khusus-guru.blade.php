@extends('layouts.templateguru')
@section('title', 'Daftar Tugas Mandiri - EduSMA')
@section('content')
<div class = "diodamar">
    <table style = "border: none;">
    <tr>
        <td>
            <h1><?php echo $dataMataPelajaran['NamaMataPelajaran'] ?? 'Tidak Tersedia' ?></h1>
        </td>
        <td colspan=5>
            <img src="https://www.colorhexa.com/ffffff.png" length=5 width=1>
        </td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td>
            <a href="{{ route('mata_pelajaran.isi-materi-guru') }}">
                <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEjbG5kZxZ2y4wxgE4JJFjEkcZcCNcBZC4PGFBJqkRFwQOih8Nknq-3e0ePl0tn8qR2tGkUpISpKm6LCktzqJcQYWQgSLPQQYe44mbtPMe_pJ6zlexrtItAPf0OoibbphhO7gdKxN2uNsJmDX4pS2SKFacCgwa-hO813iN4ij4D7tj_QFRWdASp1708yYdE/s512/left-arrow_44686.png" length=30% width=30%>
            </a>
        </td>
    </tr>
    </table>
    <table style="border: none;">
        <tr>
            <td colspan=6>
                <img src="https://www.colorhexa.com/ffffff.png" length=6 width=1>
            </td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>
                <a href="{{ route('mata_pelajaran.tambah-tugas-mandiri') }}">
                    <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEguLvaWMtyCsxBW0OCGOmTcBdWC5VrX3YGalaFDx2cDxO4OqwDYbSXKUAOIKAEe31IqZIFHemXxoXi_rR-eaWtHufwYcdk0IHN-sqry3uFAGtZbxiepSL0dJNWFQ8-mHkBjTOhpyO4An_vVp2cnznmbtN5qVZvur8QiZVIB4EzHXg82vzj9W5_AOUKh9AE/s512/plus-sign.png" length="18%" width="18%">
                    Tambah Soal Tugas Mandiri
                </a>
            </td>
        </tr>
    </table> 
</div>
<br>
<div class="diodamar">
    <div class="grid-container">
        <div class="grid-column">
            <table>
                <tr>
                    <th>Judul Tugas Mandiri</th>
                    <th>Tenggat Waktu (Deadline)</th>
                    <th>Materi</th>
                    <th>Tindakan</th>
                </tr>
                @for($i = 0; $i < 3; $i++)
                <tr>
                    <td>
                        JudulTugasMandiri
                    </td>
                    <td>
                        TenggatWaktuTugasMandiri
                    </td>
                    <td>
                        MateriSoal
                    </td>
                    <td>
                        <a href="http://127.0.0.1:8000/uploads/uploads/Soal-Tugas-Mandiri/namaBerkas" style="text-decoration: none;">
                            <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEgL3EG67n2OL9XUwEAAy8Ind9-KhNzAUX80IvCsoHlhSPcCOtvL0MBJcguCFE1cyErX4TCTnwZ_ZtBkldHDTLCfmrL7d_lsSFBeGcf7Iz6WScPo4tOd80PwicIQrAHfFQk5mzrhjNxgvZqw6xVRAxZYTru5OWy7GmBXaFT03l9zxtSwFVSwQYmhA0-6kdE/s2000/download%20icon.png" length="8%" width="8%">
                        </a>
                        <a href="sunting-tugas-mandiri" style="text-decoration: none;">
                            <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEh_CZMiAEPBD-63RyGe-CSvgoXAJ2pRICfJen4EuhTohyaZfwBMUZpmBDi_gHEEro8pjQSgNzTD4pIYcJvvihLuTUxQDcJFOO5M4CF_DNUUNXt-aer3IVlkKlE-x6Dxk1cgp6eu6D8A-lpO8xCiETJS0VtXFR6O5YnQ9jqGnVxZn8feIg9E8nz17lJNmpQ/s1280/gear-g7cf6af4f4_1280.png" length="30%" width="30%">
                        </a>
                        <a href="javascript:void(0);" style="text-decoration: none;">
                            <button type="button" class="btn btn-clear">
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