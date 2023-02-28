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
</head>
<body style="background:white">
    <div class="container mt-3">
    <h1 class="text-white">PENGADUAN MASYARAKAT</h1>
    <h4 class="text-white">DETAIL DATA LAPORAN</h4>
<div class="container">
    <div class="card my-2 mt-3">
    <div class="d-grip gap-5 col-12 mt-2 p-3">
    <table class="table table-light table-hover table-borderless">
  <thead>
  <h2> <button href="datalaporan" type="button" class="btn btn-primary">BACK</button> </h2>
    <tr style="text-align:center;">
      <th scope="col">Tgl_pengaduan</th>
      <th scope="col">Isi_pengaduan</th>
      <th scope="col">Foto</th>
      <th scope="col">Status</th>
      
    </tr>
  </thead>

  <tbody>
    <tr class="text-center">
      <td><?=$data['tgl_pengaduan'];?></td>
      <td><?=$data['isi_laporan'];?></td>
      <td><img class="foto_data_laporan" src="<?= base_url('uploads/' . $data['foto']);?>" /></td>
      <td><?=$data['status'];?></td>
     
    </tr>
    </tbody>
    </table>

    <h2>BERI TANGGAPAN</h2>
    <hr>
    <?php foreach($tanggapan as $tanggapan) : ?>
      <div>
        <label for="">Petugas : <?= $tanggapan['nama_petugas'] ?></label>
        <p><?= $tanggapan['tanggapan'] ?></p>
      <div>
    <?php endforeach ?>
    
    </div>
    </div>
    <div class="text-end">
    <a href="datalaporan">

    </div></div>
</body>
</html>