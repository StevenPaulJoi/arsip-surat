<?php
$sel = "SELECT max(no_agenda_keluar) as maxKode FROM tb_surat_keluar";
$hasil = mysqli_query($conn, $sel);
$ambil  = mysqli_fetch_array($hasil);
$id = $ambil['maxKode'];

$noUrut = (int) substr($id, 11, 3);
$noUrut++;
$kode = sprintf("%03s", $noUrut);

$char = "SM/".date('Ymd');
$NoAgendaKeluar = $char . $kode;

//$NoSurat = $kode; //supaya max
?>


<?php
$no_agenda_keluar = $_GET['no_agenda_keluar'];
$select = "SELECT * FROM tb_surat_keluar WHERE no_agenda_keluar = '$no_agenda_keluar'";
$sql = mysqli_query($conn, $select);
$baris = mysqli_fetch_array($sql);
?>

<?php
if(isset($_POST['editsuratkeluar'])){
    $jenis_surat = $_POST['jenis_surat'];
    $tanggal_kirim = $_POST['tanggal_kirim'];
    $no_surat = $_POST['no_surat'];
    $pengirim = $_POST['pengirim'];
    $perihal = $_POST['perihal'];
    $nama_foto = $_FILES['gambar']['name'];
    $ukuran_file = $_FILES['gambar']['size'];
    $tipe_file = $_FILES['gambar']['type'];
    $tmp_file = $_FILES['gambar']['tmp_name'];
    $path = "../img/foto_suratkeluar/".$nama_foto;

    if(empty($nama_foto)){
        $update = "UPDATE tb_surat_keluar SET jenis_surat = '$jenis_surat',tanggal_kirim = '$tanggal_kirim',no_surat = '$no_surat',pengirim = '$pengirim',perihal = '$perihal' WHERE no_agenda_keluar = '$no_agenda_keluar'";
        if(mysqli_query($conn,$update)){
            ?>
            <script xmlns="http://www.w3.org/1999/html">alert("sukses");</script>;
            <script>window.location.href='?page=surat_keluar'</script>;
        <?php
        }else{
            ?>
            <script>alert("gagal");</script>;
            <script>window.location.href='?page=surat_keluar'</script>
        <?php
        }
    } else if(!empty($nama_foto)) {
        $query = "SELECT * FROM tb_surat_keluar WHERE no_agenda_keluar ='".$no_agenda_keluar."'";
        $select = mysqli_query($conn,$query);
        $data = mysqli_fetch_array($select);

        if(is_file("../img/foto_suratkeluar/".$data['gambar']))
            unlink("../img/foto_suratkeluar/".$data['gambar']);

        if(move_uploaded_file($tmp_file, $path)){
            $ext = pathinfo($_FILES["gambar"]["name"], PATHINFO_EXTENSION);

            if($ext == "jpg" || $ext == "png" || $ext == "JPG" || $ext == "PNG"){
                $update2 = "UPDATE tb_surat_masuk SET jenis_surat = '$jenis_surat',tanggal_kirim = '$tanggal_kirim',no_surat = '$no_surat',pengirim = '$pengirim',perihal = '$perihal',gambar = '$nama_foto' WHERE no_agenda_keluar = '$no_agenda_keluar'";
                if(mysqli_query($conn,$update2)){
                    ?>
                    <script>alert("sukses");</script>;
                    <script>window.location.href='?page=surat_keluar'</script>
                <?php
                }else{
                    //echo"<script>setTimeout(function(){ gagal(); }, 0);</script>";
                    ?>
                    '<script>alert("gagal");</script>;
                    <script>window.location.href='?page=surat_keluar'</script>
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
    <div class="card mt-5">
        <div class="card-body">
            <form action="" method="post" class="form-signin" enctype="multipart/form-data">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="">No Agenda</label>
                        <input style="width: 100%" type="text" name="no_agenda_keluar" class="form-control" disabled required readonly value="<?=$no_agenda_keluar?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Jenis Surat</label>
                        <input style="width: 100%" type="text" name="jenis_surat" class="form-control" required value="<?=$baris['jenis_surat']?>">
                    </div>
                    <div class="form-group col-md-6" >
                        <label for="">Tanggal Kirim</label>
                        <input style="width: 100%" type="date" name="tanggal_kirim" class="form-control" required value="<?=$baris['tanggal_kirim']?>">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">ID Petugas</label>
                        <input style="width: 100%" type="text" name="id_petugas" class="form-control" required value="<?=$baris['id_petugas']?>">
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
                        <div class="col-sm-2">
                            <a target="_blank" href="../../img/foto_suratkeluar/<?=$baris['gambar']?>">
                            <img src="../../img/foto_suratkeluar/<?=$baris['gambar']?>" style="width: 140px"/>
                            </a>
                        </div>
                        <div class="col-sm-0">
                            <div class="form-group">
                                <label for="img">Gambar</label>
                                <input type="file" name="gambar" id="gambar"/>
                            </div>
                        </div>
                    </div>
                    <center><td>
                            <a href="?page=surat_keluar"><buttonstyle="cursor: pointer" class="btn btn-sm btn-danger"></i> Kembali</button></a>
                            <button type="submit" style="cursor: pointer" class="btn btn-sm btn-success" name="edit"><i class="fa fa-check"></i> Simpan</button>
                    </center></td>
                 </div>
                </div>
            </form>
        </div>
    </div>
</div>
