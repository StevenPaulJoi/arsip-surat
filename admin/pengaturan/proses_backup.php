<?php
//Koneksi ke MySQL server dan database
$host = 'localhost';
$user = 'root';
$password = '';
$db = 'db_surat'; //ganti dengan nama database anda
$tables = 'tb_surat_masuk, tb_surat_keluar, tb_petugas, tb_disposisi, log_hapus_suratmasuk, log_hapus_suratkeluar, log_hapus_disposisi, log_edit_suratmasuk, log_edit_suratkeluar, tb_jenis_surat, tb_nomor_surat';

//panggil fungsi backup
backup_tables($host, $user, $password, $db, $tables);

//fungsi backup
function backup_tables($host, $user, $password, $db, $tables = '*') {
    $link = mysqli_connect($host,$user,$password, $db);

    // Check koneksi
    if (mysqli_connect_errno())
    {
        echo "Koneksi ke MySQL bermasalah: " . mysqli_connect_error();
        exit;
    }

    mysqli_query($link, "SET NAMES 'utf8'");

    //baca semua tables
    if($tables == '*')
    {
        $tables = array();
        $result = mysqli_query($link, 'SHOW TABLES');
        while($row = mysqli_fetch_row($result))
        {
            $tables[] = $row[0];
        }
    }
    else
    {
        $tables = is_array($tables) ? $tables : explode(',',$tables);
    }

    $return = '';
    //cycle through
    foreach($tables as $table)
    {
        $result = mysqli_query($link, 'SELECT * FROM '.$table);
        $num_fields = mysqli_num_fields($result);
        $num_rows = mysqli_num_rows($result);

        $return.= 'DROP TABLE IF EXISTS '.$table.';';
        $row2 = mysqli_fetch_row(mysqli_query($link, 'SHOW CREATE TABLE '.$table));
        $return.= "\n\n".$row2[1].";\n\n";
        $counter = 1;

        //Over tables
        for ($i = 0; $i < $num_fields; $i++)
        {   //Over rows
            while($row = mysqli_fetch_row($result))
            {
                if($counter == 1){
                    $return.= 'INSERT INTO '.$table.' VALUES(';
                } else{
                    $return.= '(';
                }

                //Over fields
                for($j=0; $j<$num_fields; $j++)
                {
                    $row[$j] = addslashes($row[$j]);
                    $row[$j] = str_replace("\n","\\n",$row[$j]);
                    if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } else { $return.= '""'; }
                    if ($j<($num_fields-1)) { $return.= ','; }
                }

                if($num_rows == $counter){
                    $return.= ");\n";
                } else{
                    $return.= "),\n";
                }
                ++$counter;
            }
        }
        $return.="\n\n\n";
    }

    //save file
    $fileName = 'Backup-SISM-'.date('Y-m-d his').'.sql';
    //.'-'.(md5(implode(',',$tables))).'.sql';
    $handle = fopen($fileName,'w+');
    fwrite($handle,$return);
    if(fclose($handle)){
        echo "Proses Backup Database Telah Selesai, Nama File Yang Telah diBackup = ".$fileName;
        ?>
        <br>Klik <a href="<?php echo $fileName?>" style="text-decoration: none">Disini </a>Untuk Mendownload Backup Database [.sql] !
        <?php        exit;
    }
}
?>
