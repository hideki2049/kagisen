<?php
  session_start();
  include 'DB.php';

  $dataAnswer = $_POST['dataAnswer'];//ラジオボタンの値(オブジェクト,複数のデータ)
  $dataAnswer2 = $_POST['dataAnswer2'];//テキストエリアの値(オブジェクト,複数のデータ)
  $dataAnswer3 = $_POST['dataAnswer3'];//テキストエリアの値(オブジェクト,複数のデータ)
  $studentnum = $_SESSION["USERID"];//userid
  $year = $_SESSION["YEAR"];//年度
  $semester = $_SESSION["SEMESTER"];//学期

  //var_dump($_POST['dataAnswer2']);

  //アンケート項目番号取得(クエストタイプ1)
  $stmt = $pdo->prepare('select questnum, questtype, odr from t_questcontent where year = ? and questtype = 1');
  $stmt->execute(array($_SESSION["YEAR"]));
  $questtype1 = $stmt->fetchAll();

  //アンケート項目番号取得(クエストタイプ2)
  $stmt = $pdo->prepare('select questnum, questtype, odr from t_questcontent where year = ? and questtype = 2');
  $stmt->execute(array($_SESSION["YEAR"]));
  $questtype2 = $stmt->fetchAll();

  //アンケート項目番号取得(クエストタイプ3)
  $stmt = $pdo->prepare('select questnum, questtype, odr from t_questcontent where year = ? and questtype = 3');
  $stmt->execute(array($_SESSION["YEAR"]));
  $questtype3 = $stmt->fetchAll();

  $x=0;
  foreach ($questtype2 as $row1){
    $questT2NumData[$x] = $row1['questnum'];
    $x++;
  }

  $x=0;
  foreach ($questtype3 as $row2){
    $questT3NumData[$x] = $row2['questnum'];
    $x++;
  }



  //人数分処理する(オブジェクトの要素数)
  while(current($dataAnswer)){
    $tcd = key($dataAnswer);//教員コード(オブジェクトのプロパティ名(key),key:value)
    $questNum = count($dataAnswer[$tcd]);//質問項目数(オブジェクト(value)の配列中身の要素数)
    $questNum2 = count($dataAnswer2[$tcd]);//記述式質問項目数

    //質問項目数分順番にインサート処理
    for($i=0;$i<$questNum;$i++){
      $stmt = $pdo->prepare('insert into t_answer1 values(?,?,?,?,?,?,now())');
      $stmt->execute(array($year,$studentnum,$tcd,$semester,$i+1,$dataAnswer[$tcd][$i]));
    }

    //記述式項目数分順番にインサート処理
    for($j=0;$j<$questNum2;$j++){
      $stmt = $pdo->prepare('insert into t_answer2 values(?,?,?,?,?,?,now())');
      $stmt->execute(array($year,$semester,$tcd,$studentnum,$questT2NumData[$j],$dataAnswer2[$tcd][$j]));
      //echo $dataAnswer2[$tcd][$j]."\n";
      //echo $tcd."\n";
    }

    next($dataAnswer);
  }

  $u=0;
  while(current($dataAnswer3)){
    $stmt = $pdo->prepare('insert into t_answer2 values(?,?,"request",?,?,?,now())');
    $stmt->execute(array($year,$semester,$studentnum,$questT3NumData[$u],$dataAnswer3[$u]));
    $u++;
    next($dataAnswer3);
  }

$_SESSION["COMPLETION"] = 1;
echo 1;//登録が完了

//echo 0;
?>
