<?php
  // file proses_data.php merupakan halaman untuk menangani request Ajax baik untuk proses tambah, ubah, maupun hapus
  // respon balikan dari masing-masing proses tersebut adalah dalam format JSON.
  
	include_once("../include/config.php");
	
    $action=$_POST['action'];
	$idplgn=$_POST['idjemaat'];$idfoto=$_POST['foto'];$status=$_POST['status'];$nama=$_POST['namajemaat'];
	$namapanggilan=$_POST['namapanggilan'];
	$ttl=$_POST['ttl'];$tanggal=$_POST['tanggal'];$bulan=$_POST['bulan'];$tahun=$_POST['tahun'];$jkel=$_POST['jkel'];
	$pernikahan2=$_POST['pernikahan2'];$pernikahan3=$_POST['pernikahan3'];
	$goldarah=$_POST['goldarah'];$alamat=$_POST['alamat'];$rt=$_POST['rt'];$rw=$_POST['rw'];
	$kelurahan=$_POST['kelurahan'];$kecamatan=$_POST['kecamatan'];$kota=$_POST['kota'];$provinsi=$_POST['provinsi'];
	$pendterakhir=$_POST['pendterakhir'];$nohp=$_POST['nohp'];$telp=$_POST['telp'];$email=$_POST['email'];
	$pernikahan=$_POST['pernikah'];$pasangan=$_POST['pasangan'];$wil=$_POST['wil'];$kode=$_POST['kode'];$hub=$_POST['hub'];$nokk=$_POST['nokk'];
	
	//fungsi untuk men-generate ID jemaat, ex: P0001 
	function buatID($tabel, $inisial){
    $struktur = mysql_query("select * from $tabel") or die("query tidak dapat dijalankan!");
    $field = mysql_field_name($struktur,0);
    $panjang = mysql_field_len($struktur,0);
    $row = mysql_num_rows($struktur);
    
    $panjanginisial = strlen($inisial);
    $awal = $panjanginisial + 1;
    $bnyk = $panjang-$panjanginisial;
    
    if ($row >= 1){
      $query = mysql_query("select max(substring($field,$awal,$bnyk)) as max from $tabel") or die("query tidak dapat dijalankan!");
      $hasil = mysql_fetch_assoc($query);
      $angka = intval($hasil['max']);
    }
    else{
      $angka = 0;
    }
    
    $angka++;
    $tmp= "";
    for ($i=0; $i < ($panjang-$panjanginisial-strlen($angka)) ; $i++){
      $tmp = $tmp."0";
    }
    //return hasil generate ID
    return strval($inisial.$tmp.$angka);
  }
  
