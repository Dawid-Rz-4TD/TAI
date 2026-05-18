<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = trim($_POST['login']);
    $password = trim($_POST['password']);
    $rola = $_POST['rola'];

    if (!empty($login) && !empty($password)) {
        $conn = mysqli_connect("localhost", "root", "", "Zadanie");
        mysqli_set_charset($conn, "utf8mb4");


        $stmtCheck = mysqli_prepare($conn, "SELECT id FROM uzytkownicy WHERE login = ?");
        mysqli_stmt_bind_param($stmtCheck, "s", $login);
        mysqli_stmt_execute($stmtCheck);
        mysqli_stmt_store_result($stmtCheck);
        
        if (mysqli_stmt_num_rows($stmtCheck) > 0) {
            echo "Login zajęty!";
        } else {
         
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            $stmtInsert = mysqli_prepare($conn, "INSERT INTO uzytkownicy (login, haslo, rola) VALUES (?, ?, ?)");
            mysqli_stmt_bind_param($stmtInsert, "sss", $login, $hashedPassword, $rola);
            mysqli_stmt_execute($stmtInsert);

            echo "Konto utworzone pomyślnie!";
        }
        mysqli_close($conn);
    }
}
?>
<form method="POST">
    <h2>Rejestracja</h2>
    <hr>
    Login: <input type="text" name="login" required><br><br>
    Hasło: <input type="password" name="password" required><br><br>
    Rola: <select name="rola"><option value="user">User</option><option value="admin">Admin</option></select><br><br>
    <button type="submit">Zarejestruj</button>
</form>
