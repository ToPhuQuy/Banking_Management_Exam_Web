<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Karma</title>
    <link rel="shortcut icon" href="/favicon.png">
    <?php
        require(view_url('main/css'));
        require(view_url('main/js'));
    ?>
</head>

<body>
    <?php
        require(view_url('main/navbar'));
    ?>

    <!-- MAIN AREA -->
    <div class="area container-fluid text-light" id="area">

        <!-- ANIMATION EFFECT -->
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


        <div class="row" id="row-1" style="height:15%;">
        </div>

        <!-- CONTENTS -->
        <div class="row align-item-center" id="row-2">
            <div class="col-md-1"></div>
            <div class="col-md-5 text-center text-md-left" id="left-panel">
                <h1 class="display-3 text-center text-md-left">Karma</h1>
                <p class="lead text-center text-md-left">
                    Website hỗ trợ quản lý ngân hàng đề thi trắc nghiệm khách quan. Hỗ trợ các tác vụ thêm xóa, chỉnh
                    sửa ngân hàng câu hỏi, hỗ trợ tạo lập đề thi.
                </p>
                <p class="lead d-none d-sm-flex text-center text-md-left">
                    Website được xây dựng dựa trên Bootstrap CSS Framework, giao diện trực quan, dễ sử dụng trên nhiều
                    loại thiết bị. Hoàn toàn miễn phí.
                </p>
                <a href="/register" class="btn btn-outline-light btn-lg mt-3">Đăng ký</a>
                <a href="/login" class="btn btn-outline-light btn-lg mt-3">Đăng nhập</a>
            </div>
            <div class="col-md-5 d-none d-md-flex justify-content-end align-items-center">
                <svg class="d-flex bounceIn" style="flex-basis: 80%;" viewBox="0 0 48 48">
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

    <!-- FOOTER -->
    <?php
        require(view_url('main/footer'));
    ?>
</body>

</html>