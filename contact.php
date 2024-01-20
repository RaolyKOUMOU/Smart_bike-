<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Formulaire de Contact</title>
<link rel="stylesheet" href="style1.css">


</head>
<body>
<?php include("header.php") ?>
<br>
<br>
<br>
<div class="container">

  <h1>Formulaire de contact</h1>
  <form action="contacts.php" method="post">
    <label  for="fname">Nom & prénom</label>
    <input type="text" id="fname" name="fullname" placeholder="Votre nom et prénom">

    <label for="sujet">Sujet</label>
    <input type="text" id="sujet" name="sujet" placeholder="L'objet de votre message">

    <label for="emailAddress">Email</label>
    <input id="emailAddress" type="email" name="email" placeholder="Votre email">

    <label for="subject">Message</label>
    <textarea id="subject" name="message" placeholder="Votre message" style="height:200px"></textarea>

    <input type="submit" value="Envoyer">
  </form>
</div>
<br>
<br>
<?php include("footer.php") ?>
</body>
</html>
