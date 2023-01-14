<?php
    header("Content-type: Application/json");
    
    require 'koneksi.php';

    if($_SERVER['REQUEST_METHOD']=='POST'){

        $username = $_POST['username'];
        $password = $_POST['password'];
        $nickname = $_POST['nickname'];

        // checking username if already exist

        $query_checking = $koneksi->query("SELECT * FROM author WHERE username = '$username'");

        if($query_checking->num_rows > 0) {
            http_response_code(409);
            echo json_encode(array('message' => 'author already exist'));
        } else {
            $query = $koneksi->query("INSERT INTO `author` (`username`, `password`, `nickname`) VALUES ('$username','$password','$nickname')");
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
