<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="../../css/user/user.css">

    <title>Trans Cendana</title>
  </head>
  <body>
    <header class="bg-light costum-navbar">
      <img class="logo" src="../../asset/img/TClogo2.png" alt="logo">
      <a href="#" class="tc">Trans Cendana</a>
      <li class="section-btn"><a href="../../logout.php">Log Out</a></li>
    </header>

    <div id="containerpesan">
      <div class="container">
        <div class="title">Cari Tiket</div>
        <div class="content">
          <form action="user.php" method="POST">
            <div class="user-details">
              <div class="input-box">
                <span class="details">Asal</span>
                <select class="kelasbox" name="asal_tiket" id="select">
                  <option value="" disabled="" selected="">Masukkan Asal</option>
                  <option value="SGT">Sangatta(SGT)</option>
                  <option value="SMD">Samarinda(SMD)</option>
                  <option value="BPN">Balikpapan(BPN)</option>
                </select>
              </div>
              <div class="input-box">
                <span class="details">Tujuan</span>
                <select class="kelasbox" name="tujuan_tiket" id="select">
                  <option value="" disabled="" selected="">Masukkan Tujuan</option>
                  <option value="SGT">Sangatta(SGT)</option>
                  <option value="SMD">Samarinda(SMD)</option>
                  <option value="BPN">Balikpapan(BPN)</option>
                </select>
              </div>
              <div class="input-box">
                <span class="details">Tanggal</span>
                <input type="date" name="tanggal_tiket" placeholder="Pilih tanggal" required>
              </div>
            </div>
            <button type="submit" name="filter" class="costum-btn btn btn-success">Cari</button>
          </form>
        </div>
      </div>
      <div class="container bg-secondary">
        <div class="card">
          <div class="card-body">
            <table class="table table-bordered table-striped mt-1">
              <thead>
                <th scope="col">ID</th>
                <th scope="col">Asal</th>
                <th scope="col">Tujuan</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Waktu</th>
                <th scope="col">Kelas</th>
                <th scope="col">Slot Kursi</th>
                <th scope="col">Harga</th>
              </thead>
              <tbody>
              <?php 
                include "../../database/koneksi.php";

                if(isset($_POST['filter'])){
                  $asal_tiket = $_POST['asal_tiket'];
                  $tujuan_tiket = $_POST['tujuan_tiket'];
                  $tanggal_tiket = $_POST['tanggal_tiket'];

                  $sql_cari = mysqli_query($konek, "SELECT * FROM tb_tiket WHERE asal_tiket LIKE '$asal_tiket' AND tujuan_tiket LIKE '$tujuan_tiket' AND tanggal_tiket = '$tanggal_tiket'");

                  if(mysqli_num_rows($sql_cari) > 0){
                    while($row = mysqli_fetch_array($sql_cari)){
                      $id_tiket = $row['id_tiket'];
                      $asal_tiket = $row['asal_tiket'];
                      $tujuan_tiket = $row['tujuan_tiket'];
                      $tanggal_tiket = $row['tanggal_tiket'];
                      $waktu_tiket = $row['waktu_tiket'];
                      $kelas_tiket = $row['kelas_tiket'];
                      $slot_kursi = $row['slot_kursi'];
                      $harga_tiket = $row['harga_tiket'];
                      ?>
                      <tr>
                        <td><?php echo $id_tiket ?></td>
                        <td><?php echo $asal_tiket ?></td>
                        <td><?php echo $tujuan_tiket ?></td>
                        <td><?php echo $tanggal_tiket ?></td>
                        <td><?php echo $waktu_tiket ?></td>
                        <td><?php echo $kelas_tiket ?></td>
                        <td><?php echo $slot_kursi ?></td>
                        <td><?php echo $harga_tiket ?></td>
                      </tr>
                      <?php 
                    }
                  }else{
                    echo "<script>alert('Tiket Tidak Tersedia')</script>";
                  }
                }
              ?>                                  
              </tbody>
            </table>
            <button type="button" class="costum-btn btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
              Pesan
            </button>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Pesan Tiket</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="action/pesantiket.php" method="POST">
              <div class="input-box mb-3">
                <span class="details">ID Tiket</span>
                <input type="text" class="form-control costum-input" name="id_tiket" placeholder="Masukkan ID Tiket" required>
              </div>
              <div class="input-box mb-3">
                <span class="details">Asal</span>
                <select class="kelasbox" name="asal_tiket" id="select">
                    <option value="" disabled="" selected="">Masukkan Asal</option>
                    <option value="SGT">Sangatta(SGT)</option>
                    <option value="SMD">Samarinda(SMD)</option>
                    <option value="BPN">Balikpapan(BPN)</option>
                </select>
              </div>
              <div class="input-box mb-3">
                <span class="details">Tujuan</span>
                <select class="kelasbox" name="tujuan_tiket" id="select">
                    <option value="" disabled="" selected="">Masukkan Tujuan</option>
                    <option value="SGT">Sangatta(SGT)</option>
                    <option value="SMD">Samarinda(SMD)</option>
                    <option value="BPN">Balikpapan(BPN)</option>
                </select>
              </div>
              <div class="input-box mb-3">
                <span class="details">Tanggal</span>
                <input type="date" class="tanggal" name="tanggal_tiket" placeholder="Pilih tanggal" required>
              </div>
              <div class="input-box mb-3">
                <span class="details">Jumlah Penumpang</span>
                <input type="text" class="form-control costum-input" name="jumlah_penumpang" placeholder="Masukkan jumlah penumpang" required>
              </div>
              <div class="input-box mb-3">
                <span class="details">Waktu</span>
                <select class="kelasbox" name="waktu_tiket" id="select">
                    <option value="" disabled="" selected="">Pilih Waktu</option>
                    <option value="08.00">Pagi - 08.00</option>
                    <option value="17.00">Sore - 17.00</option>
                    </select>
              </div>
              <div class="input-box mb-3">
                <span class="details">Kelas</span>
                <select class="kelasbox" name="kelas_tiket" id="select">
                    <option value="" disabled="" selected="">Pilih Kelas</option>
                    <option value="Ekonomi">Ekonomi</option>
                    <option value="Eksekutif">Eksekutif</option>
                    </select>
              </div>
            </div>  
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Pesan Sekarang</button>
            </div>
          </form> 
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
  </body>
</html>