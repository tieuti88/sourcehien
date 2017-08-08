<script type="text/javascript">
    $(document).ready(function(){
    $("#kmt_vote_bt").click(function(){
    var selected =
    $("input[type='radio'][name='inlineRadioOptions']:checked");
    if (selected.length == "") {
    $("#messageError").modal();
    //alert('Bạn vui lòng nhập đánh giá của mình .');
    return false;
    }
    return true;
    })
    })
</script>

<?php
    $d->reset();
    $sql = "select * from #_news where hienthi=1 order by stt asc, id desc";
    $d->query($sql);
    $news_left = $d->result_array();
?>


<div class="col-md-3 col-sm-12 wrap_left">
    <!-- Begin block_addon -->
    <div class="block_addon">
        <h1 class="kmt_title_left">
            TIỆN ÍCH CHO BẠN
        </h1>
        <div class="row">
            <div class="col-sm-12">
                <div class="img_addon">
                    <a href="#">
                        <img src="http://<?=$config_url?>/images/ao_1.png" alt="Bảng giá"
                            title="Bảng giá" rel="nofollow" width="35px" height="35px">
                    </a>
                </div>
                <div class="title_addon">
                    <a href="#"
                        title="Bảng giá">Bảng giá</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="img_addon">
                    <a href="#">
                        <img src="http://<?=$config_url?>/images/ao_2.png" alt="Tính cước taxi tải"
                            title="Tính cước taxi tải" rel="nofollow" width="35px" height="35px">
                    </a>
                </div>
                <div class="title_addon">
                    <a href="#" title="Tính cước taxi tải">Tính
                        cước taxi tải</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="img_addon">
                    <a href="#">
                        <img src="http://<?=$config_url?>/images/ao_3.png" alt="Tính phí vận chuyển"
                            title="Tính phí vận chuyển" rel="nofollow" width="35px" height="35px">
                    </a>
                </div>
                <div class="title_addon">
                    <a href="#" title="Tính phí vận chuyển">Tính
                        phí vận chuyển</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="img_addon">
                    <a href="#">
                        <img src="http://<?=$config_url?>/images/ao_4.png" alt="Tra cứu hành trình"
                            title="Tra cứu hành trình" rel="nofollow" width="35px" height="35px">
                    </a>
                </div>
                <div class="title_addon">
                    <a href="#" title="Tra cứu hành trình">Tra
                        cứu hành trình</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="img_addon">
                    <a
                        href="#">
                        <img src="http://<?=$config_url?>/images/ao_5.png" alt="QUY TRÌNH THỰC HIỆN"
                            title="QUY TRÌNH THỰC HIỆN" rel="nofollow" width="35px" height="35px">
                    </a>
                </div>
                <div class="title_addon">
                    <a
                        href="#"
                        title="QUY TRÌNH THỰC HIỆN">QUY TRÌNH THỰC HIỆN</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="img_addon">
                    <a href="#">
                        <img src="http://<?=$config_url?>/images/ao_6.png" alt="Câu hỏi thường gặp"
                            title="Câu hỏi thường gặp" rel="nofollow" width="35px" height="35px">
                    </a>
                </div>
                <div class="title_addon">
                    <a href="#" title="Câu hỏi thường gặp">Câu hỏi thường gặp</a>
                </div>
            </div>
        </div>

    </div>
    <!-- End block_addon -->

    <!-- Begin block_vote -->
    <div class="block_vote hidden-xs">
        <h1 class="kmt_title_left">
            Ý KIẾN KHÁCH HÀNG
        </h1>

        <div class="question_vote">
            Đánh giá của bạn về dịch vụ của
            <b style="color: #c81f25;font-weight: bold">TOÀN LIÊM Company</b>
            .
        </div>
        <div class="answer_vote">
            <form action="" method="post">
                <label class="radio-inline">
                    <input type="radio" name="inlineRadioOptions" id="inlineRadio1"
                        value="1">
                        Tốt

                </label>
                <label class="radio-inline">

                    <input type="radio" name="inlineRadioOptions" id="inlineRadio2"
                        value="2">
                        Khá
                </label>
                <label class="radio-inline">

                    <input type="radio" name="inlineRadioOptions" id="inlineRadio3"
                        value="3">
                        Trung bình
                </label>
                <br>
                    <br>
                        <button type="button" id="kmt_vote_bt" class="btn btn-danger"
                            data-toggle="modal" data-target="#myModal">Gửi</button>
            </form>
        </div>
    </div>
    <!-- End block_vote -->

    <!-- Modal Message Error -->
    <div class="modal fade" id="messageError" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content -->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;
                    </button>
                    <h4 class="modal-title">Thông báo</h4>
                </div>
                <div class="modal-body text-danger">
                    <p>
                        <h4>Vui lòng chọn đánh giá của bạn .</h4>
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog"
        aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">×</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Thông tin của bạn</h4>
                </div>
                <form action="http://taxitaigiare.vn/articles/vote" method="post">
                    <input type="hidden" value="" id="rs_v" name="rs_v">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="kmt_name" class="control-label">
                                    Họ tên
                                    <span>*</span>
                                </label>
                                <div>
                                    <input type="text" name="name" required="required" class="form-control"
                                        id="kmt_name" placeholder="Họ tên">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="kmt_email" class="control-label">
                                    Email
                                    <span>*</span>
                                </label>
                                <div>
                                    <input type="email" name="email" required="required"
                                        class="form-control" id="kmt_email" placeholder="Email">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default"
                                data-dismiss="modal">Hủy bỏ</button>
                            <button type="submit" class="btn btn-danger">Hoàn tất</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal -->

    <!-- Begin block_services -->
    <div class="block_services bg_contact">
        <h1 class="kmt_title_left">DỊCH VỤ KHÁCH HÀNG</h1>

        <div class="row">
            <div class="col-md-12">

                <div class="img_block_services">
                    <img src="http://<?=$config_url?>/images/ser_1.png" alt="Tổng đài"
                        title="Tổng đài" rel="nofollow" width="35px" height="35px">
                </div>
                <div class="title_block_services">
                    <p>Tổng đài:</p>
                    <p>
                    </p>
                    <p>
                        <span>0913 641 824</span>
                    </p>
                    <p>
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">

                <div class="img_block_services">
                    <img src="http://<?=$config_url?>/images/ser_2.png" alt="Vận chuyển hàng hóa"
                        title="Vận chuyển hàng hóa" rel="nofollow" width="35px" height="35px">
                </div>
                <div class="title_block_services">
                    <p>Di động</p>
                    <p>
                    </p>
                    <p>
                        <span>0906 650 666</span>
                    </p>
                    <p>
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">


            </div>
        </div>

    </div>
    <!-- End block_services -->

    <!-- Begin block_support -->
    <div class="block_support">
        <h1 class="kmt_title_left">
            HỖ TRỢ TRỰC TUYẾN
        </h1>
        <div class="info_support">
            <p>
                website:
                <a href="http://<?=$config_url?>"> nangcautoanliem.com</a>
            </p>
            <p>Email: nangcautoanliem@yahoo.com
           vantaitoanliem@gmail.com</p>
            <p>
                <a href="ymsgr:sendIM?hoanganh10081991">
                    <img src="http://<?=$config_url?>/images/yh.png" alt="Yahoo"
                        title="Yahoo" rel="nofollow">
                </a>&nbsp&nbsp
                <a href="skype:meomobi123?chat">
                    <img src="http://<?=$config_url?>/images/sk.png" alt="Skype"
                        title="Skype" rel="nofollow">
                </a>
            </p>
        </div>

    </div>
    <!-- End block_support -->

    <!-- Begin block_support -->
    <? if($source !='index') {?>
    <div class="block_support">
        <h1 class="kmt_title_left">
            TIN TỨC NỔI BẬT
        </h1>
        <div class="info_support">
            <ul style="margin-left: -25px">
                <? for($i=0;$i<count($news_left);$i++) {?>
                <li style="list-style: none"><i class="fa fa-star-o"></i>
                <a href="http://<?=$config_url?>/news/<?=$news_left[$i]['tenkhongdau']?>-<?=$news_left[$i]['id']?>.html">
                    <?=$news_left[$i]['ten_vi']?></a>
                </li>
                <? } ?>
            </ul>
        </div>

    </div>
    <?}?>
    <!-- End block_support -->

</div>