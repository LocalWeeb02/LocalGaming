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

// ZUM WARENKORB HINZUFÜGEN

$shopurl = $_SERVER['REQUEST_URI'];
$shopPosition = strpos($shopurl, 'shop.php');
$routeshop = substr($shopurl, $shopPosition);
$routeshop = str_replace('shop.php', '', $routeshop);

if(strpos($routeshop, '/cart/add/') !== false){
  $routeParts = explode("/", $routeshop);
  $productID = (int)$routeParts[3];

  $statement = $db->prepare("INSERT INTO warenkorb (Cart_ID, Nutzer_ID, Produkt_ID) values (?,?,?) ");
  $statement->execute(array($productID, $userID, $productID));

  header("Location: /projekte/LocalGaming/shop.php");
  exit();
}

// WARENKORB ANZAHL ANZEIGEN LASSEN

$sqlc = "SELECT COUNT(Cart_ID) FROM Warenkorb WHERE Nutzer_ID =".$userID;
$cartResults = $db->query($sqlc);
$cartItems = $cartResults->fetchColumn();

// DATEN AUS TABELLE PRODUKT AUSLESEN

$sql = "SELECT Produkt_ID, P_Name, P_Zustand, P_Preis, Beschreibung, Konsole_ID FROM produkt";
$result = $db->query($sql);

// AUF HEADER.PHP VERWEISEN

require __DIR__ . '/Template/header.php';

?>

<!-- PRODUKTKARTEN ANZEIGEN -->

    <br><br>
    <section class="container" id="produkte"> 
      <div class="row">
        <?php while($row = $result->fetch()): ?>
          <div class="col">
              <?php include 'Template/produktkarte.php' ?> <!-- AUF PRODUKTKARTE VERWEISEN -->
            </div>
          <?php endwhile;?>
      </div>
    </section>
    
</body>
</html>