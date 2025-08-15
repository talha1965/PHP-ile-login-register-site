<?php
session_start();
if(!isset($_SESSION['username'])){
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username'];
$user_email = $_SESSION['user_email']; // Oturumdan email bilgisi
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="cssdosyaları/dashboard.css">
</head>
<body>
    <div class="dashboard-container">
        <header>
            <h1>Hoşgeldiniz, <?php echo htmlspecialchars($username); ?>!</h1>
            <a href="logout.php" class="logout-btn">Çıkış Yap</a>
        </header>

        <main>
            <p>Burada kullanıcı panelinizi ve içeriklerinizi yönetebilirsiniz.</p>
            <div class="info-cards">
                <div class="card">
                    <h2>Profil Bilgileri</h2>
                    <p>Kullanıcı adı: <?php echo htmlspecialchars($username); ?></p>
                    <p>Email: <?php echo htmlspecialchars($user_email); ?></p>
                </div>
                <div class="card">
                    <h2>İstatistikler</h2>
                    <p>Gönderiler: 10</p>
                    <p>Yorumlar: 25</p>
                </div>
                <div class="card">
                    <h2>Ayarlar</h2>
                    <p>Hesap ayarlarınızı buradan yönetebilirsiniz.</p>
                </div>
            </div>

            <!-- Todo List -->
            <div class="todo-container">
                <h2>Görev Listesi</h2>
                <div class="input-section">
                    <input type="text" id="taskInput" placeholder="Yeni görev ekle">
                    <button id="addTaskBtn">Ekle</button>
                </div>
                <ul id="taskList"></ul>
            </div>

            <script src="script.js"></script>      
        </main>
    </div>
</body>
</html>
