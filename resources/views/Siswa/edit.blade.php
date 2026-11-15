<!DOCTYPE html>
<html>
<head>
    <title>Edit Siswa</title>
</head>
<body>

    <h1>Edit Siswa</h1>

    <form action="{{ route('siswa.update', $siswa->id) }}" method="POST">

        @csrf
        @method('PUT')

        <div>
            <label>NIS</label>
            <input 
                type="text" 
                name="nis"
                value="{{ $siswa->nis }}"
            >
        </div>

        <div>
            <label>Nama</label>
            <input 
                type="text" 
                name="nama"
                value="{{ $siswa->nama }}"
            >
        </div>

        <div>
            <label>Alamat</label>
            <input 
                type="alamat" 
                name="alamat"
                value="{{ $siswa->alamat }}"
            >
        </div>

        <button type="submit">
            Update
        </button>

    </form>

</body>
</html>