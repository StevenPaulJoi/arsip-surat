<?php
include"../koneksi.php";
session_start();
if(!isset($_SESSION['Pemimpin'])){
    header("location:../index.php");
}
$qprofile=mysqli_query($conn,"select * from tb_petugas where id_petugas = '$_SESSION[Pemimpin]'"); //menampilkan data petugas
$datapemimpin=mysqli_fetch_array($qprofile);
?>
<?php
$page = (isset($_GET['page']))? $_GET['page'] : "main";
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pemimpin</title>
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/fonts/fonts/font-awesome.min.css" rel="stylesheet">
    <link href="../assets/fonts/fonts/font-awesome.css" rel="stylesheet">
    <link href="../assets/css/myCSS.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/plugin/animate-css/animate.min.css">
    <link rel="stylesheet" href="../assets/plugin/DataTables/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="../assets/plugin/DataTables/css/fixedHeader.bootstrap.min.css">
    <link rel="stylesheet" href="../assets/plugin/DataTables/css/responsive.bootstrap.min.css">
    <link href="../assets/css/jquery.datetimepicker.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/plugin/jquery-confirm/jquery-confirm.min.css">
    <script src="../assets/js/jquery-2.1.1.min.js"></script>
    <script src="../assets/plugin/DataTables/js/jquery.dataTables.min.js"></script>
    <script src="../assets/plugin/DataTables/js/dataTables.bootstrap.min.js"></script>
    <script src="../assets/plugin/DataTables/js/dataTables.fixedHeader.min.js"></script>
    <script src="../assets/plugin/DataTables/js/dataTables.responsive.min.js"></script>
    <script src="../assets/plugin/DataTables/js/responsive.bootstrap.min.js"></script>
    <script src="../assets/menu/script.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/jquery.datetimepicker.full.js"></script>
    <script src="../assets/plugin/jquery-confirm/jquery-confirm.min.js"></script>
</head>
<body style="background-color: #e8eaf6">
<br><div class="wrapper" style="border-top: solid #283593 22px;margin-top: -20px">
    <h2><b>SISTEM INFORMASI <small>ARSIP SURAT</small></b></h2>
    <hr>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><i class="fa fa-comment"></i> SIAS</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="?page=beranda"> Beranda</a>
                    </li>
                    <li>
                        <a href="?page=surat_masuk">Surat Masuk
                        <?php
                        $select = mysqli_query($conn,"SELECT * FROM tb_surat_masuk where status = 'belum dibaca'");
                        $jumlahdata_suratmasuk = mysqli_num_rows($select);
                        ?>
                        <div class="btn btn-xs btn-success" style="color: #ffffff"><?php echo "" . $jumlahdata_suratmasuk. "";?></div>
                        </a>
                    </li>
                        <li><a href="?page=surat_keluar">Surat Keluar</a></li>
                    </li>
                    <li>
                        <a href="?page=disposisi">Disposisi </a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Galeri Surat <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="?page=galeri_surat_masuk">Galeri Surat Masuk</a>
                            </li>
                            <li><a href="?page=galeri_surat_keluar">Galeri Surat Keluar</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Laporan <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="?page=laporansurat">Laporan Surat</a></li>
                            <li><a href="?page=laporandisposisi">Laporan Disposisi</a></li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a onclick="logout()" style="cursor: pointer"> Keluar</a>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
    <div class="container-fluid" style="margin-left: -29px">
        <?php
        $page = (isset($_GET['page']))? $_GET['page'] : "beranda";
        switch ($page){

            case 'beranda' : include "home.php"; break;

            case 'surat_masuk' : include "surat_masuk/surat_masuk.php"; break;
            case 'galeri_surat_masuk' : include "surat_masuk/galeri_surat_masuk.php"; break;
            case 'detail_suratmasuk' : include "surat_masuk/detail_suratmasuk.php"; break;
            case 'edit_suratmasuk' : include "surat_masuk/edit_suratmasuk.php"; break;

            case 'surat_keluar' : include "surat_keluar/surat_keluar.php"; break;
            case 'galeri_surat_keluar' : include "surat_keluar/galeri_surat_keluar.php"; break;
            case 'detail_suratkeluar' : include "surat_keluar/detail_suratkeluar.php"; break;
            case 'edit_suratkeluar' : include "surat_keluar/edit_suratkeluar.php"; break;

            case 'disposisi' : include "disposisi/disposisi.php"; break;
            case 'laporan_disposisi' : include "disposisi/laporan_disposisi.php"; break;
            case 'edit_disposisi' : include "disposisi/edit_disposisi"; break;

            case 'laporansurat' : include "laporan/laporan_surat.php"; break;
            case 'laporandisposisi' : include "laporan/laporan_disposisi.php"; break;
            case 'cetak_disposisi' : include "laporan/cetak_disposisi.php"; break;
            case 'cetak_suratmasuk' : include "laporan/cetak_suratmasuk.php"; break;
            case 'cetak_suratkeluar' : include "laporan/cetak_suratkeluar.php"; break;
        }
        ?>
    </div>
    <script>
        function logout(){
            $.confirm({
                title: '<center><span>KELUAR</span></center>',
                icon: 'fa fa-user-o fa-1x"',
                type:'red',
                theme:'modern',
                animation: 'zoom',
                content: '<center><span>Apakah Ingin Keluar (?)</span></center>',
                autoClose: 'logoutUser|10000',
                buttons: {
                    logoutUser: {
                        btnClass: 'btn-dark',
                        text: 'Keluar',
                        action: function () {
                            window.location.href = ('../logout.php');
                        }
                    },
                    cancel: function () {

                        $.alert('<center><span>Keluar Berhasil di Batalkan</span></center>');
                    }
                }
            });
        }
    </script>
</body>
</html>