<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Bengkel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100..900&display=swap" rel="stylesheet">

    <style>
        body {
    font-family: "Montserrat", sans-serif;
    background-color: #121212;
    color: #ffffff;
    margin: 0;
    padding: 0;
}

#map {
    height: 500px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    margin-bottom: 20px;
}

.con-button {
    display: flex;
    justify-content: space-between;
    margin-left: 5%;
}
.main-container {
    background-color: #121212;
    padding-top: 10px;
    padding-bottom: 45px;
}

.con-title {
    padding-top: 3%;
}

.table-wrapper {
    max-height: 500px;
    overflow-y: auto;
}

.table {
    color: #ffffff;
    background-color: #333;
}

.table thead th {
    border-bottom: 2px solid #ffffff;
}

.table tbody tr {
    transition: background-color 0.3s;
}

.table tbody tr:hover {
    background-color: #343a40;
}

.modal-content {
    background-color: #2c2c2c;
    color: #ffffff;
}

.modal-header, .modal-footer {
    border: none;
}

.modal-title {
    font-size: 1.25rem;
}

.btn-primary, .btn-danger {
    border-radius: 8px;
}

.radius-select {
    background-color: #333;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
    margin: 20px auto;
    max-width: 1220px;
    text-align: center;
}

.radius-select label {
    font-size: 1.2rem;
    color: #f8f9fa;
}

.select-container {
    position: relative;
    display: inline-block;
    width: auto;
    max-width: 200px;
}

.form-select {
    background-color: #444;
    color: #fff;
    border: 2px solid #555;
    border-radius: 5px;
    padding: 8px;
    font-size: 1rem;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease-in-out;
}

.form-select:focus {
    border-color: #007bff;
    box-shadow: 0 0 8px rgba(0, 123, 255, 0.5);
    outline: none;
}

.form-select:hover {
    background-color: #555;
}

/* Style untuk mobile dan tablet */
@media (max-width: 768px) {
    .radius-select {
        padding: 15px;
    }

    .radius-select label {
        font-size: 1rem;
    }

    .form-select {
        font-size: 0.9rem;
    }

    #map {
        height: 300px;
    }
}

.main-con {
    display: flex;
    justify-content: space-between; 
    gap: 20px;
    padding-bottom: 40px;
    margin-left: 5%;
    margin-right: 5%;
}

.container-maps, .container-list {
    flex: 1; /* Membuat setiap container memiliki lebar yang sama */
}

.container-maps {
    min-width: 400px; /* Atur lebar minimum untuk map */
}

.container-list {
    min-width: 300px; /* Atur lebar minimum untuk list bengkel */
}


@media (max-width: 768px) {
    .main-con {
        flex-direction: column; /* Menyusun elemen secara vertikal pada layar kecil */
    }

    .container-maps, .container-list {
        min-width: 100%; /* Lebar penuh untuk container di layar kecil */
    }
}


.card {
    background-color: #2c2c2c;
    color: #ffffff;
    border-radius: 8px;
    padding: 20px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
}

.table th, .table td {
    padding: 10px;
    text-align: center;
    vertical-align: middle;
}

.table th {
    background-color: #4b4b4b;
    font-weight: bold;
}

.table td {
    background-color: #444;
}

.table tbody tr:hover {
    background-color: #5e5e5e;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.table-bordered {
    border: 1px solid #555;
}

.card-title {
    font-size: 1.5rem;
    font-weight: bold;
}

/* Penataan untuk elemen seperti tombol dan tabel */
.table td a:hover {
    color: #0056b3;
}

.list-group-item {
    border: 1px solid #ddd;
    margin-bottom: 5px;
    padding: 10px;
    border-radius: 8px;
    background-color: #121212;
    transition: background-color 0.3s;
}

.list-group-item:hover {
    background-color: #5e5e5e;
}

.list-group-item.highlight {
    background-color: #5e5e5e;
    font-weight: bold;
}


    
</style>

