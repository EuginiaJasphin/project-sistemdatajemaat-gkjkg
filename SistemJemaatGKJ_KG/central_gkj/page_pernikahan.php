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
    url:"page_pernikahan.php",
    data: dataString,
		type:"GET",
		success:function(data)
		{
			$('#Pernikahan').html(data);
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
    url: "page_pernikahan.php", //file tempat pemrosesan permintaan (request)
    type: "GET",
    data: dataString,
		success:function(data)
		{
			$('#Pernikahan').html(data);
		}
  });
}
  
$(function(){ 
  // membuat warna tampilan baris data pada tabel menjadi selang-seling
  $('#tblpernikahan tr:even:not(#nav):not(#total)').addClass('even');
  $('#tblpernikahan tr:odd:not(#nav):not(#total)').addClass('odd');
  
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
						$("#divFormContent").load("formpernikahan.php");
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
   $sql = "SELECT J.id_jemaat,J.nama_jemaat,N.pasangan,N.tanggal,N.gereja,N.catatansipil,N.nosurat,G.id_gereja,G.nama
   FROM tbl_jemaat J,tbl_pernikahan N, tbl_gereja G WHERE J.id_jemaat=N.pasangan AND N.gereja=G.id_gereja
   AND J.nama_jemaat like '%$nama%' ORDER BY N.pasangan DESC";}
   
   else if (isset($_GET['id']) and !empty($_GET['id'])){
   $id = $_GET['id'];
   $sql = "SELECT J.id_jemaat,J.nama_jemaat,N.pasangan,N.tanggal,N.gereja,N.catatansipil,N.nosurat,G.id_gereja,G.nama
   FROM tbl_jemaat J,tbl_pernikahan N, tbl_gereja G WHERE J.id_jemaat=N.pasangan AND N.gereja=G.id_gereja
   AND N.pasangan= '$id' GROUP BY N.pasangan";}
   
   else { $sql = "SELECT J.id_jemaat,J.nama_jemaat,N.pasangan,N.tanggal,N.gereja,N.catatansipil,N.nosurat,G.id_gereja,G.nama
   FROM tbl_jemaat J,tbl_pernikahan N, tbl_gereja G WHERE J.id_jemaat=N.pasangan AND N.gereja=G.id_gereja
   AND substr(N.pasangan,-6,2) like '%$_SESSION[wilayah]%'ORDER BY  N.pasangan DESC"; }
   if(isset($_GET['starting'])){ //starting page
   $starting=$_GET['starting'];}
   
   else{
   $starting=0;}

$recpage = 8;//jumlah data yang ditampilkan per page(halaman)
$obj = new pagination_class($sql,$starting,$recpage);		
$result = $obj->result;
?>
<table id="tblpernikahan" width="860"><tr>
  <th width="124">Id Jemaat </th>
  <th width="252">Pasangan</th>
  <th width="120">Tanggal </th>
  <th width="139">di Gereja </th>
  <th width="118">Catatan Sipil </th>
  <th width="79">No.Surat</th>
  <? 
	   if(mysql_num_rows($result)!=0){
	   while($r= mysql_fetch_array($result)){ ?></tr>
       <tr><td><?= $r['pasangan']; ?></td><td><?
	   include_once("../include/config.php");
	   $idjemaat=$r['pasangan'];
	   $sqlnama = mysql_query("SELECT * FROM tbl_jemaat WHERE id_jemaat='$idjemaat'"); 
       while($nama = mysql_fetch_array($sqlnama))
       { echo $nama['nama_jemaat']; }?></td>
       <td><?= $r['tanggal']; ?></td>
       <td><?= $r['nama']; ?></td>
       <td><?= $r['catatansipil']; ?></td>
       <td><?= $r['nosurat']; ?></td>
       </tr>
	   	<?php } //end while ?>
		<tr id="nav"><td colspan="6"><?php echo $obj->anchors; ?></td>
		</tr>
	    <tr id="total"><td colspan="6"><?php echo $obj->total; ?></td></tr>
       <?php }else{?>
        <tr><td align="center" colspan="6">Data tidak ditemukan!</td></tr>	
        <? }?>
</table>
