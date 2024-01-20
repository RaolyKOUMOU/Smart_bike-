<?php

try {
    // Connexion à la base de données MySQL
    $bdd = new PDO("mysql:host=mysql-smartbikefr.alwaysdata.net;dbname=smartbikefr_admin", "338291_ad", "Princewolf12@");

    // Définir le mode d'erreur pour afficher les exceptions
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // En cas d'échec de la connexion, afficher le message d'erreur
    echo "Problème de connexion à la base de données : " . $e->getMessage();
}

// Récupérer la liste des vélos depuis la base de données
$sql = "SELECT * FROM velos";
$resultat = $bdd->query($sql);
$velos = $resultat->fetchAll(PDO::FETCH_ASSOC);

// Traiter le formulaire de commande lorsqu'il est soumis en POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $id_velo = $_POST['velo'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Enregistrez la commande dans la base de données
    $sql_commande = "INSERT INTO commandes (id_velo, nom, prenom, email, message) VALUES (?, ?, ?, ?, ?)";
    $stmt_commande = $bdd->prepare($sql_commande);
    $stmt_commande->execute([$id_velo, $nom, $prenom, $email, $message]);

    // Afficher un message de succès
    echo " ";
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commander</title>
    <link rel="stylesheet" href="styles.css">
        
 
</head>
<body>
<?php include("header.php"); ?>
    <h1>Commande</h1>

    <form method="post" action="">
        <label for="velo">Sélectionnez un vélo :</label>
        <select name="velo" id="velo" required>
            <?php foreach ($velos as $velo) : ?>
                <option value="<?php echo $velo['id']; ?>"><?php echo $velo['nom']; ?></option>
            <?php endforeach; ?>
        </select>

        <label for="nom">Nom :</label>
        <input type="text" name="nom" required>

        <label for="prenom">Prénom :</label>
        <input type="text" name="prenom" required>

        <label for="email">Email :</label>
        <input type="email" name="email" required>

        <label for="message">Message :</label>
        <textarea name="message" rows="4" required></textarea>

        <button type="submit">Envoyer</button>
    </form>
    <?php include("footer.php"); ?>
</body>
</html>