<?php


require '../layouts/navbar_penumpang.php';


?> 

<?php if(empty($_SESSION["cart"])){
    ?>
    <h1>Belum ada produk yang dimasukkan ke keranjang :(</h1>
    <?php
}else{
?>
    <div class="wrapper-checkout">
        <h1>Checkout Produk</h1>

        <div class="checkout">
            <form action="" method="POST">
            
                <label>ID User</label>
                <input type="text" name="id_user" value="<?= $_SESSION["id_user"]; ?>"><br /><br />
                
                <label>ID Jadwal</label>
                <input type="text" name="id_jadwal" value="<? $_SESSION["id_jadwal"]; ?>"><br /><br />
                
                <label>ID Order</label>
                <input type="text" name="id_order" value="<? $_SESSION["id_order"]; ?>"><br /><br />
                
                <label>Jumlah Tiket</label>
                <input type="text" name="jumlah_tiket" value="<? $_SESSION["jumlah_tiket"]; ?>"><br /><br />
                
                <?php foreach($_SESSION["cart"] as $id_order_detail => $jumlah_tiket) : ?>
                    <?php $order = query("SELECT FROM order_detail WHERE id_order_detail = 'id_order_detail'")[0];
                    $totalHarga = $order("total_harga") * $jumlah_tiket; ?>

                <input type="text" name="id_user" value="<?= $order["id_user"]; ?>">
                <input type="number" name="id_jadwal" value="<?= $produk["id_jadwal"]; ?>">
                <input type="number" name="id_order" value="<?= $produk["id_order"]; ?>">
                <input type="number" name="jumlah_tiket" value="<?= $jumlah_tiket; ?>">
                <input type="number" name="subtotal" value="<?= $totalHarga; ?>"> 
                <button type="submit" name="submit">Checkout</button>
                <?php endforeach; ?>
            </form>
            
        </div>
    </div>

    <?php }

?>


