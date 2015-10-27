</div>
<div class="bt-footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-offset-1 col-lg-5 col-md-offset-1 col-md-5 col-sm-12 col-xs-12">
                <div class="ft-title col-lg-12 col-md-12 col-sm-6 com-xs-12">
                    <img src="<?= site_url()?>static/img/logo.png">
                </div>
                <div class="ft-content col-lg-12 col-md-12 col-sm-6 com-xs-12">
                    Blockchain based the <br>
                    Security Transaction Platform
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="ft-contact-title">
                    CONTACT US
                </div>
                <form class="form-horizontal contact-fr" enctype="multipart/form-data" action="" method="post" id="frm">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="title" class="col-sm-2 control-label">Name</label>
                            <div class="col-sm-10">
                                <input id="ft-name" type="text" name="name" class="form-control" value="" placeholder="name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="summary" class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-10">
                                <input id="ft-email" type="text" name="email" class="form-control" value="" placeholder="email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="summary" class="col-sm-2 control-label">Content</label>
                            <div class="col-sm-10">
                                <textarea id="ft-content" class="form-control" placeholder="content" name="content"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <a href="#" id="bt-submit" class="btn btn-primary pull-right">send</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="<?php echo base_url() ?>static/lib/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url() ?>static/lib/js/ajaxBody.js"></script>
        <script src="<?php echo base_url() ?>static/lib/js/smoothscroll.js"></script>
        <script src="<?php echo base_url() ?>static/lib/slider/jquery.bxslider.js"></script>
        <script src="<?php echo base_url()?>static/js/common.js"></script>
        <script src="<?php echo base_url()?>static/lib/datatable/jquery.dataTables.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>static/lib/datatable/dataTables.bootstrap.min.js" type="text/javascript"></script>

        <?php
        $total_url = $_SERVER['PHP_SELF'];
        $arr_splitted_url = explode('/', $total_url);

        if ($arr_splitted_url[count($arr_splitted_url) - 1] === "") {
            unset($arr_splitted_url[count($arr_splitted_url) - 1]);
        }

        $ctrl_name = $arr_splitted_url[count($arr_splitted_url) - 2];
        $view_name = $arr_splitted_url[count($arr_splitted_url) - 1];
        $filename = "";

        if ($ctrl_name == 'index.php') {
            $filename = 'static/js/'.strtolower($view_name).'/index.js';
        } else {
            $filename = 'static/js/'.strtolower($ctrl_name).'/'.strtolower($view_name).'.js';
        }

        if(file_exists($filename)) {
        ?>
            <script src="<?php echo base_url()?><?php echo $filename;?>"></script>
        <?php
        }
        if (strpos($filename, 'index.php')) {
            ?>
            <script src="<?php echo base_url() ?>static/js/home/index.js"></script>
            <?php
        }
        if (strpos($filename, 'create') || strpos($filename, 'submit') || strpos($filename, 'update')) {
            ?>
            <script src="<?php echo base_url()?>static/lib/summernote/summernote.js"></script>
            <?php
        }
        ?>

        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script src="/static/lib/bootstrap/js/ie10-viewport-bug-workaround.js">
</body>
</html>