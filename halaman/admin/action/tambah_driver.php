<?php 
    include '../../../database/koneksi.php';

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $nama_driver = $_POST['nama_driver'];
        $id_driver = $_POST['id_driver'];
        $alamat = $_POST['alamat'];
        $no_hp = $_POST['no_hp'];
        $no_ktp = $_POST['no_ktp'];

        $sql_insert = "INSERT INTO tb_driver (nama_driver, id_driver, alamat, no_hp, no_ktp) VALUES ('$nama_driver', '$id_driver', '$alamat', '$no_hp', '$no_ktp')";
        
        $query = mysqli_query($konek, $sql_insert) or die (mysqli_error($konek));

        if($query){
            echo "<script type='text/javascript'>alert('Berhasil')</script>";
        }
        header("location:../driver.php");
    }

    //header("location:../driver.php");
?>