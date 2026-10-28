<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data</title>
</head>
<body>

<h1>Tambah Data Kasus</h1>

<form action="/kasus" method="POST">
    @csrf

    Tahun: <input type="number" name="tahun"><br><br>
    Kabupaten: <input type="text" name="kabupaten"><br><br>
    Usia: <input type="number" name="usia"><br><br>
    Pekerjaan: <input type="text" name="pekerjaan"><br><br>
    Perkawinan: <input type="text" name="perkawinan"><br><br>
    Tempat: <input type="text" name="tempat"><br><br>
    Kekerasan: <input type="text" name="kekerasan"><br><br>
    Pendidikan: <input type="text" name="pendidikan"><br><br>
    Layanan: <input type="text" name="layanan"><br><br>

    <button type="submit">Simpan</button>
</form>

</body>
</html>