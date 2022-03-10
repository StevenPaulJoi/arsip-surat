<?php
include'../../koneksi.php';
$baris = $_GET['id_petugas'];
$del = "DELETE FROM tb_petugas where id_petugas = '$baris'";
$sql = mysqli_query($conn, $del);
if($sql){
    echo'<script> alert("Delete Berhasil ");</script>';
    echo '<script> window.location.href="../index.php?page=kelola_petugas";</script>';
}
?>