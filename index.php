<?php
session_start();

if(isset($_SESSION['status']) && $_SESSION['status']=="login"){
    header("location:dashboard/index.php?message=selamat datang");

}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta
      http-equiv="X-UA-Compatible"
      content="IE=edge"
    />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0"
    />
    <link
      rel="stylesheet"
      href="bootstrap/css/bootstrap.css"
    />
    <title>Absensi</title>



  </head>
  <body class="text-dark">
    <div class="container">
      <div class="wrapper d-flex justify-content-center">
        <form
          class="d-flex bg-light flex-column align-center"
          action="login.php"
          method="POST"
        >
          <h1 class="text-center fw-bolder pt-4 pb-4">ABSEN</h1>
         

          <?php
             
                    if(isset($_GET['message'])){
                       ?>
          <div class="warn msg position-absolute text-center p-0 m-0">
            <?php
                        echo $_GET['message'];
                        ?>
          </div>
          <?php
                    }
                    
                    ?>
                 
                    <div class="input-box">
          <input
            class="input satu mx-auto"
            name="user_id"
            type="text"
            required
          />
          <label
            class="first"
            for=""
            >Nomor Induk Siswa</label
          >
          </div>
          <div class="input-box">
          <input
            class="input dua mx-auto"
            name="password"
            type="password"
            required
          />
          <label
            class="second"
            for=""
            >Password</label
          >
          </div>
          <button
            class="btn btn-primary login py-2"
            type="submit"
            name="login"
          >
            MASUK
          </button>
        </form>
      </div>
    </div>
  </body>
</html>

<style>

/* font */
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap');
body {
  background-color: #eaeaea;
}
form {
  font-family: 'Poppins', sans-serif;

  border: 1px solid black;
  width: 40%;

  height: 80vh;
  padding: 10px 20px;
  border-radius: 10px;
  overflow: hidden;
  /* From https://css.glass */

  border-radius: 16px;

  border: 1px solid rgba(95, 159, 255, 0.41);
}
.wrapper {
  height: 100vh;
  align-items: center;
}

form input {
  opacity: 1;
  border: none;
  background-color: rgba(255, 255, 255, 0);
  border-bottom: 1px solid rgb(181, 181, 181);
  width: 80%;
  outline: none;
  display: flex;
  z-index: 3;
  color: #5f9fff;
}
form input,
button {
  font-size: 20px;
  padding: 10px 10px;
  margin: 25px;
}

.msg {
  display: flex;
  left: 34%;
  top: 80vh;
  margin: auto;
  width: 32%;
  height: 50px;
  background-color: red;
  color: white;
  align-items: center;
  justify-content: center;
  border-radius: 5px;
  transition: .8s;
}
label {
  position: absolute;
  display: flex;
  z-index: 2;
  opacity: 50%;

  transition: 0.8s;
  outline: none;
  border: none;
  font-size: 20px;
}

.first {
  top: 35%;
  left: 38%;
}
.second {
  top: 51%;
  left: 38%;
}

.input-box input:focus ~ label {
  transform: translateY(-32px);
  font-size: 14px;
  color: black;
}
.input-box input:focus {
  outline: 2px solid #5f9fff;
  border: none;
  border-radius: 5px;
  color: black;
  border-bottom: 1px solid #5f9fff;
}
.input-box input:valid ~ label {
  transform: translateY(-32px);
  font-size: 14px;
  color: black;
}


</style>