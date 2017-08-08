
<div class="info-title">
  <div class="bg-title"><span><?=$title_abc?></span></div>
</div>
<div class="info-content">
  <div class="text">
  	<p style="text-align: center;margin: 5px 0px; font-weight: bold">
	<?php for($i=0;$i<count($tintuc_khac);$i++) {if($i!=0){ echo " | ";}?><a href="thong-tin-bao-hanh/<?=$tintuc_khac[$i]['tenkhongdau']?>-<?=$tintuc_khac[$i]['id']?>.html"><?=$tintuc_khac[$i]['ten']?></a><?php } ?>
	</p>
    <?=$tintuc_detail['noidung']?>
  </div>
</div> 