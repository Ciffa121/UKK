<?php

// var_dump($query);
// die();
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <title>datalaporan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<style>
  .foto_data_laporan{
    width : 100px;
  }


</style>

  </head>

<body style="background:Black">
    <div class="container mt-3">
    <h1 class="text-white">PENGADUAN MASYARAKAT</h1>
    <h4 class="text-white">DATA LAPORAN</h4>
    <div class="card text-center">
  <div class="card-header">
    <ul class="nav nav-pills card-header-pills">
      <li class="nav-item">
      </li>
      <li class="nav-item">
        <a class="nav-link text-dark" href="halamanmasyarakat">BACK</a>
<div class="container mt-3" style="width:300px;margin-left:0px">
<div class="card">
        <div class="row fw-bold card-body">
          <form>
            <div class="row">
                <div class="col-auto">
  
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
      <th scope="col">Tgl_pengaduan</th>
      <th scope="col">Isi_pengaduan</th>
      <th scope="col">Foto</th>
      <th scope="col">Status</th>
      <th scope="col">Aksi</th>
      
    </tr>
  </thead>
  <?php $i=1;?>
  <?php foreach($query as $row):?>
  <tbody>
    <tr class="text-center">
      <th scope="row"><?= $i ?></th>
      <td><?=$row['tgl_pengaduan'];?></td>
      <td><?=$row['isi_laporan'];?></td>
      <td><img class="foto_data_laporan" src="<?= base_url('uploads/' . $row['foto']);?>" /></td>
      <td><?=$row['status'];?></td>
      <td><a href="detail/<?=$row['id_pengaduan'];?>" class="btn btn-primary">Detail</a>
        <a href="update/<?=$row['id_pengaduan'];?>" class="btn btn-primary">Update</a>
        <a href="<?= site_url('home/delete/') . $row['id_pengaduan'] ?>" class="btn btn-danger">Delete</a>
      </td>
    </tr>
    </tbody>
    <?php $i++; ?>
    <?php endforeach ?>
    </table>
    </div>
    </div>
    <div class="text-end">
    <a href="datalaporan">

    </div></div>
</body>
</html>