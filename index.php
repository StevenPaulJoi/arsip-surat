<?php
session_start();
if(isset($_SESSION['Petugas'])){
    header('location:Petugas/index.php');
}elseif(isset($_SESSION['Admin'])){
    header('location:Admin/index.php');
}elseif(isset($_SESSION['Pemimpin'])){
    header('location:Pemimpin/index.php');

}
include"koneksi.php";
?>

<html>
<head>
    <title>Arsip Surat</title>
    <link href="w3.css" rel="stylesheet">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/fonts/fonts/font-awesome.min.css" rel="stylesheet">
    <link href="assets/fonts/fonts/font-awesome.css" rel="stylesheet">
    <link href="assets/css/myCSS.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/plugin/DataTables/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="assets/plugin/DataTables/css/fixedHeader.bootstrap.min.css">
    <link rel="stylesheet" href="assets/plugin/DataTables/css/responsive.bootstrap.min.css">
    <link href="assets/css/jquery.datetimepicker.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/plugin/jquery-confirm/jquery-confirm.min.css">
</head>
<body style="background-color: lightslategrey">
<div class="container" style=" width: 33%; margin: 100px auto;">
    <div class="panel panel-default" style="border-radius: 8px;border-color: #000000">
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12" align="center">
                    <img src="img/team.png" alt="" class="rounded-top" height="100px" width="100px" style=" margin-top: -8px">
                    <h4> Silahkan Masuk Website |<small> ARSIP SURAT</small></h4>
                    <hr>
                </div>
            </div>
            <div>
            <form class="form-horizontal" action="" method="post">
                <div class="form-group row">
                    <label for="exampleInputEmail1" class="col-md-1 control-label"></label>
                    <div class="col-md-12">
                        <label><b>ID PETUGAS</b></label>
                        <input type="text" maxlength="4" class="form-control" id="exampleInputEmail1" name="id_petugas" placeholder="ID Petugas" required="" >
                    </div>
                </div>
                <div class="form-group row"">
                <label for="exampleInputPassword1" class="col-md-1 control-label"></label>
                <div class="col-md-12">
                    <label><i>PASSWORD</i></label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password" required="" >
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary btn-block" name="login">Masuk</button>
        <h6 style="float: right"><a href="lupa.php"> Lupa Password</a></h6>
            </form>
    </div>
</div>

<?php
if(isset($_POST['login'])){
$id='';
$id_petugas = cek($_POST['id_petugas']);
$pass = md5(cek($_POST['password']));

$login = mysqli_query($conn,"select * from tb_petugas where id_petugas='$id_petugas'  and password='$pass'");
$cek = mysqli_num_rows($login);
$data = mysqli_fetch_array($login);

if($cek < 1){
?>
<div class="alert alert-dismissible animated1 flash" role="alert" style="background: #AD1457;color: #ffffff">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <b><i class="fa fa-close"></i> Anda Gagal Masuk, </b> Harap Periksa Kembali ID And Password.
</div>
<?php
}else{
    if($data['status_petugas'] == "NonAktif"){
        ?>
        <div class="alert alert-dismissible animated flash" role="alert" style="background:#f4aa00;color: #ffffff">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <b><i class="fa fa-warning"></i> Anda Tidak Boleh Masuk , </b>" <?php echo $data['nama_depan']." ".$data['nama_belakang'] ;?> " Karena Akun Anda Belum Aktif. " Harap Konfirmasi ke Petugas Admin Yang Aktif "
        </div>
    <?php
    }elseif($data['status_petugas'] == "Aktif"){
        if($data['hak'] == "Admin"){
            $_SESSION['Admin'] = $data['id_petugas'];
            $_SESSION['level'] = $data['hak'];
            ?>
            <div class="alert alert-dismissible animated fadeIn" role="alert" style="background:#0097a3;color: #ffffff">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <b><i class="fa fa-check"></i> Success, </b> Anda Berhasil Berhasil Masuk <?php echo " ". $user=$data['hak']." "; ?>.
            </div>
            <meta http-equiv="refresh"
                  content="3; url='admin/index.php'">
        <?php
        }elseif($data['hak'] == "Petugas"){
            $_SESSION['Petugas'] = $data['id_petugas'];
            $_SESSION['level'] = $data['hak'];
            ?>
            <div class="alert alert-dismissible animated fadeIn" role="alert" style="background:#0097a3;color: #ffffff">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <b><i class="fa fa-check"></i> Success, </b> Anda Berhasil Berhasil Masuk <?php echo " ". $user=$data['hak']." "; ?>.
            </div>
            <meta http-equiv="refresh" content="3; url='petugas/index.php'">
        <?php
        }elseif($data['hak'] == "Pemimpin"){
            $_SESSION['Pemimpin'] = $data['id_petugas'];
            $_SESSION['level'] = $data['hak'];
            ?>
            <div class="alert alert-dismissible animated fadeIn" role="alert" style="background:#0097a3;color: #ffffff">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <b><i class="fa fa-check"></i> Success, </b> Anda Berhasil Berhasil Masuk <?php echo " ". $user=$data['hak']." "; ?>.
            </div>
            <meta http-equiv="refresh" content="3; url='pemimpin/index.php'">
        <?php
        }
    }
}
}
?>
<script src="assets/js/jquery-2.1.1.min.js"></script>
<script src="assets/plugin/DataTables/js/jquery.dataTables.min.js"></script>
<script src="assets/plugin/DataTables/js/dataTables.bootstrap.min.js"></script>
<script src="assets/plugin/DataTables/js/dataTables.fixedHeader.min.js"></script>
<script src="assets/plugin/DataTables/js/dataTables.responsive.min.js"></script>
<script src="assets/plugin/DataTables/js/responsive.bootstrap.min.js"></script>
<script src="assets/menu/script.js"></script>
<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/jquery.datetimepicker.full.js"></script>
<script src="assets/plugin/jquery-confirm/jquery-confirm.min.js"></script>
</body>
</html>