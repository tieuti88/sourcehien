<div class="info-title">
  <div class="bg-title"><span><?=$title_abc?></span></div>
</div>
<div class="info-content">
  <div class="text">
	<p style="text-align: center;margin: 10px 0px; font-weight: bold">
	<?php for($i=0,$count_hotro = count($hotro); $i<$count_hotro; $i++) {if($i>0 && $i<$count_hotro){ echo " | ";}?><a href="ho-tro/<?=$hotro_item['tenkhongdau']?>/<?=$hotro[$i]['tenkhongdau']?>-<?=$hotro[$i]['id']?>.html" class="<?php if($i == 0){ echo " select";}?>" style=" text-transform: uppercase;"><?=$hotro[$i]['ten']?></a><?php } ?>
	</p>
    <?=$hotro[0]['noidung']?>
  </div>
</div> 