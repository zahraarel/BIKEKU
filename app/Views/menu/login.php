<!-- app/Views/login.php -->
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
  background: url("img/db2.png") no-repeat;
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
  color: #000000;
  padding: 20px 45px 20px 20px;
}
.input-box input::placeholder {
  color: #ffffff;
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

.wrapper .btn-reg {
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


.wrapper .btn-reg:hover {
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

 .cancel-btn {
    padding: 10px 20px;
    margin: 5px;
    border: none;
    cursor: pointer;
    font-size: 16px;
    border-radius: 5px;
  }

  .cancel-btn {
    background: #d9534f;
    color: white;
  }

  .cancel-btn:hover {
    background: #c9302c;
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
    <title>Login</title>
</head>
</head>

<body>
<div class="wrapper">
  <a href="/">
  <button type="button" class="btn-close"  data-bs-theme="dark" aria-label="Close"></button>
  </a>
    <h1>Login</h1>
    <form action="<?= base_url('login/authenticate') ?>" method="POST">
        <?= csrf_field() ?>

        <div class="input-box">
            <input type="email" name="email" id="email" placeholder="Email" required><br><br>
            <i class='bx bxs-user' ></i>
        </div>


        <div class="input-box">
            <input type="password" name="password" id="password" placeholder="Password" required><br><br>
            <i class='bx bxs-lock' ></i>
        </div>

                <button type="submit" class="btn">Login</button>
              </form>

                <a href="register" class="btn-reg-link">
                <button type="button" class="btn-reg">Register</button>
                </a>

      <div id="logoutPopup" class="popup">
        <div class="popup-content">
          <p>Email atau password yang anda masukkan salah</p>
          <button class="cancel-btn" onclick="closeLogoutPopup()">Kembali</button>
        </div>
      </div>


<?php if (session()->getFlashdata('error')): ?> 
  <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById("logoutPopup").style.display = "block";
        });
    </script>
<?php endif; ?>


    </div>
    <script>
    function openLogoutPopup() {
    console.log("Popup logout dibuka");
    document.getElementById("logoutPopup").style.display = "flex";
    }

    function closeLogoutPopup() {
        console.log("Popup logout ditutup");
        document.getElementById("logoutPopup").style.display = "none";
    }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

</body>

</html>