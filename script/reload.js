$(function(){
    $(window).on('beforeunload', function() {
        return "このページを離れると、入力したデータが削除されます。\n修正の場合には、「修正ボタン」をクリックしてください。";
    });
});
