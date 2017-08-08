<?php	if(!defined('_source')) die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";
$id=$_REQUEST['id'];
if(isset($_REQUEST['id_video'])){$_SESSION['id_video']=(int)$_REQUEST['id_video'];}
switch($act){

	case "man":
		get_items();
		$template = "video/items";
		break;
	case "add":		
		$template = "video/item_add";
		break;
	case "edit":		
		get_item();
		$template = "video/item_add";
		break;
	case "save":
		save_item();
		break;
	case "delete":
		delete_item();
		break;
	#===================================================	
	case "man_cat":
		get_cats();
		$template = "video/cats";
		break;
	case "add_cat":		
		$template = "video/cat_add";
		break;
	case "edit_cat":		
		get_cat();
		$template = "video/cat_add";
		break;
	case "save_cat":
		save_cat();
		break;
	case "delete_cat":
		delete_cat();
		break;
	#=======================================================	
	case "man_photo":
		get_photos();
		$template = "video/photo";
		break;
	case "add_photo":		
		$template = "video/photo_add";
		break;
	case "edit_photo":		
		get_photo();
		$template = "video/photo_edit";
		break;
	case "save_photo":
		save_photo();
		break;
	case "delete_photo":
		delete_photo();
		break;		
	default:
		$template = "index";
}

#====================================
function fns_Rand_digit($min,$max,$num)
	{
		$result='';
		for($i=0;$i<$num;$i++){
			$result.=rand($min,$max);
		}
		return $result;	
	}

function get_items(){
	global $d, $items, $paging;
	if($_REQUEST['update']!='')
	{
	$id_up = $_REQUEST['update'];
	$spdc=time();
	$sql_sp = "SELECT id,spdc FROM table_video where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$spdc1=$cats[0]['spdc'];
	if($spdc1==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_video SET spdc ='".$spdc."' WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_video SET spdc =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");

	}	
	}
	
	if($_REQUEST['hot']!='')
	{
	$id_up = $_REQUEST['hot'];
	$sql_spbc = "SELECT id,spbanchay FROM table_video where id='".$id_up."' ";
	$d->query($sql_spbc);
	$spbanchay= $d->result_array();
	$spbc1=$spbanchay[0]['spbanchay'];
	if($spbc1==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_video SET spbanchay ='1' WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_video SET spbanchay =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");

	}	
	}
	
	if($_REQUEST['new']!='')
	{
	$id_up = $_REQUEST['new'];
	$sql_spmoi = "SELECT id,spmoi FROM table_video where id='".$id_up."' ";
	$d->query($sql_spmoi);
	$row_spmoi= $d->result_array();
	$spmoi1=$row_spmoi[0]['spmoi'];
	if($spmoi1==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_video SET spmoi ='1' WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_video SET spmoi =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");

	}	
	}
	
	if($_REQUEST['khuyenmai']!='')
	{
	$id_up = $_REQUEST['khuyenmai'];
	$sql_spmoi = "SELECT id,khuyenmai FROM table_video where id='".$id_up."' ";
	$d->query($sql_spmoi);
	$row_spmoi= $d->result_array();
	$khuyenmai=$row_spmoi[0]['khuyenmai'];
	if($khuyenmai==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_video SET khuyenmai ='1' WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_video SET khuyenmai =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");

	}	
	}
	
	
	if($_REQUEST['spdc']!='')
	{
	$id_up = $_REQUEST['spdc'];
	$sql_sp = "SELECT id,spdc FROM table_video where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$spdc1=$cats[0]['spdc'];
	if($spdc1==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_video SET spdc =1 WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_video SET spdc =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");

	}	
	}
	#----------------------------------------------------------------------------------------
	if($_REQUEST['hienthi']!='')
	{
	$id_up = $_REQUEST['hienthi'];
	$sql_sp = "SELECT id,hienthi FROM table_video where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$hienthi=$cats[0]['hienthi'];
	if($hienthi==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_video SET hienthi =1 WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_video SET hienthi =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}	
	}
	#-------------------------------------------------------------------------------
	$sql = "select * from #_video where id !=0";
	
	if((int)$_REQUEST['id_cat']!='')
	{
	$sql.=" and id_cat=".(int)$_REQUEST['id_cat']."";
	}
	
	if((int)$_REQUEST['id_item']!='')
	{
	$sql.=" and id_item=".(int)$_REQUEST['id_item']."";
	}
	
	if($_REQUEST['search']!='')
	{
	$ten = trim($_REQUEST['search']);
	$sql.=" and ten like '%$ten%'";
	}
	
	$sql.=" order by stt asc,id desc";
	
	$d->query($sql);
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=video&act=man";
	$maxR=20;
	$maxP=20;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

function get_item(){
	global $d, $item;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
		transfer("Không nhận được dữ liệu", "index.php?com=video&act=man");
	
	$sql = "select * from #_video where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=video&act=man");
	$item = $d->fetch_array();
	
	
}

