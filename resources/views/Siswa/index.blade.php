<!DOCTYPE html>
<html>
<head>
    <title>Data Siswa</title>
</head>
<body>

    <h1>Data Siswa</h1>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>NIS</th>
                <th>Nama</th>
                <th>Alamat</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($siswa as $item)
                <tr>
                    <td>{{ $item->id_siswa }}</td>
                    <td>{{ $item->nis }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->alamat }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    

</body>
</html>