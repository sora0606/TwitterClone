<?php
///////////////////////////////////////
// ホームコントローラー
///////////////////////////////////////

// 設定を読み込み
include_once "../config.php";
// 便利な関数を読み込み
include_once "../util.php";
// ツイートデータ操作モデルを読み込み
include_once "../Models/tweets.php";

// ログインしているか
$user = getUserSession();

if(!$user){
    header("Location:" . HOME_URL . "Controllers/sign-up.php");
    exit;
}

// 画面表示
$view_user = $user;
//ツイート一覧
$view_tweets = findTweets($user);
include_once "../Views/home.php";

?>