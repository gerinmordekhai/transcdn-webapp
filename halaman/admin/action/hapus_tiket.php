<?php 
    include '../../../database/koneksi.php';

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        if (isset($_GET['id_tiket'])) {
            //query SQL
            $id_tiket = $_GET['id_tiket'];
            $sql_delete = "DELETE FROM tb_tiket WHERE id_tiket = '$id_tiket'"; 

            //eksekusi query
            $query = mysqli_query($konek,$sql_delete);

            if ($query) {
                echo "<script type='text/javascript'>alert('Berhasil')</script>";
                header('location:../tambahTiket.php');
            }  
        }  
    }
    //header('location:../driver.php');
    
?>