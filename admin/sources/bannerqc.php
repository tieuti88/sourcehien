<?php	if(!defined('_source')) die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";

switch($act){
	
	case "capnhat":
		get_banner();
		$template = "bannerqc/logo_add";
		break;
	case "save":
		save_banner();
		break;
	#====================================
	#====================================
	
	case "man_trai":
		get_trais();
		$template = "bannerqc/banner_trai";
		break;
	case "add_trai":		
		$template = "bannerqc/banner_trai_add";
		break;
	case "edit_trai":
		get_trai();
		$template = "bannerqc/banner_trai_edit";
		break;
	case "save_trai":
		save_trai();
		break;
	case "delete_trai":
		delete_trai();
		break;
		
	#====================================
	
	case "man_phai":
		get_phais();
		$template = "bannerqc/banner_phai";
		break;
	case "add_phai":		
		$template = "bannerqc/banner_phai_add";
		break;
	case "edit_phai":
		get_phai();
		$template = "bannerqc/banner_phai_edit";
		break;
	case "save_phai":
		save_phai();
		break;
	case "delete_phai":
		delete_phai();
		break;	
	
	default:
		$template = "index";
}
function fns_Rand_digit($min,$max,$num)
	{
		$result='';
		for($i=0;$i<$num;$i++){
			$result.=rand($min,$max);
		}
		return $result;	
	}


function get_banner(){
	global $d, $item;

	$sql = "select * from #_photo where com='banner_top'";
	$d->query($sql);
	//if($d->num_rows()==0) transfer("Dữ liệu chưa khởi tạo.", "index.php");
	$item = $d->fetch_array();
}

function save_banner(){
	global $d;
	$file_name=fns_Rand_digit(0,9,3);
	$sql = "select * from #_photo where com='banner_top'";
	$d->query($sql);
	$item = $d->fetch_array();
	$id=$item['id'];
	//echo dump($id);
	
	if($id){ // cap nhat
		if($photo = upload_image("file", 'swf|png|jpg|gif|JPEG', _upload_hinhanh,$file_name)){
			$data['photo'] = $photo;
			$d->setTable('photo');
			$d->setWhere('id', $id);
			$d->select();
			$row = $d->fetch_array();
			delete_file(_upload_hinhanh.$row['photo']);
		}
		$data['ten'] = $_POST['ten'];
		$d->setTable('photo');
		$d->setWhere('id', $id);
		$d->setWhere('com','banner_top');
		if($d->update($data))
			redirect("index.php?com=bannerqc&act=capnhat");
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=bannerqc&act=capnhat");
	}else{ // them moi
		$data['photo'] = upload_image("file".$i, 'swf|png|jpg|gif|JPEG', _upload_hinhanh,$file_name);
		if(!$data['photo']) $data['photo']="";
		
		$data['ten'] = $_POST['ten'];
		$data['com']='banner_top';
		$d->setTable('photo');
		if($d->insert($data))
		redirect("index.php?com=bannerqc&act=capnhat");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=bannerqc&act=capnhat");
	
}
}


#=============================================

function get_trais(){
	global $d, $items, $paging;
	
	$d->setTable('photo');
	$d->setWhere('com', 'left');
	$d->setOrder('stt,id desc');
	$d->select('*');
	$d->query();
	$items = $d->result_array();
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=bannerqc&act=man_trai";
	$maxR=10;
	$maxP=4;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];

}

function get_trai(){
	global $d, $item, $list_cat;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
	transfer("Không nhận được dữ liệu", "index.php?com=bannerqc&act=man_trai");
	$d->setTable('photo');
	$d->setWhere('id', $id);
	$d->select();
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=bannerqc&act=man_trai");
	$item = $d->fetch_array();	
}

