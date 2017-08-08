<?php 
			$d->reset();
			$sql_contact = "select * from #_company ";
			$d->query($sql_contact);
			$company_contact = $d->result_array();

if(!defined('_source')) die("Error");
		$title_bar .= "Quên Mật Khẩu | ";
		if(!empty($_POST)){
			
			
			$d->reset();
			$sql = "select * from #_user where username='".$_POST['user']."' and email='".$_POST['email']."'";
			$d->query($sql);
			if($d->num_rows() == 0) transfer("Thông tin cung cấp của bạn không đúng", "re-password.html");
			
			$user = $d->result_array();
			$password = ChuoiNgauNhien(10);
			$data['password'] = md5($password);
			
			$d->setTable('user');
			$d->setWhere('id',$user[0]['id']);
			
			if($d->update($data)){
			include_once _lib."C_email.php";
			$to['name'] = $user[0]['ten'];
			$to['email'] = $user[0]['email'];
			$from['name'] = 'CÔNG TY SONG ANH';
			$from['email'] = $company_contact[0]['email'];
			$subject = "[Thông Tin Tài Khoản] Your username and password";
			$body = '<table>';
			$body .= '
				<tr>
					<th colspan="2">&nbsp;</th>
				</tr>
				<tr>
					<th>Username :</th><td>'.$user[0]['username'].'</td>
				</tr>
				<tr>
					<th>Password :</th><td>'.$password.'</td>
				</tr>
				';
			$body .= '</table>';
			$e = new C_email;
			
			if($e->MailSend($to, $subject, $body, $from)) transfer("Yêu cầu của bạn đã được gửi. Xin kiểm tra Email", "index.html");
			else transfer("Xin lỗi quý khách.<br>Hệ thống bị lỗi, xin quý khách thử lại.", "re-password.html");
			}
		}
			
	
?>