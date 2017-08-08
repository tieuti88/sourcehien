<script type="text/javascript">
	
	function checkValue(){
		
		if($('#oldpass').attr('value') == ''){
			$('<span style="font-size: 15px;color: #F00"> *</span>').insertAfter('#oldpass');
			$('#oldpass').focus();
			return false;	
		}
		if($('#pass').attr('value') == ''){
			$('<span style="font-size: 15px;color: #F00"> *</span>').insertAfter('#pass');
			$('#pass').focus();
			return false;	
		}
		if($('#repass').attr('value') == ''){
			$('<span style="font-size: 15px;color: #F00"> *</span>').insertAfter('#repass');
			$('#repass').focus();
			return false;	
		}
		document.frm_re_pass.submit();
		
	}
	
</script>

<div class="info-title"><h2><?=$title_abc?></h2></div>

<div class="info-content">
	<div id="left">
		<div class="left" style="border-right: 1px solid #ccc;">
			<div class="title"><h2><a href="<?=$lang?>/news/" class="transitionAll "><?=_news?></a></h2></div>
			<div class="title"><h2><a href="<?=$lang?>/service/" class="transitionAll"><?=_service?></a></h2></div>
			<div class="title"><h2><a href="<?=$lang?>/account/" class="transitionAll"><?=_account?></a></h2></div>
			<div class="content">
				<p><a href="<?=$lang?>/account/history-order.html" class="transitionAll"><?=_history_order?></a></p>
				<p><a href="<?=$lang?>/account/personal.html" class="transitionAll"><?=_personal?></a></p>
				<p><a href="<?=$lang?>/account/change-password.html" class="transitionAll active"><?=_repass?></a></p>
			
			</div>
			<div class="title"><h2><a href="<?=$lang?>/contact/" class="transitionAll"><?=_contact?></a></h2></div>
		</div>
	</div><!-- #left -->
	
	<div id="right">
		<div class="right">
			
			<p style="text-align:center; font-weight: bold; color: #777;"><?=_re_pass?></p>
			<form method="post" action="" id="frm_re_pass" name="frm_re_pass">
				<table cellspacing="10" style="width: 550px;">
					
				  <tr>
					<td><span style="font-weight: bold; color:#036;"><?=_oldpass?></span></td>
					<td><input type="password" name="oldpass" id="oldpass" value="" style="width: 250px;" class="input" /></td>
				  </tr>
				  
				  <tr>
					<td><span style="font-weight: bold; color:#036;"><?=_newpass?></span></td>
					<td><input type="password" name="pass" id="pass" value="" style="width: 250px;" class="input" /></td>
				  </tr>
				  
				  <tr>
					<td><span style="font-weight: bold; color:#036;"><?=_newspass?></span></td>
					<td><input type="password" name="repass" id="repass" value="" style="width: 250px;" class="input" /></td>
				  </tr>
				  
				  <tr>
					<td></td>
					<td ><input type="button" value="<?=_capnhat?>" class="button" onclick="checkValue()" /></td>
				  </tr>
				</table>
			</form>
			
		</div>
	</div>

</div>

