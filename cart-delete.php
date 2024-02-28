<?php 

session_start();

$id = $_GET['id'];

unset($_SESSION["cart"][$id]);
echo '<script type="text/javascript">
       alert("Produk telah terhapus!");
     </script>';

header("location:cart.php");

?>