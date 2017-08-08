
<div class="info-title"><div class="bg-title"><span><?=$title_abc?></span></div></div>
<div class="info-content">
  <?php if($catalogue_photo){?>
  <?php for($i=1, $count = count($catalogue_photo); $i<=$count; $i++){?>
  	<div class="box-sp">
      <div class="box-sp-img"><a href="<?=_upload_hinhanh_l.$catalogue_photo[$i-1]['photo']?>" title="<?=$catalogue_detail['ten']?>" rel="colorbox" class="cboxElement"><img src="<?=_upload_hinhanh_l.$catalogue_photo[$i-1]['thumb']?>" width="223" height="223" alt="<?=$catalogue_photo[$i-1]['ten']?>"></a></div>
    </div>
    <!-- .box -->
    <?php if($i%3==0){?><div class="clear"></div><?php } ?>
    <?php } ?>
    <?php }else{?><div style="text-align:center"><b style="color:#F00; font-size: 20px;">Chưa cập nhật Catalogue</b></div><?php } ?>
</div>
<!-- .info-content -->