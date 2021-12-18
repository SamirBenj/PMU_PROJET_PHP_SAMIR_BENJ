<?php
session_start();
class Db {

    public $dbCon =null;

    public function connection(){
        try {
        
        return $this->dbCon = new PDO('mysql:host=localhost;dbname=PROJET_PHP','root','root');
               echo "working";
        }
        catch(PDOException $e){
            echo "not working";
            exit("Error: " . $e->getMessage());
        }
    }

}

?>