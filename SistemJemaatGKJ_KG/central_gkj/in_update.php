<?
session_start();
?>
<br><br>
<div id="divSearch">
  <form id="formSearch">
    <table><tr>
      <td>Cari Berdasarkan</td><td><select id="pilihcari"> 
        <option value="namajemaat">Nama Jemaat</option>
        <option value="idjemaat">ID Jemaat</option>
        <option value="semua">Semua</option>
        </select></td>
    <td id="kolompilih"><input type="text" name="fieldcari" id="fieldcari" /></td><td>
      <input type="submit" value="Cari" /></td>
    </tr></table>
  </form>
</div>
<div id="divLoading"></div><div id="divPageData"></div> 
<br />
<div id="divFormContent"></div>