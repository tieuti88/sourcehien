
  <div class="info-title"><div class="icon-info"></div><h2><?=$title_abc?></h2></div>
  <div class="info-content">
  <div class="text">
  <?php if($tintuc){?>
    <?php for($i=1; $i<=count($tintuc); $i++){?>
    	<div class="box-news">
        	<div class="box-news-name"><h2><a href="huong-dan/<?=$tintuc[$i-1]['tenkhongdau']?>-<?=$tintuc[$i-1]['id']?>.html" title="<?=$tintuc[$i-1]['ten']?>"><?=$tintuc[$i-1]['ten']?></a></h2></div>
            <div class="box-news-post"><p style="font-style: italic;"><?=date('d-m-Y - h:i A',$tintuc[$i-1]['ngaytao'])?> - Lượt xem: <?=$tintuc[$i-1]['luotxem']?>
    </p></div>
        	<div class="box-news-img"><a href="huong-dan/<?=$tintuc[$i-1]['tenkhongdau']?>-<?=$tintuc[$i-1]['id']?>.html" title="<?=$tintuc[$i-1]['ten']?>"><img alt="<?=$tintuc[$i-1]['ten']?>" src="<?=_upload_tintuc_l.$tintuc[$i-1]['photo']?>" /></a></div>
            
            <div class="box-news-mota"><?=$tintuc[$i-1]['mota']?><a href="tin-tuc/<?=$tintuc[$i-1]['tenkhongdau']?>-<?=$tintuc[$i-1]['id']?>.html" />Chi tiết</a></div>
            
        </div><!-- .box-news -->
    <?php } ?>
    <div class="clear" style="text-align: center"><?=$paging['paging']?></div>
    <?php }else{?><div style="color:#F00; padding: 10px; font-size: 17px; text-align:center; font-weight: bold;">Nội dung chưa cập nhật. Xin vui lòng xem chuyên mục khác.</div><?php }?>
    </div>
  </div>
 