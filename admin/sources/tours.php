<?php	if(!defined('_source')) die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";

switch($act){
	case "man":
		get_items();
		$template = "tours/items";
		break;
	case "add":
		get_list();
		$template = "tours/item_add";
		break;
	case "edit":
		get_list($_GET['id_item']);
		get_item();
		$template = "tours/item_add";
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
		$template = "tours/cats";
		break;
	case "add_cat":
		$template = "tours/cat_add";
		break;
	case "edit_cat":
		get_cat();
		$template = "tours/cat_add";
		break;
	case "save_cat":
		save_cat();
		break;
	case "delete_cat":
		delete_cat();
		break;
	#===================================================	
	case "man_photo":
		get_photos();
		$template = "tours/photos";
		break;
	case "add_photo":
		get_list_cat();
		$template = "tours/photo_add";
		break;
	case "edit_photo":
		get_list_cat();
		get_photo();
		$template = "tours/photo_edit";
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

function fns_Rand_digit($min,$max,$num)
	{
		$result='';
		for($i=0;$i<$num;$i++){
			$result.=rand($min,$max);
		}
		return $result;	
	}

function get_photos(){
	global $d, $items, $paging;
	
	$d->setTable('tours_pic');
	$d->setOrder('id_tours,id desc');
	$d->select('*');
	$d->query();
	$items = $d->result_array();
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=tours&act=man_photo";
	$maxR=10;
	$maxP=4;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];

}

function get_photo(){
	global $d, $item, $list_cat;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
	transfer("Không nhận được dữ liệu", "index.php?com=tours&act=man_photo");
	$d->setTable('tours_pic');
	$d->setWhere('id', $id);
	$d->select();
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=tours&act=man_photo");
	$item = $d->fetch_array();
	get_list_cat($item['id_tours']);
}

function save_photo(){
	global $d;
	$file_name=fns_Rand_digit(0,9,15);
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=tours&act=man_photo");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	if($id){
			if($photo = upload_image("file", 'jpg|png|gif', _upload_tours,$file_name)){
				$data['urlhinh'] = $photo;
				$d->setTable('tours_pic');
				$d->setWhere('id', $id);
				$d->select();
				if($d->num_rows()>0){
					$row = $d->fetch_array();
					delete_file(_upload_tours.$row['urlhinh']);
				}
			}
			$data['tenhinh'] = $_POST['mota'.$i];
			$data['id_tours'] = $_POST['id_item'];
			$d->reset();
			$d->setTable('tours_pic');
			$d->setWhere('id', $id);
			if(!$d->update($data)) transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=tours&act=man_photo");
			redirect("index.php?com=tours&act=man_photo");
			
	}else{ 
			for($i=0; $i<5; $i++){
				if($data['urlhinh'] = upload_image("file".$i, 'jpg|png|gif', _upload_tours,$file_name.$i))
					{																
						$data['tenhinh'] = $_POST['mota'.$i];
						$data['id_tours'] = $_POST['id_item'];
						$d->setTable('tours_pic');
						if(!$d->insert($data)) transfer("Lưu dữ liệu bị lỗi", "index.php?com=tours&act=man_photo");
					}
			}
			redirect("index.php?com=tours&act=man_photo");
	}
}

