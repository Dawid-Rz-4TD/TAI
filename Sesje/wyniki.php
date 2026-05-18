<?php
session_start();

if (!isset($_SESSION['user']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit;
}

$conn = mysqli_connect("localhost", "root", "", "Zadanie");
if (!$conn) {
    die("Błąd połączenia: " . mysqli_connect_error());
}
mysqli_set_charset($conn, "utf8mb4");

$sql = "SELECT ud.id, u.login, ud.imie, ud.nazwisko, ud.email, ud.data_dodania 
        FROM uzytkownicy_dane ud
        JOIN uzytkownicy u ON ud.user_id = u.id 
        ORDER BY ud.data_dodania DESC";

$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Wyniki - Admin</title>
</head>
<body>
    <h2>Panel Administratora (mysqli)</h2>
    <p><a href="panel.php">Powrót do panelu</a> | <a href="logout.php">Wyloguj się</a></p>

    <?php if (mysqli_num_rows($result) > 0): ?>
        <table style{border="1"} cellpadding="8" cellspacing="0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Użytkownik</th>
                    <th>Imię</th>
                    <th>Nazwisko</th>
                    <th>E-mail</th>
                    <th>Data dodania</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['id']) ?></td>
                        <td><?= htmlspecialchars($row['login']) ?></td>
                        <td><?= htmlspecialchars($row['imie']) ?></td>
                        <td><?= htmlspecialchars($row['nazwisko']) ?></td>
                        <td><?= htmlspecialchars($row['email']) ?></td>
                        <td><?= htmlspecialchars($row['data_dodania']) ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Brak rekordów w bazie danych.</p>
    <?php endif; ?>

    <?php mysqli_close($conn); ?>
</body>
</html>
