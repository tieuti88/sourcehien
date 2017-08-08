<?php



    $d->reset();

    $sql= "select * from #_product where hienthi = 1 order by stt asc, id desc";

    $d->query($sql);

    $service = $d->result_array();

    

?>



<div class="container-fluid wrap_bg_logo">
        
        <div class="container wrap_logo_name">
            <div class="row">
                <div class="col-md-3 col-sm-12 wrap_logo">
                    <a href="http://<?=$config_url?>/"><img src="http://<?=$config_url?>/images/logo.png" width="125px" height="120px" alt="Nâng cẩu Toàn Liêm" title="Nâng cẩu Toàn Liêm" rel="nofollow"></a>
                </div>
                <div class="col-md-9 col-sm-12 wrap_name">
                                        <h1>
                        CÔNG TY TNHH TM-DV VẬN TẢI
                        <span>TOÀN LIÊM</span>
                    </h1>
                                        <h2>
                                                
                        <span>HOTLINE:</span>  0913.641.824 – 0906.650.666</h2>
                </div>
            </div>
        </div>
        
        
        
    </div>