function delete_photo(){
	global $d;
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);
		$d->setTable('tours_pic');
		$d->setWhere('id', $id);
		$d->select();
		if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=img&act=man_photo");
		$row = $d->fetch_array();
		delete_file(_upload_tours.$row['urlhinh']);
		if($d->delete())
			redirect("index.php?com=tours&act=man_photo");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=tours&act=man_photo");
	}else transfer("Không nhận được dữ liệu", "index.php?com=tours&act=man_photo");
}
#====================================
function get_list_cat($id=0){
	global $d, $list_cat;
	
	$sql = "select * from #_tours order by id desc";
	$d->query($sql);
	$cats = $d->result_array();
	
	$list_cat = '<select name="id_item" class="input">';
	for($i=0, $count=count($cats); $i<$count; $i++)
		$list_cat .= '<option value="'.$cats[$i]['id'].'" '.(($cats[$i]['id']==$id)?'selected="selected"':'').'>'.$cats[$i]['tieude'].'</option>';
	$list_cat .= '</select>';
}
#====================================
function get_items(){
	global $d, $items, $paging;
	
	if(@$_REQUEST['update']!='')
	{
	$id_up = @$_REQUEST['update'];
	
	$tinnoibat=time();
	
	$sql_sp = "SELECT id,tinnoibat FROM table_tours where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$spdc1=$cats[0]['tinnoibat'];
	//echo "id:". $spdc1;
	if($spdc1==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_tours SET tinnoibat ='".$tinnoibat."' WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_tours SET tinnoibat =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");

	}	
	}
	
	if(@$_REQUEST['hienthi']!='')
	{
	$id_up = @$_REQUEST['hienthi'];
	$sql_sp = "SELECT id,hienthi FROM table_tours where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$hienthi=$cats[0]['hienthi'];
	//echo "id:". $spdc1;
	if($hienthi==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_tours SET hienthi =1 WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_tours SET hienthi =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");

	}	
	}
	
	$sql = "select * from #_tours,#_tours_item WHERE #_tours.idloai=#_tours_item.idloai order by id desc";
	$d->query($sql);
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=tours&act=man";
	$maxR=20;
	$maxP=4;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

function get_item(){
	global $d, $item;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
		transfer("Không nhận được dữ liệu", "index.php?com=tours&act=man");
	
	$sql = "select * from #_tours where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=tours&act=man");
	$item = $d->fetch_array();
}

function save_item(){
	global $d;
	$file_name=fns_Rand_digit(0,9,8);
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=tours&act=man");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	if($id){
		$id =  themdau($_POST['id']);
		
		if($photo = upload_image("file", 'jpg|png|gif',_upload_tours,$file_name)){
			$data['urlhinh'] = $photo;
			$d->setTable('tours');
			$d->setWhere('id', $id);
			$d->select();
			if($d->num_rows()>0){
				$row = $d->fetch_array();
				delete_file(_upload_tours.$row['urlhinh']);
			}
		}

		$data['idloai'] = (int)$_POST['id_item'];
		$data['tieude'] = $_POST['ten'];
		$data['thoigian'] = $_POST['thoigian'];
		$data['khoihanh'] = $_POST['khoihanh'];
		$data['gia'] = $_POST['gia'];
		$data['phuongtien'] = $_POST['phuongtien'];
		$data['dienthoai'] = $_POST['dienthoai'];
		$data['dtngoaigio'] = $_POST['llngoaigio'];
		$data['chuongtrinh'] = $_POST['chuongtrinh'];
		$data['chitietgia'] = $_POST['chitietgia'];		
		
		$d->setTable('tours');
		$d->setWhere('id', $id);
		if($d->update($data))
				redirect("index.php?com=tours&act=man");
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=tours&act=man");
	}else{
		
		if($photo = upload_image("file", 'jpg|png|gif',_upload_tours,$file_name)){
			$data['urlhinh'] = $photo;
		}
		$data['idloai'] = (int)$_POST['id_item'];
		$data['tieude'] = $_POST['ten'];
		$data['thoigian'] = $_POST['thoigian'];
		$data['khoihanh'] = $_POST['khoihanh'];
		$data['gia'] = $_POST['gia'];
		$data['phuongtien'] = $_POST['phuongtien'];
		$data['dienthoai'] = $_POST['dienthoai'];
		$data['dtngoaigio'] = $_POST['llngoaigio'];
		$data['chuongtrinh'] = $_POST['chuongtrinh'];
		$data['chitietgia'] = $_POST['chitietgia'];
		
		$d->setTable('tours');
		if($d->insert($data))
			redirect("index.php?com=tours&act=man");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=tours&act=man");
	}
}

