<?php
include"../koneksi.php";
$NoAgendaMasuk = @$_GET['no_agenda_masuk'];
$query = mysqli_query($conn,"SELECT * FROM tb_surat_masuk where no_agenda_masuk = '$NoAgendaMasuk'");
$data = mysqli_fetch_array($query);

?>
<?php
if($data){
    ?>
    <img src="../img/foto_suratmasuk/<?= $data ['gambar'];?>" style="width: 100%">
<?php
}
?>
<script>
    window.print();
</script>