<?php 
    $host = "localhost";
    $user = "root";
    $pass = "";
    $database = "Transcdn";
    
    $konek = mysqli_connect($host, $user, $pass, $database);
    
    if (!$konek) {
        die("<script>alert('Gagal tersambung dengan database.')</script>");
    }
?>