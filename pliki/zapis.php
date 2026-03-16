<?php



    $zipName = "paczka_" . time() . ".zip";

   
    $zip = new ZipArchive();

    
    if($zip->open($zipName, ZipArchive::CREATE) === TRUE){

        foreach($_FILES['obrazy']['tmp_name'] as $key => $tmp_name){

            $originalName = $_FILES['obrazy']['name'][$key];

          
            $ext = strtolower(pathinfo($originalName, PATHINFO_EXTENSION));

         
            $allowed = ['jpg','jpeg','png'];

            if(in_array($ext, $allowed)){

            
                $zip->addFile($tmp_name, $originalName);

            } else {

                echo "Plik $originalName ma niedozwolony format.<br>";

            }
        }

        
        $zip->close();

        echo "<b>Paczka została utworzona!</b><br>";
        echo "<a href='$zipName'>Pobierz plik ZIP</a>";

    

}

?>