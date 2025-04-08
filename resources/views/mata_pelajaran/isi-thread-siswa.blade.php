@extends('layouts.templatesiswa')
@section('title', 'Thread yang berjudul {JudulThread} - EduSMA')
@section('content')
<div class="diodamar">
    <table style="border: none;">
        <tr>
            <td>
                <h1>{{ $dataThread->JudulThread ?? 'Judul Thread Belum Tersedia' }}</h1>
            </td>
            <td colspan=100>
                <img src="https://www.colorhexa.com/ffffff.png" length="60" width="10">
            </td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>
                <a href="{{ route('mata_pelajaran.forum-untuk-siswa') }}"><img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEjbG5kZxZ2y4wxgE4JJFjEkcZcCNcBZC4PGFBJqkRFwQOih8Nknq-3e0ePl0tn8qR2tGkUpISpKm6LCktzqJcQYWQgSLPQQYe44mbtPMe_pJ6zlexrtItAPf0OoibbphhO7gdKxN2uNsJmDX4pS2SKFacCgwa-hO813iN4ij4D7tj_QFRWdASp1708yYdE/s512/left-arrow_44686.png" length="78" width="78"></a>
            </td>
        </tr>
    </table>
    <br>
    <table>
        <tr style="border: 1px solid black;">
            <th>
                <div>
                        <div class="C--avatar type--1" style="background-image: url(&quot;http://127.0.0.1:8000/uploads/Foto-Profil-Guru/Profil-Guru-NomorIndukPengguna-NamaPertamaPengguna NamaTerakhirPengguna.jpg &quot;); width:40px; height:40px; min-width:40px; min-height:40px; border-radius:40px;">
                        </div>
                </div>
            </th>
            <th>
                <div class="font-size-14px">
                    <span class="authorName">
                        Nama Penulis
                    </span>                     
                    <div class="font-size-10px">22 April 2001, 15:30 GMT</div>
                    </div>
                </div>
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
            <th></th>
            <th>
                <div class="d-flex justify-content-end font-size-12px col-5 col-sm-5 col-md-5 col-lg-5 col-xl-5">
                    <span class="reply-style-no-margin">
                            <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEi_zVeXlbdbBbXqcmR6htureAmARxoXSkIp2GITN9cGEkoiNu3qbNZbI9rjeCCvXS9916SrlBGvhOotIZm0na1Pq7Y_zZOnUrHucnLHMyulCBfhyphenhyphenv90ue_5QYB6rwqRONibRbg1ujdQ9vozCQRFAKFGy95wZvCL9tDRMfgiciD5YfEnbYrx3VUbw-9MLfs/s512/reply-message.png" length="32" width="32">
                    </span>
                </div>
            </th>
            <th>
                20
            </th>
        </tr>
        <tr>
            <td></td>
            <td colspan=3>
                <h4>{JudulThread}</h4>
            </td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td colspan = 5>Kejadian Rautan Tank dan Catch Da Bear <br>(Hari Ahad, berkesan, bersejarah, happy)
            <br>Tahun kejadian: 2009 dan 2019 <br> Sebutkan lagu-lagu dari setiap kejadian!</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </table>
    <div class="c-page-region pt-0 pb-0">
        <div class="C--card type--1">
            <div class="p-3 pt-0 container-article">
                <div>
                    <div class="discussions-body">
                        <div class="box-textarea">
                            <div class="custom-text-editor">
                                <div class="avatar">
                                    <div class="C--avatar type--1" style="background-image: url(&quot;http://127.0.0.1:8000/uploads/Foto-Profil-Siswa/Profil-Siswa-NomorIndukPengguna-NamaPertamaPengguna%20NamaTerakhirPengguna.jpg &quot;); width: 40px; height: 40px; min-height: 40px; min-width: 40px; border-radius: 40px;">
                                    </div>
                                </div>
                                <div class="editor">
                                <form action="{{ route('mata_pelajaran.isi-thread-siswa') }}" method="post">
                                    <div class="quill quil-editor border-bottom">
                                        <div class="ql-container ql-snow">
                                                    <a href="about:blank" rel="noopenernoreferrer" target="_blank"></a>
                                                    <textarea placeholder="Ketik Balasan Anda... " rows="" cols="100" name="IsiBalasan" id="IsiBalasan" data-formula="e=mc^2" data-link="https://quilljs.com" data-video="Embed URL">
                                                    Balasan
                                                    </textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="action-editor">
                                    <div class="editor-bar ql-toolbar ql-snow" id="quill-a88d4821-632f-4433-b22b-4f9b1b1e4e17">
                                        <button type="button" class="ql-bold toolbar-cr">
                                            <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEijM8bDzeCT9n7-57Us2Q1JzzacAkvpgVpH5DbSVGXl9OOJXemTu_FWPITYPUARDEp4_jn76mmogodWoAta1eil6MpnqWu3jiHp7y2H2zvgErLqOZQIGx_QiUVexG4dLtzesYn3HD81Czei2DHrISKJylFT2s89B_ClGZZx5V-zfOQ2HlxbwvN1Vsksmuw/s512/bold-text.png" length="16" width="16">
                                        </button>
                                        <button type="button" class="ql-italic toolbar-cr">
                                            <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEjJLfNs4J83iGqkwWbFptUZGObh0LR0yB_6T2IK5rXQkwsS_nmsH_raNN-onvybtLLFLARzPzcmqbRw-cAmd-2gtE9N1JIhIhrrwshe8_Ya8UwZITQjoFSSp73nkn32HrrHFQg6sDgekJYkUbz-K8hD6X3QHnjeXeRxzKbi3PwdULn064PitkVi_BWFweI/s512/italic-text.png" length="16" width="16">
                                        </button>
                                        <button type="button" class="ql-underline toolbar-cr">
                                            <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEiZ6HOIZlJjJBQ-v7M4YsRbKekzcRR0uXGirK23qfYaY2gAaNQaEKq-PHqCfZPwQabo1U8mxg79CKUNK_L1oHf9iTF_sAW1ThX8MVZ7XvNRf4Sjlcd5CtA25MCPhSjo32nqOijb7ACz1ouwMAgTUQK8WeQASGIrj-97AuJjzOETCRyYxR5n7wb7bVQIs8U/s512/underlined-text.png" length="16" width="16">
                                        </button>
                                        <input type="file" name="BerkasBalasan" id="BerkasBalasan" accept=".png,.jpg,.jpeg,.doc,.docx,.xls,.xlsx,.ppt,.pdf,.pptx,.zip,.rar,.7z,.gz" style="display: none;">
                                        <label for="BerkasBalasan">
                                            <img src="https://blogger.googleusercontent.com/img/a/AVvXsEia_T3KHwQbmCHjiAIxzpLcEEBNAZ9gc77rQ5eO7QkIa-rHdBehZ2bF2apAbAvqp-OD36ZNhQVtV20d8hv5kxVwz6-H1DKxE22fJ5bJpnLc6iyoAVUvZFxEUlU-WB7GDybv3nwGR3tdvf-SCvfJYn6FXoRz4M_SlgMsDTKqeJNWOy_B2gotSSnoEz7wSGQ" length="80" width="80">
                                        </label>
                                        <img src="https://www.colorhexa.com/ffffff.png" length="10" width="10">
                                        <button type="submit" class="btn btn-success">Balas!</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between sort border-top">
                        <div class="sort-by">
                            Urutkan dari yang: 
                            <select name="Urutan" id="Urutan" role="search">
                                <option value="Terbaru">Terbaru</option>
                                <option value="Terlama">Terlama</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection