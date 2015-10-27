<section class="bt-qna-section">
    <div class="container">
        <div class="row">
            <div class="title col-xs-12">
                <p>ㅡ</p>
                Q&A Board
            </div>
            <div class="content col-lg-12 col-xs-12">
                <div class="box">
                    <div class="box-body <?php if($is_mobile) echo 'table-responsive'?>">
                        <table id="bt-qna-table" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>번호</th>
                                <th>제목</th>
                                <th>글쓴이</th>
                                <th>날짜</th>
                                <th>조회</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($items as $item) {
                                ?>
                                <tr>
                                    <td><?php echo $item->_qnaid ?></td>
                                    <td><a href="<?= site_url('/qna/detail?qnaid='.$item->_qnaid) ?>">
                                            <?php echo $item->title?>
                                        </a></td>
                                    <td><?php echo $item->username ?></td>
                                    <td><?php echo date("Y-m-d", strtotime($item->updated)); ?></td>
                                    <td><?php echo $item->hit ?></td>
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
        <div class="row no-print">
            <div class="col-xs-12">
                <a href="<?= site_url('/qna/create') ?>" class="btn btn-primary pull-right">글쓰기</a>
            </div>
        </div>
    </div>
</section>

