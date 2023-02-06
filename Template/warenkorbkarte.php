<div class= "wkcard">
    <div class="wkcard-title">
    <br>
        <img src="https://placekitten.com/250/250" class="wkimage" alt="pkmn">
        <a href="cart/delete/<?= $row['Cart_ID']?>"><img src="LayOut/x-symbol.svg" alt="x" class="deletebtn"></a>
    </div>
        <div class= "wkcard-body">
            <?= $row['P_Name'] ?>
            <hr>
        </div>
    <div class="card-footer">
        <a href="" class="btn-det">Details</a>
        <div class="price">
            <?= $row['P_Preis'] ?>€
        </div>
    </div>
</div>
<br>