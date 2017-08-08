<?
	function get_product_name($pid,$lang,$url){
		global $d, $row, $color;
		$sql = "select id,ten_$lang,thumb from #_product where id=$pid";
		$d->query($sql);
		$row = $d->fetch_array();
		$hinhanh = $row['thumb'];
			
		$data='';
		$data.='<div class="box-basket">';
		$data.='<div class="box-basket-img"><img src="'.$url.$hinhanh.'" width="112" height="100" alt="'.$row['ten_'.$lang].'"></a></div>';
		$data.='<div class="box-basket-name"><h2>'.$row['ten_'.$lang].'</h2></div>';
		$data.='<div class="box-basket-mota"></div>';
		$data.='</div>';
		return $data;
	}
	
	function get_price($pid){
		global $d, $row,$price;
		$sql = "select giaban,khuyenmai from table_product where id=$pid";
		$d->query($sql);
		$row = $d->fetch_array();
		
		if($row['giaban'] !=0 && $row['khuyenmai'] == 0){
		  $price = $row['giaban'];
		}elseif($row['khuyenmai'] != 0){
		  $save_price = ($row['giaban']*$row['khuyenmai'])/100;
		  $special_price = $row['giaban']-$save_price;
		  $price =  $special_price;	
		}
		
		return $price;
	}
	function remove_product($pid){
		$pid=intval($pid);
		$max=count($_SESSION['cart']);
		for($i=0;$i<$max;$i++){
			if($pid==$_SESSION['cart'][$i]['productid']){
				unset($_SESSION['cart'][$i]);
				break;
			}
		}
		$_SESSION['cart']=array_values($_SESSION['cart']);
	}
	function get_order_total(){
		$max=count($_SESSION['cart']);
		$sum=0;
		for($i=0;$i<$max;$i++){
			$pid=$_SESSION['cart'][$i]['productid'];
			$q=$_SESSION['cart'][$i]['qty'];
			$price=get_price($pid);
			$sum+=$price*$q;
		}
		return $sum;
	}
	
	function get_total(){
		$max=count($_SESSION['cart']);
		$sum=0;
		for($i=0;$i<$max;$i++){
			$pid=$_SESSION['cart'][$i]['productid'];
			$q=$_SESSION['cart'][$i]['qty'];
			$sum+=$q;
		}
		return $sum;
	}
	
	
	function addtocart($pid,$q){
		if($pid<1 or $q<1) return;
		
		if(is_array($_SESSION['cart'])){
			if(product_exists($pid)) return;
			$max=count($_SESSION['cart']);
			$_SESSION['cart'][$max]['productid']=$pid;
			$_SESSION['cart'][$max]['qty']=$q;
			
		}
		else{
			$_SESSION['cart']=array();
			$_SESSION['cart'][0]['productid']=$pid;
			$_SESSION['cart'][0]['qty']=$q;
		}
	}
	function product_exists($pid){
		$pid=intval($pid);
		$max=count($_SESSION['cart']);
		$flag=0;
		for($i=0;$i<$max;$i++){
			if($pid==$_SESSION['cart'][$i]['productid']){
				$_SESSION['cart'][$i]['qty'] +=1;
				$flag=1;
				break;
			}
		}
		return $flag;
	}

?>