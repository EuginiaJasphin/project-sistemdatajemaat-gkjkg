<?
session_start()
?>
<div id="divFormContent">
<?php
if (!isset($_REQUEST['status'])) $_REQUEST['status']='';
switch ($_REQUEST['status']){
case 'datadiri'		  		:include "formatestasi.php"; break;
}
?></div>
<table width="860" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td bgcolor="#FFE1E1"><br>
<a href="?adm=in_data3&status=datadiri"><img src="../images/atestasi.gif" border="0"/></a>&nbsp;&nbsp;&nbsp;
<br></td>
  </tr>
</table>
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
<div id="divLoading"></div><div id="divPageDataKeluar"></div>