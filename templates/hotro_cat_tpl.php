<div class="info-title">
  <div class="bg-title"><span>Hướng dẫn hỗ trợ</span></div>
</div>
<div class="info-content">
	<?php for($i=1,$count = count($hotro_item); $i<=$count; $i++){?>
	<div class="category">
    	<div class="category-title"><a href="ho-tro/<?=$hotro_item[$i-1]['tenkhongdau']?>/"><span><?=$hotro_item[$i-1]['ten']?></span></a></div>
        <div class="category-content">
        	<ul>
			<?php 
				$d->reset();
				$sql= "select id,ten,tenkhongdau from #_thongtin where hienthi=1 and id_item='".$hotro_item[$i-1]['id']."'";
				$d->query($sql);
				$hotro = $d->result_array();
				for($j=0; $j<count($hotro); $j++){
			?>
            <li <?php if($j==0){?>id="first-cat-nav"<?php } ?>><a href="ho-tro/<?=$hotro_item[$i-1]['tenkhongdau']?>/<?=$hotro[$j]['tenkhongdau']?>-<?=$hotro[$j]['id']?>.html"><?=$hotro[$j]['ten']?></a></li>
            <?php } ?>
            </ul>
        </div>
    </div><!-- .category -->
    <?php if($i%2==0){?><div class="clear"></div><?php }} ?>
</div><!-- .info-content --> 
