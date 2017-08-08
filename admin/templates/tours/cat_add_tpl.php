<h3>Thêm danh mục</h3>

<form name="frm" method="post" action="index.php?com=tours&act=save_cat" enctype="multipart/form-data" class="nhaplieu">
	<b>Tên</b> <input type="text" name="ten" value="<?=$item['tenloai']?>" class="input" /><br /><br>   
    <b>Thể loại</b><select name="theloai">
    	<option value="1" <?=($item['id_cat']==1)?'selected':''?> >Du lịch nước ngoài</option>
        <option value="2" <?=($item['id_cat']==2)?'selected':''?>>Du lịch trong nước</option>
        <option value="3" <?=($item['id_cat']==3)?'selected':''?>>Tour lẻ trong tuần</option>
     </select><br />
	
	<input type="hidden" name="id" id="id" value="<?=@$item['idloai']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=tours&act=man_cat'" class="btn" />
</form>
