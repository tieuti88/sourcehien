<?php	if(!defined('_source')) die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";
$id=$_REQUEST['id'];
if(isset($_REQUEST['id_product'])){$_SESSION['id_product']=(int)$_REQUEST['id_product'];}
if(isset($_REQUEST['id_color'])){$_SESSION['id_color']=(int)$_REQUEST['id_color'];}
switch($act){

	case "man":
		get_items();
		$template = "product/item";
		break;
	case "add":		
		$template = "product/item_add";
		break;
	case "edit":		
		get_item();
		$template = "product/item_add";
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
		$template = "product/cat";
		break;
	case "add_cat":		
		$template = "product/cat_add";
		break;
	case "edit_cat":		
		get_cat();
		$template = "product/cat_add";
		break;
	case "save_cat":
		save_cat();
		break;
	case "delete_cat":
		delete_cat();
		break;
		
	#=======================================================
	
	case "man_cat3":
		get_cats3();
		$template = "product/cats3";
		break;
	case "add_cat3":
		$template = "product/cat_add3";
		break;
	case "edit_cat3":
		get_cat3();
		$template = "product/cat_add3";
		break;
	case "save_cat3":
		save_cat3();
		break;
	case "delete_cat3":
		delete_cat3();
		break;	
		
	#===================================================	
	case "man_color":
		get_colors();
		$template = "product/color";
		break;
	case "add_color":		
		$template = "product/color_add";
		break;
	case "edit_color":		
		get_color();
		$template = "product/color_add";
		break;
	case "save_color":
		save_color();
		break;
	case "delete_color":
		delete_color();
		break;
		
	#===================================================	
	case "man_scolor":
		get_scolors();
		$template = "product/scolor";
		break;
	case "add_scolor":		
		$template = "product/scolor_add";
		break;
	case "edit_scolor":		
		get_scolor();
		$template = "product/scolor_add";
		break;
	case "save_scolor":
		save_scolor();
		break;
	case "delete_scolor":
		delete_scolor();
		break;	
	
	#===================================================	
	case "man_size":
		get_sizes();
		$template = "product/size";
		break;
	case "add_size":		
		$template = "product/size_add";
		break;
	case "edit_size":		
		get_size();
		$template = "product/size_add";
		break;
	case "save_size":
		save_size();
		break;
	case "delete_size":
		delete_size();
		break;
		
	#===================================================	
	case "man_type":
		get_types();
		$template = "product/type";
		break;
	case "add_type":		
		$template = "product/type_add";
		break;
	case "edit_type":		
		get_type();
		$template = "product/type_add";
		break;
	case "save_type":
		save_type();
		break;
	case "delete_type":
		delete_type();
		break;	
	
	#=======================================================	
	case "man_photo":
		get_photos();
		$template = "product/photo";
		break;
	case "add_photo":		
		$template = "product/photo_add";
		break;
	case "edit_photo":		
		get_photo();
		$template = "product/photo_edit";
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

#====================================

function get_items(){
	global $d, $items, $paging;
	
	if($_REQUEST['noibat']!='')
	{
	$id_up = $_REQUEST['noibat'];
	$sql_spbc = "SELECT id,spbanchay FROM table_product where id='".$id_up."' ";
	$d->query($sql_spbc);
	$spbanchay= $d->result_array();
	$spbc1=$spbanchay[0]['spbanchay'];
	if($spbc1==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_product SET spbanchay ='1' WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_product SET spbanchay =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");

	}	
	}
	
	if($_REQUEST['spmoi']!='')
	{
	$id_up = $_REQUEST['spmoi'];
	$sql_spbc = "SELECT id,spmoi FROM table_product where id='".$id_up."' ";
	$d->query($sql_spbc);
	$spbanchay= $d->result_array();
	$spbc1=$spbanchay[0]['spmoi'];
	if($spbc1==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_product SET spmoi ='1' WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_product SET spmoi =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");

	}	
	}
	
	
	#----------------------------------------------------------------------------------------
	if($_REQUEST['hienthi']!='')
	{
	$id_up = $_REQUEST['hienthi'];
	$sql_sp = "SELECT id,hienthi FROM table_product where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$hienthi=$cats[0]['hienthi'];
	if($hienthi==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_product SET hienthi =1 WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_product SET hienthi =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}	
	}
	#-------------------------------------------------------------------------------
	
	$sql = "select * from #_product where id!=0";
	
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
	$sql.=" and ten_vi like '%$ten%'";
	}
	
	$sql.=" order by stt asc,id desc";
	
	$d->query($sql);
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=product&act=man";
	$maxR=20;
	$maxP=20;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

function get_item(){
	global $d, $item;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
		transfer("Không nhận được dữ liệu", "index.php?com=product&act=man");
	
	$sql = "select * from #_product where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=product&act=man");
	$item = $d->fetch_array();
	
	get_list($item['id_item']);
	get_list_cat($item['id_cat']);
}

