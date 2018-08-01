<?php

namespace app\controllers;

use liw\core\Controller;
use liw\core\Validator;
use liw\core\Uploads;
use app\models\Taskman;

class SiteController extends Controller
{

    public function actionIndex()
    {
        $taskman = new Taskman();
        $taskList = $taskman->getTaskList();

        return $this->render('index', [
                    'taskList' => $taskList]);
    }

    public function actionViews($id = null)
    {
        $taskman = new Taskman();

        if ($id = 1) {
            $task = $taskman->getTask(1);
        }

        return $this->render('views', [
                    'task' => $task]);
    }

    public function actionCreate()
    {
        $taskman = new Taskman();
        $validation = new Validator();

        $error = [];
        $error_file = [];

        $name = $_POST['name'];
        $email = $_POST['email'];
        $desc = $_POST['description'];

        if (!empty($name) && !empty($email) && !empty(description)) {
            if ($validation->validation(array($name => 'name', $email => 'email', $desc => 'description'))) {
                if ($_FILES['image']['name'] != '') {
                    $upload = new Uploads($_FILES['image']);
                    $error_file = $upload->upload();
                    $img = $upload->filename;
                } else {
                    $img = '';
                }
                $res = $taskman->createTask($name, $email, $desc, $img);
            } else {
                $error = $validation->message;
            }
            $error = array_merge($error, $error_file);
        }

        return $this->render('create', ['error' => $error,
                    'result' => $res]);
    }

    public function actionUpdate($id = null)
    {
        $taskman = new Taskman();
        $validation = new Validator();
 
        
        $error = [];
        $error_file = [];

        $name = $_POST['name'];
        $email = $_POST['email'];
        $desc = $_POST['description'];
        $status = $_POST['status'];

        if (!empty($name) && !empty($email) && !empty(description)) {
            if ($validation->validation(array($name => 'name', $email => 'email', $desc => 'description'))) {
                if ($_FILES['image']['name'] != '') {
                    $upload = new Uploads($_FILES['image']);
                    $error_file = $upload->upload();
                    $img = $upload->filename;
                }else{
                    $task = $taskman->getTask($id);
                    $img = $task->img;
                }
                $res = $taskman->upadateTask($id, $name, $email, $desc, $img, $status);
            } else {
                $error = $validation->message;
            }
            $error = array_merge($error, $error_file);
        }
            
        if ((int) $id) {
            $task = $taskman->getTask($id);
        }
        
        
        return $this->render('update', ['error' => $error,
                    'result' => $res,
                    'task' => $task]);
    }

}
