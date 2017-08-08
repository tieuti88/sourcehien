<?php  if(!defined('_source')) die("Error");
	
	$d->reset();
	$sql = "select title_$lang,description_$lang,keywords_$lang from #_company";
	$d->query($sql);
	$cccc = $d->fetch_array();
	
	$title_bar = _service.' - '.$cccc['title_'.$lang];
	$description = $cccc['description_'.$lang];
	$keywords = $cccc['keywords_'.$lang];
	$title_abc = '<a href="'.$lang.'/index.html">'._home.'</a> &raquo; '._service;

	if(isset($_GET['id'])){
		
		$id =  addslashes($_GET['id']);
		$sql = "select id,ten_$lang,mota_$lang,noidung_$lang,ngaytao,luotxem,title_$lang,description_$lang,keywords_$lang from #_service where hienthi=1 and id='".$id."'";
		$d->query($sql);
		$tintuc_detail = $d->fetch_array();

		
		
		if($tintuc_detail['title_'.$lang])$title_bar = $tintuc_detail['title_'.$lang];
		if($tintuc_detail['description_'.$lang])$description = $tintuc_detail['description_'.$lang];
		if($tintuc_detail['keywords_'.$lang])$keywords = $tintuc_detail['keywords_'.$lang];
		
		$luotxem = $tintuc_detail['luotxem']+1;
		$sql_update = "update #_service SET luotxem=$luotxem where id=$id";
		$d->query($sql_update);
		
	
		$sql_khac = "select ten_$lang,tenkhongdau,ngaytao,id from #_service where hienthi=1 and id !='".$id."' order by stt asc,id desc limit 0,20";
		$d->query($sql_khac);
		$tintuc_khac = $d->result_array();
	
	}else{
		
		
	
		$sql_tintuc = "select ten_$lang,tenkhongdau,mota_$lang,thumb,id,ngaytao,luotxem from #_service where hienthi=1 order by stt asc,id desc";
		
		$d->query($sql_tintuc);
		$tintuc = $d->result_array();
		$curPage = isset($_GET['p']) ? $_GET['p'] : 1;
		$url = $lang.'/service/';
		$maxR=12;
		$maxP=5;
		$paging=paging_home($tintuc, $url, $curPage, $maxR, $maxP);
		$tintuc=$paging['source'];
	}
?>