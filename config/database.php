
<?php

class Database {
    public $statement;
    public $dbHandler;
    public $error;

    public function __construct($db_host,$db_user,$db_pass,$db_name) {
        try {
            $this->dbHandler = new PDO('mysql:host='.$db_host.';dbname='.$db_name.'', $db_user, $db_pass, array(PDO:: MYSQL_ATTR_INIT_COMMAND=> 'SET NAMES utf8', ));
            $this->dbHandler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            die("<br>".$e->getMessage());
            exit;
        }
    }
    
    public function query($sql) {
        try {
            $this->statement = $this->dbHandler->prepare($sql);
        } catch (PDOException $e) {
            die($e->getMessage());
            exit;
        }
    }
    
    public function bind($param, $value, $type = null){
        if(is_null($type)){
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                
                case is_bool($value):
                    $type = PDO::PARAM_BOLL;
                    break;

                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;

                default:
                    $type = PDO::PARAM_STR;
            }
        }
        $this->statement->bindValue($param, $value, $type);
    }
    
    public function execute(){
        try {
            $this->statement->execute();
        } catch (PDOException $e) {
            die($e->getMessage());
            exit;
        }
    }
    
    public function resultSet(){
        $this->execute();
        return $this->statement->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function resultSingle(){
        $this->execute();
        return $this->statement->fetch(PDO::FETCH_ASSOC);
    }
    
    public function rowCount(){
        $this->execute();
        return $this->statement->rowCount();
    }

    public function rowCount_clear(){
        return $this->statement->rowCount();
    }

    public function get_fetch($select, $table, $search, $value){
        $this->query("SELECT $table FROM {$select} WHERE $search = '{$value}'");
        return $this->resultSingle()[$table];
    }
}

//onnect to databases
$con = new Database($db_host,$db_user,$db_pass,$db_name);