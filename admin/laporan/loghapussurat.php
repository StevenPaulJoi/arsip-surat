<div class="container" style="width: 100%; padding: 0;margin-left: 14px">
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h4 style="text-align: center"> Data Surat Masuk (Sesudah diHapus)</h4>
                    <hr>
                    <div class="table-responsive" style="margin-top: 20px">
                        <table id="hapus-masuk" class="table table-bordered" style="width: 100%; margin: 0px">
                            <thead>
                            <th style="text-align:center;width: 1px;">No</th>
                            <th style="text-align:center;">Nomor Agenda Masuk</th>
                            <th style="text-align:center;">ID Petugas</th>
                            <th style="text-align:center;">Jenis Surat</th>
                            <th style="text-align:center;">Tanggal Hapus</th>
                            <th style="text-align:center;">Tanggal Kirim</th>
                            <th style="text-align:center;">Tanggal Terima</th>
                            <th style="text-align:center;">No Surat</th>
                            <th style="text-align:center;">Pengirim</th>
                            <th style="text-align:center;">Perihal</th>
                            <th style="text-align:center;">Gambar</th>
                            <th style="text-align:center;">Status</th>
                            </thead>
                            <tbody>
                            <?php
                            $no=1;
                            $q_masuk = mysqli_query($conn, "SELECT * FROM log_hapus_suratmasuk order by no_agenda_masuk ASC");
                            while ($baris = mysqli_fetch_array($q_masuk))
                            {
                                ?>
                                <tr>
                                    <td style="text-align: center"><?php echo $no++ ?></td>
                                    <td style="text-align: center; font-family: 'Arial', sans-serif">
                                        <?php echo $baris['no_agenda_masuk'];?>
                                    </td>
                                    <td style="text-align: center; font-family: 'Arial', sans-serif">
                                        <?php echo $baris['id_petugas'];?>
                                    </td>
                                    <td style="text-align: center; font-family: 'Arial', sans-serif">
                                        <?php echo $baris['jenis_surat'];?>
                                    </td>
                                    <td style="text-align: center; font-family: 'Arial', sans-serif">
                                        <?php echo $baris['tgl_hapus'];?>
                                    </td>
                                    <td style="text-align: center; font-family: 'Arial', sans-serif">
                                        <?php echo $baris['tanggal_kirim'];?>
                                    </td>
                                    <td style="text-align: center; font-family: 'Arial', sans-serif">
                                        <?php echo $baris['tanggal_terima'];?>
                                    </td>
                                    <td style="text-align: center; font-family: 'Arial', sans-serif">
                                        <?php echo $baris['no_surat'];?>
                                    </td>
                                    <td style="text-align: center; font-family: 'Arial', sans-serif">
                                        <?php echo $baris['pengirim'];?>
                                    </td>
                                    <td style="text-align: center; font-family: 'Arial', sans-serif">
                                        <?php echo $baris['perihal'];?>
                                    </td>
                                    <td style="text-align: center; font-family: 'Arial', sans-serif">
                                        <?php echo $baris['gambar'];?>
                                    </td>
                                    <td style="text-align: center;">
                                        <?php echo $baris['status'];?>
                                    </td>
                                    <td align="center" style="font-family: 'Arial', sans-serif">

                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h4 style="text-align: center"> Data Surat Keluar (Sesudah diHapus)</h4>
                    <hr>
                    <div class="table-responsive" style="margin-top: 20px">
                        <table id="hapus-keluar" class="table table-bordered" style="width: 100%; margin: 0px">
                            <thead>
                            <th style="text-align:center;width: 1px;">No</th>
                            <th style="text-align:center;">Nomor Agenda Keluar</th>
                            <th style="text-align:center;">ID Petugas</th>
                            <th style="text-align:center;">Jenis Surat</th>
                            <th style="text-align:center;">Tanggal Hapus</th>
                            <th style="text-align:center;">No Surat</th>
                            <th style="text-align:center;">Pengirim</th>
                            <th style="text-align:center;">Perihal</th>
                            <th style="text-align:center;">Gambar</th>
                            </thead>
                            <tbody>
                            <?php
                            $no=1;
                            $q_masuk = mysqli_query($conn, "SELECT * FROM log_hapus_suratkeluar order by no_agenda_keluar ASC");
                            while ($baris = mysqli_fetch_array($q_masuk))
                            {
                                ?>
                                <tr>
                                    <td style="text-align: center"><?php echo $no++ ?></td>
                                    <td style="text-align: center; font-family: 'Arial', sans-serif">
                                        <?php echo $baris['no_agenda_keluar'];?>
                                    </td>
                                    <td style="text-align: center; font-family: 'Arial', sans-serif">
                                        <?php echo $baris['id_petugas'];?>
                                    </td>
                                    <td style="text-align: center; font-family: 'Arial', sans-serif">
                                        <?php echo $baris['jenis_surat'];?>
                                    </td>
                                    <td style="text-align: center; font-family: 'Arial', sans-serif">
                                        <?php echo $baris['tgl_hapus'];?>
                                    </td>
                                    <td style="text-align: center; font-family: 'Arial', sans-serif">
                                        <?php echo $baris['no_surat'];?>
                                    </td>
                                    <td style="text-align: center; font-family: 'Arial', sans-serif">
                                        <?php echo $baris['pengirim'];?>
                                    </td>
                                    <td style="text-align: center; font-family: 'Arial', sans-serif">
                                        <?php echo $baris['perihal'];?>
                                    </td>
                                    <td style="text-align: center; font-family: 'Arial', sans-serif">
                                        <?php echo $baris['gambar'];?>
                                    </td>
                                    <td align="center" style="font-family: 'Arial', sans-serif">

                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h4 style="text-align: center"> Data Disposisi (Sesudah diHapus)</h4>
                    <hr>
                    <div class="table-responsive" style="margin-top: 20px">
                        <table id="hapus-disposisi" class="table table-bordered" style="width: 100%; margin: 0px">
                            <thead>
                            <th style="text-align:center;width: 1px;">No</th>
                            <th style="text-align:center;">Nomor Disposisi</th>
                            <th style="text-align:center;">Nomor Agenda Masuk</th>
                            <th style="text-align:center;">Nomor Surat Masuk</th>
                            <th style="text-align:center;">Kepada</th>
                            <th style="text-align:center;">Tanggal Hapus</th>
                            <th style="text-align:center;">Tanggal Disposisi</th>
                            <th style="text-align:center;">Keterangan</th>
                            <th style="text-align:center;">Status Disposisi</th>
                            <th style="text-align:center;">Tanggapan</th>
                            </thead>
                            <tbody>
                            <?php
                            $no=1;
                            $q_masuk = mysqli_query($conn, "SELECT * FROM log_hapus_disposisi order by no_disposisi ASC");
                            while ($baris = mysqli_fetch_array($q_masuk))
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
                                        <?php echo $baris['tgl_hapus'];?>
                                    </td>
                                    <td style="text-align: center; font-family: 'Arial', sans-serif">
                                        <?php echo $baris['tanggal_disposisi'];?>
                                    </td>
                                    <td style="text-align: center; font-family: 'Arial', sans-serif">
                                        <?php echo $baris['keterangan'];?>
                                    </td>
                                    <td style="text-align: center; font-family: 'Arial', sans-serif">
                                        <?php echo $baris['status_disposisi'];?>
                                    </td>
                                    <td style="text-align: center; font-family: 'Arial', sans-serif">
                                        <?php echo $baris['tanggapan'];?>
                                    </td>
                                    <td align="center" style="font-family: 'Arial', sans-serif">

                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#hapus-masuk').DataTable( {
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
<script>
    $(document).ready(function() {
        $('#hapus-keluar').DataTable( {
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
<script>
    $(document).ready(function() {
        $('#hapus-disposisi').DataTable( {
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