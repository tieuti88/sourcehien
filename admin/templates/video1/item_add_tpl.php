<h3> Thêm danh mục cấp 1</h3>

<form name="frm" method="post" action="index.php?com=video1&act=save" enctype="multipart/form-data" class="nhaplieu">		    

	<b>Tên</b> <input type="text" name="ten" value="<?=$item['ten']?>" class="input" /><br /><br>
    <b>Title :</b> <input type="text" name="title" value="<?=$item['title']?>" class="input" style="width:500px;" /><br /><br>
	<b>Keywords :</b> <textarea name="keywords" cols="50" rows="6"><?=$item['keywords']?></textarea><br /><br>
    <b>Description :</b> <textarea name="description" cols="50" rows="6"><?=$item['description']?></textarea><br /><br>
    <b>Số thứ tự</b> <input type="text" name="stt" value="<?=isset($item['stt'])?$item['stt']:1?>" style="width:30px"><br>

	<b>Hiển thị</b> <input type="checkbox" name="hienthi" <?=(!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?>><br />
	
	<input type="hidden" name="id" id="id" value="<?=@$item['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=video1&act=man'" class="btn" />
</form>