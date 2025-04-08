@extends('layouts.templatesiswa')
@section('title', '{matapelajaran} - EduSMA')
@section('content')
<table style = "border: none; font-family: Poppins;">
    <tr>
        <td>
            <h1>{{ 'Mapel ABC - Materi XYZ' ?? 'Not Available'}}</h1>
        </td>
        <td colspan = 10>
        <img src="https://www.colorhexa.com/ffffff.png" length = "120" width = "3">
        </td>
        <td>
        </td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td>
        <a href="/mata-pelajaran-siswa">
        <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEjbG5kZxZ2y4wxgE4JJFjEkcZcCNcBZC4PGFBJqkRFwQOih8Nknq-3e0ePl0tn8qR2tGkUpISpKm6LCktzqJcQYWQgSLPQQYe44mbtPMe_pJ6zlexrtItAPf0OoibbphhO7gdKxN2uNsJmDX4pS2SKFacCgwa-hO813iN4ij4D7tj_QFRWdASp1708yYdE/s512/left-arrow_44686.png" length = 131 width = 131>
        </a>
        </td>
    </tr>
</table>
<br>
<div class = "grid-container">
    <div class = "grid-column">
        <fieldset style = "border: 1px solid black;">
            <div style = "font-size: 35pt; margin-left: 235px; margin-right: 240px; margin-top: 220px; margin-bottom: 225px;">
            Belum ada materi
            </div>
        </fieldset>
    </div>
</div>
<br>
<div class="diodamar">
<ul class="nav nav-item">
    <li style="margin-right: 40px;">
        <a href="#materi"><button type="button" class = "btn btn-danger" style="font-size: 20pt;">Materi ABCD</button></a>
    </li>
    <li style="margin-right: 40px;">
        <a href="#materi"><button type="button" class = "btn btn-danger" style="font-size: 20pt;">Materi ABCD</button></a>
    </li>
    <li style="margin-right: 40px;">
        <a href="#materi" ><button type="button" class = "btn btn-danger" style="font-size: 20pt;">Materi ABCD</button></a>
    </li>
    <li class = "tab-item default dropdown nav-item" style="height: 51px;">
    <a aria-expanded="true" aria-haspopup="true" href="#" class="active tab-item-link pt-4 dropdown-toggle dropdown-toggle nav-link" style="color: white; background-color: red;">
        <div tabindex="-1" role="menu" aria-hidden="true" class = "tab-item tab-menu dropdown-menu dropdown-menu-right">
            <a class="tab-menu-link default nav-link" style="position: relative; will-change: transform; top: 0px; left: 0px; transform: translate3d(-136px, 51px, 0px);" x-placement = "bottom-end">Materi ABC</a>
            <a class="tab-menu-link default nav-link" style="position: relative; will-change: transform; top: 0px; left: 0px; transform: translate3d(-136px, 51px, 0px);">Materi ABC</a>
            <a class="tab-menu-link default nav-link" style="position: relative; will-change: transform; top: 0px; left: 0px; transform: translate3d(-136px, 51px, 0px);">Materi ABC</a>
            <a class="tab-menu-link default nav-link" style="position: relative; will-change: transform; top: 0px; left: 0px; transform: translate3d(-136px, 51px, 0px);">Materi ABC</a>
            <a class="tab-menu-link default nav-link" style="position: relative; will-change: transform; top: 0px; left: 0px; transform: translate3d(-136px, 51px, 0px);">Materi ABC</a>
        </div>
    </a>
    </li>
</ul>
</div>
@endsection
