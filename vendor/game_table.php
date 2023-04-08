<?php
require_once('../database/model/user.php');
  session_start();
  $user = new UnoUser;
  $user = $_SESSION['user'];
  $roomID = $_SESSION['roomID'];
  echo ('  <input type="hidden" id="idSession" value="'.$user->id.'">');
  echo ('  <input type="hidden" id="roomIDSession" value="'.$roomID.'">');
?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="../css/game_table.css">
</head>
<body>

  <div class="top">
    <p>In my younger and more vulnerable years my father gave me some advice that I've been turning over in my mind ever since.</p>
  </div>
  <div class="right">
    <p>In my younger and more vulnerable years my father gave me some advice that I've been turning over in my mind ever since.</p>
  </div>
  <div class="left">
    <p>In my younger and more vulnerable years my father gave me some advice that I've been turning over in my mind ever since.</p>
  </div>
  <div class="bottom">
    <div class="left-button"></div>
      <div class="bottom-card-container">
        <div class="card"></div>    
        <div class="card"></div>  
        <div class="card"></div>  
        <div class="card"></div>  
        <div class="card"></div>  
        <div class="card"></div>  
      </div>
      <div class="right-button"></div>
  </div>
</body>
</html>

<script>
  var socket = new WebSocket('ws://localhost:8080');
  socket.onopen = function(e){
    console.log("connected");
    var idSession = document.getElementById("idSession").value;
    var roomIDSession =  document.getElementById("roomIDSession").value;
    var data = {
      type : "on-join-room",
      id : idSession,
      idRoom : roomIDSession,
    }
    socket.send(JSON.stringify(data));
  }

  socket.onmessage = function(e){
    console.log(e.data);
  }

  socket.onclose = function(e){

  }


</script>


