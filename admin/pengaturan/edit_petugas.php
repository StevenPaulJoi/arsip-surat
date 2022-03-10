<?php
$id_petugas = $_GET['id_petugas'];
$query = mysqli_query($conn,"select * from tb_petugas where id_petugas = '$id_petugas' ");
$data = mysqli_fetch_array($query);
?>

<div class="container" style="margin-bottom: 20px">
    <form action="" method="post" class="form-signin">
        <h4>Edit Data Petugas</h4>
        <div class="row" style="width:100%">
            <div class="col-md-3">
                <h4> ID Petugas</h4>
                <input type="text" class="form-control" name="id_petugas" style="width: 100%" required="" value="<?= $data['id_petugas']?>">
            </div>
            <div class="col-md-5">
                <h4> Nama Depan</h4>
                <input type="text" class="form-control" name="nama_depan" style="width: 100%" required="" value="<?= $data['nama_depan']?>">
            </div>
            <div class="col-md-4">
                <h4> Nama Belakang</h4>
                <input type="text" class="form-control" name="nama_belakang" style="width: 100% " required="" value="<?= $data['nama_belakang']?>">
            </div>
        </div>
        <div class="row" style="width:100%">
            <div class="col-md-4">
                <h4> Kata Sandi</h4>
                <input type="text" class="form-control" name="password" style="width: 100%" required="" value="<?= $data['password']?>">
            </div>
            <div class="col-md-4">
                <h4> Hak Akses</h4>
                <select class="form-control" name="hak" id="hak" required="" style="width: 100%" required="" value="">
                    <option value="Admin"<?php if($data['hak'] == 'Admin'){echo 'selected';}?>>Admin</option>
                    <option value="Petugas"<?php if($data['hak'] == 'Petugas'){echo 'selected';}?>>Petugas </option>
                    <option value="Pemimpin"<?php if($data['hak'] == 'Pemimpin'){echo 'selected';}?>>Pemimpin</option>
                </select><br>
            </div>
            <div class="col-md-4">
                <h4> Status</h4>
                <select class="form-control" name="status_petugas" id="status_petugas" required="" style="width: 100%;">
                    <option value="Aktif" <?php if($data['status_petugas'] == 'Aktif'){echo 'selected';}?>>Aktif</option>
                    <option value="Nonaktif" <?php if($data['status_petugas'] == 'NonAktif'){echo 'selected';}?>>NonAktif</option>
                </select><br>
            </div>
            <div class="col-md-12">
                <h4>Email</h4>
                <input type="text" class="form-control" name="email"  style="width: 100%;" required="" value="<?= $data['email']?>"><br>
            </div>
            <div class="row">
                <center><td>
                        <a href="?page=kelola_petugas"><buttonstyle="cursor: pointer" class="btn btn-sm btn-danger"></i> Kembali</button></a>
                        <button type="submit" style="cursor: pointer" class="btn btn-sm btn-success" name="edit"><i class="fa fa-check"></i> Simpan</button>
                </center></td>
                </div>
            </div>
        </form>
            <?php
            if(isset($_POST['edit'])){
                $nama_depan = $_POST['nama_depan'];
                $nama_belakang = $_POST['nama_belakang'];
                $password = md5($_POST['password']);
                $hak= $_POST['hak'];
                $status = $_POST['status_petugas'];
                $email = $_POST['email'];

                $update = "UPDATE tb_petugas SET  nama_depan = '$nama_depan', nama_belakang = '$nama_belakang', password = '$password', hak='$hak', status_petugas='$status', email='$email' WHERE id_petugas = '$id_petugas' ";
                if(mysqli_query($conn,$update)){
                    ?>
                    <script>alert('Data Berhasil Diedit');</script>
                    <script>window.location.href='?page=kelola_petugas'</script>
                <?php
                }else{
                ?>
                    <script>alert('Data Gagal Diedit');</script>
                    <script>window.location.href='?page=kelola_petugas'</script>
                <?php

                }
            }
            ?>

