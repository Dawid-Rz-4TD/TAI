<?php
$tab1 = [7, 3, 1, 6, 9, 5, 4, 10, 2, 2];

echo "5 komórka tab1: " . $tab1[4]  ; 
echo "<br>";
$tab1[7] = 12; 
echo "Zmiania wartości: ". $tab1[7];
echo "<br>";
$tab2 = $tab1;
echo "Kopiowanie tablic: ".implode(', ', $tab2);
echo "<br>";
$tab3 = [];
for ($i = 0; $i < count($tab1); $i++) {
    $tab3[$i] = $tab1[$i] + $tab2[$i];
}


$tab2 = array_reverse($tab1);


echo "tab1: " . implode(", ", $tab1)  ;
echo "<br>";
echo "tab2 (odwrócone tab1): " . implode(", ", $tab2) ;
echo "<br>";
echo "tab3 (suma tab1 i tab2): " . implode(", ", $tab3);
?>
