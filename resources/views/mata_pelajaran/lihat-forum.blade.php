@extends('layouts.templateadmin')
@section('title', 'Forum untuk Mapel {{MataPelajaran}} - EduSMA')
@section('content')
<div class = "diodamar">
<table style = "border: none;">
<tr>
    <th>
        <h1>{{ $dataForum->JudulForum ?? 'Tidak Ada Judul Forum' }}</h1>
        <p>{{ $dataForum->DeskripsiForum ?? 'Tidak Ada Deskripsi Forum' }}</p>
    </th>
    <th colspan = 10>
        <img src="https://www.colorhexa.com/ffffff.png" length="12" width="1">
    </th>
    <th></th>
    <th></th>
    <th></th>
    <th></th>
    <th></th>
    <th></th>
    <th></th>
    <th></th>
    <th></th>
    <th></th>
    <th></th>
    <th></th>
    <th>
        <a href="{{ route('admin.lihat-mata-pelajaran') }}"><img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEjbG5kZxZ2y4wxgE4JJFjEkcZcCNcBZC4PGFBJqkRFwQOih8Nknq-3e0ePl0tn8qR2tGkUpISpKm6LCktzqJcQYWQgSLPQQYe44mbtPMe_pJ6zlexrtItAPf0OoibbphhO7gdKxN2uNsJmDX4pS2SKFacCgwa-hO813iN4ij4D7tj_QFRWdASp1708yYdE/s512/left-arrow_44686.png" length="70" width="70"></a>
    </th>
</tr>
</table>
</div>
<br>
<div class = "grid-container">
    <div class = "grid-column">
        <ul class = "nav nav-item">
        @if($dataMateri)
            <li style="margin-right: 40px;">
                <button type="button" class="btn btn-danger">{{ $dataMateri->JudulMateri ?? 'Materi Tidak Tersedia' }}</button>
            </li>
        @endif
        @if($dataMateri)
            <li class = "tab-item default dropdown nav-item" style="height: 51px;">
            <a aria-expanded="true" aria-haspopup="true" href="#" class="active tab-item-link pt-4 dropdown-toggle dropdown-toggle nav-link" style="color: white; background-color: red;">
            <div tabindex="-1" role="menu" aria-hidden="true" class = "tab-item tab-menu dropdown-menu dropdown-menu-right">
            <a class="tab-menu-link default nav-link" style="position: relative; will-change: transform; top: 0px; left: 0px; transform: translate3d(-136px, 51px, 0px);" x-placement = "bottom-end">Materi ABC</a>
            @foreach($dataMateri as $materi)
            <a class="tab-menu-link default nav-link" style="position: relative; will-change: transform; top: 0px; left: 0px; transform: translate3d(-136px, 51px, 0px);">{{ $materi->JudulMateri}}</a>
            @endforeach
            </div>
            </a>
            </li>
        @endif
        </ul>
        <br>
    </div>
</div>
@if($dataForum)
@include('mata_pelajaran.isi-forum-admin')
@else
<div class = "grid-container">
    <div class = "grid-column">
        <img src="https://www.colorhexa.com/ffffff.png" length="6" width="1">
    </div>
    <div class = "grid-column">
        <fieldset>
            <p style = "font-size: 20pt;">
            Forum diskusi belum tersedia.<br> 
            Tambah Forum <br><br>
            <a href="{{ route('mata_pelajaran.tambah-forum') }}" style="text-decoration: none;">
                <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEguLvaWMtyCsxBW0OCGOmTcBdWC5VrX3YGalaFDx2cDxO4OqwDYbSXKUAOIKAEe31IqZIFHemXxoXi_rR-eaWtHufwYcdk0IHN-sqry3uFAGtZbxiepSL0dJNWFQ8-mHkBjTOhpyO4An_vVp2cnznmbtN5qVZvur8QiZVIB4EzHXg82vzj9W5_AOUKh9AE/s512/plus-sign.png" length="30%" width="30%"> 
            </a>
            </p>
        </fieldset>
    </div>
</div>
@endif
@endsection