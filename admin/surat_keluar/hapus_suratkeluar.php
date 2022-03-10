<?php
include"../../koneksi.php";
$baris = @$_GET['no_agenda_keluar'];
$del = "DELETE FROM tb_surat_keluar where no_agenda_keluar = '$baris'";
$sql = mysqli_query($conn, $del);

if($sql){
    echo'<script>alert("Delete Berhasil ");</script>';
    echo '<script>window.location.href="../index.php?page=surat_keluar";</script>';
}
?>
