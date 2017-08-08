<?php

	$email = $_POST['log_email'];
	$_SESSION['email'] = $email;
	$pass = md5($_POST['log_pass']);
	$_SESSION['pass'] = $pass;
	
	$d->reset();
	$sql = "select * from table_thanhvien where email='".$email."'";
	$d->query($sql);
	$row_user = $d-> fetch_array();
	if($d->num_rows()>0 && $row_user['password'] == $pass){
		
		$_SESSION['logging']['id'] = $row_user['id'];
		$_SESSION['logging']['name'] = $row_user['ten'];
		$_SESSION['logging']['email'] = $row_user['email'];
		$_SESSION['logging']['pass'] = $row_user['password'];
		$_SESSION['logging']['dienthoai'] = $row_user['dienthoai']; 	
		$_SESSION['logging']['hienthi'] = $row_user['hienthi'];
		if($_POST['remember'] == 1){
			setcookie('email', $row_user['email'], time()+60*60*24*365);
			setcookie('password', $row_user['password'], time()+60*60*24*365);
		} 	
	}else{
		transfer("Tài khoản hoặc mật khẩu của bạn không đúng, xin vui lòng thử lại!", "http://".$config_url."/".$lang."/index.html");
	}
	if($_SESSION['logging']['hienthi'] == 1) transfer("Bạn đã đăng nhập thành công!", "http://".$config_url."/".$lang."/index.html");
	else transfer("Tài khoản của bạn chưa được kích hoạt!", "http://".$config_url."/".$lang."/index.html");	
	
	
?>