<div class="tcat">
   <div class="tcat_top"><?=$loaitours[0]['tenloai']?></div>
	<div class="tcat_bg">                	         
              <?php
			   if(count($tintuc)>0){
			   for($i=0,$count_tintuc=count($tintuc);$i<$count_tintuc;$i++){
		   ?>
            <div class="box_new">
            	<div class="image_boder"><a href="?com=tours&id=<?=$tintuc[$i]['id']?>"><img src="<?php if($tintuc[$i]['urlhinh']!=NULL) echo _upload_tours_l.$tintuc[$i]['urlhinh']; else echo 'images/no_image.png';?>" onerror="this.src='images/no_image.png';" width="255" height="190"/></a></div>
               <h1><img src="images/home_intro_node.gif" align="absmiddle" vspace="5" hspace="5" /><a href="?com=tours&id=<?=$tintuc[$i]['id']?>"><?=$tintuc[$i]['tieude']?></a></h1>
               <img src="images/arrowbullet.png" hspace="5" align="absmiddle" /><b>Thời gian: </b><?=$tintuc[$i]['thoigian']?><br/>
               <img src="images/arrowbullet.png" hspace="5" align="absmiddle" /><b>Khởi hành: </b><?=$tintuc[$i]['khoihanh']?><br/>
               <img src="images/arrowbullet.png" hspace="5" align="absmiddle" /><b>Phương tiện: </b><?=$tintuc[$i]['phuongtien']?><br/>   
               <img src="images/arrowbullet.png" hspace="5" align="absmiddle" /><b>Giá tour: </b><?=number_format ($tintuc[$i]['gia'],0,",",".");?> VNĐ<br/>
               <img src="images/arrowbullet.png" hspace="5" align="absmiddle" /><b>Điện thoại: </b><?=$tintuc[$i]['dienthoai']?><br/>        
              <div class="clear"></div>
            </div>
            <?php } }else echo '<p>Nội dung đang cập nhật, bạn vui lòng xem các chuyên mục khác.</p>';  ?>                                     
            <div class="phantrang" ><?=$paging['paging']?></div>
            </div>
    <div class="tcat_bottom"></div>        	
</div>        