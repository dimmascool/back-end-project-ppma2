<?php
    header("Content-type: Application/json");
    
    require 'koneksi.php';

    if($_SERVER['REQUEST_METHOD']=='POST'){

        $judul = $_POST['judul'];
        $isi = $_POST['isi'];
        $author_id = $_POST['author_id'];
        $image = addslashes(file_get_contents($_FILES['img_thumbnail']['tmp_name']));
        $create_at = date("Y-m-d h:i");
        $update_at = "";
        $kategori = $_POST['kategori'];
        $tag = $_POST['tag'];

        var_dump($_FILES);

        $query_add = $koneksi->query("INSERT INTO `berita` ( `judul`, `isi`, `create_at`, `update_at`, `author_id`, `kategori`, `tag`, `thumbnail`) VALUES ('$judul','$isi','$create_at','$update_at','$author_id','$kategori','$tag','$image')");

        if($query_add) {
            http_response_code(200);
            echo json_encode(['message'=>'success']);
        } else {
            http_response_code(500);
            echo json_encode(['message'=>$koneksi->error]);
        }
    }    
?>