function save_trai(){
	global $d;
	$file_name=fns_Rand_digit(0,9,15);
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=bannerqc&act=man_trai");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	if($id){
			if($photo = upload_image("file", 'Jpg|jpg|png|gif|JPG|jpeg|JPEG', _upload_hinhanh,$file_name)){
				$data['photo'] = $photo;
				$d->setTable('photo');
				$d->setWhere('id', $id);
				$d->select();
				if($d->num_rows()>0){
					$row = $d->fetch_array();
					delete_file(_upload_hinhanh.$row['photo']);
				}
			}
			$data['com'] = 'left';
			$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
			$data['stt'] = $_POST['stt'];
			$d->reset();
			$d->setTable('photo');
			$d->setWhere('id', $id);
			if(!$d->update($data)) transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=bannerqc&act=man_trai");
			redirect("index.php?com=bannerqc&act=man_trai");
			
	}else{ 			for($i=0; $i<5; $i++){
				if($data['photo'] = upload_image("file".$i, 'Jpg|jpg|png|gif|JPG|jpeg|JPEG', _upload_hinhanh,$file_name.$i))
					{		
						$data['com'] = 'left';				
						$data['stt'] = $_POST['stt'.$i];
						$data['ten'] = $_POST['ten'.$i];									
						$data['hienthi'] = isset($_POST['hienthi'.$i]) ? 1 : 0;																	
						$d->setTable('photo');
						if(!$d->insert($data)) transfer("Lưu dữ liệu bị lỗi", "index.php?com=bannerqc&act=man_trai");
					}
			}

			redirect("index.php?com=bannerqc&act=man_trai");
	}
}

function delete_trai(){
	global $d;
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);
		$d->setTable('photo');
		$d->setWhere('id', $id);
		$d->select();
		if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=bannerqc&act=man_trai");
		$row = $d->fetch_array();
		delete_file(_upload_hinhanh.$row['photo']);
		if($d->delete())
			redirect("index.php?com=bannerqc&act=man_trai");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=bannerqc&act=man_trai");
	}else transfer("Không nhận được dữ liệu", "index.php?com=bannerqc&act=man_trai");
}



#=============================================

function get_phais(){
	global $d, $items, $paging;
	
	$d->setTable('photo');
	$d->setWhere('com', 'right');
	$d->setOrder('stt,id desc');
	$d->select('*');
	$d->query();
	$items = $d->result_array();
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=bannerqc&act=man_phai";
	$maxR=10;
	$maxP=4;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];

}

function get_phai(){
	global $d, $item, $list_cat;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
	transfer("Không nhận được dữ liệu", "index.php?com=bannerqc&act=man_phai");
	$d->setTable('photo');
	$d->setWhere('id', $id);
	$d->select();
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=bannerqc&act=man_phai");
	$item = $d->fetch_array();	
}

function save_phai(){
	global $d;
	$file_name=fns_Rand_digit(0,9,15);
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=bannerqc&act=man_phai");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	if($id){
			if($photo = upload_image("file", 'Jpg|jpg|png|gif|JPG|jpeg|JPEG', _upload_hinhanh,$file_name)){
				$data['photo'] = $photo;
				$d->setTable('photo');
				$d->setWhere('id', $id);
				$d->select();
				if($d->num_rows()>0){
					$row = $d->fetch_array();
					delete_file(_upload_hinhanh.$row['photo']);
				}
			}
			$data['com'] = 'right';
			$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
			$data['stt'] = $_POST['stt'];
			$d->reset();
			$d->setTable('photo');
			$d->setWhere('id', $id);
			if(!$d->update($data)) transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=bannerqc&act=man_phai");
			redirect("index.php?com=bannerqc&act=man_phai");
			
	}else{ 			for($i=0; $i<5; $i++){
				if($data['photo'] = upload_image("file".$i, 'Jpg|jpg|png|gif|JPG|jpeg|JPEG', _upload_hinhanh,$file_name.$i))
					{		
						$data['com'] = 'right';				
						$data['stt'] = $_POST['stt'.$i];
						$data['ten'] = $_POST['ten'.$i];									
						$data['hienthi'] = isset($_POST['hienthi'.$i]) ? 1 : 0;																	
						$d->setTable('photo');
						if(!$d->insert($data)) transfer("Lưu dữ liệu bị lỗi", "index.php?com=bannerqc&act=man_phai");
					}
			}

			redirect("index.php?com=bannerqc&act=man_phai");
	}
}

function delete_phai(){
	global $d;
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);
		$d->setTable('photo');
		$d->setWhere('id', $id);
		$d->select();
		if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=bannerqc&act=man_phai");
		$row = $d->fetch_array();
		delete_file(_upload_hinhanh.$row['photo']);
		if($d->delete())
			redirect("index.php?com=bannerqc&act=man_phai");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=bannerqc&act=man_phai");
	}else transfer("Không nhận được dữ liệu", "index.php?com=bannerqc&act=man_phai");
}


?>