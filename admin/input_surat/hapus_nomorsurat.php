<?php
include "../../koneksi.php";
$baris = @$_GET['id'];
$del = "DELETE FROM tb_nomor_surat where id = '$baris'";
$sql = mysqli_query($conn, $del);

if($sql){
    echo'<script>alert("Delete Berhasil ");</script>';
    echo '<script>window.location.href="../index.php?page=nomor_surat";</script>';
}
?>
