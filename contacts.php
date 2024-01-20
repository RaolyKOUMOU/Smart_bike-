<?php
include("connexion.php"); // Assurez-vous que ce fichier contient la connexion à la base de données avec l'objet $bdd

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Préparation de la requête SQL en utilisant l'objet PDO
    $stmt = $bdd->prepare("INSERT INTO contacts (nom, prenom, email, message) VALUES (?, ?, ?, ?)");

    // Séparation du nom et du prénom
    $pieces = explode(" ", $_POST['fullname']);
    $nom = $pieces[0];
    $prenom = isset($pieces[1]) ? $pieces[1] : "";
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Bind des valeurs et exécution de la requête
    $stmt->bindParam(1, $nom);
    $stmt->bindParam(2, $prenom);
    $stmt->bindParam(3, $email);
    $stmt->bindParam(4, $message);
    $stmt->execute();

    echo " ";

    $stmt = null; // Fermeture de la requête préparée
}
?>



