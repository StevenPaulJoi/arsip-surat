<?php
$sel = "SELECT max(id_petugas) as maxKode from tb_petugas";
$hasil = mysqli_query($conn, $sel);
$data = mysqli_fetch_array($hasil);
$id = $data['maxKode'];
$noUrut = (int) substr($id, 1, 3);
$noUrut++;
$char = "P";
$newID = $char . sprintf("%03s", $noUrut);
?>

<?php
function cekdata($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data ;
}
?>

<?php
if(isset($_POST['tambah'])){
    $id_petugas = cekdata($_POST['id_petugas']);
    $nama_depan = cekdata($_POST['nama_depan']);
    $nama_belakang = cekdata($_POST['nama_belakang']);
    $password =  md5($_POST['password']);
    $akses = cekdata($_POST['hak']);
    $status = cekdata($_POST['status_petugas']);
    $email = cekdata($_POST['email']);

    $insert = "INSERT INTO tb_petugas VALUES('$id_petugas','$nama_depan','$nama_belakang','$password','$akses','$status','$email')";
    if(mysqli_query($conn,$insert)){

        ?>
        <script>alert('Data Berhasil Tersimpan');</script>
        <script>window.location.href='?page=kelola_petugas'</script>
    <?php

    }else{
        ?>
        <script>alert('Data Gagal Tersimpan');</script>
        <script>window.location.href='?page=kelola_petugas'</script>
    <?php
    }
}
?>

