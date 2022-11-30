<?php
include "upload.php";

//session_start();

require_once __DIR__ . '/vendor/autoload.php';

// connect to mongodb
$m = new MongoDB\Driver\Manager("mongodb://localhost:27017");
echo "Connection to database successfully";
print_r($m);



$filter = [];
$options = [];
$query = new MongoDB\Driver\Query($filter, $options);
$manager = new MongoDB\Driver\Manager('mongodb://localhost:27017');
$result = $manager->executeQuery('GymnasieArbete.musicFiles', $query);

foreach ($result as $document) {
    /*    print_r($document->name_audio);
    echo " "; */
    print_r($document->file_name);
    echo "<br>";
    $src = "uploads/" . $document->file_name;
    echo "<p class = 'display-name'>$document->name_audio</p>";
    echo "<audio controls muted class='music'>";
    echo "<source src='$src' class='music' type='audio/mpeg'>";
    echo "</audio>";
}





    /*
 $sound = [];
 if (mysqli_num_rows($result) > 0) {
     while ($obj = mysqli_fetch_assoc($result)) {
         $name = $obj['name_audio'];
         $id = $obj['id'];
         $fileName = $obj['file_name'];

         $sound = [$fileName => $name];

         foreach ($sound as $files => $nameOfAudio) {
             echo $nameOfAudio;
             echo "<audio controls  muted class = 'music'>";
             echo "<source src='$soundUrl' class = 'music' type ='audio/mp3' ><br>";
             echo "</audio>";
         }
     }
 }
 //$result->free_result();
 echo "$result";


$con->close(); */
