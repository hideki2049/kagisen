<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <style>
    body{
      margin: 0;
    }
    .notice{
      border: 1px solid rgb(65, 142, 213);
      color: rgb(65, 142, 213);
      border-radius: 5px;
      width: 600px;
      font-size: 20px;
      padding: 10px;
      margin-top: 300px;
      margin-left: auto;
      margin-right: auto;
    }
  </style>
  <script type="text/javascript" src="jquery-v3.2.1.js"></script>
  <script>
  $(function(){
    setTimeout(function(){
      location.href = 'Logout.php';
    },3000);
  });
  </script>
</head>
<body>
<?php
if(isset($_SESSION["COMPLETION"])){
  echo "<div class=\"notice\">";
  //echo "<div class=\"title_h\">登録完了</div>";
  echo "登録が完了しました。3秒後にログアウトします。<br/>";
  echo "アンケートへのご協力ありがとうございました。";
  echo "</div>";
}else{
  echo "<div class=\"notice\">";
  echo "すでに登録が完了済みです。<br/>";
  echo "ログアウトします。";
  echo "</div>";
}
?>
</body>
</html>
