<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Kendaraan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100..900&display=swap" rel="stylesheet">

    <style>
        /* Styling untuk latar belakang dan teks */
        body {
            background-color: #121212;
            color: #ffffff;
            font-family: "Montserrat", sans-serif;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .content {
            flex: 1; 
            margin-bottom: 100px; 
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
        }

        .btn-container {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .btn-secondary:hover {
            background: #c9302c;
            color: #ffffff;
            font-weight: 600;
        }

        .card {
            background-color: #2c2c2c;
            border: none;
            border-radius: 10px;
            color: #ffffff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
        }

        .card:hover {
            transform: scale(1.02);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
        }

        .card-title {
            font-size: 1.25rem;
            font-weight: bold;
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


<body>

<?php if (session()->getFlashdata('success')): ?>
    <div id="custom-alert" class="alert-box">
        <span><?= session()->getFlashdata('success'); ?></span>
        <button onclick="closeAlert()">✖</button>
    </div>
<?php endif; ?>

<?php if (session()->getFlashdata('error')): ?>
    <div id="custom-alert" class="alert-box-hapus">
        <span><?= session()->getFlashdata('error'); ?></span>
        <button onclick="closeAlert()">✖</button>
    </div>
<?php endif; ?>


    <!-- Konten utama -->
    <div class="container content mt-4">
        <!-- Judul Halaman -->
        <h1>Daftar Kendaraan</h1>

        <!-- Tombol Kembali ke Dashboard -->
        <div class="btn-container">
            <a href="<?= base_url('home'); ?>" class="btn btn-danger">Kembali</a>
            <button class="btn btn-primary" data-toggle="modal" data-target="#modalTambah">Tambah Kendaraan</button>
        </div>

        <!-- Pesan Sukses/Error -->
        <?php if (session()->getFlashdata('message')): ?>
            <div class="alert alert-success">
                <?= session()->getFlashdata('message'); ?>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger">
                <?= session()->getFlashdata('error'); ?>
            </div>
        <?php endif; ?>

        <!-- Menampilkan data kendaraan sebagai card -->
        <div class="row">
            <?php if (!empty($kendaraan)): ?>
                <?php foreach ($kendaraan as $item): ?>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"><?= esc($item['nama_kendaraan']); ?></h5>
                                <p class="card-text">
                                    <strong>Jenis Kendaraan:</strong> <?= esc($item['jenis_kendaraan']); ?><br>
                                    <strong>Tahun Kendaraan:</strong> <?= esc($item['tahun_kendaraan']); ?>
                                </p>
                                <button class="btn btn-danger btn-sm" 
                                onclick="BukaTanyaPopup('<?= esc($item['id_kendaraan']) ?>')">Delete</button>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="text-center w-100">Tidak ada data kendaraan untuk pengguna ini.</p>
            <?php endif; ?>
        </div>
    </div>


    <!-- Modal Tambah Kendaraan -->
    <div class="modal fade" id="modalTambah">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Kendaraan</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('kendaraan/add'); ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nama_kendaraan">Nama Kendaraan</label>
                            <input type="text" name="nama_kendaraan" class="form-control" required placeholder="Masukkan Nama Kendaraan">
                        </div>
                        <div class="form-group">
                            <label for="jenis_kendaraan">Jenis Kendaraan</label>
                            <select name="jenis_kendaraan" class="form-control" required>
                                <option value="" disabled selected>Pilih Jenis Kendaraan</option>
                                <option value="M/T">M/T</option>
                                <option value="A/T">A/T</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tahun_kendaraan">Tahun Kendaraan</label>
                            <input type="date" name="tahun_kendaraan" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    

    <div id="TanyaPopup" class="popup">
    <div class="popup-content">
        <p>Yakin ingin Menghapus?</p>
        <button class="confirm-btn" onclick="Hapus()">Ya</button>
        <button class="cancel-btn" onclick="TutupTanyaPopup()">Batal</button>
    </div>
</div>

    <script>
    let idUntukDihapus = null; // Variabel untuk menyimpan ID

    function BukaTanyaPopup(id) {
        if (!id) {
            alert("Data tidak ada!"); // Jika ID kosong, tampilkan peringatan
            return;
        }
        idUntukDihapus = id; // Simpan ID untuk digunakan saat penghapusan
        console.log("Popup Tanya dibuka untuk ID:", id);
        document.getElementById("TanyaPopup").style.display = "flex";
    }

    function TutupTanyaPopup() {
        console.log("Popup Tanya ditutup");
        document.getElementById("TanyaPopup").style.display = "none";
        idUntukDihapus = null; // Reset ID
    }

    function Hapus() {
        if (!idUntukDihapus) {
            alert("Data tidak ada!"); // Cegah penghapusan tanpa ID
            return;
        }
        console.log("Hapus diklik untuk ID:", idUntukDihapus);
        window.location.href = "kendaraan/delete/" + idUntukDihapus; 
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

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
