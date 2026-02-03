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
   $sql = "SELECT J.id_jemaat,J.nama_jemaat,B.id_jemaat,B.gerejababtis,B.tanggalbabtis,B.nosuratbabtis,B.gerejasidi,B.tanggalsidi,B.nosuratsidi,G.id_gereja,G.nama
   FROM tbl_jemaat J, tbl_babtis B, tbl_gereja G WHERE ( J.id_jemaat=B.id_jemaat AND J.nama_jemaat like '%$nama%') 
   GROUP BY B.id_jemaat DESC";}
   
   else if (isset($_GET['id']) and !empty($_GET['id'])){
   $id = $_GET['id'];
   $sql = "SELECT J.id_jemaat,J.nama_jemaat,B.id_jemaat,B.gerejababtis,B.tanggalbabtis,B.nosuratbabtis,B.gerejasidi,B.tanggalsidi,B.nosuratsidi,B.gerejatestasi,G.id_gereja,G.nama
   FROM tbl_jemaat J, tbl_babtis B, tbl_gereja G WHERE 
   ( J.id_jemaat=B.id_jemaat AND AND B.id_jemaat= '$id' ) GROUP BY B.id_jemaat";}
   
   else { $sql = "SELECT J.id_jemaat,J.nama_jemaat,B.id_jemaat,B.gerejababtis,B.tanggalbabtis,B.nosuratbabtis,B.gerejasidi,B.tanggalsidi,B.nosuratsidi,G.id_gereja,G.nama
   FROM tbl_jemaat J, tbl_babtis B, tbl_gereja G WHERE 
   (J.id_jemaat=B.id_jemaat AND substr(B.id_jemaat,-6,2) LIKE '%$_SESSION[wilayah]%' ) GROUP BY B.id_jemaat ORDER BY B.id_jemaat DESC"; }
   if(isset($_GET['starting'])){ //starting page
   $starting=$_GET['starting'];}
   
   else{
   $starting=0;}

$recpage = 8;//jumlah data yang ditampilkan per page(halaman)
$obj = new pagination_class($sql,$starting,$recpage);		
$result = $obj->result;
?>
<table id="tblbabtis" width="860"><tr>
  <th width="112">ID jemaat </th>
  <th width="223">Nama Jemaat    </th>
  <th width="132">Tgl Babtis </th>
  <th width="121">No.Surat</th>
  <th width="111">Tgl Sid </th>
  <th width="133">No.Surat</th>
  </tr>
       <? 
	   if(mysql_num_rows($result)!=0){
	   while($r= mysql_fetch_array($result)){ ?>
       <tr><td><?= $r['id_jemaat']; ?></td><td><?= $r['nama_jemaat']; ?></td>
         <td><?= $r['tanggalbabtis']; ?></td>
         <td><?= $r['nosuratbabtis']; ?></td>
         <td><?= $r['tanggalsidi']; ?></td>
         <td><?= $r['nosuratsidi']; ?></td>
       </tr>
	   	<?php } //end while ?>
		<tr id="nav"><td colspan="6"><?php echo $obj->anchors; ?></td>
		</tr>
	    <tr id="total"><td colspan="6"><?php echo $obj->total; ?></td></tr>
       <?php }else{?>
        <tr><td align="center" colspan="6">Data tidak ditemukan!</td></tr>	
        <? }?>
</table>