<?php
if(isset($_POST['ubah'])){
    $pass1 = md5($_POST['baru']);
    $pass2 = md5($_POST['konfirmasi']);
    $pass = $_POST['lama'];

    if($pass1 != $pass2){
        ?>
        <script>alert('Konfirmasi Password Anda Salah');</script>
        <script>window.location.href='?page=kelola_petugas'</script>
    <?php
    }else{
        if(md5($pass)== $dataprofile['password']){
            mysqli_query($conn,"update tb_petugas set password ='$pass1' where id_petugas = '$dataprofile[id_petugas]'");
            ?>
            <script>alert('Edit Password Anda Behasil');</script>
            <script>window.location.href='?page=kelola_petugas'</script>
        <?php
        }else{
            ?>
            <script>alert(' Password Anda Salah');</script>
            <script>window.location.href='?page=kelola_petugas'</script>
        <?php
        }
    }
}
?>
<div class="container" style="width: 100%;padding: 0;margin-left: 15px">
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-body"  style="background-color: ">
                    <div class="card card-body">
                        <h3><i class="fa fa-users"></i> Tambah Petugas</h3>
                        <hr>
                        <form action="" method="post">
                            <div class="row" style="width:100%">
                                <div class="col-md-3">
                                    <h4> ID Petugas</h4>
                                    <input type="text" class="form-control" name="id_petugas" style="width: 100%" required="" value="<?php echo $newID?>" readonly>
                                </div>
                                <div class="col-md-5">
                                    <h4> Nama Depan</h4>
                                    <input type="text" pattern="[A-Za-z]+" title="hanya bisa diisi dengan Huruf A-Z" class="form-control" name="nama_depan" style="width: 100%" required="">
                                </div>
                                <div class="col-md-4">
                                    <h4> Nama Belakang</h4>
                                    <input type="text" pattern="[A-Za-z]+" title="hanya bisa diisi dengan Huruf A-Z" class="form-control" name="nama_belakang" style="width: 100% " required="">
                                </div>
                            </div>
                            <div class="row" style="width:100%">
                                <div class="col-md-4">
                                    <h4> Kata Sandi</h4>
                                    <input type="password" class="form-control" name="password" style="width: 100%" required="">
                                </div>
                                <div class="col-md-4">
                                    <h4> Hak Akses</h4>
                                    <select class="form-control" name="hak" id="hak" required="" style="width: 100%;">
                                        <option value="">Pilih Hak Akses</option>
                                        <option value="Admin">Admin</option>
                                        <option value="Petugas">Petugas Disposisi</option>
                                        <option value="Pemimpin">Pemimpin</option>
                                    </select><br>
                                </div>
                                <div class="col-md-4">
                                    <h4> Status</h4>
                                    <select class="form-control" name="status_petugas" id="status_petugas" required="" style="width: 100%;">
                                        <option value="">Pilih Status</option>
                                        <option value="Aktif">Aktif</option>
                                        <option value="NonAktif">Nonaktif</option>
                                    </select><br>
                                </div>
                                <div class="col-md-12">
                                    <h4>Email</h4>
                                    <input type="text" class="form-control" name="email"  style="width: 100%;" required=""><br>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" name="tambah" class="btn btn-primary btn-block" style="cursor: pointer;"> SIMPAN</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-body"  style="background-color: ">
                    <div class="card card-body">
                        <h3><i class="fa fa-wrench"></i> Edit Password</h3>
                        <hr>
                        <form action="" method="post">
                            <div class="row" style="width:100%">
                                <div class="col-md-6">
                                    <h4> Kata Sandi Lama</h4>
                                    <input type="password" class="form-control" name="lama" style="width: 100%" required="">
                                </div>
                                <div class="col-md-6">
                                    <h4> Kata Sandi Baru</h4>
                                    <input type="password" class="form-control" name="baru" style="width: 100%" required="">
                                </div>
                                <div class="col-md-12">
                                    <h4> Konfirmasi Kata Sandi Baru</h4>
                                    <input type="password" class="form-control" name="konfirmasi" style="width: 100%" required=""><br>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" name="ubah" class="btn btn-warning btn-block" style="cursor: pointer;"> Edit Password</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-body">
            <h3><i class="fa fa-table"></i> Tabel Petugas</h3>
            <hr>
            <div class="table-responsive" style="margin-top: 20px">
                <table id="example" class="table table-bordered" style="width: 100%; margin: 0px">
                    <thead>
                    <th style="text-align: center">No</th>
                    <th style="text-align: center">ID Petugas</th>
                    <th style="text-align: center">Nama Depan</th>
                    <th style="text-align: center">Nama Belakang</th>
                    <th style="text-align: center">Password</th>
                    <th style="text-align: center">Hak</th>
                    <th style="text-align: center">Status</th>
                    <th style="text-align: center">Email</th>
                    <th style="text-align: center">Proses</th>
                    </thead>
                    <tbody>
                    <?php
                    $no=1;
                    $query = "SELECT * FROM tb_petugas where id_petugas!='P001'";
                    $sql = mysqli_query($conn, $query);
                    while ($baris = mysqli_fetch_array($sql)){
                        ?>
                        <tr>
                            <td style="text-align: center"><?php echo $no++ ?></td>
                            <td style="text-align: center"><?php echo $baris['id_petugas']; ?></td>
                            <td style="text-align: center"><?php echo $baris['nama_depan']; ?></td>
                            <td style="text-align: center"><?php echo $baris['nama_belakang']; ?></td>
                            <td style="text-align: center"><?php echo "*********" ?></td>
                            <td style="text-align: center"><?php echo $baris['hak']; ?></td>
                            <td style="text-align: center"><?php echo $baris['status_petugas']; ?></td>
                            <td style="text-align: center"><?php echo $baris['email']; ?></td>
                            <td style="text-align: center">
                                <a class="btn btn-warning" href="?page=edit_petugas&id_petugas=<?php echo $baris['id_petugas']; ?>"><i class="fa fa-pencil"></i></a>
                                <a class="btn btn-danger" onclick="return confirm('Yakin Anda Ingin Menghapus Data')" href="pengaturan/hapus_petugas.php?id_petugas=<?php echo $baris['id_petugas']; ?>"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table><br>
            </div>
        </div>
</div></div>