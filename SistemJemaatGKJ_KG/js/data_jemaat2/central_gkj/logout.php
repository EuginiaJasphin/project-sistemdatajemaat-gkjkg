<?php
session_start();
unset($_SESSION['level']);
session_destroy(); 
echo "<script>window.location.href='index.php';</script>"; 

?>