function save_item(){
	global $d, $name;
	
	$name = $_FILES['file']['name'];
	$name = explode('.',$name);
	$name = changeTitle($name[0]);
	
	$file_name=fns_Rand_digit(0,9,12);
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=video&act=man");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	
	if($id){
		$id =  themdau($_POST['id']);
		if($photo = upload_image("file", 'jpg|png|gif|JPG|PNG|GIF|jpeg|JPEG', _upload_sanpham,$name."_".time())){
			$data['photo'] = $photo;
			$data['thumb'] = create_thumb($data['photo'], 500, 500, _upload_sanpham,$name."_".time(),2);
			$d->setTable('video');
			$d->setWhere('id', $id);
			$d->select();
			if($d->num_rows()>0){
				$row = $d->fetch_array();
				delete_file(_upload_sanpham.$row['photo']);
				delete_file(_upload_sanpham.$row['thumb']);
			}
		}
					
		$data['id_item'] = (int)$_POST['id_item'];
		$data['id_cat'] = (int)$_POST['id_cat'];
		$data['id_color'] = (int)$_POST['id_color'];	
		$data['id_kynang'] = (int)$_POST['id_kynang'];		
		$data['ten_vi'] = $_POST['ten_vi'];
		$data['ten_en'] = $_POST['ten_en'];
		$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);
		
		$data['mota_vi'] = $_POST['mota_vi'];
		$data['mota_en'] = $_POST['mota_en'];
	
		$data['noidung_vi'] = $_POST['noidung_vi'];
		$data['noidung_en'] = $_POST['noidung_en'];

		
		$data['title_vi'] = $_POST['title_vi'];
		$data['description_vi'] = $_POST['description_vi'];
		$data['keywords_vi'] = $_POST['keywords_vi'];
		
		$data['title_en'] = $_POST['title_en'];
		$data['description_en'] = $_POST['description_en'];
		$data['keywords_en'] = $_POST['keywords_en'];
		$data['video'] = $_POST['video'];
		
		$data['khuyenmai'] = $_POST['khuyenmai'];
		$data['baohanh'] = $_POST['baohanh'];
		$data['kho'] = $_POST['kho'];
		
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaysua'] = time();
		$d->setTable('video');
		$d->setWhere('id', $id);
		if($d->update($data)){			
			redirect("index.php?com=video&act=man&curPage=".$_REQUEST['curPage']."");
		}else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=video&act=man");
	}else{
		if($photo = upload_image("file", 'jpg|png|gif|JPG|PNG|GIF|jpeg|JPEG', _upload_sanpham,$name."_".time())){
			$data['photo'] = $photo;
			$data['thumb'] = create_thumb($data['photo'], 500, 500, _upload_sanpham,$name."_".time(),2);
		}						
		$data['id_item'] = (int)$_POST['id_item'];
		$data['id_cat'] = (int)$_POST['id_cat'];
		$data['id_color'] = (int)$_POST['id_color'];
		$data['id_kynang'] = (int)$_POST['id_kynang'];		
		$data['ten_vi'] = $_POST['ten_vi'];
		$data['ten_en'] = $_POST['ten_en'];
		$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);
		
		$data['mota_vi'] = $_POST['mota_vi'];
		$data['mota_en'] = $_POST['mota_en'];
	
		$data['noidung_vi'] = $_POST['noidung_vi'];
		$data['noidung_en'] = $_POST['noidung_en'];

		
		$data['title_vi'] = $_POST['title_vi'];
		$data['description_vi'] = $_POST['description_vi'];
		$data['keywords_vi'] = $_POST['keywords_vi'];
		
		$data['title_en'] = $_POST['title_en'];
		$data['description_en'] = $_POST['description_en'];
		$data['keywords_en'] = $_POST['keywords_en'];
		$data['video'] = $_POST['video'];
		
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaytao'] = time();
		$d->setTable('video');
		if($d->insert($data)){
			redirect("index.php?com=video&act=man");
		}else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=video&act=man");
	}
}

