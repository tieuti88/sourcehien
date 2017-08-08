<h3> Thêm danh mục cấp 1</h3>

<form name="frm" method="post" action="index.php?com=news1&act=save" enctype="multipart/form-data" class="nhaplieu">		    

	<table style="width:100%" border="0">
    	<tr>
        	<td align="left">
            	<b>Tiêu đề (VI)</b> <input type="text" name="ten_vi" value="<?=@$item['ten_vi']?>" class="input" /><br /><br /><br />
                <b>Title (VI)</b> <input type="text" name="title_vi" value="<?=$item['title_vi']?>" class="input" /><br />
                <b>Keywords (VI)</b>
                
                 <textarea name="keywords_vi" id="keywords_vi" cols="40" rows="7" class="input"><?=$item['keywords_vi']?></textarea>
                <br />
                
                <b>Description (VI)</b>
                
                 <textarea name="description_vi" id="description_vi" cols="40" rows="7" class="input"><?=$item['description_vi']?></textarea>
                <br />
                
            </td>
            <td>
            	<b>Tiêu đề (EN)</b> <input type="text" name="ten_en" value="<?=@$item['ten_en']?>" class="input" /><br /><br /><br />
                <b>Title (EN)</b> <input type="text" name="title_en" value="<?=$item['title_en']?>" class="input" /><br />
                <b>Keywords (EN)</b>
                
                 <textarea name="keywords_en" id="keywords_en" cols="40" rows="7" class="input"><?=$item['keywords_en']?></textarea>
                <br />
                
                <b>Description (EN)</b>
               
                 <textarea name="description_en" id="description_en" cols="40" rows="7" class="input"><?=$item['description_en']?></textarea>
                <br />
                
            </td>
        </tr>
    </table>
	<br /><br />
    
    <b>Số thứ tự</b> <input type="text" name="stt" value="<?=isset($item['stt'])?$item['stt']:1?>" style="width:30px"><br>

	<b>Hiển thị</b> <input type="checkbox" name="hienthi" <?=(!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?>><br />
	
	<input type="hidden" name="id" id="id" value="<?=@$item['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=news1&act=man'" class="btn" />
</form>