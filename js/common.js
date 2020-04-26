function statusSave() {
    localStorage.setItem("status", $("#status").val());
    $(".headerInfo p").text(localStorage.getItem("status"));
    $(".changeForm").fadeOut(500);
}

function del(id) {
    var parent = $(this).parent();
    $.ajax({ type: "POST",
        url:"/ajax.php?action=del",
        data: "id="+id,
        success: function(data){
            $(".it"+id).fadeOut(300);
            $(".it"+id).remove();
        }});
}



$(document).ready(function(){
    $(".headerInfo p").text(localStorage.getItem("status"));

    $(".headerInfo p").click(function(){
        $(".headerInfo .changeForm").css("display", "flex").hide().fadeIn(300);
    });

    $(".changeForm button").click(function(){
        statusSave();
    });

    $('#status').keydown(function(e) {
        if(e.keyCode === 13) {
            statusSave();
        }
      });

      var deg = 0;
      $(".profile").click(function(){
          $(".dropdown").slideToggle();
          deg = deg + 180
          $(".arrow").css('transform', 'rotate('+deg+'deg)');
      });

    $(".btnSend").click(function(){
        var name = $(".formAdd input").val();
        var message = $("#message").val();
        $.ajax({ type: "POST",
        url:"/ajax.php?action=add",
        data: "name="+name+"&message="+message,
        success: function(data){
            $(".posts").append(data);
        }});
    });

});
