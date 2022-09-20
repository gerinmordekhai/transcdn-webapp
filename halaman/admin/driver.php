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
                    <h1 class="mt-4">Driver</h1> 
                    <div class="tambah-section mt-3">
                        <h1>Tambah Driver</h1>
                        <form action="action/tambah_driver.php" method="POST">
                            <div class="costum-driver mb-3">
                                <label for="exampleInputPassword1" class="form-label-plat">Nama Driver</label>
                                <input type="text" class="form-control" name="nama_driver" id="exampleInputPassword1">
                            </div>
                            <div class="costum-plat mb-3">
                                <label for="exampleInputPassword1" class="form-label-plat">No Id</label>
                                <input type="text" class="form-control" name="id_driver" id="exampleInputPassword1">
                            </div>
                            <div class="costum-rangka mb-3">
                                <label for="exampleInputPassword1" class="form-label-rangka">Alamat</label>
                                <input type="text" class="form-control" name="alamat" id="exampleInputPassword1">
                            </div>
                            <div class="costum-mesin mb-3">
                                <label for="exampleInputPassword1" class="form-label-mesin">Nomor Telephone</label>
                                <input type="text" class="form-control" name="no_hp" id="exampleInputPassword1">
                            </div>
                            <div class="costum-ktp mb-3">
                                <label for="exampleInputPassword1" class="form-label-plat">No Ktp</label>
                                <input type="text" class="form-control" name="no_ktp" id="exampleInputPassword1">
                            </div>
                            <button type="submit" class="costum-btn btn btn-success">Tambah</button>
                        </form>
                    </div>  
                    <div class="row section-bawah">
                        <div class="mt-4"></div>
                        <div class="card">
                            <div class="card-header">
                                <h4 class="mt-2">List Driver</h4>
                                <div class="card-body">
                                    <table class="table table-bordered table-striped mt-1">
                                        <thead>
                                            <tr>
                                            <th scope="col">Nama Driver</th>
                                            <th scope="col">No ID</th>
                                            <th scope="col">Alamat</th>
                                            <th scope="col">No Telephone</th>
                                            <th scope="col">No KTP</th>
                                            <th scope="col">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                            include "../../database/koneksi.php";

                                            $sql_select = "SELECT * FROM tb_driver" ;
                                            $result = $konek->query($sql_select);
                                            
                                            while($row = $result->fetch_assoc()){
                                                $nama_driver = $row['nama_driver'];
                                                $id_driver = $row['id_driver'];
                                                $alamat = $row['alamat'];
                                                $no_hp = $row['no_hp'];
                                                $no_ktp = $row['no_ktp'];
                                                ?>
                                                <tr>
                                                    <td><?php echo $nama_driver ?></td>
                                                    <td><?php echo $id_driver ?></td>
                                                    <td><?php echo $alamat ?></td>
                                                    <td><?php echo $no_hp ?></td>
                                                    <td><?php echo $no_ktp ?></td>
                                                    <td>
                                                        <a type="submit" class="btn btn-danger btn-sm" href="<?php echo "action/hapus_driver.php?id_driver=".$row['id_driver']; ?>">Hapus</a>
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