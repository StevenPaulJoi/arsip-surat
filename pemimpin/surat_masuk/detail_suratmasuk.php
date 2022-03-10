<?php
$no_agenda_masuk = $_GET['no_agenda_masuk'];
$sql = mysqli_query($conn,"select * from tb_surat_masuk WHERE no_agenda_masuk = '$no_agenda_masuk'");
$data = mysqli_fetch_array($sql);

$update= mysqli_query($conn,"UPDATE tb_surat_masuk set status = 'Sudah Dibaca' where no_agenda_masuk = '$no_agenda_masuk'")
?>
<div class="container" style="width: 100%; padding: 0;margin-left: 14px">
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="card card-body">
                        <h3>
                            <i class="fa fa-picture-o" style="margin-top: -30px"></i>  Gambar Surat Masuk
                        </h3>
                        <hr>
                        <div class="container-fluid" style="width: 100%">
                            <div class="row">
                                <div class="col-md-12">
                                    <a target="_blank" href="../img/foto_suratmasuk/<?=$data['gambar']?>">
                                        <img src="../img/foto_suratmasuk/<?=$data['gambar']?>" style="width: 300px;height: 500px" class="img-rounded materialboxed" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="card card-body">
                        <h5>
                            <i class="fa fa-users fa-2x" style="margin-top: -30px"></i> <?=$datapemimpin['id_petugas']?> - <?=$datapemimpin['hak']?>, <?=$datapemimpin['nama_depan']?> <?=$datapemimpin['nama_belakang']?>
                        </h5>
                        <hr>
                        <div class="container-fluid" style="width: 100%">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4 style="color: dodgerblue">Nomor Agenda Masuk : </h4>
                                    <h4><?php echo $data ['no_agenda_masuk'];?></h4><br>
                                    <h4 style="color: dodgerblue"> Jenis Surat : </h4>
                                    <h4><?php echo $data['jenis_surat'];?></h4><br>
                                    <h4 style="color: dodgerblue">Tanggal Kirim : </h4>
                                    <h4><?php echo $data['tanggal_kirim'];?></h4><br>
                                    <h4 style="color: dodgerblue">Tanggal Terima : </h4>
                                    <h4><?php echo $data['tanggal_terima'];?></h4>
                                </div>
                                <div class="col-md-6">
                                    <h4 style="color: dodgerblue">Nomor Surat : </h4>
                                    <h4><?php echo $data ['no_surat'];?></h4><br>
                                    <h4 style="color: dodgerblue"> Pengirim : </h4>
                                    <h4><?php echo $data['pengirim'];?></h4><br>
                                    <h4 style="color: dodgerblue">Perihal : </h4>
                                    <h4><?php echo $data['perihal'];?></h4><br>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12" style="width: 100%;">
                                    <a href="Proses/cetak_detail.php" class="btn btn-warning" style="float: right">Cetak Data <i class="fa fa-print"></i></a>
                                </div>
                            </div><hr>
                        </div>
                    </div>
                    <div class="container" style="width: 100%; height: 100%">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <h4><i class="fa fa-location-arrow"></i> Tambah Disposisi</h4>
                                <hr>
                                <div class="">
                                    <form action="" method="post">
                                        <div class="col-md-6">
                                            <p>Kepada</p>
                                            <select name="kepada" class="form-control" required="">
                                                <option value=""> Pilih </option>
                                                <option value="Bpk.Miswan Wahyudi"> Bpk.Miswan Wahyudi</option>
                                                <option value="Bpk.Kartanto"> Bpk.Kartanto</option>
                                                <option value="Bpk.Dono Wasito"> Bpk.Dono Wasito</option>
                                                <option value="Bpk.Hajarol"> Bpk.Hajarol</option>
                                                <option value="Bpk.Kurnadi"> Bpk.Kurnadi</option>
                                                </select>
                                        </div>
                                        <div class="col-md-6">
                                            <p>Keterangan</p>
                                            <input type="text" pattern="[A-Za-z]+" title="hanya bisa diisi dengan Huruf A-Z" name="keterangan" class="form-control">
                                        </div>
                                        <div class="col-md-12">
                                            <p>Tanggapan</p>
                                            <textarea type="text" pattern="[A-Za-z]+" title="hanya bisa diisi dengan Huruf A-Z" rows="3" name="tanggapan" class="form-control"></textarea><br>
                                        </div>
                                        <div class="col-md-12">
                                            <button type="submit" name="input_disposisi" class="btn btn-success btn-block">KIRIM</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
function cekdata($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data ;
}
?>

<?php
if(isset($_POST['input_disposisi'])){
    $no_surat_masuk = $data['no_surat'];
    $kepada = cekdata($_POST ['kepada']);
    $status = "belum dibaca";
    $tgl = date('Y-m-d');
    $ket = cekdata($_POST ['keterangan']);
    $tanggapan = cekdata($_POST ['tanggapan']);

    $query = mysqli_query($conn, "INSERT INTO `tb_disposisi` (`no_disposisi`, `no_agenda_masuk`, `no_surat_masuk`, `kepada`, `tanggal_disposisi`, `keterangan`, `status_disposisi`, `tanggapan`) VALUES ('NULL', '$no_agenda_masuk','$no_surat_masuk','$kepada', '$tgl', '$ket', '$status', '$tanggapan')");
    if($query){
        echo"<script>alert('Disposisi Berhasil Disimpan');window.location.href='?page=surat_masuk'</script>";
    }else{
        echo"<script>alert('Data Gagal Disimpan');;window.location.href='?page=surat_masuk'</script>";
    }
}
?>