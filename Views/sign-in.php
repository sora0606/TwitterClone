<!DOCTYPE html>
<html lang="jp">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/twitterViews/img/logo-twitterblue.svg">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous" defer></script>
    <link rel="stylesheet" href="/twitter/Views/css/style.css">

    <title>ログイン画面 / twitter</title>
    <meta name="description" content="ログイン画面です。">
</head>
<body class="signup text-center">
    <main class="form-signup">
    <form action="sign-in.php" method="post">
        <img src="/twitter/Views/img/logo-white.svg" alt="" class="logo-white">
        <h1>Twiterクローンにログイン</h1>
        <input type="email" class="form-control" name="email" placeholder="メールアドレス" required autofocus>
        <input type="password" class="form-control" name="password" placeholder="パスワード" required>
        <button class="w-100 btn btn-lg" type="submit">ログイン</button>
        <p class="mt-3 mb-2"><a href="sign-in.php">会員登録する</a></p>
        <p class="mt-2 mb-3 text-muted">&copy; 2021</p>
    </form>
    </main>
</body>
</html>
