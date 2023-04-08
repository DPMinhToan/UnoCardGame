<?php
require_once("../database/model/room.php");
require_once("../database/db.php");

class RoomController{

    public function save_room_data(UnoRoom $room){
        $database_object = new Database_Connection();
        $connect = $database_object->connect();
        $query = "INSERT INTO Room (name, owner) VALUES ( :name, :owner)";
        $statement = $connect->prepare($query);
        $statement->bindParam(":name", $room->name);
        $statement->bindParam(":owner", $room->owner);
        if($statement->execute()){
            return true;
        }else{
            return false;
        }
    }

    function join_room($id){
        $database_object = new Database_Connection();
        $connect = $database_object->connect();
        $query = "UPDATE Room SET memberNum = memberNum+1 WHERE id = :id";
        $statement = $connect->prepare($query);
        $statement->bindParam(":id", $id);
        $statement->execute();
    }

    function check_member(int $id){
        $database_object = new Database_Connection();
        $connect = $database_object->connect();
        $query = "SELECT memberNum FROM room WHERE id = :id";
        $statement = $connect->prepare($query);
        $statement->bindParam(":id", $id);
    
        $statement->execute();
        $number_of_row = $statement->fetchColumn();
        return $number_of_row > 0;
    }

    function check_room(int $id){      
        $database_object = new Database_Connection();
        $connect = $database_object->connect();
        $query = "SELECT count(*) FROM room WHERE id = :id";
        $statement = $connect->prepare($query);
        $statement->bindParam(":id", $id);
    
        $statement->execute();
        $number_of_row = $statement->fetchColumn();
        return $number_of_row > 0;
    }

    function get_room_list(){
        $database_object = new Database_Connection();
        $connect = $database_object->connect();
        $query = "SELECT * FROM room";
        $statement = $connect->prepare($query);
        $statement->execute();
        $array = array();
        while( $result = $statement->fetch(PDO::FETCH_ASSOC)){
            $room = new UnoRoom;
            $room->id = $result['id'];
            $room->name = $result['name'];
            $room->owner = $result['owner'];
            $room->memberNum = $result['memberNum'];
            $room->isPlaying = $result['isPlaying'];
            array_push( $array, $room);
        }

        return $array;
    }
}
?>