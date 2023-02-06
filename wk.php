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
if(isset($_SESSION['userID'])){
    $userID = (int) $_SESSION['userID'];
}

setcookie('userID', $userID, strtotime('+30 days'));
var_dump($userID);

$sqlwk = "SELECT COUNT(Cart_ID) FROM Warenkorb WHERE Nutzer_ID =".$userID;
$cartResults = $db->query($sqlwk);

$cartItems = $cartResults->fetchColumn();

$sqlwk = "SELECT Cart_ID, Nutzer_ID, Anzahl, erstellt, Produkt_ID FROM warenkorb";
$del = $db->query($sqlwk); 
$row = $del->fetch();

$url = $_SERVER['REQUEST_URI'];
$indexPHPPosition = strpos($url, 'wk.php');
$route = substr($url, $indexPHPPosition);
$route = str_replace('wk.php', '', $route);

if(strpos($route, '/cart/delete/') !== false){
  $routeParts = explode("/", $route);
  $productID = (int)$routeParts[3];

  $statement = $db->prepare("DELETE FROM `localgaming`.`warenkorb` WHERE  `Cart_ID`= $productID;");
  $statement->execute();

  header("Location: /projekte/LocalGaming/wk.php");
  exit();
}


$sql = "SELECT p.P_Name, p.P_Preis, w.Nutzer_ID
        FROM produkt p, warenkorb w
        WHERE w.Cart_ID = p.Produkt_ID
        ";
$result = $db->query($sql);

require __DIR__ . '/Template/header.php';
echo "<h2>Willkommen im Warenkorb</h2>
";
?>
    <section class="container" id="produkte" style="margin-bottom: -30px;">
      <div class="row">
        <?php while($row = $result->fetch()): ?>
          <div class="colwk">
              <?php include 'Template/warenkorbkarte.php' ?>
            </div>
          <?php endwhile;?>
      </div>
    </section>
    <a href="#" class="up">Nach oben?</a>



    </body>
</html>