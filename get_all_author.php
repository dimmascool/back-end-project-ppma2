<?php
    header("Content-type: Application/json");
    
    require 'koneksi.php';

    if($_SERVER['REQUEST_METHOD']=='GET'){

        // checking username if already exist

        $query_checking = $koneksi->query("SELECT * FROM author");

        if($query_checking->num_rows > 0) {
            $data_list = array();
            foreach ($query_checking as $data) {
                array_push($data_list, array(
                    'author_id'  => $data['id'],
                    'username'  => $data['username'],
                    'password'  => $data['password'],
                    'nickname'  => $data['nickname']                   
                ));
            }
            echo json_encode(array('data_author' => $data_list));
        } else {
            http_response_code(404);
            echo json_encode(array('message' => 'data not found'));
            
        }
    }    
?>
