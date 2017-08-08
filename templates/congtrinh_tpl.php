
  <div class="info-title"><div class="bg-title"><span><?=$title_abc?></span></div></div>
  <div class="info-content">
  <?php if($tintuc){?>
    <?php for($i=1; $i<=count($tintuc); $i++){?>
    	<div class="box-news<?php if($i%2 == 0){echo "-even";}?>">
        	<div class="box-news-name"><a href="cong-trinh/<?=$tintuc[$i-1]['tenkhongdau']?>-<?=$tintuc[$i-1]['id']?>.html" title="<?=$tintuc[$i-1]['ten']?>"><?=$tintuc[$i-1]['ten']?></a></div>
        	<div class="box-news-img"><a href="cong-trinh/<?=$tintuc[$i-1]['tenkhongdau']?>-<?=$tintuc[$i-1]['id']?>.html" title="<?=$tintuc[$i-1]['ten']?>"><img alt="<?=$tintuc[$i-1]['ten']?>" src="<?=_upload_tintuc_l.$tintuc[$i-1]['thumb']?>" width="110px" height="92px"></a></div>
            
            <div class="box-news-mota"><?=$tintuc[$i-1]['mota']?></div>
            <div class="box-news-readmore"><a href="cong-trinh/<?=$tintuc[$i-1]['tenkhongdau']?>-<?=$tintuc[$i-1]['id']?>.html" t>Xem tiếp</a></div>
        </div><!-- .box-news -->
        <?php if($i%2==0){?><div class="clear" style="border-bottom:1px solid #333"></div><?php } ?>
    <?php } ?>
    <div class="clear" style="text-align: right"><?=$paging['paging']?></div>
    <?php }else{?><div style="color:#F00; padding: 10px; font-size: 13px; text-align:center; font-weight: bold;">Nội dung chưa cập nhật. Xin vui lòng xem chuyên mục khác.</div><?php }?>
  </div>
 