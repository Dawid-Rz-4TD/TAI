<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}

$msg = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $imie = trim($_POST['imie']);
    $nazwisko = trim($_POST['nazwisko']);
    $email = trim($_POST['email']);

    if (!empty($imie) && !empty($nazwisko) && !empty($email)) {
        $conn = mysqli_connect("localhost", "root", "", "Zadanie");
        if (!$conn) {
            die("Błąd połączenia: " . mysqli_connect_error());
        }
        mysqli_set_charset($conn, "utf8mb4");

        $sql = "INSERT INTO uzytkownicy_dane (user_id, imie, nazwisko, email) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "isss", $_SESSION['user_id'], $imie, $nazwisko, $email);
        mysqli_stmt_execute($stmt);

        $_SESSION['formularz_wyslany'] = true;
        $msg = "Dane zostały pomyślnie zapisane!";

        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    } else {
        $msg = "Wszystkie pola formularza są wymagane.";
    }
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Panel</title>
</head>
<body>
    <h2>Witaj <?= htmlspecialchars($_SESSION['user']) ?> (<?= htmlspecialchars($_SESSION['role']) ?>)</h2>
    
    <?php if ($_SESSION['role'] === 'admin'): ?>
        <p><a href="wyniki.php"><strong>Przejdź do wyników (Tylko Admin)</strong></a></p>
    <?php endif; ?>
    <p><a href="logout.php">Wyloguj się</a></p>

    <h3>Formularz zapisu danych</h3>
    <?php if ($msg): ?><p><strong><?= htmlspecialchars($msg) ?></strong></p><?php endif; ?>

    <form method="POST" action="panel.php">
        <label>Imię: <input type="text" name="imie" required></label><br><br>
        <label>Nazwisko: <input type="text" name="nazwisko" required></label><br><br>
        <label>E-mail: <input type="email" name="email" required></label><br><br>
        <button type="submit">Wyślij</button>
    </form>
</body>
</html>
