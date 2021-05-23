<!DOCTYPE html>
<html lang="jp">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="ホーム画面です。">
    <link rel="icon" href="/twitter/Views/img/logo-twitterblue.svg">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/twitter/Views/css/style.css">
    <title>ホーム画面 / twitter</title>
</head>

<body class=home>
    <div class="container">
        <div class="side">
            <div class="side-inner">
                <ul class="nav flex-column">
                    <li class="nav-item"><a href="home.php" class="nav-link"><img src="/twitter/Views/img/logo-twitterblue.svg" class="icon" alt="マーク"></a></li>
                    <li class="nav-item"><a href="home.php" class="nav-link"><img src="/twitter/Views/img/icon-home.svg" alt="家"></a></li>
                    <li class="nav-item"><a href="search.php" class="nav-link"><img src="/twitter/Views/img/icon-search.svg" alt="虫眼鏡"></a></li>
                    <li class="nav-item"><a href="notification.php" class="nav-link"><img src="/twitter/Views/img/icon-notification.svg" alt="ベル"></a></li>
                    <li class="nav-item"><a href="profile.php" class="nav-link"><img src="/twitter/Views/img/icon-profile.svg" alt="個人情報"></a></li>
                    <li class="nav-item"><a href="post.php" class="nav-link"><img src="/twitter/Views/img/icon-post-tweet-twitterblue.svg" class="post-tweet" alt="つぶやき"></a></li>
                    <li class="nav-item myicon"><img src="/twitter/Views/img_uploaded/user/sample-person.jpg" alt="私だ！！"></li>
                </ul>
            </div>
        </div>
        <div class="main">
            <div class="main-header">
                <h1>ホーム</h1>
            </div>
            <div class="tweet-post">
                <div class="my-icon">
                    <img src="/twitter/Views/img_uploaded/user/sample-person.jpg" alt="icon">
                </div>
                <div class="input-area">
                    <form action="post.php" method="post" enctype="multipart/form-data">
                        <textarea name="body" placeholder="いまどうしてる？" maxlemgth="140"></textarea>
                        <div class="bottom-area">
                            <div class="mb-0">
                                <input type="file" name="image" class="form-control form-control-sn">
                            </div>
                            <button class="btn" type="submit">つぶやく</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="ditch"></div>

            <div class="tweet-list">
                <div class="tweet">
                    <div class="user">
                        <a href="profile.php?user_id=1">
                            <img src="/twitter/Views/img_uploaded/user/sample-person.jpg" alt="">
                        </a>
                    </div>
                    <div class="content">
                        <div class="name">
                            <a href="profile.php?user_id=1">
                                <span class="nickname">太郎</span>
                                <span class="user-name">@taro ・23日前</span>
                            </a>
                        </div>
                        <p>今プログラミングをしています。</p>
                        <div class="icon-list">
                            <div class="like">
                                <img src="/twitter/Views/img/icon-heart.svg" alt="💓">
                            </div>
                            <div class="like-count">0</div>
                        </div>
                    </div>
                </div>

                <div class="tweet">
                    <div class="user">
                        <a href="profile.php?user_id=2">
                            <img src="/twitter/Views/img/icon-default-user.svg" alt="no">
                        </a>
                    </div>
                    <div class="content">
                        <div class="name">
                            <a href="profile.php?user_id=1">
                                <span class="nickname">次郎</span>
                                <span class="user-name">@jiro ・24日前</span>
                            </a>
                        </div>
                        <p>コワーキングスペースをオープンしました！</p>
                        <img src="/twitter/Views/img_uploaded/tweet/sample-post.jpg" alt="画像" class="post-image">
                        <div class="icon-list">
                            <div class="like">
                                <img src="/twitter/Views/img/icon-heart-twitterblue.svg" alt="💓">
                            </div>
                            <div class="like-count">1</div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</body>

</html>