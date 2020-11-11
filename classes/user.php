<?php
//require - if file is not found, error
//include_once - do not insert anymore if previously included
//require_once - do not insert anymore if previously required

require_once "database.php";

class User extends Database{
  public function createUser($firstName,$lastName,$username,$password){
    $sql = "INSERT INTO users (first_name, last_name, username, `password`) VALUES ('$firstName', '$lastName', '$username', '$password')";  

    if($this->conn->query($sql)){
      header("location: ../views");
      exit;
    } else{
      die ("Error creating user: " .$this->conn->error);
    }
  }

  public function login($username,$password){
    $error = "The username or password you entered is incorrect.";

    $sql = "SELECT * FROM users WHERE username = '$username' ";

    $result = $this->conn->query($sql);
    if($result->num_rows == 1){
      $userDetails = $result->fetch_assoc();
      //datas in the database
      if(password_verify($password,$userDetails['password'])){
        session_start();

        $_SESSION['id'] = $userDetails['id'];
        $_SESSION['username'] = $userDetails['username'];

        header("location: ../views/dashboard.php");
        exit;
      } else{
        echo $error;
      }
    } else{
      echo $error;
    }
  }

  public function getUsers(){
    $sql = "SELECT * FROM users";

    if($result = $this->conn->query($sql)){
      return $result;
    } else{
      die ("Error retrieving users: " .$this->conn->error);
    }
  }

  public function getUser($id){
    $sql = "SELECT * FROM users WHERE id = $id";

    if($result = $this->conn->query($sql)){
      return $result->fetch_assoc();
    } else{
      die("Error retrieving user:" .$this->conn->error);
    }
  }

  public function updateUser($userID, $firstName, $lastName,$username){
    $sql = "UPDATE users SET first_name = '$firstName', last_name = '$lastName', username = '$username' WHERE id = $userID";

    if($result = $this->conn->query($sql)){
      header("location: ../views/dashboard.php");
    } else{
      die ("Error editing user: " .$this->conn->error);
    }
  }

  public function deleteUser($userID){
    $sql = "DELETE FROM users WHERE id = $userID";

    if($this->conn->query($sql)){
      header("location: ../views/dashboard.php");
      exit;
    } else{
      die("Error deleting the user: " .$this->conn->error);
    }
  }

}