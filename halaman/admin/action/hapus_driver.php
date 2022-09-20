<?php 
    include '../../../database/koneksi.php';

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        if (isset($_GET['id_driver'])) {
            //query SQL
            $id_driver = $_GET['id_driver'];
            $sql_delete = "DELETE FROM tb_driver WHERE id_driver = '$id_driver'"; 

            //eksekusi query
            $query = mysqli_query($konek,$sql_delete);

            if ($query) {
                echo "<script type='text/javascript'>alert('Berhasil')</script>";
                header('location:../driver.php');
            }  
        }  
    }
    //header('location:../driver.php');
    
?>