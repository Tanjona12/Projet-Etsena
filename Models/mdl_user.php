<?php
    class Mdl_user {

    static function  get_data($email, $password)
    {
        $pdo = db_connect();
        $q = "SELECT * FROM user WHERE email='".$email."' AND password ='".$password."'";
        $modules = $pdo->query($q)->fetchAll();

        return $modules;
    }

    public function __construct()
    {
        
    }
    }



?>