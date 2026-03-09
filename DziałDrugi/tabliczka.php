<?php

$ilosc = 7; // przypisujemy dowolną wartość zmiennej $ilosc

// zmienna $kontynuacja sprawdza, czy $ilosc jest zerem
$kontynuacja = ($ilosc == 0) ? 0 : 1;

// jeśli nie jest, możemy kontynuować
if($kontynuacja == 1)
{
    if($ilosc > 0) // wyświetlamy ciągi od 0 do 20
        while($ilosc > 0) // musimy wypisać $ilosc ciągów
        {
            for($i=0;$i<21;$i++) // 20 liczb za pomocą for
                echo $i;
            $ilosc--; // zmniejszamy, aż dojdzie do 0
            echo "<br/>"; // przejście do kolejnej linijki
        }
    else // $ilosc jest ujemna, wyswietlamy od 20 do 0
        while($ilosc < 0) // wypisujemy -$ilosc ciągów
        {
            for($i=20;$i>=0;$i--) // 20 liczb za pomocą for
                echo $i;
            $ilosc++; // zwiększamy, aż dojdzie do 0
            echo "<br/>"; // przejście do kolejnej linijki
        }               
}
else // jeśli kontynuacja wynosi 0
  echo "Brak ciągów liczb";


  echo "<br>";


echo "<table border=2>";
  for($k=1;$k<=10;$k++){
echo "<tr>";

for($h=1;$h<=10;$h++){
    $suma = $k*$h;

if($suma%2==0){
echo "<td style='color:blue'>".$suma."</td>";
}
else
    echo "<td style='color:green'>".$suma."</td>";



}


echo "</tr>";
  };

  echo "</table>";




  $d = 3; 

switch ($d) 
{
case 2:
    for($u=1;$u<=10;$u++){
echo pow($u,$d)." ";
    };

    break;


    case  3:
for($p=1;$p<=10;$p++){
echo pow($p,$d)." ";
       
};
 break;

case  4:
for($v=1;$v<=10;$v++){
echo pow($v,$d)." ";
       
};
break;
};
?>