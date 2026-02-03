<?php 
session_start();

include_once("../include/config.php");
  
    $action="add_datadiri";
	$judul="Data Jemaat GKJ Jogja Selatan";
	$status="Submit";
	if(isset($_GET['action']) and $_GET['action']=="update" and !empty($_GET['id']))
	{
		$str="select * from tbl_jemaat where id_jemaat = '$_GET[id]'";
		$res=mysql_query($str) or die("query gagal dijalankan");
		$data=mysql_fetch_assoc($res);
		$id_jemaat=$data['id_jemaat'];
		$foto=$data['foto'];
		$stat=$data['status'];
		$nama=$data['nama_jemaat'];
		$nama_panggilan=$data['nama_panggilan'];
		$ttl=$data['ttl'];
		$tgl=$data['tgl'];
		$bln=$data['bln'];
		$thn=$data['thn'];
		$jkel=$data['jkel'];
		$goldarah=$data['goldarah'];
		$alamat=$data['alamat'];
		$kelurahan=$data['kelurahan'];
		$kecamatan=$data['kecamatan'];
		$kota=$data['kota'];
		$provinsi=$data['provinsi'];
		$pendterakhir=$data['pendterakhir'];
		$pasangan=$data['pasangan'];
		$nohp=$data['no_hp'];
		$telp=$data['telp'];
		$email=$data['email'];
		$pernikahan=$data['pernikahan'];
		$anak=$data['anak'];
		$hobby=$data['hobby'];
		$minat=$data['minat'];
		$m_pelayanan=$data['m_pelayanan'];
		$wil=$data['ket'];
		$nokk=$data['nokk'];
		$action="update_jemaat";
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
      url: "page_data.php",
      type: "GET",
      data: dataString,
  		success:function(data)
  		{
  			$('#divPageData').html(data);
  		}
    });
  }

  $("form#formjemaat").submit(function(){
    if (confirm("Apakah benar akan menyimpan data Jemaat?")){
      var vNama = $("input#namajemaat").val();
	  var vTanggal = $("input#datepicker").val();
      var vAlamat = $("input#alamat").val();
      var vNoHP = $("input#nohp").val();
	  var vKode = $("input#kode").val();
      var myRegExp=/[0-9]+$/;
      
      // cek validasi form dahulu, semua field data harus diisi
      if ((vNama.replace(/\s/g,"") == "") || (vAlamat.replace(/\s/g,"") == "") || (vNoHP.replace(/\s/g,"") == "")) {
        alert("Mohon melengkapi semua field data, cek nama, alamat dan no HP!");
        $("input#namajemaat").focus();
        return false;
      }
      // cek validasi no handphone
      else if (!myRegExp.test(vNoHP)){
        alert ('No handphone harus diisi dengan angka');
        $("input#nohp").focus();
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
  $('#tbljemaat tr:even:not(#nav):not(#total)').addClass('even');
  $('#tbljemaat tr:odd:not(#nav):not(#total)').addClass('odd');
  
	$("a.edit").click(function(){
		page=$(this).attr("href");
		$("#divFormContent").load(page); // me-load formjemaat untuk melakukan edit data
		$("#divFormContent").show();
		$("#btnhide").show();
		return false;
	});
	
	$("a.delete").click(function(){
		el=$(this);
		if(confirm("Apakah benar akan menghapus data jemaat ini?"))
		{
			$.ajax({
				url:$(this).attr("href"), 
				type:"GET",
				dataType: 'json', //respon yang diminta dalam format JSON
				success:function(response)
				{
					if(response.status == 1){
						loadData();
						$("#divFormContent").load("up_formjemaat.php");
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
<script src="../js/FormManager.js">
/****************************************************
* Form Dependency Manager- By Twey- http://www.twey.co.uk
* Visit Dynamic Drive for this script and more: http://www.dynamicdrive.com
****************************************************/
</script>

<script type="text/javascript">
window.onload = function() {
    setupDependencies('formjemaat'); //name of form(s). Seperate each with a comma (ie: 'weboptions', 'myotherform' )
  };
</script>
<form method="post" name="formjemaat" action="" id="formjemaat" enctype="multipart/form-data">
  <table width="860">
    <tr>
      <th colspan="6"><b><?php echo $judul; ?></b></th>
    </tr>
    <?php if ($_GET['action'] == "update"){?>
    <!-- //jika update maka textfield ID jemaat ditampilkan -->
    <tr>
      <td width="23%">ID jemaat</td>
      <td colspan="4"><input type="text" id="idjemaat" name="idjemaat" size="10" <?php echo $readonly;?> value="<?php echo $id_jemaat;?>" /></td>
	  <td rowspan="5"><img src="../images/foto/<?php if ($foto==''){echo "no_image.png";} {echo $foto;} ?>" width="120" height="150"></td>
    </tr>
    <?php }?>
    <tr>
      <td height="22">&nbsp;</td>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td>Ambil Foto </td>
      <td colspan="4">
	  <? if ($_GET['action'] == "update")
      { 
	    echo "<select name=foto>";
	    echo "<option value=$foto>$foto</option>";
		$str='select * from tbl_foto ORDER BY id_foto DESC';
        $result=mysql_query($str);
        while($row = mysql_fetch_array($result)){
        echo "<option value=$row[nama_foto]>$row[nama_foto]</option>";
		
        }echo "</select>";
      }else 
	  {
	    echo "<select name=foto id=foto/>";
	    echo "<option value=$foto>$foto</option>";
        $str='select * from tbl_foto ORDER BY id_foto DESC';
        $result=mysql_query($str);
        while($row = mysql_fetch_array($result)){
        echo "<option value=$row[nama_foto]>$row[nama_foto]</option>";
        }
		echo"</select>";}
      ?> , Silahkan klik <a href="upload.php">upload foto</a> jika belum ada </td>
    </tr>
    <tr>
      <td>Status Anggota </td>
      <td colspan="4"><label>
        <select name="status">
		<option value="<?= $stat; ?>"><?= $stat; ?></option>
		<option value="aktif">aktif</option>
		<option value="tidak aktif">tidak aktif</option>
        </select>
        <input type="hidden" name="kode" value="<? echo $_SESSION['level']; ?><? echo $_SESSION['wilayah']; ?>" />
        <?php if ($_GET['action'] == "update"){?>
        <input type="hidden" name="wil" value="<? echo $wil; ?>" />
        <? } else { ?>
        <input type="hidden" name="wil" value="<? echo $_SESSION['wilayah'];?>" /><? }?>
</label></td>
	</tr>
    <tr>
      <td>Nama Jemaat</td>
      <td colspan="4"><input type="text" id="namajemaat" name="namajemaat" size="30" value="<?php echo $nama;?>" /></td>
    </tr>
    <tr>
      <td>Nama Panggilan </td>
      <td colspan="5"><input type="text" id="namapanggilan" name="namapanggilan" size="30" maxlength="25" value="<?php echo $nama_panggilan;?>" /></td>
    </tr>
    <tr>
      <td>TTL</td>
      <td colspan="5"><input type="text" id="ttl" name="ttl" size="30" maxlength="25"  value="<?php echo $ttl;?>" />
      ,  <select name="tanggal">
	  <option value="<?=$tgl; ?>"><?=$tgl; ?></option>
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
  <option value="<?=$bln; ?>"><?=$bln; ?></option>
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
<option value="<?=$thn; ?>"><?=$thn; ?></option>
  <option value="thn">thn</option>
  <?php for ($i=1930; $i <= 2020; $i++) { if ($i == $outyear){ $selectyear ="selected";
		} else {        
		$selectyear="";}
        echo ("<option value=\"$i\" $selectyear>$i</option>"."\n");}
        ?>
</select></td>
    </tr>
    <tr>
      <td>Jenis Kelamin &amp; Pernikahan </td>
      <td colspan="5"><p>
    <label>
    <input type="radio" name="jkel" value="L" 
	<? if ($jkel=="L") { echo"checked='checked'";} ?>/>Laki-laki</label>
    <label><input type="radio" name="jkel" value="P" 
	<? if ($jkel=="P") { echo"checked='checked'";} ?>>Perempuan  | </label>
    <label><input type="checkbox" name="pernikahan2" class="CONFLICTS WITH pernikahan3 AND DEPENDS ON jkel BEING P OR jkel BEING L" value="menikah" <? if ($pernikahan=="menikah") { echo"checked='checked'";} ?>>Menikah</label>
    <label> | Dengan 
    <select name="pasangan" class="DEPENDS ON jkel BEING P AND DEPENDS ON pernikahan2 AND CONFLICTS WITH pasangan2 BEING janda">
	  <?
	  $str="select * from tbl_jemaat WHERE id_jemaat='$pasangan'";
       $result=mysql_query($str);
       while($row = mysql_fetch_array($result)){
       echo "<option value=$row[id_jemaat]>$row[nama_jemaat]</option>";
       }?></option>
	<option value="">- pilih pasangan -</option>
	<? $str="select * from tbl_jemaat WHERE jkel='L' AND ket='$_SESSION[wilayah]' ORDER BY nama_jemaat ASC";
       $result=mysql_query($str);
       while($row = mysql_fetch_array($result)){
       echo "<option value=$row[id_jemaat]>$row[nama_jemaat]</option>";
       }?></select></label>
	   
	   <label>
		/
		<input type="checkbox" name="pasangan2" class="DEPENDS ON jkel BEING P AND DEPENDS ON pernikahan2" value="janda" <? if ($pasangan=="janda") { echo"checked='checked'";} ?>>
		Janda</label>
	   <label>
		/<input type="checkbox" name="pasangan2" class="DEPENDS ON jkel BEING L AND DEPENDS ON pernikahan2" value="duda" <? if ($pasangan=="duda") { echo"checked='checked'";} ?>>
		Duda</label>
       <label> 
       <input type="checkbox" name="pernikahan3" 
	   class="DEPENDS ON jkel BEING L OR jkel BEING P AND CONFLICTS WITH pernikahan2" value="Belum menikah"
	   <? if ($pernikahan=="Belum menikah") { echo"checked='checked'";} ?>>Belum menikah</label>
	   <label>| No.KK
	   <input type="text" readonly="readonly" name="nokk" class="DEPENDS ON jkel BEING L OR pasangan2 BEING janda AND CONFLICTS WITH pernikahan3" value="<? 
	   if ($_GET['action'] == "update"){
	   echo $nokk;
	   } else {
	   $str="select * from tbl_jemaat WHERE anak='KK' AND ket='$_SESSION[wilayah]' ORDER BY id_jemaat DESC LIMIT 0,1";
       $result=mysql_query($str);
       while($row = mysql_fetch_array($result)){
       $kkterakhir=$row['nokk'];
	   $nokk=$kkterakhir+1;
	   if ($nokk<=99){
	   echo "0";echo $nokk;}else
	   {echo $nokk;}}}
	   ?>" size="20"/>
	   </label>
	  </p>
	<?php if ($_GET['action'] == "update"){
	echo "<b><i>*) Untuk Data Laki-laki yang sudah menikah, Biarkan saja : - Pilih Pasangan - ";}?>	</td>
    </tr>
    <tr>
      <td>Hubungan Keluarga </td>
      <td colspan="5"><select name="hub" id="hub">
	  <option value="<?=$anak; ?>"><?=$anak; ?></option>
	  <option value="">- pilih -</option>
	  <option value="KK">Kepala Keluarga</option>
	  <option value="Isteri">Isteri</option>
	  <option value="anak">Anak</option>
	  </select></td>
    </tr>
    <tr>
      <td>Golongan Darah </td>
      <td colspan="5">
        <select name="goldarah">
                <?php if ($_GET['action'] == "update"){
		echo "<option value='$goldarah'>$goldarah</option>"; }
		?>
		<option value="">-</option>
        <option value="A">A</option>
		<option value="B">B</option>
		<option value="AB">AB</option>
		<option value="O">O</option>
		</select></td>
    </tr>
    <tr>
      <td>Alamat</td>
      <td colspan="5"><input type="text" id="alamat" name="alamat" value="<?php echo $alamat;?>" />
        <?php if ($_GET['action'] == "update"){
		echo "";}
		else {        
		echo "RT<input type='text' name='rt' id='rt' width='30' />RW <input type='text' name='rw' id='rw' width='30'/>";} ?></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td width="14%">Kelurahan
        <label></label></td>
      <td width="17%"><input type="text" name="kelurahan" value="<?php echo $kelurahan;?>"/></td>
      <td width="17%">Kecamatan  </td>
      <td colspan="2"><input type="text" name="kecamatan" value="<?php echo $kecamatan;?>" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>Kota/Kab.</td>
      <td><input type="text" name="kota" value="<?php echo $kota;?>" />      </td>
      <td>Propinsi </td>
      <td colspan="2"><input type="text" name="provinsi" readonly="readonly" value="Yogyakarta" /></td>
    </tr>
    <tr>
      <td>No. Handphone</td>
      <td colspan="5"><input type="text" id="nohp" name="nohp" size="20" maxlength="15" value="<?php echo $nohp;?>" />
        / telp.
        <input type="text" id="telp" name="telp" size="20" value="<?php echo $telp;?>"  /></td>
    </tr>
    <tr>
      <td>Alamat email </td>
      <td colspan="5"><input type="text" name="email" value="<?php echo $email;?>"  /></td>
    </tr>
    <tr>
      <td>Hobby</td>
      <td colspan="5"><input type="text" name="hobby" value="<?= $hobby; ?>" size="40"/></td>
    </tr>
    <tr>
      <td>Minat</td>
      <td colspan="5"><input type="text" name="minat" value="<?= $minat; ?>"/></td>
    </tr>
    <tr>
      <td>Minat Pada Pelayanan </td>
      <td colspan="5"><input type="text" name="m_pelayanan" value="<?= $m_pelayanan; ?>" size="50"/></td>
    </tr>
    <tr>
      <td colspan="6">	</td>
    </tr>
    <tr>
      <td colspan="6"><input name="submit" type="submit" value="<?php echo $status; ?>" /> | <a href="../central_gkj/main.php?adm=in_data&status=datadiri"><input type="reset" name="reset" value="Tambah baru" /></a> 
	  <? if($_GET['action']=='update') {?>| <a href="proses_data.php?action=del_jemaat&id=<?php echo $id_jemaat;?>" class="delete"><input type="reset" name="reset" value="Delete Data" /></a> <? } ?></td>
    </tr>
  </table>
  <input type="hidden" name="action" value="<?php echo $action; ?>" />
</form>