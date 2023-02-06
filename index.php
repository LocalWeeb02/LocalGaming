<!-- SHOP SEITE ANFANG -->
<?php
session_start();
error_reporting(-1);
ini_set('display_errors', 'On');

// DATENBANK VERBINDUNG $DB

$db = new PDO('mysql:host=localhost;dbname=localgaming', 'root', '');

// USER ID FESTLEGEN

$userID = random_int(0,time());
$cartItems = 0;

// COOKIE SETZEN

if(isset($_COOKIE['userID'])){
    $userID = (int) $_COOKIE['userID'];
}
setcookie('userID', $userID, strtotime('+30 days'));


// WARENKORB ANZAHL ANZEIGEN LASSEN

$sqlc = "SELECT COUNT(Cart_ID) FROM Warenkorb WHERE Nutzer_ID =".$userID;
$cartResults = $db->query($sqlc);
$cartItems = $cartResults->fetchColumn();

// AUF HEADER.PHP VERWEISEN

require __DIR__ . '/Template/header.php';

?>
<form action="shop.php" method="post">
<h2>Willkommen bei Local Gaming!</h2>
<button type="submit">Betrete den Shop:</button>
<h4>N</h4>
<h4>N</h4>
<h4>N</h4>
<h4>N</h4>
<h4>N</h4>
<h4>N</h4>
<h4>N</h4>
<h4>N</h4>
<h4>N</h4>
<h4>N</h4>
<h4>N</h4>
<h4>N</h4>
<h4>N</h4>
</body>
</html>