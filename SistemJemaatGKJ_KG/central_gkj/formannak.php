<?php 

session_start();

include_once("../include/config.php");

  

$action="add_anak";

	$judul="Data Anak-anak Jemaat GKJ Jogja Selatan";

	$status="Submit";

	if(isset($_GET['action']) and $_GET['action']=="update" and !empty($_GET['id']))

	{

		$str="select * from tbl_jemaat where id_jemaat = '$_GET[id]'";

		$res=mysql_query($str) or die("query gagal dijalankan");

		$data=mysql_fetch_assoc($res);

		$idplgn=$data['id_jemaat'];

		$stat=$data['status'];
		
		$namaorangtua=$data['nama_orangtua'];

		$nama=$data['nama_jemaat'];

		$jkel=$data['jkel'];

		$nama_panggilan=$data['nama_panggilan'];

		$ttl=$data['ttl'];$tgl=$data['tgl'];$bln=$data['bln'];$thn=$data['thn'];

		$goldarah=$data['goldarah'];

		$alamat=$data['alamat'];

		$kelurahan=$data['kelurahan'];

		$kecamatan=$data['kecamatan'];

		$kota=$data['kota'];

		$provinsi=$data['provinsi'];

		$pendterakhir=$data['pendterakhir'];

		$anggotagereja=$data['a_gereja'];

		$hobby=$data['hobby'];

		$minat=$data['minat'];

		$m_pelayanan=$data['m_pelayanan'];

		$nohp=$data['no_hp'];$telp=$data['telp'];

		$ket=$data['ket'];

		$anak=$data['anak'];

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

      url: "page_anak.php",

      type: "GET",

      data: dataString,

  		success:function(data)

  		{

  			$('#DataAnak').html(data);

  		}

    });

  }



  $("form#formanak").submit(function(){

    if (confirm("Apakah benar akan menyimpan data Anak-anak Jemaat?")){

      var NamaAnak = $("input#namanak").val();

      var myRegExp=/[0-9]/;

      

      // cek validasi form dahulu, semua field data harus diisi

      if (NamaAnak.replace(/\s/g,"") == "") {

        alert("Mohon melengkapi semua field data!");

        $("input#namanak").focus();

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
<script>
$(function(){ 
  // membuat warna tampilan baris data pada tabel menjadi selang-seling
  $('#tblanak tr:even:not(#nav):not(#total)').addClass('even');
  $('#tblanak tr:odd:not(#nav):not(#total)').addClass('odd');
  
	$("a.edit").click(function(){
		page=$(this).attr("href");
		$("#divFormContent").load(page); // me-load formjemaat untuk melakukan edit data
		$("#divFormContent").show();
		$("#btnhide").show();
		return false;
	});
	
	$("a.delete").click(function(){
		el=$(this);
		if(confirm("Apakah benar akan menghapus data Anak?"))
		{
			$.ajax({
				url:$(this).attr("href"), 
				type:"GET",
				dataType: 'json', //respon yang diminta dalam format JSON
				success:function(response)
				{
					if(response.status == 1){
						loadData();
						$("#divFormContent").load("formanak.php");
						$("#divFormContent").hide();
            $("#btnhide").hide();
            alert("Data berhasil di hapus!");
					}
					else{
						alert("data gagal di hapus!");
					}
				}
			});
		}
		return false;
	});
	
});

</script>
<form method="post" name="formanak" action="" id="formanak">

  <table width="860">

    <tr>

      <th colspan="5"><b><?php echo $judul; ?></b></th>
    </tr>

    <?php if ($_GET['action'] == "update"){?>

    <!-- //jika update maka textfield ID jemaat ditampilkan -->

    <tr>

      <td width="20%">ID jemaat</td>

      <td colspan="4"><input type="text" id="idjemaat" name="idjemaat" size="10" <?php echo $readonly;?> value="<?php echo $idplgn;?>" /></td>
    </tr>

    <?php }?>

    <tr>

      <td>Status Anggota </td>

      <td colspan="4"><select name="status">

        <option value="<?= $stat; ?>">

          <?= $stat; ?>
          </option>

        <option value="aktif">aktif</option>

        <option value="tidak aktif">tidak aktif</option>

      </select></td>

      <?php/*<td>&nbsp;</td> */?>
    </tr>

    <tr>

      <td>Nama Orang tua </td>

      <td colspan="4"><select name="pasangan" id="pasangan">
        <? 

	   if (($_GET['action'] == "update")){
	   $result=mysql_query("select * from tbl_jemaat WHERE id_jemaat='$namaorangtua'");
       while($row = mysql_fetch_array($result)){
	   echo "<option value=$row[id_jemaat]>$row[nama_jemaat]</option>";
	   }

       $result=mysql_query("select * from tbl_jemaat WHERE ket='$_SESSION[wilayah]' AND anak='KK' ORDER BY nama_jemaat ASC");
       while($row = mysql_fetch_array($result)){
	   echo "<option value=$row[id_jemaat]>$row[nama_jemaat]</option>";
       }}
	  
	  else{
	   $result=mysql_query("select * from tbl_jemaat WHERE ket='$_SESSION[wilayah]' AND anak='KK' AND id_jemaat='$_GET[id]' ORDER BY nama_jemaat ASC");
       while($row = mysql_fetch_array($result)){
	   echo "<option value=$row[id_jemaat]>$row[nama_jemaat]</option>";
       }}

	 ?>
      </select>
      <input type="hidden" name="ket" value="<? 

		if ($_GET['action'] == "update"){echo $ket;}

		else { echo $_SESSION['wilayah']; } 

		?>" />

      <input type="hidden" name="kode" value="<? echo $_SESSION['level']; ?>" /></td>

      <?php /*<td><b>Atribut data Anak-anak</b></td>*/?>
    </tr>

    <tr>

      <td>Hubungan Anak </td>

      <td colspan="4"><select name="hubungan">

	  <option value="anak">Anak</option>

	  <option value="cucu">Cucu</option>

	  </select></td>

      <?php /*<td>o <a href="?adm=in_data&amp;status=pendidikan&amp;aksi=anak">data sekolah</a> >> </td> */?>
    </tr>

    <tr>

      <td>Nama Lengkap Anak </td>

      <td colspan="4"><input type="text" id="namanak" name="namanak" size="30"  value="<?= $nama; ?>" /></td>

      <?php /*<td>o <a href="?adm=in_data&amp;status=pekerjaan&amp;aksi=anak">data pekerjaan</a> >> </td>*/?>
    </tr>

    <tr>

      <td>Nama Panggilan </td>

      <td colspan="4"><input type="text" id="nama_panggilan" name="nama_panggilan" size="30"  value="<?= $nama_panggilan; ?>" /></td>
    </tr>

    <tr>

      <td>Jenis Kelamin </td>

<td colspan="4"><label>

<input name="jkel" type="radio" value="L" <? if ($jkel=="L") { echo"checked='checked'";} ?> />Laki-laki </label>

<label><input name="jkel" type="radio" value="P" <? if ($jkel=="P") { echo"checked='checked'";} ?> />Perempuan</label></td>
    </tr>

    <tr>

      <td>TTL</td>

      <td colspan="4"><input type="text" id="tempatlahir" name="tempatlahir" size="30" value="<?= $ttl; ?>" />

   ,

     <select name="tanggal">

	  <option value="<?= $tgl; ?>"><?= $tgl; ?></option>

      <option>tgl</option>

      <?php for ($i=1; $i <= 31; $i++) {

      if ($i == $outdate){ $selectdate ="selected";} else {$selectdate="";

      }echo ("<option value=\"$i\" $selectdate>$i</option>"."\n");}

      ?>
    </select>

/

<select name="bulan">

  <option value="<?= $bln; ?>"><?= $bln; ?></option>

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

  <option value="<?= $thn; ?>"><?= $thn; ?></option>

  <option value="thn">thn</option>

  <?php for ($i=1940; $i <= 2020; $i++) { if ($i == $outyear){ $selectyear ="selected";

		} else {        

		$selectyear="";}

        echo ("<option value=\"$i\" $selectyear>$i</option>"."\n");}

        ?>
</select></td>
    </tr>

    <tr>

      <td>Golongan Darah </td>

      <td colspan="4"><select name="goldarah">

	    <option value="<?= $goldarah; ?>"><?= $goldarah; ?></option>

        <option value="A">A</option>

        <option value="B">B</option>

        <option value="AB">AB</option>

        <option value="O">O</option>

      </select></td>
    </tr>

    <tr>

      <td>Alamat</td>

      <td colspan="4"><input type="text" id="alamat" name="alamat" value="<?php echo $alamat;?>" />

        <?php if ($_GET['action'] == "update"){

		echo "";}

		else {        

		echo "RT<input type='text' name='rt' id='rt' width='30' />RW <input type='text' name='rw' id='rw' width='30'/>";} ?></td>
    </tr>

    <tr>

      <td>&nbsp;</td>

      <td width="9%">Kelurahan </td>

      <td width="26%">: 

      <input type="text" name="kelurahan" value="<?php echo $kelurahan;?>"/></td>

      <td width="11%">Kecamatan </td>

      <td width="34%">: 

      <input type="text" name="kecamatan" value="<?php echo $kecamatan;?>" /></td>
    </tr>

    <tr>

      <td>&nbsp;</td>

      <td>Kota/Kab.</td>

      <td>: 

      <input type="text" name="kota" value="<?php echo $kota;?>" /></td>

      <td>Propinsi </td>

      <td>: 

      <input type="text" name="provinsi" readonly="readonly" value="Yogyakarta" /></td>
    </tr>

    <tr>

      <td>Anggota Gereja </td>

      <td colspan="4"><label>

      <select name="a_gereja">

	<? 

	   if (($_GET['action'] == "update")){

	   $rs=mysql_query("select * from tbl_gereja WHERE id_gereja=$anggotagereja ORDER BY id_gereja ASC");
	   while($rows = mysql_fetch_array($rs)){
	   echo "<option value=$rows[id_gereja]>$rows[nama]</option>";
	   
	   $res=mysql_query("select * from tbl_gereja ORDER BY id_gereja ASC");
	   while($rowss = mysql_fetch_array($res)){
	   echo "<option value=$rowss[id_gereja]>$rowss[nama]</option>";
	   }}} else {

	   $res=mysql_query("select * from tbl_gereja ORDER BY id_gereja ASC");
	   while($rowss = mysql_fetch_array($res)){
	   echo "<option value=$rowss[id_gereja]>$rowss[nama]</option>";
	   }}

	 ?>
      </select>

      </label></td>
    </tr>

    <tr>

      <td>No. Handphone</td>

      <td colspan="4"><input type="text" id="nohp" name="nohp" size="20" value="<?php echo $nohp;?>" />

        / telp.

        <input type="text" id="notelp" name="notelp" size="20"  value="<?php echo $telp;?>" /></td>
    </tr>

    <tr>

      <td>Hobby</td>

      <td colspan="4"><input type="text" name="hobby" value="<?= $hobby; ?>" size="40"/></td>
    </tr>

    <tr>

      <td>Minat</td>

      <td colspan="4"><input type="text" name="minat" value="<?= $minat; ?>"/></td>
    </tr>

    <tr>

      <td>Minat Pada Pelayanan </td>

      <td colspan="4"><input type="text" name="m_pelayanan" value="<?= $m_pelayanan; ?>" size="50"/></td>
    </tr>

    <tr>

      <td colspan="5"><input name="submit" type="submit" value="<?php echo $status; ?>" /> | <a href="../central_gkj/main.php?adm=in_data&status=anak"><input type="reset" name="reset" value="Tambah baru" /></a>
	  <? if($_GET['action']=='update') {?>| <a href="proses_data.php?action=del_anak&idelanak=<?php echo $idplgn;?>" class="delete"><input type="reset" name="reset" value="Delete Data" /></a> <? } ?></td>
    </tr>
  </table>

  <input type="hidden" name="action" value="<?php echo $action; ?>" />

</form>