<div class="container" style="margin-top: 3%; ">
    <div class="container animated1 fadeIn" style="width: 100%;text-transform: uppercase">
        <div class="row">
            <div class="col-md-4">
                <div class="panel panel-default" style="box-shadow: 0 0 2px 2px ">
                    <div class="panel-heading" style="background:white;color: black">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-envelope fa-4x" style="color: #0277BD"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                Jumlah Data

                                <div class="huge">
                                    <?php
                                    $select = mysqli_query($conn,"select * from tb_surat_masuk");
                                    $jumlahdata_masuk = mysqli_num_rows($select);
                                    ?>
                                    <h4 class="btn btn-primary" style="margin-top: 2px"><?php echo "" .$jumlahdata_masuk. ""; ?></h4></center>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer" style="background:#0277BD;border-color:#0277BD;color: #ffffff">SURAT MASUK</div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default" style="box-shadow: 0 0 2px 2px ">
                    <div class="panel-heading" style="background:white;color: black">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-envelope-o fa-4x" style="color: #0277BD"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                Jumlah Data
                                <div class="huge">
                                    <?php
                                    $select = mysqli_query($conn,"select * from tb_surat_keluar");
                                    $jumlahdata_keluar = mysqli_num_rows($select);
                                    ?>
                                    <h4 class="btn btn-primary" style="margin-top: 2px"><?php echo "" .$jumlahdata_keluar. ""; ?></h4></center>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer" style="background:#0277BD;border-color:#0277BD;color: #ffffff">SURAT KELUAR</div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default" style="box-shadow: 0 0 2px 2px ">
                    <div class="panel-heading" style="background:white;color: black">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-location-arrow fa-4x" style="color: #0277BD"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                Jumlah Data
                                <div class="huge">
                                    <?php
                                    $select = mysqli_query($conn,"select * from tb_disposisi");
                                    $jumlahdata_disposisi = mysqli_num_rows($select);
                                    ?>
                                    <h4 class="btn btn-primary" style="margin-top: 2px"><?php echo "" .$jumlahdata_disposisi. ""; ?></h4></center>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer" style="background:#0277BD;border-color:#0277BD;color: #ffffff">DISPOSISI</div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default" style="box-shadow: 0 0 2px 2px ">
                    <div class="panel-heading" style="background:white;color: black">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-users fa-4x" style="color: #0277BD"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                Jumlah Data
                                <div class="huge">
                                    <?php
                                    $select = mysqli_query($conn,"select * from tb_petugas");
                                    $jumlahdata_petugas = mysqli_num_rows($select);
                                    ?>
                                    <h4 class="btn btn-primary" style="margin-top: 2px"><?php echo "" .$jumlahdata_petugas. ""; ?></h4></center>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer" style="background:#0277BD;border-color:#0277BD;color: #ffffff">PETUGAS</div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default" style="box-shadow: 0 0 2px 2px ">
                    <div class="panel-heading" style="background:white;color: black">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-bar-chart-o fa-4x" style="color: #0277BD"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer" style="background:#0277BD;border-color:#0277BD;color: #ffffff">Laporan Grafik</div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default" style="box-shadow: 0 0 2px 2px ">
                    <div class="panel-heading" style="background:white;color: black">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-print fa-4x" style="color: #0277BD"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer" style="background:#0277BD;border-color:#0277BD;color: #ffffff">Laporan Surat</div>
                </div>
            </div>
        </div>
    </div>
</div>