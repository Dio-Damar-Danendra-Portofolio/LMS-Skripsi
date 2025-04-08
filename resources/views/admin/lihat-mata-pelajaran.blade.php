@extends('layouts.templateadmin')
@section('title', 'Mata Pelajaran {{ $dataMataPelajaran->NamaMataPelajaran }} - EduSMA')
@section('content')
<table style = "border: none; font-family: Poppins;">
    <tr>
        <td>
            <h1>{{ $dataMataPelajaran->NamaMataPelajaran ?? 'Tiada' }} - {{ $dataMateri->JudulMateri ?? 'Tiada' }}</h1>
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
        <a href=" {{ route('admin.pengelola-mata-pelajaran') }}">
        <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEjbG5kZxZ2y4wxgE4JJFjEkcZcCNcBZC4PGFBJqkRFwQOih8Nknq-3e0ePl0tn8qR2tGkUpISpKm6LCktzqJcQYWQgSLPQQYe44mbtPMe_pJ6zlexrtItAPf0OoibbphhO7gdKxN2uNsJmDX4pS2SKFacCgwa-hO813iN4ij4D7tj_QFRWdASp1708yYdE/s512/left-arrow_44686.png" length = "131" width = "131">
        </a>
        </td>
    </tr>
</table>
<br>
@if($dataMateri)
<div class="grid-container">
    <div class = "grid-column">
    <fieldset style="border: 1px solid black;">
        <table style="border: none;">
            <tr>
                <td style="font-size: 21pt;">KI dan KD: </td>
            </tr>
            <tr>
                <td>
                    <ul style="font-size: 21pt;">
                        @foreach($dataMateri as $KIKD)
                        <li>{{ $KIKD -> KIdanKDMateri }}</li>
                        @endforeach
                    </ul>
                </td>
                <td>
                    <ul style="list-style-type: none;">
                    <li style="font-size: 15pt; margin-bottom: 8px;"><a href="{{ $dataJadwal->TautanZOOM }}" style = "position: static; text-decoration: none; color: black;"><img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEgOg7GPLLS76DZlJI3qA608dxVeGUiUeXU-mGrmMK_pFx5s9mJER4H5s5OitUgvJC5kYOT_Xnos1284IKxOO-_QdBp1Ip2RK9yzuYUxond8-DzWq-363fWZc5MDYfxzjECXr_0zofLTNVij32GxLgarQvTrJxhPWvxRms6coMPGmby5REk6kZpgpOvIdCo/s512/Video%20Camera.png" length="100" width="100">{{ $dataJadwal->TautanZOOM }}</a></li>
                    <li style="font-size: 15pt; margin-bottom: 8px;"><img src="https://blogger.googleusercontent.com/img/a/AVvXsEi4Ln-dqnWPwEkfQ-dmNCfziLO3HYVHvzV3CqO3KbeJXYNpRejjlLVmJ0mNhSzYcvwg4oLyn2H6luaCjVBu1sqPiPqttIbVKrDfuSHDX0_O2fwbZ-WnP4c6d5PUX5vI6uFqx-2KPPRLoRkdvWDXKlFCbp046US7GDhBA3P91KLKF6Fht1A7bfQP8Eqbcpk" length="103" width="103">{{  $dataJadwal->WaktuPertemuan  }}</li>    
                    </ul>
                </td>
            </tr>
        </table>
        </fieldset>
    </div>
    <div class="grid-column">
        <a href="uploads/Materi/{materi}" style="margin-bottom: 15px; text-decoration: none; color: black; font-size: 18pt;"><img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEgL3EG67n2OL9XUwEAAy8Ind9-KhNzAUX80IvCsoHlhSPcCOtvL0MBJcguCFE1cyErX4TCTnwZ_ZtBkldHDTLCfmrL7d_lsSFBeGcf7Iz6WScPo4tOd80PwicIQrAHfFQk5mzrhjNxgvZqw6xVRAxZYTru5OWy7GmBXaFT03l9zxtSwFVSwQYmhA0-6kdE/s2000/download%20icon.png" length="125" width="125"> Unduh Materi</a>
        <a href="{{ route('mata_pelajaran.lihat-forum') }}" style="margin-bottom: 22px; text-decoration: none; color: black; font-size: 18pt;"><img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEhft_JGb9c0-ifGOsTO24iYP_HeTix8rVOS82Wppj5yguoxNrxKhnWR6u0QZu3tVROoyf6ldfdFc58guIiIyICY4xDVXax8FeUOw_DV5QmQd-cDCOsTP7gJz-cU6fhtZRKz32bGzZn-xgPXgyeRuF0DKIeSM3kS3J2tXLUvrUjNVmQxt5QWN2OBqCNBE0c/s512/discussion-icon.png" length="99" width="99"> Forum Diskusi</a>   
        <a href="{{ route('mata_pelajaran.tambah-forum') }}" style="margin-bottom: 22px; text-decoration: none; color: black; font-size: 18pt;">
            <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEgPtLquIFQlAaPCausUbJPllIl2Qd5B5-3b_cFQW8ClsehheWBeHQATunBVtvbsDH4eWdTimcxpr9gp-OGfcTUL1P8MgdOFq_eV7uyyDk_IYz95_cmdG1Iz3iCl4M469EmEuwnfXpwfiIRdEny1bMZrCTJbE9CeKMMrVeGIE2HV0oilD-MRT1CL2Jtw5RU/s3508/Ikon%20Tambah%20Forum_Dio.png" length="15%" width="15%"> Tambah Forum
        </a>
        <a href="{{ route('mata_pelajaran.sunting-forum') }}" style="margin-bottom: 22px; text-decoration: none; color: black; font-size: 18pt;">
            <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEjB83uobD1_N3yiUzb7ByqcgfoF8mLrf_dkh5bFbJq1LxJLxwPejdJ7xHoNA2hF64wJ6cgLlgydYu8Al9O0bEhbhnf5A7S5oQqQWf-zLtNdZcA5OASYsSXkUJ5OlCZLdoVAXedthKBtEgqhyyugEoUHnJcQB7XVVMQfmk4M3AuJWd508T8eLyXlWjcJryI/s3508/Ikon%20Sunting%20Forum.png" length="15%" width="15%"> Sunting Forum
        </a>
