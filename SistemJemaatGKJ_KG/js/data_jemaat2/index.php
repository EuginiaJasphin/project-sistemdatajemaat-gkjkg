<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>:: Data Jemaat GKJ Kotagede ::</title>
<script language="JavaScript">
<!--
function mmLoadMenus() {
  if (window.mm_menu_0119100157_0) return;
                          window.mm_menu_0119100157_0 = new Menu("root",172,18,"Geneva, Arial, Helvetica, sans-serif",12,"#FFE2C4","#FFE2C4","#C56801","#333333","left","middle",3,0,1100,-5,7,true,false,true,0,false,true);
  mm_menu_0119100157_0.addMenuItem("Data&nbsp;Kepala&nbsp;Keluarga","location='?act=datakk'");
  mm_menu_0119100157_0.addMenuItem("Data&nbsp;detail&nbsp;jemaat","location='?act=datadetail'");
  mm_menu_0119100157_0.addMenuItem("Data&nbsp;ulangtahun&nbsp;jemaat","location='?act=ultah'");
  mm_menu_0119100157_0.addMenuItem("Data&nbsp;ulangtahun&nbsp;pernikahan","location='?act=pernikahan'");
  mm_menu_0119100157_0.addMenuItem("Data&nbsp;jemaat&nbsp;meninggal","location='?act=meninggal'");
   mm_menu_0119100157_0.hideOnMouseOut=true;
   mm_menu_0119100157_0.bgColor='#555555';
   mm_menu_0119100157_0.menuBorder=1;
   mm_menu_0119100157_0.menuLiteBgColor='#FFFFFF';
   mm_menu_0119100157_0.menuBorderBgColor='#777777';
    window.mm_menu_0119101107_0 = new Menu("root",179,18,"Geneva, Arial, Helvetica, sans-serif",12,"#FFE2C4","#FFE2C4","#C56801","#333333","left","middle",3,0,1100,-5,7,true,false,true,0,false,true);
  mm_menu_0119101107_0.addMenuItem("Berdasar&nbsp;kelompok&nbsp;usia","location='?act=usia'");
  mm_menu_0119101107_0.addMenuItem("Berdasar&nbsp;pekerjaan","location='?act=kerjaan'");
  mm_menu_0119101107_0.addMenuItem("Berdasar&nbsp;status&nbsp;keanggotaan","location='?act=keaktifan'");
  mm_menu_0119101107_0.addMenuItem("Berdasar&nbsp;gol.darah","location='?act=darah'");
  mm_menu_0119101107_0.addMenuItem("Berdasar&nbsp;status&nbsp;babtis","location='?act=baptis'");
  mm_menu_0119101107_0.addMenuItem("Berdasar&nbsp;status&nbsp;sidi","location='?act=sidi'");
   mm_menu_0119101107_0.hideOnMouseOut=true;
   mm_menu_0119101107_0.bgColor='#555555';
   mm_menu_0119101107_0.menuBorder=1;
   mm_menu_0119101107_0.menuLiteBgColor='#FFFFFF';
   mm_menu_0119101107_0.menuBorderBgColor='#777777';

mm_menu_0119101107_0.writeMenus();
} // mmLoadMenus()
//-->
</script>
<script language="JavaScript" src="mm_menu.js"></script>

<script language="JavaScript">
var gAutoPrint = true; // Tells whether to automatically call the print function

function printSpecial()
{
if (document.getElementById != null)
{
var html = '<HTML>\n<HEAD>\n';

if (document.getElementsByTagName != null)
{
var headTags = document.getElementsByTagName("head");
if (headTags.length > 0)
html += headTags[0].innerHTML;
}

html += '\n</HE>\n<BODY>\n';

var printReadyElem = document.getElementById("printReady");

if (printReadyElem != null)
{
html += printReadyElem.innerHTML;
}
else
{
alert("Could not find the printReady function");
return;
}

html += '\n</BO>\n</HT>';

var printWin = window.open("","printSpecial");
printWin.document.open();
printWin.document.write(html);
printWin.document.close();
if (gAutoPrint)
printWin.print();
}
else
{
alert("The print ready feature is only available if you are using an browser. Please update your browswer.");
}
}

</script>
</head>
<link rel="stylesheet" type="text/css" href="css/style-page.css">
<body>
<script language="JavaScript1.2">mmLoadMenus();</script>
<div align="center"> <img src="images/headergkj.gif">
    <table width="800" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td><div align="right"><a href="../data_jemaat/"><b>home</b></a> | <a href="#" name="link5" id="link1" onMouseOver="MM_showMenu(window.mm_menu_0119100157_0,0,16,null,'link5')" onMouseOut="MM_startTimeout();"><b>Data Jemaat</b></a> | <a href="#" name="link4" id="link3" onMouseOver="MM_showMenu(window.mm_menu_0119101107_0,0,16,null,'link4')" onMouseOut="MM_startTimeout();"><b>Data Agregat</b></a> | <a href="central_gkj/"><b>Login</b></a> &nbsp;&nbsp;&nbsp;</div>
            <br>
            <br><div id="printReady"> 
            <?php
switch ($_REQUEST['act'])
{ 
    // data jemaat
	case ''		  				:include "home.php"; break;
	case 'datakk'				:include "data/v_datakk.php"; break;
	case 'datadetail'			:include "data/v_datajemaat.php"; break;
	case 'ultah'				:include "data/v_ultah.php"; break;
	case 'meninggal'			:include "data/v_meninggal.php"; break;
	case 'pernikahan'			:include "data/v_ultahnikah.php"; break;
	case 'datarekap'			:include "data/v_rekap.php"; break;
	
    // data agregat
	case 'usia'					:include "data/agregat_usia.php"; break;
	case 'kerjaan'				:include "data/agregat_kerja.php"; break;
	case 'keaktifan'			:include "data/agregat_aktif.php"; break;
	case 'baptis'				:include "data/agregat_baptis.php"; break;
	case 'sidi'					:include "data/agregat_sidi.php"; break;
	case 'darah'				:include "data/agregat_gdarah.php"; break;
	
    // data kelompok
	case 'kel_usia'				:include "data/kel_usia.php"; break;
	case 'kel_kerja'			:include "data/kel_kerja.php"; break;
	case 'kel_aktif'			:include "data/kel_aktif.php"; break;
	case 'kel_baptis'			:include "data/kel_baptis.php"; break;
	case 'kel_sidi'				:include "data/kel_sidi.php"; break;
	case 'kel_darah'			:include "data/kel_darah.php"; break;
	
	// data detail
	case 'data_detail'			:include "data/detail_all.php";break;
}
?></div></td>
      </tr>
    </table>
  Sistem data jemaat GKJ Jogja Selatan<br>
  Sekretariat : Jl. Depokan II Nomor 184 Kotagede Yogyakarta 55172. <br>
  Telp. (0274) 375010, email info@gkj-kotagede.com<br>
</div>
</body>
</html>
