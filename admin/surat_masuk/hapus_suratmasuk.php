<?php
include "../../koneksi.php";
$baris = @$_GET['no_agenda_masuk'];
$del = "DELETE FROM tb_surat_masuk where no_agenda_masuk = '$baris'";
$sql = mysqli_query($conn, $del);

if($sql){
    echo'<script>alert("Delete Berhasil ");</script>';
    echo '<script>window.location.href="../index.php";</script>';
}
?>
