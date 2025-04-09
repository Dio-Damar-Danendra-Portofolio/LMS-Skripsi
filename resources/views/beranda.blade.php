@section('title', 'Beranda EduSMA')
@section('content')
@if(Auth::user()->PeranPengguna == 'Siswa' && Auth::user()->SurelPengguna!=NULL)
@include('siswa.beranda-siswa')
@elseif(Auth::user()->PeranPengguna == 'Guru' && Auth::user()->SurelPengguna!=NULL)
@include('guru.beranda-guru')
@elseif(Auth::user()->PeranPengguna == 'Admin' && Auth::user()->SurelPengguna!=NULL)
@include('admin.beranda-admin')
@else
@include('beranda-tamu')
@endif
@endsection
