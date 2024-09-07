<?php

include "connect.php";

?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Register ke Perpustakaan Digital</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Register Perpustakaan Digital</h3></div>
                                    <div class="card-body">
                                        <?php
                                        if(isset($_POST['register'])){
                                            $nama = $_POST['nama'];
                                            $email = $_POST['email'];
                                            $alamat = $_POST['alamat'];
                                            $no_telepon = $_POST['no_telepon'];
                                            $username = $_POST['username'];
                                            $level = $_POST['level'];
                                            $password = md5($_POST['password']);

                                            
                                            $insert = mysqli_query($koneksi, "INSERT INTO user(nama,email,alamat,no_telepon,username,password, level) VALUE('$nama','$email','$alamat','$no_telepon','$username','$password','$level')");
                                            
                                            if($insert)
                                            {
                                                echo '<script>alert("Selamat, register berhasil. silahkan login"); location.href="login.php";</script>';
                                            }else {
                                                echo '<script>alert("Register gagal, silahkan register kembali");</script>';
                                            }
                                        }

                                        ?>
                                        <form method="post">
                                            <div class="form-floating mb-3">
                                                <input class="form-control"type="text" require name="nama" placeholder="Masukkan Nama Lengkap" />
                                                <label>Nama lengkap</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control"type="text" require name="email" placeholder="Masukkan Email" />
                                                <label>Email</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control"type="text" require name="no_telepon" placeholder="Masukkan No. Telepon" />
                                                <label>No. Telepon</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <textarea name="alamat" require class="form-control"></textarea>
                                                <label>Alamat</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="username" require type="username" name="username" placeholder="Masukkan username" />
                                                <label>username</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="password" require name="password" type="password" placeholder="Masukkan password" />
                                                <label for="inputPassword">Password</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <select name="level" require class="form-control">
                                                    <option value="peminjam">Peminjam</option>
                                                    <option value="admin">Admin</option>
                                                </select>
                                                <label>Level</label>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <button class="btn btn-primary" type="submit" name="register" value="register">Register</button>
                                                <a class="btn btn-danger" href="login.php" >Login</a>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small">
                                            &copy; 2024 Perpustakaan Digital
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
