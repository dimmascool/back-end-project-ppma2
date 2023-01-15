<?php
    header("Content-type: Application/json");
    
    require 'koneksi.php';

    if($_SERVER['REQUEST_METHOD']=='POST'){

        $username = $_POST['username'];
        $password = $_POST['password'];

        // checking username if already exist

        $query_checking = $koneksi->query("SELECT * FROM user WHERE username = '$username' AND password = '$password'");

        if($query_checking->num_rows > 0) {
            $data_user= $query_checking->fetch_assoc();
            http_response_code(200);
            echo json_encode(array('message' => 'login success', 'data_admin' => ['user_id' => $data_user['id_user']]));
        } else {
            http_response_code(401);
            echo json_encode(array('message' => 'wrong username or password'));
            
        }
    }    
?>
