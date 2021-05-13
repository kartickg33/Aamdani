<?php session_start();?>
<nav
      class="navbar sticky-top navbar-expand-lg navbar navbar-dark bg-dark"
      id="navbar"
    >
      <div class="container-fluid">
        <a class="navbar-brand" href="">Aamdani</a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNavAltMarkup"
          aria-controls="navbarNavAltMarkup"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div
          class="collapse navbar-collapse justify-content-end"
          id="navbarNavAltMarkup"
        >
          <div class="navbar-nav justify-content-evenly">
            <a class="nav-link px-4" href="./index.php">Home</a>
            <a class="nav-link px-4" href="#services">Services</a>
            <a class="nav-link px-4" href="./search.php">Search</a>
            <a class="nav-link px-4" href="#footer">Contact</a>
            <?php if(!isset($_SESSION['is_logged_in'])){
              echo '<a class="nav-link px-4" href="./login.php">Login</a>';
            }else{
              echo '<a class="nav-link px-4" href="./dashboard.php">Dashboard</a>';
            }
            ?>
            
          </div>
        </div>
      </div>
    </nav>