function save_item(){
	global $d;
	
	$name = $_FILES['file']['name'];
	$name = explode('.',$name);
	$name = changeTitle($name[0]);
	
	
	
	
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=product&act=man");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	
	
	if($id){
		$id =  themdau($_POST['id']);
		if($photo = upload_image("file", 'jpg|png|gif|JPG|PNG|GIF|jpeg|JPEG', _upload_sanpham,$name.'-'.time())){
			$data['photo'] = $photo;
			$data['thumb'] = create_thumb($data['photo'], 700, 386, _upload_sanpham,$name.'-'.time(),2);
			$d->setTable('product');
			$d->setWhere('id', $id);
			$d->select();
			if($d->num_rows()>0){
				$row = $d->fetch_array();
				delete_file(_upload_sanpham.$row['photo']);
				delete_file(_upload_sanpham.$row['thumb']);
			}
		}
		
		
		$data['id_cat1'] = (int)$_POST['id_cat1'];			
		$data['id_item'] = (int)$_POST['id_item'];
		$data['id_cat'] = (int)$_POST['id_cat'];
	
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
		
		
		$data['masp'] = $_POST['masp'];
		$data['nhasanxuat'] = $_POST['nhasanxuat'];
		$data['kichthuoc'] = $_POST['kichthuoc'];
		$data['trongluong'] = $_POST['trongluong'];
		$data['chatlieu'] = $_POST['chatlieu'];
		$data['tinhtrang'] = $_POST['tinhtrang'];
		
		
		$data['giaban'] = $_POST['giaban'];
		$data['khuyenmai'] = $_POST['khuyenmai'];
		$data['tags'] = $_POST['tags'];
		
		$data['baohanh'] = $_POST['baohanh'];
		$data['video'] = $_POST['video'];
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaysua'] = time();
		$d->setTable('product');
		$d->setWhere('id', $id);
		if($d->update($data)){
			
			$sql = "delete from #_product_team where id_product='".$id."'";
			$d->query($sql);
			
			if($_POST['team']){
			$idTeam = $_POST['team'];
			for($i=0;$i<count($idTeam);$i++){
				$team['id_product'] = $id;
				$team['id_cat1'] = $idTeam[$i];
				$d->setTable('product_team');
				$d->insert($team);
			}
			}
			
			$sql = "delete from #_product_team_color where id_product='".$id."'";
			$d->query($sql);
			
			if($_POST['team_color']){
			$idTeam = $_POST['team_color'];
			for($i=0;$i<count($idTeam);$i++){
				$team_color['id_product'] = $id;
				$team_color['id_color'] = $idTeam[$i];
				$d->setTable('product_team_color');
				$d->insert($team_color);
			}
			}
			
			redirect("index.php?com=product&act=man&curPage=".$_REQUEST['curPage']);
		}else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=product&act=man");
	}else{
		if($photo = upload_image("file", 'jpg|png|gif|JPG|PNG|GIF|jpeg|JPEG', _upload_sanpham,$name.'-'.time())){
			$data['photo'] = $photo;
			$data['thumb'] = create_thumb($data['photo'], 700, 386, _upload_sanpham,$name.'-'.time(),2);
		}
		
		
			
		$data['id_cat1'] = (int)$_POST['id_cat1'];			
		$data['id_item'] = (int)$_POST['id_item'];
		$data['id_cat'] = (int)$_POST['id_cat'];
	
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
		
		$data['masp'] = $_POST['masp'];
		$data['nhasanxuat'] = $_POST['nhasanxuat'];
		$data['kichthuoc'] = $_POST['kichthuoc'];
		$data['trongluong'] = $_POST['trongluong'];
		$data['chatlieu'] = $_POST['chatlieu'];
		$data['tinhtrang'] = $_POST['tinhtrang'];
		
		$data['giaban'] = $_POST['giaban'];
		$data['khuyenmai'] = $_POST['khuyenmai'];
		$data['tags'] = $_POST['tags'];
		
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaytao'] = time();
		$d->setTable('product');
		if($d->insert($data)){
		
			$id = mysql_insert_id();	
			if($_POST['team']){
			$idTeam = $_POST['team'];
			for($i=0;$i<count($idTeam);$i++){
				$team['id_product'] = $id;
				$team['id_cat1'] = $idTeam[$i];
				$d->setTable('product_team');
				$d->insert($team);
			}
			}
			
			
			if($_POST['team_color']){	
			$idTeam = $_POST['team_color'];
			for($i=0;$i<count($idTeam);$i++){
				$team_color['id_product'] = $id;
				$team_color['id_color'] = $idTeam[$i];
				$d->setTable('product_team_color');
				$d->insert($team_color);
			}
			}
				
			redirect("index.php?com=product&act=man");
		}else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=product&act=man");
	}
}

function delete_item(){
	global $d;

	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);
		$d->reset();
		$sql = "select id,photo,thumb from #_product where id='".$id."'";
		$d->query($sql);
		if($d->num_rows()>0){
			while($row = $d->fetch_array()){
				delete_file(_upload_sanpham.$row['photo']);
				delete_file(_upload_sanpham.$row['thumb']);
				
			}
			
			$sql = "select id, photo,thumb from #_product_color where id_product='".$id."'";
			$d->query($sql);
			if($d->num_rows()>0){
				while($rows = $d->fetch_array()){
					delete_file(_upload_sanpham.$rows['photo']);
					delete_file(_upload_sanpham.$rows['thumb']);
				}
				$sql = "delete from #_product_color where id_product='".$id."'";
				$d->query($sql);
			}
			
			$sql = "select id, photo,thumb from #_product_photo where id_product='".$id."'";
			$d->query($sql);
			if($d->num_rows()>0){
				while($rows = $d->fetch_array()){
					delete_file(_upload_sanpham.$rows['photo']);
					delete_file(_upload_sanpham.$rows['thumb']);
				}
				$sql = "delete from #_product_photo where id_product='".$id."'";
				$d->query($sql);
			}
				
			$sql = "delete from #_product_team where id_product='".$id."'";
			$d->query($sql);
			
			$sql = "delete from #_product_team_size where id_product='".$id."'";
			$d->query($sql);
			
			$sql = "delete from #_product_team_color where id_product='".$id."'";
			$d->query($sql);
					
			$sql = "delete from #_product where id='".$id."'";
			$d->query($sql);
		}
		if($d->query($sql))
			redirect("index.php?com=product&act=man");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=product&act=man");
			
	}elseif (isset($_GET['listid'])==true){
		$listid = explode(",",$_GET['listid']); 
		for ($i=0 ; $i<count($listid) ; $i++){
			$idTin=$listid[$i]; 
			$id =  themdau($idTin);		
			$d->reset();
			$sql = "select id,photo,thumb from #_product where id='".$id."'";
			$d->query($sql);
			if($d->num_rows()>0){
				while($row = $d->fetch_array()){
					delete_file(_upload_sanpham.$row['photo']);
					delete_file(_upload_sanpham.$row['thumb']);
					
				}
				
				$sql = "select id, photo,thumb from #_product_color where id_product='".$id."'";
				$d->query($sql);
				if($d->num_rows()>0){
					while($rows = $d->fetch_array()){
						delete_file(_upload_sanpham.$rows['photo']);
						delete_file(_upload_sanpham.$rows['thumb']);
					}
					$sql = "delete from #_product_color where id_product='".$id."'";
					$d->query($sql);
				}
				
				$sql = "select id, photo,thumb from #_product_photo where id_product='".$id."'";
				$d->query($sql);
				if($d->num_rows()>0){
					while($rows = $d->fetch_array()){
						delete_file(_upload_sanpham.$rows['photo']);
						delete_file(_upload_sanpham.$rows['thumb']);
					}
					$sql = "delete from #_product_photo where id_product='".$id."'";
					$d->query($sql);
				}
				
				$sql = "delete from #_product_team where id_product='".$id."'";
				$d->query($sql);
			
				$sql = "delete from #_product_team_size where id_product='".$id."'";
				$d->query($sql);
				
				$sql = "delete from #_product where id='".$id."'";
				$d->query($sql);
			}
		
		}
		redirect("index.php?com=product&act=man");
	}else transfer("Không nhận được dữ liệu", "index.php?com=product&act=man");
}

#====================================

function get_cats(){
	global $d, $items, $paging;
	
	#----------------------------------------------------------------------------------------
	if($_REQUEST['hienthi']!='')
	{
	$id_up = $_REQUEST['hienthi'];
	$sql_sp = "SELECT id,hienthi FROM table_product_item where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$hienthi=$cats[0]['hienthi'];
	if($hienthi==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_product_item SET hienthi =1 WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_product_item SET hienthi =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}	
	}
	
	$sql = "select * from #_product_item";
		
	if((int)$_REQUEST['id_cat']!='')
	{
	$sql.=" where id_cat=".$_REQUEST['id_cat']."";
	}
	$sql.=" order by stt asc,id desc";
	
	$d->query($sql);
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=product&act=man_cat";
	$maxR=20;
	$maxP=10;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

function get_cat(){
	global $d, $item;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
	transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_cat");
	
	$sql = "select * from #_product_item where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=product&act=man_cat");
	$item = $d->fetch_array();	
}

