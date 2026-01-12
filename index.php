<?php
require_once 'auth_check.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Accueil</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <h1>Bienvenue <?= htmlspecialchars($_SESSION['user']['name']) ?></h1>
    <nav>
        <a href="index.php">Accueil</a>
        <a href="services.php">Services</a>
        <a href="contact.php">Contact</a>
        <a href="logout.php">Déconnexion</a>
    </nav>
</header>

<section>
    <h2>Notre activité</h2>
    <p>
        Nous sommes une boutique e-commerce spécialisée dans la vente de produits
        sélectionnés avec soin pour répondre aux besoins quotidiens de nos clients.
    </p>

    <p>
        Qualité, simplicité et satisfaction sont au cœur de notre mission.
    </p>
</section>

</body>
</html>
