<?php

require_once "Database.php";

class Post
{

    public static function find_all($flag = false)
    {
        global $dbh;

        if($flag){

            $result = $dbh->query("SELECT * FROM  ads");

        }else{

        $result = $dbh->query("SELECT * FROM  ads WHERE  status = 1");
        }

        $result = $result->fetchAll(PDO::FETCH_OBJ);

        return (empty($result)) ? null : $result;
    }

    public static function find_by_id($id = 0)
    {
        global $dbh;

        $stmt = $dbh->prepare("SELECT * FROM ads WHERE id = :id LIMIT 1");

        $stmt->bindParam('id', $id, PDO::PARAM_INT);

        $stmt->execute();

        $result = $stmt->fetchObject();


        return (count($result) > 0) ? $result : null;
    }


    public static function search_post($search_value)
    {
        global $dbh;

        $stmt = $dbh->prepare("SELECT * FROM ads WHERE tags LIKE :search_value || category LIKE :search_value AND status = 1");

        $stmt->execute(['search_value' => "%" . $search_value . "%"]);
  
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);

        return (empty($result)) ? null : $result;

    }

    public static function find_by_category($category)
    {
        global $dbh;

        $stmt = $dbh->prepare("SELECT * FROM ads WHERE category = :category AND status = 1");

        $stmt->execute(['category' => $category]);

        $result = $stmt->fetchAll(PDO::FETCH_OBJ);

        return (empty($result)) ? null : $result;
    }


    public static function find_by_tag($tag)
    {
        global $dbh;

        $stmt = $dbh->prepare("SELECT * FROM ads WHERE tags LIKE :tag AND status = 1");

        $stmt->execute(['tag' => "%" . $tag . "%"]);

        $result = $stmt->fetchAll(PDO::FETCH_OBJ);

        return (empty($result)) ? null : $result;
    }


    public static function find_approved_posts()
    {

        global $dbh;

        $results = $dbh->query("SELECT * FROM ads WHERE status = 1");

        $result = $results->fetchAll(PDO::FETCH_OBJ);

        return (empty($result)) ? null : $result;
    }


    public static function find_rejected_posts()
    {

        global $dbh;

        $results = $dbh->query("SELECT * FROM ads WHERE status = 2");

        $result = $results->fetchAll(PDO::FETCH_OBJ);


        return (empty($result)) ? null : $result;
    }


    public static function find_pending_posts()
    {

        global $dbh;

        $results = $dbh->query("SELECT * FROM ads WHERE status = 0");

        $result = $results->fetchAll(PDO::FETCH_OBJ);


        return (empty($result)) ? null : $result;
    }

    public static function count_posts($type)
    {
        global $dbh;


        if ($type == 'pending') {

            $status = 0;

        } elseif ($type == 'approved') {

            $status = 1;

        } elseif ($type == 'rejected') {

            $status = 2;

        }

        if ($type == 'all') {

            $stmt = $dbh->query("SELECT COUNT(*) AS count FROM ads");

        } else {

            $stmt = $dbh->prepare("SELECT COUNT(*) AS count FROM ads WHERE status = :status");
            $stmt->execute(['status' => $status]);
        }


        $count = $stmt->fetchObject();

        return $count->count;

    }


    public static  function find_by_sql($sql)
    {
        global  $dbh;

         $result = $dbh->query($sql)->fetchAll(PDO::FETCH_OBJ);

        return (empty($result))?  null : $result;

    }


}