<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <title>datalaporan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body style="background:CadetBlue">
    <div class="container mt-3">
    <h1 class="text-white">PENGADUAN MASYARAKAT</h1>
    <h4 class="text-white">DATA LAPORAN</h4>
    <div class="card text-center">
  <div class="card-header">
    <ul class="nav nav-pills card-header-pills">
      <li class="nav-item">
        <a class="nav-link text-dark" href="isilaporan">BACK</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-dark" href="cp.php">UPDATE</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-dark" href="isi_data.php">DELETE</a>
      </li>
    </ul>
  </div>
</div>
<div class="container mt-3" style="width:300px;margin-left:0px">
<div class="card">
        <div class="row fw-bold card-body">
          <form>
            <div class="row">
                <div class="col-auto">
                <span class="text-black fs-5">Urutkan Berdasarkan : </span>
             </div>
             <div class="col-auto">
                  <select name="caper" class="form-control" style="width:100px" id="">
                    <option value="tanggal">Nik</option>
                    <option value="waktu">Nama</option>
                    <option value="tanggal">tanggal</option>
                    
                  </select>
                  </div>
                  <div class="col-auto">
                  <button class="btn btn-primary">Urutkan</button>
                </div>
              </div>
              </div>
          </from>
        </div>
      </div>
</div>
</div>
<div class="container">
    <div class="card my-2 mt-3">
    <div class="d-grip gap-5 col-12 mt-2">
    <table class="table table-light table-hover table-borderless">
  <thead>
    <tr style="text-align:center;">
      <th scope="col">No</th>
      <th scope="col">Tanggal</th>
      <th scope="col">Isi Laporan</th>
      <th scope="col">Foto</th>
      <th scope="col">Status</th>
      
    </tr>
  </thead>
  <?php $i=1;?>
  <?php foreach($query as $row):?>
  <tbody>
    <tr class="text-center">
      <th scope="row"><?= $i ?></th>
      <td><?=$row['tgl_pengaduan'];?></td>
      <td><?=$row['isi_laporan'];?></td>
      <td><?=$row['foto'];?></td>
      <td><?=$row['status'];?></td>
      <td>
        <a href="update.php?id_pengaduan=<?=$row['id_pengaduan'];?>" class="btn btn-primary">Update</a>
        <a href="delete.php?nik=<?=$row['id_pengaduan'];?>" class="btn btn-danger">Delete</a>
      </td>
    </tr>
    </tbody>
    <?php $i++; ?>
    <?php endforeach ?>
    </table>
    </div>
    </div>
    <div class="text-end">
    <a href="laporanmasuk">

    </div></div>
</body>
</html>