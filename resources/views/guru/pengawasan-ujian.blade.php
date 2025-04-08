@extends('layouts.templateguru')
@section('title', 'Pengawasan Ujian - EduSMA')
@section('content')
<div class="diodamar">
    <div class="grid-container">
        <div class="grid-column">
            <div style="translate: -60px 0px;">
                <h1>Jadwal Ujian Khusus kelas {PeruntukanKelas}</h1>
            </div>
        </div>
        <div class="grid-column">
            <img src="https://www.colorhexa.com/ffffff.png" length="9" width="3">
        </div>
    </div>
</div>
<br>
<div class="diodamar">
    <div style = "font-size: 22pt;">
    <form action="{{ route('guru.pengawasan-ujian') }}" method="post">
    Semester:
        <select name="Semester">
            <option value="Ganjil 2023/2024">Ganjil 2023/2024</option>
            <option value="Genap 2023/2024">Genap 2023/2024</option>
            <option value="Ganjil 2024/2025">Ganjil 2024/2025</option>
            <option value="Genap 2024/2025">Genap 2024/2025</option>
            <option value="Ganjil 2025/2026">Ganjil 2025/2026</option>
            <option value="Genap 2025/2026">Genap 2025/2026</option>
        </select>
        Kelas:
        <select name="Kelas">
            <option value="Kelas X">Kelas X</option>
            <option value="Kelas XI">Kelas XI</option>
            <option value="Kelas XII">Kelas XII</option>
        </select>
        <button class="btn btn-success" type="submit">Cari!</button>
    </div>
</form>  
</div>
<br>
<table>
    <tr>
        <th>Jenis Ujian</th>
        <th>Waktu Ujian</th>
        <th>Ruang Ujian</th>
        <th>Mata Pelajaran</th>
        <th>Soal Ujian</th>
    </tr>
    @for($i = 0; $i < 3; ++$i) 
        <tr>
            <td>{JenisUjian}</td>
            <td>{WaktuUjian}</td>
            <td>{RuangUjian}</td>
            <td><a href="{{ route('guru.sesi-ujian') }}">{MataPelajaran}</a></td>
            <td>
                <a href="uploads/Soal-Ujian/namaBerkasSoalUjian" style="text-decoration: none;">
                    <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEgL3EG67n2OL9XUwEAAy8Ind9-KhNzAUX80IvCsoHlhSPcCOtvL0MBJcguCFE1cyErX4TCTnwZ_ZtBkldHDTLCfmrL7d_lsSFBeGcf7Iz6WScPo4tOd80PwicIQrAHfFQk5mzrhjNxgvZqw6xVRAxZYTru5OWy7GmBXaFT03l9zxtSwFVSwQYmhA0-6kdE/s2000/download%20icon.png" length="11%" width="11%">
                </a>
            </td>
        </tr>
    @endfor
</table>
@endsection