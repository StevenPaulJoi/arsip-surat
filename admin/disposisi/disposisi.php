<div class="container" style="width: 100%; padding: 0;margin-left: 14px">
    <div class="panel panel-default">
        <div class="panel-body">
            <h3><i class="fa fa-table"></i> Tabel Disposisi</h3>
            <hr>
            <div class="table-responsive" style="margin-top: 20px">
                <table id="example" class="table table-bordered" style="width: 100%; margin: 0px">
                    <thead>
                    <th style="text-align:center;width: 1px;">No</th>
                    <th style="text-align:center;">No Disposisi</th>
                    <th style="text-align:center;">No Agenda Masuk</th>
                    <th style="text-align:center;">No Surat</th>
                    <th style="text-align:center;">Kepada</th>
                    <th style="text-align:center;">Tanggal Disposisi</th>
                    <th style="text-align:center;">Keterangan</th>
                    <th style="text-align:center;">Status Disposisi</th>
                    <th style="text-align:center;">Tanggapan</th>
                    <th align="center" style="text-align: center;width: 60px;">Opsi</th>
                    </thead>
                    <tbody>
                    <?php
                    $no=1;
                    $q_disposisi = mysqli_query($conn, "SELECT * FROM tb_disposisi order by no_disposisi ASC");
                    while ($baris = mysqli_fetch_array($q_disposisi))
                    {
                        ?>
                        <tr>
                            <td style="text-align: center"><?php echo $no++ ?></td>
                            <td style="text-align: center; font-family: 'Arial', sans-serif">
                                <?php echo $baris['no_disposisi'];?>
                            </td>
                            <td style="text-align: center; font-family: 'Arial', sans-serif">
                                <?php echo $baris['no_agenda_masuk'];?>
                            </td>
                            <td style="text-align: center; font-family: 'Arial', sans-serif">
                                <?php echo $baris['no_surat_masuk'];?>
                            </td>
                            <td style="text-align: center; font-family: 'Arial', sans-serif">
                                <?php echo $baris['kepada'];?>
                            </td>
                            <td style="text-align: center; font-family: 'Arial', sans-serif">
                                <?php echo $baris['tanggal_disposisi'];?>
                            </td>
                            <td style="text-align: center; font-family: 'Arial', sans-serif">
                                <?php echo $baris['keterangan'];?>
                            </td>
                            <td style="text-align: center; font-family: 'Arial', sans-serif">
                                    <?php
                                    if($baris['status_disposisi'] == "Belum dibaca"){
                                        ?>
                                        <button class="btn btn-primary disabled"><?php echo $baris['status_disposisi'];?> <i class="fa fa-share-square"></i></button>
                                    <?php
                                    }elseif($baris['status_disposisi'] == "Sudah dibaca"){
                                        ?>
                                        <button class="btn btn-success disabled"><?php echo $baris['status_disposisi'];?> <i class="fa fa-check-circle"></i></button>
                                    <?php
                                    }
                                    ?>
                            </td>
                            <td style="text-align: center; font-family: 'Arial', sans-serif">
                                <?php echo $baris['tanggapan'];?>
                            </td>
                            <td align="center" style="font-family: 'Arial', sans-serif">
                                <a class="btn btn-danger btn-sm" onclick="return confirm('Yakin Ingin Menghapus Data')" href="disposisi/hapus_disposisi.php?no_disposisi=<?php echo $baris['no_disposisi'];?>"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table><br>
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