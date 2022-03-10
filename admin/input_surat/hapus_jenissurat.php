<?php
include "../../koneksi.php";
$baris = @$_GET['id'];
$del = "DELETE FROM tb_jenis_surat where id = '$baris'";
$sql = mysqli_query($conn, $del);

if($sql){
    echo'<script>alert("Delete Berhasil ");</script>';
    echo '<script>window.location.href="../index.php?page=jenis_surat";</script>';
}
?>
