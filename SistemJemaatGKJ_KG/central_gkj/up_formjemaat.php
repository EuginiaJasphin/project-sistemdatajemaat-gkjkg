<?php 
session_start();
include_once("../include/config.php");
if ($_REQUEST['fr']=='datadiri') { include"formjemaat.php"; }
elseif($_REQUEST['fr']=='pdk') { include"formpendidikan.php"; } 
elseif($_REQUEST['fr']=='pkr') { include"formpekerjaan.php"; }
elseif($_REQUEST['fr']=='pnk') { include"formpernikahan.php"; }
elseif($_REQUEST['fr']=='ank') { include"formanak.php"; }
elseif($_REQUEST['fr']=='bab') { include"formbaptis.php"; }
elseif($_REQUEST['fr']=='ush') { include"formusaha.php"; }
elseif($_REQUEST['fr']=='annk') { include"formannak.php"; } ?>
