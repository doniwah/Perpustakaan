<?php

session_start();
include "connect.php";

?>

<h1 class="mt-4">Buku</h1>
    <div class="card">
    <div class="card-body">
    <div class="row">
    <div class="col-md-12">
        <form method="post">
            <?php
                $id = $_GET['id'];
                if(isset($_POST)){
                    $id_kategori =  $_POST('id_kategori');
                    $penulis =  $_POST('judul');
                    $penerbit =  $_POST('penerbit');
                    $tahun_terbit =  $_POST('tahun_terbit');
                    $deskripsi =  $_POST('deskripsi');
                    $query = mysqli_query($koneksi, "UPDATE buku SET id_kategori='$id_kategori', judul ='$judul', penulis='$penulis', penerbit='$penerbit, tahun_terbit='$tahun_terbit, deskripsi='$deskripsi WHERE id_buku=$id");

                    if($query){
                        echo '<script>alert("Ubah data berhasil.");</script?';
                    } else {
                        echo '<script>alert("Ubah data gagal.");</script?';
                    }
                }
                $query = mysqli_query($koneksi, "SELECT*FROM kategori");
                $data = mysqli_fetch_array($query);
            ?>
            <div class="row mb-3">
                <div class="col-md-4">Kategori</div>
                <div class="col-md-8"></div>
                    <select name="id_kategori" class="form-control">
                        <?php
                            $kat = mysqli_query($koneksi, "SELECT*FROM kategori");
                            while ($kategori =  mysqli_fetch_array($kat)) {
                                ?>
                                <option <?php if ($kategori ['id_kategori'] == $data ['id_kategori']) echo 'selected'; ?> value="<?php echo $kategori ['id_kategori']; ?>"><?php echo $kategori ['kategori']; ?></option>
                                <?php
                            }
                            ?>
                    </select>
            </div>
            <div class="row mb-3">
                    <div class="col-md-4">Judul</div>
                    <div class="col-md-8"><input type="text" value="<?php echo $data ['judul']; ?>" class="form-control" name="judul"></div>
            </div>
                    <div class="col-md-4">Penulis</div>
                    <div class="col-md-8"><input type="text" value="<?php echo $data ['penulis']; ?>" class="form-control" name="penulis"></div>
            </div>
                    <div class="col-md-4">Penerbit</div>
                    <div class="col-md-8"><input type="text" value="<?php echo $data ['penerbit']; ?>" class="form-control" name="penerbit"></div>
            </div>
                    <div class="col-md-4">Tahun Terbit</div>
                    <div class="col-md-8"><input type="number" value="<?php echo $data ['tahun_terbit']; ?>" class="form-control" name="tahun_terbit"></div>
            </div>
                    <div class="col-md-4">Deskripsi</div>
                    <div class="col-md-8">
                        <textarea name="deskripsi" rows="5" class="form-control" value="<?php echo $data ['deskripsi']; ?>"></textarea>
            </div>
            <div class="row">
            <div class="col-md-4"></div>
            <div class="cold-md-8"></div>
            <button type="submit" class="btn btn-primary" name="submit" value="submit">Simpan</button>
            <button type="reset" class="btn btn-secondary">Reset</button>
            <a href="?page=kategori" class="btn btn-danger">Kembali</a>
        </form>
    </div>
</div>