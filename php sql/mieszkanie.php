<?php 
$conn = new mysqli("localhost","root","","4td");

$res = mysqli_query($conn,"SELECT * FROM adres WHERE metraz>100 AND ulica LIKE 'K%' ORDER BY metraz DESC");

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
 if ($res->num_rows > 0) {
    while($row = $res->fetch_assoc()) {
        echo "<tr>"."<td>".$row["id_mieszkania"]."</td>"."<td>".$row["metraz"] . " m2 "."</td>"."<td>".$row["ulica"]."</td>"."</tr>";
    }
} else {
    echo "Brak wyników.";
}


echo "</table>";

$conn->close();
?>