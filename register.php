<?php
require_once 'db.php';
$msg = '';

if (isset($_POST['register'])) {
    $name  = trim($_POST['name']);
    $email = trim($_POST['email']);
    $pass  = $_POST['password'];
    $conf  = $_POST['confirm'];

    if ($pass !== $conf) {
        $msg = "Les mots de passe ne correspondent pas";
    } else {
        $check = $pdo->prepare("SELECT id FROM users WHERE email = ?");
        $check->execute([$email]);

        if ($check->rowCount()) {
            $msg = "Email déjà utilisé";
        } else {
            $hash = password_hash($pass, PASSWORD_DEFAULT);
            $stmt = $pdo->prepare(
                "INSERT INTO users (name,email,password) VALUES (?,?,?)"
            );
            $stmt->execute([$name,$email,$hash]);
            header("Location: login.php");
            exit;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Inscription</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="auth-box">
    <h2>Inscription</h2>

    <?php if ($msg): ?>
        <p class="message error"><?= $msg ?></p>
    <?php endif; ?>

    <form method="POST">
        <input type="text" name="name" placeholder="Nom complet" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Mot de passe" required>
        <input type="password" name="confirm" placeholder="Confirmer mot de passe" required>
        <button name="register">Créer un compte</button>
    </form>
</div>

</body>
</html>
