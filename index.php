<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <meta http-equiv="refresh" content="1"> -->
    <link href="./fonts/css/all.css" rel="stylesheet"> <!--load all styles -->
        <title>HomePage</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
        <link rel="stylesheet" href="./styles/style.css">
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head> 
<body>
<?php 
    include_once 'functions.php';
    // unset($_SESSION['cart']);
    if(isset($_POST["add_to_cart"])){
        echo '<script>
        swal({
            title: "Produit bien ajouté!",
            // text: "Produit bien ajouté!",
            icon: "success",
            button: "Continuer!",
          }); </script>';
        if(isset($_SESSION['cart'])){
            // echo @$_GET['pname'];
            $session_array_id = array_column($_SESSION['cart'],"id");
            if(!in_array($_GET['id'], $session_array_id)){
                $session_array = array(
                    'id'=> $_GET['id'],
                    'pname'=> $_POST['pname'],
                    'pprice'=> $_POST['pprice'],
                    'pimage'=> $_POST['pimage'],
                    'pcode'=> $_POST['pcode'],
                    'qty' => $_POST['qty']

                );
                $_SESSION['cart'][] = $session_array;
            }
        }else {
            $session_array =array( 
                'id'=> $_GET['id'],
                'pname'=> $_POST['pname'],
                'pprice'=> $_POST['pprice'],
                'pimage'=> $_POST['pimage'],
                'pcode'=> $_POST['pcode'],
                'qty' => $_POST['qty']

            );
            $_SESSION['cart'][] = $session_array;
        }
    }
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
            <li><a class="dropdown-item" href="mesCommande.php">Mes Commandes</a></li>
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

    <div class="Categorie">
        <?php
            $affichageCategorie = new Functions();
            $affichageCategorie -> affichagesCategorie();
        ?>
    </div>

    <div class="produitsRecent">
            <?php
            $affichageProduit = new Functions();
            $affichageProduit -> affichagesProduits();
            
        ?>
    </div>
    <div class="ProduitVendu">
        <div id="rightBox">
                <h4>Dernière Ventes:</h4>
                <div id="eachProducts">
                    <?php 
                        $affichageProduit = new Functions();
                        $affichageProduit -> affichageVente();
                    ?>
                <div>
        <div>
</div>

        <!-- <?php
    print_r(@$_SESSION['cart']);
    if (!empty($_SESSION['cart'])) {
        foreach($_SESSION['cart'] as $key => $value){
            echo $value['qty'];
        }
    }
?> -->
</body>
</html>