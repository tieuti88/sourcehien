<script type="text/javascript">

	tinyMCE.init({

		// General options

		mode : "exact",

        elements : "noidung_vi,noidung_en",

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



<h3>Bài viết</h3>

<script language="javascript">			

	function select_onchange()

	{		

		var b=document.getElementById("id_cat");

		window.location ="index.php?com=branch&act=<?php if($_REQUEST['act']=='edit') echo 'edit'; else echo 'add';?><?php if($_REQUEST['id']!='') echo"&id=".$_REQUEST['id']; ?>&id_cat="+b.value;	

		return true;

	}

	

	function select_onchange1()

	{		

		var b=document.getElementById("id_cat");

		var c=document.getElementById("id_item");

		window.location ="index.php?com=branch&act=<?php if($_REQUEST['act']=='edit') echo 'edit'; else echo 'add';?><?php if($_REQUEST['id']!='') echo"&id=".$_REQUEST['id']; ?>&id_cat="+b.value+"&id_item="+c.value;	

		return true;

	}



	

</script>

<?php

	

function get_main_category()

	{

		$sql="select * from table_branch_cat order by stt asc,id desc";

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

		$sql_huyen="select * from table_branch_item where id_cat=".$_REQUEST['id_cat']." order by stt asc,id desc ";

		$result=mysql_query($sql_huyen);

		$str='

			<select id="id_item" name="id_item">

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



?>





<form name="frm" method="post" action="index.php?com=branch&act=save&curPage=<?=$_REQUEST['curPage']?>" enctype="multipart/form-data" class="nhaplieu">

    

	

	<table style="width:100%" border="0">

    	

    	<tr>

        	<td align="left">

            	<b>Tiêu đề</b> <input type="text" name="ten_vi" value="<?=stripcslashes($item['ten_vi'])?>" class="input" /><br /><br /><br />

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

	

	<?php if ($_REQUEST['act']=='edit')

	{?>

	<b>Hình hiện tại:</b><img src="<?=_upload_tintuc.$item['thumb']?>"  width="100" alt="NO PHOTO" /><br />

	<?php }?>

	<b>Hình ảnh:</b> <input type="file" name="file" /> <strong> .jpg|.gif|.png - Width: 100px | Height: 100px</strong><br />

    <br />

    

    

    <b>Mô tả</b>

	<div>

	 <textarea name="mota_vi" id="mota_vi" cols="50" rows="8"><?=$item['mota_vi']?></textarea></div>

    <br />


    <b>Nội dung</b><br/>

	<div>

	 <textarea name="noidung_vi" id="noidung_vi"><?=stripcslashes($item['noidung_vi'])?></textarea></div>

    <br/>

    <b>Số thứ tự</b> <input type="text" name="stt" value="<?=isset($item['stt'])?$item['stt']:1?>" style="width:30px"><br>

   	<b>Hiển thị</b> <input type="checkbox" name="hienthi" <?=(!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?>><br /> 

	<input type="hidden" name="id" id="id" value="<?=@$item['id']?>" />

	<input type="submit" value="Lưu" class="btn" />

	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=branch&act=man'" class="btn" />

</form>