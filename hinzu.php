<?php
session_start();
error_reporting(-1);
ini_set('display_errors', 'On');

$db = new PDO('mysql:host=localhost;dbname=localgaming', 'root', '');
$sql = "SELECT Produkt_ID, P_Name, P_Zustand, P_Preis, Beschreibung, Konsole_ID, Cart_ID FROM produkt";

$result = $db->query($sql);


$userID = random_int(0,time());
$cartItems = 0;

if(isset($_COOKIE['userID'])){
    $userID = (int) $_COOKIE['userID'];
}
setcookie('userID', $userID, strtotime('+30 days'));

$sql = "SELECT COUNT(Cart_ID) FROM Warenkorb WHERE Nutzer_ID =".$userID;
$cartResults = $db->query($sql);

$cartItems = $cartResults->fetchColumn();

require __DIR__ . '/Template/header.php';

    $pname = $_POST['pname'];
    $ppreis = $_POST['ppreis'];
    $pzustand = $_POST['Zustand'];
    $kname = $_POST['Konsole'];
    $pdesc = $_POST['pdesc'];

    echo "
    <h4>der name ist $pname der preis ist $ppreis und der zustand ist $pzustand</h4>
    ";
    $pdo = new PDO('mysql:host=localhost;dbname=localgaming', 'root', '');
    $statement = $pdo->prepare("INSERT INTO produkt (P_Name, P_Preis, P_Zustand, Konsole_ID, Beschreibung) values (?,?,?,?,?) ");
    $statement->execute(array($pname, $ppreis, $pzustand, $kname, $pdesc));
    $neue_id = $pdo->lastInsertId();
    echo "
    <br><br>
    <h1>$pname wurde unter der ID $neue_id der Datenbank hinzugefügt. <br><br>
    <a href='frmhinzu.php' id='hinzulink'>Mehr hinzufügen?</a>
    <a href='shop.php' id='hinzulink'>Zum Shop?</a>
    ";

    ?>