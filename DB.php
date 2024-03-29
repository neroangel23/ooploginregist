<?php
class DB{
    private static $_instance = null;
    private $_pdo, 
            $_query, 
            $_error=false, 
            $_results, 
            $_count = 0;
    private function __construct(){
        try{
            $this->pdo =new PDO('mysql:host='. Config::get('mysql/host') . ';dbname=' .Config::get('mysql/db'), Config::get('mysql/username'), Config::get('mysql/password'));
            echo 'Connected';
        } catch(PDOExeption $e){
            die($e->getMessage());
        }
    }
    public static function getInstance(){
        if(!isset(self::$_instance)){
            self::$_instance = new DB();
        }
        return self::$_instance;
    } 
    public function query($sql, $params = array()){
        $this->_error = false;
        if($this->_query = $this->_pdo->prepare($sql)){
            echo 'Success';
        }
    }

}
?>