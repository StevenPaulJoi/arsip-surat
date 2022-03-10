<?php
if(isset($_POST['cetak_disposisi'])){
    $dari   = $_POST['dari'];
    $sampai = $_POST['sampai'];

    $query = mysqli_query($conn, "SELECT * FROM tb_disposisi WHERE tanggal_disposisi BETWEEN '$dari' AND '$sampai'");
}else{
    $query = mysqli_query($conn, "SELECT * FROM tb_disposisi");
}
?>
<body onload="window.print()">
<style>
    td{
        text-align: center;
    }
</style>

<h2 style="text-align: center">Cetak Surat Masuk</h2>

<div class="container- fluid" style="width: 90%;margin-left: 70px">
    <div class="container-fluid" style="width: 100%; padding: 0">
        <div class="panel panel-default">
            <div class="panel-body">
                <img src="../../img/surat.JPG" width="100%" height="250" align="center">
                <h3><i class="fa fa-table"></i> Tabel Surat masuk</h3>
                <hr>

                <?php
                if(isset($_POST['cetak_disposisi'])){
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
                                <th style="text-align: center">No</th>
                                <th style="text-align: center">No Desposisi</th>
                                <th style="text-align: center">No agenda</th>
                                <th style="text-align: center">No Surat</th>
                                <th style="text-align: center">Kepada</th>
                                <th style="text-align: center">Tanggal</th>
                                <th style="text-align: center">Keterangan</th>
                                <th style="text-align: center">status Surat</th>
                                <th style="text-align: center">Tanggapan</th>
                            </tr>
                            <?php
                            $no = 1;
                            while($baris = mysqli_fetch_array($query)){
                                ?>
                                <tr>
                                    <td><?=$no++?></td>
                                    <td><?=$baris['no_disposisi']?></td>
                                    <td><?=$baris['no_agenda_masuk']?></td>
                                    <td><?=$baris['no_surat_masuk']?></td>
                                    <td><?=$baris['kepada']?></td>
                                    <td><?=$baris['tanggal_disposisi']?></td>
                                    <td><?=$baris['keterangan']?></td>
                                    <td><?=$baris['status_disposisi']?></td>
                                    <td><?=$baris['tanggapan']?></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </table>
                </div>
            </div>
        </div>
    </div>