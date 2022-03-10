<?php
include"../../koneksi.php";
$baris = @$_GET['no_disposisi'];
$del = "DELETE FROM tb_disposisi where no_disposisi = '$baris'";
$sql = mysqli_query($conn, $del);

if($sql){
    echo'<script>alert("Delete Berhasil ");</script>';
    echo '<script>window.location.href="../index.php?page=disposisi";</script>';
}
?>
