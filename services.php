<?php
require_once 'auth_check.php';
require_once 'db.php';

$products = $pdo->query("SELECT * FROM products")->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Services</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Nos Produits</h2>

<?php foreach ($products as $p): ?>
    <div class="product">
        <h3><?= htmlspecialchars($p['name']) ?></h3>
        <p><?= htmlspecialchars($p['description']) ?></p>
        <strong><?= $p['price'] ?> €</strong>
    </div>
<?php endforeach; ?>

</body>
</html>
