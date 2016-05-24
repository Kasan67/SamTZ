<?php

$path = $_SERVER['DOCUMENT_ROOT']."/img/";
$tmp_path = '/tmp/';
$types = array('image/gif', 'image/png', 'image/jpeg');
$size = 1024000;
$newFileName = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    // Проверяем тип файла
    if (!in_array($_FILES['image']['type'], $types))
    {
        die('Запрещённый тип файла.');
    }
    // Проверяем размер файла
    if ($_FILES['image']['size'] > $size)
    {
        die('Слишком большой размер файла.');
    }
    // Проверяем наличие email
    if(empty($_POST['name'])){
        die('Укажите Ваш email.');
    }else{
        $newFileName = $_POST['name'].".jpg";
    }


    function resize($file, $quality = null){
        global $tmp_path;

        if ($quality == null){$quality = 75;}

        $max_size_width = 320;
        $max_size_height = 240; 
        $source = null;
        if      ($file['type'] == 'image/jpeg'){
            $source = imagecreatefromjpeg($file['tmp_name']);
        }elseif ($file['type'] == 'image/png'){
            $source = imagecreatefrompng($file['tmp_name']);
        }elseif ($file['type'] == 'image/gif'){
            $source = imagecreatefromgif($file['tmp_name']);
        }

        $w_src = imagesx($source);
        $h_src = imagesy($source);
        if ($w_src > $max_size_width || $h_src > $max_size_height ){
            $ratio = $w_src/$max_size_width;
            $w_dest = round($w_src/$ratio);
            $h_dest = round($h_src/$ratio);
            if($h_dest > $max_size_height){
                $ratio = $h_dest/$max_size_height;
                $w_dest = round($w_dest/$ratio);
                $h_dest = round($h_dest/$ratio);
            }
            $dest = imagecreatetruecolor($w_dest, $h_dest);
            imagecopyresampled($dest, $source, 0, 0, 0, 0, $w_dest, $h_dest, $w_src, $h_src);
            imagejpeg($dest, $tmp_path.$file['name'], $quality);
            imagedestroy($dest);;
            imagedestroy($source);
            return $file['name'];
            
        }else{
            imagejpeg($src, $tmp_path . $file['name'], $quality);
            imagedestroy($source);
            return $file['name'];
        }
    }
    $name = resize($_FILES['image']);
    // Загрузка файла и вывод сообщения
    if (!@copy($tmp_path.$name, $path.$newFileName))
        echo '<p>Что-то пошло не так.</p>';
    else
        echo '<p>Загрузка прошла удачно <a href="' . $path . $_FILES['image']['name'] . '">Посмотреть</a>.</p>';
    // Удаляем временный файл
    unlink($tmp_path.$name);
}

