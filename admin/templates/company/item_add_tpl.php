<h3>Cập nhật thông tin công ty</h3>

<form name="frm" method="post" action="index.php?com=company&act=save" enctype="multipart/form-data" class="nhaplieu">

	<b>Ngôn ngữ mặc định</b> <input type="radio" value="vi" name="lang" <?php if($item['lang'] == 'vi' || $item['lang'] == ''){echo 'checked="checked"';}?> /> Việt Nam  <input type="radio" value="en" name="lang" <?php if($item['lang'] == 'en'){echo 'checked="checked"';}?> /> English<br /><br />
    <table style="width:100%" border="0">
    	<tr>
        	<td align="left">
            	<b>Slogan</b> <input type="text" name="ten_vi" value="<?=$item['ten_vi']?>" class="input" /><br />
                <b>Title</b> <input type="text" name="title_vi" value="<?=$item['title_vi']?>" class="input" /><br />
                <b>Keywords</b>
                
                 <textarea name="keywords_vi" id="keywords_vi" cols="40" rows="7" class="input"><?=$item['keywords_vi']?></textarea>
                <br />
                
                <b>Description</b>
                
                 <textarea name="description_vi" id="description_vi" cols="40" rows="7" class="input"><?=$item['description_vi']?></textarea>
                <br />
                
            </td>
        </tr>
    </table>
	<br /><br />
	<b>Address</b> <input type="text" name="address_vi" value="<?=$item['address_vi']?>" class="input" /><br />
    <b>Hotline:</b> <input type="text" name="hotline" value="<?=$item['hotline']?>" class="input" /><br /><br>
    <b>Email</b> <input type="text" name="email" value="<?=$item['email']?>" class="input" /><br /><br>
    <b>Website</b> <input type="text" name="website" value="<?=$item['website']?>" class="input" /><br /><br>
	
	<input type="hidden" name="id" id="id" value="<?=@$item['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=company&act=capnhat'" class="btn" />
</form>