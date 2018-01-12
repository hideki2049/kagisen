<?php
// //session_start();
// //ログイン状態チェック
// if (!isset($_SESSION["USERID"])) {
//     header("Location: topPage.php");
//     exit;
// }

?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <!-- <link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/3.18.1/build/cssreset/cssreset-min.css"> -->
    <link rel="stylesheet" href="CSS/reset.css">
    <link rel="stylesheet" href="CSS/topPage.css">
    <link rel="stylesheet" href="CSS/link_btn.css">
    <style media="screen">
      a:link{color: white}
      a:visited{color: white}
      a:hover{color: white}
      a:active{color: white}
    </style>
    <!-- スクロール -->
    <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> -->
    <!-- スクロール -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- リンクスクロール -->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <!-- リンクスクロール -->
    <script>
  		jQuery(function($){
  		  $('body').on('click', '#demo_introjs', function(){
  			introJs().start();
  		  });
  		});
	  </script>
    <script>
      $(function() {
          var pageTop = $('.page-top');
          pageTop.hide();
          $(window).scroll(function () {
              if ($(this).scrollTop() > 600) {
                  pageTop.fadeIn();
              } else {
                  pageTop.fadeOut();
              }
          });
      });
    </script>
    <script>
      $(function(){
      	$('a[href^=#]').click(function(){
      		var speed = 2000;
      		var href= $(this).attr("href");
      		var target = $(href == "#" || href == "" ? 'html' : href);
      		var position = target.offset().top;
      		$("html, body").animate({scrollTop:position}, speed, "swing");
      		return false;
      	});
      });
      </script>
  </head>
  <body>
    <a href="#" class="page-top">PAGE TOP ▲</a>
    <div class="all">
      <div class="header--cont">
        <!-- <nav class="top_hdnavi">
          <ul>
            <li class="lang"><a href="/jp/">日本語</a></li>
            <li class="lang"><a href="/en/" class="a">English</a></li>
            <div class="clear"></div>
          </ul>
        </nav> -->
        <header>
          <h1>KAGISEN</h1>
        </header>
        <nav class="top_gnavi">
          <ul>
            <li class="list_bg"><span class="style"><a href="">HOME</a></span></li>
            <li class="list_bg"><span class="style"><a href="#detail">ABOUT</a></span></li>
            <li class="list_bg"><span class="style"><a href="Login.php">REGISTER</a></span></li>
            <li class="list_bg"><span class="style"><a href="#explanation_block">Service</a></span></li>
            <li class="list_bg"><span class="style"><a href="contact.php">CONTACT</a></span></li>
            <li class="list_bg"><span class="style"><a href="Login.php">LOGIN</a></span></li>
          </ul>
        </nav>
      </div>
      <div id="hoge"></div>
      <script src="script/particles.min.js"></script>
      <script src="script/setting2.js"></script>
      <div id="detail">
        <div id="about_block">
          <div class="about">
            <h2>About  Me</h2>
            <span class="explanation">このサイトについて知りたい</span>
          </div>
        </div>
        <div class="contents_block">
          <div class="contents_group">
            <div class="purpose">
              <h3>What is this cite for?</h3>
              <p>Welcome to our school's cite</p>
              <p>By the way, I ask a question to everyone.</p>
              <p>Have you ever felt annoying when you evaluate your class's teacher?</p>
              <p>But, this cite helps you with your sober work.</p>
              <p>Quickly and Simply</p>
            </div>
            <div class="use">
              <h3>How to register</h3>
              <p>If you wanna register teacher's evaluation right now, please click the following botton.</p>
            </div>
          </div>
        </div>
        <div id="explanation_block">
          <div class="title_block">
            <h2>Service</h2>
          </div>
          <div class="all_block">
            <div class="subtitle_block">
              <div class="sub1">
                <div class="explanation">
                  <span class="font_set">説明</span>
                </div>
                <span class="block1">手元の端末から登録できます</span>
                <div class="How_to">
                  <span class="font_set">使用方法</span>
                </div>
                <span class="block2">登録画面で必要項目をクリック</span>
              </div>

              <div class="sub4">
                <div class="target_department_en">
                <span class="font_set">target_department</span>
                </div>
                <span class="font">Information system department</span>
                <span class="font">picture sound department</span>
                <span class="font">Electrical engineering faculty</span>
                <span class="font">Bioscience department</span>
                <span class="font">Architectural engineering department</span>
                <span class="font">Architectural engineering postgraduate course</span>
                <span class="font">Measurement and environmental engineering</span>
                <span class="font">Manufacturing engineering department</span>
                <span class="font">Car engineering department(Both Grade1 and Grade2)</span>
                <span class="font">Car customizition engineering department</span>
              </div>
              <div class="sub3">
                <div class="target_department_ja">
                  <span class="font_set">対象学科</span>
                </div>
                <span>情報システム学科</span>
                <span>映像音響学科</span>
                <span>電気工学科</span>
                <span>バイオサイエンス学科</span>
                <span>建築工学科</span>
                <span>建築工学研究科</span>
                <span>測量環境工学科</span>
                <span>ものづくり工学科</span>
                <span>一級・二級自動車工学科</span>
                <span>自動車カスタマイズ学科</span>
              </div>
            </div>
          </div>
        </div>
        <div class="register_block">
          <a class="button" href="#"><span class="set" title="登録画面へ">Right Now!</span></a>
        </div>
      </div>
    </div>
  </body>
</html>
