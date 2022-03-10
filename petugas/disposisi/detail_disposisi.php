<?php
$no_disposisi = $_GET['no_disposisi'];
$sql = mysqli_query($conn,"select tb_disposisi.*,tb_surat_masuk.* FROM tb_disposisi inner join tb_surat_masuk on tb_surat_masuk.no_agenda_masuk=tb_disposisi.no_agenda_masuk where no_disposisi ='$no_disposisi' ");
$data = mysqli_fetch_array($sql);

$update= mysqli_query($conn,"UPDATE tb_disposisi set status_disposisi = 'Sudah Dibaca' where no_disposisi = '$no_disposisi'")
?>
<div class="container" style="width: 100%;margin-top: 20px; font-size: 10px">
    <div class="row">
        <div class="col-md-4">
            <div class="card card-body">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h4>
                            <i class="fa fa-image" style="margin-top: -30px"></i>&nbsp;&nbsp;Surat Masuk
                        </h4>
                        <hr>
                        <a target="_blank" href="../img/foto_suratmasuk/<?=$data['gambar']?>">
                            <img src="../img/foto_suratmasuk/<?=$data['gambar']?>" style="width: 100%;height: 300px"></a>
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
                                    <h4 style="color: dodgerblue">Nomor Disposisi : </h4>
                                    <h4><?php echo $data ['no_disposisi'];?></h4><br>
                                    <h4 style="color: dodgerblue">Nomor Agenda Masuk : </h4>
                                    <h4><?php echo $data ['no_agenda_masuk'];?></h4><br>
                                    <h4 style="color: dodgerblue"> No Surat : </h4>
                                    <h4><?php echo $data['no_surat_masuk'];?></h4><br>
                                    <h4 style="color: dodgerblue">Kepada : </h4>
                                    <h4><?php echo $data['kepada'];?></h4><br>
                                    <h4 style="color: dodgerblue">Tanggal Disposisi : </h4>
                                    <h4><?php echo $data['tanggal_disposisi'];?></h4>
                                </div>
                                <div class="col-md-6">
                                    <h4 style="color: dodgerblue">Keterangan : </h4>
                                    <h4><?php echo $data ['keterangan'];?></h4><br>
                                    <h4 style="color: dodgerblue">Tanggapan  : </h4>
                                    <h4><?php echo $data['tanggapan'];?></h4><br>
                                    <h4 style="color: dodgerblue">Status : </h4>
                                    <h4><?php echo $data['status_disposisi'];?></h4><br>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12" style="width: 100%;">
                                    <a href="?page=disposisi" class="btn btn-danger" style="float: right">kembali</a>
                                </div>
                            </div><hr>
                        </div>
                    </div>
