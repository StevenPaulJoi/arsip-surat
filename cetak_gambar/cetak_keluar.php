<?php
include"../koneksi.php";
$NoAgendaKeluar = @$_GET['no_agenda_keluar'];
$query = mysqli_query($conn,"SELECT * FROM tb_surat_keluar where no_agenda_keluar = '$NoAgendaKeluar'");
$data = mysqli_fetch_array($query);

?>
<?php
if($data){
    ?>
    <img src="../img/foto_suratkeluar/<?= $data ['gambar'];?>" style="width: 100%">
<?php
}
?>
<script>
    window.print();
</script>