<?php
    header("Content-type: Application/json");
    
    require 'koneksi.php';

    if($_SERVER['REQUEST_METHOD']=='POST'){

        $id_berita = $_POST['id_berita'];
        $judul = $_POST['judul'];
        $isi = $_POST['isi'];
        $image = addslashes(file_get_contents($_FILES['img_thumbnail']['tmp_name']));
        $update_at = date("Y-m-d h:i");

        // checking username if already exist

        $query = $koneksi->query("UPDATE berita SET judul = '$judul', isi = '$isi', update_at = '$update_at', thumbnail = '$image' WHERE id_berita = '$id_berita'");

        if($koneksi->affected_rows > 0) {
            http_response_code(200);
                echo json_encode(array('message' => 'success'));
        } else {    
            http_response_code(500);
            echo json_encode(array('message' => $koneksi->error));
        }
    }    
?>
