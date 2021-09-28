<?php
// メール送信プログラム

// フォームが全て入力されていた場合
if(!empty($to) && !empty($subject) && !empty($comment)){

    // 文字化けしないように設定（お決まりのパターン）
    mb_language("Japanese");//現在使用している言語を設定する
    mb_internal_encoding("UTF-8");//内部の日本語をどのようにエンコーディング（機械がわかる言葉へ変換）するかを設定

    //メール送信準備
    $form = 'rq6256@gmail.com';

    //メールを送信（送信結果はtrueかfalseで帰ってくる）
    $result = mb_send_mail($to,$subject,$comment,"From:".$form);

    //送信結果を判定
    if($result){
        unset($_POST);
        $msg = 'メールが送信されました';
    }   else{
        $msg = 'メールの送信に失敗しました';
    }   else{
        $msg = '全て入力必須です。';
    }
}

?>