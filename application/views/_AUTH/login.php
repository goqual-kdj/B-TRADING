<section class="sg-auth-section bg-dark-alfa-50">
    <div class="container sg-auth-container">
        <div class="row">
            <div class="sg-auth-content">
                <div class="sg-auth-title text-center">
                    <a href="<?=site_url('/home/index')?>">
                        B-TRADING
                    </a>
                </div>
                <form class="sg-login-form" action="<?=site_url('/auth/submit_login')?>" method="post" enctype="multipart/form-data">
                    <div class="sg-auth-input-area">
                        <input type="email" id="sg-email" name="email" placeholder="이메일을 입력하세요." required="" autofocus="">
                    </div>
                    <div class="sg-auth-input-area">
                        <input type="password" id="sg-password" name="password" placeholder="비밀번호를 입력하세요." required="">
                    </div>

                    <a href="#" class="sg-auth-btn-login">로그인</a>

                    <div class="sg-auth-line">
                        <p class="sg-auth-message"></p>
                    </div>

                    <a href="#" class="sg-auth-btn-fb-login">페이스북 로그인</a>

                    <div class="sg-auth-line"></div>
                    <div class="sg-auth-other-area">
                        <a href="<?= site_url('/auth/join')?>" class="sg-auth-btn-join">회원가입</a>
                        <a href="<?= site_url('/auth/findpass') ?>" class="sg-auth-btn-find-pass">비밀번호 찾기</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>