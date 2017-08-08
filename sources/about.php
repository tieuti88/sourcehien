<?php  if(!defined('_source')) die("Error");



		$d->reset();

		$sql = "select title_$lang,description_$lang,keywords_$lang from #_company";

		$d->query($sql);

		$cccc = $d->fetch_array();

		

		$title_bar = _about.' - '.$cccc['title_'.$lang];

		$description = $cccc['description_'.$lang];

		$keywords = $cccc['keywords_'.$lang];

		$title_abc = '<a href="'.$lang.'/index.html">'._home.'</a> &raquo; '._about;

		

		

		$d->reset();

		$sql = "select noidung_$lang, luotxem, ngaytao, ngaysua from #_about";

		$d->query($sql);

		$about = $d->fetch_array();



	

	

?>