<div class="content-wrapper">
    <section class="content-header">
        <h1>
            QNA
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
                                <th>제목</th>
                                <th>작성자</th>
                                <th>수정일</th>
                                <th>조회수</th>
                                <th>삭제하기</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($items as $item) {
                                ?>
                                <tr>
                                    <td><?php echo $item->_qnaid ?></td>
                                    <td>
                                        <a href="<?= site_url('/mgmt/qna_detail?qnaid=' . $item->_qnaid) ?>">
                                            <?php echo $item->title ?>
                                        </a>
                                    </td>
                                    <td><?php echo $item->username ?></td>
                                    <td><?php echo date("Y-m-d", strtotime($item->updated)); ?></td>
                                    <td><?php echo $item->hit ?></td>
                                    <td>
                                        <?php
                                        if ($item->isdeprecated == 1) {
                                            ?>
                                            <a href="<?= site_url('/API/qna/change_isdeprecated?qnaid=' . $item->_qnaid) . '&isdeprecated=false' ?>"
                                               class="sg-item-survive">
                                                살리기
                                            </a>
                                            <?php
                                        } else {
                                            ?>
                                            <a href="<?= site_url('/API/qna/change_isdeprecated?qnaid=' . $item->_qnaid) . '&isdeprecated=true' ?>"
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