<?php
function cekdata($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data ;
}
?>
<?php
if(isset($_POST['simpan'])){
    $tahun_ajaran = cekdata($_POST['tahun_ajaran']);
    $no_depan = cekdata($_POST['no_depan']);
    $no_belakang = cekdata($_POST['no_belakang']);
    $ket = cekdata($_POST['ket']);

    $insert = "INSERT INTO tb_nomor_surat (`tahun_ajaran`,`no_depan`,`no_belakang`,`ket`) VALUES('$tahun_ajaran','$no_depan','$no_belakang','$ket')";
    if(mysqli_query($conn,$insert)){

        ?>
        <script>alert('Data Berhasil Tersimpan');</script>
        <script>window.location.href='?page=nomor_surat'</script>
    <?php

    }else{
        ?>
        <script>alert('Data Gagal Tersimpan');</script>
        <script>window.location.href='?page=nomor_surat'</script>
    <?php
    }
}
?>

<div class="container" style="width: 100%;padding: 0;margin-left: 15px">
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="table-responsive">
                        <h3><i class="fa fa-table"></i> Tabel Nomor Surat</h3>
                        <hr>
                        <table id="example" class="table table-bordered" style="width: 100%; padding: 0; margin: 0px">
                            <thead>
                            <th style="text-align: center">No</th>
                            <th style="text-align: center">Id</th>
                            <th style="text-align: center">Tahun Ajran</th>
                            <th style="text-align: center">No Depan</th>
                            <th style="text-align: center">No Belakang</th>
                            <th style="text-align: center">Keterangan</th>
                            <th style="text-align: center">Opsi</th>
                            </thead>
                            <tbody>
                            <?php
                            $no=1;
                            $query = "SELECT * FROM tb_nomor_surat";
                            $sql = mysqli_query($conn, $query);
                            while ($baris = mysqli_fetch_array($sql)){
                                ?>
                                <tr>
                                    <td style="text-align: center"><?php echo $no++ ?></td>
                                    <td style="text-align: center"><?php echo $baris['id']; ?></td>
                                    <td style="text-align: center"><?php echo $baris['tahun_ajaran']; ?></td>
                                    <td style="text-align: center"><?php echo $baris['no_depan']; ?></td>
                                    <td style="text-align: center"><?php echo $baris['no_belakang']; ?></td>
                                    <td style="text-align: center"><?php echo $baris['ket']; ?></td>
                                    <td style="text-align: center">
                                        <a class="btn btn-danger" onclick="return confirm('Yakin Anda Ingin Menghapus Data')" href="input_surat/hapus_nomorsurat.php?id=<?php echo $baris['id']; ?>"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table><br>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-body"  style="background-color: ">
                    <div class="card card-body">
                        <h3><i class="fa fa-plus-circle"></i> Tambah Nomor Surat</h3>
                        <hr>
                        <form action="" method="post">
                            <div class="row" style="width:100%">
                                <div class="col-md-5">
                                    <h4> Tahun Ajaran</h4>
                                    <input type="text" pattern="[0-9-/]+" title="hanya bisa diisi dengan Huruf 0-9-/" class="form-control" name="tahun_ajaran" style="width: 100%" required="">
                                    <br>
                                </div>
                                <div class="col-md-5">
                                    <h4> No Depan</h4>
                                    <input type="text" class="form-control" name="no_depan" style="width: 100%" required="">
                                    <br>
                                </div>
                                <div class="col-md-5">
                                    <h4> No Belakang</h4>
                                    <input type="text" class="form-control" name="no_belakang" style="width: 100%" value="-SMKN1/BP3 WIL.I" required="">
                                    <br>
                                </div>
                                <div class="col-md-5">
                                    <h4> Keterangan</h4>
                                    <input type="text" pattern="[A-Za-z- ]+" title="hanya bisa diisi dengan Huruf A-Z- " class="form-control" name="ket" style="width: 100%" required="">
                                    <br>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" name="simpan" class="btn btn-primary btn-block" style="cursor: pointer;"> TAMBAH</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#example').DataTable( {
            "lengthMenu": [[5, 10, 25, 50, 100, -1], [5, 10, 25, 50, 100, "All"]],
            responsive: {
                details: {
                    display: $.fn.dataTable.Responsive.display.modal( {
                        header: function ( row ) {
                            var data = row.data();
                            return data[5];
                        }
                    } ),
                    renderer: $.fn.dataTable.Responsive.renderer.tableAll( {
                        tableClass: 'table table-condensed table-striped table-bordered table-hover tabel-sm'
                    } )
                }
            }
        } );
    } );
</script>