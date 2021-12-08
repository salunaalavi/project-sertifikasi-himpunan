<div class="modal fade" id="Ubah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <center>
                    <h2>UBAH DATA AKUN</h2>
                </center>
                <br>
                <center>
                    <br>
                    <!-- cek pesan notifikasi -->
                    <?php
                    /*
                                                                                        $id = $_SESSION['id'];
                                                                                        $pgn = query("SELECT * FROM pengguna WHERE id = '$id'")[0];
                                                                                        
                                                                                        if (isset($_POST['submit'])) {
                                                                                            if (ubah($_POST) > 0) {
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
                    <form method="POST" action="">
                        <div class="form-floating mb-3" style="display: none;">
                            <input type="text" class="form-control" name="id" placeholder="id" id="id" required
                                value="{{ auth()->user()->id_pengguna }}">
                            <label for="floatingInput">ID</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="username" placeholder="username"
                                id="username" required value="{{ auth()->user()->username }}">
                            <label for="floatingInput">Username</label>
                        </div>
                        <div class="form-floating">
                            <input type="password" class="form-control" name="password" placeholder="password"
                                id="password" required value="{{ auth()->user()->password }}">
                            <label for="floatingPassword">Password</label>
                        </div>
                        <br><br>
                        <!-- <td><input type="submit" value="LOGIN"></td> -->
                        <input type="submit" value="UBAH" class="btn-login" name="submit" required>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
