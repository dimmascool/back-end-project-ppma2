<?php
    header("Content-type: Application/json");
    
    require 'koneksi.php';

    if($_SERVER['REQUEST_METHOD']=='GET'){

        // checking username if already exist

        $query_checking = $koneksi->query("SELECT * FROM admin");

        if($query_checking->num_rows > 0) {
            $data_list = array();
            foreach ($query_checking as $data) {
                array_push($data_list, array(
                    'admin_id'  => $data['admin_id'],
                    'username'  => $data['username'],
                    'password'  => $data['password']                   
                ));
            }

            echo json_encode(array('data_admin' => $data_list));

        } else {
            http_response_code(404);
            echo json_encode(array('message' => 'data not found'));
            
        }
    }    
?>