function delete_item(){
	global $d;
	if($_REQUEST['id_cat']!='')
	{ $id_catt="&id_cat=".$_REQUEST['id_cat'];
	}
	if($_REQUEST['curPage']!='')
	{ $id_catt.="&curPage=".$_REQUEST['curPage'];
	}
	
	
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);
		$d->reset();
		$sql = "select id, photo,thumb from #_video where id='".$id."'";
		$d->query($sql);
		if($d->num_rows()>0){
			while($row = $d->fetch_array()){
				delete_file(_upload_sanpham.$row['photo']);
				delete_file(_upload_sanpham.$row['thumb']);
			}
			$sql = "delete from #_video where id='".$id."'";
		}
		if($d->query($sql)){
			$sql = "select photo,thumb from #_video_photo where id_video='".$id."'";
			$d->query($sql);
			if($d->num_rows()>0){
			while($row = $d->fetch_array()){
				delete_file(_upload_sanpham.$row['photo']);
				delete_file(_upload_sanpham.$row['thumb']);
			}
			}
			redirect("index.php?com=video&act=man".$id_catt."");
		}else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=video&act=man");
	}else transfer("Không nhận được dữ liệu", "index.php?com=video&act=man");
}

#====================================

function get_cats(){
	global $d, $items, $paging;
	
	if($_REQUEST['hienthi']!='')
	{
	$id_up = $_REQUEST['hienthi'];
	$sql_spmoi = "SELECT id,hienthi FROM table_video_item where id='".$id_up."' ";
	$d->query($sql_spmoi);
	$row_spmoi= $d->result_array();
	$spmoi1=$row_spmoi[0]['hienthi'];
	if($spmoi1==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_video_item SET hienthi =1 WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_video_item SET hienthi =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");

	}	
	}
	
	if($_REQUEST['new']!='')
	{
	$id_up = $_REQUEST['new'];
	$sql_spmoi = "SELECT id,noibat FROM table_video_item where id='".$id_up."' ";
	$d->query($sql_spmoi);
	$row_spmoi= $d->result_array();
	$spmoi1=$row_spmoi[0]['noibat'];
	if($spmoi1==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_video_item SET noibat =1 WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_video_item SET noibat =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");

	}	
	}
	
	$sql = "select * from #_video_item";
		
	if((int)$_REQUEST['id_cat']!='')
	{
	$sql.=" where id_cat=".$_REQUEST['id_cat']."";
	}
	$sql.=" order by stt asc,id desc";
	
	$d->query($sql);
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=video&act=man_cat";
	$maxR=20;
	$maxP=10;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

function get_cat(){
	global $d, $item;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
	transfer("Không nhận được dữ liệu", "index.php?com=video&act=man_cat");
	
	$sql = "select * from #_video_item where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=video&act=man_cat");
	$item = $d->fetch_array();	
}

