<div class="info-title"><h2><?=$title_abc?></h2></div>
<div class="info-content">
	<div class="text">
		<div style="float:left;border-radius:10px;"><iframe width="504" height="363" src="http://www.youtube.com/embed/<?=$product_detail['video']?>" frameborder="0" allowfullscreen></iframe></div>
		<div style="float:right;width:390px;"><h2><?=$product_detail['ten_'.$lang]?></h2><?=$product_detail['noidung_'.$lang]?></div>
	</div><!-- .text -->
</div>

<div class="info-title"><h2>Other Video</h2></div>
<div class="info-content">
	<?php for($i=1, $count = count($product_khac); $i<=$count; $i++){?>
  	<div class="box-sp">
      <div class="box-sp-img"><a href="<?=$lang?>/video/<?=$product_khac[$i-1]['tenkhongdau']?>-<?=$product_khac[$i-1]['id']?>.html" title="<?=$product_khac[$i-1]['ten_'.$lang]?>"><img src="<?=_upload_sanpham_l.$product_khac[$i-1]['thumb']?>" width="218" height="218" alt="<?=$product_khac[$i-1]['ten_'.$lang]?>" /></a></div>
      
      <div class="box-sp-name">
        <h3><a href="<?=$lang?>/video/<?=$product_khac[$i-1]['tenkhongdau']?>-<?=$product_khac[$i-1]['id']?>.html" title="<?=$product_khac[$i-1]['ten_'.$lang]?>" class="transitionAll" style="color: #FFF;"><?=$product_khac[$i-1]['ten_'.$lang]?></a></h3>
      </div><!-- .box-sp-name -->
	  
    </div>
    <!-- .box -->
    <?php if($i%4==0){?><div class="clear"></div><?php } ?>
    <?php } ?>
</div>

