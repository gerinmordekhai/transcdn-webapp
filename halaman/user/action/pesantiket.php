<?php 
    include '../../../database/koneksi.php';

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $id_tiket = $_POST['id_tiket'];
        $asal_tiket = $_POST['asal_tiket'];
        $tujuan_tiket = $_POST['tujuan_tiket'];
        $tanggal_tiket = $_POST['tanggal_tiket'];
        $tujuan_tiket = $_POST['tujuan_tiket'];
        $waktu_tiket = $_POST['waktu_tiket'];
        $jumlah_penumpang = $_POST['jumlah_penumpang'];
        $kelas_tiket = $_POST['kelas_tiket'];

        $sql_insert = "INSERT INTO tb_transaksi (id_tiket, asal_tiket, tujuan_tiket, tanggal_tiket, waktu_tiket, jumlah_penumpang, kelas_tiket) VALUES ('$id_tiket', '$asal_tiket', '$tujuan_tiket', '$tanggal_tiket', '$waktu_tiket', '$jumlah_penumpang', '$kelas_tiket')";
        
        $query = mysqli_query($konek, $sql_insert) or die (mysqli_error($konek));

        if($query){
            echo "<script type='text/javascript'>alert('Pemesanan Tiket Berhasil! untuk info lebih lanjut hub. kontak yang tersedia')</script>";
        }
        header("location:../user.php");
    }

    //header("location:../driver.php");
?>