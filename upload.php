<?php
if($_POST['submit']){
    $name = $_FILES['upload']['myfile'];
    $temp = $_FILES['upload']['tmp_name'];
    $type = $_FILES['upload']['type'];
    $size = $_FILES['upload']['size'];

}

echo "$name <hr> $temp <hr> $type <hr> $size";
$targetDir = $_SERVER['DOCUMENT_ROOT'];
if(is_array($_FILES)) 
{
    if(is_uploaded_file($_FILES['myfile']['tmp_name'])) 
    {
        if(move_uploaded_file($_FILES['myfile']['tmp_name'],"$targetDir/".$_FILES['myfile']['name']))
        {
            echo "File uploaded successfully";
        }
    }
}






////// Проверяем пришел ли файл
//if( !empty( $_FILES['image']['name'] ) ) {
//  // Проверяем, что при загрузке не произошло ошибок
//  if ( $_FILES['image']['error'] == 0 ) {
//    // Если файл загружен успешно, то проверяем - графический ли он
//    if( substr($_FILES['image']['type'], 0, 5)=='image' ) {
//      // Читаем содержимое файла
//      $image = file_get_contents( $_FILES['image']['tmp_name'] );
//      // Экранируем специальные символы в содержимом файла
//      $image = mysql_escape_string( $image );
//      // Формируем запрос на добавление файла в базу данных
//      $query="INSERT INTO `images` VALUES(NULL, '".$image."')";
//      // После чего остается только выполнить данный запрос к базе данных
//      mysql_query( $query );
//    }
//  }
//}