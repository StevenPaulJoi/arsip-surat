<?php
include"../../koneksi.php";
if(isset($_POST['cetak_keluar'])){
    $dari   = $_POST['dari'];
    $sampai = $_POST['sampai'];

    $query = mysqli_query($conn, "SELECT * FROM tb_surat_keluar WHERE tanggal_kirim BETWEEN '$dari' AND '$sampai'");
}else{
    $query = mysqli_query($conn, "SELECT * FROM tb_surat_keluar");
}
?>
<body onload="window.print()">
<style>
    td{
        text-align: center;
    }
</style>
<h2 style="text-align: center">Cetak Surat Keluar</h2>

<div class="container- fluid" style="width: 90%;margin-left: 70px">
    <div class="container-fluid" style="width: 100%; padding: 0">
        <div class="panel panel-default">
            <div class="panel-body">
                <img src="../../img/surat.JPG" width="100%" height="250" align="center">
                <h3><i class="fa fa-table"></i> Tabel Surat Keluar</h3>
                <hr>
                <?php
                if(isset($_POST['cetak_keluar'])){
                    $dari   = $_POST['dari'];
                    $sampai = $_POST['sampai'];

                    ?>
                    <span style="text-align: center;width: 100%">Dari Tanggal : <?=$dari?> Sampai : <?=$sampai?></span>
                <?php
                }
                ?>
                <div class="table-responsive" style="margin-top: 20px">
                    <table id="example" class="table table-bordered" style="width: 100%; margin: 0px">
                        <table border="1" style="border-collapse: collapse;width: 100%">
                            <tr>
                                <th>No</th>
                                <th style="text-align: center">No Agenda</th>
                                <th style="text-align: center">No Surat</th>
                                <th style="text-align: center">Tanggal Kirim</th>
                                <th style="text-align: center">Jenis Surat</th>
                                <th style="text-align: center">Gambar</th>

                            </tr>
                            <?php
                            $no = 1;
                            while($baris = mysqli_fetch_array($query)){
                                ?>
                                <tr>
                                    <td><?=$no++?></td>
                                    <td><?=$baris['no_agenda_keluar']?></td>
                                    <td><?=$baris['no_surat']?></td>
                                    <td><?=$baris['tanggal_kirim']?></td>
                                    <td><?=$baris['jenis_surat']?></td>
                                    <td><img src="../../img/foto_suratkeluar/<?=$baris['gambar'];?>" alt="" width="100px" /></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </table>
                </div>
            </div>
        </div>
    </div>
