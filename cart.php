<?php

session_start();
require '../admin/jadwal/functions.php';


if(!isset($_SESSION["username"])){
    echo " 
    <script type='text/javascript'>
        alert('Silahkan login terlebih dahulu ya !!!');
        window.location = 'index.php';
    </script>
    ";
}
?> 

<?php if(empty($_SESSION["cart"])){
    ?>
    <h1>Keranjang Kosong!</h1>
    <?php
}else{
?>
    <div class="wrapper-keranjang">
        <h1>Order Tiket</h1>

        <div class="keranjang">
            <table border="1" cellpadding="10" cellspacing="0">
                <tr>
                    <th>NO</th>
                    <th>Jumlah Tiket</th>
                    <th>Total Harga</th>
                    <th>Aksi</th>
                </tr>

                <?php $i = 1; ?>
                <?php $grandTotal = 0; ?>
                <?php foreach($_SESSION["cart"] as $id_order_detail => $jumlah_tiket) : ?>
                    <?php $order_detail = query("SELECT * FROM order_detail WHERE id_order_detail = '$id_order_detail'");
                    $totalHarga = $order_detail["jumlah_harga"] * $jumlah_tiket;
                    $grandTotal += $totalHarga;
                    ?>
                    <tr>
                        <td><?= $i; ?></td>
                        <td><?= $order_detail["jumlah_tiket"]; ?></td>
                        <td><?= number_format($totalHarga); ?></td>
                        <td>    
                            <a href="">Edit</a>
                            <a href="cart-delete.php?id=<?= $order_detail["id_order_detail"]; ?>" onClick="return confirm('Apakah anda yakin ingin menghapus data ini?')">Hapus</a>
                        </td>
                    </tr>
                <?php $i++; ?>
                <?php endforeach; ?> 

                <td>Grand Total</td>
                <td colspan="5"> RP <?= number_format($grandTotal); ?></td>
                <tr>
                    <td colspan="6"><a href="checkout.php">Checkout</a></td>
                </tr>
            </table>
        </div>
    </div>

    <?php }

?>


