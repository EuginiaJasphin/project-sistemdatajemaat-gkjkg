<script type="text/javascript" src="../js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="../js/pernikahan.js"></script>

<script src="../js/jquery.min.js"></script>
<script src="../js/jquery-ui.min.js"></script>
<?php 
include_once("../include/config.php");
$action="add_pernikahan";
	$judul="Data Pernikahan Jemaat GKJ Jogja Selatan";
	$status="Submit";
	if(isset($_GET['action']) and $_GET['action']=="update" and !empty($_GET['id']))
	{
		$str="select * from tbl_pernikahan where id_pernikahan = '$_GET[id]'";
		$res=mysql_query($str) or die("query gagal dijalankan");
		$data=mysql_fetch_assoc($res);
		$idpernikahan=$data['id_pernikahan'];
		$pasangan=$data['pasangan'];
		$tanggal=$data['tanggal'];
		$gereja=$data['gereja'];
		$pendeta=$data['pendeta'];
		$catatansipil=$data['catatansipil'];
		$nosurat=$data['nosurat'];
		$action="update_nikah";
		$readonly="readonly=readonly";
		$status="Update";
		$judul="Update Data Jemaat";
	}
?>

			
<script type="text/javascript">
$(function(){
  $("input#namajemaat").focus(); 
  
  function loadData(){
	  var dataString;
	  var cari = $("input#fieldcari").val();
	  var combo = $("select#pilihcari").val();
	  
	  if (combo == "namajemaat"){
      dataString = 'nama='+ cari; 
    }
    else if (combo == "idjemaat"){
      dataString = 'id='+ cari;
    }

    $.ajax({
      url: "page_pernikahan.php",
      type: "GET",
      data: dataString,
  		success:function(data)
  		{
  			$('#Pernikahan').html(data);
  		}
    });
  }

  $("form#formpernikahan").submit(function(){
    if (confirm("Apakah benar akan menyimpan data pernikahan jemaat?")){
      var vPasangann = $("select#pasangan").val(); //mengambil id dari input
      var vGerejaa = $("select#gereja").val();
      
      // cek validasi form dahulu, semua field data harus diisi
      if ((vPasangann.replace(/\s/g,"") == "") || (vGerejaa.replace(/\s/g,"") == "")) {
        alert("Mohon melengkapi semua field data!");
        $("input#pasangan").focus();
        return false;
      }
      else{  
    		$.ajax({
        	url: "proses_data.php",
        	type:$(this).attr("method"), //metode yg digunakan sesuai pada form, dalam hal ini 'POST'
        	data:$(this).serialize(), //mengirim data secara serialize -- seluruh data input dikirim untuk diproses
        	dataType: 'json', //respon yang diminta dalam format JSON
        	success:function(response){
          	if(response.status == 1) // return nilai dari hasil proses
          	{ 
          	  alert("Data berhasil disimpan!");
              loadData(); //reload list data
            }
          	else
          	{
          		alert("Data gagal di simpan!");
          	}
        	}
        });
    		return false;
    	}
    }
    return false;
  });
});
</script>
<table width="860">
  <tr>
   <td width="674"><form method="post" name="formpernikahan" action="" id="formpernikahan">
<table width="681">
<tr><th colspan="2"><b><?php echo $judul; ?></b></th></tr>
<?php if ($_GET['action'] == "update"){?> <!-- //jika update maka textfield ID jemaat ditampilkan -->
<?php }?>
<tr>
  <td width="177">Pasangan dari </td>
  <td><select name="pasangan" id="pasangan">
	<? 
	   if (($_GET['action'] == "update")){
	   $result=mysql_query("select * from tbl_jemaat WHERE id_jemaat='$pasangan'");
       while($row = mysql_fetch_array($result)){
	   $rs=mysql_query("select * from tbl_jemaat WHERE pasangan='$pasangan' ORDER BY id_jemaat DESC");
	   while($rows = mysql_fetch_array($rs)){
	   echo "<option value=$row[id_jemaat]>$row[nama_jemaat] - $rows[nama_jemaat]</option>";
	   }}}else{
	   $result=mysql_query("select * from tbl_jemaat WHERE ket='$_SESSION[wilayah]' ORDER BY nama_jemaat ASC");
       while($row = mysql_fetch_array($result)){
       $idj=$row['id_jemaat']; 
	   $rs=mysql_query("select * from tbl_jemaat WHERE pasangan='$idj' AND ket='$_SESSION[wilayah]' ORDER BY nama_jemaat ASC");
	   while($rows = mysql_fetch_array($rs)){
	   echo "<option value=$row[id_jemaat]>$row[nama_jemaat] - $rows[nama_jemaat]</option>";
	   }}}
	 ?></select><?php if ($_GET['action'] == "update"){?><input type="hidden" name="idpernikahan" value="<?= $idpernikahan; ?>" /><? }?></td>
