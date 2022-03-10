<?php
$sel = "SELECT max(no_agenda_masuk) as maxKode FROM tb_surat_masuk";
$hasil = mysqli_query($conn, $sel);
$ambil  = mysqli_fetch_array($hasil);
$id = $ambil['maxKode'];

$noUrut = (int) substr($id, 11, 3);
$noUrut++;
$kode = sprintf("%03s", $noUrut);

$char = "SM/".date('Ymd');
$NoAgendaMasuk = $char . $kode;

//$NoSurat = $kode; //supaya max
?>
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
    $jenis_surat = cekdata($_POST['jenis_surat']);
    $tanggal_kirim = cekdata($_POST['tanggal_kirim']);
    $tanggal_terima = cekdata($_POST['tanggal_terima']);
    $no_surat = cekdata($_POST['no_surat']);
    $pengirim = cekdata($_POST['pengirim']);
    $perihal = cekdata($_POST['perihal']);

    $sumber = $_FILES['gambar']['tmp_name'];
    $target = '../img/foto_suratmasuk/';
    $gambar = $_FILES['gambar']['name'];
    $nama_gambar = time().$gambar;

    $status = "Belum Dibaca";

    $insert = "INSERT INTO `db_surat`.`tb_surat_masuk` (`no_agenda_masuk`, `id_petugas`, `jenis_surat`, `tanggal_kirim`, `tanggal_terima`, `no_surat`, `pengirim`, `perihal`, `gambar`, `status`) VALUES ('$NoAgendaMasuk', '$dataprofile[id_petugas]', '$jenis_surat', '$tanggal_kirim', '$tanggal_terima', '$no_surat', '$pengirim', '$perihal', '$nama_gambar', '$status')";
    $pindah = move_uploaded_file($sumber, $target.$nama_gambar);
    if($pindah){
        $sql = mysqli_query($conn, $insert);
        if($sql){
            echo'<script> alert("Simpan Berhasil ");</script>';
            echo '<script>window.location.href="?page=surat_masuk";</script>';
        }else{
            echo'<script> alert("Data Gagal diSimpan");</script>';
            echo '<script>window.location.href="?page=surat_masuk";</script>';
        }
    }else{
        echo'<script> alert("Data Gagal diSimpan");</script>';
        echo '<script>window.location.href="?page=surat_masuk";</script>';
    }
}
?>

