<?php

namespace liw\core;

class Validator
{

    public $message = [];

    public function validation($param = [])
    {

        $flag = true;
        foreach ($param as $value => $valid) {
            $methodValidation = 'validation' . ucfirst($valid);
            if (method_exists($this, $methodValidation)) {
                if (!call_user_func_array(array($this, $methodValidation), array($value))) {
                    $flag = false;
                }
            }
        }

        return $flag;
    }

    private function validationName($name)
    {

        if (preg_match("/^[А-ЯЁA-Z]{1}[a-zа-яё]{2,30}$/u", $name)) {
            return true;
        } else {
            $this->message[] = "Имя должно начинать с заглавной буквы, содержать от 3 до 30 символов и содержать только буквы.";
            return false;
        }
    }

    private function validationEmail($email)
    {

        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        } else {
            $this->message[] = "Email должен быть вида <b>name@domen.com</b>";
            return false;
        }
    }

    private function validationDescription($desc)
    {

        if (preg_match("/(матное слово 1)(матное слово 2)(матное слово 3)/", $desc)) {
            $this->message[] = "Описание содержит не цензурную лексику";
            return false;
        } elseif (empty(trim($desc))) {
            $this->message[] = "Описание обязательно должно быть заполнено!";
            return false;
        } else {
            return true;
        }
    }

}
