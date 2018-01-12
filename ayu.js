$(function(){

  var counter = 0;
  var processNum = $('.menu').children('#teacherQuest').each(function(){//教員への要望数(ulの数を数える)
      counter++;
  });

  counter = 0;
  var processNum2 = $('.menu').children('.schoolQuest').each(function(){//学校への要望数
      counter++;
  });

  console.log(processNum.length);
  console.log(processNum2.length);

  var questContentsNum = $('.menu ul:first').children('.questContentsNum').val();//質問内容項目数(ボタン式)
  var questContentsNum2 = $('.menu ul:first').children('.questContentsNum2').val();//質問内容項目数(記述式)
  console.log(questContentsNum);
  console.log(questContentsNum2);

  var dataAnswer = {};//ボタン式解答データ
  var dataAnswer2 = {};//記述式解答データ
  var dataAnswer3 = {};//学校への要望回答データ

  $('#allSubmit').on('click',function(){
    //先生への要望数回処理する
    for(var i=0;i<processNum.length;i++){
      //質問項目数回処理する(ボタン式)
      for(var j=0;j<questContentsNum;j++){
          var answer = $(':radio[name="'+processNum[i].className+String(j)+'"]:checked').val();
          if(j==0){
            var answerList = [];
            var tcd = $(':radio[name="'+processNum[i].className+String(j)+'"]:checked').attr('class');
          }
          answerList[j] = Number(answer);
          if(j==questContentsNum-1){//2
            dataAnswer[tcd] = answerList;
          }
      }
      //console.log(answerList);

      //質問項目数回処理する(記述式)
      for(var k=0;k<questContentsNum2;k++){
        //var answer2 = $('.qt_'+processNum[i].className+String(k)).val();
        var answer2 = $('.qt_'+tcd+'_'+String(k)).val();
        if(k==0){
          var answerList2 = [];
        }
        answerList2[k] = answer2;
        if(k==questContentsNum2-1){
          dataAnswer2[tcd] = answerList2;
        }
      }
    }
    console.log(dataAnswer);
    console.log(dataAnswer2);

    //学校への要望数回処理する
    for(var m=0;m<processNum2.length;m++){
      var answer3 = $('.qt2_'+String(m)).val();
      dataAnswer3[m] = answer3;
    }

    console.log(dataAnswer3);

    //非同期での送信処理
    $.ajax({
      type: 'POST',
      url: 'process.php',
      data:{
        dataAnswer:dataAnswer,
        dataAnswer2:dataAnswer2,
        dataAnswer3:dataAnswer3
      },
      dataType: 'html',
    }).done(function(data, status, jqXHR){
     console.log(data);
     if(data == 1){
       //window.location.href = 'completion1.php';
       location.reload(true);
     }
    }).fail(function(jqXHR, status, error){
     console.log("error!!");
    }).always(function(jqXHR, status){
     //console.log(status);
    });

  });


});
