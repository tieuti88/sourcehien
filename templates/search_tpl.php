
<div class="info-title"><h2><?=_search2." <b style='color: #FF9900;'>".count($product)."</b> "._result;?></h2></div>
<div class="info-content">
  <?php if($product){?>
  <?php for($i=1,$count = count($product); $i<=$count; $i++){
		 	$d->reset();
			 $sql = "select id,tenkhongdau from #_product_cat where id='".$product[$i-1]['id_cat']."'";
			 $d->query($sql);
			 $product_cat = $d->fetch_array();
			 if($product_cat){$url_1=$product_cat['tenkhongdau']."/";}else{$url_1='';}
			 
			 $d->reset();
			 $sql = "select id,tenkhongdau from #_product_item where id='".$product[$i-1]['id_item']."'";
			 $d->query($sql);
			 $product_item = $d->fetch_array();
			 if($product_item){$url_2=$product_item['tenkhongdau']."/";}else{$url_2='';}

			 $d->reset();
			 $sql = "select id,tenkhongdau from #_product_cat1 where id='".$product[$i-1]['id_cat1']."'";
			 $d->query($sql);
			 $product_cat1 = $d->fetch_array();
			 if($product_cat1){$url_3=$product_cat1['tenkhongdau']."-".$product_cat1['id']."/";}else{$url_3='';}	
	?>
  	<div class="box-sp">
	  
      <div class="box-sp-name">
        <h3><a href="<?=$lang?>/product/<?=$url_1?><?=$url_2?><?=$url_3?><?=$product[$i-1]['tenkhongdau']?>-<?=$product[$i-1]['id']?>.html" title="<?=$product[$i-1]['ten_'.$lang]?>" class="transitionAll"><?=$product[$i-1]['ten_'.$lang]?></a></h3>
      </div><!-- .box-sp-name -->
	  
      <div class="box-sp-img"><a href="<?=$lang?>/product/<?=$url_1?><?=$url_2?><?=$url_3?><?=$product[$i-1]['tenkhongdau']?>-<?=$product[$i-1]['id']?>.html" title="<?=$product[$i-1]['ten_'.$lang]?>"><img src="<?=_upload_sanpham_l.$product[$i-1]['thumb']?>" width="208" height="185" alt="<?=$product[$i-1]['ten_'.$lang]?>" onmouseover="doTooltip(event, &#39;<?=_upload_sanpham_l.$product[$i-1]['thumb']?>&#39;)" onmouseout="hideTip()" /></a></div>
      
      
	  <div class="box-sp-price">
		<p class="cost"><?=_cost?>: <span><?php if($product[$i-1]['giaban'] !=0){echo number_format($product[$i-1]['giaban'])." vnđ";}else{ echo _contact;}?></span></p>
		<p class="detail"><a href="<?=$lang?>/product/<?=$url_1?><?=$url_2?><?=$url_3?><?=$product[$i-1]['tenkhongdau']?>-<?=$product[$i-1]['id']?>.html" title="<?=$product[$i-1]['ten_'.$lang]?>"><?=_ct?></a></p>
	  </div>
    </div>
    <!-- .box -->
    <?php if($i%4==0){?><div class="clear"></div><?php } ?>
    <?php } ?>
    <div class="pagination"><?=$paging['paging']?></div>
    <?php }else{?><div style="text-align:center"><b style="color:#F00; font-size: 20px;"><?=_tb?></b></div><?php } ?>
</div>