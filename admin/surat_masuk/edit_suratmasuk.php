<?php
$sel = "SELECT max(no_agenda_masuk) as maxKode FROM tb_surat_masuk";
$hasil = mysqli_query($conn, $sel);
$ambil  = mysqli_fetch_array($hasil);
$id = $ambil['maxKode'];

$noUrut = (int) substr($id, 11, 3);
$noUrut++;
$kode = sprintf("%03s", $noUrut);

$char = "SM/".date('Ymd');
$NoAgendaMasuk = $char . $kode;

//$NoSurat = $kode; //supaya max
?>
<?php
$no_agenda_masuk = $_GET['no_agenda_masuk'];
$select = "SELECT * FROM tb_surat_masuk WHERE no_agenda_masuk = '$no_agenda_masuk'";
$sql = mysqli_query($conn, $select);
$baris = mysqli_fetch_array($sql);
?>
<!--PenutupProsesMemanggilEditBuku-->
<!--ProsesEditBuku-->
<?php
if(isset($_POST['editsuratmasuk'])){
    $jenis_surat = $_POST['jenis_surat'];
    $tanggal_kirim = $_POST['tanggal_kirim'];
    $tanggal_terima = $_POST['tanggal_terima'];
    $pengirim = $_POST['pengirim'];
    $perihal = $_POST['perihal'];
    $nama_foto = $_FILES['gambar']['name'];
    $ukuran_file = $_FILES['gambar']['size'];
    $tipe_file = $_FILES['gambar']['type'];
    $tmp_file = $_FILES['gambar']['tmp_name'];
    $path = "../img/foto_suratmasuk/".$nama_foto;

    if(empty($nama_foto)){
        $update = "UPDATE tb_surat_masuk SET jenis_surat = '$jenis_surat',tanggal_kirim = '$tanggal_kirim',tanggal_terima = '$tanggal_terima',pengirim = '$pengirim',perihal = '$perihal' WHERE no_agenda_masuk = '$no_agenda_masuk'";
        if(mysqli_query($conn,$update)){
            ?>
            <script>alert("sukses");</script>;
            <script>window.location.href='?page=surat_masuk'</script>;
        <?php
        }else{
            ?>
            <script>alert("gagal");</script>;
            <script>window.location.href='?page=surat_masuk'</script>
        <?php
        }
    } else if(!empty($nama_foto)) {
        $query = "SELECT * FROM tb_surat_masuk WHERE no_agenda_masuk ='".$no_agenda_masuk."'";
        $select = mysqli_query($conn,$query);
        $data = mysqli_fetch_array($select);

        if(is_file("../img/foto_suratmasuk/".$data['gambar']))
            unlink("../img/foto_suratmasuk/".$data['gambar']);

        if(move_uploaded_file($tmp_file, $path)){
            $ext = pathinfo($_FILES["gambar"]["name"], PATHINFO_EXTENSION);

            if($ext == "jpg" || $ext == "png" || $ext == "JPG" || $ext == "PNG"){
                $update2 = "UPDATE tb_surat_masuk SET jenis_surat = '$jenis_surat',tanggal_kirim = '$tanggal_kirim',tanggal_terima = '$tanggal_terima',pengirim = '$pengirim',perihal = '$perihal',gambar = '$nama_foto' WHERE no_agenda_masuk = '$no_agenda_masuk'";
                if(mysqli_query($conn,$update2)){
                    ?>
                    <script>alert("sukses");</script>;
                    <script>window.location.href='?page=surat_masuk'</script>
                <?php
                }else{
                    //echo"<script>setTimeout(function(){ gagal(); }, 0);</script>";
                    ?>
                    '<script>alert("gagal");</script>;
                    <script>window.location.href='?page=surat_masuk'</script>
                <?php
                }
            } else {
                echo '<script>alert("Format Gambar yang diperbolehkan hanya .jpg dan .png");</script>';
            }
        }
    }
}
?>
<div class="container" style="margin-bottom: 20px">
    <form action="" method="post" class="form-signin" enctype="multipart/form-data">
        <h4>Edit Surat Masuk</h4>
        <div class="row">
            <div class="form-group col-md-6">
                <label for="">No Agenda</label>
                <input style="width: 100%" type="text" name="no_agenda_masuk" class="form-control" disabled required readonly value="<?=$no_agenda_masuk?>">
            </div>
            <div class="form-group col-md-6">
                <label for="">ID Petugas</label>
                <input style="width: 100%" type="text" name="id_petugas" class="form-control" required value="<?=$baris['id_petugas']?>">
            </div>
            <div class="form-group col-md-6">
                <label for="">Jenis Surat</label>
                <input style="width: 100%" name="jenis_surat" class="form-control" required value="<?=$baris['jenis_surat']?>">
            </div>
            <div class="form-group col-md-6" >
                <label for="">Tanggal Kirim</label>
                <input style="width: 100%" type="date" name="tanggal_kirim" class="form-control" required value="<?=$baris['tanggal_kirim']?>">
            </div>
            <div class="form-group col-md-6" >
                <label for="">Tanggal Terima</label>
                <input style="width: 100%" type="date" name="tanggal_terima" class="form-control" required value="<?=$baris['tanggal_terima']?>">
            </div>
            <div class="form-group col-md-6" >
                <label for="">Nomor Surat</label>
                <input style="width: 100%" type="text" name="no_surat" class="form-control" required  value="<?=$baris['no_surat']?>">
            </div>
            <div class="form-group col-md-6" >
                <label for="">Pengirim</label>
                <input style="width: 100%" type="text" name="pengirim" class="form-control" required value="<?=$baris['pengirim']?>">
            </div>
            <div class="form-group col-md-6" >
                <label for="">Perihal</label>
                <input style="width: 100%" type="text" name="perihal" class="form-control" required value="<?=$baris['perihal']?>">
            </div>
            <div class="container" style="margin-bottom: 20px">
                <div class="card mt-5">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-2">
                                <a target="_blank" href="../../img/foto_suratmasuk/<?=$baris['gambar']?>">
                                <img src="../../img/foto_suratmasuk/<?=$baris['gambar'];?>" style="width: 140px" />
                                </a>
                            </div>
                            <div class="col-sm-10">
                                <div class="form-group">
                                    <label for="img">Gambar</label>
                                    <input type="file" name="gambar" id="gambar" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <center><td>
                                    <a href="?page=surat_masuk"><buttonstyle="cursor: pointer" class="btn btn-sm btn-danger"></i> Kembali</button></a>
                                    <button type="submit" style="cursor: pointer" class="btn btn-sm btn-success" name="editsuratmasuk"><i class="fa fa-check"></i> Simpan</button>
                            </center></td>
                        </div>
                    </div>
    </form>
</div>
</div>
</div>