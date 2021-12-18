<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./fonts/css/all.css">
    <link rel="stylesheet" href="./styles/style.css">
    
    <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Mon pannier</title>
    
</head>
<body>
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
            <li><a class="dropdown-item" href="#">Mes Commandes</a></li>
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
<!-- <?php
session_start();
//Effacer une element dans le panier
// unset($_SESSION['cart']['id']);

    // var_dump($_SESSION['cart']);
    if (!empty($_SESSION['cart'])) {
        foreach($_SESSION['cart'] as $key => $value){
            echo $value['pname'];

        }
    }
?> -->


<div class="col-md-6" style="float:none;margin:auto;">
    <h2 class="text-center" style="margin:">Votre Panier</h2>
<?php 

    $total = 0;
    $output = "";
    $output = "
        <table class='table table-bordered table-striped'>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Prix</th>
            <th>Quantité</th>
            <th>Prix Total</th>
            <th>Action</th>
        </tr> 
        ";

        if(!empty($_SESSION['cart'])){
            
            foreach($_SESSION['cart'] as $key => $value){
                // echo $value['pname'];
                $output .= "
                    <tr>
                        <td>".$value['id']."</td>
                        <td>".$value['pname']."</td>
                        <td>".$value['pprice']."</td>
                        <td>".$value['qty']."</td>
                        <td>$".number_format($value['pprice'] * $value['qty'],2)."</td>
                        <td><a href='monPanier.php?action=remove&id=".$value['id']."'</td>
                            <button class='btn btn-danger btn-block'>Effacer</button>
                            </a>
                        </td>
                ";
                $total = $total + $value['qty'] * $value['pprice'];
            }
            $output .="
                <tr>
                    <td colspan='3'></td>
                    <td></b>Prix Total</b></td>
                    <td>".number_format($total,2)."</td>
                    <td>
                        <a href='monPanier.php?action=clearall' >
                            <button class='btn btn-success'>Effacer</button>
                        </a>
                    </td>


                <tr>                    
                <td>
                    <a href='payment.php' >
                        <button class='btn btn-primary'>Passser la Commande</button>
                    </a>
                </td>
            ";
        }
        echo $output;
?>
</div>

<?php

if(isset($_GET['action'])){


    if($_GET['action'] == "clearall"){
        unset($_SESSION['cart']);
    }

    if ($_GET['action']== "remove") {
        foreach($_SESSION['cart'] as $key => $value)
        if($value['id']== $_GET['id']){
            unset($_SESSION['cart'][$key]);
            }
        }
    }

?>
</body>
</html>