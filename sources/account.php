<?php  if(!defined('_source')) die("Error");
	
	if(!isset($_SESSION['logging'])){transfer("Bạn chưa đăng nhập vào tài khoản của mình", "http://$config_url/$lang/index.html");}
	
	@$direction =  trim($_GET['direction']);
	
	$d->reset();
	$sql = "select title_$lang,description_$lang,keywords_$lang from #_company";
	$d->query($sql);
	$cccc = $d->fetch_array();
	
	$description = $cccc['description_'.$lang];
	$keywords = $cccc['keywords_'.$lang];
	
	$d->reset();
	$sql_contact = "select * from #_company ";
	$d->query($sql_contact);
	$company_mail = $d->fetch_array();
	
	
	switch($direction){
		case 'history-order':
			$title_bar = _history_order.' - '.$cccc['title_'.$lang];
			$title_abc = '<a href="'.$lang.'/index.html">'._home.'</a> &raquo; <a href="'.$lang.'/account/">'._account.'</a> &raquo; '._history_order;
			
			@$id = addslashes($_GET['id']);
		
			$d->reset();
			if($id){
				$template = 'history_order_detail';
			
				$sql_detail = "select * from #_donhang where id_user=".$_SESSION['logging']['id']." and id='".$id."'";
				$d->query($sql_detail);
				$donhang_detail = $d->fetch_array(); 
				
			}else{
				$template = 'history_order';
				$sql = "select id,madonhang,ngaytao,tonggia,trangthai from #_donhang where id_user=".$_SESSION['logging']['id']." order by ngaytao desc";
				$d->query($sql);
				$donhang = $d->result_array();
				
			}
			
			break;
			
		case 'personal':
			$title_bar = _personal.' - '.$cccc['title_'.$lang];
			$title_abc = '<a href="'.$lang.'/index.html">'._home.'</a> &raquo; <a href="'.$lang.'/account/">'._account.'</a> &raquo; '._personal;
			$template = 'info';
			
			$d->reset();
			$sql_user = "select * from #_thanhvien where id='".$_SESSION['logging']['id']."'";
			$d->query($sql_user);
			$user = $d->result_array();
			
			$id = $user[0]['id'];
			$date = explode('-',$user[0]['ngaysinh']);
			
			if(!empty($_POST)){
		
				$size = 300000;
				$file_size = $_FILES['file']['size'];
				if($file_size>$size){
					transfer("Dung lượng hình ảnh vượt quá mức cho phép", "http://$config_url/$lang/account/personal.html");
				}
				
				$name = $_FILES['file']['name'];
				$name = explode('.',$name);
				$name = changeTitle($name[0]);
				if($photo = upload_image("file", 'jpg|png|gif|JPG|PNG|GIF|jpeg|JPEG', _upload_hinhanh_l,$name."_".time())){
					$data['photo'] = $photo;
					$d->setTable('thanhvien');
					$d->setWhere('id', $id);
					$d->select();
					if($d->num_rows()>0){
						$row = $d->fetch_array();
						delete_file(_upload_hinhanh.$row['photo']);
					}
				}
				$data['ten'] = $_POST['name'];
				
				$data['dienthoai'] = $_POST['phone'];
				$data['sex'] = $_POST['sex'];
				$data['ngaysinh'] = $_POST['dd']."-".$_POST['mm']."-".$_POST['yyyy'];
				$data['diachi'] = $_POST['diachi'];
				
				$d->setTable('thanhvien');
				$d->setWhere('id', $id);
				if($d->update($data))
					transfer("Thông tin của bạn đã được cập nhật", "http://$config_url/$lang/account/personal.html");
				else
					 transfer("Xin lỗi quý khách.<br>Hệ thống bị lỗi, xin quý khách thử lại.", "http://$config_url/$lang/account/personal.html");

					
			}
			
			
			break;
		
		case 'change-password':
			$title_bar = _repass.' - '.$cccc['title_'.$lang];
			$title_abc = '<a href="'.$lang.'/index.html">'._home.'</a> &raquo; <a href="'.$lang.'/account/">'._account.'</a> &raquo; '._repass;
			$template = 're_pass';
			
			if(!empty($_POST)){

				$d->reset();
				$sql = "select * from #_thanhvien where email='".$_SESSION['logging']['email']."'";
				$d->query($sql);
				if($d->num_rows() == 0) transfer("Thông tin cung cấp của bạn không đúng", "http://$config_url/$lang/account/change-password.html");
				$user = $d->fetch_array();
				
				if($user['password'] != md5($_POST['oldpass']))transfer("Mật khẩu cũ không chính xác", "http://$config_url/$lang/account/change-password.html");
				
				if($_POST['pass'] != $_POST['repass'])transfer("Xác nhận mật khẩu không chính xác", "http://$config_url/$lang/account/change-password.html");
				
				$password = $_POST['pass'];
				$data['password'] = md5($password);
				
				$d->setTable('thanhvien');
				$d->setWhere('id',$user['id']);
			
				if($d->update($data)){
				include_once "phpMailer/class.phpmailer.php";	
				$mail = new PHPMailer();
				$mail->IsSMTP(); // Gọi đến class xử lý SMTP
				$mail->Host = 'smtp.gmail.com';
				$mail->Port = 465;
				$mail->SMTPSecure = 'ssl'; // sử dụng giao thức SSL vì gmail bắt buộc dùng cái này
				$mail->SMTPAuth   = true;                  // Sử dụng đăng nhập vào account
				$mail->Username   = "xbook.library@gmail.com"; // SMTP account username
				$mail->Password   = "@la@1ji@oa1"; 

				//Thiet lap thong tin nguoi gui va email nguoi gui
				$mail->SetFrom('xbook.library@gmail.com',$company_mail['title']);

				//Thiết lập thông tin người nhận
				$mail->AddAddress($user['email'],$user['ten']);
				//Thiết lập email nhận email hồi đáp
				//nếu người nhận nhấn nút Reply
				

				/*=====================================
				 * THIET LAP NOI DUNG EMAIL
				*=====================================*/

				//Thiết lập tiêu đề
				$mail->Subject    = '[Update] - SHOP VAC Đổi password!!!';
				$mail->IsHTML(true);
				//Thiết lập định dạng font chữ
				$mail->CharSet = "utf-8";	

				$body = 
				'<table border="0" cellpadding="0" cellspacing="0" style="width:100%;line-height: 2em;font-family:Tahoma, Geneva, sans-serif">
				<tr bgcolor="#0070C0" style="color:#FFF;"><td align="left" valign="bottom" style="padding:30px 10px 10px 10px;"><h2>THÔNG BÁO</h2></td><td align="right" valign="bottom" style="padding:30px 10px 10px 10px;">Email tự động vui lòng không reply</td></tr>
				<tr style="color:#0070C0;"><td colspan="2" style="padding:100px 10px 10px 10px;"><b>SHOP VAC</b> – <b>Shop giày dép.</b><br/><a href="http://vacshop.com" style="color:#0070C0;text-decoration: none;">www.vacshop.vn</a></td></tr>
				<tr><td colspan="2" style="padding:10px;"><p style="border-bottom:1px dashed #000;"></p></td></tr>
				<tr bgcolor="#C6D9F1">
					<td colspan="2" style="padding:10px;">
						<p>Xin chào<br/>'.$user['email'].'</p>
						<p>Cảm ơn bạn đã sử dụng dịch vụ của SHOP VAC – Shop giày dép.</p>
						<p>Thông tin của bạn đăng ký tài khoản trên SHOP VAC  như sau:</p>
					</td>
				</tr>
				<tr bgcolor="#C6D9F1">
					<td colspan="2" style="padding:10px;">
						<table style="width:100%;" border="1" cellpadding="0" cellspacing="0">
							<tr>
								<td align="center" valign="middle" style="width:15%">Email của bạn<br/>(Tên đăng nhập)</td>
								<td align="center" valign="middle">'.$user['email'].'</td>
							</tr>
							<tr>
								<td align="center" valign="middle" style="padding:10px 0px;">Password</td>
								<td align="center" valign="middle">'.$password.'</td>
							</tr>
							<tr>
								<td align="center" valign="middle" style="padding:10px 0px;">Họ tên</td>
								<td align="center" valign="middle">'.$user['ten'].'</td>
							</tr>
							<tr>
								<td align="center" valign="middle" style="padding:10px 0px;">Di động</td>
								<td align="center" valign="middle">'.$user['dienthoai'].'</td>
							</tr>
							<tr>
								<td align="center" valign="middle" style="padding:10px 0px;">Địa chỉ</td>
								<td align="center" valign="middle">'.$user['diachi'].'</td>
							</tr>
							<tr>
								<td align="center" valign="middle" style="padding:10px 0px;">Ngày áp dụng</td>
								<td align="center" valign="middle">'.date('d/m/Y',time()).'</td>
							</tr>
						</table>
					</td>
				</tr>
				
				<tr><td colspan="2" style="padding:10px;"><p style="border-bottom:1px dashed #000;"></p></td></tr>
				<tr>
					<td colspan="2" style="padding:10px;">
					<p><b style="color: #0070C0">SHOP VAC – Shop giày dép:</b></p> 
					<p style="color: #0070C0">E-mail: '.$company_mail['email'].'</p>
					</td>
				</tr>
				<tr bgcolor="#0070C0"><td colspan="2" style="padding:10px;"></td></tr>
			</table>';
					
					$mail->Body = $body;
					if($mail->Send()){
						
						unset($_SESSION['logging']);
						transfer("Thông tin thay đổi mật khẩu đã được gửi tới Email của bạn.<br>Xin vui lòng kiểm tra.", "http://$config_url/$lang/index.html");
					}else
						transfer("Xin lỗi quý khách.<br>Hệ thống bị lỗi, xin quý khách thử lại.", "http://$config_url/$lang/index.html");
				}
				}
			
			break;
			
			default :
				$title_bar = _account.' - '.$cccc['title_'.$lang];
				$title_abc = '<a href="'.$lang.'/index.html">'._home.'</a> &raquo; '._account;
				$template = 'account';
	}
	
	
	
	
	
	
	
	
	
?>