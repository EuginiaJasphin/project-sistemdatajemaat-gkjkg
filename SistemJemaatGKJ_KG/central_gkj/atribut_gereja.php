<!doctype html>
<html lang="en">
<head>
<title>:: entry data gereja ::</title>
<!-- Milik popup dialog -->
<link type="text/css" href="../central_gkj/theme/ui.all.css" rel="stylesheet" />
	<script type="text/javascript" src="../central_gkj/jquery-1.3.2.js"></script>
	<script type="text/javascript" src="../central_gkj/ui/ui.core.js"></script>
	<script type="text/javascript" src="../central_gkj/ui/ui.draggable.js"></script>
	<script type="text/javascript" src="../central_gkj/ui/ui.resizable.js"></script>
	<script type="text/javascript" src="../central_gkj/ui/ui.dialog.js"></script>
	<script type="text/javascript" src="../central_gkj/ui/effects.core.js"></script>
	<script type="text/javascript" src="../central_gkj/ui/effects.highlight.js"></script>
	<script type="text/javascript" src="../central_gkj/external/bgiframe/jquery.bgiframe.js"></script>

<!-- Untuk data gereja -->
<script type="text/javascript">
	$(function() {
		
		var nama= $("#nama"),
			alamat = $("#alamat"),
			allFields = $([]).add(nama).add(alamat),
			tips = $("#gerejavalidateTips");

		function updateTips(t) {
			tips.text(t).effect("highlight",{},1500);
		}

		function checkLength(o,n,min,max) {

			if ( o.val().length > max || o.val().length < min ) {
				o.addClass('ui-state-error');
				updateTips("karakter " + n + " antara "+min+" sampai "+max+".");
				return false;
			} else {
				return true;
			}

		}

		function checkRegexp(o,regexp,n) {

			if ( !( regexp.test( o.val() ) ) ) {
				o.addClass('ui-state-error');
				updateTips(n);
				return false;
			} else {
				return true;
			}

		}
		
		$("#dialoggereja").dialog({
			bgiframe: true,
			autoOpen: false,
			height: 250,
			width: 350,
			modal: true,
			buttons: {
				'tambah': function() {
					var bValid = true;
					allFields.removeClass('ui-state-error');

					bValid = bValid && checkLength(nama,"nama",3,50);
			
					if (bValid) {
						$.ajax({
						type: "POST",
						url: "proses_atribut.php",
						data: $('#buat-gereja').serialize(),
						dataType: "json",
						success: function(msg){
			
						if(parseInt(msg.status)==1)
						{
						error(0,msg.txt);
							$('#users tbody').append('<tr>' +
							'<td>' + msg.npsn + '</td>' + 
							'</tr>');
						}
						else if(parseInt(msg.status)==0)
						{
						error(1,msg.txt);
						}
			
						//hideshow('loading',0);
						}
						
						});
					
					function error(act,txt)
					{
					//hideshow('error',act);
					if(txt) { 
					$('#error').html(txt); 
					}
					}
							/*$('#users tbody').append('<tr>' +
							'<td>' + name.val() + '</td>' + 
							'<td>' + email.val() + '</td>' + 
							'<td>' + password.val() + '</td>' +
							'</tr>');*/
									 
						$(this).dialog('close');
					}
				},
				Cancel: function() {
					$(this).dialog('close');
				}
			},
			close: function() {
				allFields.val('').removeClass('ui-state-error');
			}
		});
		
		
		
		$('#tambah-gereja').click(function() {
			$('#dialoggereja').dialog('open');
		})
		.hover(
			function(){ 
				$(this).addClass("ui-state-hover"); 
			},
			function(){ 
				$(this).removeClass("ui-state-hover"); 
			}
		).mousedown(function(){
			$(this).addClass("ui-state-active"); 
		})
		.mouseup(function(){
				$(this).removeClass("ui-state-active");
		});

	});
	</script>
</head>
<div class="demo">
<div id="dialoggereja" title="Tambah gereja">
	<p id="gerejavalidateTips">Semua form harus diisi.</p>

	<form method="post" name="buat-gereja" id="buat-gereja">
	<fieldset><table width="100%" border="0" valign="middle"><tr><td height="32" valign="middle">
		<label for="nama">Nama Gereja</label></td><td>
		<input type="text" name="nama" id="nama" value="" class="text ui-widget-content ui-corner-all" /></td></tr>
		<tr><td><label for="alamat">Alamat Lengkap</label></td><td>
		<input type="text" name="alamat" id="alamat" value="" class="text ui-widget-content ui-corner-all" />
		</td></tr><tr><td colspan="2">
		<input type="hidden" name="tambahgereja" value="tambahgereja"/>
		</td></tr>
		</table>
	</fieldset>
	</form>
</div>
<!-- <div id="users-contain" class="ui-widget"> -->
<div id="error"></div>
<button id="tambah-gereja" class="ui-button ui-state-default ui-corner-all">Tambah Gereja</button>
</div>
</body>
</html>