<?php
    include ('database/koneksi.php');

    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $nama = $_POST['nama'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $no_telepon = $_POST['no_telepon'];
        $alamat = $_POST['alamat'];
        $email = $_POST['email'];

        $sql = "INSERT INTO tb_user (username, password, nama, jenis_kelamin, no_telepon, alamat, email, role)
                VALUES ('$username', '$password', '$nama', '$jenis_kelamin', '$no_telepon', '$alamat', '$email', 'user')";

        $query = mysqli_query($konek, $sql) or die (mysqli_error($konek));

        if($query){
            echo "<script>alert('berhasil')</script>";
            header("Location:index.html");
        }
    }
?>