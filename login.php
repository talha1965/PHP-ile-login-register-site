<?php
session_start();
require_once "config.php"; // DB bağlantısı

$error = "";

// Giriş formu gönderildiyse
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    if (empty($username) || empty($password)) {
        $error = "Lütfen tüm alanları doldurun!";
    } else {
        // Kullanıcıyı veritabanında ara
        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username OR email = :username");
        $stmt->execute(['username' => $username]);
        $user = $stmt->fetch();

            if ($user) {
                if (password_verify($password, $user['password'])) {
                    // Giriş başarılı
                    
                    // Oturum bilgilerini kaydet
                    $_SESSION['username'] = $user['username'];
                    $_SESSION['user_email'] = $user['email'];

                    header("Location: dashboard.php"); // Yönlendirme
                exit();
            } else {
                $error = "Şifre hatalı!";
            }
        } else {
            $error = "Kullanıcı bulunamadı!";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giriş Yap</title>
    <link rel="stylesheet" href="cssdosyaları/login.css">
</head>
<body>
    <div class="login-container">
        <h2>Giriş Yap</h2>

        <?php
        if(!empty($error)){
            echo "<div class='error-message'>{$error}</div>";
        }
        ?>

        <form action="" method="POST">
            <input type="text" name="username" placeholder="Kullanıcı adı veya e-posta" required>
            <input type="password" name="password" placeholder="Şifre" required>
            <input type="submit" value="Giriş Yap">
        </form>

        <p>Hesabınız yok mu? <a href="register.php">Kayıt Ol</a></p>
    </div>
</body>
</html>
