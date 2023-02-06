<!-- SHOP SEITE ANFANG -->
<?php
session_start();
error_reporting(-1);
ini_set('display_errors', 'On');

// DATENBANK VERBINDUNG HERSTELLEN

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

    <form action="hinzu.php" method="post">
    <br>
    <p>Name des Produktes: <input type="text" name="pname" placeholder="Name des Produktes" required><br>
    <p>Preis des Produktes: <input type="text" name="ppreis" placeholder="Preis des Produktes" required><br><br>
    <label for="Zustand">Zustand: </label>
    <select name="Zustand" id="Zustand">
        <option value="Sehr Gut">Sehr gut</option>
        <option value="Gut">Gut</option>
        <option value="OK" selected>Ok</option>
        <option value="Schlecht">Schlecht</option>
    </select><br><br>
    <label for="Konsole">Konsole: </label>
    <select name="Konsole" id="Konsole">
        <option value="1">Playstation 5</option>
        <option value="2">Playstation 4</option>
        <option value="7" selected>Game Boy</option>
        <option value="8">Game Boy Color</option>
    </select><br>
    <p>Beschreibung: <textarea name="pdesc" cols="30" rows="10" required></textarea>
    <br><br>
    <input type="submit" value="Abschicken">
    <input type="reset" value="Neu">    
</body>