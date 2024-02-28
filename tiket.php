
<?php

require '../admin/jadwal/functions.php';

$order_detail = query("SELECT * FROM order_detail");

?>

<?php require '../layouts/navbar_penumpang.php'; ?>


<div class="product">
    <h1>Order Tiket</h1>
    <div class="wrapper-product">
        <?php foreach($order_detail as $data) : ?>
        <div class="card-product">
        <a href="detail_order.php?id=<?= $data["id_order_detail"] ?>">
            <p><?= $data["jumlah_tiket"]; ?></p>
            <p><?= $data["total_harga"]; ?></p> <br>
            <p><a href="../penumpang/cart-delete.php">Hapus</a></p>
        </a>
    </div>
        <?php endforeach; ?>
    </div>
</div>