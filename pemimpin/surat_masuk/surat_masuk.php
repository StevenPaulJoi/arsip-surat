<div class="container" style="width: 100%; padding: 0;margin-left: 14px">
    <div class="panel panel-default">
        <div class="panel-body">
            <h3><i class="fa fa-table"></i>Surat Masuk</h3>
            <hr>
            <div class="table-responsive" style="margin-top: 20px">
                <table id="example" class="table table-bordered" style="width: 100%; margin: 0px">
                    <thead>
                    <th style="text-align:center;width: 1px;">No</th>
                    <th style="text-align:center;">No Agenda Masuk</th>
                    <th style="text-align:center;">Nama Petugas</th>
                    <th style="text-align:center;">Jenis Surat</th>
                    <th style="text-align:center;">Tanggal Kirim</th>
                    <th style="text-align:center;">Tanggal Terima</th>
                    <th style="text-align:center;">Perihal</th>
                    <th style="text-align:center;">Status</th>
                    <th style="text-align: center">Pengirim</th>
                    </thead>
                    <tbody>
                    <?php
                    $no=1;
                    $q_masuk = mysqli_query($conn, "SELECT * FROM q_masuk order by no_agenda_masuk ");
                    while ($baris = mysqli_fetch_array($q_masuk))
                    {
                        ?>
                        <tr>
                            <td style="text-align: center"><?php echo $no++ ?></td>
                            <td style="text-align: center; font-family: 'Arial', sans-serif">
                                <a href="?page=detail_suratmasuk&no_agenda_masuk=<?php echo $baris['no_agenda_masuk'];?>"><?php echo $baris['no_agenda_masuk'];?></a>
                            </td>
                            <td style="text-align: center; font-family: 'Arial', sans-serif">
                                <?php echo $baris['nama_petugas'];?>
                            </td>
                            <td style="text-align: center; font-family: 'Arial', sans-serif">
                                <?php echo $baris['jenis_surat'];?>
                            </td>
                            <td style="text-align: center; font-family: 'Arial', sans-serif">
                                <?php echo date('d-m-Y',strtotime($baris ['tanggal_kirim']));?>
                            </td>
                            <td style="text-align: center; font-family: 'Arial', sans-serif">
                                <?php echo date('d-m-Y',strtotime($baris ['tanggal_terima']));?>
                            </td>
                            <td style="text-align: center; font-family: 'Arial', sans-serif">
                                <?php echo $baris['perihal'];?>
                            </td>
                            <td style="text-align: center;">
                                <?php
                                if($baris['status'] == "Belum dibaca"){
                                    ?>
                                    <a href="?page=detail_suratmasuk&no_agenda_masuk=<?php echo $baris['no_agenda_masuk'];?>" style="text-decoration: none"><button class="btn btn-primary btn-block btn-sm" style="cursor: pointer"><?php echo$baris['status'];?> <i class="fa fa-share-square"></i></button></a>
                                <?php
                                }elseif($baris['status'] == "Sudah dibaca"){
                                    ?>
                                    <button class="btn btn-success btn-block btn-sm disabled" style="cursor: default"><?php echo$baris['status'];?> <i class="fa fa-check-circle"></i></button>
                                <?php
                                }
                                ?>
                            <td style="text-align: center; font-family: 'Arial', sans-serif">
                                <?php echo $baris['pengirim'];?>
                            </td>
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