</tr>
<tr>
  <td>Tanggal </td>
  <td>
  <select name="tanggal"> 
	  <option value="<? $test=substr($tanggal,0,2);echo $test;?>"><? $test=substr($tanggal,0,2);echo $test;?></option>
      <option value="00">tgl</option>
	  <option value="00">-</option>
	  <option value="01">01</option>
	  <option value="02">02</option>
	  <option value="03">03</option>
	  <option value="04">04</option>
	  <option value="05">05</option>
	  <option value="06">06</option>
	  <option value="07">07</option>
	  <option value="08">08</option>
	  <option value="09">09</option>
      <?php for ($i=10; $i <= 31; $i++) {
      if ($i == $outdate){ $selectdate ="selected";} else {$selectdate="";
      }echo ("<option value=\"$i\" $selectdate>$i</option>"."\n");}
      ?>
    </select>
/
<select name="bulan">
  <option value="<? $test=substr($tanggal,3,-5);echo $test;?>"><? $test=substr($tanggal,3,-5);echo $test;?></option>
  <option value="00">bln</option>
  <option value="00">-</option>
  <option value="01">Januari</option>
  <option value="02">Februari</option>
  <option value="03">Maret</option>
  <option value="04">April</option>
  <option value="05">Mei</option>
  <option value="06">Juni</option>
  <option value="07">Juli</option>
  <option value="08">Agustus</option>
  <option value="09">September</option>
  <option value="10">Oktober</option>
  <option value="11">November</option>
  <option value="12">Desember</option>
</select>
/
<select name="tahun">
   <option value="<? $test=substr($tanggal,6,4);echo $test;?>"><? $test=substr($tanggal,6,4);echo $test;?></option>
  <option value="0000">thn</option>
  <option value="0000">-</option>
  <?php for ($i=1940; $i <= 2020; $i++) { if ($i == $outyear){ $selectyear ="selected";
		} else {        
		$selectyear="";}
        echo ("<option value=\"$i\" $selectyear>$i</option>"."\n");}
        ?>
</select></td>
  </tr>
<tr>
  <td>Di gereja</td>
  <td><select name="gereja" id="gereja">
	<? 
	   if (($_GET['action'] == "update")){
	   $rs=mysql_query("select * from tbl_pernikahan WHERE id_pernikahan='$idpernikahan'");
	   while($rows = mysql_fetch_array($rs)){
	   echo "<option value=$rows[gereja]>$rows[gereja]</option>";
	   $res=mysql_query("select * from tbl_gereja ORDER BY id_gereja DESC");
	   while($rowss = mysql_fetch_array($res)){
	   echo "<option value=$rowss[nama]>$rowss[nama]</option>";
	   }}} else {
	   echo "<option value='-'>-</option>";
	   $res=mysql_query("select * from tbl_gereja ORDER BY id_gereja DESC");
	   while($rowss = mysql_fetch_array($res)){
	   echo "<option value=$rowss[nama]>$rowss[nama]</option>";
	   }}
	 ?>
  </select>  </td>
  </tr>
<tr>
  <td>Oleh Pendeta </td>
  <td><input type="text" name="pendeta" size="35" value="<?php echo $pendeta; ?>" /></td>
</tr>
<tr>
  <td colspan="2">&nbsp;</td>
  </tr>
<tr>
  <td valign="top">Catatan Sipil</td>
  <td><label><input type="radio" name="catatansipil" value="Sudah" 
  <? if ($catatansipil=="Sudah") { echo"checked='checked'";} ?>/>Sudah</label><br />
  <label><input type="radio" name="catatansipil" value="Belum" 
  <? if ($catatansipil=="Belum") { echo"checked='checked'";} ?>/>Belum</label> <br />
  <label><input type="radio" name="catatansipil" value="Tanpa Keterangan" 
  <? if ($catatansipil=="Tanpa Keterangan") { echo"checked='checked'";} ?>/>Tanpa Keterangan</label><br /></td>
</tr>
<tr>
  <td>No. Surat</td>
  <td><input type="text" id="nosurat" name="nosurat" value="<?php echo $nosurat; ?>"  size="45"/></td>
  </tr>

<tr><td colspan="2"><input type="submit" value="<?php echo $status; ?>" /> | <a href="../central_gkj/main.php?adm=in_data&status=pernikahan"><input type="reset" name="reset" value="Tambah baru" /></a></td></tr>
</table>
<input type="hidden" name="action" value="<?php echo $action; ?>" />
</form></td>
   <td width="174" valign="top"><br />
    Atribut Data Pernikahan
      <hr color="#CCCCCC" width="75%" size="1" align="left"/>
      <? if ($_GET['status'] == "pernikahan"){include"atribut_gereja.php";}
	     else { echo "";} ?></td>
  </tr>
</table>
