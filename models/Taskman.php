<?php

namespace app\models;

use liw\core\Application;
use liw\core\UploadFile;

class Taskman
{

    public function getTaskList()
    {

        $db = Application::$App->getConnection();
        $stmt = $db->query("select id, name, email, description, status from taskman");
        $taskList = $stmt->fetchAll(\PDO::FETCH_OBJ);

        return $taskList;
    }

    public function getTask($id)
    {

        $db = Application::$App->getConnection();
        $stmt = $db->prepare('select id, name, email, description, img, status from taskman where id=:id');
        $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetch(\PDO::FETCH_OBJ);
    }

    public function createTask($name, $email, $desc, $img = '')
    {

        $db = Application::$App->getConnection();
        $stmt = $db->prepare('INSERT INTO `taskman` (`name`, `email`, `description`, `img`, `status`) VALUES (:name,:email,:desc, :img, 0)');
        $result = $stmt->execute([
            ':name' => $name,
            ':email' => $email,
            ':desc' => $desc,
            ':img' => $img
        ]);

        return $result;
    }

    public function upadateTask($id, $name, $email, $desc, $img, $status)
    {

        $db = Application::$App->getConnection();
        $stmt = $db->prepare('update `taskman` set `name` = :name, `email` = :email, `description` = :desc, `img` = :img, `status` = :status where `id` = :id');
        $stmt->bindParam(':id', $id, \PDO::PARAM_INT);
        $stmt->bindParam(':name', $name, \PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, \PDO::PARAM_STR);
        $stmt->bindParam(':desc', $desc, \PDO::PARAM_STR);
        $stmt->bindParam(':img', $img, \PDO::PARAM_STR);
        $stmt->bindParam(':status', $status, \PDO::PARAM_INT);

        return $stmt->execute();
    }

}
