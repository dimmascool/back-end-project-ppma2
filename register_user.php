<?php
    header("Content-type: Application/json");
    
    require 'koneksi.php';

    if($_SERVER['REQUEST_METHOD']=='POST'){

        $username = $_POST['username'];
        $password = $_POST['password'];
        $dateNow = date("Y-m-d h:i:s");

        // checking username if already exist

        $query_checking = $koneksi->query("SELECT * FROM user WHERE username = '$username'");

        if($query_checking->num_rows > 0) {
            http_response_code(409);
            echo json_encode(array('message' => 'username already exist'));
        } else {
            $query = $koneksi->query("INSERT INTO `user` (`username`, `password`, `create_on`) VALUES ('$username','$password','$dateNow')");
            if ($query) {
                http_response_code(200);
                echo json_encode(array('message' => 'success'));
            } else {
                http_response_code(500);
                echo json_encode(array('message' => $koneksi->error));
            } 
        }
    }    
?>
