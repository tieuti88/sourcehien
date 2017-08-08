<?php  if(!defined('_source')) die("Error");
		
		$d->reset();
		$sql = "select title_$lang,description_$lang,keywords_$lang from #_company";
		$d->query($sql);
		$cccc = $d->fetch_array();
		
		$title_bar = _search.' - '.$cccc['title_'.$lang];
		$description = $cccc['description_'.$lang];
		$keywords = $cccc['keywords_'.$lang];
		
		$sql = "select id,id_cat,id_item,ten_$lang,tenkhongdau,thumb,giaban,khuyenmai from #_product where hienthi=1";
		
		if(isset($_GET['keyword']) && $_GET['keyword'] !=''){
			$tukhoa = trim(strip_tags($_GET['keyword']));    	
			if (get_magic_quotes_gpc()==false) {
				$tukhoa = mysql_real_escape_string($tukhoa);    			
			}
											
			$sql .= " and ten_$lang like'%$tukhoa%'";
		}
		
		if(isset($_GET['idc']) && $_GET['idc'] !=''){
		
			$sql .= " and id_cat=".$_GET['idc'];
		}
		
		if($_GET['price-from'] !=''){
		
			$sql .= " and giaban >=".$_GET['price-from'];
		}
		
		if($_GET['price-to'] !=''){
		
			$sql .= " and giaban <=".$_GET['price-to'];
		}
		
		$sql .=" order by stt asc,id desc";
		
		$d->query($sql);
		$product = $d->result_array();	
		$title_abc = '<a href="'.$lang.'/index.html">'._home.'</a> &raquo; '._search;
		
		$curPage = isset($_GET['p']) ? $_GET['p'] : '1';
		$search = isset($_GET['keyword']) ? 'keyword='.$_GET['keyword'].'&' : '';
		$url = getCurrentPageURL().'&';
		$maxR=15;
		$maxP=5;
		$paging=paging_home($product, $url, $curPage, $maxR, $maxP);
		$product=$paging['source'];
?>