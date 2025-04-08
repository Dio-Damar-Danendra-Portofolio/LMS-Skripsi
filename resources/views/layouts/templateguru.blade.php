<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <style type="text/css">
    .indiana-scroll-container {
      overflow: auto;
    }
  .indiana-scroll-container--dragging {
    scroll-behavior: auto !important;
  }
  .indiana-scroll-container--dragging > * {
      pointer-events: none;
      cursor: -webkit-grab;
      cursor: grab;
    }
  .indiana-scroll-container--hide-scrollbars {
    overflow: hidden;
    overflow: -moz-scrollbars-none;
    -ms-overflow-style: none;
    scrollbar-width: none;
  }
  .indiana-scroll-container--hide-scrollbars::-webkit-scrollbar {
      display: none !important;
      height: 0 !important;
      width: 0 !important;
      background: transparent !important;
      -webkit-appearance: none !important;
    }
  .indiana-scroll-container--native-scroll {
    overflow: auto;
  }

.indiana-dragging {
  cursor: -webkit-grab !important;
  cursor: grab !important;
}
</style>
<style type="text/css">.react-horizontal-scrolling-menu--scroll-container {
  display: flex;
  height: max-content;
  overflow-y: hidden;
  position: relative;
  width: 100%;
}

.react-horizontal-scrolling-menu--scroll-container.rtl {
  direction: rtl;
}

.react-horizontal-scrolling-menu--inner-wrapper {
  display: flex;
  overflow-y: hidden;
}

.react-horizontal-scrolling-menu--wrapper {
  display: flex;
  flex-direction: column;
}

.react-horizontal-scrolling-menu--header,
.react-horizontal-scrolling-menu--footer {
  width: 100%;
}

.react-horizontal-scrolling-menu--arrow-left,
.react-horizontal-scrolling-menu--arrow-right {
  display: flex;
}
</style>
    <style>
  header {
    background-color: #dae2f2;
    padding: 25px;
    text-align: left;
    font-size: 35px;
    color: white;
  }

  .skripsi{
    margin-left:10px; transform: translateX(85%);
    font-family: poppins;
}

.diodamar{
    font-family: poppins;
}

.aside{
    align-items:center;
    font-family: poppins;
}

.tombol{
    text-decoration: none;
    color: black;
    font-family: poppins;
}

table, thead, tbody, tfoot, th, td, tr{
    border: 1px black solid;
    border-collapse: collapse;
    padding: 20px;
    font-family: poppins;
    border-style: solid;
  }

.grid-container {
    display: grid;
    column-gap: 2px;
    row-gap: 4px;
    padding: 1px;
    font-family: poppins;
    grid-template-columns: auto auto auto;
    text-align: center;
    align-items: center;
}

.grid-row{
    display: grid;
    row-gap: 5px;
    padding: 4px;
    font-family: poppins;
    text-align: center;
    align-items: center;
}    

.grid-column{
    display: grid;
    column-gap: 5px;
    padding: 3px;
    font-family: poppins;
    text-align: center;
    align-items: center;
} 

.grid-inline{
    display: inline-grid;
    column-gap: 50px;
    font-family: poppins;
    text-align: center;
    align-items: center;
} 
  
section {
    display: -webkit-flex;
    display: flex;
  }
  
article {
    background-color: white;
  }
  
nav {
    text-align: right;
    background: #6b798f;
    -webkit-flex: 6;
    -ms-flex: 6;
    flex: 6;
    padding: 8px;
  }
  
.navigation {
    text-align: left;
    background: white;
    -webkit-flex: 3;
    -ms-flex: 3;
    flex: 3;
    padding: 10px;
  }
  
nav ul {
    list-style-type: none;
    padding: 2px;
    font-family: Poppins;
  }
  
@media (max-width: 1000px) {
    section {
      -webkit-flex-direction: column;
      flex-direction: column;
    }
  }
