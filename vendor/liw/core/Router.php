<?php

namespace liw\core;

class Router
{

    private function getUri()
    {
        if (!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }

    public function getRules($routes)
    {
        $uri = $this->getUri();
        
        foreach ($routes as $type => $uriPattern) {
            if (preg_match("~$uriPattern~", $uri, $internalRoute)) {
                
                $segments = preg_split("~[\/\?]+~", $internalRoute[0]); 

                $controllerName = (empty($segments[0]) ? 'site' : array_shift($segments)) . 'Controller';
                
                $controllerName = 'app\\controllers\\' . \ucfirst($controllerName);

                $actionName = 'action' . (count($segments) > 0 && !empty($segments[0]) ? ucfirst(array_shift($segments)) : 'Index');

                if (method_exists($controllerName, $actionName)) {
                    $controllerObject = new $controllerName;

                    $result = call_user_func_array(array($controllerObject, $actionName), $segments);

                } else {
                    die("404. Страница не найдена!");
                }

                if ($result == false) {
                    break;
                }
            }else{
                die("404. Страница не найдена!");
            }
        }
    }

}
