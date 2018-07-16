<?php

namespace liw\core;

class Uploads
{

    public $filename;
    public $fileInfo;
    public $path = '/web/img/';
    public $type = ['image/gif', 'image/png', 'image/jpeg'];

    public function __construct($fileInfo)
    {
        $this->fileInfo = $fileInfo;
    }

    public function transformation()
    {
        
    }

    public function upload()
    {
        $error = [];
        $file = getimagesize($this->fileInfo['tmp_name']);

        if (!in_array($file['mime'], $this->type)) {
            $error[] = "Запрещенный тип файла!";
        }

        if ($this->fileInfo["size"] > 1024 * 3 * 1024) {
            $error[] = "Размер файла превышает три мегабайта";
        }

        if (($file[0] > 320 || $file[1] > 240) && count($error) == 0) {
            $old_filename = $this->fileInfo['tmp_name'];
            if ($file['mime'] == 'image/png') {
                $image_p = imagecreatefrompng($old_filename); //создаём новое изображение из файла
            } else if ($file['mime'] == 'image/jpeg') {
                $image_p = imagecreatefromjpeg($old_filename);
            } else if ($file['mime'] == 'image/gif') {
                $image_p = imagecreatefromgif($old_filename);
            } else {
                return false;
            }
            $image = imagecreatetruecolor(320, 240);

            imagecopyresampled($image, $image_p, 0, 0, 0, 0, 320, 240, $file[0], $file[1]);

            $old_pach_filename = ROOT . $this->path . $this->fileInfo["name"];
            $pre_name = strtotime(date("Y-m-d H:i:s")) . '-' . $this->fileInfo["name"];
            $filename_new = ROOT . $this->path . $pre_name;
            $this->filename = $this->path . $pre_name;
            imagepng($image, $old_pach_filename);
            rename( $old_pach_filename, $filename_new);
        }
        return $error;
    }

}
