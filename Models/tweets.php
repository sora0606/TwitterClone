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

/**
 * ツイート一覧を取得
 *
 * @param array $user ログインしているユーザー情報
 * @return array|false ツイート一覧の配列｜false
 */
function findTweets(array $user)
{
    $mysqli= new mysqli(DB_HOST , DB_USER , DB_PASS , DB_NAME);
    // 接続チェック
    if( $mysqli -> connect_error ){
        echo 'MySQLの接続に失敗しました。：'.$mysqli -> connect_error."\n";
        exit;
    }

    // ログインユーザーIDをエスケープ
    $login_user_id = $mysqli -> real_escape_string($user['id']);

    // 検索のSQL文を作成
    $query = <<< SQL
        select
            -- ツイートテーブルの取得したいカラムの指定
            T.id as tweet_id,
            T.status as tweet_status,
            T.body as tweet_body,
            T.image_name as tweet_image_name,
            T.created_at as tweet_created_at,
            -- ユーザーテーブルの取得したいカラムの指定
            U.id as user_id,
            U.name as user_name,
            U.nickname as user_nickname,
            U.image_name as user_image_name,
            -- ログインユーザーがいいね！したか（している場合、値が入る）
            L.id as like_id,
            -- いいね！数
            (select count(*) from likes where status = "active" and tweet_id = T.id) as like_count

        from
            tweets as T
        join
            -- ユーザーテーブルを紐づける
            users as U on U.id = T.user_id and U.status = 'active'
        left join
            likes as L on L.tweet_id = T.id and L.status = 'active' and L.user_id = '$login_user_id'
        where
            T.status = 'active'

    SQL;

    // SQL実行
    if($result = $mysqli -> query($query)){
        // データを配列で受け取る
        $response = $result -> fetch_all(MYSQLI_ASSOC);
    }else{
        $response = false;
        echo 'エラーメッセージ： ' . $mysqli -> error . "\n";
    }

    $mysqli -> close();

    return $response;
}