function delete_item(){
	global $d;
	
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);
		
		$d->reset();
		$sql = "select id, photo from #_tours where id='".$id."'";
		$d->query($sql);
		if($d->num_rows()>0){
			while($row = $d->fetch_array()){
				delete_file(_upload_tintuc.$row['photo']);
			}
			$sql = "delete from #_tours where id='".$id."'";
			$d->query($sql);
		}
		
		if($d->query($sql))
			redirect("index.php?com=tours&act=man");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=tours&act=man");
	}else transfer("Không nhận được dữ liệu", "index.php?com=tours&act=man");
}
//===========================================================
function get_cats(){
	global $d, $items, $paging;
	$sql = "select * from #_tours_item order by idloai desc";
	$d->query($sql);
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=tours&act=man_cat";
	$maxR=20;
	$maxP=4;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

function get_cat(){
	global $d, $item;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
	transfer("Không nhận được dữ liệu", "index.php?com=tours&act=man_cat");
	
	$sql = "select * from #_tours_item where idloai='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=tours&act=man_cat");
	$item = $d->fetch_array();
}

function save_cat(){
	global $d;
	$file_name_item=fns_Rand_digit(0,9,5);
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=tours&act=man_cat");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	if($id){
		$data['tenloai'] = $_POST['ten'];		
		$data['id_cat'] = $_POST['theloai'];
		
		$d->setTable('tours_item');
		$d->setWhere('idloai', $id);
		if($d->update($data))
			redirect("index.php?com=tours&act=man_cat&curPage=".$_REQUEST['curPage']."");
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=tours&act=man_cat");
	}else{
		$data['tenloai'] = $_POST['ten'];		
		$data['id_cat'] = $_POST['theloai'];		
		
		$d->setTable('tours_item');
		if($d->insert($data))
			redirect("index.php?com=tours&act=man_cat");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=tours&act=man_cat");
	}
}

function delete_cat(){
	global $d;
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);
		$d->reset();
		$sql = "delete from #_tours_item where idloai='".$id."'";
		if($d->query($sql))
			redirect("index.php?com=tours&act=man_cat");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=tours&act=man_cat");
	}else transfer("Không nhận được dữ liệu", "index.php?com=tours&act=man_cat");
}

function get_list($id=0){
	global $d, $list;
	settype($id,"int");
	$list = '<select name="id_item" class="input">
	
	<option >Chọn danh mục</option>
	';
	
	$sql = "select * from #_tours_item WHERE id_cat='1' order by idloai desc";
	$d->query($sql);
	$cats = $d->result_array();	
	 $list .='<optgroup label="Du lịch nước ngoài">';	
	for($i=0, $count=count($cats); $i<$count; $i++)
		$list .= '<option value="'.$cats[$i]['idloai'].'" '.(($cats[$i]['idloai']==$id)?'selected="selected"':'').'>'.$cats[$i]['tenloai'].'		</option>';
	$list .='</optgroup>';
	
	$sql = "select * from #_tours_item WHERE id_cat='2' order by idloai desc";
	$d->query($sql);
	$cats = $d->result_array();	
	 $list .='<optgroup label="Du lịch trong nước">';	
	for($i=0, $count=count($cats); $i<$count; $i++)
		$list .= '<option value="'.$cats[$i]['idloai'].'" '.(($cats[$i]['idloai']==$id)?'selected="selected"':'').'>'.$cats[$i]['tenloai'].'		</option>';
	$list .='</optgroup>';
	
	$sql = "select * from #_tours_item WHERE id_cat='3' order by idloai desc";
	$d->query($sql);
	$cats = $d->result_array();	
	 $list .='<optgroup label="Tour lẻ trong tuần">';	
	for($i=0, $count=count($cats); $i<$count; $i++)
		$list .= '<option value="'.$cats[$i]['idloai'].'" '.(($cats[$i]['idloai']==$id)?'selected="selected"':'').'>'.$cats[$i]['tenloai'].'		</option>';
	$list .='</optgroup>';
	
	$list .= '</select>';
}
?>

	
