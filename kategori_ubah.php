<?php

session_start();
include "connect.php";

?>

<h1 class="mt-4">Kategori Buku</h1>
    <div class="card">
    <div class="card-body">
    <div class="row">
    <div class="col-md-12">
        <form method="post">
            <?php
                $id = $_GET['id'];
                if(isset($_POST)){
                    $kategori =  $_POST('kategori');
                    $query = mysqli_query($koneksi, "UPDATE kategori set kategori='$kategori' WHERE id_kategori=$id");

                    if($query){
                        echo '<script>alert("Tambah data berhasil.");</script?';
                    } else {
                        echo '<script>alert("Tambah data gagal.");</script?';
                    }
                }
                
                $query = mysqli_query($koneksi, "SELECT*FROM kategori where id_kategori=$id");
                $data = mysqli_fetch_array($query);
            ?>
            <div class="row">
                <div class="col-md-4">Nama Kategori</div>
                <div class="col-md-8"><input type="text" class="form-control" value= <?php echo $data['kategori']; ?> name="kategori"></div>
            </div>
            <div class="col-md-2"></div>
            <div class="cold-md-8"></div>
            <button type="submit" class="btn btn-primary" name="submit" value="submit">Simpan</button>
            <button type="reset" class="btn btn-secondary">Reset</button>
            <a href="?page=kategori" class="btn btn-danger">Kembali</a>
        </form>
    </div>
</div>