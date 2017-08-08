
<div class="info-title"><h2><?=$title_abc?></h2></div>

<div class="info-content">
	
	<div id="left">
		<div class="left" style="border-right: 1px solid #ccc;">
			<div class="title"><h2><a href="<?=$lang?>/news/" class="transitionAll "><?=_news?></a></h2></div>
			<div class="title"><h2><a href="<?=$lang?>/service/" class="transitionAll"><?=_service?></a></h2></div>
			<div class="title"><h2><a href="<?=$lang?>/account/" class="transitionAll"><?=_account?></a></h2></div>
			<div class="content">
			<p><a href="<?=$lang?>/account/history-order.html" class="transitionAll active"><?=_history_order?></a></p>
			<p><a href="<?=$lang?>/account/personal.html" class="transitionAll"><?=_personal?></a></p>
			<p><a href="<?=$lang?>/account/change-password.html" class="transitionAll"><?=_repass?></a></p>
			
			</div>
			<div class="title"><h2><a href="<?=$lang?>/contact/" class="transitionAll"><?=_contact?></a></h2></div>
		</div>
	</div><!-- #left -->
	
	
	<div id="right">
		<div class="right"> 
			
			<table border="0" cellspacing="3">
				<tr>
					<td style="width:200px;"><b><?=_madh?>:</b></td>
					<td><strong><?=@$donhang_detail['madonhang']?></strong></td>
				</tr>
				<tr>
					<td><b >Tên công ty & cá nhân: </b></td>
					<td><strong><?=@$donhang_detail['hoten']?></strong></td>
				</tr>
				<tr>
					<td><b >Địa chỉ:</b></td>
					<td><strong><?=@$donhang_detail['diachi']?></strong></td>
				</tr>
				
				<tr>
					<td><b >Điện thoại:</b> </td>
					<td><strong><?=@$donhang_detail['dienthoai']?></strong></td>
				</tr>
				
				<tr>
					<td><b >Email:</b> </td>
					<td><strong><?=@$donhang_detail['email']?></strong></td>
				</tr>
				
			</table>
		   
			<div><?php $noidung = str_replace('../','',$donhang_detail['donhang']); echo $noidung;?></div>
			
		</div>
	</div>
	

</div>
