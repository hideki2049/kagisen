<?php
  session_start();
  include 'DB.php';
  // ログイン状態チェック
  if (!isset($_SESSION["USERID"])) {
      header("Location: Login.php");
      exit;
  }


  //userの名前
  $stmt = $pdo->prepare('select name from t_studentregist where studentnum = ?');
  $stmt->execute(array($_SESSION["USERID"]));
  $userName = $stmt->fetchAll();
  foreach ($userName as $rowUN) {
    $userNamePrint = $rowUN['name'];
  }

  //すでにアンケートが登録されているかどうか調べる
  $stmt = $pdo->prepare('select * from t_answer1 where year = ? and studentnum = ? and semester = ? limit 1');
  $stmt->execute(array($_SESSION["YEAR"],$_SESSION["USERID"],$_SESSION["SEMESTER"]));
  $implement = $stmt->fetchAll();
  if (count($implement) == 1) {//データが登録されていたら完了済み画面へ飛ばす
      header("Location: completion.php");
      exit;
  }

  //ラジオボタン(重み,および内容)
  $ar_rate = array('3' => '良い',
                   '2' => '普通',
                   '1' => '悪い',
                   '0' => '無し',
                 );

   //教師データの取得処理
   $sql = 'select m_teacher.name, m_teacher.teachercd
           from m_teacher, t_teacher, t_student
           where t_student.year = t_teacher.year
           and t_student.grade = t_teacher.grade
           and t_student.subjectcd = t_teacher.subjectcd
           and t_student.cls = t_teacher.cls
           and t_teacher.teachercd = m_teacher.teachercd
           and t_student.studentnum = ?
           and t_student.year = (select year from t_questimplement order by year desc,semester desc limit 1)
           and t_teacher.semester = (select semester from t_questimplement order by year desc,semester desc limit 1) ';
   $stmt = $pdo->prepare($sql);
   $stmt->execute(array($_SESSION["USERID"]));
   $teacher = $stmt->fetchAll();

   //アンケート項目取得処理,項目番号,内容の取得(クエストタイプ1,2)
   $stmt = $pdo->prepare('select questnum, content, questtype from t_questcontent where year = ? and (questtype = 1 or questtype = 2)');
   $stmt->execute(array($_SESSION["YEAR"]));
   $content1 = $stmt->fetchAll();
   //アンケート項目取得処理,項目番号,内容の取得(クエストタイプ3)
   $stmt = $pdo->prepare('select questnum, content, questtype from t_questcontent where year = ? and questtype = 3');
   $stmt->execute(array($_SESSION["YEAR"]));
   $content2 = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>登録画面</title>
    <style media="screen">
      textarea{
        width: 99.3%;
        height: 100%;
        margin-bottom: -8px;
      }
    </style>
    <link rel="stylesheet" href="CSS/register_view.css">
    <script type="text/javascript" src="jquery-v3.2.1.js"></script>
    <script type="text/javascript" src="ayu.js"></script>
  </head>
  <body>
    <div id="useridPrint"><?php echo "{$userNamePrint}"; ?>さん</div>
    <div id="statusPrint"><?php echo "{$_SESSION["YEAR"]}年 {$_SESSION["SEMESTER"]}学期";?></div>


       <input type="checkbox" id="Panel" class="on-off" />
       <div class="menu">
         <?php
         //教員の人数分処理する
         foreach ($teacher as $row1) {
           echo "<label for=\"Panel\" class=\"answer_{$row1['teachercd']}_\" id=\"teacherQuest\">{$row1['name']}</label>";
           echo "<ul>";
           echo "<table border=\"1\">";

           echo "<tr>";
           echo "<th colspan=\"3\">アンケート項目</th>";
           echo "</tr>";

           $j=0;//アンケート項目数カウント変数 初期化(ラジオボタン式)
           $k=0;//アンケート項目数カウント変数 初期化(記述式)
           foreach ($content1 as $row2) {//アンケートの項目数分処理する
             if($row2["questtype"] == 2){//アンケート項目(記述式,タイプ2)
               echo "<tr>";
               echo "<td colspan = \"3\" align = \"center\">{$row2["content"]}</td>";
               echo "</tr>";
               echo "<tr>";
               echo "<td colspan = \"3\"><textarea name=\"message\" rows = \"5\" class=\"qt_{$row1['teachercd']}_{$k}\"></textarea></td>";//class=\"qt_{$row1['teachercd']}_{$row2['questnum']}\"
               echo "</tr>";
               $k++;//記述式項目数をカウント
             }else{//アンケート項目(ラジオボタン式,タイプ1)
               echo "<tr>";
               echo "<td class=\"No\">{$row2['questnum']}</td><td>{$row2['content']}</td>";
               echo "<td class=\"evaluate\">";
               foreach ($ar_rate as $key => $value) {//4つのラジオボタンを生成
                 if($key == '2'){
                   echo "<label id=\"selectPointer\"><input type=\"radio\" name=\"answer_{$row1['teachercd']}_{$j}\" value=\"{$key}\" class=\"{$row1['teachercd']}\" checked=\"checked\" id=\"selectPointer\">{$value}</label>";
                 }else{
                   echo "<label id=\"selectPointer\"><input type=\"radio\" name=\"answer_{$row1['teachercd']}_{$j}\" value=\"{$key}\" class=\"{$row1['teachercd']}\" id=\"selectPointer\">{$value}</label>";
                 }
               }
               echo "</td>";
               echo "</tr>";
               $j++;//アンケート項目数をカウント
             }

           }
           echo "</table>";
           echo "<input type=\"hidden\" class=\"questContentsNum\" value=\"{$j}\">";//アンケート項目数をhiddenで表示
           echo "<input type=\"hidden\" class=\"questContentsNum2\" value=\"{$k}\">";//記述式項目数をhiddenで表示
           echo "</ul>";
         }

         //学校へのアンケート分処理する(タイプ3)
         $l=0;///学校へのアンケート項目数カウント変数 初期化
         foreach ($content2 as $row3){
           echo "<label for=\"Panel\" id=\"schoolDesign\">{$row3['content']}</label>";
           echo "<ul class=\"schoolQuest\">";
           echo "<table border=\"1\">";

           echo "<tr>";
           echo "<th colspan=\"3\">アンケート項目</th>";
           echo "</tr>";
           echo "<tr>";
           echo "<td colspan = \"3\"><textarea name=\"message\" rows = \"5\" class=\"qt2_{$l}\"></textarea></td>";
           echo "</tr>";
           echo "<tr>";
           echo "<td colspan = \"3\" align = \"right\"><button id=\"allSubmit\" onclick=\"this.disabled = true;\">登録</button></td>";
           echo "</tr>";
           echo "<tr>";
           echo "<td class = \"cell\" colspan = \"3\" align = \"right\"><a href = \"Logout.php\">ログアウト</a></td>";

           echo "</tr>";
           echo "</ul>";
           $l++;
         }
         ?>
       </div>
  </body>
</html>
