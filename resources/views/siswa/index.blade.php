<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body class="bg-light">
    <main class="container">
        
        <!-- START FORM -->
        <div class="my-3 p-3 bg-body rounded shadow-sm">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $siswa )
                            <li>{{ $siswa }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (@session()->has('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endsession
                
            <form action='' method='post' class="mt-20">
            @csrf 

            @if (Route::current()->uri == 'siswa/{id}')
            @method('put')
            @endif

                <div class="mb-3 row">
                    <label for="judul" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name='nama' id="nama" value="{{ isset($data['nama'])?$data['nama']:old('nama') }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="judul" class="col-sm-2 col-form-label">Tempat Lahir</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name='tempat_lahir' id="judul" value="{{ isset($data['tempat_lahir'])?$data['tempat_lahir']:old('tempat_lahir') }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="judul" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" name='tanggal_lahir' id="judul" value="{{ isset($data['tanggal_lahir'])?$data['tanggal_lahir']:old('tanggal_lahir') }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="judul" class="col-sm-2 col-form-label">Alamat</label >
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name='alamat' id="judul" value="{{ isset($data['alamat']) ? $data ['alamat'] : old('alamat') }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="judul" class="col-sm-2 col-form-label">Asal Sekolah</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name='asal_sekolah' id="judul" value="{{ isset($data['asal_sekolah']) ? $data['asal_sekolah'] : old('asal_sekolah') }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="nama" class="col-sm-2 col-form-label">Nomor Handphone</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name='no_hp' id="pengarang" value="{{ isset($data['no_hp']) ? $data['no_hp'] : old('no_hp') }}">
                    </div>
                </div>

                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- AKHIR FORM -->

        @if (Route::current()->uri == 'siswa')

        <!-- START DATA -->
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <table class="table table-striped align-content-center justify-content-center">
                <thead>
                    <tr>
                        <th class="col-md">No</th>
                        <th class="col-md-1">Nama</th>
                        <th class="col-md-2">TTL</th>
                        <th class="col-md-3">Alamat</th>
                        <th class="col-md-2">Asal Sekolah</th>
                        <th class="col-md-2">Nomer Handphone</th>
                        <th class="col-md-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $data as $siswa )
                    
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $siswa['nama'] }}</td>
                        <td>{{ $siswa['tempat_lahir'] }} {{ $siswa['tanggal_lahir'] }}</td>
                        <td>{{ $siswa['alamat'] }}</td>
                        <td>{{ $siswa['asal_sekolah'] }}</td>
                        <td>{{ $siswa['no_hp'] }}</td>
                        <td>
                            <a href="{{ url('siswa/'.$siswa['id']) }}" class="btn btn-outline-success btn-sm">Edit</a>
                            <form action="{{ url('siswa/'.$siswa['id']) }}" method="post" onsubmit="return confirm('Apakah anda yakin ingin melakukan penghapusan data ?')" class="d-inline">
                                @csrf
                                @method('delete')
                            <button type="submit" name  ="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>

                    @endforeach
                </tbody>
            </table>

        </div>
        <!-- AKHIR DATA -->
        @endif
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>

</body>

</html>
