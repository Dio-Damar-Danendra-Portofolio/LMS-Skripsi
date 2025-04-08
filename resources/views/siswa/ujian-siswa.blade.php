@extends('layouts.templatesiswa')
@section('title', 'Jadwal Ujian Siswa - EduSMA')
@section('content')
<div class = "diodamar">
    <h1>Jadwal Ujian khusus Kelas {{ Auth::user()->KelasSiswa ?? 'Tiada Kelas' }}
    </h1>
    <div style = "font-size: 22pt;">
    <form action = "{{ route('siswa.ujian-siswa') }}" method="get">
    Semester:
        <select name="Semester" id="Semester">
        <option value="Ganjil 2023/2024">Ganjil 2023/2024</option>
        <option value="Genap 2023/2024">Genap 2023/2024</option>
        <option value="Ganjil 2024/2025">Ganjil 2024/2025</option>
        <option value="Genap 2024/2025">Genap 2024/2025</option>
        <option value="Ganjil 2025/2026">Ganjil 2025/2026</option>
        <option value="Genap 2025/2026">Genap 2025/2026</option>
        <option value="Ganjil 2025/2026">Ganjil 2025/2026</option>
        <option value="Genap 2025/2026">Genap 2025/2026</option>
        </select>
    Kelas:
        <select name="Kelas" id="PeruntukanKelas">
            <option value="Kelas X">Kelas X</option>
            <option value="Kelas XI">Kelas XI</option>
            <option value="Kelas XII">Kelas XII</option>
        </select>
        <button class="btn btn-success">Cari!</button>
    </div>
    </form> 
</div>
<br>
<div class = "grid-container">
    <div class = "grid-column">
    <table style = "border: 1px solid black; border-collapse: collapse;" class = "diodamar">
    <tr style = "border: 1px solid black; border-collapse: collapse;" class = "diodamar">
        <th style = "border: 1px solid black; border-collapse: collapse;">Jenis Ujian</th>
        <th style = "border: 1px solid black; border-collapse: collapse;">Waktu Ujian</th>
        <th style = "border: 1px solid black; border-collapse: collapse;">Mata Pelajaran</th>
        <th style = "border: 1px solid black; border-collapse: collapse;">Ruang Ujian</th>
        <th style = "border: 1px solid black; border-collapse: collapse;">Aksi (Tindakan)</th>
    </tr>
    <tr style = "border: 1px solid black; border-collapse: collapse;">
        <td style = "border: 1px solid black; border-collapse: collapse;"><?php echo $DataUjian['JenisUjian'] ?? 'Tiada' ?></td>
        <td style = "border: 1px solid black; border-collapse: collapse;"><?php echo $DataUjian['WaktuUjian'] ?? 'Tiada' ?></td>
        <td style = "border: 1px solid black; border-collapse: collapse;"><?php echo $DataUjian['MataPelajaran'] ?? 'Tiada' ?></td>
        <td style = "border: 1px solid black; border-collapse: collapse;"><?php echo $DataUjian['RuangUjian'] ?? 'Daring'?></td>
        <td style = "border: 1px solid black; border-collapse: collapse;">
            <a href="/uploads/soal-ujian" style = "text-decoration: none;">
                <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEgL3EG67n2OL9XUwEAAy8Ind9-KhNzAUX80IvCsoHlhSPcCOtvL0MBJcguCFE1cyErX4TCTnwZ_ZtBkldHDTLCfmrL7d_lsSFBeGcf7Iz6WScPo4tOd80PwicIQrAHfFQk5mzrhjNxgvZqw6xVRAxZYTru5OWy7GmBXaFT03l9zxtSwFVSwQYmhA0-6kdE/s2000/download%20icon.png" length="9%" width="9%"/>
            </a>
            <a href="#" style = "text-decoration: none;">
                <img src="https://blogger.googleusercontent.com/img/a/AVvXsEia_T3KHwQbmCHjiAIxzpLcEEBNAZ9gc77rQ5eO7QkIa-rHdBehZ2bF2apAbAvqp-OD36ZNhQVtV20d8hv5kxVwz6-H1DKxE22fJ5bJpnLc6iyoAVUvZFxEUlU-WB7GDybv3nwGR3tdvf-SCvfJYn6FXoRz4M_SlgMsDTKqeJNWOy_B2gotSSnoEz7wSGQ" length="11%" width="11%">
            </a>
            <a href="#" style = "text-decoration: none;">
                <img src="https://blogger.googleusercontent.com/img/a/AVvXsEi4Ln-dqnWPwEkfQ-dmNCfziLO3HYVHvzV3CqO3KbeJXYNpRejjlLVmJ0mNhSzYcvwg4oLyn2H6luaCjVBu1sqPiPqttIbVKrDfuSHDX0_O2fwbZ-WnP4c6d5PUX5vI6uFqx-2KPPRLoRkdvWDXKlFCbp046US7GDhBA3P91KLKF6Fht1A7bfQP8Eqbcpk" length="8%" width="8%"/>
            </a>
        </td>
    </tr>
    <tr style = "border: 1px solid black; border-collapse: collapse;">
        <td style = "border: 1px solid black; border-collapse: collapse;">Jenis Ujian</td>
        <td style = "border: 1px solid black; border-collapse: collapse;">Waktu Ujian</td>
        <td style = "border: 1px solid black; border-collapse: collapse;">
        <a href="{{ route('siswa.kelayakan-ujian-siswa') }}">
        Mata Pelajaran
        </a>
        </td>
        <td style = "border: 1px solid black; border-collapse: collapse;">Luring</td>
        <td style = "border: 1px solid black; border-collapse: collapse;">
            <a href="/uploads/soal-ujian/namaBerkasSoalUjian" style = "text-decoration: none;">
                <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEgL3EG67n2OL9XUwEAAy8Ind9-KhNzAUX80IvCsoHlhSPcCOtvL0MBJcguCFE1cyErX4TCTnwZ_ZtBkldHDTLCfmrL7d_lsSFBeGcf7Iz6WScPo4tOd80PwicIQrAHfFQk5mzrhjNxgvZqw6xVRAxZYTru5OWy7GmBXaFT03l9zxtSwFVSwQYmhA0-6kdE/s2000/download%20icon.png" length="9%" width="9%"/>
            </a>
            <a href="#" style = "text-decoration: none;">
                <img src="https://blogger.googleusercontent.com/img/a/AVvXsEia_T3KHwQbmCHjiAIxzpLcEEBNAZ9gc77rQ5eO7QkIa-rHdBehZ2bF2apAbAvqp-OD36ZNhQVtV20d8hv5kxVwz6-H1DKxE22fJ5bJpnLc6iyoAVUvZFxEUlU-WB7GDybv3nwGR3tdvf-SCvfJYn6FXoRz4M_SlgMsDTKqeJNWOy_B2gotSSnoEz7wSGQ" length="11%" width="11%">
            </a>
            <a href="#" style = "text-decoration: none;">
                <img src="https://blogger.googleusercontent.com/img/a/AVvXsEi4Ln-dqnWPwEkfQ-dmNCfziLO3HYVHvzV3CqO3KbeJXYNpRejjlLVmJ0mNhSzYcvwg4oLyn2H6luaCjVBu1sqPiPqttIbVKrDfuSHDX0_O2fwbZ-WnP4c6d5PUX5vI6uFqx-2KPPRLoRkdvWDXKlFCbp046US7GDhBA3P91KLKF6Fht1A7bfQP8Eqbcpk" length="8%" width="8%"/>
            </a>
        </td>
    </tr>
    </table>
    </div>
</div>
@endsection