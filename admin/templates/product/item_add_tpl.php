<script type="text/javascript">
	tinyMCE.init({
		// General options
		mode : "exact",
        elements : "noidung_vi",
		theme : "advanced",
		convert_urls : false,
		plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,imagemanager,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave,visualblocks",
height:"500px",
    width:"100%",
	remove_script_host : false,

		// Theme options
		theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",		
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

		// Example content CSS (should be your site CSS)
		content_css : "css/content.css",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "lists/image_list.js",
		media_external_list_url : "lists/media_list.js",

		// Style formats
		style_formats : [
			{title : 'Bold text', inline : 'b'},
			{title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},
			{title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},
			{title : 'Example 1', inline : 'span', classes : 'example1'},
			{title : 'Example 2', inline : 'span', classes : 'example2'},
			{title : 'Table styles'},
			{title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}
		],

		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});
</script>
<?php
	
	function get_main_category()
	{
		$sql="select * from table_product_cat order by stt,id desc";
		$stmt=mysql_query($sql);
		$str='
			<select id="id_cat" name="id_cat" onchange="select_onchange()" class="main_font">
			<option value="0">Chọn danh mục</option>			
			';
		while ($row=@mysql_fetch_array($stmt)) 
		{
			if($row["id"]==(int)@$_REQUEST["id_cat"])
				$selected="selected";
			else 
				$selected="";
			$str.='<option value='.$row["id"].' '.$selected.'>'.$row["ten_vi"].'</option>';			
		}
		$str.='</select>';
		return $str;
	}
	
	
	function get_main_item()
	{
		$sql_huyen="select * from table_product_item where id_cat=".$_REQUEST['id_cat']." order by stt asc,id desc ";
		$result=mysql_query($sql_huyen);
		$str='
			<select id="id_item" name="id_item" onchange="select_onchange1()">
			<option value="0">Chọn danh mục</option>
			';
		while ($row_huyen=@mysql_fetch_array($result)) 
		{
			if($row_huyen["id"]==(int)@$_REQUEST["id_item"])
				$selected="selected";
			else 
				$selected="";
			$str.='<option value='.$row_huyen["id"].' '.$selected.'>'.$row_huyen["ten_vi"].'</option>';			
		}
		$str.='</select>';
		return $str;
	}
	
	function get_main_cat1()
	{
		$sql_huyen="select * from table_product_cat1 where id_item=".$_REQUEST['id_item']." order by stt asc,id desc ";
		$result=mysql_query($sql_huyen);
		$str='
			<select id="id_cat1" name="id_cat1">
			<option value="0">Chọn danh mục</option>
			';
		while ($row_huyen=@mysql_fetch_array($result)) 
		{
			if($row_huyen["id"]==(int)@$_REQUEST["id_cat1"])
				$selected="selected";
			else 
				$selected="";
			$str.='<option value='.$row_huyen["id"].' '.$selected.'>'.$row_huyen["ten_vi"].'</option>';			
		}
		$str.='</select>';
		return $str;
	}
	
	function get_main_type()
	{
		$sql="select * from table_product_type order by stt asc,id desc";
		$stmt=mysql_query($sql);
		$str='
			<select id="id_type" name="id_type"  class="main_font">
			<option value="0">Chọn danh mục</option>			
			';
		while ($row=@mysql_fetch_array($stmt)) 
		{
			if($row["id"]==(int)@$_REQUEST["id_type"])
				$selected="selected";
			else 
				$selected="";
			$str.='<option value='.$row["id"].' '.$selected.'>'.$row["ten_vi"].'</option>';			
		}
		$str.='</select>';
		return $str;
	}
	
	function get_main_team($id=0)
	{
		
		global $d;
		if($id){
		$sql="select id_cat1 from table_product_team where id_product=$id";
		$d->query($sql);
		$team = $d->result_array();
		
		for($i=0;$i<count($team);$i++){
			$temp[$i]=$team[$i]['id_cat1'];	
		}
		}
		$d->reset();
		$sql="select ten_vi,id from table_product_cat1 where id_item=".$_REQUEST['id_item']." order by stt asc,id desc";
		$d->query($sql);
		$row = $d->result_array();
		
		$str='';
		for($i=0;$i<count($row);$i++)
		{
			if($temp){	
				if(in_array($row[$i]['id'],$temp)){ $check = 'checked="checked"';}else{$check='';}
			}
			$str.=' | <input name="team[]" type="checkbox" value="'.$row[$i]["id"].'" '.$check.' /> '.$row[$i]["ten_vi"];			
		}
		return $str;
	}
	
	function get_main_team_color($id=0)
	{
		
		global $d;
		if($id){
		$sql="select id_color from table_product_team_color where id_product=$id";
		$d->query($sql);
		$team = $d->result_array();
		
		for($i=0;$i<count($team);$i++){
			$temp[$i]=$team[$i]['id_color'];	
		}
		}
		$d->reset();
		$sql="select ten_vi,id,photo from table_product_scolor order by stt asc,id desc";
		$d->query($sql);
		$row = $d->result_array();
		
		$str='';
		for($i=0;$i<count($row);$i++)
		{
			if($temp){	
				if(in_array($row[$i]['id'],$temp)){ $check = 'checked="checked"';}else{$check='';}
			}
			$str.='<input name="team_color[]" type="checkbox" value="'.$row[$i]["id"].'" '.$check.' /> <img src="'._upload_sanpham.$row[$i]["photo"].'"><br/>';			
		}
		return $str;
	}

		
?>

<form name="frm" method="post" action="index.php?com=product&act=save&curPage=<?=$_REQUEST['curPage']?>" enctype="multipart/form-data" class="nhaplieu">
    <table style="width:100%" border="0">
    	
    	<tr>
        	<td align="left">
            	<b>Tiêu đề </b> <input type="text" name="ten_vi" value="<?=@$item['ten_vi']?>" class="input" /><br /><br /><br />
                <b>Title </b> <input type="text" name="title_vi" value="<?=$item['title_vi']?>" class="input" /><br />
                <b>Keywords </b>
                
                 <textarea name="keywords_vi" id="keywords_vi" cols="40" rows="7" class="input"><?=$item['keywords_vi']?></textarea>
                <br />
                
                <b>Description </b>
                
                 <textarea name="description_vi" id="description_vi" cols="40" rows="7" class="input"><?=$item['description_vi']?></textarea>
                <br />
                
            </td>
            
        </tr>
    </table>
	<br /><br />
  
    <?php if ($_REQUEST['act']=='edit')
	{?>
	<b>Hình hiện tại:</b><img src="<?=_upload_sanpham.$item['thumb']?>"  width="120" alt="NO PHOTO" /><br />
	<?php }?>
	<b>Hình ảnh:</b> <input type="file" name="file" /> <strong> .jpg|.gif|.png - Width: 700px | Height: 386px</strong><br />
    <br />
	<b>Mô tả</b><textarea name="mota_vi" id="mota_vi" cols="40" rows="7" class="input"><?=$item['mota_vi']?></textarea><br />
   
	
    <b>Nội dung</b><br/>
	<div>
	 	<textarea name="noidung_vi" id="noidung_vi"><?=$item['noidung_vi']?></textarea>
	 </div>
    <br/>

    <b>Số thứ tự</b> <input type="text" name="stt" value="<?=isset($item['stt'])?$item['stt']:1?>" style="width:30px"><br>
   	<b>Hiển thị</b> <input type="checkbox" name="hienthi" <?=(!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?>><br /> 
	<input type="hidden" name="id" id="id" value="<?=@$item['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=product&act=man'" class="btn" />
</form>