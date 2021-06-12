<?php
///////////////////////////////////////
// サインアップコントローラー
///////////////////////////////////////

// 設定を読み込み
include_once "../config.php";
// ユーザーデータ操作モデルを読み込み
include_once "../Models/users.php";

// エラー格納用
$error_messages = [];

// ユーザー作成
// -$_POSTを使用しましたが、filter_input()という関数があります。
if(isset($_POST['nickname']) && isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password'])){
    $data = [
        'nickname'      => (string)$_POST['nickname'],
        'name'          => (string)$_POST['name'],
        'email'         => (string)$_POST['email'],
        'password'      => (string)$_POST['password']
    ];

    // @tado バリデーション

    // 文字数制限（全ての入力について行う）
    // $length = mb_strlen($data['nickname']);
    // if($length < 1 || $length > 50){
    //     $error_messages[] = 'ニックネームは1〜50文字にしてください';
    // }

    // メールアドレス
    // if (!filter_var($data['email'] , FILTER_VALIDATE_EMAIL)){
    //     $error_messages[] = 'メールアドレスが不正です';
    // }

    // 既存チェック
    // if(findUser($data['email'])){
    //     $error_messages[] = 'このメールアドレスは既に使用されています';
    // }

    // if(findUser($data['name'])){
    //     $error_messages[] = 'このユーザー名は既に使用されています';
    // }

    // エラーがなければ、登録
    // if(!$error_messages){
    if(createUser($data)){
        //  ログイン画面に遷移
        header("Location:".HOME_URL."Controllers/sign-in.php");
        exit;
    }
    // }
}

// 画面表示
// $view_error_messages = $error_messages;
include_once "../Views/sign-up.php";
?>