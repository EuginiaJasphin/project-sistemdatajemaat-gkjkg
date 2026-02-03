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
    url:"page_usaha.php",
    data: dataString,
		type:"GET",
		success:function(data)
		{
			$('#DataUsaha').html(data);
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
    url: "page_usaha.php", //file tempat pemrosesan permintaan (request)
    type: "GET",
    data: dataString,
		success:function(data)
		{
			$('#DataUsaha').html(data);
		}
  });
}
  
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

<?php
// memanfaatkan class pagination dari Reneesh T.K
include_once("../include/config.php");
include_once("pagination_class.php");

   if (isset($_GET['nama']) and !empty($_GET['nama'])){
   $nama = $_GET['nama'];
   $sql = "SELECT J.id_jemaat,J.nama_jemaat,U.id_pasangan,U.usaha 
   FROM tbl_jemaat J, tbl_usaha U WHERE J.id_jemaat=U.id_pasangan AND J.nama_jemaat like '%$nama%' ORDER BY U.id_pasangan DESC";}
   
   else if (isset($_GET['id']) and !empty($_GET['id'])){
   $id = $_GET['id'];
   $sql = "SELECT J.id_jemaat,J.nama_jemaat,U.id_pasangan,U.usaha 
   FROM tbl_jemaat J, tbl_usaha U WHERE J.id_jemaat=U.id_pasangan AND U.id_pasangan= '$id' GROUP BY U.id_pasangan";}
   
   else { $sql = "SELECT J.id_jemaat,J.nama_jemaat,U.id_pasangan,U.usaha 
   FROM tbl_jemaat J, tbl_usaha U WHERE J.id_jemaat=U.id_pasangan AND substr(U.id_pasangan,-6,2) like '%$_SESSION[wilayah]%' GROUP BY U.id_pasangan ORDER BY U.id_usaha DESC"; }
   if(isset($_GET['starting'])){ //starting page
   $starting=$_GET['starting'];}
   
   else{
   $starting=0;}

$recpage = 8;//jumlah data yang ditampilkan per page(halaman)
$obj = new pagination_class($sql,$starting,$recpage);		
$result = $obj->result;
?>
<table id="tblpendidikan" width="860"><tr>
  <th width="147">Id Jemaat </th>
  <th width="200">Keluarga</th>
  <th width="497">Usaha</th>
</tr>
  <? 
	   if(mysql_num_rows($result)!=0){
	   while($r= mysql_fetch_array($result)){ ?>
       <tr><td><?= $r['id_jemaat']; ?></td>
         <td><?= $r['nama_jemaat']; ?></td>
         <td><?= $r['usaha']; ?></td>
       </tr>
	   	<?php } //end while ?>
		<tr id="nav"><td colspan="3"><?php echo $obj->anchors; ?></td>
		</tr>
	    <tr id="total"><td colspan="3"><?php echo $obj->total; ?></td></tr>
       <?php }else{?>
        <tr><td align="center" colspan="3">Data tidak ditemukan!</td></tr>	
        <? }?>
</table>