</div>
<br>
<div class="diodamar">
<ul class="nav nav-item">
    @foreach($dataMateri as $judul)
    <li style="margin-right: 40px;">
        <a href="#materi"><button type="button" class = "btn btn-danger" style="font-size: 20pt;">{{ $judul->JudulMateri }}</button></a>
    </li>
    @endforeach
    <li class = "tab-item default dropdown nav-item" style="height: 51px;">
    <a aria-expanded="true" aria-haspopup="true" href="{{ route('admin.lihat-mata-pelajaran') }}" class="active tab-item-link pt-4 dropdown-toggle dropdown-toggle nav-link" style="color: white; background-color: red;">
        <div tabindex="-1" role="menu" aria-hidden="true" class = "tab-item tab-menu dropdown-menu dropdown-menu-right">
        @foreach($dataMateri as $judul)
            <a class="tab-menu-link default nav-link" style="position: relative; will-change: transform; top: 0px; left: 0px; transform: translate3d(-136px, 51px, 0px);" x-placement = "bottom-end">Materi ABC</a>
        @endforeach
        </div>
    </a>
    </li>
</ul>
</div>
@else
<div class="diodamar">
    <div class="grid-column">
        <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEi3-2fXFEXwAWFEDnBsLKs_SAM7_DW8vzkPXkrwTSZggSGntUJGNQKSW-0t6mI7O5bk9YYJedQGRR4gIFWidITJBeEzxSE2R7edZA00fiCA2apzzrHjtdpZP9w22R0huE7qelVlccKTKN-lUnApS3G6JLOKG8ZETbx9qW26Eoy22mPv-3ZI4UP1WJvvg_o/s600/Warning%20Sign.png" length="45%" width="45%" style="translate: 212px 0px;">
        <div class="diodamar" style="font-size: 20pt; color: black;">
            Materi belum tersedia 
    </div>
</div>
@endif
@endsection