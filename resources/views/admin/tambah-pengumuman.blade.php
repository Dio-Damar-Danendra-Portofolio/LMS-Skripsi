@extends('layouts.templateadmin')
@section('title', 'Pengumuman Baru - EduSMA')
@section('content')
<div class="diodamar">
    <table style="border:none;">
        <tr>
            <td>
                <h1>Pengumuman Baru</h1>
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
            </td>
        </tr>
    </table>
</div>
<div class="diodamar">
    <div class="grid-container">
        <div class="grid-column">
        <form action=" {{ route('admin.pengelola-pengumuman') }}" method="post">
        @csrf
        <table style="border: none;">
            <tr style="border: none;">
                <td style="border: none;">
                    <label for="JudulPengumuman">Judul Pengumuman:</label><br>
                    <input type="text" name="JudulPengumuman" id="JudulPengumuman">
                </td>
                <td style="border: none;">
                    <label for="BerkasPengumuman">Berkas Pengumuman:</label><br>
                    <input type="file" name="BerkasPengumuman" id="BerkasPengumuman">
                </td>
            </tr>
            <tr>
                <td style="border: none;">
                    <label for="IsiPengumuman">Isi Pengumuman: </label>
                    <textarea name="IsiPengumuman" id="IsiPengumuman" rows="2" cols="56">
                    </textarea>
                </td>
                <td style="border: none;">
                    <img src="https://www.colorhexa.com/ffffff.png" length="20" width="10">
                </td>
            </tr>
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
            @csrf    
            </form>
        </table>
    </div>
</div>
@endsection
