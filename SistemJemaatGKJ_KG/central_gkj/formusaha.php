<?php
$id_dirijemaat=$_GET['id'];
include_once("../include/config.php");
$action="add_usaha";
	$judul="Data Usaha Keluarga Jemaat";
	$status="Submit";
	if(isset($_GET['action']) and $_GET['action']=="update" and !empty($_GET['id']))
	{
		$str="select * from tbl_usaha where id_pasangan='$_GET[id]'";
		$res=mysql_query($str) or die("query gagal dijalankan");
		$data=mysql_fetch_assoc($res);
		$recor=mysql_num_rows($res);
		$idusaha=$data['id_usaha'];
		$pasangan=$data['id_pasangan'];
		$usaha=$data['usaha'];
		$action="update_usaha";
		$readonly="readonly=readonly";
		$status="Update";
		$judul="Update Data Usaha Jemaat";
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
      url: "page_usaha.php",
      type: "GET",
      data: dataString,
  		success:function(data)
  		{
  			$('#DataUsaha').html(data);
  		}
    });
  }

  $("form#formusaha").submit(function(){
    if (confirm("Apakah benar akan menyimpan data usaha keluarga jemaat?")){
      var vPasangan = $("select#pasangan").val(); //mengambil id dari input
      var vUsaha = $("textarea#usaha").val();
      
      // cek validasi form dahulu, semua field data harus diisi
      if ((vPasangan.replace(/\s/g,"") == "") || (vUsaha.replace(/\s/g,"") == "")) {
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
</script><script>
$(function(){ 
  // membuat warna tampilan baris data pada tabel menjadi selang-seling
  $('#tblusaha tr:even:not(#nav):not(#total)').addClass('even');
  $('#tblusaha tr:odd:not(#nav):not(#total)').addClass('odd');
  
	$("a.edit").click(function(){
		page=$(this).attr("href");
		$("#divFormContent").load(page); // me-load formjemaat untuk melakukan edit data
		$("#divFormContent").show();
		$("#btnhide").show();
		return false;
	});
	
	$("a.delete").click(function(){
		el=$(this);
		if(confirm("Apakah benar akan menghapus data usaha?"))
		{
			$.ajax({
				url:$(this).attr("href"), 
				type:"GET",
				dataType: 'json', //respon yang diminta dalam format JSON
				success:function(response)
				{
					if(response.status == 1){
						loadData();
						$("#divFormContent").load("formusaha.php");
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
<?php if ($recor==0 AND $action=='update_usaha') { echo "Data usaha belum ditambahkan, Untuk menambahkan klik
 <a href='main.php?adm=in_data&status=usaha&actam=in&id=$id_dirijemaat'>
TAMBAH USAHA</a> ?"; } else { ?>
<form method="post" name="formusaha" action="" id="formusaha">
<table width="848">
<tr><th colspan="2"><b><?php echo $judul; ?></b></th></tr>
<?php if ($_GET['action'] == "update"){?> <!-- //jika update maka textfield ID jemaat ditampilkan -->
<?php }?>
<tr>
  <td width="177">Kepala Keluarga</td>
  <td><select name="pasangan" id="pasangan">
	<? 
	   if (($_GET['action'] == "update")){
	   $result=mysql_query("select * from tbl_jemaat WHERE id_jemaat='$pasangan'");
       while($row = mysql_fetch_array($result)){
	   echo "<option value=$row[id_jemaat]>$row[nama_jemaat]</option>";
	   }}
	   
	   else if(($_GET['actam'] == "in")){
	   $result=mysql_query("select * from tbl_jemaat WHERE id_jemaat='$id_dirijemaat'");
       while($row = mysql_fetch_array($result)){
	   echo "<option value=$row[id_jemaat]>$row[nama_jemaat]</option>";
	   }}
	   
	   else{
	   
	   $result=mysql_query("select * from tbl_jemaat WHERE ket='$_SESSION[wilayah]' AND anak='KK' ORDER BY nama_jemaat ASC");
       while($row = mysql_fetch_array($result)){
	   echo "<option value=$row[id_jemaat]>$row[nama_jemaat]</option>";
	   }}
	 ?></select></td>
</tr>
<tr>
  <td>Usaha Keluarga </td>
  <td><textarea name="usaha" id="usaha" cols="50" rows="7"><?php echo $usaha; ?></textarea></td>
</tr>

<tr>
  <td colspan="2">&nbsp;</td>
</tr>
<tr><td colspan="2"><input type="submit" value="<?php echo $status; ?>" /> | <a href="../central_gkj/main.php?adm=in_data&status=usaha"><input type="reset" name="reset" value="Tambah baru" /></a>
<? if($_GET['action']=='update') {?>| <a href="proses_data.php?action=del_usaha&idusaha=<?php echo $idusaha;?>" class="delete"><input type="reset" name="reset" value="Delete Data" /></a> <? } ?></td></tr>
</table>
<input type="hidden" name="action" value="<?php echo $action; ?>" />
</form>
<? }?>