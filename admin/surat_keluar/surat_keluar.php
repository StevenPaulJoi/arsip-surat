<?php
$sel = "SELECT max(no_agenda_keluar) as maxKode FROM tb_surat_keluar";
$hasil = mysqli_query($conn, $sel);
$ambil  = mysqli_fetch_array($hasil);
$id = $ambil['maxKode'];

$noUrut = (int) substr($id, 11, 3);
$noUrut++;
$kode = sprintf("%03s", $noUrut);

$char = "SK/".date('Ymd');
$NoAgendaKeluar = $char . $kode;

//$NoSurat = $kode;
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
    $no_surat = cekdata($_POST['no_surat']);
    $pengirim = cekdata($_POST['pengirim']);
    $perihal = cekdata($_POST['perihal']);

    $sumber = $_FILES['gambar']['tmp_name'];
    $target = '../img/foto_suratkeluar/';
    $gambar = $_FILES['gambar']['name'];
    $nama_gambar = time().$gambar;

    $insert = "INSERT INTO `tb_surat_keluar` (`no_agenda_keluar`, `id_petugas`, `jenis_surat`, `tanggal_kirim`, `no_surat`, `pengirim`, `perihal`, `gambar`) VALUES ('$NoAgendaKeluar', '$dataprofile[id_petugas]', '$jenis_surat', '$tanggal_kirim', '$no_surat', '$pengirim', '$perihal', '$nama_gambar');";
    $pindah = move_uploaded_file($sumber, $target.$nama_gambar);
    if($pindah){
        $sql = mysqli_query($conn, $insert);
        if($sql){
            echo'<script> alert("Simpan Berhasil ");</script>';
            echo '<script>window.location.href="?page=surat_keluar";</script>';
        }else{
            echo'<script> alert("Data Gagal diSimpan");</script>';
            echo '<script>window.location.href="?page=surat_keluar";</script>';
        }
    }else{
        echo'<script> alert("Data Gagal diSimpan");</script>';
        echo '<script>window.location.href="?page=surat_keluar";</script>';
    }
}
?>

<div class="container" style="width: 100%;padding: 0px;margin-left: 15px">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="table-responsive">
                        <h4><button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal" style="color: #000">
                                +
                            </button> Tambah Surat</h4>
                        <h3><i class="fa fa-table"></i> Tabel Surat Keluar</h3>
                        <hr>
                        <table id="example" class="table table-bordered" style="width: 100%; padding: 0; margin: 0px">
                            <thead>
                            <th style="text-align: center">No</th>
                            <th style="text-align: center">No Agenda</th>
                            <th style="text-align: center">Jenis Surat</th>
                            <th style="text-align: center">Tanggal Kirim</th>
                            <th style="text-align: center">Pengirim</th>
                            <th style="text-align: center">Perihal</th>
                            <th style="text-align: center">Proses</th>
                            </thead>
                            <tbody>
                            <?php
                            $no=1;
                            $query = "SELECT * FROM tb_surat_keluar";
                            $sql = mysqli_query($conn, $query);
                            while ($baris = mysqli_fetch_array($sql)){
                                ?>
                                <tr>
                                    <td style="text-align: center"><?php echo $no++ ?></td>
                                    <td style="text-align: center"><?php echo $baris['no_agenda_keluar']; ?></td>
                                    <td style="text-align: center"><?php echo $baris['jenis_surat']; ?></td>
                                    <td style="text-align: center"><?php echo date('d-m-Y',strtotime($baris['tanggal_kirim'])); ?></td>
                                    <td style="text-align: center"><?php echo $baris['pengirim']; ?></td>
                                    <td style="text-align: center"><?php echo $baris['perihal']; ?></td>
                                    <td style="text-align: center">
                                        <a class="btn btn-warning btn-sm" href="?page=edit_suratkeluar&no_agenda_keluar=<?php echo $baris['no_agenda_keluar'];?>"><i class="fa fa-edit" style="cursor: pointer;color: white"></i></a>
                                        <a class="btn btn-danger" onclick="return confirm('Yakin Anda Ingin Menghapus Data')" href="surat_keluar/hapus_suratkeluar.php?no_agenda_keluar=<?php echo $baris['no_agenda_keluar']; ?>"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table><br>
                        <!-- Modal -->
                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Input Surat Keluar</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form action="" method="post" enctype="multipart/form-data">
                                            <div class="col-md-4">
                                                <tr>
                                                    <td>No Agenda Keluar</td>
                                                    <td><input type="text" class="form-control" name="no_agenda_keluar" value="<?php echo $NoAgendaKeluar?>" readonly style="width: 100%"></td>
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
                                                    <select name="jenis_surat" class="form-control form-control-sm" style="width: 100%" required>
                                                        <option value="Sangat Rahasia">Sangat Rahasia</option>
                                                        <option value="Rahasia">Rahasia</option>
                                                        <option value="Dinas">Dinas</option>
                                                        <option value="Umum">Umum</option>
                                                        <option value="Resmi">Resmi</option>
                                                        <option value="Pengantar">Pengantar</option>
                                                        <option value="Edaran">Edaran</option>
                                                        <option value="Segera">Segera</option>
                                                        <option value="Kilat">Kilat</option>
                                                        <option value="Pribadi">Pribadi</option>
                                                        <option value="Lain-lain">Lain-lain</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <tr>
                                                    <td>Tanggal Kirim</td>
                                                    <td><input type="date" class="form-control" name="tanggal_kirim" style="width: 100%"></td>
                                                </tr>
                                                <br>
                                            </div>
                                            <div class="col-md-4">
                                                <td>Nomor Surat</td>
                                                <select style="width: 100%" class="form-control form-control-sm" name="no_surat">
                                                    <option value="">Pilih No Surat</option>
                                                    <?php
                                                    $no_surat = mysqli_query($conn,"select * from tb_nomor_surat");
                                                    while($hasil = mysqli_fetch_array($no_surat)){
                                                        ?>
                                                        <option value="<?php echo $hasil['no_depan'].$hasil['no_belakang']?>"><?php echo $hasil['no_depan'].$hasil['no_belakang']." ( ".$hasil['ket']." ) "?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select><br>
                                            </div>
                                            <div class="col-md-4">
                                                <tr>
                                                    <td>Pengirim</td>
                                                    <td><input type="text"  pattern="[A-Za-z]+" title="hanya bisa diisi dengan Huruf A-Z" class="form-control" name="pengirim" style="width: 100%"></td>
                                                </tr>
                                                <br>
                                            </div>
                                            <div class="col-md-4">
                                                <tr>
                                                    <td>Perihal</td>
                                                    <td><input type="text" pattern="[A-Za-z]+" title="hanya bisa diisi dengan Huruf A-Z" class="form-control" name="perihal" style="width: 100%"></td>
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