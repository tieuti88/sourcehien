<?php
	$d->reset();
	$sql_qctrai="select photo from #_photo where com='left' and hienthi=1";
	$d->query($sql_qctrai);
	$result_qctrai= $d->result_array();
	
	$d->reset();
	$sql_qcphai="select photo from #_photo where com='right' and hienthi=1";
	$d->query($sql_qcphai);
	$result_qcphai = $d->result_array();
?>
    <div id="divAdRight" style="DISPLAY: none; POSITION: absolute; TOP: 0px;z-index:1000">
    <?php for($i=0; $i<count($result_qctrai);$i++) { ?>
    <a href="<?=$result_qctrai[$i]['mota']?>" target="_blank"><img src="<?=_upload_hinhanh_l.$result_qctrai[$i]['photo']?>" width="160" style=""/></a><br/>
	<?php } ?>
    </div>
    
    <div id="divAdLeft" style="DISPLAY: none; POSITION: absolute; TOP: 0px;z-index:1000">
    <?php for($i=0; $i<count($result_qcphai);$i++) { ?>
    <a href="<?=$result_qcphai[$i]['mota']?>" target="_blank"><img src="<?=_upload_hinhanh_l.$result_qcphai[$i]['photo']?>" width="160" style=""/></a><br/>
	<?php } ?>      
    </div>
    <script>
        function FloatTopDiv()
        {
            startLX = ((document.body.clientWidth -MainContentW)/2)-LeftBannerW-LeftAdjust , startLY = TopAdjust+80;
            startRX = ((document.body.clientWidth -MainContentW)/2)+MainContentW+RightAdjust , startRY = TopAdjust+80;
            var d = document;
            function ml(id)
            {
                var el=d.getElementById?d.getElementById(id):d.all?d.all[id]:d.layers[id];
                el.sP=function(x,y){this.style.left=x + 'px';this.style.top=y + 'px';};
                el.x = startRX;
                el.y = startRY;
                return el;
            }
            function m2(id)
            {
                var e2=d.getElementById?d.getElementById(id):d.all?d.all[id]:d.layers[id];
                e2.sP=function(x,y){this.style.left=x + 'px';this.style.top=y + 'px';};
                e2.x = startLX;
                e2.y = startLY;
                return e2;
            }
            window.stayTopLeft=function()
            {
                if (document.documentElement && document.documentElement.scrollTop)
                    var pY =  document.documentElement.scrollTop;
                else if (document.body)
                    var pY =  document.body.scrollTop;
                if (document.body.scrollTop > 30){startLY = 3;startRY = 3;} else {startLY = TopAdjust;startRY = TopAdjust;};
                ftlObj.y += (pY+startRY-ftlObj.y)/16;
                ftlObj.sP(ftlObj.x, ftlObj.y);
                ftlObj2.y += (pY+startLY-ftlObj2.y)/16;
                ftlObj2.sP(ftlObj2.x, ftlObj2.y);
                setTimeout("stayTopLeft()", 10);
            }
            ftlObj = ml("divAdRight");
            //stayTopLeft();
            ftlObj2 = m2("divAdLeft");
            stayTopLeft();
        }
        function ShowAdDiv()
        {
            var objAdDivRight = document.getElementById("divAdRight");
            var objAdDivLeft = document.getElementById("divAdLeft");       
            if (document.body.clientWidth < 1000)
            {
                objAdDivRight.style.display = "none";
                objAdDivLeft.style.display = "none";
            }
            else
            {
                objAdDivRight.style.display = "block";
                objAdDivLeft.style.display = "block";
                FloatTopDiv();
            }
        } 
    </script>
    <script>
    document.write("<script type='text/javascript' language='javascript'>MainContentW = 1000;LeftBannerW = 180;RightBannerW = 140;LeftAdjust = 5;RightAdjust = 5;TopAdjust = 0;ShowAdDiv();window.onresize=ShowAdDiv;;<\/script>");
    </script>
