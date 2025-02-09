<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Jadwal Perawatan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100..900&display=swap" rel="stylesheet">

    <style>
        /* Styling untuk latar belakang */
        body {
            background-color: #121212;
            color: #ffffff;
            font-family: "Montserrat", sans-serif;
        }

        /* Form container */
        .container {
            background-color: #2c2c2c;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
        }

        .form-control {
            background-color: #1e1e1e;
            color: #ffffff;
            border: 1px solid #444;
        }

        .form-control:focus {
            background-color: #1e1e1e;
            color: #ffffff;
            border-color: #007bff;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }

        .btn {
            border-radius: 5px;
        }

        .alert {
            background-color: #dc3545;
            color: #fff;
            border: none;
        }
    </style>
</head>

<body>
    <div class="container mt-4">
        <h2>Tambah Jadwal Perawatan</h2>

        <!-- Pengecekan status login -->
        <!-- <?php if (session()->get('logged_in')): ?>
            <p>Welcome, <?= esc(session()->get('user')['username']) ?>! You have successfully logged in.</p>
            <p>Your User ID: <?= esc(session()->get('user')['id_user']) ?></p> 
        <?php else: ?>
            <p>You are not logged in. Please log in to access your dashboard.</p>
        <?php endif; ?> -->

        <!-- Menampilkan pesan error jika ada -->
        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
        <?php endif; ?>

        <!-- Form untuk menambah jadwal perawatan -->
        <form action="/kelola_jadwal/simpan" method="post">
            <?= csrf_field() ?>
            <div class="mb-3">
                <label for="id_kendaraan" class="form-label">ID Kendaraan</label>
                <select class="form-control" id="id_kendaraan" name="id_kendaraan" required>
                    <option value="">Pilih Kendaraan</option>
                    <?php foreach ($kendaraan as $item): ?>
                        <option value="<?= esc($item['id_kendaraan']) ?>">
                            <?= esc($item['id_kendaraan']) ?> - <?= esc($item['nama_kendaraan']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="id_layanan" class="form-label">Jenis Perawatan</label>
                <select class="form-control" id="id_layanan" name="id_layanan" required>
                    <option value="">Pilih Jenis Perawatan</option>
                    <?php foreach ($layanan as $item): ?>
                        <option value="<?= esc($item['id_layanan']) ?>">
                            <?= esc($item['nama_layanan']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mt-4 d-flex justify-content-between">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="/kelola_jadwal" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>




</body>

</html>
