<!DOCTYPE html>
<html lang="jp">

<head>
    <?php include_once("../Views/common/head.php"); ?>
    <title>通知画面 / twitter</title>
    <meta name="description" content="通知画面です。">
</head>

<body class="home notification text-center">
    <div class="container">
        <?php include_once('../Views/common/side.php'); ?>

        <div class="main">
            <div class="main-header">
                <h1>通知</h1>
            </div>
            <div class="ditch"></div>

            <div class="notification-list">
                <?php if(empty($view_notifications)): ?>
                    <p class="no-result p-4">通知はまだありません。</p>
                <?php else:?>
                    <?php foreach($view_notifications as $view_notification): ?>
                        <div class="notification-item">
                            <div class="user">
                                <img src="<?php echo buildImagePath($view_notification['user_image_name'] , 'user'); ?>" alt="">
                            </div>
                            <div class="content">
                                <p><?php echo htmlspecialchars($view_notification['notification_message']); ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>

        </div>
    </div>

    <?php include_once('../Views/common/foot.php'); ?>

</body>

</html>