function save_cat(){
	global $d;
	
	$name = $_FILES['file']['name'];
	$name = explode('.',$name);
	$name = changeTitle($name[0]);
	
	$file_name_item=fns_Rand_digit(0,9,5);
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_cat");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	if($id){
			if($photo = upload_image("file", 'jpg|png|gif|JPG|PNG|GIF|jpeg|JPEG', _upload_sanpham,$name.'-'.time())){
				$data['photo'] = $photo;
				$data['thumb'] = create_thumb($data['photo'], 260, 180, _upload_sanpham,$name.'-'.time(),1);
				$d->setTable('product_item');
				$d->setWhere('id', $id);
				$d->select();
				if($d->num_rows()>0){
					$row = $d->fetch_array();
					delete_file(_upload_sanpham.$row['photo']);
					delete_file(_upload_sanpham.$row['thumb']);
				}
			}
		$data['id_cat'] = $_POST['id_cat'];
		$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);
		$data['ten_vi'] = $_POST['ten_vi'];
		$data['ten_en'] = $_POST['ten_en'];
	
		
		$data['title_vi'] = $_POST['title_vi'];
		$data['description_vi'] = $_POST['description_vi'];
		$data['keywords_vi'] = $_POST['keywords_vi'];
		
		$data['title_en'] = $_POST['title_en'];
		$data['description_en'] = $_POST['description_en'];
		$data['keywords_en'] = $_POST['keywords_en'];
		
	
		
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaysua'] = time();
		
		$d->setTable('product_item');
		$d->setWhere('id', $id);
		if($d->update($data))
			redirect("index.php?com=product&act=man_cat&curPage=".$_REQUEST['curPage']."");
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=product&act=man_cat");
	}else{
			if($photo = upload_image("file", 'jpg|png|gif|JPG|PNG|GIF|jpeg|JPEG', _upload_sanpham,$name.'-'.time())){
			$data['photo'] = $photo;
			$data['thumb'] = create_thumb($data['photo'], 260, 180, _upload_sanpham,$name.'-'.time(),1);
		}
		$data['id_cat'] = $_POST['id_cat'];
		$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);
		$data['ten_vi'] = $_POST['ten_vi'];
		$data['ten_en'] = $_POST['ten_en'];
	
		
		$data['title_vi'] = $_POST['title_vi'];
		$data['description_vi'] = $_POST['description_vi'];
		$data['keywords_vi'] = $_POST['keywords_vi'];
		
		$data['title_en'] = $_POST['title_en'];
		$data['description_en'] = $_POST['description_en'];
		$data['keywords_en'] = $_POST['keywords_en'];
		
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaytao'] = time();
		
		$d->setTable('product_item');
		if($d->insert($data))
			redirect("index.php?com=product&act=man_cat");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=product&act=man_cat");
	}
}

function delete_cat(){
	global $d;
	if(isset($_GET['id'])){
		
		$id =  themdau($_GET['id']);
		$d->reset();
		$sql = "select id, photo,thumb from #_product_item where id='".$id."'";
		$d->query($sql);
		if($d->num_rows()>0){
			while($row = $d->fetch_array()){
				delete_file(_upload_sanpham.$row['photo']);
				delete_file(_upload_sanpham.$row['thumb']);
			}
			$sql = "delete from #_product_item where id='".$id."'";
		}
		if($d->query($sql))
			redirect("index.php?com=product&act=man_cat");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=product&act=man_cat");
	}elseif (isset($_GET['listid'])==true){
		$listid = explode(",",$_GET['listid']); 
		for ($i=0 ; $i<count($listid) ; $i++){
			$idTin=$listid[$i]; 
			$id =  themdau($idTin);
			$d->reset();		
			$sql = "select id, photo,thumb from #_product_item where id='".$id."'";
			$d->query($sql);
			if($d->num_rows()>0){
				while($row = $d->fetch_array()){
					delete_file(_upload_sanpham.$row['photo']);
					delete_file(_upload_sanpham.$row['thumb']);
				}
				$sql = "delete from #_product_item where id='".$id."'";
			}
			$d->query($sql);
		}
		redirect("index.php?com=product&act=man_cat");		
	}else transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_cat");
}

#====================================

function get_colors(){
	global $d, $items, $paging;
	
	#----------------------------------------------------------------------------------------
	if($_REQUEST['hienthi']!='')
	{
	$id_up = $_REQUEST['hienthi'];
	$sql_sp = "SELECT id,hienthi FROM table_product_color where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$hienthi=$cats[0]['hienthi'];
	if($hienthi==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_product_color SET hienthi =1 WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_product_color SET hienthi =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}	
	}
	
	$sql = "select * from #_product_color";
		
	if(isset($_SESSION['id_product'])){
	$sql.=" where id_product=".$_SESSION['id_product'];	
	}
	
	$sql.=" order by stt asc,id desc";
	
	$d->query($sql);
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=product&act=man_color";
	$maxR=20;
	$maxP=10;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

function get_color(){
	global $d, $item;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
	transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_color");
	
	$sql = "select * from #_product_color where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=product&act=man_color");
	$item = $d->fetch_array();	
}

