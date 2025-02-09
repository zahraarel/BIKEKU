<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100..900&display=swap" rel="stylesheet">
  <title>Dashboard</title>
  <style>
    body {
      margin: 0;
      font-family: "Montserrat", sans-serif;
      background-color: black;
      color: white;
    }

/* Navbar Styling */
.navbar {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  z-index: 1000;
  background: rgba(255, 255, 255, 0);
  padding: 10px 20px;
  display: flex;
  justify-content: space-between;
  align-items: center;
}

/* Logo */
.navbar-brand img {
  width: 100px;
  height: auto;
}

/* Menu */
.nav {
  display: flex;
  align-items: center;
  list-style: none;
  gap: 20px;
  padding: 0;
  margin: 0;
}

/* Link */
.nav-link {
  text-decoration: none;
  color: #ce0707;
  font-weight: 600;
  font-size: 18px;
  transition: color 0.3s ease;
}

.nav-link:hover {
  color: #f9a825;
}

/* Logout Button */
.navlogout {
  display: flex;
  align-items: center;
}

/* Responsive Menu */
.menu-toggle {
  display: none;
  cursor: pointer;
  font-size: 28px;
  color: #ce0707;
}

/* Mobile View */
@media (max-width: 840px) {
  .nav {
    font-size: medium;
    position: absolute;
    top: 70px;
    left: 0;
    width: 100%;
    background: rgba(255, 255, 255, 0);
    flex-direction: column;
    align-items: center;
    padding: 15px 0;
    gap: 15px;
    transform: translateY(-140%);
    transition: transform 0.3s ease-in-out;
  }

  .nav.active {
    transform: translateY(0);
  }

  .menu-toggle {
    display: block;
  }
}

    /* From Uiverse.io by vinodjangid07 */ 
    .Btn {
      display: flex;
      align-items: center;
      justify-content: flex-start;
      width: 45px;
      height: 45px;
      border: none;
      border-radius: 50%;
      cursor: pointer;
      position: relative;
      overflow: hidden;
      transition-duration: .3s;
      box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.199);
      background-color: rgb(255, 65, 65);
    }

    /* plus sign */
    .sign {
      width: 100%;
      transition-duration: .3s;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .sign svg {
      width: 17px;
    }

    .sign svg path {
      fill: white;
    }
    /* text */
    .text {
      position: absolute;
      right: 0%;
      width: 0%;
      opacity: 0;
      color: white;
      font-size: 1.2em;
      font-weight: 600;
      transition-duration: .3s;
    }
    /* hover effect on button width */
    .Btn:hover {
      width: 125px;
      border-radius: 40px;
      transition-duration: .3s;
    }

    .Btn:hover .sign {
      width: 30%;
      transition-duration: .3s;
      padding-left: 20px;
    }
    /* hover effect button's text */
    .Btn:hover .text {
      opacity: 1;
      width: 70%;
      transition-duration: .3s;
      padding-right: 10px;
    }
    /* button click effect*/
    .Btn:active {
      transform: translate(2px ,2px);
    }

    .bx-exit {
    font-size: 3rem; /* Mengatur ukuran font */
    transition: transform 0.3s ease; /* Memberikan efek transisi */
    }

    .bx-exit:hover {
    transform: scale(1.2); /* Membesar saat hover */
    color: #f9a825; /* Memberikan warna berbeda saat hover */
    }

    .navlogout:hover .bx-exit {
    animation: 1s ease-in-out; /* Tambahkan animasi bx-tada */
    }
    

    .carousel-item{
        background-color: #000000;
        
    }
    .carousel-item img{
        width: 100%;
        height: 100%;
        object-fit: fill;
        
        
    }
    .carousel-caption h1 {
      font-family: "Montserrat", serif;
      font-size: 4cap;
      font-optical-sizing: auto;
      font-weight: 900;
      font-style: normal;

    }

    .carousel-caption p {
      font-family: "Montserrat", serif;
      font-size: 2rem;
      font-weight: 100;
      font-style: normal;

    }
    .carousel-caption {
        font-size: 2rem;
        justify-items: left;
        color: white;

    }

    .fiturinfo{
        margin-left: 30px;
        margin-right: 30px;
        margin-top: 30px;
        display: flex;
        justify-content: space-evenly;
        box-shadow: 0px -25px 25px rgba(0, 0, 0, 0.3); 
        padding: 20px ;
        border-radius: 8px;


    }

    .fiturinfo .card {
    background-color: #212529;
    color: #212829; 
    border: 1px solid ; 
    border-radius: 8px; 
    align-items: center;
    box-shadow: 6px 6px 10px rgba(255, 255, 255, 0.2);

    }

    .fiturinfo .card img {
     width: 10rem;
     height: 10rem;
     margin-top: 20px;
    }

    .fiturinfo .card p {
    color: #ffffff; 
    }

    .fiturinfo .card h3 {
      color: #ffffff; 
      font-weight: 700;
    }

  .e-card {
    margin: 100px auto;
    background: transparent;
    box-shadow: 0px 8px 28px -9px rgba(0,0,0,0.45);
    position: relative;
    width: 240px;
    height: 330px;
    border-radius: 16px;
    overflow: hidden;
  }

  .wave {
    position: absolute;
    width: 540px;
    height: 700px;
    opacity: 0.6;
    left: 0;
    top: 0;
    margin-left: -50%;
    margin-top: -70%;
    background: linear-gradient(744deg,#ce0707,#121212 60%,#ce0707);
  }

  .icon {
    width: 3em;
    margin-top: -1em;
    padding-bottom: 1em;
  }

  .infotop {
    text-align: center;
    font-size: 20px;
    position: absolute;
    top: 5.6em;
    left: 0;
    right: 0;
    color: rgb(255, 255, 255);
    font-weight: 600;
  }

  .name {
    font-size: 14px;
    font-weight: 100;
    position: relative;
    top: 1em;
    text-transform: lowercase;
  }

  .wave:nth-child(2),
  .wave:nth-child(3) {
    top: 210px;
  }

  .playing .wave {
    border-radius: 40%;
    animation: wave 3000ms infinite linear;
  }

  .wave {
    border-radius: 40%;
    animation: wave 55s infinite linear;
  }

  .playing .wave:nth-child(2) {
    animation-duration: 4000ms;
  }

  .wave:nth-child(2) {
    animation-duration: 50s;
  }

  .playing .wave:nth-child(3) {
    animation-duration: 5000ms;
  }

  .wave:nth-child(3) {
    animation-duration: 45s;
  }

  @keyframes wave {
    0% {
      transform: rotate(0deg);
    }

    100% {
      transform: rotate(360deg);
    }
  }

  @media screen and (max-width: 768px) {
    .fiturinfo {
        flex-direction: column;
        align-items: center;
    }

    .e-card {
        width: 90%;
        max-width: 300px;
    }
}

@media screen and (max-width: 480px) {
    .fiturinfo .card {
        width: 90%;
    }

    .e-card {
        height: auto;
        padding: 20px;
    }
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
  </style>
</head>

<body>
<nav class="navbar">
  <a class="navbar-brand" href="home">
    <img src="<?= base_url('assets/img/logo.png') ?>" alt="Logo">
  </a>
  
  <!-- Toggle Button -->
  <div class="menu-toggle">☰</div>

  <!-- Navigation Menu -->
  <ul class="nav">
    <li class="nav-item"><a class="nav-link" href="kelola_jadwal">PerawatanKu</a></li>
    <li class="nav-item"><a class="nav-link" href="kendaraan">MotorKu</a></li>
    <li class="nav-item"><a class="nav-link" href="maps">PetaKu</a></li>
    <?php if (isset($id_user) && $id_user == 2): ?>
      <li class="nav-item"><a class="nav-link" href="bengkel">Kelola Bengkel</a></li>
    <?php endif; ?>
  </ul>

  <!-- Logout Button -->
  <ul class="navlogout">
      <button class="Btn" onclick="openLogoutPopup()">
        <div class="sign">
          <svg viewBox="0 0 512 512">
            <path d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"></path>
          </svg>
        </div>
        <div class="text">Logout</div>
      </button>
  </ul>
</nav>


<div>
<div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
<div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="img/lp.png" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h1>BIKEKU</h1>
            <p>Rawat kendara<span style="color: #121212;">an anda bersama kami!!!</span></p>
            </div>
          </div>
        <div class="carousel-item ">
      <img src="img/loc.png" class="d-block w-100" alt="...">
    <div class="carousel-caption d-none d-md-block">
      <h1>BIKEKU</h1>
        <p>Rawat kendaraan anda bersama kami!!!</p>
        </div>
      </div>
        <div class="carousel-item ">
      <img src="img/db.png" class="d-block w-100" alt="...">
    <div class="carousel-caption d-none d-md-block">
      <h1 style="color: #121212;">BIKEKU</h1>
        <p style="color: #121212;">Rawat kendaraan anda bersama kami!!!</p>
        </div>
      </div>
    </div>
  </div>
<br>

<div class="fiturinfo"> 
  <div class="e-card playing">
    <div class="image"></div>
      <div class="wave"></div>
      <div class="wave"></div>
      <div class="wave"></div>
      <div class="infotop">
        <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 24 30" style="fill: rgba(0, 0, 0, 0);transform: msFilter;">
          <circle cx="12" cy="12" r="4"></circle>
            <path fill="currentColor" d="M13 4.069V2h-2v2.069A8.01 8.01 0 0 0 4.069 11H2v2h2.069A8.008 8.008 0 0 0 11 19.931V22h2v-2.069A8.007 8.007 0 0 0 19.931 13H22v-2h-2.069A8.008 8.008 0 0 0 13 4.069zM12 18c-3.309 0-6-2.691-6-6s2.691-6 6-6 6 2.691 6 6-2.691 6-6 6z"></path></svg>      
<br>
      PetaKu
<br>
            <div class="name">Solusi Cerdas untuk Perjalanan Anda! </div>
          </div>
        </div>

<div class="e-card playing">
  <div class="image"></div>    
    <div class="wave"></div>
    <div class="wave"></div>
    <div class="wave"></div>
    <div class="infotop">
      <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 24 30" style="fill: rgba(0, 0, 0, 0);transform: msFilter;">
      <path fill="currentColor" d="M12 16c2.206 0 4-1.794 4-4s-1.794-4-4-4-4 1.794-4 4 1.794 4 4 4zm0-6c1.084 0 2 .916 2 2s-.916 2-2 2-2-.916-2-2 .916-2 2-2z"></path>
      <path fill="currentColor" d="m2.845 16.136 1 1.73c.531.917 1.809 1.261 2.73.73l.529-.306A8.1 8.1 0 0 0 9 19.402V20c0 1.103.897 2 2 2h2c1.103 0 2-.897 2-2v-.598a8.132 8.132 0 0 0 1.896-1.111l.529.306c.923.53 2.198.188 2.731-.731l.999-1.729a2.001 2.001 0 0 0-.731-2.732l-.505-.292a7.718 7.718 0 0 0 0-2.224l.505-.292a2.002 2.002 0 0 0 .731-2.732l-.999-1.729c-.531-.92-1.808-1.265-2.731-.732l-.529.306A8.1 8.1 0 0 0 15 4.598V4c0-1.103-.897-2-2-2h-2c-1.103 0-2 .897-2 2v.598a8.132 8.132 0 0 0-1.896 1.111l-.529-.306c-.924-.531-2.2-.187-2.731.732l-.999 1.729a2.001 2.001 0 0 0 .731 2.732l.505.292a7.683 7.683 0 0 0 0 2.223l-.505.292a2.003 2.003 0 0 0-.731 2.733zm3.326-2.758A5.703 5.703 0 0 1 6 12c0-.462.058-.926.17-1.378a.999.999 0 0 0-.47-1.108l-1.123-.65.998-1.729 1.145.662a.997.997 0 0 0 1.188-.142 6.071 6.071 0 0 1 2.384-1.399A1 1 0 0 0 11 5.3V4h2v1.3a1 1 0 0 0 .708.956 6.083 6.083 0 0 1 2.384 1.399.999.999 0 0 0 1.188.142l1.144-.661 1 1.729-1.124.649a1 1 0 0 0-.47 1.108c.112.452.17.916.17 1.378 0 .461-.058.925-.171 1.378a1 1 0 0 0 .471 1.108l1.123.649-.998 1.729-1.145-.661a.996.996 0 0 0-1.188.142 6.071 6.071 0 0 1-2.384 1.399A1 1 0 0 0 13 18.7l.002 1.3H11v-1.3a1 1 0 0 0-.708-.956 6.083 6.083 0 0 1-2.384-1.399.992.992 0 0 0-1.188-.141l-1.144.662-1-1.729 1.124-.651a1 1 0 0 0 .471-1.108z"></path></svg>
      <br>
      BengkelKu
    <br>
    <div class="name">Temukkan Bengkel terbaik dilokasi anda berada!</div>
      </div>
    </div>


    <div class="e-card playing">
      <div class="image"></div>
      <div class="wave"></div>
      <div class="wave"></div>
      <div class="wave"></div>
      
          <div class="infotop">

      <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" viewBox="0 0 24 30" style="fill: rgba(255, 255, 255, 1);transform: msFilter;">
      <circle cx="18" cy="6" r="3"></circle>
      <path fill="currentColor" d="M18 19H5V6h8c0-.712.153-1.387.422-2H5c-1.103 0-2 .897-2 2v13c0 1.103.897 2 2 2h13c1.103 0 2-.897 2-2v-8.422A4.962 4.962 0 0 1 18 11v8z"></path></svg>      
      <br>
      Jadwal Perawatan
    <div class="name">Coba sekarang dan nikmati perjalanan tanpa khawatir!</div>
      </div>
    </div>
  </div>
</div>

  <div id="logoutPopup" class="popup">
  <div class="popup-content">
    <p>Yakin ingin keluar?</p>
    <button class="confirm-btn" onclick="logout()">Ya</button>
    <button class="cancel-btn" onclick="closeLogoutPopup()">Batal</button>
  </div>
</div>

<?php if (session()->getFlashdata('login_success')): ?>
  <div id="custom-alert" class="alert-box">
    <span><?= session()->getFlashdata('login_success') ?></span>
    <button onclick="closeAlert()">✖</button>
  </div>
  </body>
  
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
<?php endif; ?>



<script>
function openLogoutPopup() {
    console.log("Popup logout dibuka");
    document.getElementById("logoutPopup").style.display = "flex";
}

function closeLogoutPopup() {
    console.log("Popup logout ditutup");
    document.getElementById("logoutPopup").style.display = "none";
}

function logout() {
    console.log("Logout diklik");
    window.location.href = "logout"; // Sesuaikan dengan URL logout
}
</script>

<script>
  document.addEventListener("DOMContentLoaded", function() {
  const menuToggle = document.querySelector(".menu-toggle");
  const nav = document.querySelector(".nav");

  menuToggle.addEventListener("click", function() {
    nav.classList.toggle("active");
  });
});

</script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>