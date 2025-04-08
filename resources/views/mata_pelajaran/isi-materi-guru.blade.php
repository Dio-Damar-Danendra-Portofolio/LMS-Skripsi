@extends('layouts.templateguru')
@section('title', 'Materi - EduSMA')
@section('content')
<div class="diodamar">
    <div class="grid-container">
        <div class="grid-column">
            <div style="translate: -40px 0px;">
                <h1>{{ 'Mapel ABC - Materi XYZ' ?? 'Not Available'}}</h1>
            </div>
        </div>
        <div class="grid-column">
            <img src="https://www.colorhexa.com/ffffff.png" length = "120" width = "3">
        </div>
        <div class="grid-column">
            <a href=" {{ route('guru.daftar-mata-pelajaran') }}">
                <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEjbG5kZxZ2y4wxgE4JJFjEkcZcCNcBZC4PGFBJqkRFwQOih8Nknq-3e0ePl0tn8qR2tGkUpISpKm6LCktzqJcQYWQgSLPQQYe44mbtPMe_pJ6zlexrtItAPf0OoibbphhO7gdKxN2uNsJmDX4pS2SKFacCgwa-hO813iN4ij4D7tj_QFRWdASp1708yYdE/s512/left-arrow_44686.png" length = "131" width = "131">
            </a>
        </div>
    </div>
</div>
<br>
<!-- if(ada materi) -->
<!-- <div class="grid-container"> -->
    <!-- <div class="grid-column">
        <fieldset style="border: 1px solid black;">
            <table style="border: none;">
                <tr>
                    <td colspan=5>
                        <img src="https://www.colorhexa.com/ffffff.png" length=5 width=1>
                    </td>
                </tr>
                <tr>
                    <td>
                        <img src="https://www.colorhexa.com/ffffff.png" length="3" width="1">
                    </td>
                </tr>
                <tr>
                    <td colspan=4>
                        <div class="diodamar" style="font-size: 20pt;">
                            Belum ada materi
                        </div>
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td>
                        <a href="{{ route('mata_pelajaran.tambah-materi') }}">
                            <button type="button" class="btn btn-light" style="border: 1px solid black;">
                                <div class="diodamar" style="font-size: 15pt;">
                                    <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEguLvaWMtyCsxBW0OCGOmTcBdWC5VrX3YGalaFDx2cDxO4OqwDYbSXKUAOIKAEe31IqZIFHemXxoXi_rR-eaWtHufwYcdk0IHN-sqry3uFAGtZbxiepSL0dJNWFQ8-mHkBjTOhpyO4An_vVp2cnznmbtN5qVZvur8QiZVIB4EzHXg82vzj9W5_AOUKh9AE/s512/plus-sign.png" length=10% width=10%>
                                        Tambah Materi Baru
                                </div>
                            </button>
                        </a>
                    </td>
                </tr>
            </table>
        </fieldset>    
    </div>