function save_color(){
	global $d;
	
	$name = $_FILES['file']['name'];
	$name = explode('.',$name);
	$name = changeTitle($name[0]);
	
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_color");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	if($id){
			if($photo = upload_image("file", 'jpg|png|gif|JPG|PNG|GIF|jpeg|JPEG', _upload_sanpham,$name.'-'.time())){
				$data['photo'] = $photo;
				$d->setTable('product_color');
				$d->setWhere('id', $id);
				$d->select();
				if($d->num_rows()>0){
					$row = $d->fetch_array();
					delete_file(_upload_sanpham.$row['photo']);
				}
			}
		$data['id_product'] = $_SESSION['id_product'];
		$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);
		$data['ten_vi'] = $_POST['ten_vi'];
		$data['ten_en'] = $_POST['ten_en'];
		$data['ten_cn'] = $_POST['ten_cn'];
		
		$data['title_vi'] = $_POST['title_vi'];
		$data['description_vi'] = $_POST['description_vi'];
		$data['keywords_vi'] = $_POST['keywords_vi'];
		
		$data['title_en'] = $_POST['title_en'];
		$data['description_en'] = $_POST['description_en'];
		$data['keywords_en'] = $_POST['keywords_en'];
		
		$data['title_cn'] = $_POST['title_cn'];
		$data['description_cn'] = $_POST['description_cn'];
		$data['keywords_cn'] = $_POST['keywords_cn'];
		
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaysua'] = time();
		
		$d->setTable('product_color');
		$d->setWhere('id', $id);
		if($d->update($data)){
			
			$sql = "delete from #_product_team_size where id_color='".$id."'";
			$d->query($sql);
			
			if($_POST['team']){
			$idTeam = $_POST['team'];
			for($i=0;$i<count($idTeam);$i++){
				$team['id_product'] =  $_SESSION['id_product'];
				$team['id_color'] = $id;
				$team['id_size'] = $idTeam[$i];
				$d->setTable('product_team_size');
				$d->insert($team);
			}
			}
			
			redirect("index.php?com=product&act=man_color&curPage=".$_REQUEST['curPage']."");
		}else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=product&act=man_color");
	}else{
			if($photo = upload_image("file", 'jpg|png|gif|JPG|PNG|GIF|jpeg|JPEG', _upload_sanpham,$name.'-'.time())){
			$data['photo'] = $photo;
		}
		$data['id_product'] = $_SESSION['id_product'];
		$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);
		$data['ten_vi'] = $_POST['ten_vi'];
		$data['ten_en'] = $_POST['ten_en'];
		$data['ten_cn'] = $_POST['ten_cn'];
		
		$data['title_vi'] = $_POST['title_vi'];
		$data['description_vi'] = $_POST['description_vi'];
		$data['keywords_vi'] = $_POST['keywords_vi'];
		
		$data['title_en'] = $_POST['title_en'];
		$data['description_en'] = $_POST['description_en'];
		$data['keywords_en'] = $_POST['keywords_en'];
		
		$data['title_cn'] = $_POST['title_cn'];
		$data['description_cn'] = $_POST['description_cn'];
		$data['keywords_cn'] = $_POST['keywords_cn'];
		
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaytao'] = time();
		
		$d->setTable('product_color');
		if($d->insert($data)){
			
			if($_POST['team']){
			$id = mysql_insert_id();	
			$idTeam = $_POST['team'];
			for($i=0;$i<count($idTeam);$i++){
				$team['id_product'] =  $_SESSION['id_product'];
				$team['id_color'] = $id;
				$team['id_size'] = $idTeam[$i];
				$d->setTable('product_team_size');
				$d->insert($team);
			}
			}
			
			redirect("index.php?com=product&act=man_color");
		}else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=product&act=man_color");
	}
}

function delete_color(){
	global $d;
	if(isset($_GET['id'])){
		
		$id =  themdau($_GET['id']);
		$d->reset();
		$sql = "select id, photo,thumb from #_product_color where id='".$id."'";
		$d->query($sql);
		if($d->num_rows()>0){
			while($row = $d->fetch_array()){
				delete_file(_upload_sanpham.$row['photo']);
			}
			
			
			$sql = "select id, photo,thumb from #_product_photo where id_color='".$id."'";
			$d->query($sql);
			if($d->num_rows()>0){
				while($rows = $d->fetch_array()){
					delete_file(_upload_sanpham.$rows['photo']);
					delete_file(_upload_sanpham.$rows['thumb']);
				}
				$sql = "delete from #_product_photo where id_color='".$id."'";
				$d->query($sql);
			}
				
			
			
			$sql = "delete from #_product_team_size where id_color='".$id."'";
			$d->query($sql);
					
			$sql = "delete from #_product_color where id='".$id."'";
		}
		if($d->query($sql))
			redirect("index.php?com=product&act=man_color");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=product&act=man_color");
	}elseif (isset($_GET['listid'])==true){
		$listid = explode(",",$_GET['listid']); 
		for ($i=0 ; $i<count($listid) ; $i++){
			$idTin=$listid[$i]; 
			$id =  themdau($idTin);
			$d->reset();		
			$sql = "select id, photo,thumb from #_product_color where id='".$id."'";
			$d->query($sql);
			if($d->num_rows()>0){
				while($row = $d->fetch_array()){
					delete_file(_upload_sanpham.$row['photo']);
				}
				
				$sql = "select id, photo,thumb from #_product_photo where id_color='".$id."'";
				$d->query($sql);
				if($d->num_rows()>0){
					while($rows = $d->fetch_array()){
						delete_file(_upload_sanpham.$rows['photo']);
						delete_file(_upload_sanpham.$rows['thumb']);
					}
					$sql = "delete from #_product_photo where id_color='".$id."'";
					$d->query($sql);
				}
					
				
				
				$sql = "delete from #_product_team_size where id_color='".$id."'";
				$d->query($sql);
						
				$sql = "delete from #_product_color where id='".$id."'";
				$d->query($sql);
			}
			
		}
		redirect("index.php?com=product&act=man_color");		
	}else transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_color");
}

#====================================

function get_types(){
	global $d, $items, $paging;
	
	#----------------------------------------------------------------------------------------
	if($_REQUEST['hienthi']!='')
	{
	$id_up = $_REQUEST['hienthi'];
	$sql_sp = "SELECT id,hienthi FROM table_product_type where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$hienthi=$cats[0]['hienthi'];
	if($hienthi==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_product_type SET hienthi =1 WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_product_type SET hienthi =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}	
	}
	
	$sql = "select * from #_product_type";
		
	if((int)$_REQUEST['id_cat']!='')
	{
	$sql.=" where id_cat=".$_REQUEST['id_cat']."";
	}
	$sql.=" order by stt asc,id desc";
	
	$d->query($sql);
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=product&act=man_type";
	$maxR=20;
	$maxP=10;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

function get_type(){
	global $d, $item;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
	transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_type");
	
	$sql = "select * from #_product_type where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=product&act=man_type");
	$item = $d->fetch_array();	
}

