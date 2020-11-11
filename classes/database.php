<?php

class Database {
  private $severName = "localhost";
  private $username = "root";
  private $password = "root";
  private $dbName = "the_company";
  protected $conn;

  public function __construct(){
    $this->conn = new mysqli($this->severName, $this->username,$this->password, $this->dbName);

    if($this->conn->connect_error){
      die("Unable to connect to database".$this->dbName. ": " .$this->conn->connect_error);
    }
  }
  
}