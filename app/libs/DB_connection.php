<?php

 class DB_connection {
    private $host;
    private $username;
    private $password;
    private $conn;
    private $dbname;

     public function __construct()
     {
         $this->host = DB_HOST;
         $this->dbname = DB_NAME;
         $this->username = DB_USERNAME;
         $this->password = DB_PASSWORD;
         try {
            $this->conn = new PDO("mysql:host={$this->host};dbname={$this->dbname}",$this->username,$this->password);

         }catch (PDOException $ex) {
             return null;
     }
     }


     /**
      * @return mixed
      */
     public function getHost()
     {
         return $this->host;
     }

     /**
      * @param mixed $host
      */
     public function setHost($host)
     {
         $this->host = $host;
     }

     /**
      * @return mixed
      */
     public function getUsername()
     {
         return $this->username;
     }

     /**
      * @param mixed $username
      */
     public function setUsername($username)
     {
         $this->username = $username;
     }

     /**
      * @return mixed
      */
     public function getPassword()
     {
         return $this->password;
     }

     /**
      * @param mixed $password
      */
     public function setPassword($password)
     {
         $this->password = $password;
     }

     /**
      * @return mixed
      */
     public function getConn()
     {
         return $this->conn;
     }

     /**
      * @param mixed $conn
      */
     public function setConn($conn)
     {
         $this->conn = $conn;
     }

     /**
      * @return mixed
      */
     public function getDbname()
     {
         return $this->dbname;
     }

     /**
      * @param mixed $dbname
      */
     public function setDbname($dbname)
     {
         $this->dbname = $dbname;
     }


}