function save_type(){
	global $d;
	$file_name_item=fns_Rand_digit(0,9,5);
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_type");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	if($id){
			if($photo = upload_image("file", 'jpg|png|gif|JPG|PNG|GIF|jpeg|JPEG', _upload_sanpham,$file_name_item)){
				$data['photo'] = $photo;
				$d->setTable('product_type');
				$d->setWhere('id', $id);
				$d->select();
				if($d->num_rows()>0){
					$row = $d->fetch_array();
					delete_file(_upload_sanpham.$row['photo']);
				}
			}
		$data['id_cat'] = $_POST['id_cat'];
		$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);
		$data['ten_vi'] = $_POST['ten_vi'];
		$data['ten_en'] = $_POST['ten_en'];
		$data['ten_cn'] = $_POST['ten_cn'];
		
		$data['title_vi'] = $_POST['title_vi'];
		$data['description_vi'] = $_POST['description_vi'];
		$data['keywords_vi'] = $_POST['keywords_vi'];
		
		$data['title_en'] = $_POST['title_en'];
		$data['description_en'] = $_POST['description_en'];
		$data['keywords_en'] = $_POST['keywords_en'];
		
		$data['title_cn'] = $_POST['title_cn'];
		$data['description_cn'] = $_POST['description_cn'];
		$data['keywords_cn'] = $_POST['keywords_cn'];
		
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaysua'] = time();
		
		$d->setTable('product_type');
		$d->setWhere('id', $id);
		if($d->update($data))
			redirect("index.php?com=product&act=man_type&curPage=".$_REQUEST['curPage']."");
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=product&act=man_type");
	}else{
			if($photo = upload_image("file", 'jpg|png|gif|JPG|PNG|GIF|jpeg|JPEG', _upload_sanpham,$file_name_item)){
			$data['photo'] = $photo;
		}
		$data['id_cat'] = $_POST['id_cat'];
		$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);
		$data['ten_vi'] = $_POST['ten_vi'];
		$data['ten_en'] = $_POST['ten_en'];
		$data['ten_cn'] = $_POST['ten_cn'];
		
		$data['title_vi'] = $_POST['title_vi'];
		$data['description_vi'] = $_POST['description_vi'];
		$data['keywords_vi'] = $_POST['keywords_vi'];
		
		$data['title_en'] = $_POST['title_en'];
		$data['description_en'] = $_POST['description_en'];
		$data['keywords_en'] = $_POST['keywords_en'];
		
		$data['title_cn'] = $_POST['title_cn'];
		$data['description_cn'] = $_POST['description_cn'];
		$data['keywords_cn'] = $_POST['keywords_cn'];
		
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaytao'] = time();
		
		$d->setTable('product_type');
		if($d->insert($data))
			redirect("index.php?com=product&act=man_type");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=product&act=man_type");
	}
}

function delete_type(){
	global $d;
	if(isset($_GET['id'])){
		
		$id =  themdau($_GET['id']);
		$d->reset();
		$sql = "select id, photo,thumb from #_product_type where id='".$id."'";
		$d->query($sql);
		if($d->num_rows()>0){
			while($row = $d->fetch_array()){
				delete_file(_upload_sanpham.$row['photo']);
			}
			$sql = "delete from #_product_type where id='".$id."'";
		}
		if($d->query($sql))
			redirect("index.php?com=product&act=man_type");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=product&act=man_type");
	}elseif (isset($_GET['listid'])==true){
		$listid = explode(",",$_GET['listid']); 
		for ($i=0 ; $i<count($listid) ; $i++){
			$idTin=$listid[$i]; 
			$id =  themdau($idTin);	
			$d->reset();	
			$sql = "select id, photo,thumb from #_product_type where id='".$id."'";
			$d->query($sql);
			if($d->num_rows()>0){
				while($row = $d->fetch_array()){
					delete_file(_upload_sanpham.$row['photo']);
				}
				$sql = "delete from #_product_type where id='".$id."'";
			}
			$d->query($sql);
		}
		redirect("index.php?com=product&act=man_type");		
	}else transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_type");
}

#====================================

function get_sizes(){
	global $d, $items, $paging;
	
	#----------------------------------------------------------------------------------------
	if($_REQUEST['hienthi']!='')
	{
	$id_up = $_REQUEST['hienthi'];
	$sql_sp = "SELECT id,hienthi FROM table_product_size where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$hienthi=$cats[0]['hienthi'];
	if($hienthi==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_product_size SET hienthi =1 WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_product_size SET hienthi =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}	
	}
	
	$sql = "select * from #_product_size";
		
	if((int)$_REQUEST['id_cat']!='')
	{
	$sql.=" where id_cat=".$_REQUEST['id_cat']."";
	}
	$sql.=" order by stt asc,id desc";
	
	$d->query($sql);
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=product&act=man_size";
	$maxR=20;
	$maxP=10;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

function get_size(){
	global $d, $item;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
	transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_size");
	
	$sql = "select * from #_product_size where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=product&act=man_size");
	$item = $d->fetch_array();	
}

function save_size(){
	global $d;
	$file_name_item=fns_Rand_digit(0,9,5);
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_size");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	if($id){
			if($photo = upload_image("file", 'jpg|png|gif|JPG|PNG|GIF|jpeg|JPEG', _upload_sanpham,$file_name_item)){
				$data['photo'] = $photo;
				$d->setTable('product_size');
				$d->setWhere('id', $id);
				$d->select();
				if($d->num_rows()>0){
					$row = $d->fetch_array();
					delete_file(_upload_sanpham.$row['photo']);
				}
			}
		$data['id_cat'] = $_POST['id_cat'];
		$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);
		$data['ten_vi'] = $_POST['ten_vi'];
		$data['ten_en'] = $_POST['ten_en'];
		$data['ten_cn'] = $_POST['ten_cn'];
		
		$data['title_vi'] = $_POST['title_vi'];
		$data['description_vi'] = $_POST['description_vi'];
		$data['keywords_vi'] = $_POST['keywords_vi'];
		
		$data['title_en'] = $_POST['title_en'];
		$data['description_en'] = $_POST['description_en'];
		$data['keywords_en'] = $_POST['keywords_en'];
		
		$data['title_cn'] = $_POST['title_cn'];
		$data['description_cn'] = $_POST['description_cn'];
		$data['keywords_cn'] = $_POST['keywords_cn'];
		
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaysua'] = time();
		
		$d->setTable('product_size');
		$d->setWhere('id', $id);
		if($d->update($data))
			redirect("index.php?com=product&act=man_size&curPage=".$_REQUEST['curPage']."");
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=product&act=man_size");
	}else{
			if($photo = upload_image("file", 'jpg|png|gif|JPG|PNG|GIF|jpeg|JPEG', _upload_sanpham,$file_name_item)){
			$data['photo'] = $photo;
		}
		$data['id_cat'] = $_POST['id_cat'];
		$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);
		$data['ten_vi'] = $_POST['ten_vi'];
		$data['ten_en'] = $_POST['ten_en'];
		$data['ten_cn'] = $_POST['ten_cn'];
		
		$data['title_vi'] = $_POST['title_vi'];
		$data['description_vi'] = $_POST['description_vi'];
		$data['keywords_vi'] = $_POST['keywords_vi'];
		
		$data['title_en'] = $_POST['title_en'];
		$data['description_en'] = $_POST['description_en'];
		$data['keywords_en'] = $_POST['keywords_en'];
		
		$data['title_cn'] = $_POST['title_cn'];
		$data['description_cn'] = $_POST['description_cn'];
		$data['keywords_cn'] = $_POST['keywords_cn'];
		
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaytao'] = time();
		
		$d->setTable('product_size');
		if($d->insert($data))
			redirect("index.php?com=product&act=man_size");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=product&act=man_size");
	}
}

