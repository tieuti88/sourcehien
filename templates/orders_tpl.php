<script type="text/javascript">
function validEmail(obj) {
	var s = obj.value;
	for (var i=0; i<s.length; i++)
		if (s.charAt(i)==" "){
			return false;
		}
	var elem, elem1;
	elem=s.split("@");
	if (elem.length!=2)	return false;

	if (elem[0].length==0 || elem[1].length==0)return false;

	if (elem[1].indexOf(".")==-1)	return false;

	elem1=elem[1].split(".");
	for (var i=0; i<elem1.length; i++)
		if (elem1[i].length==0)return false;
	return true;
}//Kiem tra dang email
function IsNumeric(sText)
{
	var ValidChars = "0123456789";
	var IsNumber=true;
	var Char;

	for (i = 0; i < sText.length && IsNumber == true; i++) 
	{ 
		Char = sText.charAt(i); 
		if (ValidChars.indexOf(Char) == -1) 
		{
			IsNumber = false;
		}
	}
	return IsNumber;
}//Kiem tra dang so

function validate(evt) {
  var theEvent = evt || window.event;
  var key = theEvent.keyCode || theEvent.which;
  key = String.fromCharCode( key );
  var regex = /[0-9]|\./;
  if( !regex.test(key) ) {
    theEvent.returnValue = false;
    if(theEvent.preventDefault) theEvent.preventDefault();
  }
}

function check()
		{
			var frm 	= document.frm_order;
			
			if(frm.ten.value=='') 
			{ 
				alert( "Bạn chưa điền họ tên." );
				frm.ten.focus();
				return false;
			}
			if(frm.dienthoai.value=='') 
			{ 
				alert( "Bạn chưa điền điện thoại." );
				frm.dienthoai.focus();
				return false;
			}
			if(frm.diachi.value=='') 
			{ 
				alert( "Bạn chưa điền địa chỉ." );
				frm.diachi.focus();
				return false;
			}
			
			if(frm.email.value=='') 
			{ 
				alert( "Bạn chưa điền email." );
				frm.email.focus();
				return false;
			}
			if(!validEmail(frm.email)){
				alert('Vui lòng nhập đúng địa chỉ email');
				frm.email.focus();
				return false;
			}												
			frm.submit();		
		}	
</script>



<div class="info-title"><h2><?=_thanhtoan?></h2></div>
<div class="info-content">
	<div class="text" >
    <table border="0" cellpadding="5px" cellspacing="1px" width="100%">
      <?
			if(is_array($_SESSION['cart'])){
            	echo '<tr bgcolor="#3d3d3d" style="font-weight:bold;color:#FFF;height: 30px;"><td align="center" style="width:3%;">'._stt.'</td><td align="center">'._ten.'</td><td align="center">'._cost.'</td><td align="center">'._soluong.'</td><td align="center">'._tong.'</td></tr>';
				$max=count($_SESSION['cart']);
				for($i=0;$i<$max;$i++){
					$pid=$_SESSION['cart'][$i]['productid'];
					
					$q=$_SESSION['cart'][$i]['qty'];
					$pname=get_product_name($pid,$lang,_upload_sanpham_l);
					if($q==0) continue;
			?>
      <tr >
        <td width="5%" align="center" style="height: 25px;"><?=$i+1?></td>
        <td width="29%" align="center"><?=$pname?></td>
        <td width="20%" align="center"><?=number_format(get_price($pid),0, ',', '.')?>&nbsp;vnđ</td>
         
        <td width="14%" align="center"><?=$q?></td>
       
        <td width="17%" align="center"><?=number_format(get_price($pid)*$q,0, ',', '.') ?>&nbsp;vnđ</td>
      </tr>
      <?					
				}
			?>
     
        <td colspan="5"><table width="100%" cellpadding="0" cellspacing="0" border="0">
            <tr>
              <td style="height:30px;"><b><?=_tonggia?>:
                <span ><?=number_format(get_order_total(),0, ',', '.')?></span>&nbsp;vnđ</b></td>
            </tr>
          </table></td>
      </tr>
      
      
      
      <?
            }
			else{
				echo "<tr ><td>There are no items in your shopping cart!</td>";
			}
		?>
    </table>
    </div>
    <div class="info-title"><h2><?=_khachhang?></h2></div>
    <div class="info-content">
    <div class="text">
    <form method="post" name="frm_order" action="" enctype="multipart/form-data" onsubmit="return check();">
      <table width="100%" cellpadding="5" cellspacing="5" border="0" class="tablelienhe">
        <tr>
          <td><b><?=_hovaten?></b><span>*</span></td>
          <td><input name="ten" id="ten" class="input" value="<?=$_POST['ten']?>" /></td>
        </tr>
        <tr>
          <td><b><?=_phone?></b><span>*</span></td>
          <td><input name="dienthoai" id="dienthoai" class="input" value="<?=$_POST['dienthoai']?>" onkeypress="return validate();" /></td>
        </tr>
        <tr>
          <td><b><?=_address?></b><span>*</span></td>
          <td><input  name="diachi"  id="diachi" class="input"  value="<?=$_POST['diachi']?>"/></td>
        </tr>
        <tr>
          <td><b>E-mail</b><span>*</span></td>
          <td><input name="email" id="email" class="input"  value="<?=$_POST['email']?>"/></td>
        </tr>
        <tr>
          <td><b><?=_noidung?></b></td>
          <td><textarea name="noidung"  cols="50" rows="5"  ><?=$_POST['noidung']?>
</textarea></td>
        </tr>
       
        
      </table>
      <div style="text-align: right; padding-top:20px;">
        <input class="button" type="submit" name="next" value="<?=_guidonhang?>" style="cursor:pointer;padding:5px 10px;"/>
      </div>
    </form>
    </div>
  </div>
</div>
