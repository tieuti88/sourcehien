<h3><a href="index.php?com=thuvien&act=add">Thêm thư viện</a></h3>
<form action="#" method="post" name="frmLIST_thuvien" id="frmLIST_thuvien">
<table class="blue_table">
	<tr>
		<th style="width:5%;">Id</th>		
        <th style="width:30%;">Danh mục</th>		
        <th style="width:50%;">Tên</th>              
        <th style="width:5%;">Hiển thị</th>
		<th style="width:5%;">Sửa</th>
		<th style="width:5%;">Xóa</th>
            <input name="ids" type="hidden" id="ids">
            <input name="mod" type="hidden" id="mod">
            <input name="strID" type="hidden" id="strID">
            <input name="txtLIST_ID" type="hidden" id="txtLIST_ID" value="<?=$_POST['txtLIST_ID']?>">
	</tr>
	<?php for($i=0, $count=count($items); $i<$count; $i++){?>
	<tr>
		<td style="width:5%;"> <a href="index.php?com=thuvien&act=edit&id_item=<?=$items[$i]['id_item']?>&id=<?=$items[$i]['id']?>&curPage=<?=$_REQUEST['curPage']?>" style="text-decoration:none;"><?=$items[$i]['id']?></a></td>		             
	    <td align="center" style="width:30%;">
        
        <?php
		$sql_danhmuc="select ten from table_thuvien_item where id='".$items[$i]['id_item']."'";
		$result=mysql_query($sql_danhmuc);
	 	$item_danhmuc =mysql_fetch_array($result);
	 	echo @$item_danhmuc['ten']
	?>
        
        
        </td>
      <td align="center" style="width:50%;">
	 <a href="index.php?com=thuvien&act=edit&id_item=<?=$items[$i]['id_item']?>&id=<?=$items[$i]['id']?><?php if($_REQUEST['curPage']!='') echo'&curPage='. $_REQUEST['curPage'];?>" style="text-decoration:none;">
	  <?=$items[$i]['ten']?> 
      </a>      </td>                      
       
                  
          <td style="width:5%;">
		<?php 
		if(@$items[$i]['hienthi']==1)
		{
		?>
        
        <a href="index.php?com=thuvien&act=man&hienthi=<?=$items[$i]['id']?><?php if($_REQUEST['id_danhmuc']!='') echo'&id_danhmuc='. $_REQUEST['id_danhmuc'];?><?php if($_REQUEST['id_cat']!='') echo'&id_cat='. $_REQUEST['id_cat'];?><?php if($_REQUEST['id_item']!='') echo'&id_item='. $_REQUEST['id_item'];?><?php if($_REQUEST['curPage']!='') echo'&curPage='. $_REQUEST['curPage'];?>"><img src="media/images/active_1.png" border="0" /></a>
		<? 
		}
		else
		{
		?>
         <a href="index.php?com=thuvien&act=man&hienthi=<?=$items[$i]['id']?><?php if($_REQUEST['id_danhmuc']!='') echo'&id_danhmuc='. $_REQUEST['id_danhmuc'];?><?php if($_REQUEST['id_cat']!='') echo'&id_cat='. $_REQUEST['id_cat'];?><?php if($_REQUEST['id_item']!='') echo'&id_item='. $_REQUEST['id_item'];?><?php if($_REQUEST['curPage']!='') echo'&curPage='. $_REQUEST['curPage'];?>"><img src="media/images/active_0.png"  border="0"/></a>
         <?php
		 }?>        </td>
         
         
		<td style="width:5%;"><a href="index.php?com=thuvien&act=edit&id_item=<?=$items[$i]['id_item']?>&id=<?=$items[$i]['id']?><?php if($_REQUEST['id_cat']!='') echo'&id_cat='. $_REQUEST['id_cat'];?><?php if($_REQUEST['curPage']!='') echo'&curPage='. $_REQUEST['curPage'];?>"><img src="media/images/edit.png" border="0" /></a></td>
		<td style="width:5%;"><a href="index.php?com=thuvien&act=delete<?php if($_REQUEST['id_cat']!='') echo "&id_cat=".$_REQUEST['id_cat'];?><?php if($_REQUEST['curPage']!='') echo "&curPage=".$_REQUEST['curPage'];?>&id=<?=$items[$i]['id']?>" onClick="if(!confirm('Xác nhận xóa')) return false;"><img src="media/images/delete.png" border="0" /></a></td>
	</tr>
	<?php	}?>
</table>
</form>
<a href="index.php?com=thuvien&act=add"><img src="media/images/add.jpg" border="0"  /></a>
<div class="paging"><?=$paging['paging']?></div>