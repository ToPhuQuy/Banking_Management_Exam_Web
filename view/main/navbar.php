<!-- NAVIGATION BAR -->
<nav id="navbar" class="navbar navbar-expand-md navbar-dark fixed-top">
    <a class="navbar-brand" href="/"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="37"
            height="37">
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
            <path fill="#0d47a1" d="M5 27L29.931 25.456 35 32 9 32z" /></svg>Karma</a>
    <button class="navbar-toggler rounded-0 b-0" id="nav-toggle-button" type="button" data-toggle="collapse"
        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
        aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item" id="home-navbar-link">
                <a class="nav-link text-light" href="/">Trang chủ <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item" id="question-navbar-link">
                <a class="nav-link text-light" href="./question.html">Câu hỏi</a>
            </li>
            <li class="nav-item" id="test-navbar-link">
                <a class="nav-link text-light" href="./exam-list.html">Đề thi</a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link text-light" href="#"><i class="fa fa-search"></i> Tìm kiếm</a>
            </li>
            <?php
                use Utils\Auth;
                if (Auth::getUser())
                {
                    require(view_url('main/profile'));
                }
                else
                {
                    require(view_url('main/login-register-nav'));
                }
            ?>
        </ul>
    </div>
</nav>

<script defer>
    $('#<?php echo $page_name ?>-navbar-link').addClass('active');
</script>