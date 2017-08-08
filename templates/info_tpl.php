<script language='javascript'>
  function isNumberKey(evt)
 {
 var charCode = (evt.which) ? evt.which : event.keyCode
 if (charCode > 31 && (charCode < 48 || charCode > 57))
 return false;
 return true;
 }

</script>

<div class="info-title"><h2><?=$title_abc?></h2></div>

<div class="info-content">
	<div id="left">
		<div class="left" style="border-right: 1px solid #ccc;">
			<div class="title"><h2><a href="<?=$lang?>/news/" class="transitionAll "><?=_news?></a></h2></div>
			<div class="title"><h2><a href="<?=$lang?>/service/" class="transitionAll"><?=_service?></a></h2></div>
			<div class="title"><h2><a href="<?=$lang?>/account/" class="transitionAll"><?=_account?></a></h2></div>
			<div class="content">
				<p><a href="<?=$lang?>/account/history-order.html" class="transitionAll"><?=_history_order?></a></p>
				<p><a href="<?=$lang?>/account/personal.html" class="transitionAll active"><?=_personal?></a></p>
				<p><a href="<?=$lang?>/account/change-password.html" class="transitionAll"><?=_repass?></a></p>
			
			</div>
			<div class="title"><h2><a href="<?=$lang?>/contact/" class="transitionAll"><?=_contact?></a></h2></div>
		</div>
	</div><!-- #left -->
	
	<div id="right">
		<div class="right">
			
			<form action="" method="post" id="frm_register" name="frm_register" enctype="multipart/form-data">
            <table width="95%" border="0" style="margin:20px auto;" cellpadding="0" cellspacing="5">
              <tr>
                <td width="120px" height="30px" valign="middle"><img src="<?php if($user[0]['photo']){ echo _upload_hinhanh_l.$user[0]['photo'];}else{ echo "images/no_avatar.png";}?>" width="120px" height="120px"></td>
                <td valign="bottom"><input type="file" name="file">&nbsp;<strong>Width: 120px&nbsp;&nbsp;Height: 120px</strong> ( <?=_limit_image?>)</td>
              </tr>
              <tr>
                <td width="120px" height="30px" valign="middle"><span style="font-size:12px; font-weight:bold; color:#036"><?=_hovaten?>: </span></td>
                <td><input type="text" id="name" name="name" style="width: 200px; height:23px" value="<?=$user[0]['ten']?>"></td>
              </tr>

              <tr>
                <td><span style="font-size:12px; font-weight:bold; color:#036"><?=_gioitinh?>: </span></td>
                <td><select name="sex">
                    <option value="0" <?php if($user[0]['ten']==0){echo 'selected="selected"';}?>><?=_men?></option>
                    <option value="1" <?php if($user[0]['ten']==1){echo 'selected="selected"';}?>><?=_women?></option>
                  </select></td>
              </tr>
              
              <tr>
                <td width="100px" height="30px" valign="middle"><span style="font-size:12px; font-weight:bold; color:#036"><?=_ngaysinh?>: </span></td>
                <td><select name="dd">
                	<option value="--">--</option>
                    <?php for($i=1; $i<=31; $i++){?>
                    <option value="<?=$i?>" <?php if($date[0]==$i){echo 'selected="selected"';}?>>
                    <?=$i?>
                    </option>
                    <?php }?>
                  </select>
                  <select name="mm">
                  	<option value="--">--</option>
                    <?php for($i=1; $i<=12; $i++){?>
                    <option value="<?=$i?>" <?php if($date[1]==$i){echo 'selected="selected"';}?>>
                    <?=$i?>
                    </option>
                    <?php }?>
                  </select>
                  <select name="yyyy">
                  	<option value="--">--</option>
                    <?php for($i=1960; $i<=date('Y'); $i++){?>
                    <option value="<?=$i?>" <?php if($date[2]==$i){echo 'selected="selected"';}?>>
                    <?=$i?>
                    </option>
                    <?php }?>
                  </select></td>
              </tr>
              
              <tr>
                <td width="120px" height="30px" valign="middle"><span style="font-size:12px; font-weight:bold; color:#036"><?=_phone?>: </span></td>
                <td><input type="text" id="phone" name="phone" style="width: 200px; height:23px" onKeyPress="return isNumberKey(event)" value="<?=$user[0]['dienthoai']?>">
                  <span id="phoneInfo" style="color:#F00; font-size:11px; font-style:italic; font-weight:500;"></span></td>
              </tr>
  
              <tr>
                <td valign="top"><span style="font-size:12px; font-weight:bold; color:#036"><?=_address?>: </span></td>
                <td><textarea name="diachi" style="width: 400px; height: 100px;"><?=$user[0]['diachi']?></textarea></td>
              </tr>
              
              <tr><td></td><td align="left"><p>
              <input type="submit" value="<?=_capnhat?>" class="button">
            </p></td></tr>
            </table>
            
          </form>
			
		</div>
	</div>

</div>
