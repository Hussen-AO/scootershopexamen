<!--
naam script     : magazijn.php
omschrijving    : onderdeel b van het project hier moeten de bestellingen ingepakt worden en kan je de status bewerken van een bestelling
Auteur          : hussen
project         : scootershop
Aanmaakdatum    : 5/12/2025
-->
<?php
require_once '../klasses/orderrules.php';
include '../componenten/header.php';

$orderRules = new orderRules();

// Als er op de inpak-knop is geklikt
if (isset($_POST['pack_item'])) {
    $orderRules->markPartPacked($_POST['orderrule_id']);
    header("Location: magazijn.php");
    exit;
}

// Haal alle niet-ingepakte onderdelen op
$items = $orderRules->getUnpackedParts();

?>

<h1>Magazijn </h1>

<?php if (empty($items)): ?>

    <p><strong>Alles is ingepakt! 🎉</strong></p>

<?php else: ?>

<table border="1" cellpadding="8" style="border-collapse: collapse; margin-top: 20px;">
    <tr>
        <th>Bestelnummer</th>
        <th>Artikel</th>
        <th>Actie</th>
    </tr>

    <?php foreach ($items as $item): ?>
    <tr>
        <td><?= $item['order_id'] ?></td>
        <td><?= $item['part'] ?></td>
        <td>
            <form method="post">
                <input type="hidden" name="orderrule_id" value="<?= $item['orderrule_id'] ?>">
                <button type="submit" name="pack_item">Ingepakt</button>
            </form>
        </td>
    </tr>
    <?php endforeach; ?>

</table>

<?php endif; ?>
