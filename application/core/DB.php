<?php


class DB
{
    public static function  getConnection(){
        $params = include(APP.'/config/db_params.php');

        $db = new PDO($params['host'], $params['dbname'],  $params['user'], $params['pass']);
        return $db;
    }
}