window.onbeforeunload = function(){
  $.post( "functions/db_leave.php", {
    ID: response.id});
}
