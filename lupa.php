<title>Login Surat</title>
<link href="assets/css/bootstrap.min.css" rel="stylesheet">
<link href="assets/fonts/fonts/font-awesome.min.css" rel="stylesheet">
<link href="assets/fonts/fonts/font-awesome.css" rel="stylesheet">
<link href="assets/css/myCSS.css" rel="stylesheet">
<link rel="stylesheet" href="assets/plugin/DataTables/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="assets/plugin/DataTables/css/fixedHeader.bootstrap.min.css">
<link rel="stylesheet" href="assets/plugin/DataTables/css/responsive.bootstrap.min.css">
<link href="assets/css/jquery.datetimepicker.css" rel="stylesheet">
<link rel="stylesheet" href="assets/plugin/jquery-confirm/jquery-confirm.min.css">
<body style="background-color: lightslategray">
<div class="container" style="margin-top: 10%;padding: 25px;width: 30%;border-radius: 10px;">
    <div class="panel panel-default" style="border-radius: 8px; border-color: #000000">
        <div class="panel-body">
            <h5 style="text-align: center"><span><img src="img/team.png" style="width:70px;height: 70px"></span> Silahkan Masukan E-Mail</h5>
            <form class="form-horizontal" action="send_email.php" method="post">
                <div class="form-group row" style="font-family: Oswald-Regular">
                    <div class="col-md-12">
                        <h4>E-Mail</h4>
                        <input type="email" class="form-control" id="exampleInputEmail1" name="email" required="" style="width: 100%;height: 40px;">
                    </div>
                </div>
                <button type="submit" class="btn btn-success btn-block" name="lupa" style="font-family: Oswald-Regular;cursor: pointer">Kirim</button>
                <h6 style="float: right"><a href="index.php">Kembali</a></h6>
            </form>
        </div>
    </div>
</div>
</body>