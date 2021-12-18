<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/styleLoginRegister.css">
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<link rel="stylesheet" href="./styles/style.css">
    <title>Inscription</title>
</head>
<body>
    <!-- <h1>Inscription</h1> -->
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

    <div class="registerForm" style="margin-top: 28px;text-align:center;">
      <form method="POST">
          <h4>Inscription</h4>
  
            
            </br></br>
            <input type="text" name="cliNom" placeholder="Votre nom">
            </br></br>  
            <input type="text" name="cliPrenom" placeholder="Votre Prenom">
            </br></br>
            <input type="text" name="cliCpostal" placeholder="Le code postal">
            </br></br>
            <input type="te xt" name="cliMail" placeholder="Votre Adresse Mail">
            </br></br>
            <input type="password" name="cliMDP" placeholder="Mot de passe">
            <br></br>
            <input type="submit" value="Creer Mon Compte" name="submit"></input>
            <!-- <input type="submit" value="Effacer" name="erase"></input> -->
        </form>

        <br>
        <a href="index.html">Retour au menu</a>
    </div>

    <?php

        include "db.php";

        $classConnect = new Db();
        $connectdB = $classConnect -> connection();
        
        $cliNom = isset($_POST['cliNom']) ? $_POST['cliNom'] : '';
        $cliPrenom = isset($_POST['cliPrenom']) ? $_POST['cliPrenom'] : '';
        $cliCpostal = isset($_POST['cliCpostal']) ? $_POST['cliCpostal'] : '';
        $cliMail = isset($_POST['cliMail']) ? $_POST['cliMail'] : '';
        $cliMDP = isset($_POST['cliMDP']) ? $_POST['cliMDP'] : '';
        
        
            if(isset($_POST['submit'])) {
        
                if((empty($cliNom) || empty($cliPrenom) || empty($cliCpostal) || empty($cliMail) || empty($cliMDP) )) {
                    echo '<b>Inserer la/les valeur(s)';
                
                }else{
        
                    $sql = "INSERT INTO Clients(cliNom,cliPrenom,cliCpostal,cliMail,cliMDP) VALUES ('$cliNom' ,'$cliPrenom','$cliCpostal','$cliMail','$cliMDP')";
        
                    $query = $connectdB -> prepare($sql);
                    $queryIsOk = $query -> execute();

                    if($queryIsOk) {
                        echo "<b>Votre compte na pas pu être creer <b>";
                    }else
                        {
                            echo '<div><b>Votre compte à bien était crée <b></div>';

                            $_SESSION['user_email']= $cliMail;

                            header("Location:myProfile.php");
                        }
            
                    }
                }
        
        if(isset($_POST['erase'])   ){
            echo '';
        }
            
    ?>

</body>
</html>