<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <title>BIKEKU</title>
    
    <style>
    body {
        background-color: #000000;
        font-size: 16px;
        font-family: "Montserrat";
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

      /* From Uiverse.io by ernestnash */ 
      .btn {
      display: inline-block;
      padding: 0.9rem 1.8rem;
      font-size: 16px;
      font-weight: 700;
      color: #EA3323;
      border: 3px solid #EA3323;
      cursor: pointer;
      position: relative;
      background-color: transparent;
      text-decoration: none;
      overflow: hidden;
      z-index: 1;
      font-family: inherit;
      }

      .btn::before {
      content: "";
      position: absolute;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      background-color: #EA3323;
      transform: translateX(-100%);
      transition: all .3s;
      z-index: -1;
      }

      .btn:hover::before {
      transform: translateX(0);
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

  /* From Uiverse.io by MikeAndrewDesigner */ 
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

  .footer {
  background-color: #000000;
  color: #fff;
  padding: 20px 0;
  font-family: "Montserrat";
}

.footer .container {
  width: 90%;
  max-width: 1200px;
  margin: auto;
}

.footer-content {
  display: flex;
  justify-content: space-between;
  flex-wrap: wrap;
}

.footer-section {
  flex: 1;
  min-width: 200px;
  margin: 10px 15px;
}

.footer-section h3, .footer-section h4 {
  margin-bottom: 15px;
  font-size: 18px;
  color: #f9a825;
}

.footer-section p, .footer-section ul {
  font-size: 14px;
  line-height: 1.6;
}

.footer-section ul {
  list-style: none;
  padding: 0;
}

.footer-section ul li {
  margin-bottom: 10px;
}

.footer-section ul li a {
  color: #fff;
  text-decoration: none;
}

.footer-section ul li a:hover {
  text-decoration: none;
  transform: scale(1.2);
  transition: transform 0.3s ease, color 0.3s ease; 
  color: #f9a825; 
}


.footer-bottom {
  text-align: center;
  margin-top: 20px;
  font-size: 14px;
  color: #aaa;
}

.social-media {
  margin-top: 15px;
}

.social-media a {
  display: inline-block;
  margin-right: 10px;
}

.social-media img {
  width: 30px; /* Ukuran ikon */
  height: 30px;
  transition: transform 0.3s ease; 
}

.social-media img:hover {
  transform: scale(1.2); 
}

@media screen and (max-width: 768px) {
  .carousel-caption h1 {
    font-family: "Montserrat", serif;
    font-size: 200px;
    font-weight: 900;
    font-style: normal;
  }

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
  .carousel-caption h1 {
    font-family: "Montserrat", serif;
    font-size: 1cap;
    font-weight: 900;
    font-style: normal;
  }

    .fiturinfo .card {
        width: 90%;
    }

    .e-card {
        height: auto;
        padding: 20px;
    }
}


</style>
</head>
<div>
<div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="img/lp.png" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
                <h1>BIKEKU</h1>
                <p>Rawat kendaraan anda bersama kami!!!</p>
                <!-- From Uiverse.io by ernestnash -->
              <a href="login" class="btn">Masuk</a>
        </div>
    </div>
    <div class="carousel-item">
      <img src="img/loc.png" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h1>BIKEKU</h1>
            <p>Rawat kendaraan anda bersama kami!!!</p>
              <a href="login"  class="btn">Masuk</a>
            </div>
          </div>
      <div class="carousel-item ">
      <img src="img/db.png" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h1 style="color: #121212;">BIKEKU</h1>
            <p style="color: #121212;">Rawat kendaraan anda bersama kami!!!</p>
              <a href="login"  class="btn">Masuk</a>
            </div>
          </div>
        </div>
      </div>
    <br>

  <div class="fiturinfo">
    <!-- From Uiverse.io by MikeAndrewDesigner --> 
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
<br>
<br>
  
<footer class="footer">
  <div class="container">
    <div class="footer-content">
      <div class="footer-section about">
        <h3>BIKEKU</h3>
        <p>Rawat kendaraan Anda bersama kami dengan pelayanan terbaik dan profesional.</p>
      </div>
      <div class="footer-section contact">
        <h4>Kontak</h4>
        <p>Email: support@bikeku.com</p>
        <p>Alamat: Jl. Mekar Jaya No. 15, Bandung</p>
        <div class="social-media">
          <a href="https://wa.me/085157252244" target="_blank">
            <img src="IMG\logo\01_Glyph\01_Digital\03_PNG\Green\Digital_Glyph_Green.png" alt="Facebook">
          </a>
          <a href="https://instagram.com" target="_blank">
            <img src="IMG\logo\01 Static Glyph\01 Gradient Glyph\Instagram_Glyph_Gradient.png" alt="Instagram">
          </a>
          <a href="https://twitter.com" target="_blank">
            <img src="IMG\logo\X\logo-white.png" alt="Twitter">
          </a>
          <a href="https://facebook.com" target="_blank">
            <img src="IMG\logo\Facebook Brand Asset Pack\Logo\Primary Logo\Facebook_Logo_Primary.png" alt="YouTube">
          </a>
        </div>
      </div>
    </div>
    <div class="footer-bottom">
      <p>&copy; 2025 BIKEKU. All rights reserved.</p>
    </div>
  </div>
</footer>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</html>