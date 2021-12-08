@extends('layout/category')
@if (session()->has('berhasil'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('berhasil') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@section('konten')
    @foreach ($categories as $category)
        <div class="modal fade" id="UbahKategori{{ $category->id_tipe }}" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <center>
                            <h2>UBAH DATA KATEGORI</h2>
                        </center>
                        <br>
                        <center>
                            <br>
                            <!-- cek pesan notifikasi -->
                            <?php
                            /*
                                                                                    $id_tipe = $baris['id_tipe'];
                                                                                    $ktg = query("SELECT * FROM kategori WHERE id_tipe = '$id_tipe'")[0];
                                                                                    
                                                                                    if (isset($_POST['submit2'])) {
                                                                                        if (ubah_sepeda($_POST) > 0) {
                                                                                            echo "
                                                                                                              <script>
                                                                                                                  alert('Data berhasil diubah');
                                                                                                                  document.location.href = 'index.php';
                                                                                                              </script>
                                                                                                              ";
                                                                                        } else {
                                                                                            echo "
                                                                                                              <script>
                                                                                                                  alert('Data gagal diubah');
                                                                                                                  document.location.href = 'index.php';
                                                                                                              </script>
                                                                                                              ";
                                                                                        }
                                                                                    }
                                                                                    */
                            ?>
                        </center>
                        <div id="login">
                            <form method="POST" action="/categories/{{ $category->id }}" enctype="multipart/form-data">
                                @method('put')
                                @csrf
                                <div class="form-floating mb-3" style="display: none;">
                                    <input type="text" class="form-control" name="id_tipe" placeholder="id_tipe"
                                        id="id_tipe" required value="{{ $category->id_tipe }}">
                                </div>
                                <div class="form-floating mb-3" style="display: none;">
                                    <input type="text" class="form-control" name="old_nama_gambar"
                                        placeholder="old_nama_gambar" id="old_nama_gambar" required
                                        value="{{ $category->nama_gambar }}">
                                </div>
                                <div class="form-floating mb-3">
                                    <textarea class="form-control" name="deskripsi" placeholder="deskripsi" id="deskripsi"
                                        required value="{{ $category->deskripsi }}" rows="5"></textarea>
                                    <label for="floatingInput">Deskripsi Kategori</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <div class="mb-3">
                                        <label for="nama_gambar" class="form-label">Gambar Kategori</label>
                                        <input class="form-control" type="file" id="nama_gambar" name="nama_gambar">
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
        <center>
            <figure class="figure">
                <img src="{{ asset('storage/' . $category->nama_gambar) }}" alt="" class="figure-img" width="1349"
                    height="720">
                <figcaption class="figure-caption text-end">
                    <div class="custom-container">
                        <center>
                            <br><br><br>
                            <b>
                                <h4 class="display-6">{{ $category->tipe }} BIKES</h4>
                            </b>
                            <br>
                            <p class="lead">{{ $category->deskripsi }}</p>
                            <br>
                            <a href="/bikes?category={{ $category->tipe }}" class="btn btn-danger"
                                role="button">KUNJUNGI</a>
                            @if (auth()->user()->id_pengguna == '1111')
                                <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                                    data-bs-target="#UbahKategori{{ $category->id_tipe }}">UBAH</button>
                            @endif
                            <br><br><br><br>
                        </center>
                    </div>
                </figcaption>
            </figure>
        </center>
        <?php
        /*
                                            }
                                            
                                            }
                                            */
        ?>
        </div>
    @endforeach
@endsection
