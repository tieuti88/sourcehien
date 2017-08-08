<div class="info-title"><h2><?=$title_abc?></h2></div>
<div class="info-content">
<?php if($tintuc){?>
<?php for($i=1; $i<=count($tintuc); $i++){?>
	<div class="box-news<?php if($i%2 == 0){echo "-even";}?>">
		<div class="box-news-name"><a href="<?=$lang?>/service/<?=$tintuc[$i-1]['tenkhongdau']?>-<?=$tintuc[$i-1]['id']?>.html" title="<?=stripcslashes($tintuc[$i-1]['ten_'.$lang])?>" class="transitionAll"><?=stripcslashes($tintuc[$i-1]['ten_'.$lang])?></a></div>
		<div class="box-news-img"><a href="<?=$lang?>/service/<?=$tintuc[$i-1]['tenkhongdau']?>-<?=$tintuc[$i-1]['id']?>.html" title="<?=stripcslashes($tintuc[$i-1]['ten_'.$lang])?>"><img alt="<?=stripcslashes($tintuc[$i-1]['ten_'.$lang])?>" src="<?=_upload_tintuc_l.$tintuc[$i-1]['thumb']?>" width="150px" height="125px"></a></div>
		
		<div class="box-news-mota"><?=_substr(stripcslashes($tintuc[$i-1]['mota_'.$lang]),380)?></div>
		<div class="box-news-readmore"><a href="<?=$lang?>/service/<?=$tintuc[$i-1]['tenkhongdau']?>-<?=$tintuc[$i-1]['id']?>.html" class="transitionAll"><?=_readmore?></a></div>
	</div><!-- .box-news -->
	<?php if($i%2==0){?><div class="clear" style="border-bottom:1px solid #FFF"></div><?php } ?>
<?php } ?>
<div class="pagination"><?=$paging['paging']?></div>
<?php }else{?><div style="color:#F00; padding: 10px; font-size: 13px; text-align:center; font-weight: bold;"><?=_tb?></div><?php }?>
</div>