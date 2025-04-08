@extends('layouts.templateguru')
@section('title', 'Profil Guru - EduSMA')
@section('content')
<div style="font-family: poppins; translate: 24px 0px;">
<h1>Profil Guru</h1>
</div>
<div class = "grid-container">
    <div class = "grid-column">
    <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEiTcZaJb-917L8otUFQhVnS6OVzAptpVu4BXjgLuASegg8pOiIH1tJd_k889hMt8OXp1Y9rEw0Aqp5x5T62FB6wRcP4Si9JSpjjJpOTopc1v-dxv9OzLaS8P0t4yVICdTG1dGLzh4GSxvAGclQxePp85FKTEwKnHrTXJHMmmPCj5d96Mq3nH8bsvHPckgQ/s980/Account-User-PNG-Clipart.png" width = 310 height = 310/>
    </div>
    <div class = "grid-column" style="font-size: 20pt;">
        <p>Nama: {{Auth::user()->NamaPertamaPengguna ?? 'Tiada'}} {{Auth::user()->NamaTerakhirPengguna ?? 'Tiada'}}</p>
        <p>NIS: {{Auth::user()->NomorIndukPengguna ?? 'Tiada'}}</p> 
    </div>
    <div class = "grid-column">
        <div style = "translate: 0px 109px;">
            <a href="{{ __('sunting-profil-guru') }}">
                <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEitglbX11FSgz3TxAVDcyOIyCiWDDy8MQB6o6EXdA2-85qIdl3qP_bDc7O2LQeIvCy1JoKKoXCiGo9SIn9AYhPGyxLlBgToD04Z8nif4TAg7PkUb7h6Scaz0Tkg9LNA1UCd_8jYwx9zX8NHcjVFEu8vv25P5Earh_zdBqfARwMM3TOkcUFT4AxaKGD464U/s2480/Sunting%20(Edit)%20Profil.jpg" length = 307 width = 267 />
            </a><br/>
            <button type="button" class="btn btn-light" style = "background-color: white;">
                <img src="https://blogger.googleusercontent.com/img/a/AVvXsEgI5LVPryINTj-qb-8UJrm3CNhn04CJaBUWceBxjBUrgUDt9zlg9gOrgs1XPtcPMHJC1AUyuVTKIg1VOW-qDzGXBsJDG61Kzo6mKPahCDW2PhAT1_ZDKQSCNTV31akyVXpz8KnUhkEEgfq3tuNvjKADDM1d55OsYnzCzeLy0mCEZq4FJPrQBExYf858Kw0" length = 199 width = 199/><br/>
                Keluar
        </div>
    </div>
</div>

<div style="font-family: poppins; font-size: 19pt; translate: 10px 0px;">
    <p>Peran: {{Auth::user()->PeranPengguna ?? 'Tiada'}}</p>
    <p>Tahun<br>Masuk: {{Auth::user()->TahunMasukPengguna  ?? 'Tiada'}}</p>
    <p>No. HP: {{Auth::user()->NomorPonselPengguna  ?? 'Tiada'}}</p>
    <p>Surel Pengguna: {{Auth::user()->SurelPengguna  ?? 'Tiada'}}</p>
    <p>Mata Pelajaran yang diajarkan: </p>
    <ol>
        <li>{{Auth::user()->MataPelajaran  ?? 'Tiada'}}</li>
        <li>{{Auth::user()->MataPelajaran2 ?? 'Tiada'}}</li>
        <li>{{Auth::user()->MataPelajaran3 ?? 'Tiada'}}</li>
        <li>{{Auth::user()->MataPelajaran4 ?? 'Tiada'}}</li>
    </ol>
</div>
@endsection