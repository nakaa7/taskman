<?php

namespace liw\core;

use liw\core\Db;
use liw\core\Router;

class Application {
    
    private $config = [];
    
    public function __construct($config)
    {
        $this->config = $config;
    }
    
    public function run(){
        Router::getRules($this->config['urlManager']);
        //$db = Db::getConnection();
    }
}