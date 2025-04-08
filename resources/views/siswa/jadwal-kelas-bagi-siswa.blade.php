@extends('layouts.templatesiswa')
@section('title', 'Jadwal Kelas Siswa - EduSMA')
@section('content')
<div style="font-family: Poppins;">
    <h1>Jadwal Kelas khusus {{Auth::user()->KelasSiswa ?? 'Tiada Kelas'}}</h1>
</div>
<br>
<div class = "diodamar">
<form action="{{ route('siswa.jadwal-kelas-bagi-siswa') }}" method="get">
    <label for="Semester">Semester: </label>
    <select name="Semester" id="Semester">
        <option value="Ganjil 2023/2024">Ganjil 2023/2024</option>
        <option value="Genap 2023/2024">Genap 2023/2024</option>
        <option value="Ganjil 2024/2025">Ganjil 2024/2025</option>
        <option value="Genap 2024/2025">Genap 2024/2025</option>
        <option value="Ganjil 2025/2026">Ganjil 2025/2026</option>
        <option value="Genap 2025/2026">Genap 2025/2026</option>
    </select>
    <label for="Kelas">Kelas: </label>
    <select name="Kelas" id="Kelas">
    <option value="X IPA 1">X IPA 1</option>
    <option value="X IPA 2">X IPA 2</option>
    <option value="X IPA 3">X IPA 3</option>
    <option value="X IPS 1">X IPS 1</option>
    <option value="X IPS 2">X IPS 2</option>
    <option value="X IPS 3">X IPS 3</option>
    <option value="XI IPA 1">XI IPA 1</option>
    <option value="XI IPA 2">XI IPA 2</option>
    <option value="XI IPA 3">XI IPA 3</option>
    <option value="XI IPS 1">XI IPS 1</option>
    <option value="XI IPS 2">XI IPS 2</option>
    <option value="XI IPS 3">XI IPS 3</option>
    <option value="XII IPA 1">XII IPA 1</option>
    <option value="XII IPA 2">XII IPA 2</option>
    <option value="XII IPA 3">XII IPA 3</option>
    <option value="XII IPS 1">XII IPS 1</option>
    <option value="XII IPS 2">XII IPS 2</option>
    <option value="XII IPS 3">XII IPS 3</option>
    </select>
    <button type="submit" class = "btn btn-success">Cari!</button>
</form>
</div>
<br>
<div class = "grid-container">
    <div class = "grid-column">
        <table style = "border: 1px solid black; border-collapse: collapse;">
            <tr style = "border: 1px solid black; border-collapse: collapse;">
                <th style = "border: 1px solid black; border-collapse: collapse;">Waktu Pertemuan</th>
                <th style = "border: 1px solid black; border-collapse: collapse;">Mata Pelajaran</th>
                <th style = "border: 1px solid black; border-collapse: collapse;">Jenis Pertemuan</th>
                <th style = "border: 1px solid black; border-collapse: collapse;">Ruang Belajar</th>
            </tr>
            <tr style = "border: 1px solid black; border-collapse: collapse;">
                <td style = "border: 1px solid black; border-collapse: collapse;"><?php echo $dataJadwalKelas['WaktuPertemuan'] ?? 'Waktu tidak tersedia' ?></td>
                <td style = "border: 1px solid black; border-collapse: collapse;"><a href="/NamaMataPelajaran/materi"><?php echo $dataMataPelajaran['NamaMataPelajaran'] ?? 'Mata pelajaran tidak tersedia' ?></a></td>
                <td style = "border: 1px solid black; border-collapse: collapse;"><?php echo $dataJadwalKelas['JenisPertemuan'] ?? 'Jenis Pertemuan Tidak Tersedia' ?></td>
                <td style = "border: 1px solid black; border-collapse: collapse;"><?php echo $dataJadwalKelas['RuangBelajar']?? "Ruang Belajar tidak tersedia" ?></td>
            </tr>
            <tr style = "border: 1px solid black; border-collapse: collapse;">
                <td style = "border: 1px solid black; border-collapse: collapse;"><?php echo "Mon, 12 Feb 2023 10:00:00" ?? 'Waktu tidak tersedia' ?></td>
                <td style = "border: 1px solid black; border-collapse: collapse;"><a href="/NamaMataPelajaran/materi"><?php echo "Pendidikan Agama Islam" ?? 'Mata pelajaran tidak tersedia' ?></a></td>
                <td style = "border: 1px solid black; border-collapse: collapse;"><?php echo "Tatap Muka" ?? 'Belajar mandiri / kelas daring' ?></td>
                <td style = "border: 1px solid black; border-collapse: collapse;"><?php echo "B01"?? "Kelas tidak tersedia" ?></td>
            </tr>
        </table>
    </div>
</div>
@endsection