@extends('layouts.templatesiswa')
@section('title', 'Tugas Mandiri {NamaMataPelajaran} - EduSMA')
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
            <a href="{{ route('mata_pelajaran.isi-materi-siswa') }}">
                <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEjbG5kZxZ2y4wxgE4JJFjEkcZcCNcBZC4PGFBJqkRFwQOih8Nknq-3e0ePl0tn8qR2tGkUpISpKm6LCktzqJcQYWQgSLPQQYe44mbtPMe_pJ6zlexrtItAPf0OoibbphhO7gdKxN2uNsJmDX4pS2SKFacCgwa-hO813iN4ij4D7tj_QFRWdASp1708yYdE/s512/left-arrow_44686.png" length=30% width=30%>
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
                        <a href="http://127.0.0.1:8000/uploads/Soal-Tugas-Mandiri/namaBerkas" style="text-decoration: none;">
                            <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEgL3EG67n2OL9XUwEAAy8Ind9-KhNzAUX80IvCsoHlhSPcCOtvL0MBJcguCFE1cyErX4TCTnwZ_ZtBkldHDTLCfmrL7d_lsSFBeGcf7Iz6WScPo4tOd80PwicIQrAHfFQk5mzrhjNxgvZqw6xVRAxZYTru5OWy7GmBXaFT03l9zxtSwFVSwQYmhA0-6kdE/s2000/download%20icon.png" length="8%" width="8%">
                        </a>
                        <a href="{{ __() }}" style="text-decoration: none;">
                            <img src="https://blogger.googleusercontent.com/img/a/AVvXsEia_T3KHwQbmCHjiAIxzpLcEEBNAZ9gc77rQ5eO7QkIa-rHdBehZ2bF2apAbAvqp-OD36ZNhQVtV20d8hv5kxVwz6-H1DKxE22fJ5bJpnLc6iyoAVUvZFxEUlU-WB7GDybv3nwGR3tdvf-SCvfJYn6FXoRz4M_SlgMsDTKqeJNWOy_B2gotSSnoEz7wSGQ" length="8%" width="8%">
                        </a>
                        <a href="{{ __() }}" style="text-decoration: none;">
                            <img src="https://blogger.googleusercontent.com/img/a/AVvXsEi4Ln-dqnWPwEkfQ-dmNCfziLO3HYVHvzV3CqO3KbeJXYNpRejjlLVmJ0mNhSzYcvwg4oLyn2H6luaCjVBu1sqPiPqttIbVKrDfuSHDX0_O2fwbZ-WnP4c6d5PUX5vI6uFqx-2KPPRLoRkdvWDXKlFCbp046US7GDhBA3P91KLKF6Fht1A7bfQP8Eqbcpk" length="8%" width="8%">
                        </a>
                    </td>
                </tr>
                @endfor
            </table>
        </div>
    </div>
</div>
@endsection