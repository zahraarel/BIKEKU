<!-- app/Views/register.php -->
<!DOCTYPE html>
<html lang="en">
<style>
    * {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Montserrat", sans-serif;
}

body {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
  min-height: 100vh;
  background: url("img/lp.png") no-repeat;
  background-position: center;
  background-size: cover;
}

.wrapper {
  width: 420px;
  background: rgb(255, 255, 255, 0.3);
  backdrop-filter: blur(10px);
  border-radius: 10px;
  padding: 30px 40px;
}
.wrapper h1 {
  font-size: 36px;
  text-align: center;
  font-weight: 750;
}
.wrapper .input-box {
  position: relative;
  width: 100%;
  height: 50px;
  margin: 30px 0;
}

.input-box input {
  width: 100%;
  height: 100%;
  background: transparent;
  border: none;
  outline: none;
  border: 2px solid rgba(255, 255, 255, 0.2);
  border-radius: 40px;
  font-size: 16px;
  color: #121212;
  padding: 20px 45px 20px 20px;
  font-weight: 500;
}
.input-box input::placeholder {
  color:rgb(41, 41, 36);
  font-weight: 500;
}
.input-box i {
  position: absolute;
  right: 20px;
  top: 50%;
  transform: translateY(-50%);
  font-size: 20px;
}

.wrapper .btn {
  width: 100%;
  height: 45px;
  background: #f7f7f7;
  border: none;
  outline: none;
  border-radius: 40px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 1);
  cursor: pointer;
  font-size: 16px;
  color: #333;
  font-weight: 400;
}

.wrapper .btn:hover {
  width: 100%;
  height: 45px;
  background: #EA3323;
  border: none;
  outline: none;
  border-radius: 40px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 1);
  cursor: pointer;
  font-size: 16px;
  color: #f7f7f7;
  font-weight: 600;
  transition: 0.5s;
}

.wrapper .btn-back {
  text-decoration: none;
  text-align: center;
  width: 100%;
  align-self: center;
  margin: auto;
  margin-top: 10px;
  height: 45px;
  background: #f7f7f7;
  border: none;
  outline: none;
  border-radius: 40px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 1);
  cursor: pointer;
  font-size: 16px;
  color: #333;
  font-weight: 400;
  text-justify: distribute;
}


.wrapper .btn-back:hover {
  width: 100%;
  height: 45px;
  background: #212529;
  border: none;
  outline: none;
  border-radius: 40px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 1);
  cursor: pointer;
  font-size: 16px;
  color: #f7f7f7;
  font-weight: 600;
  transition: 0.5s;
}

/* From Uiverse.io by andrew-demchenk0 */ 
.error {
  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
  width: 320px;
  padding: 12px;
  display: flex;
  flex-direction: row;
  align-items: center;
  justify-content: start;
  background: #EF665B;
  border-radius: 8px;
  box-shadow: 0px 0px 5px -3px #111;
}

.error__icon {
  width: 20px;
  height: 20px;
  transform: translateY(-2px);
  margin-right: 8px;
}

.error__icon path {
  fill: #fff;
}

.error__title {
  font-weight: 500;
  font-size: 14px;
  color: #fff;
}

.error__close {
  width: 20px;
  height: 20px;
  cursor: pointer;
  margin-left: auto;
}

.error__close path {
  fill: #fff;
}


</style>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewprot" content="width=device-width,initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <title>Register</title>
</head>

<body>
<div class="wrapper">
  <h1>Register</h1>
  <!-- Menampilkan Notifikasi Error -->
    <?php if (session()->getFlashdata('error')): ?>
      
<div class="error">
    <div class="error__icon">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" viewBox="0 0 24 24" height="24" fill="none"><path fill="#393a37" d="m13 13h-2v-6h2zm0 4h-2v-2h2zm-1-15c-1.3132 0-2.61358.25866-3.82683.7612-1.21326.50255-2.31565 1.23915-3.24424 2.16773-1.87536 1.87537-2.92893 4.41891-2.92893 7.07107 0 2.6522 1.05357 5.1957 2.92893 7.0711.92859.9286 2.03098 1.6651 3.24424 2.1677 1.21325.5025 2.51363.7612 3.82683.7612 2.6522 0 5.1957-1.0536 7.0711-2.9289 1.8753-1.8754 2.9289-4.4189 2.9289-7.0711 0-1.3132-.2587-2.61358-.7612-3.82683-.5026-1.21326-1.2391-2.31565-2.1677-3.24424-.9286-.92858-2.031-1.66518-3.2443-2.16773-1.2132-.50254-2.5136-.7612-3.8268-.7612z"></path></svg>
            </div>
            <div class="error__title" style="font-size: 12px;"><?= session()->getFlashdata('error') ?></div>
          </div>
    <?php endif; ?>
    


    <form action="register" method="POST">
        <?= csrf_field() ?>
        <div class="input-box">
        <input type="text" name="username" id="username" placeholder="Masukkan Username" required><br><br>
        <i class='bx bxs-user' ></i>
        </div>

        <div class="input-box">
        <input type="email" name="email" id="email" placeholder="Masukkan Email Aktif" required><br><br>
        <i class='bx bx-envelope'></i>
        </div>

        <div class="input-box">
        <input type="password" name="password" id="password" placeholder="Masukkan Password" required><br><br>
        <i class='bx bxs-lock' ></i>
        </div>

        <button type="submit" class="btn">Register</button>
        <a href="login">
            <button  type="button" class="btn-back">Kembali</button>
        </a>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

</div>

</body>

</html>