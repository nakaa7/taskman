<?php

namespace liw\core;

class Db
{
    
    private $config;
    
    public function __construct($config){
        $this->config = $config;
    }
    
    public function getConnection()
    {
        try{
            $dsn = "mysql:host={$this->config['host']};dbname={$this->config['dbname']}";
            $db = new \PDO($dsn, $this->config['user'], $this->config['password']);
            $db->exec('set names utf8');

            return $db;
        } catch (\PDOException $e){
            exit("Ошибка при подключении к базе данных: <br>" . $e->getMessage() . "<hr>");
        }
        
       
    }   
}
