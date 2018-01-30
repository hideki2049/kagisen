<?php
session_start();
include 'DB.php';

// エラーメッセージの初期化
// $errorMessage = "";

// ログインボタンが押された場合
if (isset($_POST["login"])) {
    // 1. ユーザIDの入力チェック
    // if (empty($_POST["userid"])) {  // emptyは値が空のとき
    //     $errorMessage = 'ユーザーIDが未入力です。';
    // } else if (empty($_POST["password"])) {
    //     $errorMessage = 'パスワードが未入力です。';
    // }

    if (!empty($_POST["userid"]) && !empty($_POST["password"])) {
        // 入力したユーザIDを格納
        $userid = $_POST["userid"];
        // 2. ユーザIDとパスワードが入力されていたら認証する
        //$dsn = sprintf('mysql: host=%s; dbname=%s; charset=utf8', $db['host'], $db['dbname']);

            $stmt = $pdo->prepare('SELECT * FROM t_user WHERE userid = ?');
            $stmt->execute(array($userid));

            $password = $_POST["password"];

            if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                if ($password === $row["pass"]){
                    session_regenerate_id(true);

                    // 入力したIDのユーザー名を取得
                    $id = $row['userid'];
                    $sql = "SELECT * FROM t_user WHERE userid = '".$id."'";  //入力したIDからユーザー名を取得
                    $stmt = $pdo->query($sql);
                    foreach ($stmt as $row) {
                        $row['userid'];  // ユーザー名
                    }
                    $_SESSION["USERID"] = $row['userid'];//sessionにuseridを追加

                    /*アンケートを行う年の設定*/
                    $stmt = $pdo->prepare('select * from t_questimplement order by year desc,semester desc limit 1');
                    $stmt->execute();
                    // $data = $stmt->fetchAll();
                    foreach($stmt as $row){
                      $row['year'];
                      $row['semester'];
                    }
                    $_SESSION["YEAR"] = $row['year'];//sessionに年度を追加
                    $_SESSION["SEMESTER"] = $row['semester'];//sessionに学期を追加

                    header("Location: register_view.php");  // メイン画面へ遷移
                    exit();  // 処理終了
                } else {
                    // 認証失敗
                    $errorMessage = 'ユーザーIDあるいはパスワードに誤りがあります。';
                }
            } else {
                // 4. 認証成功なら、セッションIDを新規に発行する
                // 該当データなし
                $errorMessage = 'ユーザーIDあるいはパスワードに誤りがあります。';
            }
    }
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="CSS/login.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" charset="utf-8"></script>
    <script type="text/javascript">
      $(document).ready(function() {
        $(".name").keyup(function(){
          var val = $(this).val();
          if(val == ''){
            $('.holder1').show();
          }
          else if(val !== ''){
            $('.holder1').hide();
          }
        });
        $(".pass").keyup(function(){
          var val = $(this).val();
          if(val == ''){
            $('.holder2').show();
          }
          else if(val !== ''){
            $('.holder2').hide();
          }
        });
      });
    </script>

  </head>
  <body>
    <div class="form">

          <ul class="tab-group">
            <!-- <li class="tab active"><a href="#signup">Sign Up</a></li> -->
            <li class="tab"><span>Log In</span></li>
          </ul>

          <div class="tab-content">

            <div id="login">
              <h1>Welcome Back!</h1>

              <form action="" method="post">

                <div class="field-wrap">
                <label class="holder1">
                  UsarName<span class="req">*</span>
                </label>
                <input type="text" class="name" id="userid" name="userid" required>
              </div>

              <div class="field-wrap">
                <label class="holder2">
                  Password<span class="req">*</span>
                </label>
                <input type="password" class="pass" id="password" name="password" required>
              </div>
              <input type="submit" id="login" name="login" class="button button-block" value="LOGIN">

              </form>

            </div>

          </div><!-- tab-content -->

    </div> <!-- /form -->

  </body>
</html>
