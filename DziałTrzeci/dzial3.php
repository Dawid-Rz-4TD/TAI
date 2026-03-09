<?php
//Temat 1
function wyswietl_powitanie() {
   echo "Witam serdecznie!";  
   echo "Proszę się zarejestrować.";  
};


echo "<br>";

//Temat 2
function oblicz()
{
   $zm1 = 3;
   $zm1 += 5;
   $zm1++;
   return $zm1;
}

if (oblicz() > 5)
   echo "Funkcja zwraca wartość większą od 5";
else
   echo "Wartość zwracana przez funkcję jest mniejsza od 6";


echo "<br>";


//Temat 3
function przywitaj($zmienna_z_imieniem)
{
   echo 'Witaj '.$zmienna_z_imieniem.'!';
}

$imie = "Marcin";

przywitaj($imie);

echo "<br>";
//Temat 4
function kwadrat($liczba)
{
   return $liczba*$liczba;
}

$numer = 5;
$wynik = kwadrat($numer);

echo $wynik; 


echo "<br>";

//Temat 5

function silnia($liczba)
{
   if($liczba < 2) 
      return 1;
   else
      return $liczba*silnia($liczba-1);  
}

echo silnia(5);

echo "<br>";

//Temat 6

$pewna_zmienna = 4; 

$j = 4; 
$i = 4; 

while($i <= $pewna_zmienna) 
{
   if($i % 4 == 0) 
   {
      $tablica[$j] = $i;  
      $j++;
   $i++; 
}

for ($i = 4; $i < $j; $i++)
   echo $tablica[$i]."<br/>"; 
};
echo "<br>";


//Temat 7
$tablica_ucznia[0] = "Janek";
$tablica_ucznia[1] = "Kowalski";
$tablica_ucznia[2] = "14-10-1995";

$tablica_klasy[0] = $tablica_ucznia;

$tablica_ucznia[0] = "Krzysiek";
$tablica_ucznia[1] = "Nowak";
$tablica_ucznia[2] = "24-12-1994";

$tablica_klasy[1] = $tablica_ucznia;

$tablica_ucznia[0] = "Ewa";
$tablica_ucznia[1] = "Kowalska";
$tablica_ucznia[2] = "17-03-1996";

$tablica_klasy[2] = $tablica_ucznia;

echo $tablica_klasy[1][0]; 

echo "<br>";

//Temat 8
 $classroom = array();
    $student['firstName'] = 'Janek';
    $student['lastName'] = 'Kowalski';
    $student['birthday'] = '15-08-2000';
    $classroom[] = $student;
    $student['firstName'] = 'Mirek';
    $student['lastName'] = 'Nowak';
    $student['birthday'] = '2-11-2001';
    $classroom[] = $student;
    $student['firstName'] = 'Marcin';
    $student['lastName'] = 'Wesel';
    $student['birthday'] = '19-05-1989';
    $classroom[] = $student;
    var_dump($classroom);

    echo "<br>";

//Temat 9

    $student = array();
$student['firstName'] = 'Marcin';
$student['lastName'] = 'Wesel';
$student['birthday'] = '19-05-1989';
foreach ($student as $key => $data)
{
    echo "Wartość dla indeksu: $key to: $data";
}

echo "<br>";

//Temat 10

$data=date("Y-m-d");
$czas=date("H:i");

echo "Stronę wyświetlono dnia $data o godzinie $czas";

echo "<br>";


$data=date("Y-m-d, H:i", mktime (0,0,0,10,15,1985));

echo $data;

echo "<br>"
?>