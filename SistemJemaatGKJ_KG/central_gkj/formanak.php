<?php 

session_start();

include_once("../include/config.php");

  

$action="add_anak";

	$judul="Data Anak-anak Jemaat GKJ Jogja Selatan";

	$status="Submit";

	if(isset($_GET['action']) and $_GET['action']=="update" and !empty($_GET['id']))

	{

		$str="select * from tbl_jemaat where nama_orangtua = '$_GET[id]'";

		$res=mysql_query($str) or die("query gagal dijalankan");

		$data=mysql_fetch_assoc($res);
		
		$recor=mysql_num_rows($res);

		$idplgn=$data['id_jemaat'];

		$stat=$data['status'];

		$nama=$data['nama_jemaat'];

		$jkel=$data['jkel'];

		$nama_panggilan=$data['nama_panggilan'];

		$ttl=$data['ttl'];$tgl=$data['tgl'];$bln=$data['bln'];$thn=$data['thn'];

		$goldarah=$data['goldarah'];

		$alamat=$data['alamat'];

		$kelurahan=$data['kelurahan'];

		$kecamatan=$data['kecamatan'];

		$kota=$data['kota'];

		$provinsi=$data['provinsi'];

		$pendterakhir=$data['pendterakhir'];

		$anggotagereja=$data['a_gereja'];

		$hobby=$data['hobby'];

		$minat=$data['minat'];

		$m_pelayanan=$data['m_pelayanan'];

		$nohp=$data['no_hp'];$telp=$data['telp'];

		$ket=$data['ket'];

		$anak=$data['anak'];

		$action="update";

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

      url: "page_anak.php",

      type: "GET",

      data: dataString,

  		success:function(data)

  		{

  			$('#DataAnak').html(data);

  		}

    });

  }



  $("form#formanak").submit(function(){

    if (confirm("Apakah benar akan menyimpan data Anak-anak Jemaat?")){

      var NamaAnak = $("input#namanak").val();

      var myRegExp=/[0-9]/;

      

      // cek validasi form dahulu, semua field data harus diisi

      if (NamaAnak.replace(/\s/g,"") == "") {

        alert("Mohon melengkapi semua field data!");

        $("input#namanak").focus();

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
  $('#tblanak tr:even:not(#nav):not(#total)').addClass('even');
  $('#tblanak tr:odd:not(#nav):not(#total)').addClass('odd');
  
	$("a.edit").click(function(){
		page=$(this).attr("href");
		$("#divFormContent").load(page); // me-load formjemaat untuk melakukan edit data
		$("#divFormContent").show();
		$("#btnhide").show();
		return false;
	});
	
	$("a.delete").click(function(){
		el=$(this);
		if(confirm("Apakah benar akan menghapus data Anak?"))
		{
			$.ajax({
				url:$(this).attr("href"), 
				type:"GET",
				dataType: 'json', //respon yang diminta dalam format JSON
				success:function(response)
				{
					if(response.status == 1){
						loadData();
						$("#divFormContent").load("formanak.php");
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
 if ($recor==0 AND $action=='update') { echo "Data Anak-anak belum ditambahkan, Untuk menambahkan klik <a href='main.php?adm=in_data&status=anak&id=$_GET[id]'>
TAMBAH ANAK</a> ?"; } else { ?>

<?php
echo "<div align='right'><a href='main.php?adm=in_data&status=anak&id=$_GET[id]'><h3>TAMBAH ANAK ?</h3></a></div>";

// memanfaatkan class pagination dari Reneesh T.K
include_once("../include/config.php");
include_once("pagination_class.php");

   if (isset($_GET['nama']) and !empty($_GET['nama'])){
   $nama = $_GET['nama'];
   $sql = "select * from tbl_jemaat where anak='anak'AND nama_jemaat like '%$nama%' order by id_jemaat DESC";}
   
   else { $sql = "select * from tbl_jemaat WHERE anak='anak' AND id_jemaat like '%$_SESSION[wilayah]%' AND nama_orangtua = '$_GET[id]' order by id_jemaat DESC";}
   if(isset($_GET['starting'])){ //starting page
   $starting=$_GET['starting'];}
   
   else{
   $starting=0;}

$recpage = 8;//jumlah data yang ditampilkan per page(halaman)
$obj = new pagination_class($sql,$starting,$recpage);		
$result = $obj->result;
?>
<table id="tblanak" width="860"><tr>
  <th width="167">Id jemaat </th>
  <th width="249">Nama</th>
  <th width="130">Tempat lahir </th>
  <th width="135">Tgl Lahir </th>
  <th width="62">L/P</th>
  <th width="89">Gol Darah</th>
</tr><? 
	   if(mysql_num_rows($result)!=0){
	   while($r= mysql_fetch_array($result)){ ?>
       <tr><td><?= $r['id_jemaat']; ?></td><td><?= $r['nama_jemaat']; ?></td>
       <td><?= $r['ttl']; ?></td>
       <td><?= $r['tgl'];echo"-";echo $r['bln'];echo"-";echo $r['thn']; ?></td>
       <td><?= $r['jkel']; ?></td>
       <td><?= $r['goldarah']; ?></td>
       </tr>
	   	<?php } //end while ?>
		<tr id="nav"><td colspan="6"><?php echo $obj->anchors; ?></td>
		</tr>
	    <tr id="total"><td colspan="6"><?php echo $obj->total; ?></td></tr>
       <?php }else{?>
        <tr><td align="center" colspan="6">Data tidak ditemukan!</td></tr>	
        <? }?>
</table>
<?php }?>