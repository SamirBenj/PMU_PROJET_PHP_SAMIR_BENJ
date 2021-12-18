<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes commandes</title>
    <link rel="stylesheet" href="./styles/style.css">
    <link href="./fonts/css/all.css" rel="stylesheet"> <!--load all styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>
<body>
    <?php
        include_once 'functions.php'
    ?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">PMU</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" style="color:white; font-weight:bold;" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Autres
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="conseils.php" >Conseils</a></li>
            <li><a class="dropdown-item" href="#">Promotions</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="mesCommandes.php">Mes Commandes</a></li>
          </ul>
        </li>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">
            <span class="fas fa-home"> Accueil</a></span>
          
        </li>
        <li class="nav-item">
          <a class="nav-link" href="myProfile.php" style="color:white;">
          <span class="fas fa-user-circle"> Mon Compte</a></span>
        </li>
        
        <li class="nav-item" >
          <a class="nav-link" href="login.php" style="color:white;">
          
          <span class="fas fa-sign-in-alt" > Se Connecter</a></span>
        </li>
        <li class="nav-item" >
          <a class="nav-link" href="monPanier.php" style="color:white;">

          <span class="fas fa-shopping-cart"> <?php if(isset($_SESSION['cart'])){
            echo count($_SESSION['cart']);
          } else {
            echo '0';
          }
          ?></a></span>
        </li>
      </ul>
      <!-- <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form> -->
    </div>
  </div>
</nav>
    <div class="col-md-6" style="float:none;margin:auto; margin-top:20px">
<h4 style="text-align:center">Mes Commandes</h4>
<br>

    <table class='table table-bordered table-striped' style="float: none;
margin: auto;">
          <tr>
              <th>id</th>
              <th>Date</th>
              <th>Prix</th>
          </tr> 
          <tr>
          <?php 
                        $affichageCommande = new Functions();
                        $affichageCommande -> affichageCommande();
                    ?>
              <tr>
          <table>
</div>
</body>
</html>