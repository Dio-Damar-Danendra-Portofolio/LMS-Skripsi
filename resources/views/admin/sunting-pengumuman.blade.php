@extends('layouts.templateadmin')
@section('title', 'Sunting Pengumuman {JudulPengumuman}- EduSMA')
@section('content')
<div class="diodamar">
    <table style="border:none;">
        <tr>
            <td>
                <h1>Sunting {JudulPengumuman}</h1>
            </td>
            </td>
            <td colspan=10>
                <img src="https://www.colorhexa.com/ffffff.png" length="10" width="1">
            </td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>
                <a href="{{ route('admin.pengelola-pengumuman') }}">
                    <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEjbG5kZxZ2y4wxgE4JJFjEkcZcCNcBZC4PGFBJqkRFwQOih8Nknq-3e0ePl0tn8qR2tGkUpISpKm6LCktzqJcQYWQgSLPQQYe44mbtPMe_pJ6zlexrtItAPf0OoibbphhO7gdKxN2uNsJmDX4pS2SKFacCgwa-hO813iN4ij4D7tj_QFRWdASp1708yYdE/s512/left-arrow_44686.png" length="70" width="70">
                </a>
            </td>
        </tr>
    </table>
</div>
<div class="diodamar">
    <div class="grid-container">
        <div class="grid-column">
            <form action=" {{ route('admin.pengelola-pengumuman') }}" method="post">
            @csrf
                <label for="JudulPengumuman">Judul Pengumuman:</label><br>
                <input type="text" name="JudulPengumuman" id="JudulPengumuman">
        </div>
        <div class="grid-column">
            <label for="BerkasPengumuman">Berkas Pengumuman:</label><br>
            <input type="file" name="BerkasPengumuman" id="BerkasPengumuman">
        </div>
        <div class="grid-column">
            <img src="https://www.colorhexa.com/ffffff.png">
        </div>
        <div class="grid-row">
            <label for="IsiPengumuman">Isi Pengumuman: </label>
            <textarea name="IsiPengumuman" id="IsiPengumuman" rows="2" cols="56">
            </textarea>
        </div>
    </div>
    <div class="diodamar">
        <table style="border: none;">
            <tr>
                <td>
                    <button type="submit" class="btn btn-success" style="font-size: 20pt;">Simpan</button>
                </td>
                <td>
                <a href="{{ route('admin.pengelola-pengumuman') }}">
                    <button type="submit" class="btn btn-danger" style="font-size: 20pt;">Batalkan</button>
                </a>
                </td>
            </tr>
        </table>
    @csrf
    </form>
    </div>
</div>
@endsection