<h3><a href="index.php?com=catalogue&act=add">Thêm Catalogue</a></h3>
<form action="#" method="post" name="frmLIST_catalogue" id="frmLIST_catalogue">
  <table class="blue_table">
    <tr>
      <th style="width:5%;">Stt</th>
      <th style="width:30%;">Tiêu đề</th>
      <th style="width:30%;">Hình ảnh</th>
      <th style="width:8%;">Thêm hình ảnh</th>
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
      <td style="width:5%;"><?=$items[$i]['stt']?></td>
      
      <td align="center" style="width:30%;"><a href="index.php?com=catalogue&act=edit&id=<?=$items[$i]['id']?><?php if($_REQUEST['curPage']!='') echo'&curPage='. $_REQUEST['curPage'];?>" style="text-decoration:none;"><?=$items[$i]['ten']?></a></td>
      
      <td align="center" style="width:30%;"><a href="index.php?com=catalogue&act=edit&id=<?=$items[$i]['id']?><?php if($_REQUEST['curPage']!='') echo'&curPage='. $_REQUEST['curPage'];?>" style="text-decoration:none;"><img src="<?=_upload_hinhanh.$items[$i]['thumb']?>" width="150px"></a></td>
        
      <td style="width:10%;"><a href="index.php?com=catalogue&act=man_photo&id_catalogue=<?=$items[$i]['id']?>">Thêm ảnh</a></td>
      <td style="width:5%;"><?php 
		if(@$items[$i]['hienthi']==1)
		{
		?>
        <a href="index.php?com=catalogue&act=man&hienthi=<?=$items[$i]['id']?><?php if($_REQUEST['curPage']!='') echo'&curPage='. $_REQUEST['curPage'];?>"><img src="media/images/active_1.png" border="0" /></a>
        <? 
		}
		else
		{
		?>
        <a href="index.php?com=catalogue&act=man&hienthi=<?=$items[$i]['id']?><?php if($_REQUEST['curPage']!='') echo'&curPage='. $_REQUEST['curPage'];?>"><img src="media/images/active_0.png"  border="0"/></a>
        <?php
		 }?></td>
      <td style="width:5%;"><a href="index.php?com=catalogue&act=edit&id=<?=$items[$i]['id']?><?php if($_REQUEST['curPage']!='') echo'&curPage='. $_REQUEST['curPage'];?>"><img src="media/images/edit.png" border="0" /></a></td>
      <td style="width:5%;"><a href="index.php?com=catalogue&act=delete<?php if($_REQUEST['curPage']!='') echo "&curPage=".$_REQUEST['curPage'];?>&id=<?=$items[$i]['id']?>" onClick="if(!confirm('Xác nhận xóa')) return false;"><img src="media/images/delete.png" border="0" /></a></td>
    </tr>
    <?php	}?>
  </table>
</form>
<a href="index.php?com=catalogue&act=add"><img src="media/images/add.jpg" border="0"  /></a>
<div class="paging">
  <?=$paging['paging']?>
</div>
