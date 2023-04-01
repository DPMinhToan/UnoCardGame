<?php

require_once("../database/model/user.php");
require_once("../database/db.php");

class UserController{

    public function save_user_data(UnoUser $user){
        $database_object = new Database_Connection();
        $connect = $database_object->connect();
        $query = "INSERT INTO User (username, password, name) VALUES ( :username, :password, :name)";
        $statement = $connect->prepare($query);
        $statement->bindParam(":username", $user->username);
        $statement->bindParam(":password", $user->password);
        $statement->bindParam(":name", $user->name);
        if($statement->execute()){
            return true;
        }else{
            return false;
        }
    }

    function check_user_by_username(UnoUser $user){      
        $database_object = new Database_Connection();
        $connect = $database_object->connect();
        $query = "SELECT count(*) FROM User WHERE username = :username";
        $statement = $connect->prepare($query);
        $statement->bindParam(":username", $user->username);
    
        $statement->execute();
        $number_of_row = $statement->fetchColumn();
        return $number_of_row > 0;
    }

    function check_user_by_username_password(UnoUser $user){
        $database_object = new Database_Connection();
        $connect = $database_object->connect();
        $query = "SELECT count(*) FROM User WHERE username = :username AND password = :password";
        $statement = $connect->prepare($query);
        $statement->bindParam(":username", $user->username);
        $statement->bindParam(":password", $user->password);
    
        $statement->execute();
        $number_of_row = $statement->fetchColumn();
        return $number_of_row > 0;
    }
}
?>