<?php
    header("Content-type: Application/json");
    
    require 'koneksi.php';

    if($_SERVER['REQUEST_METHOD']=='POST'){

        $delete = $_POST['delete'];
        $username = $_POST['username'];

        if ($delete == "admin") {
            $query = $koneksi->query("DELETE FROM admin WHERE username = '$username'");

            if ($query) {
                http_response_code(200);
                echo json_encode(array('message' => 'success'));
            } else {                
                http_response_code(500);
                echo json_encode(array('message' => 'error'));
            }
        } else if ($delete == "author") {
            $query = $koneksi->query("DELETE FROM author WHERE username = '$username'");

            if ($query) {
                http_response_code(200);
                echo json_encode(array('message' => 'success'));
            } else {                
                http_response_code(500);
                echo json_encode(array('message' => 'error'));
            }
        } else if ($delete == "user") {
            $query = $koneksi->query("DELETE FROM user WHERE username = '$username'");

            if ($query) {
                http_response_code(200);
                echo json_encode(array('message' => 'success'));
            } else {                
                http_response_code(500);
                echo json_encode(array('message' => 'error'));
            }
        }

    }    
?>