<div class="container" style="width: 100%;padding: 0;margin-left: 15px">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="table-responsive">
                        <h4><button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal" style="color: #000">
                                +
                            </button> Tambah Surat</h4>
                        <h3><i class="fa fa-table"></i> Tabel Surat Masuk</h3>
                        <hr>
                        <table id="example" class="table table-bordered" style="width: 100%; padding: 0; margin: 0px">
                            <thead>
                            <th style="text-align: center">No</th>
                            <th style="text-align: center">No Agenda</th>
                            <th style="text-align: center">Jenis Surat</th>
                            <th style="text-align: center">Tanggal Kirim</th>
                            <th style="text-align: center">Perihal</th>
                            <th style="text-align: center">Status</th>
                            <th style="text-align: center">Proses</th>
                            </thead>
                            <tbody>
                            <?php
                            $no=1;
                            $query = "SELECT * FROM tb_surat_masuk ";
                            $sql = mysqli_query($conn, $query);
                            while ($baris = mysqli_fetch_array($sql)){
                                ?>
                                <tr>
                                    <td style="text-align: center"><?php echo $no++ ?></td>
                                    <td style="text-align: center"><?php echo $baris['no_agenda_masuk']; ?></td>
                                    <td style="text-align: center"><?php echo $baris['jenis_surat']; ?></td>
                                    <td style="text-align: center"><?php echo date('d-m-Y',strtotime($baris['tanggal_kirim'])); ?></td>
                                    <td style="text-align: center"><?php echo $baris['perihal']; ?></td>
                                    <td style="text-align: center">
                                        <?php
                                        if($baris['status'] == "Belum dibaca"){
                                            ?>
                                            <button class="btn btn-primary disabled"><?php echo $baris['status'];?> <i class="fa fa-share-square"></i></button>
                                        <?php
                                        }elseif($baris['status'] == "Sudah dibaca"){
                                            ?>
                                            <button class="btn btn-success disabled"><?php echo $baris['status'];?> <i class="fa fa-check-circle"></i></button>
                                        <?php
                                        }
                                        ?>
                                    </td>
                                    <td style="text-align: center">
                                        <a class="btn btn-warning btn-sm" href="?page=edit_suratmasuk&no_agenda_masuk=<?php echo $baris['no_agenda_masuk'];?>"><i class="fa fa-edit" style="cursor: pointer;color: white"></i></a>
                                        <a class="btn btn-danger" onclick="return confirm('Yakin Anda Ingin Menghapus Data')" href="surat_masuk/hapus_suratmasuk.php?no_agenda_masuk=<?php echo $baris['no_agenda_masuk']; ?>"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table><br>
                        <div class="col-8">
                            <tr>
                                <td>
                                    <a class="btn btn-danger" href="surat_masuk/cetak_pdf.php">Cetak Pdf</a>
                                </td>
                            </tr>
                        </div>
                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Input Surat Masuk</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form action="" method="post" enctype="multipart/form-data">
                                            <div class="col-md-4">
                                                <tr>
                                                    <td>No Agenda Masuk</td>
                                                    <td><input type="text" class="form-control" name="no_agenda_masuk" value="<?php echo $NoAgendaMasuk?>" readonly style="width: 100%"></td>
                                                </tr>
                                            </div>
                                            <div class="col-md-4">
                                                <tr>
                                                    <td>ID Petugas</td>
                                                    <td><input type="text" class="form-control" name="id_petugas" style="width: 100%" value="<?php echo $dataprofile['id_petugas']?>" disabled></td>
                                                </tr>
                                                <br>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Jenis Surat</label>
                                                    <select name="jenis_surat" class="form-control form-control-sm" style="width: 100%;">
                                                        <option value="">Jenis Surat</option>
                                                        <?php
                                                        $q_jns = mysqli_query($conn, "SELECT * FROM tb_jenis_surat");
                                                        while($hasil = mysqli_fetch_array($q_jns)){
                                                            ?>
                                                            <option value="<?=$hasil['jenis_surat']?>"><?=$hasil['jenis_surat']?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                    <br>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <tr>
                                                    <td>Tanggal Kirim</td>
                                                    <td>;</td>
                                                    <td><input type="date" class="form-control" name="tanggal_kirim" style="width: 100%"></td>
                                                </tr>
                                                <br>
                                            </div>
                                            <div class="col-md-4">
                                                <tr>
                                                    <td>Tanggal Terima</td>
                                                    <td><input type="date" class="form-control" name="tanggal_terima" style="width: 100%"></td>
                                                </tr>
                                                <br>
                                            </div>
                                            <div class="col-md-4">
                                                <tr>
                                                    <td>No Surat</td>
                                                    <td><input type="text" pattern="[0-9]+" title="hanya bisa diisi dengan Huruf 0-9" class="form-control" name="no_surat" style="width: 100%"></td>
                                                </tr>
                                            <br>
                                            </div>
                                            <div class="col-md-4">
                                                <tr>
                                                    <td>Pengirim</td>
                                                    <td><input type="text" pattern="[A-Za-z]+" title="hanya bisa diisi dengan Huruf A-Z" class="form-control" name="pengirim" style="width: 100%"></td>
                                                </tr>
                                                <br>
                                            </div>
                                            <div class="col-md-4">
                                                <tr>
                                                    <td>Perihal</td>
                                                    <td><input type="text" class="form-control" name="perihal" style="width: 100%"></td>
                                                </tr>
                                                <br>
                                            </div>
                                            <div class="col-md-4">
                                                <tr>
                                                    <td>Gambar</td>
                                                    <td><input type="file" class="form-control" name="gambar"></td>
                                                </tr>
                                                <br>
                                            </div>
                                            <div class="col-md-12">
                                                <tr>
                                                    <td>
                                                        <button type="submit" class="btn btn-primary btn-block" name="simpan">SIMPAN</button>
                                                        <button type="reset" class="btn btn-danger btn-block" style="text-align: center">RESET</button>
                                                    </td>
                                                </tr>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                    </div>
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