<title>Không tìm thấy trang này</title>
</head>
<body>
    <?=showHeaderNavigation()?>
    <main>
        <style>
            .wrapper-404 {
                display: flex;
                flex-direction: column;
                align-items: center;
                margin: 10px 0px;
            }
            .not-found-title {
                color: #ad7b67;
                text-align: center;
                margin: 0px;
                font-size: 2rem;
            }
            .wrapper-404 img {
                width: 50%;
            }
            .btn-back-to-post {
                font-size: 1.3rem;
                text-transform: uppercase;
                margin-top: 10px;
                display: block;
                padding: 10px 20px;
            }
        </style>
        <div class="container">
            <div class="wrapper-404">
                <img src="./uploads/base/404.png" alt="Không tìm thấy trang này">
                <h3 class = "not-found-title">Không tìm thấy trang này</h3>
                <a href="./post.html" class="btn btn-back-to-post">Quay về trang bài viết</a>
            </div>
        </div>
    </main>
     <!-- footer -->
    <?php
        footer();
    ?>
    <script src="./public/assets/js/app.js"></script>
</body>
</html>