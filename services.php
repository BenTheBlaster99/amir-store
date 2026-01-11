<?php
// Database configuration - Update these with your actual database credentials
$db_host = 'localhost';
$db_name = 'cahier_des_charges';  // Change to your database name
$db_user = 'root';  // Change to your database username
$db_pass = '';  // Change to your database password

$products = [];
$db_error = '';

try {
    // Database connection
    $pdo = new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8mb4", $db_user, $db_pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Fetch products from database
    // Adjust the table name and column names according to your database structure
    $stmt = $pdo->query("SELECT id, name, description, price, image_url FROM products ORDER BY id ASC");
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
} catch (PDOException $e) {
    $db_error = "Erreur de connexion à la base de données. Veuillez vérifier votre configuration.";
    // Uncomment the line below for debugging (remove in production)
    // $db_error = "Erreur: " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services - Cahier des Charges</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div class="container">
            <div class="logo">
                <h1>Cahier des Charges</h1>
            </div>
            <nav>
                <ul>
                    <li><a href="index.php">Accueil</a></li>
                    <li><a href="services.php" class="active">Services</a></li>
                    <li><a href="contact.php">Contact</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main>
        <section class="page-header">
            <div class="container">
                <h2>Nos Services et Produits</h2>
                <p>Découvrez notre sélection de produits de qualité</p>
            </div>
        </section>

        <section class="products">
            <div class="container">
                <?php if ($db_error): ?>
                    <div class="message error">
                        <p><?php echo htmlspecialchars($db_error); ?></p>
                        <p style="margin-top: 0.5rem; font-size: 0.9rem;">
                            <strong>Note:</strong> Assurez-vous que votre base de données est configurée et que la table 'products' existe avec les colonnes: id, name, description, price, image_url
                        </p>
                    </div>
                <?php endif; ?>

                <?php if (empty($products) && !$db_error): ?>
                    <div class="message">
                        <p>Aucun produit disponible pour le moment.</p>
                    </div>
                <?php else: ?>
                    <div class="products-grid">
                        <?php foreach ($products as $product): ?>
                            <div class="product-card">
                                <div class="product-image">
                                    <?php if (!empty($product['image_url'])): ?>
                                        <img src="<?php echo htmlspecialchars($product['image_url']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>">
                                    <?php else: ?>
                                        <div class="placeholder-image">Image Produit</div>
                                    <?php endif; ?>
                                </div>
                                <div class="product-info">
                                    <h3><?php echo htmlspecialchars($product['name']); ?></h3>
                                    <p class="product-description"><?php echo htmlspecialchars($product['description']); ?></p>
                                    <p class="product-price"><?php echo number_format($product['price'], 2, ',', ' '); ?> €</p>
                                    <button class="btn btn-secondary">Ajouter au panier</button>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </section>
    </main>

    <footer>
        <div class="container">
            <p>&copy; 2024 Cahier des Charges. Tous droits réservés.</p>
        </div>
    </footer>
</body>
</html>
