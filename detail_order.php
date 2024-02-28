<?php


require '../e-ticketing/layouts/navbar_penumpang.php';


$id = $_GET["id"];

$order_detail = query("SELECT * FROM order_detail WHERE id_order_detail = '$id'")[0];

?> 

<div class="detail-produk">
    <h1>Order Detail</h1>
    <div class="wrapper-detail-produk">
        <form action="" method="POST">
            <h1><?= $order_detail["id_user"]; ?></h1>
            <p>ID Jadwal <?= $order_detail["id_jadwal"]; ?></p>
            <p>Stok <?= $order_detail["stok"]; ?></p>
            <p>Deskripsi Produk : <?= $order_detail["deskripsi"]; ?></p>
            <input type="number" name="qty" value="1"> <br />
            <button type="submit" name="kirim">Tambahkan Ke Keranjang</button>
        </form>
    </div>
</div>

<?php

if(isset($_POST["kirim"])){
    if($_POST["qty"] > $product["stok"]){
        echo "
        <script type='text/javascript'>
            alert('Mohon maaf, Kuantitas yang anda beli melebihi stok yang tersedia');
            window.location = 'index.php'
        </script>
    ";
    }else if($_POST["qty"] <= 0){
        echo "
        <script type='text/javascript'>
            alert('Beli setidaknya 1 produk ya !');
            window.location = 'index.php'
        </script>
    ";
    }else{
        $qty = $_POST["qty"];
        $_SESSION["cart"][$id] = $qty;

        echo "
            <script type='text/javascript'>
                alert('Produk berhasil ditambahkan ke keranjang');
                window.location = 'cart.php'
            </script>
        ";
    }
}

?>




