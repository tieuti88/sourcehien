<?php  if(!defined('_source')) die("Error");

		
		$d->reset();
		$sql = "select title_$lang,description_$lang,keywords_$lang from #_company";
		$d->query($sql);
		$cccc = $d->fetch_array();
		
		$title_bar = _gh." - ".$cccc['title_'.$lang];
		$description = $cccc['description_'.$lang];
		$keywords = $cccc['keywords_'.$lang];
		
		$title_abc = '<a href="'.$lang.'/index.html">'._home.'</a> &raquo; '._gh;
	
?>