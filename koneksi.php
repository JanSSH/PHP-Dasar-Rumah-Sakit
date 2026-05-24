

<?php
$host   = 'localhost';
$user   = 'root';
$pass   = '' ;
$db     = 'data_rs';

$konek  = mysqli_connect($host,$user,$pass,$db);

if(!$konek){

    echo 'Koneksi Gagal';
}

?>