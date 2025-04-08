<form action="{{ route('siswa.mata-pelajaran-siswa') }}" method="get">
<div style = "font-size: 22pt;">
Semester:
<select name="Semester">
    <option value="Ganjil 2023/2024">Ganjil 2023/2024</option>
    <option value="Genap 2023/2024">Genap 2023/2024</option>
    <option value="Ganjil 2024/2025">Ganjil 2024/2025</option>
    <option value="Genap 2024/2025">Genap 2024/2025</option>
    <option value="Ganjil 2025/2026">Ganjil 2025/2026</option>
    <option value="Genap 2025/2026">Genap 2025/2026</option>
</select>
Kelas: 
    <select name="Kelas">
    <option value="X IPA 1">X IPA 1</option>
    <option value="X IPA 2">X IPA 2</option>
    <option value="X IPA 3">X IPA 3</option>
    <option value="X IPS 1">X IPS 1</option>
    <option value="X IPS 2">X IPS 2</option>
    <option value="X IPS 3">X IPS 3</option>
    <option value="XI IPA 1">XI IPA 1</option>
    <option value="XI IPA 2">XI IPA 2</option>
    <option value="XI IPA 3">XI IPA 3</option>
    <option value="XI IPS 1">XI IPS 1</option>
    <option value="XI IPS 2">XI IPS 2</option>
    <option value="XI IPS 3">XI IPS 3</option>
    <option value="XII IPA 1">XII IPA 1</option>
    <option value="XII IPA 2">XII IPA 2</option>
    <option value="XII IPA 3">XII IPA 3</option>
    <option value="XII IPS 1">XII IPS 1</option>
    <option value="XII IPS 2">XII IPS 2</option>
    <option value="XII IPS 3">XII IPS 3</option>
    </select>
    <button type="submit" class = "btn btn-success">Cari!</button>
</div>
</form>