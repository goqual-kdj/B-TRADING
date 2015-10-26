<section class="sg-auth-section bg-dark-alfa-50">
    <div class="container sg-auth-container">
        <div class="row">
            <div class="sg-auth-content">
                <div class="sg-auth-title text-center">
                    <a href="<?=site_url('home/index')?>">
                        B-TRADING
                    </a>
                </div>
                <form class="sg-signup-form" action="<?=site_url('/auth/submit_signup')?>" method="post" enctype="multipart/form-data">
                    <div class="sg-auth-input-area">
                        <input type="email" id="sg-email" name="email" placeholder="이메일을 입력하세요." required="" autofocus="">
                    </div>
                    <div class="sg-auth-input-area">
                        <input type="password" id="sg-password" name="password" placeholder="비밀번호를 입력하세요." required="">
                    </div>
                    <div class="sg-auth-input-area">
                        <input type="password" id="sg-confirm-password" name="confirm_password" placeholder="비밀번호를 다시 한번 입력하세요." required="">
                    </div>

                    <a href="#" class="sg-auth-btn-signup">회원가입</a>

                    <div class="sg-auth-line">
                        <p class="sg-auth-message"></p>
                    </div>

                    <div class="sg-auth-other-area">
                        <a href="<?=site_url('/auth/login')?>" class="sg-auth-btn-find-pass">로그인</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>