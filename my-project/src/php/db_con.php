<?php

// $username=$GET_['username'];
// $password=$GET_['password'];
// $phone=$GET_['phone'];

// private $servername = "sydneynakhlatkom.ccx7gtfezsye.ap-southeast-2.rds.amazonaws.com";
// private $username = "amrit4195";
// private $password = "amrit4195";
// private $dbname = "SydneyNakhlatkom";
//
// public function connection() {
//   // Create connection
//   $conn = new mysqli($servername, $username, $password, $dbname);
//   // Check connection
//   if ($conn->connect_error) {
//       die("Connection failed: " . $conn->connect_error);
//   }
// }
class Database{

    // specify your own database credentials
    private $host = "sydneynakhlatkom.ccx7gtfezsye.ap-southeast-2.rds.amazonaws.com";
    private $db_name = "SydneyNakhlatkom";
    private $username = "amrit4195";
    private $password = "amrit4195";
    public $conn;

    // get the database connection
    public function getConnection(){

        $this->conn = null;

        try{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->exec("set names utf8");
        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }

        return $this->conn;
    }
}

// $query = "SELECT * FROM User_data";
// $result = $conn->query($query);
// print_r($result);
// if ($result->num_rows > 0) {
//     // output data of each row
//     while($row = $result->fetch_assoc()) {
//         echo $row['username'];
//     }
// } else {
//     echo "0 results";
// }
// $conn->close();


?>