function delete_size(){
	global $d;
	if(isset($_GET['id'])){
		
		$id =  themdau($_GET['id']);
		$d->reset();
		$sql = "select id, photo,thumb from #_product_size where id='".$id."'";
		$d->query($sql);
		if($d->num_rows()>0){
			while($row = $d->fetch_array()){
				delete_file(_upload_sanpham.$row['photo']);
			}
			$sql = "delete from #_product_size where id='".$id."'";
		}
		if($d->query($sql))
			redirect("index.php?com=product&act=man_size");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=product&act=man_size");
	}elseif (isset($_GET['listid'])==true){
		$listid = explode(",",$_GET['listid']); 
		for ($i=0 ; $i<count($listid) ; $i++){
			$idTin=$listid[$i]; 
			$id =  themdau($idTin);	
			$d->reset();	
			$sql = "select id, photo,thumb from #_product_size where id='".$id."'";
			$d->query($sql);
			if($d->num_rows()>0){
				while($row = $d->fetch_array()){
					delete_file(_upload_sanpham.$row['photo']);
				}
				$sql = "delete from #_product_size where id='".$id."'";
			}
			$d->query($sql);
		}
		redirect("index.php?com=product&act=man_size");		
	}else transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_size");
}

#====================================

function get_scolors(){
	global $d, $items, $paging;
	
	#----------------------------------------------------------------------------------------
	if($_REQUEST['hienthi']!='')
	{
	$id_up = $_REQUEST['hienthi'];
	$sql_sp = "SELECT id,hienthi FROM table_product_scolor where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$hienthi=$cats[0]['hienthi'];
	if($hienthi==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_product_scolor SET hienthi =1 WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_product_scolor SET hienthi =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}	
	}
	
	$sql = "select * from #_product_scolor";
		
	if((int)$_REQUEST['id_cat']!='')
	{
	$sql.=" where id_cat=".$_REQUEST['id_cat']."";
	}
	$sql.=" order by stt asc,id desc";
	
	$d->query($sql);
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=product&act=man_scolor";
	$maxR=20;
	$maxP=10;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

function get_scolor(){
	global $d, $item;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
	transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_scolor");
	
	$sql = "select * from #_product_scolor where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=product&act=man_scolor");
	$item = $d->fetch_array();	
}

function save_scolor(){
	global $d;
	
	$name = $_FILES['file']['name'];
	$name = explode('.',$name);
	$name = changeTitle($name[0]);
	
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_scolor");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	if($id){
			if($photo = upload_image("file", 'jpg|png|gif|JPG|PNG|GIF|jpeg|JPEG', _upload_sanpham,$name.'-'.time())){
				$data['photo'] = $photo;
				$d->setTable('product_scolor');
				$d->setWhere('id', $id);
				$d->select();
				if($d->num_rows()>0){
					$row = $d->fetch_array();
					delete_file(_upload_sanpham.$row['photo']);
				}
			}
	
		$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);
		$data['ten_vi'] = $_POST['ten_vi'];
		$data['ten_en'] = $_POST['ten_en'];
	
		
		
		
	
		
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaysua'] = time();
		
		$d->setTable('product_scolor');
		$d->setWhere('id', $id);
		if($d->update($data))
			redirect("index.php?com=product&act=man_scolor&curPage=".$_REQUEST['curPage']."");
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=product&act=man_scolor");
	}else{
			if($photo = upload_image("file", 'jpg|png|gif|JPG|PNG|GIF|jpeg|JPEG', _upload_sanpham,$name.'-'.time())){
			$data['photo'] = $photo;
		}
		
		$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);
		$data['ten_vi'] = $_POST['ten_vi'];
		$data['ten_en'] = $_POST['ten_en'];
		
		
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaytao'] = time();
		
		$d->setTable('product_scolor');
		if($d->insert($data))
			redirect("index.php?com=product&act=man_scolor");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=product&act=man_scolor");
	}
}

function delete_scolor(){
	global $d;
	if(isset($_GET['id'])){
		
		$id =  themdau($_GET['id']);
		$d->reset();
		$sql = "select id, photo,thumb from #_product_scolor where id='".$id."'";
		$d->query($sql);
		if($d->num_rows()>0){
			while($row = $d->fetch_array()){
				delete_file(_upload_sanpham.$row['photo']);
			}
			$sql = "delete from #_product_scolor where id='".$id."'";
		}
		if($d->query($sql))
			redirect("index.php?com=product&act=man_scolor");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=product&act=man_scolor");
	}elseif (isset($_GET['listid'])==true){
		$listid = explode(",",$_GET['listid']); 
		for ($i=0 ; $i<count($listid) ; $i++){
			$idTin=$listid[$i]; 
			$id =  themdau($idTin);
			$d->reset();		
			$sql = "select id, photo,thumb from #_product_scolor where id='".$id."'";
			$d->query($sql);
			if($d->num_rows()>0){
				while($row = $d->fetch_array()){
					delete_file(_upload_sanpham.$row['photo']);
				}
				$sql = "delete from #_product_scolor where id='".$id."'";
			}
			$d->query($sql);
		}
		redirect("index.php?com=product&act=man_scolor");		
	}else transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_scolor");
}

#====================================

function get_cats3(){
	global $d, $items, $paging;
	
	#----------------------------------------------------------------------------------------
	if($_REQUEST['hienthi']!='')
	{
	$id_up = $_REQUEST['hienthi'];
	$sql_sp = "SELECT id,hienthi FROM table_product_cat1 where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$hienthi=$cats[0]['hienthi'];
	if($hienthi==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_product_cat1 SET hienthi =1 WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_product_cat1 SET hienthi =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}	
	}
	
	$sql = "select * from #_product_cat1";
		
	if((int)$_REQUEST['id_cat']!='')
	{
	$sql.=" where id_cat=".$_REQUEST['id_cat']."";
	}
	if((int)$_REQUEST['id_item']!='')
	{
	$sql.=" and id_item=".$_REQUEST['id_item']."";
	}
	$sql.=" order by stt asc,id desc";
	
	$d->query($sql);
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=product&act=man_cat3";
	$maxR=20;
	$maxP=10;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

function get_cat3(){
	global $d, $item;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
	transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_cat3");
	
	$sql = "select * from #_product_cat1 where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=product&act=man_cat3");
	$item = $d->fetch_array();	
}

