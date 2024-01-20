<?php
// Inclure le fichier de connexion à la base de données
include("connexion.php");

// Vérifier si un ID est défini dans l'URL et le désinfecter
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Récupérer les détails du vélo depuis la base de données
$stmt = $bdd->prepare("SELECT id, nom, description, prix, image_url FROM velos WHERE id = ?");
$stmt->execute([$id]);
$velo = $stmt->fetch();


?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Description du Vélo</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">


    <head>

</head>
 
</head>
<body>
<?php include("header.php"); ?>
<div class="products">
        <div class="product-image">
            <img src='<?php echo $velo['image_url']; ?>' alt='<?php echo $velo['nom']; ?>'>
        </div>


        
        <div class="product-details">
            <h2><?php echo $velo['nom']; ?></h2>
           

            <div class="price"><?php echo $velo['prix']; ?> €</div>
            <p><?php echo $velo['description']; ?></p>
            <!-- Ici, ajoutez d'autres éléments de détail si nécessaire -->
            <div class="contact">
                <!-- Les boutons peuvent être adaptés à vos fonctionnalités réelles, par exemple pour ajouter au panier -->
                <a href="commande.php"><button>Au panier</button></a>
            </div>
    <div class="purchase-details">
        <div class="membership-benefits">
            <h3>Membership benefits</h3>
            <p>Coupon de 3 jours : jusqu'à 80 $ de réduction Réclamez maintenant </p>
</div>
        <div class="protection">
            <h4>DETAILS</h4>
            <p>Protection avec 💰 Trade Assurance</p>
            
            <div class="shipping"> 
                <p>Contacter le fournisseur pour négocier les détails d'expédition</p>
                <p>Enjoy On-time Dispatch Guarantee ℹ</p>
            </div>
            <div class="payments">
                <p>Payments</p>
                <!-- Insérez vos images de paiement ici -->
                <img src="https://www.1min30.com/wp-content/uploads/2017/04/Symbole-Visa.png" alt="Visa">
                <img src="data:image/png;base64,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" alt="PayPal">
                <img src="data:image/png;base64,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" alt="Apple Pay">
                <img src="data:image/png;base64,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" alt="Google Pay">
                <!-- ... -->
             
        </div>
    </div>

    <!-- ... Autres contenus ... -->
</div>

                </div>



        </div>
    </div> 

    
</div>

<?php include("footer.php"); ?>

   
</body>
</html>

