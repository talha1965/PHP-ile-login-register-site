<?php
include 'db.php';
$status = "";

if(isset($_POST['register'])){
    $username = $_POST['username'];
    $email    = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // 1) Bu kullanıcı adı veya email daha önce alınmış mı kontrol et
    $check = $conn->prepare("SELECT * FROM users WHERE username=? OR email=?");
    $check->execute([$username, $email]);

    if($check->rowCount() > 0){
        $status = "Bu kullanıcı adı veya email zaten kullanılıyor!";
    } else {
        // 2) Yoksa kaydı gerçekleştir
        $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?,?,?)");
        if($stmt->execute([$username,$email,$password])){
            $status = "Kayıt başarılı! Giriş yapabilirsiniz.";
        } else {
            $status = "Kayıt başarısız.";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <title>Kayıt Ol</title>
  <link rel="stylesheet" href="cssdosyaları/register.css">
</head>
<body>

<div class="register-container">
    <h2>Kayıt Formu</h2>
    <?php if($status != "") echo "<p class='status'>$status</p>"; ?>
    <form method="post">
        <input type="text" name="username" placeholder="Kullanıcı Adı" required>
        <input type="email" name="email"  placeholder="Email" required>
        <input type="password" name="password" placeholder="Şifre" required>
        <input type="submit" name="register" value="Kayıt Ol">
    </form>
    <p>Hesabınız var mı? <a href="login.php">Giriş Yap</a></p>
</div>

</body>
</html>
