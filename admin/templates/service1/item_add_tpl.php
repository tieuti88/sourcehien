<h3> Thêm danh mục cấp 1</h3>

<form name="frm" method="post" action="index.php?com=service1&act=save" enctype="multipart/form-data" class="nhaplieu">		    

	<b>Tiêu đề (VI)</b> <input type="text" name="ten_vi" value="<?=@$item['ten_vi']?>" class="input" /><br />
    <b>Tiêu đề (EN)</b> <input type="text" name="ten_en" value="<?=@$item['ten_en']?>" class="input" /><br />
    <b>Tiêu đề (CN)</b> <input type="text" name="ten_cn" value="<?=@$item['ten_cn']?>" class="input" /><br />
	
	<b>Title (VI)</b> <input type="text" name="title_vi" value="<?=$item['title_vi']?>" class="input" style="width:500px" /><br /><br />
	<b>Description (VI)</b>
	<div>
	 <textarea name="description_vi" id="description_vi" cols="50" rows="5"><?=$item['description_vi']?></textarea></div>
    <br />
	<b>Keywords (VI)</b>
	<div>
	 <textarea name="keywords_vi" id="keywords_vi" cols="50" rows="5"><?=$item['keywords_vi']?></textarea></div>
    <br />
	
	
	<b>Title (EN)</b> <input type="text" name="title_en" value="<?=$item['title_en']?>" class="input" style="width:500px" /><br /><br />
	<b>Description (EN)</b>
	<div>
	 <textarea name="description_en" id="description_en" cols="50" rows="5"><?=$item['description_en']?></textarea></div>
    <br />
	<b>Keywords (EN)</b>
	<div>
	 <textarea name="keywords_en" id="keywords_en" cols="50" rows="5"><?=$item['keywords_en']?></textarea></div>
    <br />
    
    <b>Title (CN)</b> <input type="text" name="title_cn" value="<?=$item['title_cn']?>" class="input" style="width:500px" /><br /><br />
	<b>Description (CN)</b>
	<div>
	 <textarea name="description_cn" id="description_cn" cols="50" rows="5"><?=$item['description_cn']?></textarea></div>
    <br />
	<b>Keywords (CN)</b>
	<div>
	 <textarea name="keywords_cn" id="keywords_cn" cols="50" rows="5"><?=$item['keywords_cn']?></textarea></div>
    <br />
    
    <b>Số thứ tự</b> <input type="text" name="stt" value="<?=isset($item['stt'])?$item['stt']:1?>" style="width:30px"><br>

	<b>Hiển thị</b> <input type="checkbox" name="hienthi" <?=(!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?>><br />
	
	<input type="hidden" name="id" id="id" value="<?=@$item['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=service1&act=man'" class="btn" />
</form>