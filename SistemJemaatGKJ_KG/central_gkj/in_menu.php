<?
session_start()
?>
<style type="text/css">
<!--
.style1 {color: #FFFFFF}
-->
</style>

<table width="860" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td bgcolor="#8F1F7B"><br />
      &nbsp;&nbsp;&nbsp; <a href="?adm=in_data&status=datadiri" class="style1">ENTRY DATA BARU</a> &nbsp;&nbsp; | &nbsp;&nbsp; 
	<a href="?adm=in_update" class="style1">UPDATE DATA JEMAAT</a>
        <?php if ($_SESSION['username']=='superadmin' ) { ?>
	&nbsp;&nbsp; | &nbsp;&nbsp; <a href="ex_jemaat.php" class="style1" target="_blank">EXPORT DATA JEMAAT</a> <?php } else {} ?>
    <br />
    <br /></td>
  </tr>
</table>


