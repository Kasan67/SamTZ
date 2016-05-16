<?php
include_once "db.php";
$db = db::getInstance();
$link = $db->getConnect();
$userName = addslashes($_POST['userName']);
$email = addslashes($_POST['email']);
$url = addslashes($_POST['url']);
$text = addslashes($_POST['text']);

$sql = "SELECT * from guestBook where email='".$email."'";
$sqlInsert = "INSERT INTO guestBook (userName, email, url, text) VALUE ('$userName', '$email', '$url', '$text')";
$result = $link->query($sql);
$row = mysqli_fetch_all($result, MYSQLI_ASSOC);
if(isset($row[0]['email'])){
    echo "<div class=\"alert alert-info\">Вы уже оставляли сообщение на данном портале.</div>";
}else{
    if(!empty($_POST['userName']) && !empty($_POST['text'])){
        $result = $link->query($sqlInsert);
    echo "<div class=\"alert alert-success\">Ваш пост будет доступен после обновления.</div>";
    }else{
        echo "<div class=\"alert alert-info\">Заполните обязательные поля.</div>";
    }
}

//отключить теги в полях