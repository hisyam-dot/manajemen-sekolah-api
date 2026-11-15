<!DOCTYPE html>
<html>
<head>
    <title>Tambah Siswa</title>
</head>
<body>

    <h1>Tambah Siswa</h1>

    <form action="{{ route('siswa.store') }}" method="POST">

        @csrf

        <div>
            <label>NIS</label>
            <input type="text" name="nis">
        </div>

        <div>
            <label>Nama</label>
            <input type="text" name="nama">
        </div>

        <div>
            <label>Alamat</label>
            <input type="text" name="alamat">
        </div>

        <button type="submit">
            Simpan
        </button>

    </form>

</body>
</html>