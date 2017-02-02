<?php

require_once "Database.php";


class Message{


    protected static $table_name = "contact_us";

    
    public static function find_all()
    {
        global  $dbh;

        return $dbh->query("SELECT * FROM  contact_us") ;
    }

    public static function find_by_id($id = 0)
    {
        global  $dbh;

        $stmt = $dbh->prepare("SELECT * FROM contact_us WHERE id = :id LIMIT 1");

        $stmt->bindParam('id', $id, PDO::PARAM_INT);

        $stmt->execute();

        $result = $stmt->fetchObject('User');



        return (empty($result))? 'false' : $result;
    }

    public static  function find_by_sql($sql)
    {
        global  $dbh;

        $result = $dbh->query($sql)->fetchAll(PDO::FETCH_OBJ);

        return (empty($result))?  null : $result;

    }

    public static function count_all($type = 'all')
    {
        global $dbh;

        if($type === 'unread'){

            $stmt = $dbh->query("SELECT COUNT(*) AS count FROM contact_us WHERE  status = 0");
        }else{

            $stmt = $dbh->query("SELECT COUNT(*) AS count FROM contact_us");
        }

//            $stmt = $dbh->prepare("SELECT COUNT(*) AS count FROM ads WHERE status = :status");
//            $stmt->execute(['status' => $status]);

        $count = $stmt->fetchObject();

        return $count->count;

    }

}