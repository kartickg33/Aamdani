<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link rel="stylesheet" href="style.css" />
    <link
      href="https://fonts.googleapis.com/css?family=Montserrat"
      rel="stylesheet"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1"
      crossorigin="anonymous"
    />
  </head>

  <body>
    <!-- NavBar-->
    <?php include "includes/navigation.php"?>
    <?php
    if(isset($_SESSION["incorrect_password"])){
      echo "<script>alert('Incorrect Credentials');</script>";
      unset($_SESSION["incorrect_password"]);
    }
    ?>
    <!-- Apply card-->
    <div
      class="row mt-5 mb-5 ms-5 me-5 justify-content-sm-center d-flex"
      style="height: 488.4px"
    >
      <div class="col-md-6" id="login"></div>
      <div class="col-md-5" id="form">
        <div>
          <!-- NavBar for login/register-->
          <nav class="nav nav-masthead justify-content-center float-md-right">
            <a class="nav-link active login" aria-current="page" href=""
              >LOGIN</a
            >
            <a class="nav-link register" href="./register.php">REGISTER</a>
          </nav>
        </div>
        <form action="includes/signIn.php" class="login__form" method="post">
          <div class="align-middle">
            <div class="input-group-lg mb-3">
              <input
                type="text"
                name="username"
                placeholder="Username"
                id="username"
                class="form-control"
                autofocus
                required
              />
            </div>
            <div class="input-group-lg mb-3">
              <input
                type="password"
                name="password"
                placeholder="Password"
                id="password"
                class="form-control"
                required
              />
            </div>
            <div class="mb-3" id="submit">
              <button class="login-submit" name = "login">Login</button>
            </div>
          </div>
        </form>
      </div>
    </div>

    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"
      integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js"
      integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj"
      crossorigin="anonymous"
    ></script>
    <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.min.js"></script>
  </body>
</html>
