<?php
session_start();

if (isset($_SESSION['last_log_id'])) {
    $conn = mysqli_connect("localhost", "root", "", "Zadanie");
    if ($conn) {
        mysqli_set_charset($conn, "utf8mb4");
        
        $status = $_SESSION['formularz_wyslany'] ? 'tak' : 'nie';

       
        $sql = "UPDATE logi SET formularz_wyslany = ? WHERE id = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "si", $status, $_SESSION['last_log_id']);
        mysqli_stmt_execute($stmt);

        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }
}

$_SESSION = [];
session_destroy();

header("Location: login.php");
exit;
?>
