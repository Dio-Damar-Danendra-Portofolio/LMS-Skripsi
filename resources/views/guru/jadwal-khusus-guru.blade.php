@extends('layouts.templateguru')
@section('title', 'Jadwal Mengajar Khusus Guru')
@section('content')
<div style="font-family: poppins; translate: 24px 0px;">
    <h1>Jadwal Guru Mengajar</h1>
</div>
<br>
<br>
<div style="font-family: poppins; font-size: 23pt; translate: 25px 0px;">
<label for="Semester">Semester: </label>
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
</div>
<br>
<br>
<br>
    <table>
        <thead>
            <th>Waktu Pertemuan</th>
            <th>Mata Pelajaran</th>
            <th>Jenis Pertemuan</th>
            <th>Ruang Belajar</th>
            <th>Kelas</th>
        </thead>
        <tbody>
            <tr>
                <td>(Waktu Pertemuan)</td>
                <td>(Mapel)</td>
                <td>(Jenis Pertemuan)</td>
                <td>(Ruang Belajar)</td>
                <td>(Kelas)</td>
            </tr>
            <tr>
                <td>(Waktu Pertemuan)</td>
                <td>(Mapel)</td>
                <td>(Jenis Pertemuan)</td>
                <td>(Ruang Belajar)</td>
                <td>(Kelas)</td>
            </tr>
            <tr>
                <td>(Waktu Pertemuan)</td>
                <td>(Mapel)</td>
                <td>(Jenis Pertemuan)</td>
                <td>(Ruang Belajar)</td>
                <td>(Kelas)</td>
            </tr>
            <tr>
                <td>(Waktu Pertemuan)</td>
                <td>(Mapel)</td>
                <td>(Jenis Pertemuan)</td>
                <td>(Ruang Belajar)</td>
                <td>(Kelas)</td>
            </tr>
            <tr>
                <td>(Waktu Pertemuan)</td>
                <td>(Mapel)</td>
                <td>(Jenis Pertemuan)</td>
                <td>(Ruang Belajar)</td>
                <td>(Kelas)</td>
            </tr>
        </tbody>
    </table>

@endsection