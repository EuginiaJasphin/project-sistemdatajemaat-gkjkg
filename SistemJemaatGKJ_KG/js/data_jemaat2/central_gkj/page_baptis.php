<?
session_start()
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
    url:"page_baptis.php",
    data: dataString,
		type:"GET",
		success:function(data)
		{
			$('#DataBaptis').html(data);
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
    url: "page_baptis.php", //file tempat pemrosesan permintaan (request)
    type: "GET",
    data: dataString,
		success:function(data)
		{
			$('#DataBaptis').html(data);
		}
  });
}
  
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

<?php
// memanfaatkan class pagination dari Reneesh T.K
include_once("../include/config.php");
include_once("pagination_class.php");

   if (isset($_GET['nama']) and !empty($_GET['nama'])){
   $nama = $_GET['nama'];
   $sql = "select * from tbl_jemaat where nama_jemaatlike '%$nama%' order by id_jemaat DESC";}
   
   else if (isset($_GET['id']) and !empty($_GET['id'])){
   $id = $_GET['id'];
   $sql = "select * from tbl_jemaat where id_jemaat= '$id' order by id_jemaat DESC";}
   
   else { $sql = "select * from tbl_babtis WHERE substr(id_jemaat,7,2) like '%$_SESSION[wilayah]%' ORDER BY id_jemaat DESC";
   if(isset($_GET['starting'])){ //starting page
   $starting=$_GET['starting'];}
   
   else{
   $starting=0;}

$recpage = 8;//jumlah data yang ditampilkan per page(halaman)
$obj = new pagination_class($sql,$starting,$recpage);		
$result = $obj->result;
?>
<table id="tblbabtis" width="860"><tr>
  <th width="120">ID jemaat </th>
  <th width="102">Tempat Babtis </th>
  <th width="92">Tgl Babtis </th>
  <th width="98">No.Surat</th>
  <th width="105">Tempat Sidi </th>
  <th width="90">Tgl Sid </th>
  <th width="108">No.Surat</th>
  <th width="109">Aksi
    <? 
	   if(mysql_num_rows($result)!=0){
	   while($r= mysql_fetch_array($result)){ ?></th>
</tr>
       
       <tr><td><?
	   include_once("../include/config.php");
	   $idjemaat=$r['id_jemaat'];
	   $sqlnama = mysql_query("SELECT * FROM tbl_jemaat WHERE id_jemaat='$idjemaat'"); 
       while($nama = mysql_fetch_array($sqlnama))
       { echo $nama['nama_jemaat']; }?></td><td><?= $r['gerejababtis']; ?></td>
         <td><?= $r['tanggalbabtis']; ?></td>
         <td><?= $r['nosuratbabtis']; ?></td>
         <td><?= $r['gerejasidi']; ?></td>
         <td><?= $r['tanggalsidi']; ?></td>
         <td><?= $r['nosuratsidi']; ?></td>
       <td>	<a href="formbaptis.php?action=update&id=<?= $r['id_jemaat'];?>" class="edit">edit</a> |
	    <a href="proses_data.php?action=del_baptis&idbaptis=<?= $r['id_jemaat'];?>" class="delete">delete</a>
		<?php } //end while ?></td></tr>
	   	
		<tr id="nav"><td colspan="8"><?php echo $obj->anchors; ?></td>
		</tr>
	    <tr id="total"><td colspan="8"><?php echo $obj->total; ?></td></tr>
       <?php }else{?>
        <tr><td align="center" colspan="8">Data tidak ditemukan!</td></tr>	
        <? }}?>
</table>
