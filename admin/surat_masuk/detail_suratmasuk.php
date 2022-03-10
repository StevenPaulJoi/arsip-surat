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
                            <i class="fa fa-users fa-2x" style="margin-top: -30px"></i> <?=$dataprofile['id_petugas']?> - <?=$dataprofile['hak']?>, <?=$dataprofile['nama_depan']?> <?=$dataprofile['nama_belakang']?>
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
