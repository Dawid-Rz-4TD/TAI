<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = trim($_POST['login']);
    $password = trim($_POST['password']);

    if (!empty($login) && !empty($password)) {
        $conn = mysqli_connect("localhost", "root", "", "Zadanie");
       

      
        $stmt = mysqli_prepare($conn, "SELECT id, login, haslo, rola FROM uzytkownicy WHERE login = ?");
        mysqli_stmt_bind_param($stmt, "s", $login);
        mysqli_stmt_execute($stmt);
       $result = mysqli_stmt_get_result($stmt);
$user = mysqli_fetch_assoc($result); 


        if ($user && password_verify($password, $user['haslo'])) {
      
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user'] = $user['login'];
            $_SESSION['role'] = $user['rola'];
            $_SESSION['formularz_wyslany'] = false;

        
            $stmtLog = mysqli_prepare($conn, "INSERT INTO logi (user_id, data_logowania, formularz_wyslany) VALUES (?, NOW(), 'nie')");
            mysqli_stmt_bind_param($stmtLog, "i", $user['id']);
            mysqli_stmt_execute($stmtLog);
            $_SESSION['last_log_id'] = mysqli_insert_id($conn);

            header("Location: panel.php");
            exit;
        } else {
            echo "Błędny login lub hasło.";
        }
        mysqli_close($conn);
    }
}
?>
<form method="POST">
    <h2>Logowanie</h2>
    <hr>
    Login: <input type="text" name="login" required><br><br>
    Hasło: <input type="password" name="password" required><br><br>
    <button type="submit">Zaloguj</button>
</form>
