<?
session_start()
?>
<div id="divFormContent">
<table width="860" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td bgcolor="#C4C4FF"><br>
      <div align="center">
	  <?php /*
<a href="?adm=in_data&status=datadiri"><img src="../images/data diri.gif" border="0"/></a>&nbsp;&nbsp;&nbsp;

<a href="?adm=in_data&status=pendidikan"><img src="../images/pendidikan.gif" border="0"/></a>&nbsp;&nbsp;
<a href="?adm=in_data&status=pekerjaan"><img src="../images/pekerjaan.gif" border="0"/></a>
<a href="?adm=in_data&status=pernikahan"><img src="../images/pernikahan.gif" border="0"/></a>&nbsp;&nbsp;
<a href="?adm=in_data&status=anak"><img src="../images/anak.gif" border="0"/></a>&nbsp;&nbsp;
<a href="?adm=in_data&status=baptis"><img src="../images/babtis.gif" border="0"/></a>&nbsp;&nbsp;
<br>
<br>
<a href="?adm=in_data&status=usaha"><img src="../images/lain.gif" border="0"/></a>&nbsp;&nbsp;
<a href="?adm=in_data&status=gereja"><img src="../images/data gereja.gif" border="0"/></a></div>
*/ ?>
    <br />
</td>
  </tr>
</table><br />
<?php
if (!isset($_REQUEST['status'])) $_REQUEST['status']='';
switch ($_REQUEST['status']){
case 'datadiri'		  		:include "formjemaat.php"; break;
case 'pendidikan'		  	:include "formpendidikan.php"; break;
case 'pekerjaan'		  	:include "formpekerjaan.php"; break;
case 'pernikahan'		  	:include "formpernikahan.php"; break;
case 'anak'		  			:include "formannak.php"; break;
case 'baptis'			  	:include "formbaptis.php"; break;
case 'usaha'			  	:include "formusaha.php"; break;
case 'meninggal'		  	:include "formeninggal.php"; break;
case 'keluar'		  		:include "formatestasi.php"; break;
case 'gereja'		  		:include "formgereja.php"; break;
}
?></div>
<br /><br />
<? 
$status=$_REQUEST['status'];
if ($status=="datadiri"){ ?>
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
<div id="divLoading"></div><div id="Datadiri"></div>
<?
} 
elseif ($status=="pendidikan") { ?>
<div id="divSearch">
  <form id="formSearch">
    <table><tr>
      <td>Cari Berdasarkan</td><td><select id="pilihcari"> 
        <option value="namajemaat">Nama Jemaat</option>
        <option value="idjemaat">ID Jemaat</option>
        <option value="semua">Semua</option>
        </select></td>
    <td id="kolompilihpend"><input type="text" name="fieldcari" id="fieldcari" /></td><td>
      <input type="submit" value="Cari" /></td>
    </tr></table>
  </form><br />
</div>
<div id="divLoading"></div><div id="Pendidikan"></div>
<? }
elseif ($status=="pekerjaan") { ?>
<div id="divSearch">
  <form id="formSearch">
    <table><tr>
      <td>Cari Berdasarkan</td><td><select id="pilihcari"> 
        <option value="namajemaat">Nama Jemaat</option>
        <option value="idjemaat">ID Jemaat</option>
        <option value="semua">Semua</option>
        </select></td>
    <td id="kolompilihkerja"><input type="text" name="fieldcari" id="fieldcari" /></td><td>
      <input type="submit" value="Cari" /></td>
    </tr></table>
  </form><br />
</div>
<div id="divLoading"></div><div id="Pekerjaan"></div>
<? }
elseif ($status=="pernikahan") { ?>
<div id="divSearch">
  <form id="formSearch">
    <table><tr>
      <td>Cari Berdasarkan</td><td><select id="pilihcari"> 
        <option value="namajemaat">Nama Jemaat</option>
        <option value="idjemaat">ID Jemaat</option>
        <option value="semua">Semua</option>
        </select></td>
    <td id="kolompilihnikah"><input type="text" name="fieldcari" id="fieldcari" /></td><td>
      <input type="submit" value="Cari" /></td>
    </tr></table>
  </form><br />
</div>
<div id="divLoading"></div><div id="Pernikahan"></div>
<? }
elseif ($status=="anak") { ?>
<div id="divSearch">
  <form id="formSearch">
    <table><tr>
      <td>Cari Berdasarkan</td><td><select id="pilihcari"> 
        <option value="namajemaat">Nama Jemaat</option>
        <option value="idjemaat">ID Jemaat</option>
        <option value="semua">Semua</option>
        </select></td>
    <td id="kolompilihanak"><input type="text" name="fieldcari" id="fieldcari" /></td><td>
      <input type="submit" value="Cari" /></td>
    </tr></table>
  </form><br />
</div>
<div id="divLoading"></div><div id="DataAnak"></div>
<? }
elseif ($status=="baptis") { ?>
<div id="divSearch">
  <form id="formSearch">
    <table><tr>
      <td>Cari Berdasarkan</td><td><select id="pilihcari"> 
        <option value="namajemaat">Nama Jemaat</option>
        <option value="idjemaat">ID Jemaat</option>
        <option value="semua">Semua</option>
        </select></td>
    <td id="kolompilihbaptis"><input type="text" name="fieldcari" id="fieldcari" /></td><td>
      <input type="submit" value="Cari" /></td>
    </tr></table>
  </form><br />
</div>
<div id="divLoading"></div><div id="DataBaptis"></div>
<? }
elseif ($status=="usaha") { ?>
<div id="divSearch">
  <form id="formSearch">
    <table><tr>
      <td>Cari Berdasarkan</td><td><select id="pilihcari"> 
        <option value="namajemaat">Nama Jemaat</option>
        <option value="idjemaat">ID Jemaat</option>
        <option value="semua">Semua</option>
        </select></td>
    <td id="kolompilihusaha"><input type="text" name="fieldcari" id="fieldcari" /></td><td>
      <input type="submit" value="Cari" /></td>
    </tr></table>
  </form><br />
</div>
<div id="divLoading"></div><div id="DataUsaha"></div>
<? }
elseif ($status=="meninggal") { ?>
<div id="divSearch">
  <form id="formSearch">
    <table><tr>
      <td>Cari Berdasarkan</td><td><select id="pilihcari"> 
        <option value="namajemaat">Nama Jemaat</option>
        <option value="idjemaat">ID Jemaat</option>
        <option value="semua">Semua</option>
        </select></td>
    <td id="kolompilihninggal"><input type="text" name="fieldcari" id="fieldcari" /></td><td>
      <input type="submit" value="Cari" /></td>
    </tr></table>
  </form><br />
</div>
<div id="divLoading"></div><div id="Meninggal"></div>
<? }
elseif ($status=="keluar") { ?>
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
<? }?>
