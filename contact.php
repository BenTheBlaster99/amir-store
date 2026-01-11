<?php
$message_sent = false;
$error_message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['contact_submit'])) {
    $name = htmlspecialchars($_POST['contact_name']);
    $email = htmlspecialchars($_POST['contact_email']);
    $message = htmlspecialchars($_POST['contact_message']);
    
    if (!empty($name) && !empty($email) && !empty($message)) {
        // Email sending or database storage will be added later
        $message_sent = true;
    } else {
        $error_message = 'Veuillez remplir tous les champs.';
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact - Cahier des Charges</title>
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
                    <li><a href="services.php">Services</a></li>
                    <li><a href="contact.php" class="active">Contact</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main>
        <section class="page-header">
            <div class="container">
                <h2>Contactez-nous</h2>
                <p>Nous sommes à votre écoute</p>
            </div>
        </section>

        <section class="contact-section">
            <div class="container">
                <div class="contact-container">
                    <div class="contact-info">
                        <h3>Informations de contact</h3>
                        <div class="info-item">
                            <h4>Adresse</h4>
                            <p>123 Rue de l'Exemple<br>75001 Paris, France</p>
                        </div>
                        <div class="info-item">
                            <h4>Téléphone</h4>
                            <p>+33 1 23 45 67 89</p>
                        </div>
                        <div class="info-item">
                            <h4>Email</h4>
                            <p>contact@cahierdescharges.fr</p>
                        </div>
                    </div>

                    <div class="contact-form-container">
                        <h3>Envoyez-nous un message</h3>
                        <?php if ($message_sent): ?>
                            <div class="message success">
                                <p>Votre message a été envoyé avec succès! Nous vous répondrons dans les plus brefs délais.</p>
                            </div>
                        <?php endif; ?>
                        
                        <?php if ($error_message): ?>
                            <div class="message error">
                                <p><?php echo $error_message; ?></p>
                            </div>
                        <?php endif; ?>

                        <form action="contact.php" method="POST" class="contact-form">
                            <div class="form-group">
                                <label for="contact_name">Nom</label>
                                <input type="text" id="contact_name" name="contact_name" required>
                            </div>
                            <div class="form-group">
                                <label for="contact_email">Email</label>
                                <input type="email" id="contact_email" name="contact_email" required>
                            </div>
                            <div class="form-group">
                                <label for="contact_message">Message</label>
                                <textarea id="contact_message" name="contact_message" rows="6" required></textarea>
                            </div>
                            <button type="submit" name="contact_submit" class="btn btn-primary">Envoyer le message</button>
                        </form>
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

