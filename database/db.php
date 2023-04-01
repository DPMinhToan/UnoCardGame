<?php
    class Database_Connection{
        function connect(){
            $conn = new PDO("mysql:host=localhost;dbname=unocardgame", "root", "");
            return $conn;
        }
    }
?>
