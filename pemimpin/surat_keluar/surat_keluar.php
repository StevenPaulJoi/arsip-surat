<div class="container" style="width: 100%; padding: 0;margin-left: 14px">
    <div class="panel panel-default">
        <div class="panel-body">
            <h3><i class="fa fa-table"></i> Tabel Surat Keluar</h3>
            <hr>
            <div class="table-responsive" style="margin-top: 20px">
                <table id="example" class="table table-bordered" style="width: 100%; margin: 0px">
                    <thead>
                    <th style="text-align:center;width: 1px;">No</th>
                    <th style="text-align:center;">No Agenda Keluar</th>
                    <th style="text-align:center;">Jenis Surat</th>
                    <th style="text-align:center;">Tanggal Kirim</th>
                    <th style="text-align:center;">Pengirim</th>
                    <th style="text-align:center;">Perihal</th>
                    </thead>
                    <tbody>
                    <?php
                    $no=1;
                    $q_masuk = mysqli_query($conn, "SELECT * FROM tb_surat_keluar order by no_agenda_keluar ASC");
                    while ($baris = mysqli_fetch_array($q_masuk))
                    {
                        ?>
                        <tr>
                            <td style="text-align: center"><?php echo $no++ ?></td>
                            <td style="text-align: center; font-family: 'Arial', sans-serif">
                            <a href="?page=detail_suratkeluar&no_agenda_keluar=<?php echo $baris['no_agenda_keluar'];?>"><?php echo $baris['no_agenda_keluar'];?>
                            </td>
                            <td style="text-align: center; font-family: 'Arial', sans-serif">
                                <?php echo $baris['jenis_surat'];?>
                            </td>
                            <td style="text-align: center; font-family: 'Arial', sans-serif">
                                <?php echo date('y-m-d',strtotime($baris['tanggal_kirim']));?>
                            </td>
                            <td style="text-align: center; font-family: 'Arial', sans-serif">
                                <?php echo $baris['pengirim'];?>
                            </td>
                            <td style="text-align: center; font-family: 'Arial', sans-serif">
                                <?php echo $baris['perihal'];?>
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