
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
			
			<?php if($donhang){?>
			<table style="width: 100%; margin: 5px 0px;">
			  <tr bgcolor="#3d3d3d" style="color: #FFF;text-align: center;height:30px;">
				<th style="width: 5%; padding: 6px;"><?=_stt?></th>
				<th style="width: 50%; padding: 6px;"><?=_madh?></th>
				<th style="width: 20%; padding: 6px;"><?=_trangthai?></th>
				<th style="width: 20%; padding: 6px;"><?=_tong?></th>
			  </tr>
			<?php for($i=1,$count = count($donhang);$i<=$count;$i++){?>
			  <tr align="center" <?php if($i%2==0){?>bgcolor="#E1E1E1"<?php }else{ ?>bgcolor="#F0F0F0"<?php } ?>>
				<td style="padding: 4px;"><?=$i;?></td>
				<td style="padding: 4px;"><a href="<?=$lang?>/account/history-order/ma-so-<?=$donhang[$i-1]['id']?>.html"><?=$donhang[$i-1]['madonhang']?></a></td>
				<td style="padding: 4px;">
					<?php 
						$sql="select trangthai from #_tinhtrang where id= '".$donhang[$i-1]['trangthai']."' ";
						$d->query($sql);
						$result=$d->fetch_array();
						echo $result['trangthai'];
				   ?>
				</td>
				<td style="padding: 4px;"><?=number_format($donhang[$i-1]['tonggia'])?> Vnđ</td>
			  </tr>	
			<?php } ?>
			</table>
			<?php }else{?><div class="clear" style="color: #F00;text-align: center;padding: 10px;"><h2><?=_tb?></h2></div><?php } ?>
			
		</div>
	</div>
	

</div>