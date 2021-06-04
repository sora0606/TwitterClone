<?php
// エラー表示あり

ini_set("display_errors",1);

// 日本時間に設定する

date_default_timezone_set("Asia/Tokyo");

// URL/ディレクトリ設定

define('HOME_URL',"/twitter/");

// データベースの接続情報

define( "DB_HOST" , "localhost" );
define( "DB_USER" , "test" );
define( "DB_PASS" , "testpass" );
define( "DB_NAME" , "twitter_clone" );

?>