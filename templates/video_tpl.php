
<div class="info-title"><h2><?=$title_abc?></h2></div>
<div class="info-content" style="margin-top: 7px;background: url(images/bg_content.png) repeat;">
  <?php if($product){?>
  <?php for($i=1, $count = count($product); $i<=$count; $i++){?>
  	<div class="box-sp">
      <div class="box-sp-img"><a href="<?=$lang?>/video/<?=$product[$i-1]['tenkhongdau']?>-<?=$product[$i-1]['id']?>.html" title="<?=$product[$i-1]['ten_'.$lang]?>"><img src="<?=_upload_sanpham_l.$product[$i-1]['thumb']?>" width="218" height="218" alt="<?=$product[$i-1]['ten_'.$lang]?>" /></a></div>
      
      <div class="box-sp-name">
        <h3><a href="<?=$lang?>/video/<?=$product[$i-1]['tenkhongdau']?>-<?=$product[$i-1]['id']?>.html" title="<?=$product[$i-1]['ten_'.$lang]?>" class="transitionAll" style="color: #FFF;"><?=$product[$i-1]['ten_'.$lang]?></a></h3>
      </div><!-- .box-sp-name -->
	  
    </div>
    <!-- .box -->
    <?php if($i%4==0){?><div class="clear"></div><?php } ?>
    <?php } ?>
    <div class="pagination"><?=$paging['paging']?></div>
    <?php }else{?><div style="text-align:center"><b style="color:#F00; font-size: 20px;"><?=_tb?></b></div><?php } ?>
</div>