function save_cat3(){
	global $d;
	$name = $_FILES['file']['name'];
	$name = explode('.',$name);
	$name = changeTitle($name[0]);
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_cat3");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	if($id){
			if($photo = upload_image("file", 'jpg|png|gif|JPEG', _upload_sanpham,$name.'-'.time())){
				$data['photo'] = $photo;
				$d->setTable('product_cat1');
				$d->setWhere('id', $id);
				$d->select();
				if($d->num_rows()>0){
					$row = $d->fetch_array();
					delete_file(_upload_sanpham.$row['photo']);
				}
			}
		$data['id_cat'] = $_POST['id_cat'];
		$data['id_item'] = $_POST['id_item'];

		
		$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);
		$data['ten_vi'] = $_POST['ten_vi'];
		$data['ten_en'] = $_POST['ten_en'];
		$data['ten_cn'] = $_POST['ten_cn'];
		
		$data['title_vi'] = $_POST['title_vi'];
		$data['description_vi'] = $_POST['description_vi'];
		$data['keywords_vi'] = $_POST['keywords_vi'];
		
		$data['title_en'] = $_POST['title_en'];
		$data['description_en'] = $_POST['description_en'];
		$data['keywords_en'] = $_POST['keywords_en'];
		
		$data['title_cn'] = $_POST['title_cn'];
		$data['description_cn'] = $_POST['description_cn'];
		$data['keywords_cn'] = $_POST['keywords_cn'];
		
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaysua'] = time();
		
		$d->setTable('product_cat1');
		$d->setWhere('id', $id);
		if($d->update($data))
			redirect("index.php?com=product&act=man_cat3&curPage=".$_REQUEST['curPage']."");
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=product&act=man_cat3");
	}else{
			if($photo = upload_image("file", 'jpg|png|gif|JPEG', _upload_sanpham,$$name.'-'.time())){
			$data['photo'] = $photo;
		}
		$data['id_cat'] = $_POST['id_cat'];
		$data['id_item'] = $_POST['id_item'];
		
		
		$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);
		$data['ten_vi'] = $_POST['ten_vi'];
		$data['ten_en'] = $_POST['ten_en'];
		$data['ten_cn'] = $_POST['ten_cn'];
		
		$data['title_vi'] = $_POST['title_vi'];
		$data['description_vi'] = $_POST['description_vi'];
		$data['keywords_vi'] = $_POST['keywords_vi'];
		
		$data['title_en'] = $_POST['title_en'];
		$data['description_en'] = $_POST['description_en'];
		$data['keywords_en'] = $_POST['keywords_en'];
		
		$data['title_cn'] = $_POST['title_cn'];
		$data['description_cn'] = $_POST['description_cn'];
		$data['keywords_cn'] = $_POST['keywords_cn'];
		
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaytao'] = time();
		
		$d->setTable('product_cat1');
		if($d->insert($data))
			redirect("index.php?com=product&act=man_cat3");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=product&act=man_cat3");
	}
}

function delete_cat3(){
	global $d;
	if(isset($_GET['id'])){
		
		$id =  themdau($_GET['id']);
		$d->reset();
		$sql = "select id, photo,thumb from #_product_cat1 where id='".$id."'";
		$d->query($sql);
		if($d->num_rows()>0){
			while($row = $d->fetch_array()){
				delete_file(_upload_sanpham.$row['photo']);
				delete_file(_upload_sanpham.$row['thumb']);
			}
			$sql = "delete from #_product_cat1 where id='".$id."'";
		}
		if($d->query($sql))
			redirect("index.php?com=product&act=man_cat3");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=product&act=man_cat3");
	}elseif (isset($_GET['listid'])==true){
		$listid = explode(",",$_GET['listid']); 
		for ($i=0 ; $i<count($listid) ; $i++){
			$idTin=$listid[$i]; 
			$id =  themdau($idTin);
			$d->reset();		
			$sql = "select id, photo,thumb from #_product_cat1 where id='".$id."'";
			$d->query($sql);
			if($d->num_rows()>0){
				while($row = $d->fetch_array()){
					delete_file(_upload_sanpham.$row['photo']);
					delete_file(_upload_sanpham.$row['thumb']);
				}
				$sql = "delete from #_product_cat1 where id='".$id."'";
			}
			$d->query($sql);
		}
		redirect("index.php?com=product&act=man_cat3");		
	}else transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_cat3");
}

#====================================

function get_list_cat($id=0){
	global $d, $list_cat;
	
	$sql = "select * from #_product_cat order by stt asc";
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
	$sql = "select * from #_product_item order by id desc";
	$d->query($sql);
	$cats = $d->result_array();
	
	$list = '<select name="id_item" class="input">
	
	<option >Chọn danh mục cấp 2</option>
	';
	for($i=0, $count=count($cats); $i<$count; $i++)
		$list .= '<option value="'.$cats[$i]['id'].'" '.(($cats[$i]['id']==$id)?'selected="selected"':'').'>'.$cats[$i]['ten'].'</option>';
	$list .= '</select>';
}

#====================================

function get_photos(){
	global $d, $items, $paging;
	
	if($_REQUEST['hienthi']!='')
	{
	$id_up = $_REQUEST['hienthi'];
	$sql_sp = "SELECT id,hienthi FROM table_product_photo where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$hienthi=$cats[0]['hienthi'];
	if($hienthi==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_product_photo SET hienthi =1 WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_product_photo SET hienthi =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}	
	}
	#-------------------------------------------------------------------------------
	$sql = "select * from #_product_photo";
	
	
	if(isset($_SESSION['id_product'])){
	$sql.=" where id_product =".$_SESSION['id_product'];	
	}
	
	$sql.=" order by stt asc,id desc";
	
	$d->query($sql);
	$items = $d->result_array();

	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=product&act=man_photo";
	$maxR=20;
	$maxP=20;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

function get_photo(){
	global $d, $item;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
		transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_photo");
	
	$sql = "select * from #_product_photo where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=product&act=man_photo");
	$item = $d->fetch_array();
}

function save_photo(){
	global $d;
	$name = $_FILES['file']['name'];
	$name = explode('.',$name);
	$name = changeTitle($name[0]);
	
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_photo");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";

	if($id){
		$id =  themdau($_POST['id']);
		if($photo = upload_image("file", 'jpg|png|gif|JPG|PNG|GIF|jpeg|JPEG', _upload_sanpham,$name.'-'.time())){
			$data['photo'] = $photo;
			$data['thumb'] = create_thumb($data['photo'], 700, 700, _upload_sanpham,$name.'-'.time(),2);
			$d->setTable('product_photo');
			$d->setWhere('id', $id);
			$d->select();
			if($d->num_rows()>0){
				$row = $d->fetch_array();
				delete_file(_upload_sanpham.$row['photo']);
				delete_file(_upload_sanpham.$row['thumb']);
			}
		}	
		$data['id_product'] = $_SESSION['id_product'];			
		$data['id_color'] = $_SESSION['id_color'];
		$data['color'] = $_POST['color'];
		
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$d->setTable('product_photo');
		$d->setWhere('id', $id);
		if($d->update($data))
			redirect("index.php?com=product&act=man_photo&curPage=".$_REQUEST['curPage']."");
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=product&act=man_photo");
	}else{
		for($i=0; $i<7; $i++){
			if($photo = upload_image("file$i", 'jpg|png|gif|JPG|PNG|GIF|jpeg|JPEG', _upload_sanpham,$$name.$i.'-'.time())){
			$data['photo'] = $photo;
			$data['thumb'] = create_thumb($data['photo'], 700, 700, _upload_sanpham,$$name.$i.'-'.time(),2);
			
			$data['id_product'] = $_SESSION['id_product'];						
			$data['id_color'] = $_SESSION['id_color'];
			$data['color'] = $_POST['color'.$i];
		
			$data['stt'] = $_POST['stt'.$i];
			$data['hienthi'] = isset($_POST['hienthi'.$i]) ? 1 : 0;
			$d->setTable('product_photo');
			if(!$d->insert($data)) transfer("Lưu dữ liệu bị lỗi", "index.php?com=product&act=man_photo");
			}
		}
		redirect("index.php?com=product&act=man_photo");
	}
}

