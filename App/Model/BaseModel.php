<?php

namespace App\Model;

abstract class BaseModel
{
    protected static $query = '';
    protected static $query_data;
    protected static $data;
    protected static $stmt;
    protected static $dbh;

    protected abstract static function openConnection();

    protected abstract static function processForm($data, $action);

    protected abstract static function update($data);

    protected abstract static function save($data);

    protected abstract static function delete($id);

    protected abstract static function findAll();

    protected abstract static function findById($id);

}