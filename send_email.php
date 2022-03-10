<?php
function acak($panjang)
{
    $karakter= 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz123456789';
    $string = '';
    for ($i = 0; $i < $panjang; $i++) {
        $pos = rand(0, strlen($karakter)-1);
        $string .= $karakter{$pos};
    }
    return $string;
}
?>
<?php
include "sendEmail-v156.php";
include "koneksi.php";
if (isset($_POST['lupa'])){
    $email    = $_POST['email'];
    $query    = mysqli_query($conn,"Select * From tb_petugas WHERE email = '$email';");
    $data     = mysqli_fetch_array($query);
    $check    = mysqli_num_rows($query);
    if(!$check>0){
        echo "Email Tidak Ditemukan !";
    }else {
        $subject = ' Password Baru ';
        $pw = acak(7);
        $message = 'ID Petugas = ' .$data['id_petugas'].'<br>'.'Nama Petugas = '.$data['nama_depan'].' '.$data['nama_belakang'].'<br>'.' Password Baru = '.$pw;

        // user dan password gmail
        $sender = 'ahmadsopian651@gmail.com';
        $password = 'hdwiputra';

        if (email_localhost($email, $subject, $message, $sender, $password)){
            $update = mysqli_query($conn, "UPDATE tb_petugas SET password = MD5('$pw') WHERE id_petugas = '$data[id_petugas]'");
            if($update){
                echo "<script>alert('Password Telah dikirim ke email $email');window.location.href='index.php'</script>";
            }else{
                echo "Gagal Update";
            }
        }else{
            echo "Email sending failed";
        }
    }
}
?>
