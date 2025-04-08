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
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td>
        <a href="{{ route('siswa.mata-pelajaran-siswa') }}">
            <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEjbG5kZxZ2y4wxgE4JJFjEkcZcCNcBZC4PGFBJqkRFwQOih8Nknq-3e0ePl0tn8qR2tGkUpISpKm6LCktzqJcQYWQgSLPQQYe44mbtPMe_pJ6zlexrtItAPf0OoibbphhO7gdKxN2uNsJmDX4pS2SKFacCgwa-hO813iN4ij4D7tj_QFRWdASp1708yYdE/s512/left-arrow_44686.png" length = "131" width = "131">
        </a>
        </td>
    </tr>
</table>
<br>
<div class = "grid-container">
    <div class = "grid-column">
        <fieldset style="border: 1px solid black;">
        <table style="border: none;">
            <tr>
                <td style="font-size: 21pt;">KI dan KD: </td>
            </tr>
            <tr>
                <td>
                    <ul style="font-size: 21pt;">
                        <li>ABC</li>
                        <li>BCD</li>
                        <li>CDE</li>
                        <li>DEF</li>
                    </ul>
                </td>
                <td>
                    <ul style="list-style-type: none;">
                    <li style="font-size: 15pt; margin-bottom: 8px;"><a href="https://zoom.us/" style = "position: static; text-decoration: none; color: black;"><img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEgOg7GPLLS76DZlJI3qA608dxVeGUiUeXU-mGrmMK_pFx5s9mJER4H5s5OitUgvJC5kYOT_Xnos1284IKxOO-_QdBp1Ip2RK9yzuYUxond8-DzWq-363fWZc5MDYfxzjECXr_0zofLTNVij32GxLgarQvTrJxhPWvxRms6coMPGmby5REk6kZpgpOvIdCo/s512/Video%20Camera.png" length="100" width="100"> Tautan (Link) ZOOM</a></li>
                    <li style="font-size: 15pt; margin-bottom: 8px;"><img src="https://blogger.googleusercontent.com/img/a/AVvXsEi4Ln-dqnWPwEkfQ-dmNCfziLO3HYVHvzV3CqO3KbeJXYNpRejjlLVmJ0mNhSzYcvwg4oLyn2H6luaCjVBu1sqPiPqttIbVKrDfuSHDX0_O2fwbZ-WnP4c6d5PUX5vI6uFqx-2KPPRLoRkdvWDXKlFCbp046US7GDhBA3P91KLKF6Fht1A7bfQP8Eqbcpk" length="103" width="103"> Senin, 12 April 2025</li>    
                    <li style="font-size: 15pt; margin-bottom: 8px;"><img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEihP0tMIlIBVbgqfRjRreohBoZUmscw_dYeO2Rio3AX2kqynP_CMhPfMs_pPqwsSXoXxO83QCvliAJ01G34MDgqbUDIjA4lz4dH6KeU6lhiQ99ICrG9EEARRoHYNdV-edYGGQEl-EuTY4RsI1bm2CBNSjQXVBtke80662rRJ95xsuQH-xWZsLuqJ0nP8q8/s980/attendance-icon.png" length="102" width="102"> Kehadiran Wi-Fi</li>
                    </ul>
                </td>
            </tr>
        </table>
        </fieldset>
    </div>
    <div class="grid-column">
        <a href="uploads/Materi/{materi}" style="margin-bottom: 15px; text-decoration: none; color: black; font-size: 18pt;"><img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEgL3EG67n2OL9XUwEAAy8Ind9-KhNzAUX80IvCsoHlhSPcCOtvL0MBJcguCFE1cyErX4TCTnwZ_ZtBkldHDTLCfmrL7d_lsSFBeGcf7Iz6WScPo4tOd80PwicIQrAHfFQk5mzrhjNxgvZqw6xVRAxZYTru5OWy7GmBXaFT03l9zxtSwFVSwQYmhA0-6kdE/s2000/download%20icon.png" length="125" width="125"> Unduh Materi</a>
        <a href=" {{ route('mata_pelajaran.forum-untuk-siswa')}}" style="margin-bottom: 22px; text-decoration: none; color: black; font-size: 18pt;"><img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEhft_JGb9c0-ifGOsTO24iYP_HeTix8rVOS82Wppj5yguoxNrxKhnWR6u0QZu3tVROoyf6ldfdFc58guIiIyICY4xDVXax8FeUOw_DV5QmQd-cDCOsTP7gJz-cU6fhtZRKz32bGzZn-xgPXgyeRuF0DKIeSM3kS3J2tXLUvrUjNVmQxt5QWN2OBqCNBE0c/s512/discussion-icon.png" length="99" width="99"> Forum Diskusi</a>
        <a href=" {{ route('mata_pelajaran.daftar-tugas-mandiri-khusus-siswa') }}" style="margin-bottom: 20px; text-decoration: none; color: black; font-size: 18pt;"><img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEj3KbjZU1TUj-G2qKU_O53L99V19JNnKVZ3pp_kC0qNL30o_P-BkxJ9iXaTtst8j0RxqIsrAzY6BefS1T8-Lew83w1uc1wNZMK-IdQcIkjAeq8hcnmFoH3i_e7x2v-DmoKwbTzT44f-IyaAV3yYIOZKiA0ixG_pF0Tg4ZcByGDFGyMHAerl9kEIZcYaj8Y/s512/assignment.png" length="104" width="104"> Tugas Mandiri</a>
        <a href="{{ route('mata_pelajaran.daftar-ulangan-harian-khusus-siswa') }}" style="text-decoration: none; color: black; font-size: 18pt;"><img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEg4pqRBdTza3THr59-pXLBeiJc75l4XDRwsGHtaEw7Pg_WtpK6oSp9p7B1yE0LnJ8QfgZPNITace5yVCWFSx8aZu7gvTc3ZKL56AQUtBjnRyCcl8SoXQX4LAFrh57ZuWkYlNhhtBY529Jfh6bETk2k4ssMYWfa7ItXYn-ms26UQuOeNDP_Aatt0mqhDJhQ/s512/assessment.png" length="100" width="100"> Ulangan Harian</a>
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