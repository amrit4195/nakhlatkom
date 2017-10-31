<?php
// / required headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
// header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

header("Content-Type: application/json; charset=UTF-8");

// include database and object files
include_once 'db_con.php';
include_once 'user_object.php';

// instantiate database and product object
$database = new Database();
$db = $database->getConnection();

// get data here
$input_username=$_GET['input_username'];
$input_password=$_GET['input_password'];
// var_dump(isset($input_username))
// var_dump(isset($input_password))

// initialize object
$user_data = new User_object($db);

// query products
$stmt = $user_data->check_user_data($input_username,$input_password);
$num = $stmt->rowCount();


// check if more than 0 record found
if($num>0){
    // print_r($input_username);
    // products array
    $user_data_arr=array();
    $user_data_arr["records"]=array();

    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);

        $user_data_item=array(
            // "username" => $username,
            // "password" => $password,
            "userid" => $user_id
        );

        array_push($user_data_arr["records"], $user_data_item);
    }

    echo json_encode($user_data_arr);
}

else{
  // $salt = 'wsbaihekong';
  // $input_password_salt = md5($salt. $input_password);
    echo json_encode(
        array("message" => "NF")
    );
}

?>
