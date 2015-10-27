<input type="hidden" id="qnaid" value="<?php echo $item->_qnaid?>" >
<input type="hidden" id="userid" value="<?php echo $this->session->userdata('userid')?>" >

<section class="bt-qna-section web-item">
    <div class="container">
        <div class="row">
            <div class="title col-xs-12">
                <p>ㅡ</p>
                Q&A
            </div>
        </div>
    </div>
</section>

<section class="bt-qna-detail-section">
    <div class="container">
        <div class="row">
            <div class="title col-xs-12">
                <?php if (isset($item->title)) {
                    echo $item->title;
                }?>
                <div class="sub">
                    <span class="created">
                        <?php echo date ("Y.m.d",strtotime($item->created)) ?>
                    </span>
                    <span class="hit">
                        | 조회수:
                        <?php echo $item->hit; ?>
                    </span>
                    <span class="by">
                        by
                    </span>
                    <span class="username">
                        <?php echo $item->username ?>
                    </span>
                </div>
            </div>
            <div class="content col-xs-12">
                <?php if (isset($item->content)) {
                    echo $item->content;
                }?>
            </div>
        </div>
    </div>
</section>

<section class="bt-reply-section">
    <div class="container">
        <div class="row">
            <div class="title col-xs-12">
                <p>ㅡ</p>
                REPLY
            </div>
        </div>
    </div>
</section>
<?php
if (count($replies) > 0) {
    ?>
    <section class="bt-reply-detail-section">
        <div class="container">
            <div class="row">
                <?php
                foreach($replies as $each) {
                ?>
                    <div class="reply-item col-xs-12">
                        <div class="col-xs-4 info">
                            관리자
                        <span class="date">
                            <?php echo date ("Y.m.d",strtotime($each->created)) ?>
                        </span>
                        </div>
                        <div class="col-xs-8 content">
                            <?php echo $each->content;?>
                        </div>
                    </div>
                <?php
                }
                ?>

            </div>
        </div>
    </section>
<?php
} else {
?>
    <section class="bt-reply-detail-section">
        <div class="container">
            <div class="row">
                등록된 댓글이 없습니다.
            </div>
        </div>
    </section>
<?php
}
?>


<?php
if($this->session->userdata('is_admin')) {
    ?>
    <section class="bt-register-reply-title-section">
        <div class="container">
            <div class="row">
                <div class="title col-xs-12">
                    <p>ㅡ</p>
                    Register reply
                </div>
            </div>
        </div>
    </section>
    <section class="bt-register-reply-section">
        <div class="container">
            <div class="row">
                <form class="form-horizontal col-xs-12" enctype="multipart/form-data" action="<?= site_url('/API/qna/submit') ?>"
                      method="post" id="frm">
                    <input type="hidden" name="userid" id="userid" value="<?php $userid = $this->session->userdata('userid'); if ($userid) {echo $userid;} ?>">
                    <div class="box-body">
                        <div class="form-group">
                            <div class="col-sm-10 col-xs-12 item">
                                <textarea name="content" class="form-control reply-content" placeholder="답변을 작성해주세요.."></textarea>
                            </div>
                            <div class="col-sm-2 col-xs-12 item">
                                <a href="#" id="reply-submit" class="btn btn-primary pul-right">답변달기</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <?php
}
?>

