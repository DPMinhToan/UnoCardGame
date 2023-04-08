<?php
    require_once('../controller/roomController.php');
    require_once('../database/model/room.php');
    session_start();
    $user = $_SESSION["user"];
    if(isset($_POST['submit'])){      
        $room = new UnoRoom;       
        $room->id = $_POST['id'];
        $roomController = new RoomController;
        if(!$roomController->check_room($room->id)){
            echo "<script> alert( 'This room is no longer exist' ); </script>";
        }else if(!$roomController->check_member($room->id)){
            echo "<script> alert( 'This room is full' ); </script>";
        }else{
            $roomController->join_room($room->id);
            $_SESSION['roomID'] = $room->id;
            header("Location: http://localhost:3000/view/game_table.php");
        }
    }

    if(isset($_POST['joinroom-submit'])){      
        $joinroom = new UnoRoom;       
        $joinroom->id = $_POST['id-joinroom'];
        $roomController = new RoomController;
        if($joinroom->id == ""){
            echo "<script> alert( 'Please enter an ID' ); </script>";
        }
        else if(!$roomController->check_room($joinroom->id)){
            echo "<script> alert( 'This room is not exist' ); </script>";
        }
        else if(!$roomController->check_member($joinroom->id)){
            echo "<script> alert( 'This room is full' ); </script>";
        }
        else{
            $roomController->join_room($joinroom->id);
            $_SESSION['roomID'] = $joinroom->id;
            header("Location: http://localhost:3000/view/game_table.php");
        }
    }
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
                    <?php
                        $controller = new RoomController;
                        $array = $controller->get_room_list();
                        $count = 0;
                        foreach($array as $room){
                            $count = $count + 1;
                            if($count%2>0){
                                echo '<tr class="row-light">
                                        <th class="column-1">'.$room->name.'</th>
                                        <th class="column-2">'.$room->memberNum.'/4</th>
                                        <th class="column-3">
                                            <form method="post">
                                                <input type="hidden" name="name" value="'.$room->name.'">
                                                <input type="hidden" name="id" value="'.$room->id.'">
                                                <input type="hidden" name="memberNum" value="'.$room->memberNum.'">
                                                                        <button class="row-button" name="submit" type="submit">Join</button>
                                            </form>
                                        </th>
                                    </tr>';
                            }else{
                                echo  '<tr class="row-black">
                                            <th class="column-1">'.$room->name.'</th>
                                            <th class="column-2">'.$room->memberNum.'/4</th>
                                            <th class="column-3">
                                                <form method="post">
                                                    <input type="hidden" name="name" value="'.$room->name.'">
                                                    <input type="hidden" name="id" value="'.$room->id.'">
                                                    <input type="hidden" name="memberNum" value="'.$room->memberNum.'">
                                                    <button class="row-button" name="submit" type="submit">Join</button>
                                                </form>
                                            </th>
                                        </tr>';
                            }                        
                        }
                    ?>
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