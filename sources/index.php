<?php  if(!defined('_source')) die("Error");

	$d->reset();

	$sql = "select title_$lang,keywords_$lang,description_$lang from #_company";

	$d->query($sql);

	$cccc = $d->fetch_array();

	$title_bar = $cccc['title_'.$lang];

	$description = $cccc['description_'.$lang];

	$keywords = $cccc['keywords_'.$lang];


	$d->reset();

	$sql = "select id,ten_$lang,tenkhongdau,thumb,giaban,mota_$lang,photo,luotxem from #_product where hienthi=1  order by stt asc,id desc";

	$d->query($sql);

	$service_index = $d->result_array();


	$d->reset();

	$sql = "select * from #_branch where hienthi=1  order by stt asc,id desc";

	$d->query($sql);

	$branch_index = $d->result_array();

	

?>