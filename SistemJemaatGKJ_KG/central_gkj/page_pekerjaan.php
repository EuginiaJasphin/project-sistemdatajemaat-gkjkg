<?
session_start()
?>
<script type="text/javascript">

// fungsi ini untuk menampilkan list data jemaat sesuai halaman (page) yang dipilih.
// list data yang ditampilkan disesuaikan juga dengan input data pada bagian search.
function pagination(page){
  var cari = $("input#fieldcari").val();
  var combo = $("select#pilihcari").val();
  
  if (combo == "namajemaat"){
    dataString = 'starting='+page+'&nama='+cari+'&random='+Math.random();
  }
  else if (combo == "idjemaat"){
    dataString = 'starting='+page+'&id='+cari+'&random='+Math.random(); 
  }
  else{
    dataString = 'starting='+page+'&random='+Math.random();
  }
  
  $.ajax({
    url:"page_pekerjaan.php",
    data: dataString,
		type:"GET",
		success:function(data)
		{
			$('#Pekerjaan').html(data);
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
    url: "page_pekerjaan.php", //file tempat pemrosesan permintaan (request)
    type: "GET",
    data: dataString,
		success:function(data)
		{
			$('#Pekerjaan').html(data);
		}
  });
}
  
$(function(){ 
  // membuat warna tampilan baris data pada tabel menjadi selang-seling
  $('#tblpendidikan tr:even:not(#nav):not(#total)').addClass('even');
  $('#tblpendidikan tr:odd:not(#nav):not(#total)').addClass('odd');
  
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
						$("#divFormContent").load("formpekerjaan.php");
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
   $sql = "SELECT J.id_jemaat,J.nama_jemaat,P.id_jemaat,P.jenispekerjaan,P.tempatkerja,P.jabatan
   FROM tbl_jemaat J, tbl_pekerjaan P where J.id_jemaat=P.id_jemaat AND J.nama_jemaat like '%$nama%' order by P.id_jemaat DESC";}
   
   else if (isset($_GET['id']) and !empty($_GET['id'])){
   $id = $_GET['id'];
   $sql = "SELECT J.id_jemaat,J.nama_jemaat,P.id_jemaat,P.jenispekerjaan,P.tempatkerja,P.jabatan
   FROM tbl_jemaat J, tbl_pekerjaan P where J.id_jemaat=P.id_jemaat AND P.id_jemaat = '$id' GROUP BY P.id_jemaat";}
   
   else { $sql = "SELECT J.id_jemaat,J.nama_jemaat,P.id_jemaat,P.jenispekerjaan,P.tempatkerja,P.jabatan
   FROM tbl_jemaat J, tbl_pekerjaan P WHERE substr(P.id_jemaat,-6,2) like '%$_SESSION[wilayah]%' AND J.id_jemaat=P.id_jemaat GROUP BY P.id_jemaat ORDER BY P.id_jemaat DESC";}
   if(isset($_GET['starting'])){ //starting page
   $starting=$_GET['starting'];}
   
   else{
   $starting=0;}

$recpage = 8;//jumlah data yang ditampilkan per page(halaman)
$obj = new pagination_class($sql,$starting,$recpage);		
$result = $obj->result;
?>
<table id="tblpekerjaan" width="860"><tr>
  <th width="126" height="24">Id Jemaat </th>
<th width="219">Nama Jemaat</th>
<th width="159">Jenis Pekerjaan</th>
<th width="162">Tempat Kerja </th>
<th width="170">Jabatan</th>
</tr><? 
	   if(mysql_num_rows($result)!=0){
	   while($r= mysql_fetch_array($result)){ ?>
       <tr><td><?= $r['id_jemaat']; ?></td><td><?= $r['nama_jemaat']; ?></td>
       <td><?= $r['jenispekerjaan']; ?></td>
       <td><?= $r['tempatkerja']; ?></td>
       <td><?= $r['jabatan']; ?></td>
       </tr>
	   	<?php } //end while ?>
		<tr id="nav"><td colspan="5"><?php echo $obj->anchors; ?></td>
		</tr>
	    <tr id="total"><td colspan="5"><?php echo $obj->total; ?></td></tr>
       <?php }else{?>
        <tr><td align="center" colspan="5">Data tidak ditemukan!</td></tr>	
        <? }?>
</table>
