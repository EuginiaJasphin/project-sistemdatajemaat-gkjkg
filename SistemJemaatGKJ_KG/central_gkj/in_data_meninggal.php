<?
session_start()
?>
<div id="divFormContent">
<?php
if (!isset($_REQUEST['status'])) $_REQUEST['status']='';
switch ($_REQUEST['status']){
case 'datadiri'		  		:include "formeninggal.php"; break;
}
?></div>
<div id="divSearch">
  <form id="formSearch">
    <table><tr>
      <td>Cari Berdasarkan</td><td><select id="pilihcari"> 
        <option value="namajemaat">Nama Jemaat</option>
        <option value="idjemaat">ID Jemaat</option>
        <option value="semua">Semua</option>
        </select></td>
    <td id="kolompilih"><input type="text" name="fieldcari" id="fieldcari" /></td><td>
      <input type="submit" value="Cari" /></td>
    </tr></table>
  </form><br />
</div>
<div id="divLoading"></div><div id="Meninggal"></div>