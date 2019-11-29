<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đăng ký</title>
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
            <div class="col-md-1"></div>

            <div class="col-md-5 d-none d-md-flex justify-content-start align-items-center">
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
            <div class="col-lg-5 col-md-6 text-center text-md-left" id="left-panel">
                <div class="row">
                    <div class="col">
                        <h1 class="display-3 text-center text-md-left">Đăng ký</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <form id="registerform" action="" method="post">
                            <div class="form-row form-group justify-content-center justify-content-md-start">
                                <label for="uname" class="text-md-left">Email</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">@</div>
                                    </div>
                                    <input class="form-control form-control-lg" id="email" name="email" type="email"
                                        placeholder="Email" v-model="email" v-on:keyup="nextField" ref="email">
                                </div>
                                <div v-if="emailError" class="form-message">
                                    {{ emailMessage }}
                                </div>
                            </div>
                            <div class="form-row form-group justify-content-center justify-content-md-start">
                                    <label for="password">Mật khẩu</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-lock"></i></div>
                                        </div>
                                        <input class="form-control form-control-lg" id="password" name="password" type="password"
                                            placeholder="Password" v-model="pass" ref="pass" v-on:keyup="nextField2">
                                    </div>
                                <div v-if="passError" class="form-message">
                                    {{ passMessage }}
                                </div>
                            </div>
                            <div class="form-row form-group justify-content-center justify-content-md-start">
                                    <label for="r-password">Nhập lại mật khẩu</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-lock"></i></div>
                                        </div>
                                        <input class="form-control form-control-lg" id="r-password" name="r-password" type="password"
                                            placeholder="Password" v-model="repass" ref="repass" v-on:keyup="doSubmit">
                                    </div>
                                <div v-if="repassError" class="form-message">
                                    Nhập lại không khớp
                                </div>
                            </div>
                            <div class="form-row form-group justify-content-center justify-content-md-start">

                                <button type="button" class="btn btn-outline-light btn-lg mt-3" v-on:click="submit"><i class="fa fa-user"></i> Đăng ký</button>

                            </div>
                        </form>

                        <a href="/login" class="text-light text-lg">Đã có tài khoản?</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <?php
        require(view_url('main/footer'));
    ?>
    <script>
        function validateEmail(email) {
            var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return re.test(String(email).toLowerCase());
        }

        function validatePassword(pass) {
            return pass.length >= 8;
        }

        var vue = new Vue({
            el: '#registerform',
            data: {
                email: '',
                pass: '',
                repass: '',
                emailError: false,
                passError: false,
                repassError: false,
                emailMessage: 'Email bạn nhập không hợp lệ',
                passMessage: 'Mật khẩu phải chứa ít nhất 8 ký tự'
            },
            methods: {
                nextField: function (e) {
                    if (e.keyCode === 13) {
                        this.$refs.pass.focus();
                    }
                },
                nextField2: function (e) {
                    if (e.keyCode === 13) {
                        this.$refs.repass.focus();
                    }
                },
                doSubmit: function (e) {
                    if (e.keyCode === 13) {
                        this.submit();
                    }
                },
                submit: function () {
                    var vueInstance = this;

                    if (!validateEmail(this.email) 
                        || !validatePassword(this.pass)
                        || this.pass != this.repass) {
                            this.emailError = !validateEmail(this.email);
                            this.emailMessage = 'Email bạn nhập không hợp lệ';
                            this.passError = !validatePassword(this.pass);
                            this.repassError = (this.pass !== this.repass);
                            return;
                        }
                    $.ajax({
                        url: '/register',
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            email: this.email,
                            pass: this.pass,
                            rePass: this.repass
                        }
                    }).done(function (result) {
                        if (!result.error) {
                            window.location.replace("/login");
                        } else {
                            switch (result.errorField) {
                                case 'email':
                                    vueInstance.emailMessage = result.message;
                                    vueInstance.emailError = true;
                                    break;
                                case 'pass':
                                    vueInstance.passMessage = result.message;
                                    vueInstance.passError = true;
                                    break;
                                case 'repass':
                                    vueInstance.repassError = true;
                                    break;
                            }
                        }
                    }).catch(function (err) {
                        console.log(err);
                    });
                }
            },
            watch: {
                email: function (newValue) {
                    this.emailError = !validateEmail(newValue);
                    this.emailMessage = 'Email bạn nhập không hợp lệ';
                },
                pass: function (newValue) {
                    this.passError = !validatePassword(newValue);
                },
                repass: function (newValue) {
                    this.repassError = (newValue !== this.pass);
                }
            },
            mounted: function() {
                this.$refs.email.focus();
            }
        });
    </script>
</body>

</html>