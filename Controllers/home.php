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
// フォローデータ操作モデルを読み込み
include_once "../Models/follows.php";

// ログインしているか
$user = getUserSession();
if(!$user){
    // ログインしていない場合
    header("Location:" . HOME_URL . "Controllers/sign-up.php");
    exit;
}

// 自分がフォローしているユーザーIDを取得
$following_user_ids = findFollowingUserIds($user['id']);
// 自分のツイートも表示させるために自分のIDも追加
$following_user_ids[] = $user['id'];

// 画面表示
$view_user = $user;
//ツイート一覧
$view_tweets = findTweets($user , null , $following_user_ids);
include_once "../Views/home.php";

?>