@extends('layouts.templateguru')
@section('title', 'Beranda khusus Guru - EduSMA')
@section('content')
<div class = "grid-container">
    <div class = "grid-column">
        <div style = "translate: -29px 0px">
        <a href=" {{ route('guru.pengumuman-khusus-guru') }}" style="text-decoration: none; color: black;">
            <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEiG_v1YlV0hio7RF_POc_y79Kn2qSUO-ydADnaTgB1u4b1dUDh0npRwP7_M67lXNqlmUcgB544Vf9aeKkU8CUOe2_jAAX7zWueceHNZkaIVeTywiSdhrejbO5rWD8vPftAAAgkhwKrXJXN-r2aZMgngQuKs8k8HP1ABczcWPZgwcEjYWfcjI0gwDgtv5gY/s2264/Tombol_Berita%20Tentang%20Kegiatan%20Sekolah.png" length = 463 width = 292>
        </a>
        </div>
    </div>
    <div class = "grid-column">
        <div style = "translate: -10px 1px">
        <a href="{{ route('guru.daftar-mata-pelajaran') }}" style="text-decoration: none; color: black;"> 
            <img src="https://blogger.googleusercontent.com/img/a/AVvXsEjV7RrKqP-26rnPjv9zh8-z1l_jQuD8rFqyyxUnY2W40pn_wx4x_7Zo6bV87T-hbplsIBBj_KCE29Ytr8tzSNjLn5s4RtJieSeEDpPsnNN1tpbZ-59eKqjbEaIYSaZAH1kISYDZyve9DkYD6g9HXc03HNb0X0hOBHo3V2K0MGLAQ1VUDsB_K5b4PKLQTcE" length = 440 width = 322>
        </a>
        </div>
    </div>
    <div class = "grid-column">
        <img src="https://www.colorhexa.com/ffffff.png" height = 1 width = 1/>
    </div>
    <div class = "grid-column">
        <div style = "translate: -9px 38px;">
            <a href="{{ route('guru.jadwal-khusus-guru') }}"> 
                <img src="https://blogger.googleusercontent.com/img/a/AVvXsEgbyrLyv6RLtv7RR71oU-meNFVh6gR4USBrwL0BopDPaP_srmY1L549EdYdFfzsdGAvvPNT2ippDS6_ZS1dFe6hIgyBPttOsCLQhWdF_-DFrscZ3C_714Zvg9Onrj9253nrd25AJpqjfgP8QyTfp_RTU8FOWFRt0CLn7hSGvXUtj7sORZNs3dIGhFLktMA" length = 836 width = 336>
            </a> 
        </div>
    </div>
    <div class="grid-column">
        <div style = "translate: -10px 25px">
            <a href="{{ route('guru.kelas-guru') }}"> 
                <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEh63X6wkoNEU0TME6jaHUY9tOiV9U1k4B8RfGReIpKwGGr7zL0j3MXtNGe511i4KmTcWF4xbCN3iUjlQbcabNIHnMvKkzOH2OsLUFwI52pOY_T8gr84toY9d97RWId5ET5Xt_qs9SsWnYLER4xWaAkl7BxNaHr0E2wf2SJK7dSdT_n_r8pnYX5GJJfHfKU/s2480/Tombol%20Kelas.png" length=429 width=325>
            </a> 
        </div>
    </div>
</div>
@endsection