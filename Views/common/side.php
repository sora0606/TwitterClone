<div class="side">
    <div class="side-inner">
        <ul class="nav flex-column">
            <li class="nav-item"><a href="home.php" class="nav-link"><img src="<?php echo HOME_URL;?>Views/img/logo-twitterblue.svg" class="icon" alt="マーク"></a></li>
            <li class="nav-item"><a href="home.php" class="nav-link"><img src="<?php echo HOME_URL;?>Views/img/icon-home.svg" alt="家"></a></li>
            <li class="nav-item"><a href="search.php" class="nav-link"><img src="<?php echo HOME_URL;?>Views/img/icon-search.svg" alt="虫眼鏡"></a></li>
            <li class="nav-item"><a href="notification.php" class="nav-link"><img src="<?php echo HOME_URL;?>Views/img/icon-notification.svg" alt="ベル"></a></li>
            <li class="nav-item"><a href="profile.php" class="nav-link"><img src="<?php echo HOME_URL;?>Views/img/icon-profile.svg" alt="個人情報"></a></li>
            <li class="nav-item"><a href="post.php" class="nav-link"><img src="<?php echo HOME_URL;?>Views/img/icon-post-tweet-twitterblue.svg" class="post-tweet" alt="つぶやき"></a></li>
            <!-- popoverをdata-bsにより設定 -->
            <li class="nav-item myicon"><img src="<?php echo htmlspecialchars($view_user['image_path']); ?>" class="js-popover" data-bs-container="body" data-bs-toggle="popover" data-bs-placement='right' data-bs-content="<a href='profile.php'>プロフィール</a><br><a href='sign-out.php'>ログアウト</a>" data-bs-html="true"></li>
        </ul>
    </div>
</div>
