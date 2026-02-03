<?php 
include_once("../include/config.php");
  
$action="add_keluar";
	$judul="Data Jemaat Atestasi Keluar GKJ Jogja Selatan";
	$status="Submit";
	if(isset($_GET['action']) and $_GET['action']=="update" and !empty($_GET['id']))
	{
		$str="select * from tbl_atestasi where id_jemaat = '$_GET[id]'";
		$res=mysql_query($str) or die("query gagal dijalankan");
		$data=mysql_fetch_assoc($res);
		$idjemaat=$data['id_jemaat'];
		$nosurat=$data['nosurat'];
		$tanggal=$data['tanggal'];
		$alasan=$data['alasan'];
		$action="update";
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
      url: "page_keluar.php",
      type: "GET",
      data: dataString,
  		success:function(data)
  		{
  			$('#divPageDataKeluar').html(data);
  		}
    });
  }

  $("form#formkeluar").submit(function(){
    if (confirm("Apakah benar akan menyimpan data Jemaat?")){
      var vNoSurat = $("input#nosurat").val(); //mengambil id dari input
      var vIDjemaat = $("select#id_jemaat").val();
      var vAlasan = $("textarea#alasan").val();
      
      // cek validasi form dahulu, semua field data harus diisi
      if ((vNoSurat.replace(/\s/g,"") == "") || (vIDjemaat.replace(/\s/g,"") == "") || (vAlasan.replace(/\s/g,"") == "")) {
        alert("Mohon melengkapi semua field data!");
        $("input#id_jemaat").focus();
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
<form method="post" name="formkeluar" action="" id="formkeluar">
  <table width="860">
    <tr>
      <th colspan="2"><b><?php echo $judul; ?></b></th>
    </tr>
    <?php if ($_GET['action'] == "update"){?>
    <!-- //jika update maka textfield ID jemaat ditampilkan -->
    <?php }?>
    <tr>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td>No Surat </td>
      <td><input type="text" id="nosurat" name="nosurat" size="30" maxlength="25" value="" /></td>
    </tr>
    <tr>
      <td width="22%">Tanggal</td>
      <td width="78%"><input name="tanggal" type="text" id="tanggal" />
      format : tanggal/bulan/tahun, ex : 21/05/1989</td>
    </tr>
    <tr>
      <td>Nomor dan Nama Anggota </td>
      <td><select name="id_jemaat" id="id_jemaat">
        <option value="">- nama jemaat -</option>
        <? $str="select * from tbl_jemaat ORDER BY id_jemaat DESC";
         $result=mysql_query($str);
         while($row = mysql_fetch_array($result)){
         echo "<option value=$row[id_jemaat]>$row[id_jemaat] - $row[nama_jemaat]</option>";
        }?>
      </select></td>
    </tr>
    <tr>
      <td>Alasan</td>
      <td><textarea id="alasan" name="alasan" cols="40" value="" /></textarea></td>
    </tr>
    <tr>
      <td colspan="2"><input name="submit" type="submit" value="<?php echo $status; ?>" /> | <a href="../central_gkj/main.php?adm=in_data3&status=datadiri"><input type="reset" name="reset" value="Tambah baru" /></a></td>
    </tr>
  </table>
  <input type="hidden" name="action" value="<?php echo $action; ?>" />
</form>