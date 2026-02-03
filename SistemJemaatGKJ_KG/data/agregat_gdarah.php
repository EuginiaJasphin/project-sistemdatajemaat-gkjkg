<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>agregat jemaat berdasarkan usia</title>
</head>

<body>
<b>Data Jemaat Berdasar Golongan Darah:</b>
<hr color="#FF9900" size="1" width="98%" align="left" />
<? require("include/config.php"); ?>
<br>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr bgcolor="#E9E9E9">
    <td width="135" rowspan="2" bgcolor="#E9E9E9">Wilayah</td>
    <td colspan="4">Golongan Darah A </td>
    <td colspan="4">Golongan Darah B </td>
    <td colspan="4">Golongan Darah AB</td>
    <td colspan="4">Golongan Darah O </td>
  </tr>
  
  <tr bgcolor="#E9E9E9">
    <td width="65">L</td>
    <td width="64">P</td>
    <td width="73">Jumlah</td>
    <td width="93">&nbsp;</td>
    <td width="60">L</td>
    <td width="50">P</td>
    <td width="64">Jumlah</td>
    <td width="68">&nbsp;</td>
    <td width="68">L</td>
    <td width="65">P</td>
    <td width="82">Jumlah</td>
    <td width="66">&nbsp;</td>
    <td width="67">L</td>
    <td width="64">P</td>
    <td width="67">Jumlah</td>
    <td width="63">&nbsp;</td>
  </tr>
  <tr>
    <td>Wilayah&nbsp;I </td>
    <td bgcolor="#FFFFCC"><? 
    {$wil=01;$gdarah='A';
    include"data/f_darah.php";
    $j_laki= mysql_num_rows($b_laki);
	$j_perempuan= mysql_num_rows($b_perempuan);
	$j_jml=$j_laki+$j_perempuan;
	echo $j_laki; ?></td>
    <td bgcolor="#FFFFCC"><?= $j_perempuan; ?></td>
    <td bgcolor="#FFFFCC"><?= $j_jml;?><? }?></td>
    <td bgcolor="#FFFFCC"><a href="?act=kel_darah&gol=<?= $gdarah; ?>&wil=01">lihat</a></td>
    <td bgcolor="#FFECEC"><? 
    {$wil=01;$gdarah='B';
    include"data/f_darah.php";
    $j_laki= mysql_num_rows($b_laki);
	$j_perempuan= mysql_num_rows($b_perempuan);
	$j_jml=$j_laki+$j_perempuan;
	echo $j_laki; ?></td>
    <td bgcolor="#FFECEC"><?= $j_perempuan; ?></td>
    <td bgcolor="#FFECEC"><?= $j_jml;?>
    <? }?></td>
    <td bgcolor="#FFECEC"><a href="?act=kel_darah&gol=<?= $gdarah; ?>&wil=01">lihat</a></td>
    <td bgcolor="#EAEAFF"><? 
    {$wil=01;$gdarah='AB';
    include"data/f_darah.php";
    $j_laki= mysql_num_rows($b_laki);
	$j_perempuan= mysql_num_rows($b_perempuan);
	$j_jml=$j_laki+$j_perempuan;
	echo $j_laki; ?></td>
    <td bgcolor="#EAEAFF"><?= $j_perempuan; ?></td>
    <td bgcolor="#EAEAFF"><?= $j_jml;?>
      <? }?></td>
    <td bgcolor="#EAEAFF"><a href="?act=kel_darah&gol=<?= $gdarah; ?>&wil=01">lihat</a></td>
    <td bgcolor="#ECF5E2"><? 
    {$wil=01;$gdarah='O';
    include"data/f_darah.php";
    $j_laki= mysql_num_rows($b_laki);
	$j_perempuan= mysql_num_rows($b_perempuan);
	$j_jml=$j_laki+$j_perempuan;
	echo $j_laki; ?></td>
    <td bgcolor="#ECF5E2"><?= $j_perempuan; ?></td>
    <td bgcolor="#ECF5E2"><?= $j_jml;?>
      <? }?></td>
    <td bgcolor="#ECF5E2"><a href="?act=kel_darah&gol=<?= $gdarah; ?>&wil=01">lihat</a></td>
  </tr>
  <tr>
    <td>Wilayah&nbsp;II </td>
    <td bgcolor="#FFFFCC"><? 
    {$wil=02;$gdarah='A';
    include"data/f_darah.php";
    $j_laki= mysql_num_rows($b_laki);
	$j_perempuan= mysql_num_rows($b_perempuan);
	$j_jml=$j_laki+$j_perempuan;
	echo $j_laki; ?></td>
    <td bgcolor="#FFFFCC"><?= $j_perempuan; ?></td>
    <td bgcolor="#FFFFCC"><?= $j_jml;?>
    <? }?></td>
    <td bgcolor="#FFFFCC"><a href="?act=kel_darah&gol=<?= $gdarah; ?>&wil=02">lihat</a><a href="?act=kel_usia&kel=PAUD&wil=02&range=<?=$s5; echo"&nbsp;AND&nbsp;";echo $tahun; ?>"></a></td>
    <td bgcolor="#FFECEC"><? 
    {$wil=02;$gdarah='B';
    include"data/f_darah.php";
    $j_laki= mysql_num_rows($b_laki);
	$j_perempuan= mysql_num_rows($b_perempuan);
	$j_jml=$j_laki+$j_perempuan;
	echo $j_laki; ?></td>
    <td bgcolor="#FFECEC"><?= $j_perempuan; ?></td>
    <td bgcolor="#FFECEC"><?= $j_jml;?>
      <? }?></td>
    <td bgcolor="#FFECEC"><a href="?act=kel_darah&gol=<?= $gdarah; ?>&wil=02">lihat</a></td>
    <td bgcolor="#EAEAFF"><? 
    {$wil=02;$gdarah='AB';
    include"data/f_darah.php";
    $j_laki= mysql_num_rows($b_laki);
	$j_perempuan= mysql_num_rows($b_perempuan);
	$j_jml=$j_laki+$j_perempuan;
	echo $j_laki; ?></td>
    <td bgcolor="#EAEAFF"><?= $j_perempuan; ?></td>
    <td bgcolor="#EAEAFF"><?= $j_jml;?>
      <? }?></td>
    <td bgcolor="#EAEAFF"><a href="?act=kel_darah&gol=<?= $gdarah; ?>&wil=02">lihat</a></td>
    <td bgcolor="#ECF5E2"><? 
    {$wil=02;$gdarah='O';
    include"data/f_darah.php";
    $j_laki= mysql_num_rows($b_laki);
	$j_perempuan= mysql_num_rows($b_perempuan);
	$j_jml=$j_laki+$j_perempuan;
	echo $j_laki; ?></td>
    <td bgcolor="#ECF5E2"><?= $j_perempuan; ?></td>
    <td bgcolor="#ECF5E2"><?= $j_jml;?>
      <? }?></td>
    <td bgcolor="#ECF5E2"><a href="?act=kel_darah&gol=<?= $gdarah; ?>&wil=02">lihat</a></td>
  </tr>
  <tr>
    <td>Wilayah&nbsp;III </td>
    <td bgcolor="#FFFFCC"><? 
    {$wil=03;$gdarah='A';
    include"data/f_darah.php";
    $j_laki= mysql_num_rows($b_laki);
	$j_perempuan= mysql_num_rows($b_perempuan);
	$j_jml=$j_laki+$j_perempuan;
	echo $j_laki; ?></td>
    <td bgcolor="#FFFFCC"><?= $j_perempuan; ?></td>
    <td bgcolor="#FFFFCC"><?= $j_jml;?>
    <? }?></td>
    <td bgcolor="#FFFFCC"><a href="?act=kel_darah&gol=<?= $gdarah; ?>&wil=03">lihat</a><a href="?act=kel_usia&kel=PAUD&wil=03&range=<?=$s5; echo"&nbsp;AND&nbsp;";echo $tahun; ?>"></a></td>
    <td bgcolor="#FFECEC"><? 
    {$wil=03;$gdarah='B';
    include"data/f_darah.php";
    $j_laki= mysql_num_rows($b_laki);
	$j_perempuan= mysql_num_rows($b_perempuan);
	$j_jml=$j_laki+$j_perempuan;
	echo $j_laki; ?></td>
    <td bgcolor="#FFECEC"><?= $j_perempuan; ?></td>
    <td bgcolor="#FFECEC"><?= $j_jml;?>
      <? }?></td>
    <td bgcolor="#FFECEC"><a href="?act=kel_darah&gol=<?= $gdarah; ?>&wil=03">lihat</a></td>
    <td bgcolor="#EAEAFF"><? 
    {$wil=03;$gdarah='AB';
    include"data/f_darah.php";
    $j_laki= mysql_num_rows($b_laki);
	$j_perempuan= mysql_num_rows($b_perempuan);
	$j_jml=$j_laki+$j_perempuan;
	echo $j_laki; ?></td>
    <td bgcolor="#EAEAFF"><?= $j_perempuan; ?></td>
    <td bgcolor="#EAEAFF"><?= $j_jml;?>
      <? }?></td>
    <td bgcolor="#EAEAFF"><a href="?act=kel_darah&gol=<?= $gdarah; ?>&wil=03">lihat</a></td>
    <td bgcolor="#ECF5E2"><? 
    {$wil=03;$gdarah='O';
    include"data/f_darah.php";
    $j_laki= mysql_num_rows($b_laki);
	$j_perempuan= mysql_num_rows($b_perempuan);
	$j_jml=$j_laki+$j_perempuan;
	echo $j_laki; ?></td>
    <td bgcolor="#ECF5E2"><?= $j_perempuan; ?></td>
    <td bgcolor="#ECF5E2"><?= $j_jml;?>
      <? }?></td>
    <td bgcolor="#ECF5E2"><a href="?act=kel_darah&gol=<?= $gdarah; ?>&wil=03">lihat</a></td>
  </tr>
  <tr>
    <td>Wilayah&nbsp;IV </td>
    <td bgcolor="#FFFFCC"><? 
    {$wil=04;$gdarah='A';
    include"data/f_darah.php";
    $j_laki= mysql_num_rows($b_laki);
	$j_perempuan= mysql_num_rows($b_perempuan);
	$j_jml=$j_laki+$j_perempuan;
	echo $j_laki; ?></td>
    <td bgcolor="#FFFFCC"><?= $j_perempuan; ?></td>
    <td bgcolor="#FFFFCC"><?= $j_jml;?>
    <? }?></td>
    <td bgcolor="#FFFFCC"><a href="?act=kel_darah&gol=<?= $gdarah; ?>&wil=04">lihat</a><a href="?act=kel_usia&kel=PAUD&wil=04&range=<?=$s5; echo"&nbsp;AND&nbsp;";echo $tahun; ?>"></a></td>
    <td bgcolor="#FFECEC"><? 
    {$wil=04;$gdarah='B';
    include"data/f_darah.php";
    $j_laki= mysql_num_rows($b_laki);
	$j_perempuan= mysql_num_rows($b_perempuan);
	$j_jml=$j_laki+$j_perempuan;
	echo $j_laki; ?></td>
    <td bgcolor="#FFECEC"><?= $j_perempuan; ?></td>
    <td bgcolor="#FFECEC"><?= $j_jml;?>
      <? }?></td>
    <td bgcolor="#FFECEC"><a href="?act=kel_darah&gol=<?= $gdarah; ?>&wil=04">lihat</a></td>
    <td bgcolor="#EAEAFF"><? 
    {$wil=04;$gdarah='AB';
    include"data/f_darah.php";
    $j_laki= mysql_num_rows($b_laki);
	$j_perempuan= mysql_num_rows($b_perempuan);
	$j_jml=$j_laki+$j_perempuan;
	echo $j_laki; ?></td>
    <td bgcolor="#EAEAFF"><?= $j_perempuan; ?></td>
    <td bgcolor="#EAEAFF"><?= $j_jml;?>
      <? }?></td>
    <td bgcolor="#EAEAFF"><a href="?act=kel_darah&gol=<?= $gdarah; ?>&wil=04">lihat</a></td>
    <td bgcolor="#ECF5E2"><? 
    {$wil=04;$gdarah='O';
    include"data/f_darah.php";
    $j_laki= mysql_num_rows($b_laki);
	$j_perempuan= mysql_num_rows($b_perempuan);
	$j_jml=$j_laki+$j_perempuan;
	echo $j_laki; ?></td>
    <td bgcolor="#ECF5E2"><?= $j_perempuan; ?></td>
    <td bgcolor="#ECF5E2"><?= $j_jml;?>
      <? }?></td>
    <td bgcolor="#ECF5E2"><a href="?act=kel_darah&gol=<?= $gdarah; ?>&wil=04">lihat</a></td>
  </tr>
  <tr>
    <td>Wilayah&nbsp;v </td>
    <td bgcolor="#FFFFCC"><? 
    {$wil=05;$gdarah='A';
    include"data/f_darah.php";
    $j_laki= mysql_num_rows($b_laki);
	$j_perempuan= mysql_num_rows($b_perempuan);
	$j_jml=$j_laki+$j_perempuan;
	echo $j_laki; ?></td>
    <td bgcolor="#FFFFCC"><?= $j_perempuan; ?></td>
    <td bgcolor="#FFFFCC"><?= $j_jml;?>
    <? }?></td>
    <td bgcolor="#FFFFCC"><a href="?act=kel_darah&gol=<?= $gdarah; ?>&wil=05">lihat</a><a href="?act=kel_usia&kel=PAUD&wil=05&range=<?=$s5; echo"&nbsp;AND&nbsp;";echo $tahun; ?>"></a></td>
    <td bgcolor="#FFECEC"><? 
    {$wil=05;$gdarah='B';
    include"data/f_darah.php";
    $j_laki= mysql_num_rows($b_laki);
	$j_perempuan= mysql_num_rows($b_perempuan);
	$j_jml=$j_laki+$j_perempuan;
	echo $j_laki; ?></td>
    <td bgcolor="#FFECEC"><?= $j_perempuan; ?></td>
    <td bgcolor="#FFECEC"><?= $j_jml;?>
      <? }?></td>
    <td bgcolor="#FFECEC"><a href="?act=kel_darah&gol=<?= $gdarah; ?>&wil=05">lihat</a></td>
    <td bgcolor="#EAEAFF"><? 
    {$wil=05;$gdarah='AB';
    include"data/f_darah.php";
    $j_laki= mysql_num_rows($b_laki);
	$j_perempuan= mysql_num_rows($b_perempuan);
	$j_jml=$j_laki+$j_perempuan;
	echo $j_laki; ?></td>
    <td bgcolor="#EAEAFF"><?= $j_perempuan; ?></td>
    <td bgcolor="#EAEAFF"><?= $j_jml;?>
      <? }?></td>
    <td bgcolor="#EAEAFF"><a href="?act=kel_darah&gol=<?= $gdarah; ?>&wil=05">lihat</a></td>
    <td bgcolor="#ECF5E2"><? 
    {$wil=05;$gdarah='O';
    include"data/f_darah.php";
    $j_laki= mysql_num_rows($b_laki);
	$j_perempuan= mysql_num_rows($b_perempuan);
	$j_jml=$j_laki+$j_perempuan;
	echo $j_laki; ?></td>
    <td bgcolor="#ECF5E2"><?= $j_perempuan; ?></td>
    <td bgcolor="#ECF5E2"><?= $j_jml;?>
      <? }?></td>
    <td bgcolor="#ECF5E2"><a href="?act=kel_darah&gol=<?= $gdarah; ?>&wil=05">lihat</a></td>
  </tr>
  <tr>
    <td><b>JUMLAH</b></td>
    <td bgcolor="#DCFBC6"><? 
    {$wil=05;$gdarah='A';
    $bb_laki= mysql_query("SELECT * FROM tbl_jemaat WHERE jkel='L' AND goldarah='$gdarah'"); 
    $bb_perempuan= mysql_query("SELECT * FROM tbl_jemaat WHERE jkel='P' AND goldarah='$gdarah'");
    $jb_laki= mysql_num_rows($bb_laki);
	$jb_perempuan= mysql_num_rows($bb_perempuan);
	$jb_jml=$jb_laki+$jb_perempuan;
	echo $jb_laki; ?></td>
    <td bgcolor="#DCFBC6"><?= $jb_perempuan; ?></td>
    <td bgcolor="#DCFBC6"><?= $jb_jml;?>
      <? }?></td>
    <td bgcolor="#DCFBC6">&nbsp;</td>
    <td bgcolor="#DCFBC6"><? 
    {$wil=05;$gdarah='B';
    $bb_laki= mysql_query("SELECT * FROM tbl_jemaat WHERE jkel='L' AND goldarah='$gdarah'"); 
    $bb_perempuan= mysql_query("SELECT * FROM tbl_jemaat WHERE jkel='P' AND goldarah='$gdarah'");
    $jb_laki= mysql_num_rows($bb_laki);
	$jb_perempuan= mysql_num_rows($bb_perempuan);
	$jb_jml=$jb_laki+$jb_perempuan;
	echo $jb_laki; ?></td>
    <td bgcolor="#DCFBC6"><?= $jb_perempuan; ?></td>
    <td bgcolor="#DCFBC6"><?= $jb_jml;?>
      <? }?></td>
    <td bgcolor="#DCFBC6">&nbsp;</td>
    <td bgcolor="#DCFBC6"><? 
    {$wil=05;$gdarah='AB';
    $bb_laki= mysql_query("SELECT * FROM tbl_jemaat WHERE jkel='L' AND goldarah='$gdarah'"); 
    $bb_perempuan= mysql_query("SELECT * FROM tbl_jemaat WHERE jkel='P' AND goldarah='$gdarah'");
    $jb_laki= mysql_num_rows($bb_laki);
	$jb_perempuan= mysql_num_rows($bb_perempuan);
	$jb_jml=$jb_laki+$jb_perempuan;
	echo $jb_laki; ?></td>
    <td bgcolor="#DCFBC6"><?= $jb_perempuan; ?></td>
    <td bgcolor="#DCFBC6"><?= $jb_jml;?>
      <? }?></td>
    <td bgcolor="#DCFBC6">&nbsp;</td>
    <td bgcolor="#DCFBC6"><? 
    {$wil=05;$gdarah='O';
    $bb_laki= mysql_query("SELECT * FROM tbl_jemaat WHERE jkel='L' AND goldarah='$gdarah'"); 
    $bb_perempuan= mysql_query("SELECT * FROM tbl_jemaat WHERE jkel='P' AND goldarah='$gdarah'");
    $jb_laki= mysql_num_rows($bb_laki);
	$jb_perempuan= mysql_num_rows($bb_perempuan);
	$jb_jml=$jb_laki+$jb_perempuan;
	echo $jb_laki; ?></td>
    <td bgcolor="#DCFBC6"><?= $jb_perempuan; ?></td>
    <td bgcolor="#DCFBC6"><?= $jb_jml;?>
      <? }?></td>
    <td bgcolor="#DCFBC6">&nbsp;</td>
  </tr>
</table>
</body>
</html>
