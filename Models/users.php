<?php
///////////////////////////////////////
// ユーザーデータを処理
///////////////////////////////////////
/**
 * ユーザーを作成
 *
 * @param array $data
 * @return bool
 */
function createUser(array $data)
{
    $mysqli= new mysqli(DB_HOST , DB_USER , DB_PASS , DB_NAME);
    // 接続チェック
    if( $mysqli -> connect_errno ){
        echo 'MySQLの接続に失敗しました。：'.$mysqli -> connect_error."\n";
        exit;
    }

    // 新規登録のSQLを作成
    $query = 'insert into users( name, nickname , email , password) values( ? , ? , ? , ? )';
    $statement = $mysqli -> prepare($query);

    // パスワードをハッシュ値に変換
    $data["password"] = password_hash($data["password"] , PASSWORD_DEFAULT);

    // ？部分にセットする内容
    // 第一引数は変数の型を指定(s=string)
    $statement -> bind_param('ssss' , $data["name"] ,  $data["nickname"] , $data["email"] , $data["password"]);

    // 処理を実行
    $response = $statement -> execute();
    if($response === false){
        echo "エラーメッッセージ：".$mysqli -> error ."\n";
    }

    // 接続の解放
    $statement -> close();
    $mysqli -> close();

    return $response;
}

/**
 * ユーザー情報取得：ログインチェック
 *
 * @param string $email
 * @param string $password
 * @return array|false
 */

function findUserAndCheckPassword(string $email , string $password)
{
    $mysqli= new mysqli(DB_HOST , DB_USER , DB_PASS , DB_NAME);
    // 接続チェック
    if( $mysqli->connect_errno ){
        echo 'MySQLの接続に失敗しました。：'.$mysqli -> connect_error."\n";
        exit;
    }

    // 入力値をエスケープ
    $email = $mysqli -> real_escape_string($email);

    // クエリを作成
    // -外部からのリクエストは何が入っているのか分からないので、必ず、エスケープしたものをクオートで囲む
    $query = "select * from users where email = '".$email."'";

    // SQL実行
    $result = $mysqli->query($query);
    if(!$result){
        // MySQL処理中にエラー発生
        echo 'エラーメッセージ：' . $mysqli -> error . "\n";
        $mysqli->close();
        return false;
    }

    // ユーザー情報の取得
    $user = $result->fetch_array(MYSQLI_ASSOC);
    if(!$user){
        // ユーザーが存在しない
        $mysqli->close();
        return false;
    }

    // パスワードチェック
    if(!password_verify($password , $user["password"])){
        // パスワード不一致
        $mysqli->close();
        return false;
    }

    $mysqli->close();

    return $user;

}
?>