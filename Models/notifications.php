<?php
///////////////////////////////////////
// 通知データを処理
///////////////////////////////////////

/**
 * 通知の登録
 *
 * @param array $data
 * @return int|false
 */
function createNotification(array $data)
{
    $mysqli= new mysqli(DB_HOST , DB_USER , DB_PASS , DB_NAME);
    // 接続チェック
    if( $mysqli -> connect_error ){
        echo 'MySQLの接続に失敗しました。：'.$mysqli -> connect_error."\n";
        exit;
    }

    // SQLの作成
    $query = 'insert into notifications (recieved_user_id , sent_user_id , message) values (? , ? , ?)';
    $statement = $mysqli -> prepare($query);

    // プレースフォルダに値をセット
    $statement -> bind_param('iis' , $data['recieved_user_id'] , $data['sent_user_id'] , $data['message'] ,);

    // SQL実行
    if($statement -> execute()){
        // 結果をIDで返却
    $response = $mysqli -> insert_id;

    }else{
        $response = false;
        echo 'エラーメッセージ：' . $mysqli -> error .  "\n";
    }

    // 接続を閉じる
    $statement -> close();
    $mysqli -> close();

    return $response;
}

/**
 * 通知の一覧を取得
 *
 * @param integer $user_id
 * @return array|false
 */
function findNotifications(int $user_id)
{
    $mysqli= new mysqli(DB_HOST , DB_USER , DB_PASS , DB_NAME);
    // 接続チェック
    if( $mysqli -> connect_error ){
        echo 'MySQLの接続に失敗しました。：'.$mysqli -> connect_error."\n";
        exit;
    }

    // エスケープ
    $user_id = $mysqli -> real_escape_string($user_id);

    // 検索のSQLを作成
    $query = <<<SQL
        select
            N.id as notification_id,
            N.message as notification_message,
            U.name as user_name,
            U.nickname as user_nickname,
            U.image_name as user_image_name
        from
            notifications as N
            join
            -- ユーザーIDと通知の送り主のIDを結びつけます。
                users as U on U.id = N.sent_user_id and U.status = 'active'
        where
            -- ログインしているユーザーのIDと受け取り主のIDを結びつけ、この条件から自分宛の通知を取得
            N.status = 'active' and N.recieved_user_id = '$user_id'
        order by
            N.created_at desc
        limit 50
    SQL;

    // SQL実行
    if($result = $mysqli -> query($query)){
        // 配列で取得
        $notifications = $result -> fetch_all(MYSQLI_ASSOC);
    }else{
        $notifications = false;
        echo 'エラーメッセージ：' . $mysqli -> error . "\n";
    }

    $mysqli -> close();

    return $notifications;
}
?>