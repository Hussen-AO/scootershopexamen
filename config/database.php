<?php 
$servername = "localhost";
$username = "";
$password = "";
$dbname = "";


try {
    //maakt connectie naar het database
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    /*dit is een pdo-method om de instllingen aan te passen van pdo
    hierdoor kan je elke db fout zien*/
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
} catch(PDOException $error){
    //hier krijg je de db fouten te zien die werden opgepikt
    echo "Connection failed: " . $error->getMessage();
}
?>