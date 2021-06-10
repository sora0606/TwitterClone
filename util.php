<?php
/////////////////////////////////
//便利な関数
/////////////////////////////////

/**
 * 画像ファイル名から画像URLを生成
 *
 * @param string $name 画像ファイル名
 * @param string $type ユーザー画像かツイート画像
 * @return string
 */

function buildImagePath(string $name = null , string $type)
{
    if($type === "user" && !isset($name)){
        return HOME_URL . "Views/img/icon-default-user.svg";
    }

    return HOME_URL . "Views/img_uploaded/" . $type . '/' . htmlspecialchars($name);
}

/**
 *指定した日時からどれだけ経過してるかを取得
 *
 * @param string $datetime 日時
 * @return string
 */
function convertToDayTimeAgo(string $datetime)
{
    $unix = strtotime($datetime);
    $now = time();
    $diff_sec = $now - $unix;

    if($diff_sec < 60){
        $time = $diff_sec;
        $unix = "秒前";
    }elseif($diff_sec < 3600){
        $time = $diff_sec / 60;
        $unix = "分前";
    }elseif($diff_sec < 86400){
        $time = $diff_sec / 3600;
        $unix = "時間前";
    }elseif($diff_sec < 2764800){
        $time = $diff_sec / 86400;
        $unix = "日前";
    }else{
        if(date('Y') != date('Y',$unix)){
            $time = date("Y年n月j日",$unix);
        }else{
            $time = date("n月j日",$unix);
        }
        return $time;
    }
    return (int)$time.$unix;
}

/**
 * ユーザー情報をセッションに保存
 *
 * @param array $user
 * @return void
 */
function saveUserSession(array $user)
{
    // セッションを開始していない場合
    if(session_status() === PHP_SESSION_NONE){
        // セッションを開始
        session_start();
    }

    $_SESSION["USER"] = $user;
}

/**
 * ユーザー情報をセッションから削除
 *
 * @return void
 */
function deleteUserSession()
{
    // セッションを開始していない場合
    if(session_status() === PHP_SESSION_NONE){
        // セッションを開始
        session_start();
    }

    // セッションのユーザー情報を削除
    unset($_SESSION["USER"]);
}

/**
 * セッションのユーザー情報の取得
 *
 * @return array|false
 */
function getUserSession()
{
    // セッションを開始していない場合
    if(session_status() === PHP_SESSION_NONE){
        // セッションを開始
        session_start();
    }

    if(!isset($_SESSION["USER"])){
        // セッションにユーザー情報がない
        return false;
    }

    $user = $_SESSION["USER"];

    // 画像のファイル名からファイルURLを取得
    if(!isset($user["image_name"])){
        $user["image_name"] = null;
    }

    $user["image_path"] = buildImagePath($user["image_name"] , "user");

    return $user;
}


/**
 * 画像アップロード
 *
 * @param array $user
 * @param array $file
 * @param string $type
 * @return string 画像のファイル名
 */
function uploadImage(array $user , array $file , string $type)
{
    // 画像のファイル名から拡張子を取得（例：.png）
    $image_extension = strrchr($file["name"] , '.');

    // 画像のファイル名を作成
    $image_name = $user['id'].'_'.date('YmdHis').$image_extension;

    // 保存先のディレクトリ
    $directory = '../Views/img_uploaded/' . $type . '/';

    // 画像パスの作成
    $image_path = $directory . $image_name;

    // 画像の設置
    move_uploaded_file($file["tmp_name"] , $image_path);

    // 画像ファイルかチェック
    if(exif_imagetype($image_path)){
        return $image_name;
    }

    // 画像ファイル以外の場合
    echo '選択されたファイルが画像ではないため処理を停止しました。';
    exit;

}
?>