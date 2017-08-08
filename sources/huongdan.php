<?php  if(!defined('_source')) die("Error");
	
		$d->reset();
		$sql = "select title,keywords,description from #_company";
		$d->query($sql);
		$cccc = $d->fetch_array();
		
		$title_bar = "Hướng Dẫn Khách Hàng - ".$cccc['title'];
		$description = $cccc['description'];
		$keywords = $cccc['keywords'];

	if(isset($_GET['id'])){
		#tin tuc chi tiet
		$id =  addslashes($_GET['id']);
		$sql = "select ten,mota,noidung,ngaytao,luotxem,title,description,keywords from #_huongdan where hienthi=1 and id='".$id."'";
		$d->query($sql);
		$tintuc_detail = $d->fetch_array();
		
		$title_abc = '<a href="huong-dan/">Hướng Dẫn Khách Hàng</a> &raquo; '.$tintuc_detail['ten'];
		
		if($tintuc_detail['title'])$title_bar = $tintuc_detail['title'];
		if($tintuc_detail['description'])$description = $tintuc_detail['description'];
		if($tintuc_detail['keywords'])$keywords = $tintuc_detail['keywords'];
		
		
		$luotxem = $tintuc_detail['luotxem']+1;
		$sql_update = "update #_huongdan SET luotxem=$luotxem where id=$id";
		$d->query($sql_update);
		
		#các tin cu hon
		$sql_khac = "select ten,tenkhongdau,ngaytao,id from #_huongdan where hienthi=1 and id !='".$id."' order by stt asc,id desc limit 0,20";
		$d->query($sql_khac);
		$tintuc_khac = $d->result_array();
	
	}else{
		
		
		
		$title_abc = 'Hướng Dẫn Khách Hàng';
		$sql_tintuc = "select ten,tenkhongdau,mota,photo,id,ngaytao,luotxem from #_huongdan where hienthi=1 order by stt asc,id desc";
		
		$d->query($sql_tintuc);
		$tintuc = $d->result_array();
		$curPage = isset($_GET['p']) ? $_GET['p'] : 1;
		$url = 'huong-dan/';
		$maxR=5;
		$maxP=5;
		$paging=paging_home($tintuc, $url, $curPage, $maxR, $maxP);
		$tintuc=$paging['source'];
	}
?>