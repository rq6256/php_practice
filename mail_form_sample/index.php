<?php

error_reporting(E_ALL); //全てのエラーを報告する
ini_set('display_errors','On'); //画面にエラーを表示させるか

//1.post送信されていた場合
if(!empty($_POST)){

  //本来は最初にバリデーションを行うが、今回は省略

  // A.変数にユーザー情報を代入
  $to = $_POST['email'];
  $subject = $_POST['subject'];
  $comment = $_POST['comment'];

  // B.メッセージ表示用の変数を用意
    $msg = '';

  // C.メール送信プログラム（外部のphpファイル）を読み込む
  include('mail.php');

}

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>ホームページのタイトル</title>
    <style>
        body{
            margin: 0 auto;
            padding: 150px;
            width: 25%;
            background: #fbfbfa;
        }
        h1{ color: #545454; font-size: 20px;}
        form{
            overflow: hidden;
        }
        input[type="text"]{
            color: #545454;
            height: 60px;
            width: 100%;
            padding: 5px 10px;
            font-size: 16px;
            display: block;
            margin-bottom: 10px;
            box-sizing: border-box;
        }
      input[type="password"]{
            color: #545454;
            height: 60px;
            width: 100%;
            padding: 5px 10px;
            font-size: 16px;
            display: block;
            margin-bottom: 10px;
            box-sizing: border-box;
        }
        input[type="submit"]{
            border: none;
            padding: 15px 30px;
            margin-bottom: 15px;
            background: #3d3938;
            color: white;
            float: right;
        }
        textarea{
            color: #545454;
            height: 200px;
            width: 100%;
            padding: 5px 10px;
            font-size: 16px;
            display: block;
            margin-bottom: 10px;
            box-sizing: border-box;
            border-color:#ddd;
        }
        input[type="submit"]:hover{
            background: #111;
            cursor: pointer;
        }
    </style>
  </head>
  <body>

        <p><?php if(!empty($msg)) echo $msg; ?></p>

        <h1>お問合せ</h1>
            <form method="post">

                <input type="text" name="email" placeholder="email" value="<?php if(!empty($_POST['email'])) echo $_POST['email'];?>">

                <input type="text" name="subject" placeholder="件名" value="<?php if(!empty($_POST['subject'])) echo $_POST['subject'];?>">

                <textarea name="comment" placeholder="内容"><?php if(!empty($_POST['comment'])) echo $_POST['comment'];?></textarea>

                <input type="submit" value="送信">

            </form>

  </body>
</html>