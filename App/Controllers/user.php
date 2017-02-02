<?php

require_once "Database.php";

class User extends  DatabaseObject{

    protected static $table_name = "user";
    public $id;
    public $user_name;
    public $first_name;
    public $last_name;
    public $password;


    public static function find_all()
    {
        global  $dbh;

        return $dbh->query("SELECT * FROM  user") ;
    }

    public static function find_by_id($id = 0)
    {
        global  $dbh;

        $stmt = $dbh->prepare("SELECT * FROM user WHERE id = :id LIMIT 1");

        $stmt->bindParam('id', $id, PDO::PARAM_INT);

        $stmt->execute();

        $result = $stmt->fetchObject('User');

        return (empty($result))? 'false' : $result;
    }

    public  function call_full_name()
    {
        return $this->first_name . $this->last_name;
    }

    public static function authenticate($user_name = "", $password = ""){

        global  $dbh;

        $query = "SELECT * FROM user WHERE email = :email AND password = :password LIMIT 1";

        $stmt = $dbh->prepare($query);

        $stmt->execute(['email' => $user_name, 'password' => $password]);

        $user = $stmt->fetchObject();

        return (empty($user))? 'false' : $user;
    }

    public static  function user_name_exists($user_name){

        global  $dbh;

        $query = "SELECT * FROM user WHERE email = :email LIMIT 1";

        $stmt = $dbh->prepare($query);

        $stmt->execute(['email' => $user_name]);

        $user = $stmt->fetchObject();

        return  ($stmt->rowCount() == 1)? $user : false;
    }



}