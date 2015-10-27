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
                                <th>닉네임</th>
                                <th>메일</th>
                                <th>로그인</th>
                                <th>관리자</th>
                                <th>삭제하기</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($items as $item) {
                                ?>
                                <tr>
                                    <td><?php echo $item->_userid ?></td>
                                    <td>
                                        <?php echo $item->username ?>
                                    </td>
                                    <td><?php echo $item->email?></td>
                                    <td><?php if ($item->logined != null) echo date("Y-m-d", strtotime($item->logined)); ?></td>
                                    <td>
                                        <?php
                                        if ($item->is_admin == 1) {
                                            ?>
                                            <a href="<?= site_url('/API/user/change_admin?userid=' . $item->_userid) . '&is_admin=false' ?>"
                                               class="sg-item-survive" style="color: red;">
                                                관리자 박탈
                                            </a>
                                            <?php
                                        } else {
                                            ?>
                                            <a href="<?= site_url('/API/user/change_admin?userid=' . $item->_userid) . '&is_admin=true' ?>"
                                               class="sg-item-delete">
                                                관리자 선정
                                            </a>

                                            <?php
                                        }
                                        ?>

                                    </td>
                                    <td>
                                        <?php
                                        if ($item->isdeprecated) {
                                            ?>
                                            <a href="<?= site_url('/API/user/change_isdeprecated?userid=' . $item->_userid) . '&isdeprecated=false' ?>"
                                               class="sg-item-survive">
                                                살리기
                                            </a>
                                            <?php
                                        } else {
                                            ?>
                                            <a href="<?= site_url('/API/user/change_isdeprecated?userid=' . $item->_userid) . '&isdeprecated=true' ?>"
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