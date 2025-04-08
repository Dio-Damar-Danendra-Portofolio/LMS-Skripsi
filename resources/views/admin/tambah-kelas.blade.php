@extends('layouts.templateadmin')
@section('title', 'Kelas Baru - EduSMA')
@section('content')
<div class="diodamar">
    <div class="grid-container">
        <div class="grid-column">
            <div style="translate: -29px 0px;">
                <h1>Kelas Baru</h1>
            </div>
        </div>
        <div class="grid-column">
            <img src="https://www.colorhexa.com/ffffff.png" length="200" width="10">
        </div>
        <div class="grid-column">
            <div style="translate: 15px 0px;">
                <img src="https://www.colorhexa.com/ffffff.png" length="200" width="10">
            </div>
        </div>
        <div class="grid-column">
        <form action="{{ route('admin.pengelola-kelas') }}" method="post">
        @csrf
        <table style="border: none;">
            <tr style="border: none;">
                <td>
                    <label for="NamaKelas">Nama Kelas: </label><br>
                    <input type="text" name="NamaKelas" id="NamaKelas" required>
                </td>
                <td>
                    <label for="NamaWaliKelas">Nama Wali Kelas: </label><br>
                    <input type="text" name="NamaWaliKelas" id="NamaWaliKelas" required>        
                </td>
            </tr>
            <tr>
                <td>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </td>
                <td>
                    <a href="{{ route('admin.pengelola-kelas') }}">
                        <button type="button" class="btn btn-danger">Batalkan</button>
                    </a>
                </td>
            </tr>
        </table>
        @csrf
        </form>
        </div>
    </div>
</div>
@endsection