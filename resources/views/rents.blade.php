@extends('layout/main')
@if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@section('konten')
    <h1>RENTED</h1>
    <br><br>
    <br>
    @if ($rents->count())
        @foreach ($rents as $rent)
            <div class="row">
                <div class="col">
                    <center>
                        <div class="card" style="width: 18rem;">
                            <img src="{{ asset('storage/' . $rent->gambar_sewa) }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{ $rent->nama_sepeda_sewa }}</h5>
                                <p class="card-text">ID : {{ $rent->id_sepeda_sewa }}</p>
                                <?php
                                /*
                                                                                            if (empty($_GET['tipe'])) {
                                                                                        */
                                ?>
                                <p class="card-text">JENIS : {{ $rent->jenis_sepeda_sewa }} BIKE</p>
                                <?php
                                /*
                                                                                            }
                                                                                        */
                                ?>
                                <form action="/rents/{{ $rent->id }}/edit" method="get" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('Apakah anda ingin mengembalikan sepeda ini?')">KEMBALIKAN</button>
                                </form>
                            </div>
                        </div>
                    </center>
                    <br><br><br>
                </div>
            </div>
        @endforeach
    @else
        <p>Belum Ada Sepeda Yang Anda Sewa</p>
    @endif
@endsection
