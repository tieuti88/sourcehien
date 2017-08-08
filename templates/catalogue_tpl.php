

  <div class="info-title"><div class="bg-title"><span><?=$title_abc?></span></div></div>
  <div class="info-content">
  <?php if($catalogue){?>
  <?php for($i=1, $count = count($catalogue); $i<=$count; $i++){?>
  	<div class="box-sp">
      <div class="box-sp-img"><a href="catalogue/<?=$catalogue[$i-1]['tenkhongdau']?>-<?=$catalogue[$i-1]['id']?>.html" title="<?=$catalogue[$i-1]['ten']?>"><img src="<?=_upload_hinhanh_l.$catalogue[$i-1]['thumb']?>" width="170" height="120" alt="<?=$catalogue[$i-1]['ten']?>"></a></div>
      <div class="box-sp-name">
        <p style="text-align:center;"><a href="catalogue/<?=$catalogue[$i-1]['tenkhongdau']?>-<?=$catalogue[$i-1]['id']?>.html" title="<?=$catalogue[$i-1]['ten']?>"><?=$catalogue[$i-1]['ten']?></a></p>
      </div>
    </div>
    <!-- .box -->
    <?php if($i%3==0){?><div class="clear"></div><?php } ?>
    <?php } ?>
    <div style="text-align:center; clear:both; display:block; padding: 10px 0px;"><?=$paging['paging']?></div>
    <?php }else{?><div style="text-align:center"><b style="color:#F00; font-size: 17px;">Chưa cập nhật Catalogue</b></div><?php } ?>
</div>
