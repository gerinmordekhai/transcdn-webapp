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
    <?php //sidebar ?>
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
                    <h1 class="mt-4">Tiket</h1> 
                    <div class="tambah-section mt-3">
                        <h1>Tambah Tiket</h1>
                        <form action="action/tambah_tiket.php" method="POST">
                            <div class="costum-kelas-tiket mb-3">
                                <label for="exampleInputPassword1" class="form-label">Kelas</label>
                                <select class="kelas-tiket" name="kelas_tiket">
                                    <option value="Ekonomi">Ekonomi</option>
                                    <option value="Eksekutif">Eksekutif</option>
                                </select>
                            </div>
                            <div class="costum-asal-tiket mb-3">
                                <label for="exampleInputPassword1" class="form-label">Asal</label>
                                <select class="asal-tiket" name="asal_tiket">
                                    <option value="SGT">SGT</option>
                                    <option value="SMD">SMD</option>
                                    <option value="BPN">BPN</option>
                                </select>
                            </div>
                            <div class="costum-tujuan-tiket mb-3">
                                <label for="exampleInputPassword1" class="form-label">Tujuan</label>
                                <select class="tujuan-tiket" name="tujuan_tiket">
                                    <option value="SGT">SGT</option>
                                    <option value="SMD">SMD</option>
                                    <option value="BPN">BPN</option>
                                </select>
                            </div>
                            <div class="costum-tanggal mb-3">
                                <label for="exampleInputPassword1" class="form-label-rangka">Tanggal</label>
                                <input type="date" class="form-control" name="tanggal_tiket" id="exampleInputPassword1">
                            </div>
                            <div class="costum-waktu mb-3">
                                <label for="exampleInputPassword1" class="form-label-mesin">Waktu</label>
                                <input type=text" class="form-control" name="waktu_tiket" id="exampleInputPassword1">
                            </div>
                            <div class="costum-slot-kursi mb-3">
                                <label for="exampleInputPassword1" class="form-label-mesin">Slot Kursi</label>
                                <input type=text" class="form-control" name="slot_kursi" id="exampleInputPassword1">
                            </div>
                            <div class="costum-ktp mb-3">
                                <label for="exampleInputPassword1" class="form-label-plat">Harga</label>
                                <input type="text" class="form-control" name="harga_tiket" id="exampleInputPassword1">
                            </div>
                            <button type="submit" class="costum-btn btn btn-success">Tambah</button>
                        </form>
                    </div>  
            <?php //tabel list tiket ?>
                    <div class="row section-bawah">
                        <div class="mt-4"></div>
                        <div class="card">
                            <div class="card-header">
                                <h4 class="mt-2">List Tiket</h4>
                                <div class="card-body">
                                    <table class="table table-bordered table-striped mt-1">
                                    <thead>
                                        <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Kelas</th>
                                        <th scope="col">Asal</th>
                                        <th scope="col">Tujuan</th>
                                        <th scope="col">Tanggal</th>
                                        <th scope="col">Waktu</th>
                                        <th scope="col">Slot Kursi</th>
                                        <th scope="col">Harga</th>
                                        <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                        include "../../database/koneksi.php";

                                        $sql_select = "SELECT * FROM tb_tiket" ;
                                        $result = $konek->query($sql_select);
                                        
                                        while($row = $result->fetch_assoc()){
                                            $id_tiket = $row['id_tiket'];
                                            $kelas_tiket = $row['kelas_tiket'];
                                            $asal_tiket = $row['asal_tiket'];
                                            $tujuan_tiket = $row['tujuan_tiket'];
                                            $waktu_tiket = $row['waktu_tiket'];
                                            $slot_kursi = $row['slot_kursi'];
                                            $tanggal_tiket = $row['tanggal_tiket'];
                                            $harga_tiket = $row['harga_tiket'];
                                            ?>
                                            <tr>
                                                <td><?php echo $id_tiket ?></td>
                                                <td><?php echo $kelas_tiket ?></td>
                                                <td><?php echo $asal_tiket ?></td>
                                                <td><?php echo $tujuan_tiket ?></td>
                                                <td><?php echo $tanggal_tiket ?></td>
                                                <td><?php echo $waktu_tiket ?></td>
                                                <td><?php echo $slot_kursi ?></td>
                                                <td><?php echo $harga_tiket ?></td>
                                                <td>
                                                    <a type="submit" class="btn btn-danger btn-sm" href="<?php echo "action/hapus_tiket.php?id_tiket=".$row['id_tiket']; ?>">Hapus</a>
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
                        <div class="tabel-section mt-4">
                            
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