function save_cat(){
	global $d;
	
	$name = $_FILES['file']['name'];
	$name = explode('.',$name);
	$name = changeTitle($name[0]);
	
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=video&act=man_cat");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	if($id){
			if($photo = upload_image("file", 'jpeg|jpg|png|gif|JPG|PNG|GIF|JPEG', _upload_sanpham,$name."_".time())){
				$data['photo'] = $photo;
				$data['thumb'] = create_thumb($data['photo'], 500, 500, _upload_sanpham,$name."_".time(),2);
				$d->setTable('video_item');
				$d->setWhere('id', $id);
				$d->select();
				if($d->num_rows()>0){
					$row = $d->fetch_array();
					delete_file(_upload_sanpham.$row['photo']);
				}
			}
		$data['id_cat'] = $_POST['id_cat'];
		$data['tenkhongdau'] = changeTitle($_POST['ten']);
		$data['ten'] = $_POST['ten'];
		
		$data['title'] = $_POST['title'];
		$data['description'] = $_POST['description'];
		$data['keywords'] = $_POST['keywords'];
		
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaysua'] = time();
		
		$d->setTable('video_item');
		$d->setWhere('id', $id);
		if($d->update($data))
			redirect("index.php?com=video&act=man_cat&curPage=".$_REQUEST['curPage']."");
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=video&act=man_cat");
	}else{
			if($photo = upload_image("file", 'jpg|png|gif|JPG|PNG|GIF|jpeg|JPEG', _upload_sanpham,$name."_".time())){
				$data['photo'] = $photo;
				$data['thumb'] = create_thumb($data['photo'], 500, 500, _upload_sanpham,$name."_".time(),2);
		}
		$data['id_cat'] = $_POST['id_cat'];
		$data['tenkhongdau'] = changeTitle($_POST['ten']);
		$data['ten'] = $_POST['ten'];
		
		$data['title'] = $_POST['title'];
		$data['description'] = $_POST['description'];
		$data['keywords'] = $_POST['keywords'];
		
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaytao'] = time();
		
		$d->setTable('video_item');
		if($d->insert($data))
			redirect("index.php?com=video&act=man_cat");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=video&act=man_cat");
	}
}

function delete_cat(){
	global $d;
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);
		echo "id:".$id;
		$d->reset();			
		$sql = "delete from #_video_item where id='".$id."'";
		if($d->query($sql))
			redirect("index.php?com=video&act=man_cat");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=video&act=man_cat");
	}else transfer("Không nhận được dữ liệu", "index.php?com=video&act=man_cat");
}
#====================================
function get_list_cat($id=0){
	global $d, $list_cat;
	
	$sql = "select * from #_video_cat order by stt asc";
	$d->query($sql);
	$cats = $d->result_array();
	
	$list_cat = '<select name="id_cat" class="input">
	<option >Chọn danh mục cấp 1</option>
	
	';
	for($i=0, $count=count($cats); $i<$count; $i++)
		$list_cat .= '<option value="'.$cats[$i]['id'].'" '.(($cats[$i]['id']==$id)?'selected="selected"':'').'>'.$cats[$i]['ten'].'</option>';
	$list_cat .= '</select>';
}

function get_list($id=0){
	global $d, $list;
	$sql = "select * from #_video_item order by id desc";
	$d->query($sql);
	$cats = $d->result_array();
	
	$list = '<select name="id_item" class="input">
	
	<option >Chọn danh mục cấp 2</option>
	';
	for($i=0, $count=count($cats); $i<$count; $i++)
		$list .= '<option value="'.$cats[$i]['id'].'" '.(($cats[$i]['id']==$id)?'selected="selected"':'').'>'.$cats[$i]['ten'].'</option>';
	$list .= '</select>';
}

