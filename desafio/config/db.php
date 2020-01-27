<?php

class Database{
    
   public static function connect(){
       $db = new PDO('mysql:host=localhost; dbname=desafio', "root", "");
      /*  $db->query('SET NAME "utf8"'); */
       return $db;
    
   }
    
}
