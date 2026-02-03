<?php
// memulai session
session_start();
$username = $_POST['username'];
$md5_password = md5($_POST['password']);

//$password = $_POST['password'];
// query untuk mendapatkan record dari username
require("../include/config.php");
$query = "SELECT * FROM pengelola WHERE username ='$username'";
$hasil = mysql_query($query);
while($data = mysql_fetch_array($hasil)){
// cek kesesuaian password
//echo $data['password'];
if ($md5_password == $data['password'])
{
    echo "<h1>Login Sukses</h1>";
 
    // menyimpan username dan level ke dalam session
    $_SESSION['level'] = $data['level'];
    $_SESSION['username'] = $data['username'];
	$_SESSION['wilayah'] = $data['wilayah'];
 
    // tampilkan menu
    if ($_SESSION['level'] == "admin")
     {
    // tampilkan menu untuk admin

    echo "<script>window.location=\"halsuper.php\";</script>";
    }
	
    else if ($_SESSION['level'] != "administrator")
    {echo "<script>window.location=\"main.php\";</script>"; }
	
	
}else{
echo "<h1>Login gagal</h1>";
}
} 
?>