</div> -->
<!-- else -->
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
        <a href="{{ route('mata_pelajaran.sunting-materi') }}" style="margin-bottom: 1px; text-decoration: none; color: black; font-size: 18pt;">
            <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEhut-jriLyps-s-dkUonfUsVUn2l1_noVihjugPlVQ-b8bD2VHB3CiJj2NaHLIj59BDjTNK3OYDKop3QJv5vaHtZnyzfa1Bkr4eBaN6C8U5Ea__d_8ntkr3kx9lDbprRuPnsQ2G1IODulDCkcZ4qr7WSczS38d_saL7lK46K6qs_6v1Dv8Hf61EdiI9tmM/s1614/Ikon%20Sunting%20Materi.png" length=10% width=10%> Sunting Materi
        </a>
        <a href="{{ route('mata_pelajaran.daftar-tugas-mandiri-khusus-guru') }}" style="margin-bottom: 1px; font-size: 16pt; text-decoration:none; color: black; font-size:: 16pt;">
            <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEiXemr3CdZ_wB0AloMEyhgaGki8MCyfawVKg-AId89CnFB78gluAyl3-sODAeHzw1xTGnF2783dfS8CYrjfsvS6GRbi-N-vAPFFAwuMS-aetanMndDxcUsKJFyrYykcicOGhsZSbni8d93N69lJNY2LkQhxUd-RMGzQEb7IZuqYGzCB1Cpg1UjsMckCHd4/s3508/Ikon%20Sunting%20Tugas%20Mandiri.png" length=10% width=10%> Sunting Tugas Mandiri
        </a>
        <a href="{{ route('mata_pelajaran.tambah-materi') }}" style="margin-bottom: 1px; text-decoration:none; color: black; font-size: 16pt;">
            <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEjs4vCL2Cf0XD9myEsTJK2v8dE_EkdEfk4ExXmMTPtcAGBRNjQN2ubjFXMNnLyv6bfN8qG9N35JVyDGtI9Pf7W_9CLgxJfL1NkvY_Etag7ApXiSToIu-4fO4c63EObjyBfh4Jf1eNnU_BjWjJx9PVONU99zD8HIM-gg32mktDhlD__dvFVL3TVhDR1yC9I/s3508/Ikon%20Tambah%20Materi.png" length=10% width=10%> Tambah Materi
        </a>
        <a href=" {{ route('mata_pelajaran.forum-untuk-guru')}}" style="margin-bottom: 1px; text-decoration: none; color: black; font-size: 18pt;">
            <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEhft_JGb9c0-ifGOsTO24iYP_HeTix8rVOS82Wppj5yguoxNrxKhnWR6u0QZu3tVROoyf6ldfdFc58guIiIyICY4xDVXax8FeUOw_DV5QmQd-cDCOsTP7gJz-cU6fhtZRKz32bGzZn-xgPXgyeRuF0DKIeSM3kS3J2tXLUvrUjNVmQxt5QWN2OBqCNBE0c/s512/discussion-icon.png" length=10% width=10%> Forum Diskusi
        </a>
        <a href="{{ route('mata_pelajaran.daftar-tugas-mandiri-khusus-guru') }}" style="margin-bottom: 1px; text-decoration:none; color: black; font-size: 15pt;">
            <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEj3KbjZU1TUj-G2qKU_O53L99V19JNnKVZ3pp_kC0qNL30o_P-BkxJ9iXaTtst8j0RxqIsrAzY6BefS1T8-Lew83w1uc1wNZMK-IdQcIkjAeq8hcnmFoH3i_e7x2v-DmoKwbTzT44f-IyaAV3yYIOZKiA0ixG_pF0Tg4ZcByGDFGyMHAerl9kEIZcYaj8Y/s512/assignment.png" length=10% width=10%> Tugas Mandiri
        </a>
        <a href="{{ route('mata_pelajaran.daftar-ulangan-harian-khusus-guru') }}" style="text-decoration:none; color: black;">
            <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEiRdmfTujOT4Y8kyj0gkOHcRsa4zSybPEdpiG-P7IXi6ynbDy19hO3uwc1pSwdfwsQapJ8iR3N2aJcxxFwpdnP8glZeAa2qkefGnWHr_ZH-JKWwkFDmtVzUwh-gJ86mlfPX1d7VJ4oL2UK93tDM3o5Z6OhsawanowCBrj-aNGRryDW1ph2wQ_nnU4yyYlA/s3508/Ikon%20Tambah%20Ulangan%20Harian_Dio.png" length=10% width=10%> Tambah Soal Ulangan Harian
        </a>
        <a href="{{ route('mata_pelajaran.daftar-tugas-mandiri-khusus-guru') }}" style="text-decoration:none; color: black;">
            <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEgw3iTOaglfpCyVanxHrIzOgiyGW_8zEEu1Bai46JqJ5oqpMJO62f86c4-ROJlVQkXkjZRIgs_e_HeVhLR3oXZ0-3nSheOMM5SfqZRs2u7IgcEPmSwmMnUYmYDyEdbHG6wUGuo1M5qaC9Mx3x-joUtgB7iXftg7LVbhyphenhyphen4Cc9yyfinr-HwiK2Ke2YXfS9c0/s3508/Ikon%20Sunting%20Ulangan%20Harian_Dio.png" length=10% width=10%> Sunting Soal Ulangan Harian
        </a>
    </div>
    <div class="grid-row">
        <a href="{{ route('guru.periksa-jawaban-ujian') }}" style="text-decoration:none; color: black;">
            <button type="button" class="btn btn-clear" style="border: 1px solid black;">
                <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEisKijI7yc-0AILbVfP-470SMbei8koRnt7BazrND8SDL4sM1Kxuhc1YzFUrxnxOZY0tNsSy2AhXj0aQt-iPzfvskPh-Dq69WUe-Wijlm-XcSe4ivnLuWVodJu79sH7GTFq8ZoDNCRmmo0sGCY1XiDtMlc4anJwm0f5tVwqzqmjDQZEBmm9DjVoGrMI2dc/s3508/Ikon%20Periksa%20Jawaban%20Ujian_Dio.png" length=10% width=10%> Periksa Jawaban Ujian 
            </button>
        </a>
        <a href="{{ route('guru.absensi') }}" style="text-decoration:none; color: black;">
            <button type="button" class="btn btn-clear" style="border: 1px solid black;">
                <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEihP0tMIlIBVbgqfRjRreohBoZUmscw_dYeO2Rio3AX2kqynP_CMhPfMs_pPqwsSXoXxO83QCvliAJ01G34MDgqbUDIjA4lz4dH6KeU6lhiQ99ICrG9EEARRoHYNdV-edYGGQEl-EuTY4RsI1bm2CBNSjQXVBtke80662rRJ95xsuQH-xWZsLuqJ0nP8q8/s980/attendance-icon.png" length=9% width=9%> Absensi Siswa
            </button>
        </a>
        <a href="{{ route('mata_pelajaran.daftar-ulangan-harian-khusus-guru') }}" style="text-decoration:none; color: black;">
        <button type="button" class="btn btn-clear" style="border: 1px solid black;">
            <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEg4pqRBdTza3THr59-pXLBeiJc75l4XDRwsGHtaEw7Pg_WtpK6oSp9p7B1yE0LnJ8QfgZPNITace5yVCWFSx8aZu7gvTc3ZKL56AQUtBjnRyCcl8SoXQX4LAFrh57ZuWkYlNhhtBY529Jfh6bETk2k4ssMYWfa7ItXYn-ms26UQuOeNDP_Aatt0mqhDJhQ/s512/assessment.png" length=9% width=9%> Ulangan Harian
        </button>
        </a>
    </div>
</div>
</div>
<!-- endif -->
@endsection