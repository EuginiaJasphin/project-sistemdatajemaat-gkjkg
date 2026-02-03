<?php 
include_once("../include/config.php");
  
$action="add_meninggal";
	$judul="Data Jemaat Meninggal Dunia GKJ Jogja Selatan";
	$status="Submit";
	if(isset($_GET['action']) and $_GET['action']=="update" and !empty($_GET['id']))
	{
		$str="select * from tbl_meninggal where id_jemaat = '$_GET[id]'";
		$res=mysql_query($str) or die("query gagal dijalankan");
		$data=mysql_fetch_assoc($res);
		$idjemaat=$data['id_jemaat'];
		$tanggal=$data['tanggal'];
		$sebab=$data['sebab'];
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
      url: "page_ninggal.php",
      type: "GET",
      data: dataString,
  		success:function(data)
  		{
  			$('#Meninggal').html(data);
  		}
    });
  }

  $("form#formeninggal").submit(function(){
    if (confirm("Apakah benar akan menyimpan data Jemaat Meninggal?")){
      var vIDjemaat = $("select#id_jemaat").val(); //mengambil id dari input
      
      // cek validasi form dahulu, semua field data harus diisi
      if (vIDjemaat.replace(/\s/g,"") == ""){
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
<form method="post" name="formeninggal" action="" id="formeninggal">
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
      <td width="17%">Nama</td>
      <td width="83%"><select name="id_jemaat" id="id_jemaat">
        <option value="">- nama jemaat -</option>
        <? $str="select * from tbl_jemaat WHERE ket='$_SESSION[wilayah]' ORDER BY id_jemaat DESC";
         $result=mysql_query($str);
         while($row = mysql_fetch_array($result)){
         echo "<option value=$row[id_jemaat]>$row[nama_jemaat]</option>";
        }?>
      </select></td>
    </tr>
    <tr>
      <td>Tanggal</td>
      <td><select name="tanggal">
        <option>tgl</option>
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
  <option value="bln">bln</option>
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
  <option value="thn">thn</option>
  <?php for ($i=1940; $i <= 2020; $i++) { if ($i == $outyear){ $selectyear ="selected";
		} else {        
		$selectyear="";}
        echo ("<option value=\"$i\" $selectyear>$i</option>"."\n");}
        ?>
</select></td>
    </tr>
    <tr>
      <td>Sebab Meninggal </td>
      <td><textarea id="sebab" name="sebab" cols="40" value="" /></textarea></td>
    </tr>
    <tr>
      <td colspan="2"><input name="submit" type="submit" value="<?php echo $status; ?>" /> | <a href="../central_gkj/main.php?adm=in_data2&status=datadiri"><input type="reset" name="reset" value="Tambah baru" /></a></td>
    </tr>
  </table>
  <input type="hidden" name="action" value="<?php echo $action; ?>" />
</form>