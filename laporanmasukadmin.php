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
            <div class="row">
                <div class="col-auto">
  
              </div>
              </div>
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
      <th scope="col">verifikasi</th>
      
    </tr>
  </thead>
  <?php $i=1;?>
  <?php foreach($query as $row):?>
  <tbody>
    <tr class="text-center">
      <th scope="row"><a href="detaillaporanadmin/<?= $row['id_pengaduan'] ?>"><?= $i ?></a></th>
      <td><?=$row['tgl_pengaduan'];?></td>
      <td><?=$row['isi_laporan'];?></td>
      <td><img class="foto_data_laporan" src="<?= base_url('uploads/' . $row['foto']);?>" /></td>
      <td><?=$row['status'] == 0 ? 'menunggu' : $row['status'];?></td>
      <td align="left">
        <form action="verifikasi/<?= $row['id_pengaduan'] ?>" method="post"> 
            <select class="form-select" aria-label="Default select example" name="verifikasi">
                <option value="proses">Proses</option>
                <option value="selesai">Selesai</option>
            </select>
            <button type="submit" class="btn btn-success btn-sm mt-2">Verifikasi</button>
        </form>
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