<?php 
    include '../../../database/koneksi.php';

    if(isset($_POST['submit'])){
        $jenis_kendaraan = $_POST['jenis_kendaraan'];
        $plat_nomor = $_POST['plat_nomor'];
        $nomor_rangka = $_POST['nomor_rangka'];
        $nomor_mesin = $_POST['nomor_mesin'];
        $kelas = $_POST['kelas'];

        $sql_insert = "INSERT INTO tb_kendaraan (jenis_kendaraan, plat_nomor, nomor_rangka, nomor_mesin, kelas)
            VALUES ('$jenis_kendaraan', '$plat_nomor', '$nomor_rangka', '$nomor_mesin', '$kelas')";
        
        $query = mysqli_query($konek, $sql_insert) or die (mysqli_error($konek));

        if($query){
            echo "<script type='text/javascript'>alert('Berhasil')</script>";
        }
    }

    header("location:../kendaraan.php");
?>