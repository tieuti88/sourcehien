<div id="main-content">
    <div style="float:left; width: 100%; background: #FFF">
    <script type="text/javascript">
	
		function checkLogin(){
			if(document.frm_login.log_email.value==''){
				return false;	
			}
			if(document.frm_login.log_pass.value==''){
				return false;	
			}
			document.frm_login.submit();
		}
	
    </script>
    <h2 style="background: #0093D0; color: #FFF; padding: 10px;"><?=_login?></h2>
    <form method="post" action="<?=$lang?>/login.html" id="frm_login" name="frm_login">
	<table width="50%" cellpadding="10" cellspacing="10" style="margin: 20px auto;">
        <tr>
        	<td style="color: #555">Email</td>
            <td><input type="text" name="log_email" id="log_email" style="width: 250px;"></td>
        </tr>
        <tr>
        	<td style="color: #555">Password</td>
            <td><input type="password" name="log_pass" id="log_pass" style="width: 250px;"></td>
        </tr>
        <tr>
        	<td></td>
            <td><input type="button" name="login" id="login" value="<?=_login?>" class="button" onclick="checkLogin()"/></td>
        </tr>
    </table>
    </form>
    </div>
</div><!---end #main-content-->
