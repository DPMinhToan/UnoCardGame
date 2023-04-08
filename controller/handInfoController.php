<?php

require_once('../database/model/hand_info.php');
    class HandInfoController{

        public function get_all_hand_info(int $id){
            $database_object = new Database_Connection();
            $connect = $database_object->connect();
            $query = "SELECT * FROM handinfo WHERE roomID = :id ORDER BY ordernum ASC";
            $statement = $connect->prepare($query);
            $statement->bindParam(":id", $id);
            $statement->execute();

            $array = array();
            while($result = $statement->fetch(PDO::FETCH_ASSOC)){
                $handInfo = new UnoHandInfo;
                $handInfo->object_from_JSOn($result);
                array_push($array, $handInfo);
            }

            return $array;
        }

        public function update_hand_info( UnoHandInfo $hand){
            
        }

        public function get_hand_info(int $id){

        }

    }
?>