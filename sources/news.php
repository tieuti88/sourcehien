<?php  if(!defined('_source')) die("Error");

	

	@$string_cat = trim($_GET['idc']);

	@$id =  addslashes($_GET['id']);

	

	$d->reset();

	$sql = "select title_$lang,description_$lang,keywords_$lang from #_company";

	$d->query($sql);

	$cccc = $d->fetch_array();

	

	$title_bar = _news.' - '.$cccc['title_'.$lang];

	$description = $cccc['description_'.$lang];

	$keywords = $cccc['keywords_'.$lang];

	$title_abc = '<a href="'.$lang.'/index.html">'._home.'</a> &raquo; '._news;

	

	if($string_cat){

		$d->reset();	

		$sql = "select id,ten_$lang,tenkhongdau,title_$lang,description_$lang,keywords_$lang from #_news_cat where tenkhongdau ='".$string_cat."'";

		$d->query($sql);

		$id_cat = $d->fetch_array();

		$idc = $id_cat['id'];

		

		if($id_cat['title_'.$lang]){$title_bar = $id_cat['title_'.$lang];}

		if($id_cat['description_'.$lang]){$description = $id_cat['description_'.$lang];}

		if($id_cat['keywords_'.$lang]){$keywords = $id_cat['keywords_'.$lang];}

		

		$title_abc = '<a href="'.$lang.'/index.html">'._home.'</a> &raquo; <a href="'.$lang.'/news/">'._news.'</a> &raquo; '.$id_cat['ten_'.$lang];

	}



	if($id){



		$sql = "select id,id_cat,ten_$lang,mota_$lang,noidung_$lang,ngaytao,luotxem,title_$lang,description_$lang,keywords_$lang from #_news where hienthi=1 and id='".$id."'";

		$d->query($sql);

		$tintuc_detail = $d->fetch_array();

		

		

		

		if($tintuc_detail['title_'.$lang])$title_bar = $tintuc_detail['title_'.$lang];

		if($tintuc_detail['description_'.$lang])$description = $tintuc_detail['description_'.$lang];

		if($tintuc_detail['keywords_'.$lang])$keywords = $tintuc_detail['keywords_'.$lang];

		

		$luotxem = $tintuc_detail['luotxem']+1;

		$sql_update = "update #_news SET luotxem=$luotxem where id=$id";

		$d->query($sql_update);

		

	

		if($tintuc_detail['id_cat'] !=0){

		$sql_khac = "select id,id_cat,ten_$lang,tenkhongdau,thumb,ngaytao from #_news where hienthi=1 and id !='".$id."' and id_cat=".$tintuc_detail['id_cat']." order by stt asc,id desc";

		$title_abc = '<a href="'.$lang.'/index.html">'._home.'</a> &raquo; <a href="'.$lang.'/news/">'._news.'</a> &raquo; <a href="'.$lang.'/news/'.$id_cat['tenkhongdau'].'/">'.$id_cat['ten_'.$lang].'</a>';

		}else{

		$sql_khac = "select id,id_cat,ten_$lang,tenkhongdau,thumb,ngaytao from #_news where hienthi=1 and id !='".$id."' order by stt asc,id desc";

		$title_abc = '<a href="'.$lang.'/index.html">'._home.'</a> &raquo; <a href="'.$lang.'/news/">'._news.'</a> &raquo; '.$tintuc_detail['ten_'.$lang];

		}

		$d->query($sql_khac);

		$tintuc_khac = $d->result_array();

	

	}else{

		

		

	

		$sql_tintuc = "select id,id_cat,ten_$lang,tenkhongdau,mota_$lang,thumb,ngaytao,luotxem from #_news where hienthi=1 order by stt asc,id desc";

		

		$d->query($sql_tintuc);

		$tintuc = $d->result_array();

		$curPage = isset($_GET['p']) ? $_GET['p'] : 1;

		$url_cat = $string_cat ? $string_cat."/" : "";

		$url ='news/'.$url_cat;

		$maxR=6;

		$maxP=5;

		$paging=paging_home($tintuc, $url, $curPage, $maxR, $maxP);

		$tintuc=$paging['source'];

	}

?>