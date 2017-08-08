<?php  if(!defined('_source')) die("Error");



		@$string_cat = trim($_GET['idc']);

		@$string_item = trim($_GET['idi']);

		@$idc1 = addslashes($_GET['idc1']);

		@$id = addslashes($_GET['id']);

		

		$d->reset();

		$sql = "select title_$lang,description_$lang,keywords_$lang from #_company";

		$d->query($sql);

		$cccc = $d->fetch_array();

		

		$title_bar = 'Dịch vụ'.' - '.$cccc['title_'.$lang];

		$description = $cccc['description_'.$lang];

		$keywords = $cccc['keywords_'.$lang];

		

		$d->reset();

		if($id){

			$sql_detail = "select * from #_product where id='".$id."'";

			$d->query($sql_detail);

			$product_detail = $d->fetch_array();

			

			$luotxem = $product_detail['luotxem']+1;

			$sql = "update #_product SET luotxem=$luotxem where id=$id";

			$d->query($sql);

			

			

			if($product_detail['title_'.$lang]){$title_bar = $product_detail['title_'.$lang];}

			if($product_detail['description_'.$lang]){$description = $product_detail['description_'.$lang];}

			if($product_detail['keywords_'.$lang]){$keywords = $product_detail['keywords_'.$lang];}

			

			$d->reset();

			$sql = "select thumb,photo from #_product_photo where hienthi=1 and id_product=".$product_detail['id']." order by stt asc, id desc";

			$d->query($sql);

			$product_photo = $d->result_array();

			

			$d->reset();

			if($product_detail['id_cat'] !=0 && $product_detail['id_item'] == 0 && $idc1 ==0){

			$sql_khac = "select * from #_product where id!=$id and id_cat=".$product_detail['id_cat']." order by stt asc,id desc limit 0,10";

			

			$title_abc = '<a href="'.$lang.'/index.html">'._home.'</a> &raquo; <a href="product/">'._product.'</a> &raquo; <a href="product/'.$id_cat['tenkhongdau'].'/">'.$id_cat['ten_'.$lang].'</a>';

			}elseif($product_detail['id_item'] != 0 && $idc1 == 0){

			$sql_khac = "select * from #_product where id!=$id and id_item=".$product_detail['id_item']." order by stt asc,id desc limit 0,10";

			

			$title_abc = '<a href="'.$lang.'/index.html">'._home.'</a> &raquo; <a href="product/">'._product.'</a> &raquo; <a href="product/'.$id_cat['tenkhongdau'].'/">'.$id_cat['ten_'.$lang].'</a> &raquo; <a href="product/'.$id_cat['tenkhongdau'].'/'.$id_item['tenkhongdau'].'/">'.$id_item['ten_'.$lang].'</a>';

			}elseif($idc1 !=0){

			$sql_khac = "select * from #_product where hienthi=1 and id !=$id and id_cat1='".$idc1."'";

			

			$title_abc = '<a href="'.$lang.'/index.html">'._home.'</a> &raquo; <a href="'.$lang.'/product/">'._product.'</a> &raquo; <a href="'.$lang.'/product/'.$id_cat['tenkhongdau'].'/">'.$id_cat['ten_'.$lang].'</a> &raquo; <a href="'.$lang.'/product/'.$id_cat['tenkhongdau'].'/'.$id_item['tenkhongdau'].'/">'.$id_item['ten_'.$lang].'</a> &raquo; <a href="'.$lang.'/product/'.$id_cat['tenkhongdau'].'/'.$id_item['tenkhongdau'].'/'.$url_3.'">'.$id_cat1['ten_'.$lang].'</a>';

			}else{

			$sql_khac = "select * from #_product where id!=$id order by stt asc,id desc limit 0,10";

			}

			$d->query($sql_khac);

			$product = $d->result_array();

			 		

		}else

		{

			if($idc !='' && $idi == '' && $idc1 == ''){

			$sql ="select * from #_product where hienthi=1 and id_cat=$idc";

			}elseif($idi !='' && $idc1 == ''){

			$sql = "select * from #_product where hienthi=1 and id_cat=$idc and id_item=$idi";

			}elseif($idc1 != ''){

			$sql = "select * from #_product where hienthi=1 and id_cat=$idc and id_item=$idi and id_cat1=$idc1";	

			}else{

				$sql = "select * from #_product where hienthi=1";

				$title_abc = '<a href="'.$lang.'/index.html">'._home.'</a> &raquo; '._product;

			}

			

			$sql.= " order by stt asc,id desc";

			$d->query($sql);

			$product = $d->result_array();

			

			$curPage = isset($_GET['p']) ? $_GET['p'] : '1';

			$url_cat = $string_cat ? $string_cat."/" : "";

			$url_item = $string_item ? $string_item."/" : "";

			

			$url = 'dich-vu/'.$url_cat.$url_item.$url_3;

			$maxR=10;

			$maxP=5;

			$paging=paging_home($product, $url, $curPage, $maxR, $maxP);

			$product=$paging['source'];

		}

?>