<?php 
    include '../../../database/koneksi.php';

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        if (isset($_GET['plat_nomor'])) {
            //query SQL
            $plat_nomor = $_GET['plat_nomor'];
            $sql_delete = "DELETE FROM tb_kendaraan WHERE plat_nomor = '$plat_nomor'"; 

            //eksekusi query
            $query = mysqli_query($konek,$sql_delete);

            if ($query) {
                echo "<script type='text/javascript'>alert('Berhasil')</script>";
            }  
        }  
    }
    header('location:../kendaraan.php');
    
?>