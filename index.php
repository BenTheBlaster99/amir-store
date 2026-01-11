<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil - Cahier des Charges</title>
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
                    <li><a href="index.php" class="active">Accueil</a></li>
                    <li><a href="services.php">Services</a></li>
                    <li><a href="contact.php">Contact</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main>
        <section class="hero">
            <div class="container">
                <h2>Bienvenue sur notre site</h2>
                <p>Découvrez nos produits et services de qualité</p>
            </div>
        </section>

        <section class="presentation">
            <div class="container">
                <h2>À propos de notre activité</h2>
                <div class="content-box">
                    <p>
                        Nous sommes spécialisés dans la vente de produits de qualité pour répondre à tous vos besoins. 
                        Notre mission est de vous offrir une expérience d'achat exceptionnelle avec une large sélection 
                        de produits soigneusement sélectionnés.
                    </p>
                    <p>
                        Depuis notre création, nous nous engageons à fournir des produits de haute qualité à des prix compétitifs. 
                        Que vous cherchiez des articles pour votre quotidien ou des produits spécifiques, nous sommes là pour vous servir.
                    </p>
                    <p>
                        Notre équipe dévouée travaille sans relâche pour vous garantir satisfaction et qualité. 
                        N'hésitez pas à parcourir notre catalogue et à nous contacter pour toute question.
                    </p>
                </div>
            </div>
        </section>

        <section class="auth-section">
            <div class="container">
                <div class="auth-container">
                    <div class="auth-box">
                        <h3>Connexion</h3>
                        <form action="index.php" method="POST" class="auth-form">
                            <div class="form-group">
                                <label for="login_email">Email</label>
                                <input type="email" id="login_email" name="login_email" required>
                            </div>
                            <div class="form-group">
                                <label for="login_password">Mot de passe</label>
                                <input type="password" id="login_password" name="login_password" required>
                            </div>
                            <button type="submit" name="login_submit" class="btn btn-primary">Se connecter</button>
                        </form>
                        <?php
                        if (isset($_POST['login_submit'])) {
                            // Database connection will be added later
                            echo '<p class="message">Fonctionnalité de connexion à venir (base de données requise)</p>';
                        }
                        ?>
                    </div>

                    <div class="auth-box">
                        <h3>Inscription</h3>
                        <form action="index.php" method="POST" class="auth-form">
                            <div class="form-group">
                                <label for="register_name">Nom complet</label>
                                <input type="text" id="register_name" name="register_name" required>
                            </div>
                            <div class="form-group">
                                <label for="register_email">Email</label>
                                <input type="email" id="register_email" name="register_email" required>
                            </div>
                            <div class="form-group">
                                <label for="register_password">Mot de passe</label>
                                <input type="password" id="register_password" name="register_password" required>
                            </div>
                            <div class="form-group">
                                <label for="register_confirm">Confirmer le mot de passe</label>
                                <input type="password" id="register_confirm" name="register_confirm" required>
                            </div>
                            <button type="submit" name="register_submit" class="btn btn-primary">S'inscrire</button>
                        </form>
                        <?php
                        if (isset($_POST['register_submit'])) {
                            // Database connection will be added later
                            if ($_POST['register_password'] === $_POST['register_confirm']) {
                                echo '<p class="message success">Fonctionnalité d\'inscription à venir (base de données requise)</p>';
                            } else {
                                echo '<p class="message error">Les mots de passe ne correspondent pas</p>';
                            }
                        }
                        ?>
                    </div>
                </div>
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

