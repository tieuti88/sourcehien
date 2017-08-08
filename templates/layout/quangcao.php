<?php	

	

	$d->reset();

	$sql = "select photo,link from #_lkweb where hienthi=1 order by stt asc,id desc";

	$d->query($sql);

	$quangcao = $d->result_array();

	

?>

<div class="container visible-lg">
    	<div class="row">
        	<div class="list_logo">
            	<div class="kmt_slide">
                        <div class="kmt_bt_hover buttons-hover">
                            <div class="so_pre_hor_picactive" id="so_basic_pre_picactive">
                                <a href="javascript:void(0)"><span></span></a>
                            </div>
                            <div class="so_next_hor_picactive" id="so_basic_next_picactive">
                                <a href="javascript:void(0)"><span></span></a>
                            </div>
                         </div>             
                         <div id="Picactive" style="visibility: visible; overflow: hidden; position: relative; z-index: 2; left: 0px;">
                              <ul style="margin: 0px; padding: 0px; position: relative; list-style-type: none; z-index: 1; width: 6280px; left: -3297px;">
                              <?php for($i=0;$i<count($quangcao);$i++){?>
                              <li style="overflow: hidden; float: left;">
                                    <a href="<?=$quangcao[$i]['link']?>" target="_blank"><img src="<?=_upload_hinhanh_l.$quangcao[$i]['photo']?>" alt="" title="" rel="nofollow"></a>
                              </li>
                              <? } ?>
                              </ul>
                         </div>
                     </div>
            </div>
        </div>
    </div>

