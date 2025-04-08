@extends('layouts.templatesiswa')
@section('title', 'Thread Baru - EduSMA')
@section('content')
<div class="diodamar">
    <table style="border: none;">
    <tr>
        <td>
            <h1>{NamaMataPelajaran}</h1>
            <h6>Penerima Thread harus ditulis dengan Nama Kelas</h6>
        </td>
        <td colspan=10>
            <img src="https://www.colorhexa.com/ffffff.png" length="20" width="5">
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
        <td>
            <a href="{{ __('http://127.0.0.1:8000/NamaMataPelajaran/materi/forum-untuk-siswa') }}">
                <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEjbG5kZxZ2y4wxgE4JJFjEkcZcCNcBZC4PGFBJqkRFwQOih8Nknq-3e0ePl0tn8qR2tGkUpISpKm6LCktzqJcQYWQgSLPQQYe44mbtPMe_pJ6zlexrtItAPf0OoibbphhO7gdKxN2uNsJmDX4pS2SKFacCgwa-hO813iN4ij4D7tj_QFRWdASp1708yYdE/s512/left-arrow_44686.png" length="64" width="64">
            </a>
        </td>
    </tr>
    </table>
</div>
<br>
<div class="grid-container">
    <div class="grid-column">
        <div class="d-flex flex-sm-row flex-row p-2" style="border: none;">
        <form action="{{ url('mata_pelajaran.thread-baru-siswa') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="d-flex flex-md-row flex-row">
        <label for="PenerimaThread">Penerima Thread: </label><br>
            <div class="d-flex flex-column p-1">
                <input type="text" name="PenerimaThread" id="PenerimaThread" required>
            </div>
        </div>
        <br>
        <div class="d-flex flex-md-row flex-row">
            <label for="Materi">Materi: </label>
                <div class="d-flex flex-column p-1">
                <select name="Materi" id="Materi"> 
                @for ($i = 1; $i <= 10; ++$i) 
                    <option value="Materi Minggu {{$i}}">Materi Minggu {{$i}}</option>
                @endfor
                </select>
                </div>
        </div>
        <br>
        <div class="d-flex flex-sm-row flex-column">
            <label for="JudulThread" >Judul Thread: </label>
            <div class="d-flex flex-column p-1">
                <input type="text" name="JudulThread" id="JudulThread" required>
            </div>
        </div>
        <br> 
        <div class="d-flex flex-sm-row flex-row">
            <label for="IsiThread" class="d-flex">Isi Thread: </label>
        </div>
        <div class="d-flex flex-sm-row flex-row">
            <textarea name="IsiThread" id="IsiThread" cols="100" rows="10" required>
            </textarea>
        </div>
        <br>
        <div id="toolbar_13c5aaec-9a15-41bb-81f3-b8b8a71-ea8be" class>
            <div class="jodit-toolbar-editor-collection jodit-toolbar-editor-collection_mode_horizontal jodit-toolbar-editor-collection_size_middle">
                <input tab-index="-1" disabled="true" style="width: 0; height: 0; position: absolute; visibility: hidden;">
                <div class="jodit-ui-group jodit-ui-group_size_middle jodit-ui-group_line_true">
                    <div class="jodit-ui-group jodit-ui-group_size_middle">
                        <span class="jodit-toolbar-button jodit-toolbar-button_size_middle jodit-toolbar-button_variant_initial jodit-toolbar-button_undo jodit-ui-group__undo" role="listitem" data-ref="undo" ref="undo" aria-label="Urungkan" disabled="disabled">
                            <button class="jodit-toolbar-button__button" type="button" role="button" aria-pressed="false" aria-label="Urungkan" tabindex="0" disabled="disabled">
                                <span class="jodit-toolbar-button__icon">
                                <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEiN4uEqjvAoQuQyYj0Ney79JveXsRs9j8hSmCbbyGZ3J9gWimM2r3rUQhj5PCtpqnj9fkcfL6Q3iFpbqQzQtRY1ackDaDvO1bEss_H2KjSKTEFqKOKKHgooNGKAmrC12WNLlGPwOGG8X_t_9Jcz5ik5bKNNhzPMqk-Ca_XIU4R4dqafunvx-a3DYrQJ-6k/s512/undo-arrow.png" length="16" width="16">
                                </span>
                                <span class="jodit-toolbar-button__text">
                                </span>
                            </button>
                        </span>
                        <span class="jodit-toolbar-button jodit-toolbar-button_size_middle jodit-toolbar-button_variant_initial jodit-toolbar-button_redo jodit-ui-group__redo" role="listitem" data-ref="redo" ref="redo" aria-label="Ulangi penulisan/penyuntingan" disabled="disabled">
                            <button class="jodit-toolbar-button__button" type="button" role="button" aria-label="Ulangi penulisan/penyuntingan" tabindex="0" disabled="disabled">
                                <span class="jodit-toolbar-button__icon">
                                    <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEha1wi51pb-tZAVuDBjq4OcgK4gdqClQ1aJCUjoHXO9hXLiLRVPAxtCqcHutQr5BoVCTZS15l3YZd8fUGzMF5Mh0yb-ocYIbEEeqJXwXDt62FYllCOTAqQDvZXiEu6T-75FANRKU-Ab3FNFUdH87FvOOVJHrgDKEGN_mG7ZWR716GpLG-EtRQ543k-H8_M/s512/redo-arrow-symbol.png" length="16" width="16">
                                </span>
                                <span class="jodit-toolbar-button__text">
                                </span>
                            </button>
                        </span>
                        <span class="jodit-toolbar-button jodit-toolbar-button_size_middle jodit-toolbar-button_variant_initial jodit-toolbar-button_bold jodit-ui-group__bold" role="listitem" data-ref="bold" ref="bold" aria-label="Bold" disabled="disabled">
                        <button class="jodit-toolbar-button__button" type="button" role="button" aria-label="Bold" tabindex="0" disabled="disabled">
                        <span class="jodit-toolbar-button__icon">
                            <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEijM8bDzeCT9n7-57Us2Q1JzzacAkvpgVpH5DbSVGXl9OOJXemTu_FWPITYPUARDEp4_jn76mmogodWoAta1eil6MpnqWu3jiHp7y2H2zvgErLqOZQIGx_QiUVexG4dLtzesYn3HD81Czei2DHrISKJylFT2s89B_ClGZZx5V-zfOQ2HlxbwvN1Vsksmuw/s512/bold-text.png" length="16" width="16">
                        </span>
                        <span class="jodit-toolbar-button__text">
                        </span>                        
                        </button>
                        </span>
                        <span class="jodit-toolbar-button jodit-toolbar-button_size_middle jodit-toolbar-button_variant_initial jodit-toolbar-button_italic jodit-ui-group__italic" role="listitem" data-ref="italic" ref="italic" aria-label="Italic" disabled="disabled">
                            <button class="jodit-toolbar-button__button" type="button" role="button" aria-label="Italic" tabindex="0" disabled="disabled">
                                <span class="jodit-toolbar-button__icon">
                                    <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEjJLfNs4J83iGqkwWbFptUZGObh0LR0yB_6T2IK5rXQkwsS_nmsH_raNN-onvybtLLFLARzPzcmqbRw-cAmd-2gtE9N1JIhIhrrwshe8_Ya8UwZITQjoFSSp73nkn32HrrHFQg6sDgekJYkUbz-K8hD6X3QHnjeXeRxzKbi3PwdULn064PitkVi_BWFweI/s512/italic-text.png" length="16" width="16">
                                </span>
                                <span class="jodit-toolbar-button__text">
                                </span>  
                            </button>
                        </span>
                        <span class="jodit-toolbar-button jodit-toolbar-button_size_middle jodit-toolbar-button_variant_initial jodit-toolbar-button_underline jodit-ui-group__underline" role="listitem" data-ref="underline" ref="underline" aria-label="Underline" disabled="disabled">
                            <button class="jodit-toolbar-button__button" type="button" role="button" aria-label="Underline" tabindex="0" disabled="disabled">
                                <span class="jodit-toolbar-button__icon">
                                    <img src="https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEiZ6HOIZlJjJBQ-v7M4YsRbKekzcRR0uXGirK23qfYaY2gAaNQaEKq-PHqCfZPwQabo1U8mxg79CKUNK_L1oHf9iTF_sAW1ThX8MVZ7XvNRf4Sjlcd5CtA25MCPhSjo32nqOijb7ACz1ouwMAgTUQK8WeQASGIrj-97AuJjzOETCRyYxR5n7wb7bVQIs8U/s512/underlined-text.png" length="16" width="16">
                                </span>
                                <span class="jodit-toolbar-button__text">
                                </span>  
                            </button>
                        </span>
                        <span class="jodit-toolbar-button jodit-toolbar-button_size_middle jodit-toolbar-button_variant_initial" role="listitem" data-ref="file" ref="file" aria-label="BerkasThread" disabled="disabled">
                            <input type="file" role="button" name="BerkasThread" id="BerkasThread" accept=".pdf, .docx, .pptx, .xlsx, .zip, .7z">
                        </span>
                        @csrf
                        <button type="submit" class="btn btn-success">Kirim!</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection