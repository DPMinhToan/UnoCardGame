<?php

    require_once("../database/model/room_info.php");
    class InfoController{

        public function get_room_info(int $id){
            $database_object = new Database_Connection();
            $connect = $database_object->connect();
            $query = "SELECT * FROM roominfo WHERE roomID = :id";
            $statement = $connect->prepare($query);
            $statement->bindParam(":id", $id);
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_ASSOC);

            $roomInfo = new UnoRoomInfo;
            $roomInfo->object_from_JSOn($result);
            return $roomInfo;
        }
        
        public function change_isPlaying( int $id,bool $isPlaying){
            $database_object = new Database_Connection();
            $connect = $database_object->connect();
            $query = "UPDATE roominfo SET isPLaying = :isPlaying WHERE id=:id";
            $statement = $connect->prepare($query);
            $statement->bindParam(":isPLaying", $isPlaying);
            $statement->bindParam(":id", $id);
            $statement->execute();
        }

    }
?>