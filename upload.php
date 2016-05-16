<?php
//if($_POST['submit']){
//    $name = $_FILES['upload']['myfile'];
//    $temp = $_FILES['upload']['tmp_name'];
//    $type = $_FILES['upload']['type'];
//    $size = $_FILES['upload']['size'];
//
//}
//var_dump($_FILES);
//var_dump($_POST);
//echo " $name <br> $temp <br> $type <br> $size ";
//







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