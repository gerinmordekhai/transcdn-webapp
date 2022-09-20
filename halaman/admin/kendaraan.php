<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="../../css/admin/style.css">

    <script src="https://kit.fontawesome.com/ce11b5b8d3.js" crossorigin="anonymous"></script>
    

    <title>Trans Cendana | Admin</title>
  </head>
  <body>
    <div class="main-container d-flex">
        <div class="sidebar" id="side_nav">
            <div class="header-box px-3 pt-4 pb-4">
                <div class="px-3 py-2 d-block logo">
                    <img class="navbar-brand" src="../../asset/img/TClogo2.png" />
                </div>
                

                <ul class="list-unstyled px-2">
                    <div class="px-3 py-2 d-block"></div>
                    <li class=""><a href="../admin/kendaraan.php" class="text-decoration-none px-2 py-3 d-block"><i class="fa-solid fa-van-shuttle"></i>  List Kendaraan</a></li>
                    <li class=""><a href="../admin/driver.php" class="text-decoration-none px-2 py-3 d-block"><i class="fa-solid fa-id-card"></i>  List Driver</a></li>
                    <li class=""><a href="../admin/tambahTiket.php" class="text-decoration-none px-2 py-3 d-block"><i class="fa-solid fa-ticket"></i>  List Tiket</a></li>
                    <li class=""><a href="../admin/dataTiket.php" class="text-decoration-none px-2 py-3 d-block"><i class="fa-solid fa-ticket"></i>  Tiket Terjual</a></li>
                </ul>
                <hr class="h-color mx-2">

                <ul class="list-unstyled px-2">
                    <li class=""><a href="../../logout.php" class="text-decoration-none px-3 py-3 d-block"><i class="fa-solid fa-power-off"></i>  Log Out</a></li>
                    
                </ul>

            </div>
            <div id="layoutSidenav_content" class="layoutSidenav_content">
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Kendaraan</h1> 
                    <div class="tambah-section mt-3">
                        <h1>Tambah Kendaraan</h1>
                        <form action="action/tambah_kendaraan.php" method="POST">
                            <div class="costum-jenis mb-3">
                                <label for="exampleInputPassword1" class="form-label">Jenis Kendaraan</label>
                                <select class="jenis-kendaraan" name="jenis_kendaraan" id="jenis_kendaraan">
                                    <option value="Toyota Hiace">Toyota Hiace</option>
                                    <option value="Isuzu Elf">Isuzu Elf</option>
                                </select>
                            </div>
                            <div class="costum-plat mb-3">
                                <label for="exampleInputPassword1" class="form-label-plat">Plat Nomor</label>
                                <input type="text" class="form-control" name="plat_nomor" id="plat_nomor">
                            </div>
                            <div class="costum-rangka mb-3">
                                <label for="exampleInputPassword1" class="form-label-rangka">Nomor Rangka</label>
                                <input type="text" class="form-control" name="nomor_rangka" id="nomor_rangka">
                            </div>
                            <div class="costum-mesin mb-3">
                                <label for="exampleInputPassword1" class="form-label-mesin">Nomor Mesin</label>
                                <input type="text" class="form-control" name="nomor_mesin" id="nomor_mesin">
                            </div>
                            <div class="costum-kelas mb-3">
                                <label for="exampleInputPassword1" class="form-label">Kelas</label>
                                <select class="kelas" name="kelas" id="kelas">
                                    <option value="Eksekutif">Eksekutif</option>
                                    <option value="Ekonomi">Ekonomi</option>
                                </select>
                            </div>
                            <button type="submit" name="submit" class="costum-btn btn btn-success">Tambah</button>
                        </form>
                    </div>  
                    <div class="row section-bawah">
                        <div class="mt-4"></div>
                        <div class="card">
                            <div class="card-header">
                                <h4 class="mt-2">List Kendaraan</h4>
                                <div class="card-body">
                                    <table class="table table-bordered table-striped mt-1">
                                        <thead>
                                            <tr>
                                            <th>Jenis Kendaraan</th>
                                            <th>Plat Nomor</th>
                                            <th>Nomor Rangka</th>
                                            <th>Nomor Mesin</th>
                                            <th>Kelas</th>
                                            <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                include "../../database/koneksi.php";

                                                $sql_select = "SELECT * FROM tb_kendaraan" ;
                                                $result = $konek->query($sql_select);
                                                
                                                while($row = $result->fetch_assoc()){
                                                    $jenis_kendaraan = $row['jenis_kendaraan'];
                                                    $plat_nomor = $row['plat_nomor'];
                                                    $nomor_rangka = $row['nomor_rangka'];
                                                    $nomor_mesin = $row['nomor_mesin'];
                                                    $kelas = $row['kelas'];
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $jenis_kendaraan ?></td>
                                                        <td><?php echo $plat_nomor ?></td>
                                                        <td><?php echo $nomor_rangka ?></td>
                                                        <td><?php echo $nomor_mesin ?></td>
                                                        <td><?php echo $kelas ?></td>
                                                        <td>
                                                            <a type="submit" class="btn btn-danger btn-sm" href="<?php echo "action/hapus_kendaraan.php?plat_nomor=".$row['plat_nomor']; ?>">Hapus</a>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            
                        </div>
                        
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script>
        $(".sidebar ul li").click(function(){
            $(".sidebar ul li.active").removeClass('active'); 
            $(this).addClass('active'); 
                
        })
    </script>

    <script src="../../js/admin/dropdown-menu.js"></script>
  </body>
</html>