</head>
<body>
    <div class="con-title">
        <h1 class="text-center">Daftar Bengkel</h1>
    </div>
    <div class="con-button">
        <a href="<?= base_url('home'); ?>" class="btn btn-danger">Kembali</a>
        </div>
    </div>
    <div class="radius-select">
    <label for="radius" class="mr-2 font-weight-bold">Pilih Radius:</label>
            <select id="radius" class="form-control d-inline-block w-auto">
                <option value="1">1 KM</option>
                <option value="3">3 KM</option>
                <option value="5" selected>5 KM</option>
                <option value="10">10 KM</option>
            </select>
        </div>

        <!-- Map and Bengkel List -->
        <div class="main-con">
            <!-- Map Section -->
            <div class="container-maps">
                <div class="card shadow-lg">
                    <div class="card-body p-0">
                        <div id="map" style="height: 500px;"></div>
                    </div>
                </div>
            </div>

            <!-- Bengkel List Section -->
            <div class="container-list">
                <div class="card shadow-lg">
                    <div class="card-body p-3" style="max-height: 500px; overflow-y: auto;">
                        <h5 class="card-title">Daftar Bengkel</h5>
                        <ul id="bengkel-list" class="list-group list-group-flush">
                            <!-- Daftar bengkel akan dimuat di sini -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        var map, userMarker, radiusCircle, userLat, userLng;
        var bengkelMarkers = [];

        function initializeMap() {
            map = L.map('map').setView([0, 0], 2);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 18,
            }).addTo(map);
        }

        function detectUserLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function (position) {
                    userLat = position.coords.latitude;
                    userLng = position.coords.longitude;

                    map.setView([userLat, userLng], 13);

                    userMarker = L.marker([userLat, userLng], {
                        icon: L.icon({
                            iconUrl: 'http://localhost/BIKEKU/public/IMG/marker_user.png',
                            iconSize: [30, 30],
                        }),
                    }).addTo(map).bindPopup("<b>Lokasi Anda</b><br>Lat: " + userLat + "<br>Lng: " + userLng).openPopup();

                    updateRadiusAndFetchData($('#radius').val());
                }, function () {
                    alert("Geolocation service failed.");
                });
            } else {
                alert("Geolocation is not supported by this browser.");
            }
        }

        function drawRadius(lat, lng, radius) {
            if (radiusCircle) map.removeLayer(radiusCircle);

            radiusCircle = L.circle([lat, lng], {
                color: 'blue',
                fillColor: '#30a7d7',
                fillOpacity: 0.3,
                radius: radius * 1000,
            }).addTo(map);
        }

        function fetchBengkelData(lat, lng, radius) {
            $.ajax({
                url: "<?= base_url('maps/getBengkelData') ?>",
                type: "GET",
                data: { user_lat: lat, user_lng: lng, radius: radius },
                dataType: "json",
                success: function (response) {
                    // Clear previous markers and table highlights
                    bengkelMarkers.forEach(function (marker) {
                        map.removeLayer(marker);
                    });
                    bengkelMarkers = [];
                    $('#bengkel-list').empty();

                    if (response.status === 'success' && response.bengkel.length > 0) {
                        response.bengkel.forEach(function (bengkel, index) {
                            var marker = L.marker([bengkel.latitude, bengkel.longitude], {
                                icon: L.icon({
                                    iconUrl: 'http://localhost/BIKEKU/public/IMG/bengkel_marker.png',
                                    iconSize: [25, 25],
                                }),
                            }).addTo(map).bindPopup(
                                `<strong>${bengkel.nama_bengkel}</strong><br>${bengkel.alamat_bengkel}<br>Kontak: ${bengkel.kontak}<br>Jarak: ${parseFloat(bengkel.distance).toFixed(2)} km`
                            );

                            // Click event for marker
                            marker.on('click', function () {
                                $('#bengkel-list .list-group-item').removeClass('highlight');
                                $('#bengkel-list .list-group-item').eq(index).addClass('highlight');
                            });

                            bengkelMarkers.push(marker);

                            // Append to list
                            $('#bengkel-list').append(
                                `<table class="list-group-item" data-index="${index}">
                                    <tr>
                                        <td><strong>Nama Bengkel</strong></td>
                                        <td>${bengkel.nama_bengkel}</td>
                                    </tr>
                                    <tr>
                                        <td>Alamat</td>
                                        <td>${bengkel.alamat_bengkel}</td>
                                    </tr>
                                    <tr>
                                        <td>Jarak</td>
                                        <td>${parseFloat(bengkel.distance).toFixed(2)} km</td>
                                    </tr>
                                </table>`
                            );
                        });

                        // Click event for list
                        $('#bengkel-list .list-group-item').on('click', function () {
                            var index = $(this).data('index');
                            var marker = bengkelMarkers[index];
                            map.setView(marker.getLatLng(), 15);
                            marker.openPopup();

                            // Highlight selected item
                            $('#bengkel-list .list-group-item').removeClass('highlight');
                            $(this).addClass('highlight');
                        });
                    } else {
                        $('#bengkel-list').append('<li class="list-group-item text-danger">Tidak ada bengkel dalam radius yang dipilih.</li>');
                    }
                },
                error: function () {
                    alert('Gagal memuat data bengkel.');
                },
            });
        }

        function updateRadiusAndFetchData(radius) {
            drawRadius(userLat, userLng, radius);
            fetchBengkelData(userLat, userLng, radius);
        }

        $(document).ready(function () {
            initializeMap();
            detectUserLocation();

            $('#radius').on('change', function () {
                updateRadiusAndFetchData($(this).val());
            });
        });
    </script>
</body>
</html>