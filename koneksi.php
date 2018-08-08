<?php
$db_host = "localhost"; //hosting
$db_user = "root"; //username
$db_pass = ""; //password database
$db_name = "pendaftaran"; //nama database

//fungsi untuk mengkoneksikan ke databse
$koneksi = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

//kondisi jika database tidak ke panggil
if(mysqli_connect_errno()){
	echo 'Gagal melakukan koneksi ke Database : '.mysqli_connect_error();
}
?>