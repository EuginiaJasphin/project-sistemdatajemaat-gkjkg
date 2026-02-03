<?php 
include_once("../include/config.php");
  
$action="add_pekerjaan";
	$judul="Data Pekerjaan Jemaat GKJ Jogja Selatan";
	$status="Submit";
	if(isset($_GET['action']) and $_GET['action']=="update" and !empty($_GET['id']))
	{
		$str="select * from tbl_pekerjaan where id_jemaat = '$_GET[id]'";
		$res=mysql_query($str) or die("query gagal dijalankan");
		$data=mysql_fetch_assoc($res);
		$idjemaat=$data['id_jemaat'];
		$jenispekerjaan=$data['jenispekerjaan'];
		$tempatkerja=$data['tempatkerja'];
		$alamatkerja=$data['alamatkerja'];
		$jabatan=$data['jabatan'];
		$notelp=$data['notelp'];
		$action="update_kerja";
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
      url: "page_pekerjaan.php",
      type: "GET",
      data: dataString,
  		success:function(data)
  		{
  			$('#Pekerjaan').html(data);
  		}
    });
  }

  $("form#formpekerjaan").submit(function(){
    if (confirm("Apakah benar akan menyimpan data Jemaat?")){
      var vTempatkerja = $("input#tempatkerja").val(); //mengambil id dari input
      var vAlamatkerja = $("input#alamatkerja").val();
      var vNotelp = $("input#notelp").val();
      var myRegExp=/[0-9]+$/;
      
      // cek validasi form dahulu, semua field data harus diisi
      if ((vTempatkerja.replace(/\s/g,"") == "") || (vAlamatkerja.replace(/\s/g,"") == "") || (vNotelp.replace(/\s/g,"") == "")) {
        alert("Mohon melengkapi semua field data!");
        $("input#tempatkerja").focus();
        return false;
      }
      // cek validasi no handphone
      else if (!myRegExp.test(vNotelp)){
        alert ('No telepon harus diisi dengan angka');
        $("input#notelp").focus();
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
<form method="post" name="formpekerjaan" action="" id="formpekerjaan">
<table width="860">
<tr><th colspan="6"><b><?php echo $judul; ?></b></th></tr>
<?php if ($_GET['action'] == "update"){?> <!-- //jika update maka textfield ID jemaat ditampilkan -->
<tr>
  <td width="192">ID Jemaat </td>
  <td colspan="5"><input type="text" id="idjemaat" name="idjemaat" size="10" <?php echo $readonly;?> value="<?php echo $idjemaat;?>" /></td>
</tr>
<tr>
  <td colspan="6">&nbsp;</td>
  </tr>
<?php }?>
<tr>
  <td>Nama Jemaat </td>
  <td colspan="3"><?php 
  if ($_GET['action'] == "update")
  { 
  $rs=mysql_query("select * from tbl_jemaat WHERE id_jemaat='$idjemaat'");
  while($r = mysql_fetch_array($rs)){
  echo "<b>$r[nama_jemaat]</b>";}
  }else{
  echo"<select name='idjemaat' id='idjemaat'>";
  $str="select * from tbl_jemaat WHERE ket='$_SESSION[wilayah]' ORDER BY nama_jemaat ASC";
  $result=mysql_query($str);
  while($row = mysql_fetch_array($result)){
  echo "<option value=$row[id_jemaat]>$row[nama_jemaat]</option>";
  }}?></select></td>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
</tr>
<tr>
  <td>Jenis Pekerjaan </td>
  <td colspan="3"><label>
  <input type="radio" name="jenispekerjaan" value="PNS" 
  <? if ($jenispekerjaan=="PNS") { echo"checked='checked'";} ?>>PNS</label><BR>
  <label><input type="radio" name="jenispekerjaan" value="TNI/POLRI"
  <? if ($jenispekerjaan=="TNI/POLRI") { echo"checked='checked'";} ?>>TNI/POLRI</label><BR>
  <label><input type="radio" name="jenispekerjaan" value="Wiraswasta" 
  <? if ($jenispekerjaan=="Wiraswasta") { echo"checked='checked'";} ?>>Wiraswasta</label><BR>
  <label><input type="radio" name="jenispekerjaan" value="Karyawan Swasta"
  <? if ($jenispekerjaan=="Karyawan Swasta") { echo"checked='checked'";} ?>>Karyawan swasta/ Profesional</label></td>
  <td width="228"><label>
  <input type="radio" name="jenispekerjaan" value="Buruh-tani"
  <? if ($jenispekerjaan=="Buruh-tani") { echo"checked='checked'";} ?>>Buruh-tani</label><BR>
  <label><input type="radio" name="jenispekerjaan" value="Pensiun"
  <? if ($jenispekerjaan=="Pensiun") { echo"checked='checked'";} ?>>Pensiun</label><BR>
  <label><input type="radio" name="jenispekerjaan" value="Tidak Bekerja"
  <? if ($jenispekerjaan=="Tidak Bekerja") { echo"checked='checked'";} ?>>Tidak Bekerja</label><BR>
  <label><input type="radio" name="jenispekerjaan" value="No data"
  <? if ($jenispekerjaan=="No data") { echo"checked='checked'";} ?>></label>
  Tanpa Keterangan </td>
  <td width="186">&nbsp;</td>
</tr>
<tr>
  <td colspan="6">&nbsp;</td>
  </tr>
<tr>
  <td>Nama tempat bekerja </td>
  <td colspan="5"><label>
    <input type="text" id="tempatkerja" name="tempatkerja" value="<?php echo $tempatkerja;?>" />
  </label></td>
</tr>
<tr>
  <td>Alamat tempat bekerja </td>
  <td colspan="5"><input type="text" id="alamatkerja" name="alamatkerja" value="<?php echo $alamatkerja;?>" /></td>
</tr>
<tr>
  <td>Jabatan</td>
  <td colspan="5"><input type="text" id="jabatan" name="jabatan" value="<?php echo $jabatan;?>" /></td>
</tr>
<tr>
  <td>No. telp. tempat kerja </td>
  <td colspan="5"><input type="text" id="notelp" name="notelp" size="20" maxlength="15" value="<?php echo $notelp;?>" /></td>
</tr>
<tr><td colspan="6"><input type="submit" value="<?php echo $status; ?>" /> | <a href="../central_gkj/main.php?adm=in_data&status=pekerjaan"><input type="reset" name="reset" value="Tambah baru" /></a></td></tr>
</table>
<input type="hidden" name="action" value="<?php echo $action; ?>" />
</form>