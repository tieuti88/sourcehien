<h3> Cập nhật meta cho website</h3>

<form name="frm" method="post" action="index.php?com=meta&act=save" enctype="multipart/form-data" class="nhaplieu">
	
	<b>Nhập Thông Tin:</b> 
	<label>
	<textarea name="ten" id="ten" cols="45" rows="5"><?=@$item['ten']?></textarea>
	</label>
  <br><br />
	
	<input type="hidden" name="id" id="id" value="<?=@$item['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=meta&act=capnhat'" class="btn" />
</form>