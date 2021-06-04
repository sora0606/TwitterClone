<!DOCTYPE html>
<html lang="jp">

<head>
    <?php include_once("../Views/common/head.php"); ?>
    <title>ホーム画面 / twitter</title>
    <meta name="description" content="ホーム画面です。">
</head>

<body class=home>
    <div class="container">
        <?php include_once('../Views/common/side.php'); ?>

        <div class="main">
            <div class="main-header">
                <h1>ホーム</h1>
            </div>
            <div class="tweet-post">
                <div class="my-icon">
                    <img src="<?php echo HOME_URL;?>Views/img_uploaded/user/sample-person.jpg" alt="icon">
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

        <?php if(empty($view_tweets)):?>
                <p class="p-3">ツイートがまだありません</p>
        <?php else:?>
            <div class="tweet-list">
                <?php foreach( $view_tweets as $view_tweet ): ?>
                    <?php include('../Views/common/tweet.php'); ?>
                <?php endforeach; ?>
            </div>
        <?php endif;?>
        </div>
    </div>

    <?php include_once('../Views/common/foot.php'); ?>

</body>

</html>