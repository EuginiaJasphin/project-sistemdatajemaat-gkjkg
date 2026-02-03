<?php 
include_once("../include/config.php");
  
    $action="add_pendidikan";
	$judul="Data Pendidikan Jemaat GKJ Jogja Selatan";
	$status="Submit";
	if(isset($_GET['action']) and $_GET['action']=="update" and !empty($_GET['id']))
	{
		$str="select * from tbl_pendidikan where id_jemaat ='$_GET[id]' AND jenjangpend='$_GET[pend]' ";
		$res=mysql_query($str) or die("query gagal dijalankan");
		$data=mysql_fetch_assoc($res);
		$idpendidikan=$data['id_pendidikan'];
		$idjemaat=$data['id_jemaat'];
		$jenjangpend=$data['jenjangpend'];
		$namasekolah=$data['namasekolah'];
		$thnlulus=$data['thnlulus'];
		$tempat=$data['tempat'];
		$gelar=$data['gelar'];
		$pendkhusus=$data['pendkhusus'];
		$action="update";
		$readonly="readonly=readonly";
		$status="Update";
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
      url: "page_pendidikan.php",
      type: "GET",
      data: dataString,
  		success:function(data)
  		{
  			$('#Pendidikan').html(data);
  		}
    });
  }

  $("form#formpendidikan").submit(function(){
    if (confirm("Apakah benar akan menyimpan data Pendidikan Jemaat?")){
      var vNamaSekolah = $("input#namasekolah").val();
      var vThnLulus = $("input#thnlulus").val();
      var myRegExp=/[0-9]+$/;
      
      // cek validasi form dahulu, semua field data harus diisi
      if ((vNamaSekolah.replace(/\s/g,"") == "") || (vThnLulus.replace(/\s/g,"") == "")) {
        alert("Mohon melengkapi semua field data!");
        $("input#jenjangpend").focus();
        return false;
      }
      // cek validasi no handphone
      else if (!myRegExp.test(vThnLulus)){
        alert ('Tahun Lulus harus diisi dengan angka');
        $("input#thnlulus").focus();
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
<form method="post" name="formpendidikan" action="" id="formpendidikan" enctype="multipart/form-data">
<table width="860">
<tr><th colspan="2"><b><?php echo $judul; ?></b></th></tr>
<?php if ($_GET['action'] == "update"){?> <!-- //jika update maka textfield ID jemaat ditampilkan -->
<tr><td width="173">ID jemaat</td>
<td><input type="text" id="idjemaat" name="idjemaat" size="10" <?php echo $readonly;?> value="<?php echo $idjemaat;?>" /></td></tr>
<?php }?>
<tr>
  <td colspan="2"><br></td>
  </tr>
<tr>
  <td height="36" colspan="2" align="center">Data Riwayat Sekolah </td>
  </tr>

<tr>
  <td valign="top">Nama Jemaat </td>
  <td>
  <?php 
  if ($_GET['action'] == "update")
  { 
  $rs=mysql_query("select * from tbl_jemaat WHERE id_jemaat='$_GET[id]' ");
  while($r = mysql_fetch_array($rs)){
  echo "<b>$r[nama_jemaat]</b>";}
  }else{
  echo"<select name='idjemaat' id='idjemaat'>";
  $str="select * from tbl_jemaat WHERE ket='$_SESSION[wilayah]' ORDER BY nama_jemaat ASC";
  $result=mysql_query($str);
  while($row = mysql_fetch_array($result)){
  echo "<option value=$row[id_jemaat]>$row[nama_jemaat]</option>";
  }}?></select><input type="hidden" name="idpendidikan" value="<?= $idpendidikan; ?>" /></td>
</tr>
<tr>
  <td valign="top">Jenjang Pendidikan </td>
  <td><select name="jenjangpend" id="jenjangpend">
	<? if ($_GET['action'] == "update")
     { echo "<option value=$jenjangpend>$jenjangpend</option>";
	 echo "<option value=SD>SD</option>";
     echo "<option value=SMP>SMP</option>";
     echo "<option value=SMA>SMA</option>";
     echo "<option value=D1>D1</option>";
     echo "<option value=D2>D2</option>";
     echo "<option value=D3>D3</option>";
     echo "<option value=S1>S1</option>";
     echo "<option value=S2>S2</option>";
     echo "<option value=S3>S3</option>";
     echo "<option value=Tidak ada data>Tidak ada data</option>";
	 } else {
	 echo "<option value=Tidak ada data>Tidak ada data</option>";
	 echo "<option value=SD>SD</option>";
     echo "<option value=SMP>SMP</option>";
     echo "<option value=SMA>SMA</option>";
     echo "<option value=D1>D1</option>";
     echo "<option value=D2>D2</option>";
     echo "<option value=D3>D3</option>";
     echo "<option value=S1>S1</option>";
     echo "<option value=S2>S2</option>";
     echo "<option value=S3>S3</option>";
	} ?>
  </select></td>
  </tr>
<tr>
  <td valign="top">Nama Sekolah </td>
  <td><label>
    <input type="text" name="namasekolah" id="namasekolah" size="40" value="<?php echo $namasekolah; ?>">
  </label></td>
  </tr>
<tr>
  <td valign="top">Thn. Lulus </td>
  <td><input type="text" name="thnlulus" size="10" id="thnlulus" value="<?php echo $thnlulus;?>"/></td>
  </tr>
<tr>
  <td valign="top">Di</td>
  <td><input type="text" name="tempat" size="30" id="tempat" value="<?php echo $tempat;?>"/></td>
  </tr>
<tr>
  <td valign="top">Gelar</td>
  <td><input type="text" name="gelar" size="20" id="gelar" value="<?php echo $gelar;?>"/></td>
  </tr>
<tr>
  <td colspan="2" valign="top">&nbsp;</td>
  </tr>
<tr>
  <td>Pendidikan Khusus </td>
  <td><input type="text" name="pendkhusus" id="pendkhusus" size="40" value="<?php echo $pendkhusus;?>"></td>
</tr>
<tr><td colspan="2"><input type="submit" value="<?php echo $status; ?>" /> | <a href="../central_gkj/main.php?adm=in_data&status=pendidikan"><input type="reset" name="reset" value=" Tambah baru" /></a> 
<? $aksi=$_REQUEST['aksi'];
if ($aksi=='anak'){
echo "| <a href=?adm=in_data&amp;status=pekerjaan&amp;aksi=anak><b>data pekerjaan anak</b></a> >>";} else {}?></td></tr>
</table>
<input type="hidden" name="action" value="<?php echo $action; ?>" />
</form>