<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Bengkel</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>"> <!-- Jika ada CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100..900&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: "Montserrat";
            background-color: #121212;
            color: #ffffff;
        }

        #map {
            height: 500px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .con-header {
            padding-top: 3%;
        }

        .con-button {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .con-bengkel {
            background: #2c2c2c;
            flex: 1; 
            margin-bottom: 100px; 
            border-radius: 8px;
            padding-bottom: 15px;
            padding-top: 15px;
        }

        .table-wrapper {
            max-height: 500px;
            overflow-y: auto;
        }

        .row.equal-height {
            display: flex;
        }

        .col-md-6 {
            display: flex;
            flex-direction: column;
        }

        .table {
            height: 100%;
            color: #ffffff;
        }

        .col-md-6 {
            padding: 10px;
        }

        .button {
            justify-content: space-between;
        }

        .modal-content {
            background-color: #2c2c2c;
            color: #ffffff;
            text-align: center;
            padding: 15px 0;
            font-size: 0.875rem;
        }

             /* Style untuk popup */
    .popup {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    justify-content: center;
    align-items: center;
    z-index: 1000; /* Pastikan di atas elemen lain */
    color: #000000;
}


  .popup-content {
    background: #fff;
    padding: 20px;
    border-radius: 10px;
    text-align: center;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
    animation: fadeIn 0.3s ease-in-out;
  }

  .popup p {
    font-size: 18px;
    margin-bottom: 15px;
  }

  .confirm-btn, .cancel-btn {
    padding: 10px 20px;
    margin: 5px;
    border: none;
    cursor: pointer;
    font-size: 16px;
    border-radius: 5px;
  }

  .confirm-btn {
    background: #d9534f;
    color: white;
  }

  .cancel-btn {
    background: #6c757d;
    color: white;
  }

  .confirm-btn:hover {
    background: #c9302c;
  }

  .cancel-btn:hover {
    background: #5a6268;
  }

  @keyframes fadeIn {
    from {
      opacity: 0;
      transform: scale(0.9);
    }
    to {
      opacity: 1;
      transform: scale(1);
    }
  }

  .alert-box {
      position: fixed;
      top: 120px;
      left: 50%;
      transform: translate(-50%, -50%);
      background-color: #4CAF50;
      color: white;
      padding: 20px 30px;
      border-radius: 10px;
      box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
      display: none;
      align-items: center;
      justify-content: space-between;
      gap: 10px;
      min-width: 300px;
      font-size: 18px;
      transition: opacity 0.5s ease-in-out, transform 0.3s ease-in-out;
      z-index: 1;
    }

    .alert-box button {
      background: none;
      border: none;
      color: white;
      font-size: 20px;
      cursor: pointer;
      font-weight: bold;
    }

    .alert-box.hide {
      opacity: 0;
      transform: translate(-50%, -60%);
    }

  .alert-box-hapus {
      position: fixed;
      top: 120px;
      left: 50%;
      transform: translate(-50%, -50%);
      background-color: #c9302c;
      color: white;
      padding: 20px 30px;
      border-radius: 10px;
      box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
      display: none;
      align-items: center;
      justify-content: space-between;
      gap: 10px;
      min-width: 300px;
      font-size: 18px;
      transition: opacity 0.5s ease-in-out, transform 0.3s ease-in-out;
      z-index: 1;
    }

    .alert-box-hapus button {
      background: none;
      border: none;
      color: white;
      font-size: 20px;
      cursor: pointer;
      font-weight: bold;
    }

    .alert-box-hapus.hide {
      opacity: 0;
      transform: translate(-50%, -60%);
    }


    </style>
</head>
<!-- Menampilkan Pesan Sukses/Error -->
<?php if (session()->getFlashdata('message')): ?>
    <div id="custom-alert" class="alert-box">
        <span><?= session()->getFlashdata('message'); ?></span>
        <button onclick="closeAlert()">✖</button>
    </div>
<?php endif; ?>

<?php if (session()->getFlashdata('error')): ?>
    <div id="custom-alert" class="alert-box-hapus">
        <span><?= session()->getFlashdata('error'); ?></span>
        <button onclick="closeAlert()">✖</button>
    </div>
<?php endif; ?>

        <div class="container">
            <div class="con-header">
                <h1 class="text-center">Daftar Bengkel</h1>
            </div>
            <div class="con-button">
                <a href="home" class="btn btn-danger">Kembali</a>
                <button class="btn btn-primary" data-toggle="modal" data-target="#modalTambah">Tambah Bengkel</button>
            </div>
        </div>


<div class="container con-bengkel mt-4">
        <!-- Baris untuk Peta dan Tabel -->
    <div class="row equal-height">
        <!-- Tampilan Peta -->
        <div class="col-md-6">
            <div id="map"></div>
        </div>

        <!-- Tabel Bengkel -->
        <div class="col-md-6">
           
            <div class="table-wrapper">
                <table class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>Nama Bengkel</th>
                            <th>Alamat</th>
                            <th>Kontak</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($bengkel as $item): ?>
                            <tr>
                                <td><?= esc($item['nama_bengkel']) ?></td>
                                <td><?= esc($item['alamat_bengkel']) ?></td>
                                <td><?= esc($item['kontak']) ?></td>
                                <td>
                                    <button class="btn btn-warning btn-sm" style="margin-bottom: 10px;" data-toggle="modal" data-target="#modalEdit<?= $item['id_bengkel']; ?>">Update</button>
                                    <button class="btn btn-danger btn-sm" onclick="BukaTanyaPopup()">Hapus</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



<!-- Modal Tambah Bengkel -->
<div class="modal fade" id="modalTambah">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Bengkel</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('bengkel/tambah'); ?>" method="post">
                    <div class="form-group">
                        <label for="nama_bengkel">Nama Bengkel</label>
                        <input type="text" name="nama_bengkel" class="form-control" required placeholder="Masukkan Nama Bengkel">
                    </div>
                    <div class="form-group">
                        <label for="alamat_bengkel">Alamat Bengkel</label>
                        <textarea name="alamat_bengkel" class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="kontak">Kontak</label>
                        <input type="text" name="kontak" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="latitude">Latitude</label>
                        <input type="text" name="latitude" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="longitude">Longitude</label>
                        <input type="text" name="longitude" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea name="deskripsi" class="form-control" required></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit Bengkel -->
<?php foreach ($bengkel as $item): ?>
    <div class="modal fade" id="modalEdit<?= $item['id_bengkel']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalEditLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="<?= base_url('bengkel/update/'.$item['id_bengkel']); ?>" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title">Update Bengkel</h5>
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nama_bengkel">Nama Bengkel</label>
                            <input type="text" name="nama_bengkel" class="form-control" value="<?= esc($item['nama_bengkel']); ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="alamat_bengkel">Alamat Bengkel</label>
                            <textarea name="alamat_bengkel" class="form-control"><?= esc($item['alamat_bengkel']); ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="kontak">Kontak</label>
                            <input type="text" name="kontak" class="form-control" value="<?= esc($item['kontak']); ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="latitude">Latitude</label>
                            <input type="text" name="latitude" class="form-control" value="<?= esc($item['latitude']); ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="longitude">Longitude</label>
                            <input type="text" name="longitude" class="form-control" value="<?= esc($item['longitude']); ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea name="deskripsi" class="form-control"><?= esc($item['deskripsi']); ?></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<div id="TanyaPopup" class="popup">
    <div class="popup-content">
        <p>Yakin ingin Menghapus?</p>
        <button class="confirm-btn" onclick="Hapus()">Ya</button>
        <button class="cancel-btn" onclick="TutupTanyaPopup()">Batal</button>
    </div>
    </div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script>
    var map = L.map('map').setView([-6.9175, 107.6191], 13); // Contoh koordinat Bandung
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19
    }).addTo(map);

    <?php foreach ($bengkel as $item): ?>
    L.marker([<?= esc($item['latitude']); ?>, <?= esc($item['longitude']); ?>]).addTo(map)
        .bindPopup('<strong><?= esc($item['nama_bengkel']); ?></strong><br><?= esc($item['alamat_bengkel']); ?>');
    <?php endforeach; ?>
</script>

<script>
    function BukaTanyaPopup() {
        console.log("Popup Tanya dibuka");
        document.getElementById("TanyaPopup").style.display = "flex";
    }

    function TutupTanyaPopup() {
        console.log("Popup Tanya ditutup");
        document.getElementById("TanyaPopup").style.display = "none";
    }

    function Hapus() {
        console.log("Hapus diklik");
        window.location.href="<?= base_url('bengkel/hapus/'.$item['id_bengkel']); ?>"; // Sesuaikan dengan URL logout
    }


    </script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
      let alertBox = document.getElementById("custom-alert");
      alertBox.style.display = "block";

      // Auto-hide after 3 seconds
      setTimeout(() => {
        alertBox.classList.add("hide");
        setTimeout(() => alertBox.style.display = "none", 500);
      }, 3000);
    });

    function closeAlert() {
      let alertBox = document.getElementById("custom-alert");
      alertBox.classList.add("hide");
      setTimeout(() => alertBox.style.display = "none", 500);
    }
  </script>
</body>
</html>
