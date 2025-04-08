@extends('layouts.templateadmin')
@section('title', 'Sunting Forum untuk Mapel {NamaMataPelajaran} - EduSMA')
@section('content')
<div class="diodamar">
    <table style="border: none;">
        <td>
            <tr>
                <h2>Mata Pelajaran {NamaMataPelajaran} - Sunting Rincian Forum</h2>
            </tr>
            <tr>
                <img src="https://www.colorhexa.com/ffffff.png" length="2" width="1">
            </tr>
            <tr>
                <a href="{{ route('admin.lihat-mata-pelajaran') }}">
                    <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEjbG5kZxZ2y4wxgE4JJFjEkcZcCNcBZC4PGFBJqkRFwQOih8Nknq-3e0ePl0tn8qR2tGkUpISpKm6LCktzqJcQYWQgSLPQQYe44mbtPMe_pJ6zlexrtItAPf0OoibbphhO7gdKxN2uNsJmDX4pS2SKFacCgwa-hO813iN4ij4D7tj_QFRWdASp1708yYdE/s512/left-arrow_44686.png" length = "10%" width = "10%">
                </a>
            </tr>
        </td>
    </table>
    <form action="{{ route('admin.lihat-mata-pelajaran') }}" method="post">
        @csrf
        <table style="border: none;">
            <tr>
                <td>
                    <label for="JudulForum">Judul Forum: </label><br>
                    <input type="text" name="JudulForum" id="JudulForum" required>
                </td>
                <td>
                    <label for="DeskripsiForum">Deskripsi Forum: </label><br>
                    <input type="text" name="DeskripsiForum" id="DeskripsiForum" required>
                </td>
            </tr>
            <tr>
                <td colspan=2>
                    <label for="PeruntukanKelas">Peruntukan Kelas: </label><br>
                        <select name="PeruntukanKelas" id="PeruntukanKelas">
                            <option value="Kelas X">Kelas X</option>
                            <option value="Kelas XI">Kelas XI</option>
                            <option value="Kelas XII">Kelas XII</option>
                        </select>
                </td>
                <td>
                </td>
            </tr>
            <tr>
                <td>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </td>
                <td>
                    <a href="{{ route('admin.lihat-mata-pelajaran') }}">
                        <button type="button" class="btn btn-danger">Batalkan</button>
                    </a>
                </td>
            </tr>
        </table>
        @csrf         
    </form>
</div>
@endsection