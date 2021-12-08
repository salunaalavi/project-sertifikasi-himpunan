@extends('layout/log')

@if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if (session()->has('failed'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('failed') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@section('konten')
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <center>
                        <h2>MASUK</h2><br>
                        <h6>Isi Data Dibawah Ini</h6>
                    </center>
                    <br>
                    <center>
                        <br>
                        <!-- cek pesan notifikasi -->
                        <?php
                        /*
                                                                        if (isset($_GET['pesan'])) {
                                                                            if ($_GET['pesan'] == 'gagal') {
                                                                                echo 'Login Gagal! Username atau Password Anda Salah!';
                                                                            } elseif ($_GET['pesan'] == 'logout') {
                                                                                echo 'Anda Telah Logout!';
                                                                            } elseif ($_GET['pesan'] == 'belum_login') {
                                                                                echo 'Anda Harus Login Untuk Mengakses Situs';
                                                                            }
                                                                        }
                                                                        */
                        ?>
                    </center>
                    <div id="login">
                        <form method="POST" action="{{ url('login') }}">
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" name="username" placeholder="username"
                                    id="username" required>
                                <label for="floatingInput">Username</label>
                            </div>
                            <div class="form-floating">
                                <input type="password" class="form-control" name="password" placeholder="password"
                                    id="password" required>
                                <label for="floatingPassword">Password</label>
                            </div>
                            <br><br>
                            <!-- <td><input type="submit" value="LOGIN"></td> -->
                            <input type="submit" value="MASUK" class="btn-login">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="SignIn" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <center>
                        <h2>DAFTAR</h2><br>
                        <h6>Isi Data Dibawah Ini</h6>
                    </center>
                    <br>
                    <center>
                        <br>
                        <!-- cek pesan notifikasi -->
                        <?php
                        /*
                                                                        require 'functions.php';
                                                                        if (isset($_POST['submit'])) {
                                                                            if (tambah($_POST) > 0) {
                                                                                echo "
                                                                                            <script>
                                                                                                alert('Anda Telah Terdaftar!! Silahkan Login Untuk Melanjutkan!!');
                                                                                                document.location.href = 'login.php';
                                                                                            </script>
                                                                                            ";
                                                                            } else {
                                                                                echo "
                                                                                            <script>
                                                                                                alert('Username Yang Anda Gunakan Telah Terdaftar!!');
                                                                                                document.location.href = 'login.php';
                                                                                            </script>
                                                                                            ";
                                                                            }
                                                                        }
                                                                        */
                        ?>
                    </center>
                    <div id="login">
                        <form method="POST" action="{{ url('register') }}">
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="text" name="id_pengguna"
                                    class="form-control @error('name')is_invalid                                   
                                @enderror"
                                    placeholder="id" id="id" required>
                                <label for="floatingInput">ID</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" name="username"
                                    class="form-control @error('name')is_invalid                                   
                                @enderror"
                                    placeholder="username" id="username" required>
                                <label for="floatingInput">Username</label>
                            </div>
                            <div class="form-floating">
                                <input type="password" name="password"
                                    class="form-control @error('name')is_invalid                                   
                                @enderror"
                                    placeholder="password" id="password" required>
                                <label for="floatingPassword">Password</label>
                            </div>
                            <br><br>
                            <!-- <td><input type="submit" value="LOGIN"></td> -->
                            <input type="submit" value="DAFTAR" class="btn-login" name="submit" required>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
