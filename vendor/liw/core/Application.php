<?php

namespace liw\core;

use liw\core\Router;
use liw\core\Db;

class Application
{
    public static $App;
    
    private $config = [];
    
    public function __construct($config)
    {
        $this->config = $config;
    }

    public function run()
    {
        self::$App = new Db($this->config['db']);
        (new Router)->getRules($this->config['urlManager']);
    }

}
