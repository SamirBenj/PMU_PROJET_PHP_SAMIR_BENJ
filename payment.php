<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <script  src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="./styles/paymentStyle.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

    <title>Payment en cours...</title>
</head>
<body>
    <div class="paymentDiv" style='margin:50px'>
<div class="container p-0">
    <div class="card px-4">
        <p class="h8 py-3">Proceder au Paiement</p>
                   <form method="POST" action="payment.php">
 <div class="row gx-3">
            <div class="col-12">
                <div class="d-flex flex-column">
                    <p class="text mb-1">Nom </p> <input name="nom"  required class="form-control mb-3" type="text" placeholder="Name" value="Samir">
                </div>
            </div>
            <div class="col-12">
                <div class="d-flex flex-column">
                    <p class="text mb-1">Numero de votre carte</p> <input name="numeroVisa" required class="form-control mb-3" type="text" placeholder="1234 5678 435678">
                </div>
            </div>
            <div class="col-12">
                <div class="d-flex flex-column">
                    <p class="text mb-1">Adresse de Livraison</p> <input name="livraisonAdresse" required class="form-control mb-3" type="text" placeholder="1234 5678 435678">
                </div>
            </div>
            <div class="col-6">
                <div class="d-flex flex-column">
                    <p class="text mb-1">Expire</p> <input class="form-control mb-3" name="expirationDate" required type="text" placeholder="MM/YYYY">
                </div>
            </div>
            <div class="col-6">
                <div class="d-flex flex-column">
                    <p class="text mb-1">CVV/CVC</p> <input name="cryptograme" class="form-control mb-3 pt-2 " required type="password" placeholder="*******">
                </div>
            </div>
            <div class="col-12">
                <!-- <div > <span class="ps-3">Valider</span> <span class="fas fa-arrow-right"></span> </div> -->
                <input style="text-align:center;display:block;" class="btn btn-primary mb-3" required type="submit" name="add_to_payment"  value='VALIDER' id="">
            </div>
        </div>            
    </form>

    </div>
</div>
</div>

<?php
    include_once 'functions.php';
        // include "db.php";

    if(isset($_POST['add_to_payment'])){

    $classConnect = new Db();
    $connectdB = $classConnect -> connection(); 
    $comPrix = isset($_POST['comPrix']) ? $_POST['cliMail'] : '';
    $comClientID = isset($_POST['cliMDP']) ? $_POST['cliMDP'] : '';
    $comNomProduit = isset($_POST['cliMDP']) ? $_POST['cliMDP'] : '';
    $comPrix = isset($_POST['cliMDP']) ? $_POST['cliMDP'] : '';
    $comCategorie = isset($_POST['cliMDP']) ? $_POST['cliMDP'] : '';

    $sql = "INSERT INTO commande(comDate,comClient,comCleint,cliMail,cliMDP) VALUES ('$cliNom' ,'$cliPrenom','$cliCpostal','$cliMail','$cliMDP')";

    if($queryIsOk) {

        echo '<b>Impossible de proceder à votre commande<b>';
        
    }else
    $numeroVisa = isset($_POST['numeroVisa']) ? $_POST['numeroVisa'] : '';
    $cryptograme = isset($_POST['cryptograme']) ? $_POST['cryptograme'] : '';
    $expirationDate = isset($_POST['expirationDate']) ? $_POST['expirationDate'] : '';


        // $addPaiement = new Functions();
        // $addPaiement -> addPaiment($numeroVisa,$cryptograme,$expirationDate);
        {
        echo' <script>
        
        swal({
            title: "Vorre commande à bien était envoyé !",
            // text: "Votre à bien etait enregistre jesepreq ue ",
            icon: "success",
            button: "Continuer!",
          }).then((success)=>{

            // window.location.href="index.php";
          });
           </script>';
           
        }
    


    }else {

        echo 'not good';
    }
?>
</body>
</html>