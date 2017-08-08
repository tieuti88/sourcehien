<?php	if(!defined('_source')) die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";

switch($act){
	case "man":
		get_items();
		$template = "product1/item";
		break;
	case "add":	
		$template = "product1/item_add";
		break;
	case "edit":
		get_item();
		$template = "product1/item_add";
		break;
	case "save":
		save_cat();
		break;
	case "delete":
		delete();
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
	
	if($_REQUEST['noibat']!='')
	{
	$id_up = $_REQUEST['noibat'];
	$sql_sp = "SELECT id,noibat FROM table_product_cat where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$hienthi=$cats[0]['noibat'];
	if($hienthi==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_product_cat SET noibat =1 WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_product_cat SET noibat =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");

	}	
	}
	
	if($_REQUEST['hienthi']!='')
	{
	$id_up = $_REQUEST['hienthi'];
	$sql_sp = "SELECT id,hienthi FROM table_product_cat where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$hienthi=$cats[0]['hienthi'];
	if($hienthi==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_product_cat SET hienthi =1 WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_product_cat SET hienthi =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");

	}	
	}
	
	$sql = "select * from #_product_cat order by stt asc,id desc";
	$d->query($sql);
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=product1&act=man";
	$maxR=20;
	$maxP=4;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

function get_item(){
	global $d, $item;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
		transfer("Không nhận được dữ liệu", "index.php?com=product1&act=man");
	
	$sql = "select * from #_product_cat where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=product1&act=man");
	$item = $d->fetch_array();
}

function save_cat(){
	global $d;
	$name = $_FILES['file']['name'];
	$name = explode('.',$name);
	$name = changeTitle($name[0]);
	
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=product1&act=man");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	if($id){
		
		$id =  themdau($_POST['id']);
		if($photo = upload_image("file", 'jpg|png|gif|JPG|PNG|GIF|jpeg|JPEG', _upload_sanpham,$name.'-'.time())){
			$data['photo'] = $photo;
			$data['thumb'] = create_thumb($data['photo'], 320, 320, _upload_sanpham,$name.'-'.time(),1);
			$d->setTable('product_cat');
			$d->setWhere('id', $id);
			$d->select();
			if($d->num_rows()>0){
				$row = $d->fetch_array();
				delete_file(_upload_sanpham.$row['photo']);
				delete_file(_upload_sanpham.$row['thumb']);
			}
		}

		$data['ten_vi'] = $_POST['ten_vi'];
		$data['ten_en'] = $_POST['ten_en'];
		
		$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);
		
		$data['title_vi'] = $_POST['title_vi'];
		$data['description_vi'] = $_POST['description_vi'];
		$data['keywords_vi'] = $_POST['keywords_vi'];
		
		$data['title_en'] = $_POST['title_en'];
		$data['description_en'] = $_POST['description_en'];
		$data['keywords_en'] = $_POST['keywords_en'];
		
		
		
		$data['stt'] = $_POST['stt'];		
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaysua'] = time();
		
		$d->setTable('product_cat');
		$d->setWhere('id', $id);
		if($d->update($data))
			redirect("index.php?com=product1&act=man");
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=product1&act=man");
	}else{
		if($photo = upload_image("file", 'jpg|png|gif|JPG|PNG|GIF|jpeg|JPEG', _upload_sanpham,$name.'-'.time())){
			$data['photo'] = $photo;
			$data['thumb'] = create_thumb($data['photo'], 320, 320, _upload_sanpham,$name.'-'.time(),1);
		}
		
		
		
		$data['ten_vi'] = $_POST['ten_vi'];
		$data['ten_en'] = $_POST['ten_en'];
		
		$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);
		
		$data['title_vi'] = $_POST['title_vi'];
		$data['description_vi'] = $_POST['description_vi'];
		$data['keywords_vi'] = $_POST['keywords_vi'];
		
		$data['title_en'] = $_POST['title_en'];
		$data['description_en'] = $_POST['description_en'];
		$data['keywords_en'] = $_POST['keywords_en'];
		
	
		$data['stt'] = $_POST['stt'];		
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaytao'] = time();
		
		$d->setTable('product_cat');
		if($d->insert($data))
			redirect("index.php?com=product1&act=man");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=product1&act=man");
	}
}

function delete(){
	global $d;
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);
		$d->reset();
		$sql = "select id, photo,thumb from #_product_cat where id='".$id."'";
		$d->query($sql);
		if($d->num_rows()>0){
			while($row = $d->fetch_array()){
				delete_file(_upload_sanpham.$row['photo']);
				delete_file(_upload_sanpham.$row['thumb']);
				
			}
			$sql = "delete from #_product_cat where id='".$id."'";
		}
		
		if($d->query($sql))
			redirect("index.php?com=product1&act=man");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=product1&act=man");
		
	}elseif (isset($_GET['listid'])==true){
		$listid = explode(",",$_GET['listid']); 
		for ($i=0 ; $i<count($listid) ; $i++){
			$idTin=$listid[$i]; 
			$id =  themdau($idTin);
			$d->reset();		
			$sql = "select id, photo,thumb from #_product_cat where id='".$id."'";
			$d->query($sql);
			if($d->num_rows()>0){
				while($row = $d->fetch_array()){
					delete_file(_upload_sanpham.$row['photo']);
					delete_file(_upload_sanpham.$row['thumb']);
					
				}
				$sql = "delete from #_product_cat where id='".$id."'";
			}
			$d->query($sql);
		}
		redirect("index.php?com=product1&act=man");
	}else transfer("Không nhận được dữ liệu", "index.php?com=product1&act=man");
}
?>