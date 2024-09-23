<!DOCTYPE html>
<html lang="en">
<head>
    <title>Data user</title>
</head>
<body>
    {{-- Jobsheet 3 --}}
    {{-- <h1>Data user</h1>
    <table border="1" cellpadding="2" cellspacing="0">
        <tr>
            <td>ID</td>
            <td>Username</td>
            <td>Nama</td>
            <td>ID Level pengguna</td>
        </tr>
        @foreach ($data as $d)
            <tr>
                <td> {{$d->user_id}} </td>
                <td> {{$d->username}} </td>
                <td> {{$d->nama}} </td>
                <td> {{$d->level_id}} </td>
            </tr>
        @endforeach
    </table> --}}

    {{-- Jobsheet 4 --}}
    {{-- <table border="1" cellpadding="2" cellspacing="0">
        <tr>
            <td>ID</td>
            <td>Username</td>
            <td>Nama</td>
            <td>ID Level pengguna</td>
        </tr>
        <tr>
            <td> {{$data->user_id}} </td>
            <td> {{$data->username}} </td>
            <td> {{$data->nama}} </td>
            <td> {{$data->level_id}} </td>
        </tr> --}}

        {{-- prak 2.3 --}}
        {{-- <h1>Data user</h1>
        <table border="1" cellpadding="2" cellspacing="0">
            <tr>
                <th>Jumlah Pengguna</th>
            </tr>
            <tr>
                <td> {{$data}} </td>
            </tr>
        </table> --}}

        {{-- prak 2.4 --}}
        {{-- <table border="1" cellpadding="2" cellspacing="0">
            <tr>
                <td>ID</td>
                <td>Username</td>
                <td>Nama</td>
                <td>ID Level pengguna</td>
            </tr>
            <tr>
                <td> {{$data->user_id}} </td>
                <td> {{$data->username}} </td>
                <td> {{$data->nama}} </td>
                <td> {{$data->level_id}} </td>
            </tr>
        </table> --}}

        {{-- prak 2.6 --}}
        {{-- <h1>Data User</h1>
        <a href="{{ url('/user/tambah') }}">+ Tambah User</a>
        <table border="1" cellpadding="2" cellspacing="0">
            <tr>
                <td>ID</td>
                <td>Username</td>
                <td>Nama</td>
                <td>ID Level Pengguna</td>
                <td>Aksi</td>
            </tr>
            @foreach ($data as $d)
            <tr>
                <td>{{ $d->user_id }}</td>
                <td>{{ $d->username }}</td>
                <td>{{ $d->nama }}</td>
                <td>{{ $d->level_id }}</td>
                <td>
                    <a href="{{ url('/user/ubah/' . $d->user_id) }}">Ubah</a> | 
                    <a href="{{ url('/user/hapus/' . $d->user_id) }}">Hapus</a>
                </td>
            </tr>
            @endforeach
        </table> --}}

        {{-- prak 2.7 --}}
        <h1>Data User</h1>
        <a href="{{ url('/user/tambah') }}">+ Tambah User</a>
        <table border="1" cellpadding="2" cellspacing="0">
            <tr>
                <td>ID</td>
                <td>Username</td>
                <td>Nama</td>
                <td>ID Level Pengguna</td>
                <td>Kode Level</td>
                <td>Nama Level</td>
                <td>Aksi</td>
            </tr>
            @foreach ($data as $d)
            <tr>
                <td>{{ $d->user_id }}</td>
                <td>{{ $d->username }}</td>
                <td>{{ $d->nama }}</td>
                <td>{{ $d->level_id }}</td>
                <td>{{$d->level->level_kode}} </td>
                <td>{{$d->level->level_nama}} </td>
                <td>
                    <a href="{{ url('/user/ubah/' . $d->user_id) }}">Ubah</a> | 
                    <a href="{{ url('/user/hapus/' . $d->user_id) }}">Hapus</a>
                </td>
            </tr>
            @endforeach
        </table>
</body>
</html>