function delete_photo(){
	global $d;
	if(isset($_GET['id'])){
		
		$id =  themdau($_GET['id']);
		$d->reset();
		$sql = "select id, photo,thumb from #_product_photo where id='".$id."'";
		$d->query($sql);
		if($d->num_rows()>0){
			while($row = $d->fetch_array()){
				delete_file(_upload_sanpham.$row['photo']);
				delete_file(_upload_sanpham.$row['thumb']);
			}
			$sql = "delete from #_product_photo where id='".$id."'";
		}
		if($d->query($sql))
			redirect("index.php?com=product&act=man_photo");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=product&act=man_photo");
	}elseif (isset($_GET['listid'])==true){
		$listid = explode(",",$_GET['listid']); 
		for ($i=0 ; $i<count($listid) ; $i++){
			$idTin=$listid[$i]; 
			$id =  themdau($idTin);
			$d->reset();		
			$sql = "select id, photo,thumb from #_product_photo where id='".$id."'";
			$d->query($sql);
			if($d->num_rows()>0){
				while($row = $d->fetch_array()){
					delete_file(_upload_sanpham.$row['photo']);
					delete_file(_upload_sanpham.$row['thumb']);
				}
				$sql = "delete from #_product_photo where id='".$id."'";
			}
			$d->query($sql);
		}
		redirect("index.php?com=product&act=man_photo");		
	}else transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_photo");
}

#====================================

function get_widgets(){
	global $d, $items, $paging;
	
	#----------------------------------------------------------------------------------------
	if($_REQUEST['hienthi']!='')
	{
	$id_up = $_REQUEST['hienthi'];
	$sql_sp = "SELECT id,hienthi FROM table_product_widget where id='".$id_up."' ";
	$d->query($sql_sp);
	$widgets= $d->result_array();
	$hienthi=$widgets[0]['hienthi'];
	if($hienthi==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_product_widget SET hienthi =1 WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_product_widget SET hienthi =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}	
	}
	#-------------------------------------------------------------------------------
	
	$id_parent=(int)$_REQUEST['id_parents'];
	$sql = "select * from #_product_widget";
	
	$sql.=" where id_parents='$id_parent'";
	
	if(isset($_SESSION['id_product'])){
	$sql.=" and id_product=".$_SESSION['id_product'];	
	}
	
	$sql.=" order by stt asc,id desc";
	
	$d->query($sql);
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=product&act=man_widget";
	$maxR=20;
	$maxP=10;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

function get_widget(){
	global $d, $item;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
	transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_widget");
	
	$sql = "select * from #_product_widget where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=product&act=man_widget");
	$item = $d->fetch_array();
}

function save_widget(){
	global $d;
	$name = $_FILES['file']['name'];
	$name = explode('.',$name);
	$name = changeTitle($name[0]);
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_widget");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	if($id){
			if($photo = upload_image("file", 'jpg|png|gif|JPEG', _upload_sanpham,$name.'-'.time())){
				$data['photo'] = $photo;
				$d->setTable('product_widget');
				$d->setWhere('id', $id);
				$d->select();
				if($d->num_rows()>0){
					$row = $d->fetch_array();
					delete_file(_upload_sanpham.$row['photo']);
				}
			}
		$data['id_parents'] = $_POST['id_cat'];
		$data['id_product'] = $_SESSION['id_product'];
		$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);		
		$data['ten_vi'] = $_POST['ten_vi'];
		$data['ten_en'] = $_POST['ten_en'];
		$data['ten_cn'] = $_POST['ten_cn'];
		$data['giaban'] = $_POST['giaban'];
		
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaysua'] = time();
		
		$d->setTable('product_widget');
		$d->setWhere('id', $id);
		if($d->update($data))
			redirect("index.php?com=product&act=man_widget&id_parents=".$_REQUEST['id_parents']."&curPage=".$_REQUEST['curPage']."");
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=product&act=man_widget");
	}else{
			if($photo = upload_image("file", 'jpg|png|gif|JPEG', _upload_sanpham,$name.'-'.time())){
			$data['photo'] = $photo;
		}
		$data['id_parents'] = $_POST['id_cat'];
		$data['id_product'] = $_SESSION['id_product'];
		$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);		
		$data['ten_vi'] = $_POST['ten_vi'];
		$data['ten_en'] = $_POST['ten_en'];
		$data['ten_cn'] = $_POST['ten_cn'];
		$data['giaban'] = $_POST['giaban'];
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaytao'] = time();
		
		$d->setTable('product_widget');
		if($d->insert($data))
			redirect("index.php?com=product&act=man_widget");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=product&act=man_widget");
	}
}

function delete_widget(){
	global $d;
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);
		$d->reset();
		$sql = "select id from #_product_widget where id_parents='".$id."'";
		$d->query($sql);
			if($d->num_rows()==0){
					
				$sql = "select id, photo from #_product_widget where id='".$id."'";
				$d->query($sql);
					if($d->num_rows()>0){
							$row = $d->fetch_array();
							delete_file(_upload_sanpham.$row['photo']);
							$sql = "delete from #_product_widget where id='".$id."'";
							$d->query($sql);
							if($d->query($sql))
								redirect("index.php?com=product&act=man_widget");
							else
								transfer("Xóa dữ liệu bị lỗi", "index.php?com=product&act=man_widget");
						}
					
				}else transfer("Danh mục không rỗng, bạn cần xóa hoặc di chuyển các danh mục con trước", "index.php?com=product&act=man_widget");
			
			
	}elseif (isset($_GET['listid'])==true){
		$listid = explode(",",$_GET['listid']); 
		for ($i=0 ; $i<count($listid) ; $i++){
			$idTin=$listid[$i]; 
			$id =  themdau($idTin);		
			$d->reset();
			$sql = "select id, photo from #_product_widget where id='".$id."'";
			$d->query($sql);
			if($d->num_rows()>0){
				while($row = $d->fetch_array()){
					delete_file(_upload_sanpham.$row['photo']);
				}
				$sql = "delete from #_product_widget where id='".$id."'";
				$sql2 = "delete from #_product_widget where id_parents='".$id."'";
				$d->query($sql); $d->query($sql2);
			}
			
		
	}redirect("index.php?com=product&act=man_widget");}else transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_widget");
}

function coutchild($id){
	global $d;	
	$sql = "select id from #_product_widget";	
	$sql.=" where id_parents='$id'";
	$result=$d->query($sql);
	return mysql_num_rows($result);
}

?>