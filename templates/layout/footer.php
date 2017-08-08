<?php
	
	
	$d->reset();
	$sql = "select noidung_$lang from #_footer";
	$d-> query($sql);
	$footer = $d->fetch_array();

    $d->reset();
    $sql = "select * from #_product where hienthi=1 order by stt asc, id desc";
    $d-> query($sql);
    $service = $d->result_array();

    $d->reset();
    $sql = "select * from #_news where hienthi=1 order by stt asc, id desc";
    $d-> query($sql);
    $news = $d->result_array();
	
	
?>
<div id="footer" class="container">

    <div class="row">

        <div class="span3">
            <section class="widget">
                <h3 class="title">Giới thiệu chung</h3>
                <div class="textwidget" style="padding:0px 15px;">
                    <p><b><a target="_blank" href="nangcautoanliem.com">Công ty TNHH TM – DV Vận tải Toàn Liêm</a></b> chúng tôi từ khi mới thành lập cho đến nay luôn luôn thực hiện phương châm Lấy sự hài lòng của khách hàng làm mục tiêu phát triển. Chúng tôi hiểu rằng khách hàng vừa là đối tượng phục vụ của mình và cũng là mục tiêu sống còn của doanh nghiệp.Chính vì vậy mà trong mọi hoạt động của chúng tôi khách hàng luôn luôn ở vị trí trung tâm</p>
                </div>
            </section>
        </div>

        <div class="span3">
            <section class="widget">
                <h3 class="title">Dịch vụ</h3>
                <ul>
                <?php for($i=0;$i<count($service);$i++) {?>
                    <li>
                        <i class="icon-star-empty"></i>&nbsp<a href="dich-vu/<?=$service[$i]['tenkhongdau']?>-<?=$service[$i]['id']?>.html" title="<?=$service[$i]['ten_vi']?>"><?=_substr($service[$i]['ten_vi'],40)?></a>
                    </li>
                <?php } ?>
                </ul>
            </section>
        </div>

        <div class="span3">
            <section class="widget">
                <h3 class="title">Tin tức</h3>
                <ul>
                <?php for($i=0;$i<count($news);$i++) {?>
                    <li>
                        <i class="icon-star-empty"></i>&nbsp<a href="news/<?=$news[$i]['tenkhongdau']?>-<?=$news[$i]['id']?>.html" title="<?=$news[$i]['ten_vi']?>"><?=_substr($news[$i]['ten_vi'],40)?></a>
                    </li>
                <?php } ?>
                </ul>
            </section>

        </div>

        <div class="span3">
            <section class="widget"><h3 class="title">Liên hệ</h3>
                <div class="textwidget" style="padding:0px 15px;">
                    <p><i class="icon-home"></i>&nbsp47/7 Đường Đông Hưng Thuận 44, P.Tân Hưng Thuận, Q.12, TP.HCM </p>
                    <p><i class="icon-phone"></i>&nbsp0913641824 - 0906650666</p>
                    <p><i class="icon-envelope"></i>&nbsp <a href="nangcautoanliem@yahoo.com.vn">nangcautoanliem@yahoo.com.vn</a></p>
                </div>
            </section>
        </div>
    </div>

</div>

<!-- Footer Bottom -->
<div id="footer-bottom" class="container">

    <div class="row">
        <div class="span6">
            <p class="copyright">Copyright © 2013. All Rights Reserved.</p>
        </div>
        <div class="span6">
            <p class="designed-by">Toàn Liêm <a target="_blank" href="http://nangcautoanliem.com/">Company</a> - Design by <b>Nguyen Hien</b></p>                        </div>
    </div>

</div>
<!-- End Footer Bottom -->

<script type='text/javascript'>window._sbzq||function(e){e._sbzq=[];var t=e._sbzq;t.push(["_setAccount",21524]);var n=e.location.protocol=="https:"?"https:":"http:";var r=document.createElement("script");r.type="text/javascript";r.async=true;r.src=n+"//static.subiz.com/public/js/loader.js";var i=document.getElementsByTagName("script")[0];i.parentNode.insertBefore(r,i)}(window);</script>