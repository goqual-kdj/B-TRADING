<section class="bt-qna-section">
    <div class="container">
        <div class="row">
            <div class="title col-xs-12">
                <p>ㅡ</p>
                Q&A Board
            </div>
            <div class="content col-lg-12 col-xs-12">
                <form class="form-horizontal" enctype="multipart/form-data" action="<?= site_url('/API/qna/submit') ?>"
                      method="post" id="frm">
                    <input type="hidden" name="userid" id="userid" value="<?php $userid = $this->session->userdata('userid'); if ($userid) {echo $userid;} ?>">
                    <input type="hidden" name="dir_name" id="sg-create-date"
                           value="<?php echo date("Y-m-d") . '_' . date("h:i:sa"); ?>"/>

                    <div class="box-body">
                        <div class="form-group">
                            <label for="title" class="col-sm-1 control-label">제목</label>

                            <div class="col-sm-11">
                                <input type="text" name="title" class="form-control"
                                       value="<?php if (isset($data->title)) echo $data->title ?>"
                                       id="title" placeholder="title">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="summary" class="col-sm-1 control-label">내용</label>

                            <div class="col-sm-11">
                                    <textarea name="content" id="summernote">
                                        <?php if (isset($data->content)) echo $data->content ?>
                                    </textarea>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <a href="#" id="ng-submit" class="btn btn-primary pull-right">글쓰기</a>
                        <a href="<?= site_url('/qna/index') ?>" class="btn btn-default pull-right" style="margin-right: 10px;">뒤로가기</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

