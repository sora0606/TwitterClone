<?php
///////////////////////////////////////
// ツイートデータを処理
///////////////////////////////////////
/**
 * ツイート作成
 *
 * @param array $data
 * @return bool
 */
function createTweet(array $data)
{
    $mysqli= new mysqli(DB_HOST , DB_USER , DB_PASS , DB_NAME);
    // 接続チェック
    if( $mysqli -> connect_error ){
        echo 'MySQLの接続に失敗しました。：'.$mysqli -> connect_error."\n";
        exit;
    }

    // 新規登録のSQLを作成
    $query = 'insert into tweets(user_id , body , image_name) values(? , ? , ?)';
    $statement = $mysqli -> prepare($query);

    // 値をセット(i=int , s=string)
    $statement -> bind_param('iss' , $data["user_id"] , $data["body"] , $data["image_name"]);

    // 処理を実行
    $response = $statement->execute();
    if($response === false){
        echo 'エラーメッセージ：' . $mysqli -> error ."\n";
    }

    // 接続を閉じる
    $statement -> close();
    $mysqli -> close();

    return $response;
}