<?php if(!defined('_source')) die("Error");
		
		$d->reset();
		$sql = "select title_$lang,description_$lang,keywords_$lang from #_company";
		$d->query($sql);
		$cccc = $d->fetch_array();
		
		$title_bar = _contact.' - '.$cccc['title_'.$lang];
		$description = $cccc['description_'.$lang];
		$keywords = $cccc['keywords_'.$lang];
		$title_abc = '<a href="'.$lang.'/index.html">'._home.'</a> &raquo; '._contact;
		
		$d->reset();
		$sql = "select * from #_company limit 0,1";
		$d->query($sql);
		$company_mail = $d->fetch_array();
		
		if(!empty($_POST)){
		include_once "phpMailer/class.phpmailer.php";	
		$mail = new PHPMailer();
		$mail->IsSMTP(); // Gọi đến class xử lý SMTP
		$mail->Host       = "116.193.76.24"; // tên SMTP server
		$mail->SMTPAuth   = true;                  // Sử dụng đăng nhập vào account
		$mail->Username   = "contact@fashionshopping.vn"; // SMTP account username
		$mail->Password   = "$1xMoy69";  

		//Thiet lap thong tin nguoi gui va email nguoi gui
		$mail->SetFrom('contact@fashionshopping.vn',$_POST['name']);

		//Thiết lập thông tin người nhận
		$mail->AddAddress($company_mail['email'], $company_mail['title_'.$lang]);
		//Thiết lập email nhận email hồi đáp
		//nếu người nhận nhấn nút Reply
		$mail->AddReplyTo($_POST['email'],$_POST['name']);

		/*=====================================
		 * THIET LAP NOI DUNG EMAIL
 		*=====================================*/

		//Thiết lập tiêu đề
		$mail->Subject    = $_POST['tieude']." - ".$company_mail['title_'.$lang];
		$mail->IsHTML(true);
		//Thiết lập định dạng font chữ
		$mail->CharSet = "utf-8";	

			$body = '<table>';
			$body .= '
				<tr>
					<th colspan="2">&nbsp;</th>
				</tr>
				<tr>
					<th colspan="2">Thư liên hệ từ website <a href="http://'.$company_mail['website'].'">'.$company_mail['website'].'</a></th>
				</tr>
				<tr>
					<th colspan="2">&nbsp;</th>
				</tr>
				<tr>
					<th>Họ tên :</th><td>'.$_POST['name'].'</td>
				</tr>
				<tr>
					<th>Địa chỉ :</th><td>'.$_POST['diachi'].'</td>
				</tr>
				<tr>
					<th>Điện thoại :</th><td>'.$_POST['dienthoai'].'</td>
				</tr>
				<tr>
					<th>Email :</th><td>'.$_POST['email'].'</td>
				</tr>
				
				<tr>
					<th>Tiêu đề :</th><td>'.$_POST['tieude'].'</td>
				</tr>
				<tr>
					<th>Nội dung :</th><td>'.$_POST['noidung'].'</td>
				</tr>';
			$body .= '</table>';
			
			$mail->Body = $body;
			if($mail->Send())
			transfer(_tb4, "lien-he.html");
			else
			 transfer(_tb5, "lien-he.html");
		}
		
		$d->reset();
		$sql_contact = "select noidung_$lang from #_lienhe ";
		$d->query($sql_contact);
		$company_contact = $d->fetch_array();
?>