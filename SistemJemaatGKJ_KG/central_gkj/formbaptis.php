<?php 
include_once("../include/config.php");
  
    $action="add_babtis";
	$judul="Data Baptis, Atestasi, Sidi dan Penyerahan Anak Jemaat GKJ Jogja Selatan";
	$status="Submit";
	if(isset($_GET['action']) and $_GET['action']=="update" and !empty($_GET['id']))
	{
		$str="select * from tbl_babtis where id_jemaat ='$_GET[id]'";
		$res=mysql_query($str) or die("query gagal dijalankan");
		$data=mysql_fetch_assoc($res);
		$recor=mysql_num_rows($res);
		$idjemaat=$data['id_jemaat'];
		$gerejababtis=$data['gerejababtis'];
		$tanggalbabtis=$data['tanggalbabtis'];
		$nosuratbabtis=$data['nosuratbabtis'];
		$pendetababtis=$data['pendetababtis'];
		$gerejatestasi=$data['gerejatestasi'];
		$tanggalatestasi=$data['tanggalatestasi'];
		$nosurat=$data['nosurat'];
		$gerejasidi=$data['gerejasidi'];
		$tanggalsidi=$data['tanggalsidi'];
		$pendetasidi=$data['pendetasidi'];
		$nosuratsidi=$data['nosuratsidi'];
		$gerejapenyerahan=$data['gerejapenyerahan'];
		$tanggalpenyerahan=$data['tanggalpenyerahan'];
		$pendetapenyerahan=$data['pendetapenyerahan'];
		$action="update_babtis";
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
      url: "page_baptis.php",
      type: "GET",
      data: dataString,
  		success:function(data)
  		{
  			$('#DataBaptis').html(data);
  		}
    });
  }

  $("form#formbabtis").submit(function(){
    if (confirm("Apakah benar akan menyimpan data Jemaat?")){
      var vIDjemaat = $("select#idjemaat").val(); //mengambil id dari input
      
      // cek validasi form dahulu, semua field data harus diisi
      if (vIDjemaat.replace(/\s/g,"") == "") {
        alert("Mohon melengkapi semua field data!");
        $("input#idjemaat").focus();
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

$(function(){ 
  // membuat warna tampilan baris data pada tabel menjadi selang-seling
  $('#tblbaptis tr:even:not(#nav):not(#total)').addClass('even');
  $('#tblbaptis tr:odd:not(#nav):not(#total)').addClass('odd');
  
	$("a.edit").click(function(){
		page=$(this).attr("href");
		$("#divFormContent").load(page); // me-load formjemaat untuk melakukan edit data
		$("#divFormContent").show();
		$("#btnhide").show();
		return false;
	});
	
	$("a.delete").click(function(){
		el=$(this);
		if(confirm("Apakah benar akan menghapus data babtis?"))
		{
			$.ajax({
				url:$(this).attr("href"), 
				type:"GET",
				dataType: 'json', //respon yang diminta dalam format JSON
				success:function(response)
				{
					if(response.status == 1){
						loadData();
						$("#divFormContent").load("formbaptis.php");
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
<? if ($recor==0 AND $action=='update_babtis') { echo "Data Babtis belum ditambahkan, Untuk menambahkan klik <a href='main.php?adm=in_data&status=baptis'>
TAMBAH BABTIS</a> ?"; } else { ?>
<form method="post" name="formbabtis" action="<?php if ($_GET['action'] == "update"){echo "proses_data.php"; }?>" id="formbabtis">
  <table width="860">
    <tr>
      <th colspan="2"><b><?php echo $judul; ?></b></th>
    </tr>
    <?php if ($_GET['action'] == "update"){?>
    <!-- //jika update maka textfield ID jemaat ditampilkan -->
    <tr>
      <td width="17%">ID jemaat</td>
      <td width="83%"><input type="text" id="idjemaat" name="idjemaat" readonly="readonly" value="<?php echo $idjemaat;?>" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <?php }?>
    <tr>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td>Nama Jemaat </td>
      <td><?php 
  if ($_GET['action'] == "update")
  { 
  $rs=mysql_query("select * from tbl_jemaat WHERE id_jemaat='$_GET[id]'");
  while($r = mysql_fetch_array($rs)){
  echo "<b>$r[nama_jemaat]</b>";}
  }else{
  echo"<select name='idjemaat' id='idjemaat'>";
  $str="select * from tbl_jemaat WHERE ket='$_SESSION[wilayah]' ORDER BY id_jemaat DESC";
  $result=mysql_query($str);
  while($row = mysql_fetch_array($result)){
  echo "<option value=$row[id_jemaat]>$row[nama_jemaat]</option>";
  }}?></td>
    </tr>
    <tr>
      <td><br />
<b>Dibaptis</b></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>Di Gereja </td>
      <td><select name="gerejababtis" id="gerejababtis">
        <? 
	   if (($_GET['action'] == "update")){
	   $rs=mysql_query("select B.id_jemaat,B.gerejababtis,G.id_gereja,G.nama from tbl_babtis B, tbl_gereja G WHERE B.id_jemaat='$_GET[id]' AND B.gerejababtis=G.id_gereja 
	   GROUP BY B.id_jemaat");
	   while($rows = mysql_fetch_array($rs)){
	   echo "<option value=$rows[id_gereja]>$rows[nama]</option>";}
	   
	   $res=mysql_query("select * from tbl_gereja ORDER BY nama ASC");
	   while($rowss = mysql_fetch_array($res)){
	   echo "<option value=$rowss[id_gereja]>$rowss[nama]</option>";
	   }} else {
	   echo "<option value='999'>- pilih gereja -</option>";
	   $res=mysql_query("select * from tbl_gereja ORDER BY nama ASC");
	   while($rowss = mysql_fetch_array($res)){
	   	   echo "<option value=$rowss[id_gereja]>$rowss[nama]</option>";
	   }}
	 ?>
      </select></td>
    </tr>
    <tr>
      <td>Tanggal</td>
      <td><input name="tanggalbabtis" type="text" id="tanggalbabtis" value="<?= $tanggalbabtis; ?>"/>
      format : tanggal/bulan/tahun, ex : 21/05/1989 </td>
    </tr>
    <tr>
      <td>Oleh pendeta </td>
      <td><input type="text" name="pendetababtis" id="pendetababtis" size="35" value="<?= $pendetababtis; ?>"/></td>
    </tr>
    <tr>
      <td>No.Surat Babtis </td>
      <td><input type="text" id="nosuratbabtis" name="nosuratbabtis" value="<?= $nosuratbabtis; ?>" size="35"/></td>
    </tr>
    <tr>
      <td colspan="2"><br>
      <b>Sidi</b></td>
    </tr>
    <tr>
      <td>Di gereja</td>
      <td><select name="gerejasidi" id="gerejasidi">
        <? 
	   if (($_GET['action'] == "update")){
	   $rs=mysql_query("select B.id_jemaat,B.gerejasidi,G.id_gereja,G.nama from tbl_babtis B, tbl_gereja G WHERE B.id_jemaat='$_GET[id]' AND B.gerejasidi=G.id_gereja 
	   GROUP BY B.id_jemaat");
	   while($rows = mysql_fetch_array($rs)){
	   echo "<option value=$rows[id_gereja]>$rows[nama]</option>";}
	   
	   $res=mysql_query("select * from tbl_gereja ORDER BY nama ASC");
	   while($rowss = mysql_fetch_array($res)){
	   echo "<option value=$rowss[id_gereja]>$rowss[nama]</option>";
	   }} else {
	   echo "<option value='999'>- pilih gereja -</option>";
	   $res=mysql_query("select * from tbl_gereja ORDER BY nama ASC");
	   while($rowss = mysql_fetch_array($res)){
	   echo "<option value=$rowss[id_gereja]>$rowss[nama]</option>";
	   }}
	 ?>
      </select></td>
    </tr>
    <tr>
      <td>Tanggal</td>
      <td><input name="tanggalsidi" type="text" value="<?= $tanggalsidi; ?>"/>
      format : tanggal/bulan/tahun, ex : 21/05/1989 </td>
    </tr>
    <tr>
      <td>Oleh Pendeta </td>
      <td><input type="text" name="pendetasidi" id="pendetasidi" size="35" value="<?= $pendetasidi; ?>"/></td>
    </tr>
    <tr>
      <td>No.Surat</td>
      <td><input type="text" id="nosuratsidi" name="nosuratsidi" value="<?= $nosuratsidi; ?>" size="35"/></td>
    </tr>
    <tr>
      <td colspan="2"><br><b>Atestasi Masuk</b></td>
    </tr>
    <tr>
      <td> Dari Gereja </td>
      <td><label>
        <select name="gerejatestasi" id="gerejatestasi">
        <? 
	   if (($_GET['action'] == "update")){
	   $rs=mysql_query("select B.id_jemaat,B.gerejatestasi,G.id_gereja,G.nama from tbl_babtis B, tbl_gereja G WHERE B.id_jemaat='$_GET[id]' AND B.gerejatestasi=G.id_gereja 
	   GROUP BY B.id_jemaat");
	   while($rows = mysql_fetch_array($rs)){
	   echo "<option value=$rows[id_gereja]>$rows[nama]</option>";}
	   
	   $res=mysql_query("select * from tbl_gereja ORDER BY nama ASC");
	   while($rowss = mysql_fetch_array($res)){
	   echo "<option value=$rowss[id_gereja]>$rowss[nama]</option>";
	   }} else {
	   echo "<option value='999'>- pilih gereja -</option>";
	   $res=mysql_query("select * from tbl_gereja ORDER BY nama ASC");
	   while($rowss = mysql_fetch_array($res)){
	   echo "<option value=$rowss[id_gereja]>$rowss[nama]</option>";
	   }}
	 ?>
      </select>
      </label></td>
    </tr>
    <tr>
      <td>Tanggal</td>
      <td><input name="tanggalatestasi" type="text" value="<?= $tanggalatestasi; ?>"/>        format : tanggal/bulan/tahun, ex : 21/05/1989 </td>
    </tr>
    <tr>
      <td>No.Surat</td>
      <td><input type="text" id="nosurat" name="nosurat" value="<?= $nosurat; ?>" size="35"/></td>
    </tr>
    <tr>
      <td colspan="2"><br>
        <b>Penyerahan waktu anak-anak </b></td>
    </tr>
    <tr>
      <td>Di Gereja </td>
      <td><select name="gerejapenyerahan" id="gerejapenyerahan">
        <? 
	   if (($_GET['action'] == "update")){
	   $rs=mysql_query("select B.id_jemaat,B.gerejapenyerahan,G.id_gereja,G.nama from tbl_babtis B, tbl_gereja G WHERE B.id_jemaat='$_GET[id]' AND B.gerejapenyerahan=G.id_gereja 
	   GROUP BY B.id_jemaat");
	   while($rows = mysql_fetch_array($rs)){
	   echo "<option value=$rows[id_gereja]>$rows[nama]</option>"; }
	   
	   $res=mysql_query("select * from tbl_gereja ORDER BY nama ASC");
	   while($rowss = mysql_fetch_array($res)){
	   echo "<option value=$rowss[id_gereja]>$rowss[nama]</option>";
	   
	   }} else {
	   echo "<option value='999'>- pilih gereja -</option>";
	   $res=mysql_query("select * from tbl_gereja ORDER BY nama ASC");
	   while($rowss = mysql_fetch_array($res)){
	   echo "<option value=$rowss[id_gereja]>$rowss[nama]</option>";
	   }}
	 ?>
      </select></td>
    </tr>
    <tr>
      <td>Tanggal</td>
      <td><input name="tanggalpenyerahan" type="text" value="<?= $tanggalpenyerahan; ?>"/><input type="hidden" name="action" value="<?php echo $action; ?>" />
      format : tanggal/bulan/tahun, ex : 21/05/1989 </td>
    </tr>
    <tr>
      <td>Oleh Pendeta </td>
      <td><input type="text" name="pendetapenyerahan" size="35" value="<?= $pendetapenyerahan; ?>"/></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" value="<?php echo $status; ?>" /> | <a href="../central_gkj/main.php?adm=in_data&status=baptis"><input type="reset" name="reset" value="Tambah baru" /></a>
	  <? if($_GET['action']=='update') {?>| <a href="proses_data.php?action=del_baptis&idbaptis=<?php echo $idjemaat; ?>" class="delete"><input type="reset" name="reset" value="Delete Data" /></a> <? } ?></td>
    </tr>
  </table>
  
</form>
<? }?>