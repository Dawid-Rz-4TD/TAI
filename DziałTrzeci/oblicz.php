<?php

function wypisz_dzien_tygodnia()
{
    $dzien = date("w");

    switch($dzien)
    {
        case 0:
            echo "Niedziela";
            break;
        case 1:
            echo "Poniedziałek";
            break;
        case 2:
            echo "Wtorek";
            break;
        case 3:
            echo "Środa";
            break;
        case 4:
            echo "Czwartek";
            break;
        case 5:
            echo "Piątek";
            break;
        case 6:
            echo "Sobota";
            break;
    }
}



function oblicz_dni($data)
{
  // 60 sekund to 1 minuta, 60 minut to 1 godzina, 
  //24 godziny to 1 dzień
  $czas = (time() - mktime (0,0,0,$data['miesiac'],
  $data['dzien'],$data['rok']))/60/60/24;
  if($czas>=6575){
    echo "Użytkownik jest pełnoletni";
  }
  else
    echo "Użytkownik nie jest pełnoletni";
  return $czas;
}

$data['dzien'] = $_GET['dzien'];
$data['miesiac'] = $_GET['miesiac'];
$data['rok'] = $_GET['rok'];

wypisz_dzien_tygodnia($data)." ";
echo "<br>";
echo " ".oblicz_dni($data); 



function dni_po_dniu_matki()
{
    $dni = array();
    $timestamp = mktime(0,0,0,5,26,date("Y"));

    for($i = 1; $i <= 10; $i++)
    {
        $dzien_nr = date("w", $timestamp + ($i * 86400));

        switch($dzien_nr)
        {
            case 0: $dzien = "Niedziela <br>"; break;
            case 1: $dzien = "Poniedziałek<br>"; break;
            case 2: $dzien = "Wtorek<br>"; break;
            case 3: $dzien = "Środa<br>"; break;
            case 4: $dzien = "Czwartek<br>"; break;
            case 5: $dzien = "Piątek<br>"; break;
            case 6: $dzien = "Sobota<br>"; break;
        }

        $dni[] = $dzien;
    }

    return $dni;
}

$tablica_dni = dni_po_dniu_matki();
print_r($tablica_dni);
?>