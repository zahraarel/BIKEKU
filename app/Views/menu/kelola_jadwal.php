<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Jadwal Perawatan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100..900&display=swap" rel="stylesheet">

    <style>
        /* Styling untuk latar belakang */
        body {
            background-color: #121212;
            color: #ffffff;
            font-family: "Montserrat", sans-serif;
        }

        /* Judul halaman di tengah atas */
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .container {
            flex: 1; 
            margin-bottom: 100px; 
        }

        .btn-container {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        /* Styling card */
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

        .card img {
            background-color: beige;
            border-radius: 10px;
            height: 150px;
            object-fit: contain;
            margin-bottom: 10px;
        }

        .modal-content {
            color: #121212;
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

<div class="container mt-4">
    <h2>Kelola Jadwal Perawatan</h2>
    <div class="btn-container">
        <a href="home" class="btn btn-danger">Kembali</a>
        <a href="/kelola_jadwal/tambah" class="btn btn-primary">Tambah Jadwal</a>
    </div>

    <div class="row">
        <?php if (!empty($jadwal)): ?>
            <?php foreach ($jadwal as $item): ?>
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <img src="<?= base_url('/IMG/settings.png') ?>" alt="Foto Kendaraan">
                        <div class="card-body">
                            <h5 class="card-title"><?= esc($item['nama_layanan']) ?></h5>
                            <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#detailModal" 
                                data-title="<?= esc($item['nama_layanan']) ?>" 
                                data-description="Nama Kendaraan: <?= esc($item['nama_kendaraan']) ?><br>Tanggal Perawatan: <?= esc($item['tanggal']) ?>">Detail</button>
                            <button class="btn btn-danger btn-sm" 
                                onclick="BukaTanyaPopup('<?= esc($item['id_perawatan']) ?>')">Delete</button>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="text-center">Tidak ada data jadwal perawatan.</p>
        <?php endif; ?>
    </div>
</div>

    <!-- Modal -->
    <div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="detailModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="detailModalBody"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Script untuk menangani modal detail
        var detailModal = document.getElementById('detailModal');
        detailModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget; // Tombol yang ditekan
            var title = button.getAttribute('data-title'); // Ambil data-title
            var description = button.getAttribute('data-description'); // Ambil data-description

            // Masukkan data ke dalam modal
            var modalTitle = detailModal.querySelector('.modal-title');
            var modalBody = detailModal.querySelector('.modal-body');

            modalTitle.textContent = title;
            modalBody.innerHTML = description;
        });
    </script>

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
        window.location.href = "/delete/" + idUntukDihapus; 
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
