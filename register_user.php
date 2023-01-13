<?php
    require 'koneksi.php';

    if($_SERVER['REQUEST_METHOD']=='POST'){

        $username = $_POST['username'];
        $password = $_POST['password'];

        $dateNow = date("Y-m-d h:i:s");

        $query = $koneksi->query("INSERT INTO `user` (`username`, `password`, `create_on`) VALUES ('$username','$password','$dateNow')");

        if ($query) {
            http_response_code(200);
            header("Content-type: Application/json");
            echo json_encode(array('message' => 'success'));
        } else {
            http_response_code(500);
            echo json_encode(array('message' => $koneksi->error));
        }
    }    
?>
