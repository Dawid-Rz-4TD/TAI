<?php
//Temat 1
$a = 7; 
if ($a%2 > 0) 
{
  echo "Liczba nieparzysta <br>";
}
if ($a%2 == 0) 
{
  echo "Liczba parzysta<br>";
}




//Temat 2
$B = 7; 
if ($B%2 > 0) 
{
  echo "Liczba nieparzysta<br>";
}
else 
{
  echo "Liczba parzysta<br>";
}


//Temat 3
$c = 34; 

if ($c%8 == 0) 
  echo "Liczba podzielna przez osiem<br>";

elseif ($c%4 == 0) 
  echo "Liczba podzielna przez 4, ale nie przez 8<br>";

elseif ($c%2 == 0) 
  echo "Liczba podzielna przez 2, ale nie przez 4<br>";

else 
  echo "Liczba nieparzysta<br>";


//Temat 4
$d = 72; 

switch ($d) 
{
case 1:
  echo "Wartość zmiennej a to 1<br>";
  break;

case 2:
  echo "Wartość zmiennej a to 2<br>";
  break;

case 3:
  echo "Wartość zmiennej a to 3<br>";
  break;

case 72:
  echo "Wartość zmiennej a to 72<br>";
  break;

default:
  echo "Żadna z powyższych<br>";
  break;
};



//Temat 5
$zmienna = 88 ;
$inna = 101;
while($zmienna < 101 && $inna > 100) 
{
  echo $zmienna." <br>";
  echo $inna." <br>";
  $zmienna += 10; 
  $inna -= 5; 
} 

//Temat 6

$zmienna2 = -10;
do 
{
  echo $zmienna2;
  $zmienna2--;
} 
while($zmienna2 > 0) ;
echo"<br>";


// Temat 7

for($i=0;$i<10;$i++)
{
 echo $i." ";
};
echo "<br>";

//Temat 8
$a = 5; // przypisujemy wartość zmiennej $a
echo ($a>5) ? 'Większa od 5' : 'Mniejsza, bądź równa 5';




?>