<script type="text/javascript">
	$(function(){
		$('#btn').click(function(evt){
			onSearch(evt);
		});
	});
	function onSearch(evt){
		var keyword = $('#keyword');
		var idc = $('#idc');
		
		if( keyword.val() == '' && idc.val()==''){alert('Bạn chưa nhập thông tin tìm kiếm!'); keyword.focus(); return false;}
		
		$('#frm_search').submit();
		
	}
	
	function doEnter(evt){
	// IE					// Netscape/Firefox/Opera
	var key;
	if(evt.keyCode == 13 || evt.which == 13){
		onSearch(evt);
	}else{
		return false;	
	}
	}
</script>
<?php

	$d->reset();
	$sql = "select ten_$lang,id from #_product_cat where hienthi=1 order by stt asc,id desc";
	$d->query($sql);
	$search_cat = $d->result_array();
	
?>

<div id="search">
    <form  id="frm_search" name="frm_search" method="get" action="index.php">
	  <input type="hidden" name="lang" value="<?=$lang?>">
	  <input type="hidden" name="com" value="search">
	  <span class="label"><?=_tkiem?>: </span>	
	  <input type="text" name="keyword" id="keyword" class="element-search" value="<?=$_GET['keyword']?>" placeholder="<?=_tk?>">
      <select id="idc" name="idc" class="element-search">
        <option value=""> -- <?=_cdm?> -- </option>
        <?php for($i=0;$i<count($search_cat);$i++){?>
        	<option value="<?=$search_cat[$i]['id']?>" <?php if($search_cat[$i]['id'] == $_GET['idc']){echo 'selected="selected"';}?>> <?=$search_cat[$i]['ten_'.$lang]?> </option>
        <?php } ?>
      </select>
	  <span class="label"><?=_cost?>: </span>
      <input type="number" name="price-from" id="price-from" min="50000" class="element-search" placeholder="Giá từ" style="width: 100px" value="<?=$_GET['price-from']?>" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
	  <input type="number" name="price-to" id="price-to" min="50000" class="element-search" placeholder="Giá đến" style="width: 100px" value="<?=$_GET['price-to']?>" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
	  
      <div id="btn"></div>
    </form>
</div>
<!-- #search -->