</style>
<link rel="manifest" href="/manifest.json">
<link rel="shortcut icon" href="/favicon.ico">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
<header>
    <a href="{{ route('guru.beranda-guru') }}"><img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEiZ5-Rgb_pXB2e7p6EdrRvTVC39zr2nyrgsR8yrtdlLIUvcAufW2sCAv1SBtacGV0lanP_NOYpHF520PCsNKX-XWF1tFVNBQe3lsCVeaJl6XD87YvZJMh7TPxlhcuKZGkdYGUe3iVwMuJdI9BCJP6MCTNCDCjKA1npVdXbUDb_5VCDoVai9lZedGc-1iDQ/s195/Logo%20EduSMA_Transparan.png" width="200" height="100"/></a>
    <a href="{{ route('guru.beranda-guru') }}"><img src="https://blogger.googleusercontent.com/img/a/AVvXsEiDqT3VkkYfjkPZxLqQViTtOGwVahbdptA0DGEGvK5Arvh4_kGqdLlsw2uxMF4fLMEX5wF2mMJ77saj4CzMCYBQ97mlZe4hIjQSSpSjE1Hj3G5fIwe4qGlOXRbZ9BECiTaCMIrfIO9C5MF8nmVS7QPSIF8CpU7f_Oz46pmUvdpY0ItG1QN5UoW__Tixllc" width="200" height="100"/></a>
    <a href="{{ route('guru.pengumuman-khusus-guru') }}"><img src="https://blogger.googleusercontent.com/img/a/AVvXsEiSrFnGq5sxoWBFU094q7NVnEeqqbiECn3tf5EI1c1hpDs3R2UOq-CjJnaP6MC1AjemkkF3tTILzU2i7hLT5KYy61XvITnWA5STCxRjucIvWG0O0OT1lVEB570WcCdL4Eh4B515l2tfWcf0qQHux6_l9QC2ZgsrDNs8ScX0lQeI8KFITVHhHr1_SO6wzVg" width="200" height="100"/></a>
    <a href="{{ route('guru.daftar-mata-pelajaran') }}"><img src="https://blogger.googleusercontent.com/img/a/AVvXsEiGUg1IcAywXFkTXKohzMjOKSL1Eow7zZJbN_ZSEiiCQ9WzHwGZVVElmOF_3y8MLyasGm8QZ0IkIww9Iv_0hIXqKFeq_Rfll-dkjYThfRKXjqb76RvEf8B5BlgQCld2Opt2Sk5wyfqnf6LR2MIURqn0pes5GmrECBMzdz5EnjDxb-3Qgo1_F4smHfTh8NQ" width="200" height="100"/></a>
    <a href="{{ route('guru.pengawasan-ujian') }}"><img src="https://blogger.googleusercontent.com/img/a/AVvXsEiDNG7q97dI5tDxq-0xbXyllrQ9q7nmHglcqF5TFdjeOcW6xv4Oy7_tca5ZULwyDzXsA0almS1qMpV5w39LUBVvvsRdqg1_hNA0A5da-78DXNW1D4AZSzfCVCXyGtMsJZSBwvQZPlISLgzP2h754w_hOSLYjvBK-vRiwTz1i0p6QA0UBR-yMOHcwvutIrE" width="200" height="100" alt=""/></a>
</header>
<noscript>You need to enable JavaScript to run this app.</noscript>
<section>
<article>
<div class = "navigation">
@yield('content')
</div>
</article>
<nav>
    <ul>
      <li><a href="{{ route('guru.obrolan-guru') }}"><img src="https://blogger.googleusercontent.com/img/a/AVvXsEjZJtPZpvUaWeLoJZCBXDviPyH1sa-B039PtkUdAfneagUvRXKALd_WOhOzeuwkgAYh1K7jDDJwGq42uMbrrxVuoJB1B7dZkC7yNeSxreBm0EBTNp_72RqVgJIxmqjyGxqma80t5QFEuMgdvEVXQPDmfVo50WnAQkUNmKv7cNV45eFWyNQqRczHyCPFPI4" width="75%" height="75%"/><br/><br/></a></li>
      <li><a href="{{ route('guru.input-nilai-akhir') }}"><img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEgqsHqyH6_v_vep1j4KUPf0PoiTbxAcGLkH4m9hGTp6DdaAlhPH-Cqq6YNLqPAsttz94UL1wGDpmc-bZ9R9Bb7vCPbzezhTB6lIOwwX6BltwOW1JSmaokT3wacYGOVqXUYxaIswx2RITTg4Jm7exCzDoJhgMJYQs-kuTdNRVGuF8oOZ4lYfF_qXEJNBspU/s3038/Ikon%20Nilai%20Akhir.png" width="72%" height="72%"/><br/><br/></a></li>
      <li><a href="{{ route('guru.profil-guru') }}"><img src="https://blogger.googleusercontent.com/img/a/AVvXsEi_-QhJGU5hSADrSv4_flLCkizNYF-fgNErU2kEoZkVPzXIPWm4c2mKW2KsOZpU1TUgN_MjimoI9BylrWzMKjouPxRMiMXLIGNC7k0clh5dqtfWgp0LVbrY3_Z_94_taVJA0d_xC28wGZ1C-ur09OkNmTy_ULkVIGCJqGK9pnxN9z-7LFrwSeoDo7TVtr4" width="75%" height="75%"/></a></li>
    </ul>
</nav>
</section>
</body>
</html>