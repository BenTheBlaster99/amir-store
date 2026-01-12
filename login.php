<?php
session_start();
require_once 'db.php';

$error = '';

if (isset($_POST['login'])) {
    $email = trim($_POST['email']);
    $pass  = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && password_verify($pass, $user['password'])) {
        $_SESSION['user'] = [
            'id' => $user['id'],
            'name' => $user['name']
        ];
        header("Location: index.php");
        exit;
    } else {
        $error = "Email ou mot de passe incorrect";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Connexion</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="auth-box">
    <h2>Connexion</h2>

    <?php if ($error): ?>
        <p class="message error"><?= $error ?></p>
    <?php endif; ?>

    <form method="POST">
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Mot de passe" required>
        <button name="login">Se connecter</button>
    </form>

    <p>Pas de compte ? <a href="register.php">S'inscrire</a></p>
</div>

</body>
</html>
