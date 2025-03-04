<?php 
require "Backend/functions.php";
session_start();

if( isset($_POST["login"])){
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM admins WHERE username = '$username'");
    if( mysqli_num_rows($result) === 1){
        $row = mysqli_fetch_assoc($result);
        if( password_verify($password, $row["password"])){
            $_SESSION["id"] = $row["id"];
            header("Location: dashboard.php");
            exit;
        }
    }

    $error = true;
}



?>


<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login Page</title>
    <link rel="stylesheet" href="login.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
      rel="stylesheet"
    />
  </head>
  <body>
    <div class="login-container">
      <div class="login-header">
        <h1>Login Dashboard Admin</h1>
        <p>Silahkan masuk untuk melanjutkan</p>
      </div>

      <form action="" method="post">
        <div class="form-group">
          <label for="username">Username</label>
          <input
            type="text"
            id="username"
            name="username"
            class="form-control"
            placeholder="Placeholder"
          />
        </div>

        <div class="form-group">
          <label for="password">Password</label>
          <input
            type="password"
            id="password"
            name="password"
            class="form-control"
            placeholder="Placeholder"
          />
          <div class="password-info">
            Password harus merupakan kombinasi dari minimal 8 huruf, angka, dan
            simbol.
          </div>
        </div>

        <button type="submit" class="btn-login" name="login">Masuk</button>
      </form>
    </div>
  </body>
</html>
