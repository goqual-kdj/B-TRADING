<div class="content-wrapper">
    <section class="content-header">
        <h1>
            B-TRADING
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12 col-lg-6">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title"><a href="<?=site_url('/mgmt/qna');?>">QNA</a></h3>
                    </div>
                    <div class="box-body table-responsive">
                        <table id="blog-table" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>id</th>
                                <th>제목</th>
                                <th>수정일</th>
                                <th>작성자</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach($qnas as $each) {
                                ?>
                                <tr>
                                    <td><?php echo $each->_qnaid; ?></td>
                                    <td><?php echo $each->title; ?></td>
                                    <td><?php echo date("Y.m.d", strtotime($each->updated)); ?></td>
                                    <td><?php echo $each->username; ?></td>
                                </tr>
                                <?php
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-lg-6">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title"><a href="<?=site_url('/mgmt/reply');?>">REPLY</a></h3>
                    </div>
                    <div class="box-body table-responsive">
                        <table id="gallery-table" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>id</th>
                                <th>내용</th>
                                <th>작성자</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach($replies as $reply) {
                                ?>
                                <tr>
                                    <td><?php echo $reply->_replyid; ?></td>
                                    <td><?php echo $reply->content; ?></td>
                                    <td><?php echo $reply->username; ?></td>
                                </tr>
                                <?php
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>