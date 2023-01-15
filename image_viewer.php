<?php    
    require 'koneksi.php';

    if($_SERVER['REQUEST_METHOD']=='GET'){

        // checking username if already exist

        $id_berita = $_GET['id_berita'];
        $query_checking = $koneksi->query("SELECT * FROM `berita` WHERE id_berita = '$id_berita'");

        if($query_checking->num_rows > 0) {
            $data = $query_checking->fetch_assoc();
            ?>
                <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($data['thumbnail']); ?>" class="card-img-top" alt="thumbnail <?= $data['judul'] ?>">
            <?php   ;                       
        } else {
           echo "data tidak ada";
        }
    }    
?>