//UNTUK DATA PRIBADI
	if($action=="add_foto") //menangani aksi penambahan data jemaat
	{
	  $ufile=$_FILES['ufile']['tmp_name'];
      $ufile_name = $_FILES['ufile']['name'];
      if($ufile=='' && $ufile_name=='')
	  {$ufile_name='no_image.jpg';}
	  else {
      $path= "../images/foto/$ufile_name";
      copy($ufile,$path);
	  }
	  mysql_query("INSERT INTO tbl_foto (nama_foto) VALUES ('$ufile_name') ") 
	  or die ("data gagal ditambahakan!");
      // mengembalikan respon dalam format JSON.
      // status "1" berarti proses berhasil dilakukan.
     echo "<script>alert('foto telah tersimpan');
	 self.location.href='../central_gkj/main.php?adm=in_data&status=datadiri';</script>";  
	 exit;} 
	 
	 if($action=="add_datadiri") //menangani aksi penambahan data jemaat
	{ 
	  $idjemaat = buatID("tbl_jemaat",$kode);
	  mysql_query("INSERT INTO tbl_jemaat(id_jemaat,foto,status,nama_jemaat,nama_panggilan,ttl,tgl,bln,thn,jkel,goldarah,alamat,kelurahan,kecamatan,kota,provinsi,pendterakhir,no_hp,telp,email,pernikahan,pasangan,hobby,minat,m_pelayanan,ket,anak,nokk) VALUES('$idjemaat','$idfoto','$status','$nama','$namapanggilan','$ttl','$tanggal','$bulan','$tahun','$jkel','$goldarah','$alamat RT$rt RW$rw','$kelurahan','$kecamatan','$kota','$provinsi','$pendterakhir','$nohp','$telp','$email','$pernikahan2$pernikahan3','$pasangan','$hobby','$minat','$m_pelayanan','$wil','$hub','$nokk')") 
	  or die ("data gagal ditambahakan!");
      // mengembalikan respon dalam format JSON.
      // status "1" berarti proses berhasil dilakukan.
     echo '{"status":"1"}';  
	 exit;
	}
	 
	 
	if($action=="add_datadiriiiixxx") //menangani aksi penambahan data jemaat
	{
	  $idjemaat = buatID("tbl_jemaat",$kode);
	  mysql_query("INSERT INTO tbl_jemaat(id_jemaat,foto,status,nama_jemaat,nama_panggilan,ttl,tgl,bln,thn,jkel,goldarah,alamat,
	 kelurahan,kecamatan,kota,provinsi,pendterakhir,no_hp,telp,email,pernikahan,pasangan,ket,anak)        
	 VALUES('$idjemaat','$idfoto','$status','$nama','$namapanggilan','$ttl','$tanggal','$bulan','$tahun','$jkel',
	 '$goldarah','$alamat RT$rt RW$rw','$kelurahan','$kecamatan','$kota',
	 '$provinsi','$pendterakhir','$nohp','$telp','$email','$pernikahan2$pernikahan3','$pasangan','$wil','$hub')") 
	  or die ("data gagal ditambahakan!");
      // mengembalikan respon dalam format JSON.
      // status "1" berarti proses berhasil dilakukan.
     echo '{"status":"1"}';  
	 exit;
	}
	
	elseif($action=="add_pendidikan") //menangani aksi penambahan data pendidikan
    {
	 $idjemaat=$_POST['idjemaat'];$jenjangpend=$_POST['jenjangpend'];$namasekolah=$_POST['namasekolah'];$status=$_POST['status'];
	 $thnlulus=$_POST['thnlulus'];$tempat=$_POST['tempat'];$gelar=$_POST['gelar'];$pendkhusus=$_POST['pendkhusus'];
	 
	 mysql_query("INSERT INTO tbl_pendidikan(id_jemaat,jenjangpend,namasekolah,thnlulus,tempat,gelar,pendkhusus)        
	 VALUES('$idjemaat','$jenjangpend','$namasekolah','$thnlulus','$tempat','$gelar','$pendkhusus')") 
	  or die ("data gagal ditambahakan!");
    // mengembalikan respon dalam format JSON.
    // status "1" berarti proses berhasil dilakukan.
    echo '{"status":"1"}';  
	exit;
	}	
	
	elseif($action=="add_pekerjaan") //menangani aksi penambahan data pekerjaan
    {
	 $idjemaat=$_POST['idjemaat'];$jenispekerjaan=$_POST['jenispekerjaan'];$tempatkerja=$_POST['tempatkerja'];
	 $alamatkerja=$_POST['alamatkerja'];$jabatan=$_POST['jabatan'];$notelp=$_POST['notelp'];
	 
	 mysql_query("INSERT INTO tbl_pekerjaan(id_jemaat,jenispekerjaan,tempatkerja,alamatkerja,jabatan,notelp)        
	 VALUES('$idjemaat','$jenispekerjaan','$tempatkerja','$alamatkerja','$jabatan','$notelp')") 
	  or die ("data gagal ditambahakan!");
    // mengembalikan respon dalam format JSON.
    // status "1" berarti proses berhasil dilakukan.
    echo '{"status":"1"}';  
	exit;
	}
	
	elseif($action=="add_pernikahan") //menangani aksi penambahan data pernikahan
    {
	 $pasangan=$_POST['pasangan'];$tanggal=$_POST['tanggal'];$bulan=$_POST['bulan'];
	 $tahun=$_POST['tahun'];$gereja=$_POST['gereja'];$pendeta=$_POST['pendeta'];$catatansipil=$_POST['catatansipil'];
	 $nosurat=$_POST['nosurat'];
	 
	 mysql_query("INSERT INTO tbl_pernikahan(pasangan,tanggal,gereja,pendeta,catatansipil,nosurat)        
	 VALUES('$pasangan','$tanggal/$bulan/$tahun','$gereja','$pendeta','$catatansipil','$nosurat')") 
	  or die ("data gagal ditambahakan!");
    // mengembalikan respon dalam format JSON.
    // status "1" berarti proses berhasil dilakukan.
    echo '{"status":"1"}';  
	exit;
	}
	
	 elseif($action=="add_anak") //menangani aksi penambahan data anak-anak
    {
	 $idjemaat = buatID("tbl_jemaat",$kode);$status=$_POST['status'];
	 $pasangan=$_POST['pasangan'];$ket=$_POST['ket'];$namanak=$_POST['namanak'];$namapanggilan=$_POST['nama_panggilan'];$jkel=$_POST['jkel'];
	 $tempatlahir=$_POST['tempatlahir'];
	 $tanggal=$_POST['tanggal'];$bulan=$_POST['bulan'];$tahun=$_POST['tahun'];$goldarah=$_POST['goldarah'];
	 $alamat=$_POST['alamat'];$rt=$_POST['rt'];$rw=$_POST['rw'];
	 $kelurahan=$_POST['kelurahan'];$kecamatan=$_POST['kecamatan'];$kota=$_POST['kota'];$provinsi=$_POST['provinsi'];$pendterakhir=$_POST['pendterakhir'];
	 $sekolah=$_POST['sekolah'];$kerja=$_POST['kerja'];$a_gereja=$_POST['a_gereja'];$no_hp=$_POST['nohp'];
	 $notelp=$_POST['notelp'];$gerejababtis=$_POST['gerejababtis'];$pendetababtis=$_POST['pendetababtis'];
	 $tanggalbabtis=$_POST['tanggalbabtis'];$nosurat=$_POST['nosurat'];$kode=$_POST['kode'];$hubungan=$_POST['hubungan'];$hobby=$_POST['hobby'];
	 $minat=$_POST['minat'];$m_pelayanan=$_POST['m_pelayanan'];
	 
	 mysql_query("INSERT INTO  tbl_jemaat(id_jemaat,status,nama_orangtua,nama_jemaat,nama_panggilan,ttl,jkel,tgl,bln,thn,goldarah,alamat,
	 kelurahan,kecamatan,kota,provinsi,pendterakhir,no_hp,telp,sekolah,kerja,
	 a_gereja,hobby,minat,m_pelayanan,ket,anak)        
	  VALUES('$idjemaat','$status','$pasangan','$namanak','$namapanggilan','$tempatlahir','$jkel','$tanggal','$bulan','$tahun','$goldarah','$alamat RT$rt RW$rw','$kelurahan',
	  '$kecamatan','$kota','$provinsi','$pendterakhir','$no_hp','$notelp','$sekolah','$kerja','$a_gereja','$hobby','$minat','$m_pelayanan','$ket','$hubungan')") 
	  or die ("data gagal ditambahakan!");
    // mengembalikan respon dalam format JSON.
    // status "1" berarti proses berhasil dilakukan.
    echo '{"status":"1"}';  
	exit;
	}

	elseif($action=="add_babtis") //menangani aksi penambahan data Babtis, Atestasi, Sidi
    {
	 $idjemaat=$_POST['idjemaat'];$gerejababtis=$_POST['gerejababtis'];$tanggalbabtis=$_POST['tanggalbabtis'];
	 $pendetababtis=$_POST['pendetababtis'];$nosuratbabtis=$_POST['nosuratbabtis'];
	 $gerejatestasi=$_POST['gerejatestasi'];$tanggalatestasi=$_POST['tanggalatestasi'];
	 $nosurat=$_POST['nosurat'];$gerejasidi=$_POST['gerejasidi'];$tanggalsidi=$_POST['tanggalsidi'];
	 $nosuratsidi=$_POST['nosuratsidi'];
	 $gerejapenyerahan=$_POST['gerejapenyerahan'];$tanggalpenyerahan=$_POST['tanggalpenyerahan'];
	 $pendetapenyerahan=$_POST['pendetapenyerahan'];
	 
	 mysql_query("INSERT INTO tbl_babtis(id_jemaat,gerejababtis,tanggalbabtis,nosuratbabtis,
	 pendetababtis,gerejatestasi,tanggalatestasi,nosurat,
	 gerejasidi,tanggalsidi,nosuratsidi,gerejapenyerahan,tanggalpenyerahan,pendetapenyerahan)        
	 VALUES('$idjemaat','$gerejababtis','$tanggalbabtis','$nosuratbabtis','$pendetababtis','$gerejatestasi','$tanggalatestasi','$nosurat'
	 ,'$gerejasidi','$tanggalsidi','$nosuratsidi','$gerejapenyerahan','$tanggalpenyerahan','$pendetapenyerahan')") 
	  or die ("data gagal ditambahakan!");
    // mengembalikan respon dalam format JSON.
    // status "1" berarti proses berhasil dilakukan.
    echo '{"status":"1"}';  
	exit;
	}
	
	elseif($action=="add_usaha") //menangani aksi penambahan data usaha keluarga
    {
	 $pasangan=$_POST['pasangan'];$usaha=$_POST['usaha'];
	 
	 mysql_query("INSERT INTO tbl_usaha(id_pasangan,usaha)        
	 VALUES('$pasangan','$usaha')") 
	  or die ("data gagal ditambahakan!");
    // mengembalikan respon dalam format JSON.
    // status "1" berarti proses berhasil dilakukan.
    echo '{"status":"1"}';  
	exit;
	}	
		
	elseif($action=="add_meninggal") //menangani aksi penambahan data meninggal
    {
	 $idjemaatt=$_POST['id_jemaat'];$tanggal=$_POST['tanggal'];$bulan=$_POST['bulan'];
	 $tahun=$_POST['tahun'];$sebab=$_POST['sebab'];
	 
	 mysql_query("INSERT INTO tbl_meninggal(id_jemaat,tgl,bln,thn,sebab)        
	 VALUES('$idjemaatt','$tanggal','$bulan','$tahun','$sebab')") 
	  or die ("data gagal ditambahakan!");
    // mengembalikan respon dalam format JSON.
    // status "1" berarti proses berhasil dilakukan.
    echo '{"status":"1"}';  
	exit;
	}
	
	elseif($action=="add_keluar") //menangani aksi penambahan data keluar
    {
	 $idjemaatt=$_POST['id_jemaat'];$nosurat=$_POST['nosurat'];$tanggal=$_POST['tanggal'];$alasan=$_POST['alasan'];
	 
	 mysql_query("INSERT INTO tbl_atestasi(id_jemaat,nosurat,tanggal,alasan)        
	 VALUES('$idjemaatt','$nosurat','$tanggal','$alasan')") 
	  or die ("data gagal ditambahakan!");
    // mengembalikan respon dalam format JSON.
    // status "1" berarti proses berhasil dilakukan.
    echo '{"status":"1"}';  
	exit;
	}
	
// UNTUK UPDATETING DATA
			
elseif($action=="update_jemaat") //menangani aksi perubahan data jemaat
{ $idjemaat=$_POST['idjemaat'];$idfoto=$_POST['foto'];$status=$_POST['status'];$nama=$_POST['namajemaat'];$namapanggilan=$_POST['namapanggilan'];
	$ttl=$_POST['ttl'];$tanggal=$_POST['tanggal'];$bulan=$_POST['bulan'];$tahun=$_POST['tahun'];$jkel=$_POST['jkel'];
	$pernikahan2=$_POST['pernikahan2'];$pernikahan3=$_POST['pernikahan3'];$goldarah=$_POST['goldarah'];$alamat=$_POST['alamat'];
	$kelurahan=$_POST['kelurahan'];$kecamatan=$_POST['kecamatan'];$kota=$_POST['kota'];$provinsi=$_POST['provinsi'];
	$pendterakhir=$_POST['pendterakhir'];$nohp=$_POST['nohp'];$telp=$_POST['telp'];$email=$_POST['email'];$pasangan=$_POST['pasangan'];
	$hobby=$_POST['hobby'];$minat=$_POST['minat'];$m_pelayanan=$_POST['m_pelayanan'];$wil=$_POST['wil'];$hub=$_POST['hub'];$nokk=$_POST['nokk'];
	
	 
$test = mysql_query("UPDATE tbl_jemaat SET foto='$idfoto',status='$status',nama_jemaat='$nama',nama_panggilan='$namapanggilan',ttl='$ttl',tgl='$tanggal',bln='$bulan',thn='$tahun',jkel='$jkel',goldarah='$goldarah',alamat='$alamat',kelurahan='$kelurahan',kecamatan='$kecamatan',kota='$kota',provinsi='$provinsi',pendterakhir='$pendterakhir',no_hp='$nohp',telp='$telp',email='$email',pernikahan='$pernikahan2$pernikahan3',pasangan='$pasangan',hobby='$hobby',minat='$minat',m_pelayanan='$m_pelayanan',ket='$wil',anak='$hub',nokk='$nokk' WHERE id_jemaat='$idjemaat'") or die ("data gagal di-update!");
echo '{"status":"1"}';
exit;}
	
elseif($action=="update") //menangani aksi perubahan data pendidikan
{ $id_pendidikan=$_POST['idpendidikan'];
$idjemaat=$_POST['idjemaat'];$jenjangpend=$_POST['jenjangpend'];$namasekolah=$_POST['namasekolah'];$status=$_POST['status'];
$thnlulus=$_POST['thnlulus'];$tempat=$_POST['tempat'];$gelar=$_POST['gelar'];$pendkhusus=$_POST['pendkhusus'];

$test = mysql_query("UPDATE tbl_pendidikan SET id_jemaat='$idjemaat',jenjangpend='$jenjangpend',namasekolah='$namasekolah',thnlulus='$thnlulus',tempat='$jtempat',gelar='$gelar',pendkhusus='$pendkhusus' WHERE id_pendidikan='$id_pendidikan'") or die ("data gagal di-update!");
echo '{"status":"1"}';
exit;}

elseif($action=="update_kerja") //menangani aksi perubahan data pekerjaan
{$idpekerjaan=$_POST['idpekerjaan']; 
$idjemaat=$_POST['idjemaat'];$jenispekerjaan=$_POST['jenispekerjaan'];$tempatkerja=$_POST['tempatkerja'];
$alamatkerja=$_POST['alamatkerja'];$jabatan=$_POST['jabatan'];$notelp=$_POST['notelp'];

$test = mysql_query("UPDATE tbl_pekerjaan SET id_jemaat='$idjemaat',jenispekerjaan='$jenispekerjaan',tempatkerja='$tempatkerja',alamatkerja='$alamatkerja',jabatan='$jabatan',notelp='$notelp' WHERE id_jemaat='$idjemaat'") or die ("data gagal di-update!");
echo '{"status":"1"}';
exit;}

elseif($action=="update_nikah") //menangani aksi perubahan data pernikahan
{   
$idpernikahan=$_POST['idpernikahan']; 
$pasangan=$_POST['pasangan'];$tanggal=$_POST['tanggal'];$bulan=$_POST['bulan'];
$tahun=$_POST['tahun'];$gereja=$_POST['gereja'];$pendeta=$_POST['pendeta'];$catatansipil=$_POST['catatansipil'];
$nosurat=$_POST['nosurat'];

$test = mysql_query("UPDATE tbl_pernikahan SET pasangan='$pasangan',tanggal='$tanggal/$bulan/$tahun',gereja='$gereja',pendeta='$pendeta',catatansipil='$catatansipil',nosurat='$nosurat' WHERE id_pernikahan='$idpernikahan'") or die ("data gagal di-update!");
echo '{"status":"1"}';
exit;}

elseif($action=="update_anak") //menangani aksi perubahan data Anak
{   

	 $idjemaat = $_POST['idjemaat'];$status=$_POST['status'];
	 $pasangan=$_POST['pasangan'];$ket=$_POST['ket'];$namanak=$_POST['namanak'];$namapanggilan=$_POST['nama_panggilan'];$jkel=$_POST['jkel'];
	 $tempatlahir=$_POST['tempatlahir'];
	 $tanggal=$_POST['tanggal'];$bulan=$_POST['bulan'];$tahun=$_POST['tahun'];$goldarah=$_POST['goldarah'];
	 $alamat=$_POST['alamat'];$rt=$_POST['rt'];$rw=$_POST['rw'];
	 $kelurahan=$_POST['kelurahan'];$kecamatan=$_POST['kecamatan'];$kota=$_POST['kota'];$provinsi=$_POST['provinsi'];$pendterakhir=$_POST['pendterakhir'];
	 $sekolah=$_POST['sekolah'];$kerja=$_POST['kerja'];$a_gereja=$_POST['a_gereja'];$no_hp=$_POST['nohp'];
	 $notelp=$_POST['notelp'];$gerejababtis=$_POST['gerejababtis'];$pendetababtis=$_POST['pendetababtis'];
	 $tanggalbabtis=$_POST['tanggalbabtis'];$nosurat=$_POST['nosurat'];$kode=$_POST['kode'];$hubungan=$_POST['hubungan'];
	 $hobby=$_POST['hobby'];$minat=$_POST['minat'];$m_pelayanan=$_POST['m_pelayanan'];
	 
$test = mysql_query("UPDATE tbl_jemaat SET nama_orangtua='$pasangan',status='$status',nama_jemaat='$namanak',nama_panggilan='$namapanggilan',ttl='$tempatlahir',jkel='$jkel',tgl='$tanggal',bln='$bulan',thn='$tahun',goldarah='$goldarah',alamat='$alamat',kelurahan='$kelurahan',kecamatan='$kecamatan',kota='$kota',provinsi='$provinsi',pendterakhir='$pendterakhir',no_hp='$no_hp',telp='$notelp',a_gereja='$a_gereja',hobby='$hobby',minat='$minat',m_pelayanan='$m_pelayanan',ket='$ket',anak='$hubungan' WHERE id_jemaat='$idjemaat'") or die ("data gagal di-update!");
echo '{"status":"1"}';
exit;}

elseif($action=="update_b") //menangani aksi perubahan data babtis
{   
     $idjemaat = $_POST['idjemaat'];
     $gerejababtis=$_POST['gerejababtis'];$tanggalbabtis=$_POST['tanggalbabtis'];
	 $pendetababtis=$_POST['pendetababtis'];$nosuratbabtis=$_POST['nosuratbabtis'];
	 $gerejatestasi=$_POST['gerejatestasi'];$tanggalatestasi=$_POST['tanggalatestasi'];
	 $nosurat=$_POST['nosurat'];$gerejasidi=$_POST['gerejasidi'];$tanggalsidi=$_POST['tanggalsidi'];
	 $nosuratsidi=$_POST['nosuratsidi'];$gerejapenyerahan=$_POST['gerejapenyerahan'];
	 $tanggalpenyerahan=$_POST['tanggalpenyerahan'];
	 $pendetapenyerahan=$_POST['pendetapenyerahan'];
	 
	 
$test = mysql_query("UPDATE tbl_babtis SET gerejababtis='$gerejababtis',tanggalbabtis='$tanggalbabtis',nosuratbabtis='$nosuratbabtis',pendetababtis='$pendetababtis',gerejatestasi='$gerejatestasi',tanggalatestasi='$tanggalatestasi',nosurat='$nosurat',gerejasidi='$gerejasidi',tanggalsidi='$tanggalsidi',nosuratsidi='$nosuratsidi',gerejapenyerahan='$gerejapenyerahan',tanggalpenyerahan='$tanggalpenyerahan',pendetapenyerahan='$pendetapenyerahan' WHERE id_jemaat='$idjemaat'") or die ("data gagal di-update!");
echo '{"status":"1"}';
exit;}

elseif($action=="update_usaha") //menangani aksi perubahan data usaha keluarga
{   
$idpasangan=$_POST['pasangan'];$usaha=$_POST['usaha'];
$test = mysql_query("UPDATE tbl_usaha SET usaha='$usaha' WHERE id_pasangan='$idpasangan'") or die ("data gagal di-update!");
echo '{"status":"1"}';
exit;}


//UNTUK YANG MENU DELETE ( SEMUA FORM )
	
elseif($_GET['action']=="del_jemaat") //menangani aksi penghapusan data jemaat
{$id = $_GET['id'];
$test = mysql_query("delete from tbl_jemaat where id_jemaat='$id'");
if(mysql_affected_rows() == 1){ //jika jumlah baris data yang dikenai operasi delete == 1
echo '{"status":"1"}';}else{echo '{"status":"0"}';}exit;}

elseif($_GET['action']=="del_pend") //menangani aksi penghapusan data Pendidikan
{
$idpendidikan=$_REQUEST['idpendidikan'];
$test = mysql_query("delete from tbl_pendidikan where id_pendidikan='$idpendidikan'");
if(mysql_affected_rows() == 1){ //jika jumlah baris data yang dikenai operasi delete == 1
echo '{"status":"1"}';}else{echo '{"status":"0"}';}exit;}

elseif($_GET['action']=="del_kerjaan") //menangani aksi penghapusan data Pekerjaan
{$id = $_GET['idjemaat'];
$test = mysql_query("delete from tbl_pekerjaan where id_jemaat='$id'");
if(mysql_affected_rows() == 1){ //jika jumlah baris data yang dikenai operasi delete == 1
echo '{"status":"1"}';}else{echo '{"status":"0"}';}exit;}

elseif($_GET['action']=="del_nikahan") //menangani aksi penghapusan data nikah
{$id = $_GET['idnikahan'];
$test = mysql_query("delete from tbl_pernikahan where id_pernikahan='$id'");
if(mysql_affected_rows() == 1){ //jika jumlah baris data yang dikenai operasi delete == 1
echo '{"status":"1"}';}else{echo '{"status":"0"}';}exit;}

elseif($_GET['action']=="del_anak") //menangani aksi penghapusan data anak
{$id = $_GET['idelanak'];
$test = mysql_query("delete from tbl_jemaat where id_jemaat='$id'");
if(mysql_affected_rows() == 1){ //jika jumlah baris data yang dikenai operasi delete == 1
echo '{"status":"1"}';}else{echo '{"status":"0"}';}exit;}

elseif($_GET['action']=="del_baptis") //menangani aksi penghapusan data anak
{$id = $_GET['idbaptis'];
$test = mysql_query("delete from tbl_babtis where id_jemaat='$id'");
if(mysql_affected_rows() == 1){ //jika jumlah baris data yang dikenai operasi delete == 1
echo '{"status":"1"}';}else{echo '{"status":"0"}';}exit;}

elseif($_GET['action']=="del_usaha") //menangani aksi penghapusan data usaha
{$id = $_GET['idusaha'];
$test = mysql_query("delete from tbl_usaha where id_pasangan='$id'");
if(mysql_affected_rows() == 1){ //jika jumlah baris data yang dikenai operasi delete == 1
echo '{"status":"1"}';}else{echo '{"status":"0"}';}exit;}

elseif($_GET['action']=="del_ninggal") //menangani aksi penghapusan data meninggal
{$id = $_GET['idninggal'];
$test = mysql_query("delete from tbl_meninggal where id_jemaat='$id'");
if(mysql_affected_rows() == 1){ //jika jumlah baris data yang dikenai operasi delete == 1
echo '{"status":"1"}';}else{echo '{"status":"0"}';}exit;}

elseif($_GET['action']=="del_atestasi") //menangani aksi penghapusan data keluar/atestasi
{$id = $_GET['idatestasi'];
$test = mysql_query("delete from tbl_atestasi where id_jemaat='$id'");
if(mysql_affected_rows() == 1){ //jika jumlah baris data yang dikenai operasi delete == 1
echo '{"status":"1"}';}else{echo '{"status":"0"}';}exit;}

?>

