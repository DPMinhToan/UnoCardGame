<?php
    class UnoUser{
        public $id;
        public $username;
        public $password;
        public $name;

        public function __construct(){
            
        }

        public function object_from_JSON($data){
            $this->id = $data['id'];
            $this->username = $data['username'];
            $this->name = $data['name'];
        }
        
    }
?>