<?php

namespace liw\core;

class Controller
{

    public function render($view, $param = [])
    {

        if (preg_match('~(\w+)Controller$~', get_called_class(), $matches)) {

            $folder = strtolower($matches[1]);
            $filename = ROOT . '/views/' . $folder . '/' . $view . '.php';

            if (file_exists($filename)) {

                foreach ($param as $name => $value) {
                    $$name = $value;
                }

                include $filename;
            }
        }
    }

}
