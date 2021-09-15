<?php

error_reporting(E_ALL);
ini_set('diplay_erros','On');

session_start();
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
          あなたのemailは info@webukatu.com です。<br />
          あなたのpassは password です。
        </p>
        <a href="index.php">ユーザー登録画面へ</a>
      </section>

    <?php }else{ ?>

      <p>ログインしていないと見れません。</p>

    <?php } ?>

  </body>
  </html>
