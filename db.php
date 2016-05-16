<?php 
//if(file_exists('database.ini')){
//    $db = parse_ini_file('database.ini');
//    if(!empty($db)){
//        $link = mysqli_connect($db['hosts'], $db['username'], $db['password'], $db['database']);
//        mysqli_set_charset($link, "utf8");
//        if(!$link){
//            die('Connection error');
//        }
//    }else{
//        die('empty database.ini');
//    }  
//}else{
//    die('ne naiden');
//}


class Db
{
    private $db;
    private static $_instance;
    private function __construct()
    {
        $config = parse_ini_file('database.ini');
        $this->db = new mysqli($config['hosts'], $config['username'], $config['password'], $config['database']);
    }
    public static function getInstance()
    {
        if(!self::$_instance){
            self::$_instance = new self();
            return self::$_instance;
        }else{
            return self::$_instance;
        }
    }
    
    private function __clone(){}      
    public function getConnect()
    {
        return $this->db;
    }
}

//$db = DB::getInstance();
//$db->query("select");
