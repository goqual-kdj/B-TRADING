<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?=site_url('home/index')?>">
                <img src="<?= site_url()?>static/img/logo.png">
            </a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="<?=site_url('home/index')?>">HOME</a></li>
                <li><a href="javascript:void(0)">SERVICES</a></li>
                <li><a href="javascript:void(0)">FEATURE</a></li>
                <li class="dropdown">
                    <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        PRODUCTS<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="javascript:void(0)">Quotation</a></li>
                        <li><a href="javascript:void(0)">Action</a></li>
                        <li><a href="javascript:void(0)">Equity Mng</a></li>
                    </ul>
                </li>
                <li><a href="<?=site_url()?>qna">Q&A Board</a></li>
                <?php
                $is_logined = $this->session->userdata('is_login');

                if ($is_logined) {
                    ?>
                    <li><a href="<?=site_url('auth/logout')?>">LOGOUT</a></li>
                    <?php
                } else {
                    ?>
                    <li><a href="<?=site_url('auth/login')?>">LOGIN</a></li>
                    <li><a href="<?=site_url('auth/join')?>">JOIN</a></li>
                    <?php
                }
                ?>
            </ul>
        </div>
    </div>
</nav>