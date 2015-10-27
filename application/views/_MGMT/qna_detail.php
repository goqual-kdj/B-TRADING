<div class="content-wrapper">
    <section class="content-header">
        <h1>
            QNA
        </h1>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="form-horizontal">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="title" class="col-sm-1 control-label">id</label>

                                <div class="col-sm-11 sg-item-content">
                                    <?php echo $item->_qnaid ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="summary" class="col-sm-1 control-label">작성자</label>

                                <div class="col-sm-11 sg-item-content">
                                    <?php echo $item->username; ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="summary" class="col-sm-1 control-label">제목</label>

                                <div class="col-sm-11 sg-item-content">
                                    <?php echo $item->title ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="summary" class="col-sm-1 control-label">내용</label>

                                <div class="col-sm-11 sg-item-content">
                                    <?php echo $item->content ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="summary" class="col-sm-1 control-label">작성일</label>

                                <div class="col-sm-11 sg-item-content">
                                    <?php echo date("Y.m.d", strtotime($item->created));?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="summary" class="col-sm-1 control-label">확인여부</label>

                                <div class="col-sm-11 sg-item-content">
                                    <?php
                                    if ($item->checked != null) echo date("Y.m.d", strtotime($item->checked));
                                    else echo 'x';
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <a class="btn btn-primary pull-right" style="margin-right: 5px;"
                           href="<?= site_url('mgmt/qna') ?>">
                            <i class="fa fa-download"></i>목록보기
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="content-header">
        <h1>
            REPLY
        </h1>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-warning">
                    <div class="form-horizontal">
                        <div class="box-body">
                            <?php
                            foreach ($replies as $reply) {
                            ?>
                                <div class="form-group">
                                    <label for="title" class="col-sm-1 control-label">
                                        <?php echo $reply->username; ?>
                                    </label>

                                    <div class="col-sm-9 sg-item-content">
                                        <?php echo $item->content ?>
                                    </div>
                                    <div class="col-sm-2 sg-item-content">
                                        <?php
                                        if ($reply->isdeprecated == 1) {
                                            ?>
                                            <a href="<?= site_url('/API/reply/change_isdeprecated?replyid=' . $reply->_replyid) . '&isdeprecated=false&rt_url='.$item->_qnaid ?>"
                                               class="sg-item-survive">
                                                살리기
                                            </a>
                                            <?php
                                        } else {
                                            ?>
                                            <a href="<?= site_url('/API/reply/change_isdeprecated?replyid=' . $reply->_replyid) . '&isdeprecated=true&rt_url='.$item->_qnaid ?>"
                                               class="sg-item-delete" style="color: red">
                                                삭제하기
                                            </a>

                                            <?php
                                        }
                                        ?>

                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>