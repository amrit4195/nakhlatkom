<?php

class User_object{
  public $username;
  public $password;
  public $user_id;
  // constructor with $db as database connection
  public function __construct($db){
    $this->conn = $db;
  }
  // $input_username, $input_password
  // function fetch_user_data(){
  //
  //     // select all query
  //     $query = "SELECT * from User_data";
  //
  //     // prepare query statement
  //     $stmt = $this->conn->prepare($query);
  //
  //     // execute query
  //     $stmt->execute();
  //
  //     return $stmt;
  // }

  function check_user_data($input_username, $input_password){
    $salt = 'wsbaihekong';
    $input_password_salt = md5($salt. $input_password);
    $query = "SELECT * from User_data where username = '$input_username' AND password = '$input_password_salt'";
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    return $stmt;
  }
  function sign_up_check_phone($input_phone){
    $query = "SELECT phone from User_data where phone = $input_phone";
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    return $stmt;
  }
  function sign_up_create_account($input_username, $input_password, $input_phone){
    $user_salt = sha1(microtime());
    $salt = 'wsbaihekong';
    $user_id_create = md5($salt. $user_salt);
    $input_password_salt = md5($salt. $input_password);
    $query = "INSERT INTO User_data (username, password, phone, user_id) VALUES ('$input_username', '$input_password_salt', $input_phone, '$user_id_create')";
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    return $stmt;
  }
}
?>
