<?php
$dsn = "mysql:host=localhost;dbname=4td;charset=utf8";
$user = "root";
$pass = "";

try {
    
    $pdo = new PDO($dsn, $user, $pass);
    
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // 2. Zapytanie
    $stmt = $pdo->query("SELECT * FROM adres WHERE metraz>100 AND ulica LIKE 'K%' ORDER BY metraz DESC");

   
   echo '<style type="text/css">
       table, th, td{
       border:solid 1px black;
       }
        </style>';
echo '<table>';
echo '<tr>';
 echo   "<th>ID</th>";
 echo   "<th>Metraż</th>";
  echo  "<th>Ulica</th>";
  echo "</tr>";
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
         echo "<tr>"."<td>".$row["id_mieszkania"]."</td>"."<td>".$row["metraz"] . " m2 "."</td>"."<td>".$row["ulica"]."</td>"."</tr>";
    }
    echo "</table>";

} catch (PDOException $e) {
    echo "Błąd bazy danych: " . $e->getMessage();
}
?>