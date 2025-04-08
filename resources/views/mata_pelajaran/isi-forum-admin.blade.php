<div class="c-page-region">
    <div style="border: 1px solid black;">
    <div class="list-forum-wrapper pt-1">
        <div class="border-bottom flex-row p-1" style = "font-family: Poppins;">
        <table style="border: none;">
            <tr>
                <th>
                    <div class="C--pagination type--1">
                        <span>{{ $jumlahThread }} hasil </span>
                    </div>
                </th>
                <th>
                    <div class="C--pagination type--1 d-flex flex-sm-row">
                    <span>Tampilkan: </span>        
                    <select role="search" name="JumlahThread" id="JumlahThread" style="translate: 4px 0px;">
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="40">40</option>
                        <option value="80">80</option>
                    </select>
                    </div>
                </th>
                <th>
                <button type="button" class="btn-btn info" aria-label="Pertama">
                    <span aria-hidden="true"><<</span>
                    <span>Pertama</span>
                </button>
                </th>
                <th>
                <button type="button" class="btn-btn info" aria-label="Sebelumnya">
                    <span aria-hidden="true"><</span>
                    <span>Sebelumnya</span>
                </button>
                </th>
                <th>
                    <button type="button" class="btn-btn info" aria-label="Berikutnya">
                        <span aria-hidden="true"> > </span> 
                        <span>Berikutnya</span>
                    </button>
                </th>
                <th>
                <button type="button" class="btn-btn info" aria-label="Terakhir">
                        <span aria-hidden="true">>> </span>
                        <span>Terakhir</span>
                </button>
                </th>
            </tr>
        </table>
        </div>
        <div class="diodamar">
        @if($thread)
        @foreach($thread as $threadForum)
            <div class="thread-item-course-detail-forum px-3 pointer">
                <div class="C--card type--1 mb-0 py-2 br-5 thread-item-card no-border border-bottom">
                    <div class="thread-author-name">
                        <div class="circle-transparent-mr-2">
                        </div>
                        <div class="w-100">
                            <div class="d-flex flex-sm-row flex-column justify-content-between">
                                <div class="d-flex flex-row align-items-center">
                                    <div class="C--avatar type--1 mr-2" style="background-image: url(&quot;http://127.0.0.1:8000/uploads/Foto-Profil-Guru/Profil-Guru-NomorIndukPengguna-NamaPertamaPengguna%20NamaTerakhirPengguna.jpg &quot;); width:40px; height:40px; min-width:40px; min-height:40px; border-radius:40px;">
                                    </div>
                                    <div class="d-flex flex-column">
                                        <div class="d-flex flex-row">
                                            <span class="author-name">{{ $mapel->NamaGuru }}</span>
                                        </div>
                                        <div class="text-post-date">
                                            {{ $threadForum->created_at }}
                                        </div>
                                    </div>
                                </div>
                    <div class="d-flex flex-row justify-content-end align-items-center mt-2">
                        <div class="d-flex align-items-center">
                            <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEi_zVeXlbdbBbXqcmR6htureAmARxoXSkIp2GITN9cGEkoiNu3qbNZbI9rjeCCvXS9916SrlBGvhOotIZm0na1Pq7Y_zZOnUrHucnLHMyulCBfhyphenhyphenv90ue_5QYB6rwqRONibRbg1ujdQ9vozCQRFAKFGy95wZvCL9tDRMfgiciD5YfEnbYrx3VUbw-9MLfs/s512/reply-message.png" length="32" width="32">
                            <span class="ml-1" style="width:30px; font-size: 20px; translate: 10px 0px;">
                            30
                        </span>
                        </div>
                    </div>
                    </div>
                    </div>
                    </div>
                    <div class="thread-author-name mt-3">
                        <div class="circle-transparent mr-3">
                        </div>
                        <div class="ellipsis-one-line" style="font-size:18px;">
                            <span class="false thread-title">{{ $thread->JudulThread }}</span>
                        </div>
                    </div>
                    </div>
                    <div class="d-flex align-items-center thread-info"></div>
                    </div>
                </div>
            </div>
            </a>
        </div>
        <div class="border border-bottom d-flex flex-md-row flex-column align-items-center justify-content-end border-top p-3">
        <table style="border: none;" class="diodamar">
        <tr>
            <div class="C--pagination type--1 d-flex flex-sm-row flex-column align-items-center justify-content-end">
                <th>
                    <span>{{ $jumlahThread }} hasil</span>
                </th>
                <th>
                    <div class="d-flex align-items-center ml-4">
                        <span>Tampilkan: </span>
                        <select role="search" name="JumlahThread" id="JumlahThread" style="translate: 4px 0px;">
                            <option value="5">5</option>
                            <option value="10">10</option>
                            <option value="20">20</option>
                            <option value="40">40</option>
                            <option value="80">80</option>
                        </select>
                    </div>
                </th>
                <th>
                <button type="button" class="btn-btn info" aria-label="Pertama">
                    <span aria-hidden="true"><<</span>
                    <span>Pertama</span>
                </button> 
                </th>
                <th>
                    <button type="button" class="btn-btn info" aria-label="Sebelumnya">
                        <span aria-hidden="true"><</span>
                        <span>Sebelumnya</span>
                    </button>
                </th>
                <th>
                    <button type="button" class="btn-btn info" aria-label="Berikutnya">
                        <span aria-hidden="true"> > </span> 
                        <span>Berikutnya</span>
                    </button>
                </th>
                <th>
                <button type="button" class="btn-btn info" aria-label="Terakhir">
                        <span aria-hidden="true">>> </span>
                        <span>Terakhir</span>
                </button>
                </th>
            </div>
        </tr>
        </table>
        </div>  
        @endforeach          
        @else
            <fieldset>
                <div style="font-size: 19pt;">
                <p>Belum ada Thread (Utas)</p>
                </div>
            </fieldset>
        @endif    
    </div>
</div>
</div>