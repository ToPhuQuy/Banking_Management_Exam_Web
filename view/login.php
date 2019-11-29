<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đăng nhập</title>
    <link rel="shortcut icon" href="favicon.png">
    <?php 
        require(view_url('main/css'));
        require(view_url('main/js'));
    ?>
</head>

<body>
    <?php 
        require(view_url('main/navbar')); 
    ?>

    <div class="area container-fluid text-light" id="area">
        <ul class="circles" id="circle-area">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
        <div class="row" style="height:15%" id="row-1">
        </div>
        <div class="row align-item-center" id="row-2">
            <div class="col-md-0 col-lg-1"></div>
            <div class="col-md-6 col-lg-5 text-center text-md-left" id="left-panel">
                <h1 class="display-3 text-center text-md-left">Đăng nhập</h1>
                <form method="post" id="loginform">
                    <div class="form-row form-group justify-content-center justify-content-md-start">
                        <label for="uname" class="text-md-left">Email</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">@</div>
                            </div>
                            <input class="form-control form-control-lg" type="text"
                                placeholder="Email" v-model="email" v-on:keyup="enter" ref="email">
                        </div>
                    </div>
                    <div class="form-row form-group justify-content-center justify-content-md-start">
                        <label for="password" v-model="password">Mật khẩu</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fa fa-lock"></i></div>
                            </div>
                            <input class="form-control form-control-lg" id="password" name="password" type="password"
                                placeholder="Password" v-model="password" ref="password" v-on:keyup="submit">
                        </div>
                    </div>
                    <div class="form-row form-group justify-content-center justify-content-md-start">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input text-white" id="customCheck1" v-model="keeplogin">
                            <label class="custom-control-label" for="customCheck1" v-model="keeplogin">Giữ tôi luôn đăng nhập</label>
                        </div><br>
                        
                    </div>
                    <div class="form-row form-group justify-content-center justify-content-md-start" v-if="err">
                        <div class="form-message">{{ errMsg }}</div>
                    </div>
                    <div class="form-row form-group justify-content-center justify-content-md-start">

                        <button type="button" class="btn btn-outline-light btn-lg mt-3"  v-on:click="handler"><i class="fa fa-sign-in"
                                aria-hidden="true"></i> Đăng nhập</button>

                    </div>
                </form>
                <a href="#" class="text-light text-lg">Quên mật khẩu?</a>
                <a href="/register" class="text-light text-lg">Chưa có tài khoản?</a>
            </div>
            <div class="col-md-5 d-none d-md-flex justify-content-end align-items-center">
                <svg class="d-flex" style="flex-basis: 80%;" viewBox="0 0 48 48">
                    <path fill="#78909c"
                        d="M19 39c-.5 0-1-.1-1-1.1V34c0-.6-.4-1-1-1s-1 .4-1 1v3.9c0 1.9 1.2 3.1 3 3.1V39zM14 39c-.5 0-1-.1-1-1.1V34c0-.6-.4-1-1-1s-1 .4-1 1v3.9c0 1.9 1.2 3.1 3 3.1V39z" />
                    <path fill="#546e7a" d="M16 32H18V34H16zM11 32H13V34H11z" />
                    <path fill="#78909c"
                        d="M33 39c-.5 0-1-.1-1-1.1V34c0-.6-.4-1-1-1s-1 .4-1 1v3.9c0 1.9 1.2 3.1 3 3.1V39zM28 39c-.5 0-1-.1-1-1.1V34c0-.6-.4-1-1-1s-1 .4-1 1v3.9c0 1.9 1.2 3.1 3 3.1V39z" />
                    <path fill="#546e7a" d="M30 32H32V34H30zM25 32H27V34H25z" />
                    <path fill="#84ffff" d="M45 18L31 7 28.456 14.556z" />
                    <path fill="#00e5ff" d="M31 7L6 14 4 20 28.456 14.556z" />
                    <path fill="#00b0ff" d="M45 18L28.456 14.556 29.931 25.456z" />
                    <path fill="#0091ea" d="M4 20L28.456 14.556 29.931 25.456 5 27z" />
                    <path fill="#1976d2" d="M45 18L29.931 25.456 35 32z" />
                    <path fill="#0d47a1" d="M5 27L29.931 25.456 35 32 9 32z" /></svg>
            </div>
        </div>
    </div>

    <?php
        require(view_url('main/footer'));
    ?>

    <script>
        var vue = new Vue({
            el: '#loginform',
            data: {
                email: '',
                password: '',
                keeplogin: false,
                err: false,
                errMsg: 'Thông tin đăng nhập không hợp lệ!'
            },
            methods: {
                enter: function(e) {
                    if (e.keyCode === 13) {
                        this.$refs.password.focus();
                    }
                },
                submit: function (e) {
                    if (e.keyCode === 13) {
                        this.handler();
                    }
                },
                handler: function() {
                    var vueObj = this;
                    $.ajax({
                        url: '/login',
                        method: 'post',
                        dataType: 'json',
                        data: {
                            email: this.email,
                            password: this.password,
                            keepactive: this.keeploging
                        }
                    }).done(function (result) {
                        if (result) {
                            vueObj.err = false;
                            window.location.replace("/");
                        } else {
                            vueObj.err = true;
                        }
                    }).catch(function (error) {
                        console.log(error);
                    });
                }
            }
        });
    </script>
</body>

</html>