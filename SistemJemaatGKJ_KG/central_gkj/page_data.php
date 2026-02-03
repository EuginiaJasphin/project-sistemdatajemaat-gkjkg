<?
session_start();
?>
<script type="text/javascript">

// fungsi ini untuk menampilkan list data jemaat sesuai halaman (page) yang dipilih.
// list data yang ditampilkan disesuaikan juga dengan input data pada bagian search.
function pagination(page){
  var cari = $("input#fieldcari").val();
  var combo = $("select#pilihcari").val();
  
  if (combo == "namapelangan"){
    dataString = 'starting='+page+'&nama='+cari+'&random='+Math.random();
  }
  else if (combo == "idjemaat"){
    dataString = 'starting='+page+'&id='+cari+'&random='+Math.random();
  }
  else{
    dataString = 'starting='+page+'&random='+Math.random();
  }
  
  $.ajax({
    url:"page_data.php",
    data: dataString,
		type:"GET",
		success:function(data)
		{
			$('#divPageData').html(data);
		}
  });
}

// fungsi untuk me-load tampilan list data jemaat, data yang ditampilkan disesuaikan
// juga dengan input data pada bagian search
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
    url: "page_data.php", //file tempat pemrosesan permintaan (request)
    type: "GET",
    data: dataString,
		success:function(data)
		{
			$('#divPageData').html(data);
		}
  });
}
  
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

<?php
// memanfaatkan class pagination dari Reneesh T.K
include_once("../include/config.php");
include_once("pagination_class.php");

    if (isset($_GET['nama']) and !empty($_GET['nama'])){
    $nama = $_GET['nama'];
    $sql = "select * from tbl_jemaat where nama_jemaat like '%$nama%' order by id_jemaat DESC";}
    else if (isset($_GET['id']) and !empty($_GET['id'])){
    $id = $_GET['id'];
    $sql = "select * from tbl_jemaat where id_jemaat = '$id' order by id_jemaat DESC";}
    else{$sql = "select * from tbl_jemaat WHERE  ket LIKE '%$_SESSION[wilayah]%' order by id_jemaat DESC";
    }if(isset($_GET['starting'])){ //starting page
	$starting=$_GET['starting'];}else{
	$starting=0;}

$recpage = 4;//jumlah data yang ditampilkan per page(halaman)
$obj = new pagination_class($sql,$starting,$recpage);		
$result = $obj->result;
?>
<table id="tbljemaat" width="860">
	  <tr>
	  <th width="11%">id </th>
      <th width="30%">Nama Jemaat </th><th width="49%">Alamat</th>
      <th width="10%">Status</th>
      </tr>
		<?php //menampilkan data jemaat
		if(mysql_num_rows($result)!=0){
  		while($row = mysql_fetch_array($result)){ ?>		
        <tr style="font-weight:bold"><td height="32">
		<?php echo $row['id_jemaat']; ?>		</div></td><td>
		<?php echo $row['nama_jemaat']; ?></td><td>
		<?php echo $row['alamat']; ?></td>
		<td><?php echo $row['anak']; ?></td>
	  </tr>
  		
		 <tr id="nav">
		   <td>&nbsp;</td>
		   <td colspan="3" align="right">UPDATE DATA :
	 <? if ($row['anak']=='KK') {?>
	 <a href="up_formjemaat.php?action=update&id=<?= $row['id_jemaat'];?>&fr=datadiri" class="edit">Data Diri</a> |
	 <a href="up_formjemaat.php?action=update&id=<?= $row['id_jemaat'];?>&fr=pdk" class="edit">Pendidikan</a> |
     <a href="up_formjemaat.php?action=update&id=<?= $row['id_jemaat'];?>&fr=pkr" class="edit">Pekerjaan</a> | 
	 <a href="up_formjemaat.php?action=update&id=<?= $row['id_jemaat'];?>&fr=ush" class="edit">Usaha</a> |
     <a href="up_formjemaat.php?action=update&id=<?= $row['id_jemaat'];?>&fr=pnk" class="edit">Pernikahan</a> |
	 <a href="up_formjemaat.php?action=update&id=<?= $row['id_jemaat'];?>&fr=ank" class="edit">Anak-anak</a> |
     <a href="up_formjemaat.php?action=update&id=<?= $row['id_jemaat'];?>&fr=bab" class="edit">Babtis,Astesi,Sidi</a>
	 <? } elseif ($row['anak']=='Isteri') {?>
	 <a href="up_formjemaat.php?action=update&id=<?= $row['id_jemaat'];?>&fr=datadiri" class="edit">Data Diri</a> |
	 <a href="up_formjemaat.php?action=update&id=<?= $row['id_jemaat'];?>&fr=pdk" class="edit">Pendidikan</a> |
     <a href="up_formjemaat.php?action=update&id=<?= $row['id_jemaat'];?>&fr=pkr" class="edit">Pekerjaan</a> |
     <a href="up_formjemaat.php?action=update&id=<?= $row['id_jemaat'];?>&fr=bab" class="edit">Babtis,Astesi,Sidi</a>
	 <? } elseif (($row['anak']=='anak')||($row['anak']=='cucu')) {?>
	 <a href="up_formjemaat.php?action=update&id=<?= $row['id_jemaat'];?>&fr=annk" class="edit">Data Diri</a> |
	 <a href="up_formjemaat.php?action=update&id=<?= $row['id_jemaat'];?>&fr=pdk" class="edit">Pendidikan</a> |
     <a href="up_formjemaat.php?action=update&id=<?= $row['id_jemaat'];?>&fr=pkr" class="edit">Pekerjaan</a> |
     <a href="up_formjemaat.php?action=update&id=<?= $row['id_jemaat'];?>&fr=bab" class="edit">Babtis,Astesi,Sidi</a>
	 <? }?></td>
  </tr><?php } //end while ?>
		 <tr id="nav"><td colspan="4"><?php echo $obj->anchors; ?></td>
		 </tr>
	    <tr id="total"><td colspan="4"><?php echo $obj->total; ?></td></tr>
       <?php }else{?>
    <tr><td align="center" colspan="4">Data tidak ditemukan!</td></tr>
    <?php }?>
</table>

	
