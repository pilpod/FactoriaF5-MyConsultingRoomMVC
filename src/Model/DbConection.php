<?php

namespace App\Model;

use PDO;
use PDOException;

class DbConection {

   public $mysql;

   public function __construct()
   {
       try {
           $this->mysql = $this->getConection();
       } catch (PDOException $ex){
           echo $ex->getMessage();
       }
   }

   private function getConection()
   {
        $data = file_get_contents("src/Model/DataConect.json");
        $data = json_decode($data, true);

       $host = $data['myapp']['master']['hosts'];
       $user = $data['myapp']['master']['user'];
       $pass = $data['myapp']['master']['password'];
       $dbname = $data['myapp']['master']['dbname'];
       $charset = "utf8";
       $options = [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC];
       $pdo = new PDO("mysql:host={$host};dbname={$dbname};charset={$charset}", $user, $pass, $options);
       $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

       return $pdo;
   }

}
?>