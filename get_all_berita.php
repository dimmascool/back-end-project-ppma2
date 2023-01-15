<?php
    header("Content-type: Application/json");
    
    require 'koneksi.php';

    if($_SERVER['REQUEST_METHOD']=='GET'){

        // checking username if already exist

        $query_checking = $koneksi->query("SELECT * FROM `berita`");

        if($query_checking->num_rows > 0) {
            $data_list = array();
            foreach ($query_checking as $data) {
                array_push($data_list, array(
                    'id_berita'             => $data['id_berita'],
                    'url_thumbnail'        => 'http://localhost/back-end-project-ppma2/image_viewer.php?id_berita='. $data['id_berita'], 
                    'judul'                 => $data['judul'],
                    'isi'                   => $data['isi'],
                    'kategori'              => $data['kategori'],
                    'tag'                   => $data['tag'],
                    'tanggal_dibuat'        => $data['create_at'],
                    'tanggal_diupdate'      => $data['update_at']
                ));
            }
            http_response_code(200);
            echo json_encode(array('data_berita' => $data_list));
        } else {
            http_response_code(404);
            echo json_encode(array('message' => 'data not found'));
            
        }
    }    
?>
