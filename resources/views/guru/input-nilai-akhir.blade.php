@extends('layouts.templateguru')
@section('title', 'Nilai Akhir - EduSMA')
@section('content')
<div class = "diodamar">
    <h1 style = "font-size: 33pt;">Nilai Akhir</h1>
    @include('guru.pencarian-nilai-akhir')
</div>
<br>
<br>
@include('guru.nilai-mapel')
@endsection