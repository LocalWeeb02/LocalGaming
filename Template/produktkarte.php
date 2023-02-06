<div class= "card">
    <div class="card-title"></div>
    <br>
    <img src="https://placekitten.com/250/250" class="card-img-top" alt="pkmn">
    <div class= "card-body">
        <?= $row['P_Name'] ?>
        <br>
        <?= $row['P_Preis']?>€
        <br>
        Zustand: <?= $row['P_Zustand']?>
        <hr>
    </div>
    <div class="card-footer">
        <a href="" class="btn-det">Details</a>
        <a href="shop.php/cart/add/<?= $row['Produkt_ID']?>" class="btn-basket">Warenkorb</a>
    </div>
</div>