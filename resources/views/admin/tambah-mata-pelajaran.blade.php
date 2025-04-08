@extends('layouts.templateadmin')
@section('title', 'Mata Pelajaran Baru- EduSMA')
@section('content')
<div class="diodamar">
    <table style="border: none;">
        <tr>
            <td>
                <h1>Mata Pelajaran Baru</h1>
            </td>
            <td colspan=10>
                <img src="https://www.colorhexa.com/ffffff.png" length = "10" width = "2">
            </td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>
                <a href="{{ route('admin.pengelola-mata-pelajaran') }}">
                    <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEjbG5kZxZ2y4wxgE4JJFjEkcZcCNcBZC4PGFBJqkRFwQOih8Nknq-3e0ePl0tn8qR2tGkUpISpKm6LCktzqJcQYWQgSLPQQYe44mbtPMe_pJ6zlexrtItAPf0OoibbphhO7gdKxN2uNsJmDX4pS2SKFacCgwa-hO813iN4ij4D7tj_QFRWdASp1708yYdE/s512/left-arrow_44686.png" length="70" width="70">
                </a>
            </td> 
        </tr>
    </table>
</div>
<br>
<div class="grid-container">
    <div class="grid-column">
        <form action="{{ route('admin.pengelola-mata-pelajaran') }}" method="post">
        @csrf
        <table style="border: none;">
            <tr>
                <td>
                    <label for="NamaMataPelajaran">
                        Nama Mata Pelajaran:
                    </label><br>
                    <input type="text" name="NamaMataPelajaran" id="NamaMataPelajaran" required>
                </td>
                <td>
                    <label for="KelompokMataPelajaran">Kelompok Mata Pelajaran: </label><br>
                    <input type="text" name="KelompokMataPelajaran" id="KelompokMataPelajaran" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="NamaGuru">Nama Guru: </label><br>
                    <input type="text" name="NamaGuru" id="NamaGuru" required>
                </td>
                <td>
                    <label for="PeruntukanKelas">Peruntukan Kelas: </label><br>
                    <input type="text" name="PeruntukanKelas" id="PeruntukanKelas" required>
                </td>  
            </tr>
            <tr>
                <td>
                    <button type="submit" class="btn btn-success" style="font-size: 20pt;">Simpan</button>
                </td>
                <td>
                    <a href=" {{ route('admin.pengelola-mata-pelajaran') }}">
                    <button type="button" class="btn btn-danger" style="font-size: 20pt;">Batalkan</button>
                    </a>
                </td>
            </tr>
        </table>
        @csrf
        </form>
    </div>
</div>
@endsection
