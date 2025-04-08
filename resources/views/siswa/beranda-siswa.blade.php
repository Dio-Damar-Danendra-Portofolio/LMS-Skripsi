@extends('layouts.templatesiswa')
@section('title', 'Beranda khusus Siswa - EduSMA')
@section('content')
<div class = "grid-container">
    <div class = "grid-column">
        <div style = "translate: -3px 0px">
        <a href="{{ route('siswa.pengumuman-khusus-siswa') }}"><img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEiG_v1YlV0hio7RF_POc_y79Kn2qSUO-ydADnaTgB1u4b1dUDh0npRwP7_M67lXNqlmUcgB544Vf9aeKkU8CUOe2_jAAX7zWueceHNZkaIVeTywiSdhrejbO5rWD8vPftAAAgkhwKrXJXN-r2aZMgngQuKs8k8HP1ABczcWPZgwcEjYWfcjI0gwDgtv5gY/s2264/Tombol_Berita%20Tentang%20Kegiatan%20Sekolah.png" length = 590 width = 430 /></a>
        </div>
        <img src="https://www.colorhexa.com/ffffff.png" length = 3 width = 49/>
    </div>
    <div class = "grid-column">
    <img src="https://www.colorhexa.com/ffffff.png" length = 32 width = 1/>
        <div style = "translate: 10px 0px;">
        <table style = "border: 1px solid black; border-collapse: collapse;">
            <tr style = "border: 1px solid black; border-collapse: collapse;">
                <th style = "border: 1px solid black; border-collapse: collapse;">Kegiatan Siswa</th>
                <th style = "border: 1px solid black; border-collapse: collapse;">Tempat Pelaksanaan</th>
            </tr>
            <tr style = "border: 1px solid black; border-collapse: collapse;">
                <td style = "border: 1px solid black; border-collapse: collapse;">Belajar secara Mandiri <br>(termasuk <br>mengakses materi <br>tambahan dan <br>mencari kata <br>kunci di Google)</td>
                <td style = "border: 1px solid black; border-collapse: collapse;">Internet</td>
            </tr>
            <tr>
                <td style = "border: 1px solid black; border-collapse: collapse;">Menghadiri Kelas</td>
                <td style = "border: 1px solid black; border-collapse: collapse;">Sekolah</td>
            </tr>
            <tr>
                <td style = "border: 1px solid black; border-collapse: collapse;">Menghadiri Ruang Ujian</td>
                <td style = "border: 1px solid black; border-collapse: collapse;">Sekolah / Rumah</td>
            </tr>
            <tr>
                <td style = "border: 1px solid black; border-collapse: collapse;">Mengerjakan segala tugas <br>(bagian dari belajar) <br>termasuk<br>tugas forum</td>
                <td style = "border: 1px solid black; border-collapse: collapse;">Sekolah, Rumah <br>atau<br> Tempat Lain</td>
            </tr>
        </table>
        <img src="https://www.colorhexa.com/ffffff.png" length = 10 width = 40/>
        </div>
    </div>
    <br/>
    <div class = "grid-column">
        <div style = "translate: 11px 10px;">
            <a href=" {{ route('siswa.jadwal-kelas-bagi-siswa') }}">
            <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEh-0nX4jFv09FDHUF47-nUu8ef2ulhX-LEs02SAE_chMZBk9Vv9aJ4RksvV1_oVSADJovaOnocBc6kHDjoZpQ1BezVy-8gxrgnkHelYJy30OQxyCA4jDsx7OxI4qStgkOubeWJICNdjVc0NUJiOXnzQ_t0ZRInyjawwmOXOd8ToYG_o0wXpZ2Vc12HyCe0/s2264/Tombol_Jadwal%20kegiatan%20belajar%20mengajar.png" length = 502 width = 410/></a>
            <img src="https://www.colorhexa.com/ffffff.png" length = 1 width = 2/>
        </div>
    </div>
    <div class = "grid-column">
        <div style="translate: 34px 10px">
            <a href="{{ route('siswa.kelas-siswa') }}">
                <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEh63X6wkoNEU0TME6jaHUY9tOiV9U1k4B8RfGReIpKwGGr7zL0j3MXtNGe511i4KmTcWF4xbCN3iUjlQbcabNIHnMvKkzOH2OsLUFwI52pOY_T8gr84toY9d97RWId5ET5Xt_qs9SsWnYLER4xWaAkl7BxNaHr0E2wf2SJK7dSdT_n_r8pnYX5GJJfHfKU/s2480/Tombol%20Kelas.png" length=429 width=325>
            </a>
        </div>
    </div>
</div>
@endsection