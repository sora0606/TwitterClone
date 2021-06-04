<?php
///////////////////////////////////////
// ホームコントローラー
///////////////////////////////////////

// 設定を読み込み
include_once "../config.php";
// 便利な関数を読み込み
include_once "../util.php";

// ログインしているか
$user = getUserSession();

if(!$user){
    header("Location:" . HOME_URL . "Controllers/sign-up.php");
    exit;
}

// 画面表示
$view_user = $user;

//ツイート一覧
// TODO:後でDBから取得
$view_tweets = [
    [
        "user_id" => 1,
        "user_name" => "taro",
        "user_nickname" => "太郎",
        "user_image_name" => "sample-person.jpg",
        "tweet_body" => "今プログラミングをしています。",
        "tweet_image_name" => null,
        "tweet_created_at" => "2021-06-02 14:00:00",
        "like_id" => null,
        "like_count" => 0,
    ],
    [
        "user_id" => 2,
        "user_name" => "jiro",
        "user_nickname" => "次郎",
        "user_image_name" => null,
        "tweet_body" => "コワーキングスペースをオープンしました！",
        "tweet_image_name" => "sample-post.jpg",
        "tweet_created_at" => "2021-05-31 22:00:00",
        "like_id" => 1,
        "like_count" => 1,
    ],
];



include_once "../Views/home.php";

?>