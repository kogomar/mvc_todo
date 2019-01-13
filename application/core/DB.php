<?php


class DB
{
    public static function  getConnection(){
        $params = include(APP.'/config/db_params.php');
        $dsn = "mysql:host={$params['host']};dbname={$params['dbname']}";
        $db =  new PDO($dsn, $params['user'], $params['pass']);
        return $db;
    }
}