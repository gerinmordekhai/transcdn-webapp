<?php 
    include '../../../database/koneksi.php';

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $kelas_tiket = $_POST['kelas_tiket'];
        $asal_tiket = $_POST['asal_tiket'];
        $tujuan_tiket = $_POST['tujuan_tiket'];
        $tanggal_tiket = $_POST['tanggal_tiket'];
        $waktu_tiket = $_POST['waktu_tiket'];
        $slot_kursi = $_POST['slot_kursi'];
        $harga_tiket = $_POST['harga_tiket'];

        $sql_insert = "INSERT INTO tb_tiket (kelas_tiket, asal_tiket, tujuan_tiket, tanggal_tiket, waktu_tiket, slot_kursi, harga_tiket) VALUES ('$kelas_tiket', '$asal_tiket', '$tujuan_tiket', '$tanggal_tiket', '$waktu_tiket', '$slot_kursi', '$harga_tiket')";
        
        $query = mysqli_query($konek, $sql_insert) or die (mysqli_error($konek));

        if($query){
            echo "<script type='text/javascript'>alert('Berhasil')</script>";
        }
        header("location:../tambahTiket.php");
    }

    //header("location:../driver.php");
?>