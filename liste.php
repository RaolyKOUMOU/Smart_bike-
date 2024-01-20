<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Vélos</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style1.css">

</head>
<body>
<!DOCTYPE html>
<html lang="fr">
<head>
    <!-- ... vos autres balises meta et style ... -->
</head>
<body>
<?php include("header.php") ?>

<div class="container">
        <h1 class="page-title">Nos Vélos</h1>


    <div class="container">
        <?php
         // Inclusion du fichier de connexion à la base de données
        include("connexion.php");
         // Récupération des informations sur les vélos depuis la base de données
        $velos = $bdd->query("SELECT id, nom, description, prix, image_url FROM velos")->fetchAll();

        // Calcul du nombre total de vélos
        $total = count($velos);

         // Définition du nombre de vélos à afficher par ligne
        $parLigne = 2;

        // Boucle pour afficher les vélos
        for ($i = 0; $i < $total; $i++) {
             // Si l'indice actuel est un multiple du nombre de vélos par ligne
            if ($i % $parLigne == 0) {
                 // Si ce n'est pas le premier passage dans la boucle, fermer la div précédente
                if ($i > 0) {
                    echo "</div>";
                }
                echo "<div class='row'>";
            }
            // Récupération des données du vélo actuel
            $velo = $velos[$i];
            // Affichage des informations du vélo
            echo "<div class='velo'>
                    <img src='".$velo['image_url']."' alt='".$velo['nom']."'>
                    <h2>".$velo['nom']."</h2>
                  
                    <div class='price'>".$velo['prix']." €</div>
                    <a href='description.php?id=".$velo['id']."' class='buy-button'>Acheter</a>
                  </div>";
        }
        // Si le nombre total de vélos n'est pas un multiple du nombre de vélos par ligne, fermer la dernière div
        if ($total % $parLigne != 0) {
            echo "</div>";
        }
        ?>
    </div>
</body>
</html>

    </div>
    <?php include("footer.php") ?>
</body>
</html>
