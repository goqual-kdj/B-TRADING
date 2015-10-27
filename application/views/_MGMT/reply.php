<div class="content-wrapper">
    <section class="content-header">
        <h1>
            REPLY
        </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-body table-responsive">
                        <table id="data-table" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>id</th>
                                <th>내용</th>
                                <th>블로그</th>
                                <th>작성일</th>
                                <th>작성자</th>
                                <th>수정하기</th>
                                <th>삭제하기</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($items as $item) {
                                ?>
                                <tr>
                                    <td><?php echo $item->_replyid ?></td>
                                    <td><?php echo $item->content ?></td>
                                    <td>
                                        <a href="<?= site_url('/mgmt/qna_detail?qnaid='.$item->for_qnaid) ?>">
                                            블로그 글 보기
                                        </a>
                                    </td>
                                    <td><?php echo date("Y-m-d", strtotime($item->updated)); ?></td>
                                    <td><?php echo $item->username ?></td>
                                    <td>
                                        <a href="<?= site_url('/mgmt/update_reply?replyid='.$item->_replyid) ?>">
                                            수정
                                        </a>
                                    </td>
                                    <td>
                                        <?php
                                        if ($item->isdeprecated) {
                                            ?>
                                            <a href="<?= site_url('/API/reply/change_isdeprecated?replyid=' . $item->_replyid) . '&isdeprecated=false' ?>"
                                               class="sg-item-survive">
                                                살리기
                                            </a>
                                            <?php
                                        } else {
                                            ?>
                                            <a href="<?= site_url('/API/reply/change_isdeprecated?replyid=' . $item->_replyid) . '&isdeprecated=true' ?>"
                                               class="sg-item-delete" style="color: red">
                                                삭제하기
                                            </a>

                                            <?php
                                        }
                                        ?>
                                    </td>
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