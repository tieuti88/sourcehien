<?php

if($_REQUEST['command']=='delete' && $_REQUEST['pid']>0){
		remove_product($_REQUEST['pid']);
	}
	else if($_REQUEST['command']=='clear'){
		unset($_SESSION['cart']);
	}
	else if($_REQUEST['command']=='update'){
		$max=count($_SESSION['cart']);
		for($i=0;$i<$max;$i++){
			$pid=$_SESSION['cart'][$i]['productid'];
			$q=intval($_REQUEST['product'.$pid]);
			if($q>0 && $q<=999){
				$_SESSION['cart'][$i]['qty']=$q;
			}
			else{
				$msg='Some proudcts not updated!, quantity must be a number between 1 and 999';
			}
		}
	}
?>
<script language="javascript">
	function del(pid){
		if(confirm('Do you really mean to delete this item')){
			document.form1.pid.value=pid;
			document.form1.command.value='delete';
			document.form1.submit();
		}
	}
	function clear_cart(){
		if(confirm('This will empty your shopping cart, continue?')){
			document.form1.command.value='clear';
			document.form1.submit();
		}
	}
	function update_cart(){
		document.form1.command.value='update';
		document.form1.submit();
	}
</script>
<div class="info-title"><h2><?=_gh?></h2></div>
<div class="info-content">
	<div class="text" >
      <form name="form1" method="post">
        <input type="hidden" name="pid" />
        <input type="hidden" name="command" />
        <table border="0" cellpadding="5px" cellspacing="1px" style="" width="100%">
          <?
			if(is_array($_SESSION['cart'])){
            	echo '<tr bgcolor="#3d3d3d" style="font-weight:bold;text-transform:uppercase;color:#FFF;height: 30px;"><td align="center" style="width:4%;">'._stt.'</td><td align="center">'._ten.'</td><td align="center">'._cost.'</td><td align="center">'._soluong.'</td><td align="center">'._tong.'</td><td align="center" style="width:4%;">'._xoa.'</td></tr>';
				$max=count($_SESSION['cart']);
				for($i=0;$i<$max;$i++){
					$pid=$_SESSION['cart'][$i]['productid'];
						
					$q=$_SESSION['cart'][$i]['qty'];
				
					$pname=get_product_name($pid,$lang,_upload_sanpham_l);
					if($q==0) continue;
			?>
          <tr  style="text-align: center">
            <td width="3%" align="center"><?=$i+1?></td>
            <td width="29%"><?=$pname?></td>
            <td width="17%" align="center"><?=number_format(get_price($pid),0, ',', '.')?>&nbsp;vnđ</td>
            
            <td width="15%" align="center"><input type="text" name="product<?=$pid?>" value="<?=$q?>" maxlength="3" size="2" style="text-align:center; border:1px solid #F0F0F0" />
              &nbsp;</td>
            
            <td width="18%" align="center"><?=number_format(get_price($pid)*$q,0, ',', '.') ?>&nbsp;vnđ</td>
            <td align="center"><a href="javascript:del(<?=$pid?>)"><img src="images/delete.gif" border="0" /></a></td>
          </tr>
          <?					
				}
			?>
          
          
            
          <tr>
            <td colspan="7" style="height:30px; color: #FFF; padding-left:5px;"><b><?=_tonggia?>:
              <span><?=number_format(get_order_total(),0, ',', '.')?></span>
              &nbsp;vnđ</b></td>
          </tr>
          <tr>
            <td colspan="7" align="right" style="padding-top:10px;"><input type="button" value="<?=_muatiep?>" onclick="window.location='http://<?=$config_url?>/<?=$lang?>/product/'" class="button" style="padding:5px 10px;">
              <input type="button" value="<?=_del?>" onclick="clear_cart()" class="button" style="padding:5px 10px;">
              <input type="button" value="<?=_capnhat?>" onclick="update_cart()" class="button" style="padding:5px 10px;">
              <input type="button" value="<?=_thanhtoan?>" onclick="window.location='http://<?=$config_url?>/<?=$lang?>/orders.html'" class="button" style="padding:5px 10px;"></td>
          </tr>
          <?
            }
			else{
				echo "<tr bgColor='#FFFFFF'><td align='center'><b style='color:#F00; font-size: 20px;'>"._tb."</b></td>";
			}
		?>
        </table>
      </form>
	</div>
</div>
