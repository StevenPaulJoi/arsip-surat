<!--INPUT KODE OTOMATIS-->
<?php
$sel = "SELECT max(no_agenda_masuk) as maxKode from tb_surat_masuk";
$hasil = mysqli_query($conn, $sel);
$data = mysqli_fetch_array($hasil);
$id = $data['maxKode'];

$noUrut = (int) substr($id, 13, 3);
$noUrut++;
$kode = sprintf("%03s", $noUrut);

$char = "SM/".date('Ymd');
$no_agenda_masuk = $char.$kode;
?>
<!--PENUTUP INPUT KODE OTOMATIS-->
<div class="container" style="width: 100%;padding: 0;margin-left: 14px">
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="card card-body">
                <h4><i class="fa fa-picture-o"></i> Galeri Surat Masuk</h4>
                <hr>
                <div class="container" style="margin-top: -1px;padding: 0;width: 100%" >
                    <div class="row">
                        <?php
                        $start=0;
                        $limit=8;

                        $t=mysqli_query($conn,"select * from tb_surat_masuk");
                        $total=mysqli_num_rows($t);

                        if(isset($_GET['id']))
                        {
                            $id=$_GET['id'];
                            $start=($id-1)*$limit;
                            //$start=2*1;
                            //$start=2;
                        }
                        else
                        {
                            $id=1;
                        }
                        $p=ceil($total/$limit);
                        $q_gsm = "SELECT * FROM tb_surat_masuk ORDER BY no_agenda_masuk ASC LIMIT $start,$limit";
                        $s_gsm = mysqli_query($conn, $q_gsm);
                        $cek = mysqli_num_rows($s_gsm);

                        while($gambar=mysqli_fetch_array($s_gsm)){
                            ?>
                            <div class="col-md-3">
                                <div class="thumbnail text-white bg-default mb-3" style="width: 100%">
                                    <div class="card-body">
                                        <a href="?page=detail_suratmasuk&no_agenda_masuk=<?php echo $gambar['no_agenda_masuk']?>" style="text-decoration: none"><h6 style="margin-left: 44px;color: black;">No Agenda : <font><?php echo $gambar['no_agenda_masuk']?></font></h6></a>
                                        <a target="_blank" href="../img/foto_suratmasuk/<?php echo $gambar['gambar']?>">
                                            <img class="img-rounded" src="../img/foto_suratmasuk/<?php echo $gambar['gambar']?>" style="width: 100%;height: 400px">
                                        </a>
                                    </div>
                                    <div class="card-footer bg-secondary border-secondary" style="margin-top: 10px">
                                        <a target="_blank" href="../cetak_gambar/cetak_masuk.php?no_agenda_masuk=<?=$gambar['no_agenda_masuk'];?>" class="btn btn-success btn-block" style="color: white">Cetak Gambar <i class="fa fa-print"></i></a>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                    <center>
                        <div class="row" id="pagination">
                            <div class="col-md-12" style="padding: 0 25px">
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination">
                                        <?php if($id > 1) {?> <li class="page-item"><a class="page-link" href="?page=galeri_suratmasuk&id=<?php echo ($id-1) ?>"> Previous</a></li><?php }?>
                                        <?php
                                        for($i=1;$i <= $p;$i++){
                                            ?>
                                            <li  class="page-item  <?php if($id == $i){echo"active";}?>"><a class="page-link" href="?page=galeri_suratmasuk&id=<?php echo $i ?>"><?php echo $i;?></a></li>
                                        <?php
                                        }
                                        ?>
                                        <?php if($id!=$p)
                                            //3!=4
                                        {?>
                                            <li class="page-item"><a class="page-link" href="?page=galeri_suratmasuk&id=<?php echo ($id+1); ?>">Next</i></a></li>
                                        <?php }?>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </center>
                </div>
            </div>
        </div>
    </div>
</div>