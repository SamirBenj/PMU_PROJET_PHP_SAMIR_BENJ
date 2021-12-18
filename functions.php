<?php 
    include "db.php";
              

    class Functions {
      
        public function affichagesProduits(){
            $classConnect = new Db();
            $connect = $classConnect -> connection();
            $sql = "SELECT * FROM Produit";

            $query = $connect -> prepare($sql);
            $queryIsOk = $query -> execute();
            if($queryIsOk){

                while($row = $query -> fetch(PDO::FETCH_OBJ)){

                    $id = $row -> id;
                    $prodNom = $row -> prodNom;
                    $prodPrix = $row -> prodPrix;
                    $prodImg = $row -> prodImgLink;
                    $productCode = $row -> prodCode;

                    // echo "<form action='index.php?action=&id=$value'>";
                    echo "<div id='produitSeule'>";
                        echo "<div>";                    // echo "<form action='index.php'>";
                    echo "<form method='post' action='index.php?id=$id'  >";

                        echo "<img src='./ImageProduits/bague.jpg'></img>";
                        echo "<h4>$row->prodNom</h4>";
                        echo "<p>$row->prodDescription</p>";
                        echo "<b>$prodPrix €</b>";
                        
                        echo "<br>";
                        echo "<input type='hidden' name='pid'  value='$id'></input> ";
                        echo "<input type='hidden' name='pname' value='$prodNom'></input> ";
                        echo "<input type='hidden' name='pprice' value='$prodPrix'></input> ";
                        echo "<input type='hidden' name='pimage' value='$prodImg'></input> ";
                        echo "<input type='hidden' name='pcode' value='$productCode'></input> ";

                        // echo "<input type='submit' name='product_id' ><span>Ajouter au Panier</span> <span <i class='fas fa-cart-arrow-down' </span>";
                        // echo "<a href='testCart.php?id=$id'>Add to cart</a>";
                        // echo "<input type='submit' name='product_id' value='ajouter'></input>";
                        echo "<input type='submit' name='add_to_cart' class='btn btn-primary' value='Ajouter au Panier' style='background-color:rgba(170, 170, 170, 1); border-style:none;' ></input>";
                        echo "<input type='input' id ='quantiterInput' name='qty' value='1'></input> ";

                        //<img width ='10px'src='./icon/cart.svg'>

                    echo "</form>";
                        echo "</div>";
                    echo "</div>";                 }
            }else {
                echo "not working";
            }
        }

        public function affichagesCategorie(){
            $classConnect = new Db();
            $connect = $classConnect -> connection();

            $sql = "SELECT * FROM Categorie";

            $query = $connect -> prepare($sql);
            $queryIsOk = $query -> execute();
            if($queryIsOk){
                // echo "it 's working catégorie ";
                // echo "<br>";
                while($row = $query -> fetch(PDO::FETCH_OBJ)){
                    // echo $row;
                    // echo "<div id='categorieSeul'>";
                    // echo "<h3>Nom categorie: </h3>".$row->categNom."</br>";
                    // echo "</div>";
                }
            }else {
                echo "not working";
            }
        }
        

public function affichageVente(){

    $classConnect = new Db();
    $connect = $classConnect -> connection();
    $sql = "SELECT  * FROM Vente";
    $query = $connect -> prepare($sql);

    $queryIsOk = $query -> execute();
   
    if($queryIsOk){
    while($ligne = $query->fetch(PDO::FETCH_OBJ)){
            
        echo ' <div id="produitVente">';
            echo '<img src="./ImageProduits/bague.jpg" alt="">';
                echo '<div id="info">';
                    echo '<h5>'.$ligne -> ventNomProduit.'</h5>';
                    echo '<h6>'.$ligne -> ventPrix.' €</h6>';
                echo '</div>';
        echo '</div>';
    }
    }else{
        echo "not working";
         }
        } 

        public function affichageConseils(){

            $DBconnexion = new Db();
            $Connected = $DBconnexion -> connection();
            $requeteSql = "SELECT nom,description, image, article FROM conseil";
            $requete = $Connected -> prepare($requeteSql);
    
            $queryIsOk = $requete -> execute();
    
            if($queryIsOk){
            while($ligne = $requete->fetch(PDO::FETCH_OBJ)){
    
                
                echo ' <div id="detailMontage">';
                echo '<img src="./ImageProduits/bague.jpg" alt="">';
                  echo '<div id="infoMontage">';
                    echo '<h5>'.$ligne -> nom.'</h5>';
                    echo '<h6>'.$ligne -> description.'</h6>';
                    echo '<p> article n° '.$ligne -> article.' </p>';

                echo '</div>';
                echo '</div>';
                }
            }else{
                echo "not working";
                 }
                }   
                
                public function affichageInformationProfile($usermail){

                    $DBconnexion = new Db();
                    $Connected = $DBconnexion -> connection();
                    $requeteSql = "SELECT * FROM Client WHERE cliMail=$usermail";
                    $requete = $Connected -> prepare($requeteSql);
            
                    $queryIsOk = $requete -> execute();
            
                    if($queryIsOk){
                    while($ligne = $requete->fetch(PDO::FETCH_OBJ)){
            
                        
                        echo ' <div id="detailMontage">';
                        echo '<img src="./ImageProduits/bague.jpg" alt="">';
                          echo '<div id="infoMontage">';
                            echo '<h5>'.$ligne -> nom.'</h5>';
                            echo '<h6>'.$ligne -> description.'</h6>';
                            echo '<p> article n° '.$ligne -> article.' </p>';
        
                        echo '</div>';
                        echo '</div>';
                        }
                    }else{
                        echo "not working";
                         }
                        }     

        public function addPaiment($numeroCarte,$crypto,$dateExpiration) {
            echo $numeroCarte;
            echo $crypto;
            echo $dateExpiration;
            $classConnect = new Db();
            $connect = $classConnect -> connection();
            $sql = "INSERT INTO Paiment(paieType,paieNumeroCarte,paieCrytogramme,paieDateExpiration) VALUES('carte','$numeroCarte','$crypto','2222')";
           //INSERT INTO Paiement(paieDate,paieType,paieNumeroCarte,paieCrytogramme,paieDateExpiration) VALUES ('2002-09-09','carte','220202','223','2002-09-09');

            $query = $connect -> prepare($sql);
        
            $queryIsOk = $query -> execute();
               
            if($queryIsOk){
        while($ligne = $query->fetch(PDO::FETCH_OBJ)){
                      
          
                        echo '<h5>'.$ligne -> paieNumeroCarte.'</h5>';
           
        }
        }else{
            echo "not working";
             }
        }
        public function affichageCommande() {
 
            $classConnect = new Db();
            $connect = $classConnect -> connection();
            $sql = "SELECT * FROM Commandes";

            $query = $connect -> prepare($sql);
        
            $queryIsOk = $query -> execute();
               
            if($queryIsOk){
        while($ligne = $query->fetch(PDO::FETCH_OBJ)){
                      
          echo "<table class='table table-bordered table-striped'>
          <tr>
              <th>ID</th>
              <th>Nom</th>
              <th>Prix</th>
              <th>Quantité</th>
              <th>Prix Total</th>
              <th>Action</th>
          </tr> ";
           
        }
        }else{
            echo "not working";
             }
        }

        

    }



// $displayTest = new Functions();
// $displayTest -> affichagesProduits();
?>