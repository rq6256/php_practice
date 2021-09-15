<?php

error_reporting(E_ALL);
ini_set('diplay_erros','On');

session_start();
?>


<?php
  //DBへの接続準備
  $dsn = 'mysql:dbname=php?sample01;host=localhost;charset=utf8';
  $user = 'root';
  $password = 'root';
  $options = array(
          // SQL実行失敗時に例外をスロー
          PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
          // デフォルトフェッチモードを連想配列形式に設定
          PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
          // バッファードクエリを使う(一度に結果セットをすべて取得し、サーバー負荷を軽減)
          // SELECTで得た結果に対してもrowCountメソッドを使えるようにする
          PDO::MYSQL_ATTR_USE_BUFFERED_QUERY => true,
      );

  // PDOオブジェクト生成（DBへ接続）
  $dbh = new PDO($dsn, $user, $password, $options);

  //SQL文（クエリー作成）
  $stmt = $dbh->prepare('SELECT * FROM users WHERE email = :email AND pass = :pass');

  //プレースホルダに値をセットし、SQL文を実行
  $stmt->execute(array(':email' => $email, ':pass' =>  $pass));

  $result = 0;

  $result = $stmt->fetch(PDO::FETCH_ASSOC);

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
        a{
            color: #545454;
            display: block;
        }
        a:hover{
            text-decoration: none;
        }
    </style>
  </head>
  <body>

    <?php if(!empty($_SESSION['login'])){ ?>
    <h1>マイページ</h1>
      <section>
        <p>
          あなたのemailは <?php if(!empty($reslut)) echo $_result['email'];?>です。<br />
          あなたのpassは <?php if(!empty($reslut)) echo $reslut['pass'];?> です。
        </p>
        <a href="index.php">ユーザー登録画面へ</a>
      </section>

    <?php }else{ ?>

      <p>ログインしていないと見れません。</p>

    <?php } ?>

  </body>
  </html>
