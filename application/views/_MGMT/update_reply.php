<div class="content-wrapper">
    <section class="content-header">
        <h1>
            REPLY
            <small></small>
        </h1>
    </section>


    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <form class="form-horizontal" enctype="multipart/form-data"
                          action="<?= site_url('/mgmt/submit_update_reply') ?>" method="post" id="frm">
                        <input type="hidden" name="replyid" id="replyid" value="<?php echo $data->_replyid; ?>">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="title" class="col-sm-1 control-label">댓글</label>

                                <div class="col-sm-11">
                                    <textarea class="form-control" name="content" placeholder="댓글내용.."><?php if (isset($data->content)) echo $data->content ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <button type="submit" id="ng-submit" class="btn btn-primary pull-right">수정하기</button>
                            <a href="<?= site_url('/mgmt/reply') ?>" class="btn btn-default pull-right" style="margin-right: 10px;">뒤로가기</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
