<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <!-- <link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/3.18.1/build/cssreset/cssreset-min.css"> -->
    <link rel="stylesheet" href="CSS/reset.css">
    <link rel="stylesheet" href="CSS/contact.css">
    <link rel="stylesheet" href="CSS/contact_link_btn.css">
    <style media="screen">
      a:link{color: black}
      a:visited{color: black}
      a:hover{color: black}
      a:active{color: black}
    </style>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="script/move.js" charset="utf-8"></script>
    <script src="script/reload.js" charset="utf-8"></script>
    <script type="text/javascript">
    // フェードインで表示するコンテンツをdisplay:noneで非表示にする
    $('head').append('<style type="text/css">#all{display:none;}</style>');
    $(function() {
      // フェードインidを指定と表示速度ミリ秒
      $('#all').fadeIn(3000);
      // ページ遷移時にフェードアウトさせるclickイベントの要素を指定。ここではli a
    //   $('li a, a.windowFade').click(function() {
    //     var url = $(this).attr("href");
    //     // アニメーションで透過0になるまでフェードアウトさせる。速度ミリ秒
    //     $('#wrapper').animate({"opacity": 0}, 1000, function() {
    //       location.href = url;
    //     });
    //     return false;
    //   });
    });
    </script>
    <!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js"></script>
    <script src="script/fadeinout.js"></script> -->
  </head>
  <body>
    <div id="all">
      <header class="header">
        <div class="inner">
          <nav class="menu">
            <li class="Home"><a href="topPage.php">HOME</a></li>
            <li class="About"><a href="topPage.php#about_block">ABOUT</a></li>
            <li class="Confirm"><a href="topPage.php#explanation_block">SERVICE</a></li>
            <li class="Register"><a href="Login.php">REGISTER</a></li>
            <li class="Logout"><a href="Login.php">LOGIN</a></li>
          </nav>
        </div>
      </header>
      <div class="contents_block">
        <!-- <div class="pageTop">
          <a href="#all"></a>
        </div> -->
        <div class="contents_group">
          <div class="contents">
            <div class="section">
              <h2>Contact</h2>
              <div class="explanation">
                <p class="">ご相談・お問い合わせは、フォームまたは下記電話番号よりお問合せください。</p>
                <p class="brank_width">Should you have any questions, please contact us by mail or telephone.</p>
                <p class="">*は必須項目になります。</p>
                <p class="brank_width">*is required entry</p>
              </div>
              <a class="tel" style="font-family:contact Ryumin;"href="tel:090-9216-1937">
                <div class="inner1">
                  <p class="tel">お電話でのお問い合わせはこちらから</p>
                  <p class="brank_width">If you ask a question by telephone, please push the following number.</p>
                  <span class="phone_num">
                    Tel:090-9216-1937
                  </span>
                  <span class="open">
                    <span class="time">9:00~17:30</span>
                    <span style="font-family: contact Ryumin;">(土日祝祭日を除く)</span>
                  </span>
                </div>
              </a>
            </div>
            <div class="a_link">
              <a  class="scroll" href="#section_sub"><span></span>Scroll</a>
            </div>
            <div id="fadein">
              <div id="section_sub">
                <hr class="border">
                <h2 class="sub_title_en" >Contact Form</h2>
                <hr class="border">
              </div>
              <div class="mail_form">
                <form class="form1" action="return_mail.php" method="post">
                  <div class="left">
                    <div class="uname_space">
                      <input class="text_box" type="text" name="uname" placeholder="お名前*/Your Name" required>
                    </div>
                    <div class="email_space">
                      <input class="text_box" type="email" name="email" placeholder="メールアドレス/E-mail address">
                    </div>
                    <div class="tel_space">
                      <input class="text_box" type="tel" name="tel" placeholder="電話番号/Telephone Number">
                    </div>
                  </div>
                  <div class="right">
                    <textarea  class="text_area" name="message" rows="7" placeholder="お問い合わせの内容を入力してください。*/Please enter a question or topic here."></textarea>
                  </div>
                  <div class="formButton">
                    <button class="button1" style="font-family:contact Ryumin;" type="submit">SEND</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
