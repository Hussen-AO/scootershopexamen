<!--
naam script     : bestellingen.php
omschrijving    : dit is voor deel a van het opdracht hier worden de klant gegevens en de bestelde artikelen weergegeven
Auteur          : hussen
project         : scootershop
Aanmaakdatum    : 5/12/2025
-->
<?php 
require_once '../klasses/orders.php';
require_once '../klasses/parts.php';
include '../componenten/header.php';

$klantInfo = new klantInfo();
$parts = new partsInfo();

// Controleer of er een update-formulier is verzonden
if (isset($_POST['update_order'])) {
    $klantInfo->updateOrders(
        $_POST['id'],
        $_POST['company_name'],
        $_POST['recipient'],
        $_POST['addressline1'],
        $_POST['addressline2'],
        $_POST['country'],
        $_POST['status']
    );
}
  
    if (isset($_POST['update_part'])) {
    $parts->updateParts(
        $_POST['id'],
        $_POST['part'],
        $_POST['purchase_price'],
        $_POST['sell_price']
    );

 
    header("Location: bestellingen.php");
    exit;
}

$orders = $klantInfo->getOrders();
$artikelen = $parts->getParts();
?>


<h1>Bestellingen</h1>


<?php foreach ($orders as $order): ?>

    <h2>Order #<?= $order['id'] ?></h2>

    <p>
        <strong>Datum:</strong> <?= $order['date'] ?><br>
        <strong>Bedrijf:</strong> <?= $order['company_name'] ?><br>
        <strong>Ontvanger:</strong> <?= $order['recipient'] ?><br>
        <strong>Adres:</strong> <?= $order['addressline1'] ?> <?= $order['addressline2'] ?><br>
        <strong>Land:</strong> <?= $order['country'] ?><br>
        <strong>Status:</strong> <?= $order['status'] ?>
    </p>
    
    <form method="post">
    <input type="hidden" name="id" value="<?= $order['id']; ?>">

    <input type="text" name="company_name" value="<?= $order['company_name']; ?>">
    <input type="text" name="recipient" value="<?= $order['recipient']; ?>">
    <input type="text" name="addressline1" value="<?= $order['addressline1']; ?>">
    <input type="text" name="addressline2" value="<?= $order['addressline2']; ?>">
    <input type="text" name="country" value="<?= $order['country']; ?>">
    <input type="hidden" name="status" value="<?= $order['status']; ?>">

    <button type="submit" name="update_order">Opslaan</button>
</form>


    <p><strong>Bestelde artikelen:</strong><br>

    <?php  
        // haal de parts voor deze order op
        $orderParts = $klantInfo->getPartsByOrderId($order['id']);

        foreach ($orderParts as $p) {
            echo "- " . $p['part'] . "<br>";
        }
        
    ?>
    <h3>Bestelde artikelen</h3>

<?php foreach ($orderParts as $artikel): ?>
    <form method="post">
        <input type="hidden" name="id" value="<?= $artikel['id']; ?>">
        <input type="hidden" name="order_id" value="<?= $order['id']; ?>">

        <label>Artikel:</label>
        <input type="text" name="part" value="<?= $artikel['part']; ?>"><br>

        <label>Aankoopprijs:</label>
        <input type="text" name="purchase_price" value="<?= $artikel['purchase_price']; ?>"><br>

        <label>Verkoopprijs:</label>
        <input type="text" name="sell_price" value="<?= $artikel['sell_price']; ?>"><br>

        <button type="submit" name="update_part">Opslaan</button>
    </form>
<?php endforeach; ?>

    </p>

    <hr>

<?php endforeach; ?>


