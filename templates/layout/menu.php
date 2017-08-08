<div class="container-fluid bg_mnt">
        <div class="navbar navbar-default navbar-fixed-top" role="navigation">
            
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    
                </div>
                
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="<?php if($_GET['com'] == 'index' || $_GET['com'] == ''){echo "active";}?>"><a href="">TRANG CHỦ</a></li>
                        <li class="<?php if($_GET['com'] == 'about'){echo "active";}?> ">
                            <a href="http://<?=$config_url?>/about.html">GIỚI THIỆU</a>
                        </li>
                        <li class="<?php if($_GET['com'] == 'dich-vu'){echo "active";}?> ">
                            <a href="http://<?=$config_url?>/dich-vu.html">DỊCH VỤ</a>
                        </li>
                        <li class="<?php if($_GET['com'] == 'doi-tac'){echo "active";}?> "><a href="http://<?=$config_url?>/doi-tac.html">ĐỐI TÁC</a></li>
                        <li class="<?php if($_GET['com'] == 'news'){echo "active";}?> ">
                            <a href="http://<?=$config_url?>/news.html">TIN TỨC</a>
                        </li>
                        <li class="<?php if($_GET['com'] == 'thu-vien-anh'){echo "active";}?> "><a href="http://<?=$config_url?>/thu-vien-anh.html">HÌNH ẢNH</a></li>
                        <li class="<?php if($_GET['com'] == 'tuyen-dung'){echo "active";}?> ">
                            <a href="http://<?=$config_url?>/tuyen-dung.html">TUYỂN DỤNG</a>
                        </li>
                        <li class="<?php if($_GET['com'] == 'contact'){echo "active";}?> "><a href="http://<?=$config_url?>/contact.html">LIÊN HỆ</a></li>
                    </ul>
                </div><!--/.nav-collapse -->
                
            </div>
            
        </div>

	</div>