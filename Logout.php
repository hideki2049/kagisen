<?php
session_start();


// if (isset($_SESSION["USERID"])) {
//     $errorMessage = "ログアウトしました。";
// } else {
//     $errorMessage = "セッションがタイムアウトしました。";
// }


// セッションの変数のクリア
$_SESSION = array();

// セッションクリア
@session_destroy();

header("Location: Login.php");
?>
