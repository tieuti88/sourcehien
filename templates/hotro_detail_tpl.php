<div class="info-title">
  <div class="bg-title"><span><?=$title_abc?></span></div>
</div>
<div class="info-content">
  <div class="text">
	<p style="text-align: center;margin: 5px 0px; font-weight: bold">
	<?php for($i=0,$count_hotro = count($hotro_khac); $i<$count_hotro; $i++) {if($i!=0){ echo " | ";}?><a href="ho-tro/<?=$hotro_item['tenkhongdau']?>/<?=$hotro_khac[$i]['tenkhongdau']?>-<?=$hotro_khac[$i]['id']?>.html" class="<?php if($_GET['id'] == $hotro_khac[$i]['id']){ echo " select";}?>" style=" text-transform: uppercase;"><?=$hotro_khac[$i]['ten']?></a><?php } ?>
	</p>
    <?=$hotro_detail['noidung']?>
  </div>
</div> 