#========================================================
function get_photos(){
	global $d, $items, $paging;
	
	if($_REQUEST['hienthi']!='')
	{
	$id_up = $_REQUEST['hienthi'];
	$sql_sp = "SELECT id,hienthi FROM table_video_photo where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$hienthi=$cats[0]['hienthi'];
	if($hienthi==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_video_photo SET hienthi =1 WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_video_photo SET hienthi =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}	
	}
	#-------------------------------------------------------------------------------
	$sql = "select * from #_video_photo";
	
	if(isset($_SESSION['id_video'])){
	$sql.=" where id_video=".$_SESSION['id_video'];	
	}
	
	$sql.=" order by stt asc,id desc";
	
	$d->query($sql);
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=video&act=man_photo";
	$maxR=20;
	$maxP=20;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

function get_photo(){
	global $d, $item;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
		transfer("Không nhận được dữ liệu", "index.php?com=video&act=man_photo");
	
	$sql = "select * from #_video_photo where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=video&act=man_photo");
	$item = $d->fetch_array();
}

function save_photo(){
	global $d, $name;
	$name = $_FILES['file']['name'];
	$name = explode('.',$name);
	$name = changeTitle($name[0]);
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=video&act=man_photo");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";

	if($id){
		$id =  themdau($_POST['id']);
		if($photo = upload_image("file", 'jpg|png|gif|JPG|PNG|GIF|jpeg|JPEG', _upload_sanpham,$name."_".time())){
			$data['photo'] = $photo;
			$data['thumb'] = create_thumb($data['photo'], 500, 500, _upload_sanpham,$name."_".time(),2);
			$d->setTable('video_photo');
			$d->setWhere('id', $id);
			$d->select();
			if($d->num_rows()>0){
				$row = $d->fetch_array();
				delete_file(_upload_sanpham.$row['photo']);
				delete_file(_upload_sanpham.$row['thumb']);
			}
		}				
		$data['id_video'] = $_SESSION['id_video'];
		$data['color'] = $_POST['color'];
		
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$d->setTable('video_photo');
		$d->setWhere('id', $id);
		if($d->update($data))
			redirect("index.php?com=video&act=man_photo&curPage=".$_REQUEST['curPage']."");
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=video&act=man_photo");
	}else{
		for($i=0; $i<5; $i++){
			$name = $_FILES['file'.$i]['name'];
			$name = explode('.',$name);
			$name = changeTitle($name[0]);
			
			if($photo = upload_image("file$i", 'jpg|png|gif|JPG|PNG|GIF|jpeg|JPEG', _upload_sanpham,$name."_".time())){
			$data['photo'] = $photo;
			$data['thumb'] = create_thumb($data['photo'], 500, 500, _upload_sanpham,$name."_".time(),2);
									
			$data['id_video'] = $_SESSION['id_video'];
			$data['color'] = $_POST['color'.$i];
		
			$data['stt'] = $_POST['stt'.$i];
			$data['hienthi'] = isset($_POST['hienthi'.$i]) ? 1 : 0;
			$d->setTable('video_photo');
			if(!$d->insert($data)) transfer("Lưu dữ liệu bị lỗi", "index.php?com=video&act=man_photo");
			}
		}
		redirect("index.php?com=video&act=man_photo");
	}
}

function delete_photo(){
	global $d;
	if($_REQUEST['curPage']!='')
	{ $id_catt="&curPage=".$_REQUEST['curPage'];
	}
	
	
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);
		$d->reset();
		$sql = "select id, photo,thumb from #_video_photo where id='".$id."'";
		$d->query($sql);
		if($d->num_rows()>0){
			while($row = $d->fetch_array()){
				delete_file(_upload_sanpham.$row['photo']);
				delete_file(_upload_sanpham.$row['thumb']);
			}
			$sql = "delete from #_video_photo where id='".$id."'";
			$d->query($sql);
		}
		if($d->query($sql))
			redirect("index.php?com=video&act=man_photo".$id_catt."");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=video&act=man_photo");
	}else transfer("Không nhận được dữ liệu", "index.php?com=video&act=man_photo");
}


?>