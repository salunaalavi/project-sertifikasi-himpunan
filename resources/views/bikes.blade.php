@extends('layout/main')
@if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@if (session()->has('berhasil'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('berhasil') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@if (session()->has('oke'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('oke') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@section('konten')
    <h1>{{ $tipe }} BIKES</h1>
    <!-- tambah data -->
    @if (auth()->user()->id_pengguna == '1111')
        <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
            data-bs-target="#TambahSepeda">TAMBAH</button>
    @endif
    <div class="modal fade" id="TambahSepeda" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <center>
                        <h2>TAMBAH SEPEDA</h2>
                    </center>
                    <br>
                    <br>
                    <div id="login">
                        <form method="POST" action="/bikes" enctype="multipart/form-data">
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="id_sepeda" placeholder="id_sepeda"
                                    id="id_sepeda" required>
                                <label for="floatingInput">ID Sepeda</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="nama_sepeda" placeholder="nama_sepeda"
                                    id="nama_sepeda" required>
                                <label for="floatingInput">Nama Sepeda</label>
                            </div>
                            <div class="form-floating mb-3">
                                <select class="form-select" aria-label="Default select example" name="jenis_sepeda"
                                    placeholder="jenis_sepeda" id="jenis_sepeda" required>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->tipe }}">{{ $category->tipe }} BIKE</option>
                                    @endforeach
                                </select>
                                <label for="jenis_sepeda">Kategori Sepeda</label>
                            </div>
                            <div class="form-floating mb-3">
                                <div class="mb-3">
                                    <label for="gambar" class="form-label">Gambar Sepeda</label>
                                    <input class="form-control" type="file" id="gambar" name="gambar">
                                </div>
                            </div>
                            <br><br>
                            <!-- <td><input type="submit" value="LOGIN"></td> -->
                            <input type="submit" value="TAMBAH" class="btn-login" name="submit_sepeda" required>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if ($bikes->count())
        <div class="row">
            @foreach ($bikes as $bike)
                <div class="col">
                    <center>
                        <div class="card" style="width: 18rem;">
                            <img src="{{ asset('storage/' . $bike->gambar) }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{ $bike->nama_sepeda }}</h5>
                                <p class="card-text">ID : {{ $bike->id_sepeda }}</p>
                                <p class="card-text">JENIS : {{ $bike->jenis_sepeda }} BIKE</p>
                                <form action="/bikes/{{ $bike->id }}/edit" method="get" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('Apakah anda ingin menyewa sepeda ini?')">SEWA</button>
                                </form>
                                @if (auth()->user()->id_pengguna == '1111')
                                    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                                        data-bs-target="#UbahSepeda{{ $bike->id_sepeda }}">UBAH</button>
                                    <form action="/bikes/{{ $bike->id }}" method="post" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-outline-primary"
                                            onclick="return confirm('Apakah anda ingin menghapus data?')">HAPUS</button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </center>
                    <br><br><br>
                </div>

                <div class="modal fade" id="UbahSepeda{{ $bike->id_sepeda }}" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <center>
                                    <h2>UBAH DATA SEPEDA</h2>
                                </center>
                                <br>
                                <br>
                                <div id="login">
                                    <form method="POST" action="/bikes/{{ $bike->id }}" enctype="multipart/form-data">
                                        @method('put')
                                        @csrf
                                        <div class="form-floating mb-3" style="display: none;">
                                            <input type="hidden" name="old_gambar" value="{{ $bike->gambar }}">
                                            <input type="text" class="form-control" name="id_sepeda"
                                                placeholder="id_sepeda" id="id_sepeda" required
                                                value="{{ $bike->id_sepeda }}">
                                            <label for="floatingInput">ID</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" name="nama_sepeda"
                                                placeholder="nama_sepeda" id="nama_sepeda" required
                                                value="{{ $bike->nama_sepeda }}">
                                            <label for="floatingInput">Nama Sepeda</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <select class="form-select" aria-label="Default select example"
                                                name="jenis_sepeda" placeholder="jenis_sepeda" id="jenis_sepeda" required>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->tipe }}">{{ $category->tipe }} BIKE
                                                    </option>
                                                @endforeach
                                            </select>
                                            <label for="jenis_sepeda">Kategori Sepeda</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <div class="mb-3">
                                                <label for="gambar" class="form-label">Gambar Sepeda</label>
                                                <input class="form-control" type="file" id="gambar" name="gambar">
                                            </div>
                                        </div>
                                        <br><br>
                                        <!-- <td><input type="submit" value="LOGIN"></td> -->
                                        <input type="submit" value="UBAH" class="btn-login" name="submit2" required>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p>Sepeda Belum Ditambahkan!!</p>
    @endif

    <div class="d-flex justify-content-center">
        {{ $bikes->links() }}
    </div>
@endsection
