<?php
?>


<!DOCTYPE html>
<html>
    <head>
      <link rel="stylesheet" href="../css/menu.css">
    </head>
    <body>      
        <div class="background">
            <div class="row">
                <div class="column left">
                    <img class="uno_icon" src="../images//icon/uno_icon.png">
                </div>
                <div class="column right">
                    <div class="option_list">
                        <button class="option" id="RoomListBtn">Room List</button>
                        <button class="option" id="JoinRoomBtn">Join Room</button>               
                    </div>
                </div>              
            </div> 
        </div>

        <div class="overlay" id="overlay"></div>

        <div class="popup-joinroom" id="JoinRoomPopUp">
            <div class="popup-header">
                    Join Room
            </div>
            <div class="joinroom-body">
                <form method="post">
                    <input type="text" name="id-joinroom" class="joinroom-text">
                    <input type="submit" name="joinroom-submit" value="Join" class="joinroom-submit">
                </form>
            </div>
        </div>

        <div class="popup" id="RoomListPopUp">
            <div class="popup-header">
                Room List
            </div>
            
            <div class="popup-body">
                <table>            
               
                </table>
            </div>
        </div>
    </body>
</html>

<script>
    var overlay = document.getElementById('overlay');
    var RoomListBtn = document.getElementById("RoomListBtn");
    var RoomListPopUp = document.getElementById("RoomListPopUp");
    var JoinRoomPopUp = document.getElementById('JoinRoomPopUp');
    var JoinRoomBtn = document.getElementById('JoinRoomBtn');

    overlay.addEventListener('click', ()=>{
        RoomListPopUp.classList.remove('active');
        JoinRoomPopUp.classList.remove('active');
        overlay.classList.remove('active');
    })

    RoomListBtn.onclick = function(){
        RoomListPopUp.classList.add('active');
        overlay.classList.add('active');
    }

    JoinRoomBtn.onclick = function()
    {
        JoinRoomPopUp.classList.add('active');
        overlay.classList.add('active');
    }



</script>