@extends('layouts.templatesiswa')
@section('title', '{JudulPengumuman} - EduSMA')
@section('content')
<div class="diodamar">
    <table style="border: none;">
        <tr>
            <th>
                <h1><?php echo $DataPengumuman['JudulPengumuman'] ?? 'Judul Tidak Tersedia' ?></h1>
                <?php echo $DataPengumuman['created_at'] ?? 'Tidak Ada' ?>
            </th>
            <th colspan = 10>
                <img src="https://www.colorhexa.com/ffffff.png" length="100" width="1">
            </th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th>
            <a href="{{ route('siswa.pengumuman-khusus-siswa') }}"><img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEjbG5kZxZ2y4wxgE4JJFjEkcZcCNcBZC4PGFBJqkRFwQOih8Nknq-3e0ePl0tn8qR2tGkUpISpKm6LCktzqJcQYWQgSLPQQYe44mbtPMe_pJ6zlexrtItAPf0OoibbphhO7gdKxN2uNsJmDX4pS2SKFacCgwa-hO813iN4ij4D7tj_QFRWdASp1708yYdE/s512/left-arrow_44686.png" length="128" width="128"></th>
            </a> 
        </tr>
    </table>
</div>
<div class="grid-container">
    <div class="grid-column">
        <fieldset style="border: 1px solid black;">
        <table style="border: none; border-collapse: collapse;">
        <tr>
            <td colspan = 2>
                <p><?php echo $DataPengumuman['IsiPengumuman'] ?? "Maaf, saat ini belum ada berita baru dari sekolah... <br> Coba lagi dalam beberapa saat..." ?></p>
            </td>
        </tr>
        <tr>
            <td colspan = 1><img src="https://www.colorhexa.com/ffffff.png" length="11" width="5"></td>
            <td></td>
            <td><a href="/uploads/{JudulPengumuman}"><img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEgL3EG67n2OL9XUwEAAy8Ind9-KhNzAUX80IvCsoHlhSPcCOtvL0MBJcguCFE1cyErX4TCTnwZ_ZtBkldHDTLCfmrL7d_lsSFBeGcf7Iz6WScPo4tOd80PwicIQrAHfFQk5mzrhjNxgvZqw6xVRAxZYTru5OWy7GmBXaFT03l9zxtSwFVSwQYmhA0-6kdE/s2000/download%20icon.png" length="125" width="125"></a></td>
        </tr>
        </table>
        </fieldset>
    </div>
</div>
@endsection