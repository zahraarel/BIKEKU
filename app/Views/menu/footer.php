<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<style>
  
  .footer {
  background-color: #000000;
  color: #fff;
  padding: 20px 0;
  font-family: "Montserrat";
}

.footer .container {
  text-align: left;
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
  text-align: center ;
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

</style>

<body>
    


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