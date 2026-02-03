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
    url:"page_keluar.php",
    data: dataString,
		type:"GET",
		success:function(data)
		{
			$('#divPageDataKeluar').html(data);
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
    url: "page_keluar.php", //file tempat pemrosesan permintaan (request)
    type: "GET",
    data: dataString,
		success:function(data)
		{
			$('#divPageDataKeluar').html(data);
		}
  });
}
  
$(function(){ 
  // membuat warna tampilan baris data pada tabel menjadi selang-seling
  $('#tblkeluar tr:even:not(#nav):not(#total)').addClass('even');
  $('#tblkeluar tr:odd:not(#nav):not(#total)').addClass('odd');
  
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
						$("#divFormContent").load("formatestasi.php");
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
    else{$sql = "select * from tbl_atestasi WHERE id_jemaat like '%$_SESSION[wilayah]%' order by id_jemaat DESC";
    }if(isset($_GET['starting'])){ //starting page
	$starting=$_GET['starting'];}else{
	$starting=0;}

$recpage = 8;//jumlah data yang ditampilkan per page(halaman)
$obj = new pagination_class($sql,$starting,$recpage);		
$result = $obj->result;
?>
  <table id="tblkeluar" width="860">
	  <tr>
	  <th width="17%">ID jemaat </th>
      <th width="19%">No Surat </th>
      <th width="18%">Tanggal</th>
      <th width="31%">Alasan</th>
      <th width="15%">Aksi</th></tr>
		<?php //menampilkan data jemaat
		if(mysql_num_rows($result)!=0){
  		while($row = mysql_fetch_array($result)){ ?>		
        <tr><td>
		<?php echo $row['id_jemaat']; ?></td><td>
		<?php echo $row['nosurat']; ?></td><td>
		<?php echo $row['tanggal']; ?></td><td>
		<?php echo $row['alasan']; ?></td><td>
		<a href="proses_data.php?action=del_atestasi&idatestasi=
		<?php echo $row['id_jemaat'];?>" class="delete">delete</a></td></tr></div>
  		<?php } //end while ?>
		 <tr id="nav"><td colspan="5"><?php echo $obj->anchors; ?></td>
		 </tr>
	    <tr id="total"><td colspan="5"><?php echo $obj->total; ?></td></tr>
       <?php }else{?>
    <tr><td align="center" colspan="5">Data tidak ditemukan!</td></tr>
    <?php }?>
</table>

	
